<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->config->load('admin');
		
	}
	
	// LOGIN
	public function login() { /* pagina form login */
		
		if ($this->session->user) {
			audit_log("Warning: tentativo login con utente già loggato. (admin/login)");
			redirect('admin');
		}
		
		$this->load->view('admin/start');
		$this->load->view('admin/login/index');
		$this->load->view('admin/scripts');		
		$this->load->view('admin/login/index_scripts');		
		$this->load->view('admin/close');
		
	}
	
	public function login_check() {
			
		if (!$this->input->post()) {
			audit_log("Error: tentativo di login senza paramtri. (admin/login_check)");
			exit("Accesso non autorizzato");
		}
		
		$post=$this->input->post();
		
		if ( (!isset($post['user'])) || (!isset($post['password'])) ) {
			audit_log("Error: parametri login errati o incompleti: ".json_encode($post).". (login/checklogin)");
			echo "Login errato";
			exit();
		}
		
		$post['password']=sha1($post['password']);
				
		if ($user=$this->users_model->checkLogin($post)) {
			$this->session->user=$user;
			$this->users_model->setLastLogin($user->id);
			audit_log("Message: login effettuato. Dati utente: ".json_encode($user).". (admin/login_check)");
			// cancello immagini inutili da public, assets/tmp, public/img/usato e /offerte
			$this->common->cleanObsoleteFiles();
			echo "1";
		}else{
			audit_log("Error: login errato. Dati login: ".json_encode($post)." (admin/login_check)");
			echo "Login errato";
		}
		
	}
	
	public function logout() {
		audit_log("Message: logout effettuato. Dati utente: ".json_encode($this->session->user).". (admin/logout)");
		$this->session->unset_userdata('user');
		redirect('admin/login');
	}
	
	// DASHBOARD
	public function index() /* dashboard admin */ {
		
		if (!$this->session->user) {
			audit_log("Warning: tentativo accesso con utente non loggato. (admin/index)");
			redirect('admin/login');
		}
		
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		// index 
		$this->load->view('admin/scripts');		
		// custom scripts
		$this->load->view('admin/close');
		
	}
	
	// USATO
	public function usato() { /* pagina lista usati */
		
		if (!$this->session->user) {
			audit_log("Warning: tentativo accesso con utente non loggato. (admin/usato)");
			redirect('admin/login');
		}
		
		$data['usati']=$this->usato_model->getUsati(true); // con true prendo anche quelli con visible==0
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		$this->load->view('admin/usato/list',$data);
		$this->load->view('admin/scripts');	
		$this->load->view('admin/usato/list_scripts');	
		$this->load->view('admin/close');
		
	}

	public function usato_new() { /* pagina nuovo usato */	
		
		if (!$this->session->user) {
			audit_log("Warning: tentativo accesso con utente non loggato. (admin/usato_new)");
			redirect('admin/login');
		}
			
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		$this->load->view('admin/usato/new');
		$this->load->view('admin/scripts');	
		$this->load->view('admin/usato/new_scripts');
		$this->load->view('admin/close');
		
	}
	
	public function usato_save() { /* REST salvataggio usato */		
		
		if (!$this->session->user) {
			audit_log("Error: tentativo salvataggio usato con utente non loggato. (admin/usato_save)");
			exit("Operazione non consentita");
		}
		
		// regole validazione form save
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('nome', 'Nome', 'required',
				array('required' => '%s obbligatorio')
		);
		$this->form_validation->set_rules('descr[it]', 'Descrizione ITA', 'required',
				array('required' => '%s obbligatoria')
		);
		$this->form_validation->set_rules('descr[en]', 'Descrizione ENG', 'required',
				array('required' => '%s obbligatoria')
		);
		if ((null!=($this->input->post('cartec'))) && (is_array($this->input->post('cartec')))) {
				foreach ($this->input->post('cartec') as $key => $value) {
					$this->form_validation->set_rules('cartec['.$key.'][it]', 'Caratteristica tecnica ITA '.$key, 'required',
						array('required' => '%s obbligatoria')
					);
					$this->form_validation->set_rules('cartec['.$key.'][en]', 'Caratteristica tecnica ENG '.$key, 'required',
						array('required' => '%s obbligatoria')
					);
				}
		}
		// validazione ok
		if ($this->form_validation->run() !== FALSE) {
			$post=$this->input->post();	// post: {"nome":"nome","descr":{"it":"descr ita","en":"descr eng"},"cartec":{"1":{"it":"tecnica ita 1","en":"tecnica eng 1"},"2":{"it":"tecnica ita 2","en":"tecnica eng 2"}},"accessori":{"it":"accessori ita","en":"accessori eng"},"home_file":"[\"E8nKD5cL.jpg\"]","gallery_files":"[\"fqecdPEp.jpg\",\"SZlJIE6k.jpg\"]","banner_file":"[\"yScY6Bnz.jpg\"]","type":"usato"}				
			// creo record usato
			$record=array();
			$record['nome']=$post['nome'];
			$record['descr']=json_encode($post['descr']);
			$record['accessori']=json_encode($post['accessori']);
			$record['url']=url_title($post['nome']);
			$home_file=json_decode($post['home_file']);
			$banner_file=json_decode($post['banner_file']);
			// home_file e banner_file arrivano sempre come array
			$record['img_home']=isset($home_file[0]) ? $home_file[0] : "null.jpg"; // se l'utente non carica immagine uso null.jpg in sostituzione
			$record['img_banner']=isset($banner_file[0]) ? $banner_file[0] : "null.jpg";			
			$record['visible']=isset($post['visible']) ? "1" : "0";
			$record['tecniche']='{"it":"","en":""}';
			if (isset($post['cartec'])) {
				$cartec_it=array();
				$cartec_en=array();
				foreach ($post['cartec'] as $cartec) {
					$cartec_it[]=$cartec['it'];
					$cartec_en[]=$cartec['en'];
				}
				$cartec=new stdClass();
				$cartec->it=$cartec_it;
				$cartec->en=$cartec_en;				
				$record['tecniche']=json_encode($cartec);
			}
			// seo usato
			$seo=new stdClass();
			$seo->og_title=new stdClass();
			$seo->og_description=new stdClass();
			$og_title=$post['og_title'];
			$og_description=$post['og_description'];
			$seo->og_title->it=$og_title['it'];
			$seo->og_title->en=$og_title['en'];
			$seo->og_description->it=$og_description['it'];
			$seo->og_description->en=$og_description['en'];
			$record['seo']=json_encode($seo);
			unset($post['og_title']);
			unset($post['og_description']);

			// salvo record usato
			if (is_numeric($newid=$this->usato_model->createUsato($record))) { 
				// se il return della funzione non è numerico vuol dire che contiene un messaggio di errore
				audit_log("Message: salvato record usato ".json_encode($record)." con ID $newid. (admin/usato_save)");
				// ridimensiono e sposto immagini tmp in cartella usato
				$gallery_files=json_decode($post['gallery_files']);
				$tmpStoreFolder=$this->config->item('tmp_store_folder'); 
				$storeFolder=str_replace("%type%",$post['type'],$this->config->item('store_folder')); 
				
				if (isset($banner_file[0])) {
					// resize
					$tmpFile=$tmpStoreFolder.$banner_file[0];
					if ($this->common->resizeImage($tmpFile,1900,300)) {
						audit_log("Message: ridimensionata foto banner $tmpFile. (admin/usato_save)");
					}else{
						audit_log("Warning: ridimensionamento foto banner $tmpFile non riuscito. (admin/usato_save)");
					}
					// spostamento
					if (rename ($tmpFile,$storeFolder.$banner_file[0])) {
						audit_log("Message: spostata foto banner ".$banner_file[0].". (admin/usato_save)");
						chmod($storeFolder.$banner_file[0],0644);
					}else{
						audit_log("Error: spostamento foto banner ".$banner_file[0].". (admin/usato_save)");
					}
				}
				if (isset($home_file[0])) {
					// resize
					$tmpFile=$tmpStoreFolder.$home_file[0];
					if ($this->common->resizeImage($tmpFile,300,190)) {
						audit_log("Message: ridimensionata foto home $tmpFile. (admin/usato_save)");
					}else{
						audit_log("Warning: ridimensionamento foto homr $tmpFile non riuscito. (admin/usato_save)");
					}
					// spostamento
					if (rename ($tmpFile,$storeFolder.$home_file[0])) {
						audit_log("Message: spostata foto home ".$home_file[0].". (admin/usato_save)");
						chmod($storeFolder.$home_file[0],0644);
					}else{
						audit_log("Error: spostamento foto home ".$home_file[0].". (admin/usato_save)");
					}
				}
				if (isset($gallery_files[0])) {
					foreach ($gallery_files as $file) {
						// resize
						$tmpFile=$tmpStoreFolder.$file;
						if ($this->common->resizeImage($tmpFile,1000,635)) {
							audit_log("Message: ridimensionata foto gallery $tmpFile. (admin/usato_save)");
						}else{
							audit_log("Warning: ridimensionamento foto gallery $tmpFile non riuscito. (admin/usato_save)");
						}
						// spostamento
						if (rename ($tmpFile,$storeFolder.$file)) {
							audit_log("Message: spostata foto gallery ".$file.". (admin/usato_save)");
							chmod($storeFolder.$file,0644);
						}else{
							audit_log("Error: spostamento foto gallery ".$file.". (admin/usato_save)");
						}
					}
				}
				// creo array usato_pics
				if (count($gallery_files) > 0){
					$pics=array();
					foreach ($gallery_files as $val) {
						$pics[]=array("id_usato"=>$newid,"pic"=>$val);
					}
					// salvo batch usato_pics
					if ($this->usato_model->createUsatoPics($pics)) {
						audit_log("Message: create foto gallery usato ".json_encode($pics).". (admin/usato_save)");						
					}else{
						audit_log("Error: creazione foto gallery usato ".json_encode($pics).". (admin/usato_save)");						
					}
				}
				$this->session->set_flashdata('save','Salvataggio usato completato');
				$this->session->set_flashdata('save_status','success');
				audit_log("Message: salvataggio usato completato. (admin/usato_save)");
				echo $newid;
			}else{
				audit_log("Error: salvataggio record usato ".json_encode($record).". Errore DB ".$newid['message'].". (admin/usato_save)");				
				echo $newid['message']; // errore db query createUsato
			}			
		}else{
			// validazione no
			echo strip_tags(validation_errors());
		}
				
	}
	
	public function usato_view($url) { /* pagina dettagli usato */
		
		if (!$this->session->user) {
			audit_log("Error: tentativo accesso con utente non loggato. (admin/usato_view)");
			redirect('admin/login');
		}
		
		if (!isset($url)) show_404();
		
		// carico usato
		if (!$usato=$this->usato_model->getUsatoByUrl($url)) show_404();
		$usato->pics=$this->usato_model->getUsatoPics($usato->id);
		// se immagini home e banner sono null.jpg passo json array vuoto 
		$usato->home_file=$usato->img_home=="null.jpg" ? "[]" : json_encode(array($usato->img_home));
		$usato->banner_file=$usato->img_banner=="null.jpg" ? "[]" :json_encode(array($usato->img_banner));
		$usato->descr=json_decode($usato->descr);
		$usato->tecniche=json_decode($usato->tecniche);
		$usato->accessori=json_decode($usato->accessori);
		$usato->seo=json_decode($usato->seo);
		$data['usato']=$usato;
		
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		$this->load->view('admin/usato/view',$data);
		$this->load->view('admin/scripts');	
		$this->load->view('admin/usato/view_scripts');	
		$this->load->view('admin/close');
	}
	
	public function usato_update($id) { /* REST aggiornamento usato */
		
		if (!$this->session->user) {
			audit_log("Error: tentativo di update usato con utente non loggato. (admin/usato_update)");
			exit("Operazione non consentita");
		}
			
		if (!isset($id)) {
			audit_log("Error: Tentativo di update usato senza parametri. (admin/usato_update)");
			exit("Parametri non impostati");
		}

		// regole validazione form save
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('nome', 'Nome', 'required',
				array('required' => '%s obbligatorio')
		);
		$this->form_validation->set_rules('descr[it]', 'Descrizione ITA', 'required',
				array('required' => '%s obbligatoria')
		);
		$this->form_validation->set_rules('descr[en]', 'Descrizione ENG', 'required',
				array('required' => '%s obbligatoria')
		);
		if ((null!=($this->input->post('cartec'))) && (is_array($this->input->post('cartec')))) {
				foreach ($this->input->post('cartec') as $key => $value) {
					$this->form_validation->set_rules('cartec['.$key.'][it]', 'Caratteristica tecnica ITA '.$key, 'required',
						array('required' => '%s obbligatoria')
					);
					$this->form_validation->set_rules('cartec['.$key.'][en]', 'Caratteristica tecnica ENG '.$key, 'required',
						array('required' => '%s obbligatoria')
					);
				}
		}
		// validazione ok
		if ($this->form_validation->run() !== FALSE) {
			$post=$this->input->post();	// post: {"nome":"nome","descr":{"it":"descr ita","en":"descr eng"},"cartec":{"1":{"it":"tecnica ita 1","en":"tecnica eng 1"},"2":{"it":"tecnica ita 2","en":"tecnica eng 2"}},"accessori":{"it":"accessori ita","en":"accessori eng"},"home_file":"[\"E8nKD5cL.jpg\"]","gallery_files":"[\"fqecdPEp.jpg\",\"SZlJIE6k.jpg\"]","banner_file":"[\"yScY6Bnz.jpg\"]","type":"usato"}				
			// creo record usato						
			$record=array();
			$record['nome']=$post['nome'];
			$record['descr']=json_encode($post['descr']);
			$record['accessori']=json_encode($post['accessori']);
			$record['url']=url_title($post['nome']);
			$home_file=json_decode($post['home_file']);
			$banner_file=json_decode($post['banner_file']);
			// se utente non carica immagine uso null.jpg in sostituzione
			$record['img_home']=isset($home_file[0]) ? $home_file[0] : "null.jpg";
			$record['img_banner']=isset($banner_file[0]) ? $banner_file[0] : "null.jpg";			
			$record['visible']=isset($post['visible']) ? "1" : "0";
			$record['tecniche']='{"it":"","en":""}';
			if (isset($post['cartec'])) {
				$cartec_it=array();
				$cartec_en=array();
				foreach ($post['cartec'] as $cartec) {
					$cartec_it[]=$cartec['it'];
					$cartec_en[]=$cartec['en'];
				}
				$cartec=new stdClass();
				$cartec->it=$cartec_it;
				$cartec->en=$cartec_en;				
				$record['tecniche']=json_encode($cartec);
			}
			// seo usato
			$seo=new stdClass();
			$seo->og_title=new stdClass();
			$seo->og_description=new stdClass();
			$og_title=$post['og_title'];
			$og_description=$post['og_description'];
			$seo->og_title->it=$og_title['it'];
			$seo->og_title->en=$og_title['en'];
			$seo->og_description->it=$og_description['it'];
			$seo->og_description->en=$og_description['en'];
			$record['seo']=json_encode($seo);
			unset($post['og_title']);
			unset($post['og_description']);

			// aggiorno record usato
			if ($update=$this->usato_model->updateUsato($record,$id)) { 
				audit_log("Message: aggiornato record usato ".json_encode($record)." con ID $id. (admin/usato_update)");
				// sposto immagini tmp in cartella usato
				$gallery_files=json_decode($post['gallery_files']);
				$tmpStoreFolder=$this->config->item('tmp_store_folder'); 
				$storeFolder=str_replace("%type%",$post['type'],$this->config->item('store_folder')); 
								
				if (isset($banner_file[0])) {
					// resize
					$tmpFile=$tmpStoreFolder.$banner_file[0];
					if ($this->common->resizeImage($tmpFile,1900,300)) {
						audit_log("Message: ridimensionata foto banner $tmpFile. (admin/usato_save)");
					}else{
						audit_log("Warning: ridimensionamento foto banner $tmpFile non riuscito. (admin/usato_update)");
					}
					// spostamento TOGLIERE CHIOCCIOLA
					if (rename ($tmpFile,$storeFolder.$banner_file[0])) {
						audit_log("Message: spostata foto banner ".$banner_file[0].". (admin/usato_update)");
						chmod($storeFolder.$banner_file[0],0644);
					}else{
						audit_log("Warning: spostamento foto banner ".$tmpfile." ".$storeFolder." ".$banner_file[0].". (admin/usato_update)");
					}
				}
				if (isset($home_file[0])) {
					// resize
					$tmpFile=$tmpStoreFolder.$home_file[0];
					if ($this->common->resizeImage($tmpFile,450,285)) {
						audit_log("Message: ridimensionata foto home $tmpFile. (admin/usato_save)");
					}else{
						audit_log("Warning: ridimensionamento foto home $tmpFile non riuscito. (admin/usato_save)");
					}
					// spostamento TOGLIERE CHIOCCIOLA
					if (rename ($tmpFile,$storeFolder.$home_file[0])) {
						audit_log("Message: spostata foto home ".$home_file[0].". (admin/usato_save)");
						chmod($storeFolder.$home_file[0],0644);
					}else{
						audit_log("Warning: spostamento foto home ".$home_file[0]." non riuscito. (admin/usato_save)");
					}
				}
				if (isset($gallery_files[0])) {
					foreach ($gallery_files as $file) {
						// resize
						$tmpFile=$tmpStoreFolder.$file;
						if ($this->common->resizeImage($tmpFile,1000,635)) {
							audit_log("Message: ridimensionata foto gallery $tmpFile. (admin/usato_save)");
						}else{
							audit_log("Warning: ridimensionamento foto gallery $tmpFile non riuscito. (admin/usato_save)");
						}
						// spostamento TOGLIERE CHIOCCIOLA
						if (rename ($tmpFile,$storeFolder.$file)) {
							audit_log("Message: spostata foto gallery ".$file.". (admin/usato_save)");
							chmod($storeFolder.$file,0644);
						}else{
							audit_log("Warning: spostamento foto gallery ".$file." non riuscito. (admin/usato_save)");
						}
					}
				}
				
				// elimino usato_pics obsolete
				$orig_gallery=isset($post['orig_gallery']) ? $post['orig_gallery'] : array();
				if ($elim=$this->usato_model->deleteUsatoPics($orig_gallery,$id) > 0) {
					audit_log("Message: eliminate $elim foto gallery per usato con ID $id. (admin/usato_update)");
				}

				// creo array usato_pics
				if (count($gallery_files) > 0){
					$pics=array();
					foreach ($gallery_files as $val) {
						$pics[]=array("id_usato"=>$id,"pic"=>$val);
					}
					// salvo batch usato_pics
					if ($this->usato_model->createUsatoPics($pics)) {
						audit_log("Message: create foto gallery usato ".json_encode($pics).". (admin/usato_update)");						
					}else{
						audit_log("Error: creazione foto gallery usato ".json_encode($pics).". (admin/usato_update)");						
					}
				}
				$this->session->set_flashdata('save','Aggiornamento usato completato');
				$this->session->set_flashdata('save_status','success');
				audit_log("Message: aggiornamento usato completato. (admin/usato_update)");
				echo "1";
			}else{
				audit_log("Error: aggiornamento record usato ".json_encode($record).". Errore DB ".$update['message'].". (admin/usato_update)");				
				echo $update['message'];
			}			
		}else{
			// validazione no
			echo strip_tags(validation_errors());
		}
				
	}
	
	public function usato_delete() { /* REST cancellazione usato e relative foto */
		
		if (!$this->session->user) {
			audit_log("Error: tentativo cancellazione usato con utente non loggato. (admin/usato_delete)");
			exit("Operazione non consentita");
		}
		
		if (!$this->input->post()) {
			audit_log("Error: Tentativo di cancellazione usato senza parametri. (admin/usato_delete)");
			exit("Parametri non impostati");
		}
		
		$id=$this->input->post('id_usato');
		
		// cancello record di usato
		if ($this->usato_model->deleteUsato($id)) {
			audit_log("Message: eliminato usato con ID $id. (admin/usato_delete)");
			// cancello eventuali usato_pics
			$tokeep=array(''); // con array vuoto elimino tutte le foto per questo usato
			if ($this->usato_model->deleteUsatoPics($tokeep,$id)) { 
				audit_log("Message: eliminate foto gallery per usato con ID $id. (admin/usato_delete)");
			}
			$this->session->set_flashdata('delete','Cancellazione usato completata');
			$this->session->set_flashdata('delete_status','success');
			echo 1; // success
		}else{
			audit_log("Error: eliminazione usato con ID $id. (admin/usato_delete)");
			echo 0;
		}
	}
	
	// OFFERTE
	public function offerte() { /* pagina lista offerte */
		
		if (!$this->session->user) {
			audit_log("Warning: tentativo accesso con utente non loggato. (admin/offerte)");
			redirect('admin/login');
		}
		
		$data['offerte']=$this->offerte_model->getOfferte(true); // con true prendo anche quelle con visible==0
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		$this->load->view('admin/offerte/list',$data);
		$this->load->view('admin/scripts');	
		$this->load->view('admin/offerte/list_scripts');	
		$this->load->view('admin/close');
		
	}

	public function offerte_new() { /* pagina nuova offerta */	
		
		if (!$this->session->user) {
			audit_log("Warning: tentativo accesso con utente non loggato. (admin/offerte_new)");
			redirect('admin/login');
		}
			
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		$this->load->view('admin/offerte/new');
		$this->load->view('admin/scripts');	
		$this->load->view('admin/offerte/new_scripts');
		$this->load->view('admin/close');
		
	}
	
	public function offerte_save() { /* REST salvataggio offerta */		
		
		if (!$this->session->user) {
			audit_log("Error: tentativo salvataggio offerta con utente non loggato. (admin/offerte_save)");
			exit("Operazione non consentita");
		}
		
		// regole validazione form save
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('nome', 'Nome', 'required',
				array('required' => '%s obbligatorio')
		);
		$this->form_validation->set_rules('descr[it]', 'Descrizione ITA', 'required',
				array('required' => '%s obbligatoria')
		);
		$this->form_validation->set_rules('descr[en]', 'Descrizione ENG', 'required',
				array('required' => '%s obbligatoria')
		);
		
		// validazione ok
		if ($this->form_validation->run() !== FALSE) {
			$post=$this->input->post();	// post: {"nome":"sdfsd","descr":{"it":"sdfsdf","en":"sdfsdf"},"accessori":{"it":"","en":""},"home_file":"[]","gallery_files":"[]","banner_file":"[]","link":"[]","btn_txt":"sdfsdf","visible":"1","type":"offerte"}
			
			// creo record usato
			$record=array();
			$record['nome']=$post['nome'];
			$record['descr']=json_encode($post['descr']);
			$record['url']=url_title($post['nome']);
			$home_file=json_decode($post['home_file']);
			$banner_file=json_decode($post['banner_file']);
			// home_file e banner_file arrivano sempre come array
			$record['img_home']=isset($home_file[0]) ? $home_file[0] : "null.jpg"; // se l'utente non carica immagine uso null.jpg in sostituzione
			$record['img_banner']=isset($banner_file[0]) ? $banner_file[0] : "null.jpg";			
			$record['visible']=isset($post['visible']) ? "1" : "0";
			$link_ita=json_decode($post['link']);
			$link_eng=json_decode($post['link_en']);			
			$linkit=isset($link_ita[0]) ? $link_ita[0] : "";
			$linken=isset($link_eng[0]) ? $link_eng[0] : "";
			$link=new stdClass();
			$link->it=$linkit;
			$link->en=$linken;
			$record['link']=json_encode($link);			
			$buttontext=$post['btn_txt'];
			$btn_txt=new stdClass();
			$btn_txt->it=$buttontext['it'];
			$btn_txt->en=$buttontext['en'];				
			$record['btn_txt']=json_encode($btn_txt);
			// seo offerta
			$seo=new stdClass();
			$seo->og_title=new stdClass();
			$seo->og_description=new stdClass();
			$og_title=$post['og_title'];
			$og_description=$post['og_description'];
			$seo->og_title->it=$og_title['it'];
			$seo->og_title->en=$og_title['en'];
			$seo->og_description->it=$og_description['it'];
			$seo->og_description->en=$og_description['en'];
			$record['seo']=json_encode($seo);
			unset($post['og_title']);
			unset($post['og_description']);

			// salvo record offerta
			if (is_numeric($newid=$this->offerte_model->createOfferta($record))) { 
				// se il return della funzione non è numerico vuol dire che contiene un messaggio di errore
				audit_log("Message: salvato record offerta ".json_encode($record)." con ID $newid. (admin/offerte_save)");
				// ridimensiono e sposto immagini tmp in cartella offerte				
				$tmpStoreFolder=$this->config->item('tmp_store_folder'); 
				$storeFolder=str_replace("%type%",$post['type'],$this->config->item('store_folder')); 
				
				if (isset($banner_file[0])) {
					// resize
					$tmpFile=$tmpStoreFolder.$banner_file[0];
					if ($this->common->resizeImage($tmpFile,1900,300)) {
						audit_log("Message: ridimensionata foto banner $tmpFile. (admin/offerte_save)");
					}else{
						audit_log("Warning: ridimensionamento foto banner $tmpFile non riuscito. (admin/offerte_save)");
					}
					// spostamento
					if (rename ($tmpFile,$storeFolder.$banner_file[0])) {
						audit_log("Message: spostata foto banner ".$banner_file[0].". (admin/offerte_save)");
						chmod($storeFolder.$banner_file[0],0644);
					}else{
						audit_log("Error: spostamento foto banner ".$banner_file[0].". (admin/offerte_save)");
					}
				}
				if (isset($home_file[0])) {
					// resize
					$tmpFile=$tmpStoreFolder.$home_file[0];
					if ($this->common->resizeImage($tmpFile,300,190)) {
						audit_log("Message: ridimensionata foto home $tmpFile. (admin/offerte_save)");
					}else{
						audit_log("Warning: ridimensionamento foto homr $tmpFile non riuscito. (admin/offerte_save)");
					}
					// spostamento
					if (rename ($tmpFile,$storeFolder.$home_file[0])) {
						audit_log("Message: spostata foto home ".$home_file[0].". (admin/offerte_save)");
						//chmod($storeFolder.$home_file[0],0644);
						if (chmod($storeFolder.$home_file[0],0644)) audit_log("Message: modificati permessi foto home ".$storeFolder.$home_file[0].". (admin/offerte_save)");
					}else{
						audit_log("Error: spostamento foto home ".$home_file[0].". (admin/offerte_save)");
					}
				}
				$gallery_files=json_decode($post['gallery_files']);
				if (isset($gallery_files[0])) {
					foreach ($gallery_files as $file) {
						// resize
						$tmpFile=$tmpStoreFolder.$file;
						if ($this->common->resizeImage($tmpFile,1000,635)) {
							audit_log("Message: ridimensionata foto gallery $tmpFile. (admin/offerte_save)");
						}else{
							audit_log("Warning: ridimensionamento foto gallery $tmpFile non riuscito. (admin/offerte_save)");
						}
						// spostamento
						if (rename ($tmpFile,$storeFolder.$file)) {
							audit_log("Message: spostata foto gallery ".$file.". (admin/offerte_save)");
							chmod($storeFolder.$file,0644);
						}else{
							audit_log("Error: spostamento foto gallery ".$file.". (admin/offerte_save)");
						}
					}
				}
				// sposto allegati in directory public
				$attachStoreFolder=$this->config->item('public_folder');
				if (isset($link_ita[0])) {
					$tmpFile=$tmpStoreFolder.$link_ita[0];
					// spostamento
					if (rename ($tmpFile,$attachStoreFolder.$link_ita[0])) {
						audit_log("Message: spostato allegato ita ".$link_ita[0].". (admin/offerte_save)");
						chmod($attachStoreFolder.$link_ita[0],0644);
					}else{
						audit_log("Error: spostamento allegato ita ".$link_ita[0].". (admin/offerte_save)");
					}
				}
				if (isset($link_eng[0])) {
					$tmpFile=$tmpStoreFolder.$link_eng[0];
					// spostamento
					if (rename ($tmpFile,$attachStoreFolder.$link_eng[0])) {
						audit_log("Message: spostato allegato eng ".$link_eng[0].". (admin/offerte_save)");
						chmod($attachStoreFolder.$link_eng[0],0644);
					}else{
						audit_log("Error: spostamento allegato eng ".$link_eng[0].". (admin/offerte_save)");
					}
				}
				
				// creo array offerte_pics
				if (count($gallery_files) > 0){
					$pics=array();
					foreach ($gallery_files as $val) {
						$pics[]=array("id_offerta"=>$newid,"pic"=>$val);
					}
					// salvo batch offerte_pics
					if ($this->offerte_model->createOffertaPics($pics)) {
						audit_log("Message: create foto gallery offerta ".json_encode($pics).". (admin/offerte_save)");						
					}else{
						audit_log("Error: creazione foto gallery offerta ".json_encode($pics).". (admin/offerte_save)");						
					}
				}
				$this->session->set_flashdata('save','Salvataggio offerta completato');
				$this->session->set_flashdata('save_status','success');
				audit_log("Message: salvataggio offerta completato. (admin/offerte_save)");
				echo $newid;
			}else{
				audit_log("Error: salvataggio record offerta ".json_encode($record).". Errore DB ".$newid['message'].". (admin/offerte_save)");				
				echo $newid['message']; // errore db query createUsato
			}			
		}else{
			// validazione no
			echo strip_tags(validation_errors());
		}
				
	}
	
	public function offerte_view($url) { /* pagina dettagli offerta */
		
		if (!$this->session->user) {
			audit_log("Error: tentativo accesso con utente non loggato. (admin/offerte_view)");
			redirect('admin/login');
		}
		
		if (!isset($url)) show_404();
		
		// carico usato
		if (!$offerta=$this->offerte_model->getOffertaByUrl($url)) show_404();
		$offerta->pics=$this->offerte_model->getOffertaPics($offerta->id);
		// se immagini home e banner sono null.jpg passo json array vuoto 
		$offerta->home_file=$offerta->img_home=="null.jpg" ? "[]" : json_encode(array($offerta->img_home));
		$offerta->banner_file=$offerta->img_banner=="null.jpg" ? "[]" :json_encode(array($offerta->img_banner));
		$offerta->descr=json_decode($offerta->descr);
		$offerta->btn_txt=json_decode($offerta->btn_txt);
		$offerta->link=json_decode($offerta->link);
		$offerta->link_ita=$offerta->link->it=="" ? "[]" : json_encode(array($offerta->link->it));
		$offerta->link_eng=$offerta->link->en=="" ? "[]" : json_encode(array($offerta->link->en));
		$offerta->seo=json_decode($offerta->seo);
		$data['offerta']=$offerta;
		
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		$this->load->view('admin/offerte/view',$data);
		$this->load->view('admin/scripts');	
		$this->load->view('admin/offerte/view_scripts');	
		$this->load->view('admin/close');
	}
	
	public function offerte_update($id) { /* REST aggiornamento offerta */
		
		if (!$this->session->user) {
			audit_log("Error: tentativo di update offerta con utente non loggato. (admin/offerte_update)");
			exit("Operazione non consentita");
		}
			
		if (!isset($id)) {
			audit_log("Error: Tentativo di update usato senza parametri. (admin/offerte_update)");
			exit("Parametri non impostati");
		}

		// regole validazione form save
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('nome', 'Nome', 'required',
				array('required' => '%s obbligatorio')
		);
		$this->form_validation->set_rules('descr[it]', 'Descrizione ITA', 'required',
				array('required' => '%s obbligatoria')
		);
		$this->form_validation->set_rules('descr[en]', 'Descrizione ENG', 'required',
				array('required' => '%s obbligatoria')
		);
		// validazione ok
		if ($this->form_validation->run() !== FALSE) {
			$post=$this->input->post();	// post: {"nome":"ssssssss","descr":{"it":"adasdas","en":"adsasdas"},"home_file":"[]","gallery_files":"[]","banner_file":"[]","link":"[\"2rCiOLvm.doc\"]","link_en":"[\"d0Sk2XWw.docx\"]","btn_txt":{"it":"bottone","en":"button"},"visible":"1","type":"offerte"}			
			
			// creo record offerta						
			$record=array();
			$record['nome']=$post['nome'];
			$record['descr']=json_encode($post['descr']);
			$record['url']=url_title($post['nome']);
			$home_file=json_decode($post['home_file']); 
			$banner_file=json_decode($post['banner_file']);
			// se utente non carica immagine uso null.jpg in sostituzione
			$record['img_home']=isset($home_file[0]) ? $home_file[0] : "null.jpg";
			$record['img_banner']=isset($banner_file[0]) ? $banner_file[0] : "null.jpg";			
			$record['visible']=isset($post['visible']) ? "1" : "0";
			$link_ita=json_decode($post['link']);
			$link_eng=json_decode($post['link_en']);			
			$linkit=isset($link_ita[0]) ? $link_ita[0] : "";
			$linken=isset($link_eng[0]) ? $link_eng[0] : "";
			$link=new stdClass();
			$link->it=$linkit;
			$link->en=$linken;
			$record['link']=json_encode($link);			
			$buttontext=$post['btn_txt'];
			$btn_txt=new stdClass();
			$btn_txt->it=$buttontext['it'];
			$btn_txt->en=$buttontext['en'];				
			$record['btn_txt']=json_encode($btn_txt);
			// seo offerta
			$seo=new stdClass();
			$seo->og_title=new stdClass();
			$seo->og_description=new stdClass();
			$og_title=$post['og_title'];
			$og_description=$post['og_description'];
			$seo->og_title->it=$og_title['it'];
			$seo->og_title->en=$og_title['en'];
			$seo->og_description->it=$og_description['it'];
			$seo->og_description->en=$og_description['en'];
			$record['seo']=json_encode($seo);
			unset($post['og_title']);
			unset($post['og_description']);

			// aggiorno record offerte
			if ($update=$this->offerte_model->updateOfferta($record,$id)) { 
				audit_log("Message: aggiornato record usato ".json_encode($record)." con ID $id. (admin/offerte_update)");
				// sposto immagini tmp in cartella offerte
				$gallery_files=json_decode($post['gallery_files']);
				$tmpStoreFolder=$this->config->item('tmp_store_folder'); 
				$storeFolder=str_replace("%type%",$post['type'],$this->config->item('store_folder')); 
								
				if (isset($banner_file[0])) {
					// resize
					$tmpFile=$tmpStoreFolder.$banner_file[0];
					if ($this->common->resizeImage($tmpFile,1900,300)) {
						audit_log("Message: ridimensionata foto banner $tmpFile. (admin/offerte_update)");
					}else{
						audit_log("Warning: ridimensionamento foto banner $tmpFile non riuscito. (admin/offerte_update)");
					}
					// spostamento TOGLIERE CHIOCCIOLA
					if (rename ($tmpFile,$storeFolder.$banner_file[0])) {
						audit_log("Message: spostata foto banner ".$banner_file[0].". (admin/offerte_update)");
						chmod($storeFolder.$banner_file[0],0644);
					}else{
						audit_log("Warning: spostamento foto banner ".$banner_file[0].". (admin/offerte_update)");
					}
				}
				if (isset($home_file[0])) {
					// resize
					$tmpFile=$tmpStoreFolder.$home_file[0];
					if ($this->common->resizeImage($tmpFile,450,285)) {
						audit_log("Message: ridimensionata foto home $tmpFile. (admin/offerte_update)");
					}else{
						audit_log("Warning: ridimensionamento foto home $tmpFile non riuscito. (admin/offerte_update)");
					}
					// spostamento TOGLIERE CHIOCCIOLA
					audit_log($tmpFile. " ".$storeFolder.$home_file[0]);
					if (rename ($tmpFile,$storeFolder.$home_file[0])) {
						audit_log("Message: spostata foto home ".$home_file[0].". (admin/offerte_update)");
						chmod($storeFolder.$home_file[0],0644);
					}else{
						audit_log("Warning: spostamento foto home ".$home_file[0]." non riuscito. (admin/offerte_update)");
					}
				}
				if (isset($gallery_files[0])) {
					foreach ($gallery_files as $file) {
						// resize
						$tmpFile=$tmpStoreFolder.$file;
						if ($this->common->resizeImage($tmpFile,1000,635)) {
							audit_log("Message: ridimensionata foto gallery $tmpFile. (admin/offerte_update)");
						}else{
							audit_log("Warning: ridimensionamento foto gallery $tmpFile non riuscito. (admin/offerte_update)");
						}
						// spostamento TOGLIERE CHIOCCIOLA
						if (rename ($tmpFile,$storeFolder.$file)) {
							audit_log("Message: spostata foto gallery ".$file.". (admin/offerte_update)");
							chmod($storeFolder.$file,0644);
						}else{
							audit_log("Warning: spostamento foto gallery ".$file." non riuscito. (admin/offerte_update)");
						}
					}
				}
				// sposto allegati in directory public
				$attachStoreFolder=$this->config->item('public_folder');
				if (isset($link_ita[0])) {
					$tmpFile=$tmpStoreFolder.$link_ita[0];
					// spostamento TOGLIERE CHIOCCIOLA
					if (rename ($tmpFile,$attachStoreFolder.$link_ita[0])) {
						audit_log("Message: spostato allegato ita ".$link_ita[0].". (admin/offerte_update)");
						chmod($attachStoreFolder.$link_ita[0],0644);
					}else{
						audit_log("Warning: spostamento allegato ita ".$link_ita[0]." non riuscito. (admin/offerte_update)");
					}
				}
				if (isset($link_eng[0])) {
					$tmpFile=$tmpStoreFolder.$link_eng[0];
					// spostamento TOGLIERE CHIOCCIOLA
					if (rename ($tmpFile,$attachStoreFolder.$link_eng[0])) {
						audit_log("Message: spostato allegato eng ".$link_eng[0].". (admin/offerte_update)");
						chmod($attachStoreFolder.$link_eng[0],0644);
					}else{
						audit_log("Warning: spostamento allegato eng ".$link_eng[0]." non riuscito. (admin/offerte_update)");
					}
				}
				
				// elimino offerte_pics obsolete
				$orig_gallery=isset($post['orig_gallery']) ? $post['orig_gallery'] : array();
				if ($elim=$this->offerte_model->deleteOffertaPics($orig_gallery,$id) > 0) {
					audit_log("Message: eliminate $elim foto gallery per offerta con ID $id. (admin/offerte_update)");
				}

				// creo array offerte_pics
				if (count($gallery_files) > 0){
					$pics=array();
					foreach ($gallery_files as $val) {
						$pics[]=array("id_offerta"=>$id,"pic"=>$val);
					}
					// salvo batch offerte_pics
					if ($this->offerte_model->createOffertaPics($pics)) {
						audit_log("Message: create foto gallery offerta ".json_encode($pics).". (admin/offerte_update)");						
					}else{
						audit_log("Error: creazione foto gallery offerta ".json_encode($pics).". (admin/offerte_update)");						
					}
				}
				$this->session->set_flashdata('save','Aggiornamento offerta completato');
				$this->session->set_flashdata('save_status','success');
				audit_log("Message: aggiornamento offerta completato. (admin/offerte_update)");
				echo "1";
			}else{
				audit_log("Error: aggiornamento record offerta ".json_encode($record).". Errore DB ".$update['message'].". (admin/offerte_update)");				
				echo $update['message'];
			}			
		}else{
			// validazione no
			echo strip_tags(validation_errors());
		}
				
	}
	
	public function offerte_delete() { /* REST cancellazione offerta e relative foto */
		
		if (!$this->session->user) {
			audit_log("Error: tentativo cancellazione offerta con utente non loggato. (admin/offerte_delete)");
			exit("Operazione non consentita");
		}
		
		if (!$this->input->post()) {
			audit_log("Error: Tentativo di cancellazione offerta senza parametri. (admin/offerte_delete)");
			exit("Parametri non impostati");
		}
		
		$id=$this->input->post('id_offerta');
		
		// cancello record di usato
		if ($this->offerte_model->deleteOfferta($id)) {
			audit_log("Message: eliminato usato con ID $id. (admin/offerte_delete)");
			// cancello eventuali offerte_pics
			$tokeep=array(''); // con array vuoto elimino tutte le foto per questo usato
			if ($this->offerte_model->deleteOffertaPics($tokeep,$id)) { 
				audit_log("Message: eliminate foto gallery per usato con ID $id. (admin/offerte_delete)");
			}
			$this->session->set_flashdata('delete','Cancellazione usato completata');
			$this->session->set_flashdata('delete_status','success');
			echo 1; // success
		}else{
			audit_log("Error: eliminazione usato con ID $id. (admin/offerte_delete)");
			echo 0;
		}
	}
	
	// COMMON
	public function upload() { /* REST gestione upload immagini da dropzone in folder tmp (sia usato che offerte) */		
		
		if (!$this->input->post()) {
			audit_log("Error: tentativo upload immagine senza POST. (upload)");
			exit("Parametri non impostati");
		}
		
		// post: {"type":"usato","uploaded_files":"[]"}		
		$uploadedFiles=json_decode($this->input->post('uploaded_files'));		
		$storeFolder=$this->config->item('tmp_store_folder'); 		
		
		if (!empty($_FILES)) {		
			$this->load->helper('string'); 
			// upload array file (gallery)
			if (is_array($_FILES['file']['tmp_name'])) {
				foreach ($_FILES['file']['tmp_name'] as $key=>$tempFile) {  
					$ext = end((explode(".", $_FILES['file']['name'][$key])));
					if ($storeFile=$this->loadFile($tempFile,$storeFolder,$ext)) {
						audit_log("Message: caricata immagine $storeFile. (admin/upload)");
						$uploadedFiles[]=$storeFile;
					}else{
						audit_log("Error: caricamento immagine $tempFile. (admin/upload)");
						header('HTTP/1.1 500 Internal Server Error');
						exit("Errore caricamento file");
					}					
				}
			}else{
				// upload singolo file (banner, home)
				$ext = end((explode(".", $_FILES['file']['name'])));
				if ($storeFile=$this->loadFile($_FILES['file']['tmp_name'],$storeFolder,$ext)) {
					audit_log("Message: caricata immagine $storeFile. (admin/upload)");
					$uploadedFiles[]=$storeFile;
				}else{
					audit_log("Error: caricamento immagine ".$_FILES['file']['tmp_name'].". (admin/upload)");
					header('HTTP/1.1 500 Internal Server Error');
					exit("Errore caricamento file");
				}	
			}
			echo json_encode($uploadedFiles); // success
		}else{
			header('HTTP/1.1 500 Internal Server Error');
			echo "Nessun file caricato";
		}
		
	}
	
	private function loadFile($tempFile,$storeFolder,$ext) { /* upload file con nome random; return nome */
		$storeFile=random_string('alnum',8).".$ext";   
		$targetFile=$storeFolder.$storeFile;
		if (move_uploaded_file($tempFile,$targetFile)) {
			chmod($targetFile, 777);
			return $storeFile;		
		}
		return false;
		
	}
	
}
