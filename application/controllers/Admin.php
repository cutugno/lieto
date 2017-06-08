<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->config->load('admin');
		
	}
	
	public function login() { /* pagina form login */
		
		if ($this->session->user) redirect('admin');
		
		$this->load->view('admin/start');
		$this->load->view('admin/login/index');
		$this->load->view('admin/scripts');		
		$this->load->view('admin/login/index_scripts');		
		$this->load->view('admin/close');
		
	}
	
	public function login_check() {
			
		if (!$this->input->post()) {
			audit_log("Error: parametri post non impostati. (admin/login_check)");
			exit("Accesso non autorizzato");
		}
		
		$post=$this->input->post();
		
		if ( (!isset($post['user'])) || (!isset($post['password'])) ) {
			audit_log("Error: dati post login errati o incompleti: ".json_encode($post).". (login/checklogin)");
			echo "Login errato";
			exit();
		}
		
		$post['password']=sha1($post['password']);
				
		if ($user=$this->users_model->checkLogin($post)) {
			$this->session->user=$user;
			$this->users_model->setLastLogin($user->id);
			audit_log("Message: login effettuato. Dati utente: ".json_encode($user).". (admin/login_check)");
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
	
	public function index() /* dashboard admin */ {
		
		if (!$this->session->user) redirect('admin/login');
		
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		// index 
		$this->load->view('admin/scripts');		
		// custom scripts
		$this->load->view('admin/close');
		
	}
	
	public function usato() { /* pagina lista usati */
		
		if (!$this->session->user) redirect('admin/login');
		
		$data['usati']=$this->usato_model->getUsati(true); // con true prendo anche quelli con visible==0
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		$this->load->view('admin/usato/list',$data);
		$this->load->view('admin/scripts');	
		$this->load->view('admin/usato/list_scripts');	
		$this->load->view('admin/close');
		
	}

	public function usato_new() { /* pagina nuovo usato */	
		
		if (!$this->session->user) redirect('admin/login');
			
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		$this->load->view('admin/usato/new');
		$this->load->view('admin/scripts');	
		$this->load->view('admin/usato/new_scripts');
		$this->load->view('admin/close');
		
	}
	
	public function usato_save() { /* salvataggio usato */		
		
		if (!$this->session->user) {
			audit_log("Error: tentativo salvataggio utente non loggato. (admin/usato_save)");
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
			// salvo record usato
			if (is_numeric($newid=$this->usato_model->createUsato($record))) {
				audit_log("Message: salvato record usato ".json_encode($record)." con ID $newid. (admin/usato_save)");
				// sposto immagini tmp in cartella usato
				$gallery_files=json_decode($post['gallery_files']);
				$tmpStoreFolder=$this->config->item('tmp_store_folder'); 
				$storeFolder=str_replace("%type%",$post['type'],$this->config->item('store_folder')); 
				if (isset($banner_file[0])) {
					if (rename ($tmpStoreFolder.$banner_file[0],$storeFolder.$banner_file[0])) {
						audit_log("Message: spostata foto banner ".$banner_file[0].". (admin/usato_save)");
					}else{
						audit_log("Error: spostamento foto banner ".$banner_file[0].". (admin/usato_save)");
					}
				}
				if (isset($home_file[0])) {
					if (rename ($tmpStoreFolder.$home_file[0],$storeFolder.$home_file[0])) {
						audit_log("Message: spostata foto home ".$home_file[0].". (admin/usato_save)");
					}else{
						audit_log("Error: spostamento foto home ".$home_file[0].". (admin/usato_save)");
					}
				}
				if (isset($gallery_files[0])) {
					foreach ($gallery_files as $file) {
						if (rename ($tmpStoreFolder.$file,$storeFolder.$file)) {
							audit_log("Message: spostata foto gallery ".$file.". (admin/usato_save)");
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
				audit_log("Message: salvataggio usato effettuato ".json_encode($post).". (admin/usato_save)");
				echo "1";
			}else{
				audit_log("Error: salvataggio record usato ".json_encode($record).". Errore DB ".$newid['message'].". (admin/usato_save)");				
				echo $newid['message'];
			}			
		}else{
			// validazione no
			echo strip_tags(validation_errors());
		}
				
	}
	
	public function usato_view($url) { /* pagina dettagli usato */
		
		if (!$this->session->user) redirect('admin/login');
		
		if (!isset($url)) show_404();
		
		// carico usato
		if (!$usato=$this->usato_model->getUsatoByUrl($url)) show_404();
		$usato->pics=$this->usato_model->getUsatoPics($usato->id);
		$usato->home_file=$usato->img_home=="null.jpg" ? "[]" : json_encode(array($usato->img_home));
		$usato->banner_file=$usato->img_banner=="null.jpg" ? "[]" :json_encode(array($usato->img_banner));
		$usato->descr=json_decode($usato->descr);
		$usato->tecniche=json_decode($usato->tecniche);
		$usato->accessori=json_decode($usato->accessori);
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
			audit_log("Error: tentativo salvataggio utente non loggato. (admin/usato_save)");
			exit("Operazione non consentita");
		}
			
		if (!isset($id)) {
			audit_log("Error: Tentativo di update usato senza parametro ID. (admin/usato_update)");
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
			// aggiorno record usato
			if ($update=$this->usato_model->updateUsato($record,$id)) { 
				audit_log("Message: aggiornato record usato ".json_encode($record)." con ID $id. (admin/usato_update)");
				// sposto immagini tmp in cartella usato
				$gallery_files=json_decode($post['gallery_files']);
				$tmpStoreFolder=$this->config->item('tmp_store_folder'); 
				$storeFolder=str_replace("%type%",$post['type'],$this->config->item('store_folder')); 
				audit_log("&&&& ".json_encode($banner_file));
				if (isset($banner_file[0])) {
					if (rename ($tmpStoreFolder.$banner_file[0],$storeFolder.$banner_file[0])) {
						audit_log("Message: spostata foto banner ".$banner_file[0].". (admin/usato_update)");
					}else{
						audit_log("Error: spostamento foto banner ".$banner_file[0].". (admin/usato_update)");
					}
				}
				if (isset($home_file[0])) {
					if (rename ($tmpStoreFolder.$home_file[0],$storeFolder.$home_file[0])) {
						audit_log("Message: spostata foto home ".$home_file[0].". (admin/usato_update)");
					}else{
						audit_log("Error: spostamento foto home ".$home_file[0].". (admin/usato_update)");
					}
				}
				if (isset($gallery_files[0])) {
					foreach ($gallery_files as $file) {
						if (rename ($tmpStoreFolder.$file,$storeFolder.$file)) {
							audit_log("Message: spostata foto gallery ".$file.". (admin/usato_update)");
						}else{
							audit_log("Error: spostamento foto gallery ".$file.". (admin/usato_update)");
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
				audit_log("Message: aggiornamento usato effettuato ".json_encode($post).". (admin/usato_update)");
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
			audit_log("Error: tentativo salvataggio utente non loggato. (admin/usato_save)");
			exit("Operazione non consentita");
		}
		
		if (!$this->input->post()) {
			audit_log("Error: Tentativo di delete usato senza parametro ID. (admin/usato_delete)");
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
				foreach ($_FILES['file']['tmp_name'] as $tempFile) {  
					if ($storeFile=$this->loadFile($tempFile,$storeFolder)) {
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
				if ($storeFile=$this->loadFile($_FILES['file']['tmp_name'],$storeFolder)) {
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
	
	private function loadFile($tempFile,$storeFolder) { /* upload file con nome random; return nome */
		$storeFile=random_string('alnum',8).".jpg";   
		$targetFile=$storeFolder.$storeFile;
		if (move_uploaded_file($tempFile,$targetFile)) return $storeFile;		
		return false;
		
	}
	
}
