<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->config->load('admin');
	}

	public function index() {
		
		$this->load->view('admin/start');
		$this->load->view('admin/navigation');
		$this->load->view('admin/index');
		$this->load->view('admin/scripts');
		// custom scripts
		$this->load->view('admin/close');
	}
	
	public function upload() {
		
		// REST gestione upload immagini da dropzone
		// post: {"type":"usato","uploaded_files":"[]"}
		
		//$this->config->load('admin');
		
		$uploadedFiles=json_decode($this->input->post('uploaded_files'));		
		$storeFolder=$this->config->item('tmp_store_folder'); 		
		
		if (!empty($_FILES)) {		
			$this->load->helper('string'); 
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
	
	private function loadFile($tempFile,$storeFolder) {
		$storeFile=random_string('alnum',8).".jpg";   
		$targetFile=$storeFolder.$storeFile;
		if (move_uploaded_file($tempFile,$targetFile)) return $storeFile;
		
		return false;
	}
	
	public function save() {
		
		// validazione form save
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
				audit_log("Message: salvato record usato ".json_encode($record)." con ID $newid. (admin/save)");
				// sposto immagini tmp in cartella usato
				$this->config->load('admin');
				$gallery_files=json_decode($post['gallery_files']);
				$tmpStoreFolder=$this->config->item('tmp_store_folder'); 
				$storeFolder=str_replace("%type%",$post['type'],$this->config->item('store_folder')); 
				if (isset($banner_file[0])) {
					if (rename ($tmpStoreFolder.$banner_file[0],$storeFolder.$banner_file[0])) {
						audit_log("Message: spostata foto banner ".$banner_file[0].". (admin/save)");
					}else{
						audit_log("Error: spostamento foto banner ".$banner_file[0].". (admin/save)");
					}
				}
				if (isset($home_file[0])) {
					if (rename ($tmpStoreFolder.$home_file[0],$storeFolder.$home_file[0])) {
						audit_log("Message: spostata foto home ".$home_file[0].". (admin/save)");
					}else{
						audit_log("Error: spostamento foto home ".$home_file[0].". (admin/save)");
					}
				}
				if (isset($gallery_files[0])) {
					foreach ($gallery_files as $file) {
						if (rename ($tmpStoreFolder.$file,$storeFolder.$file)) {
							audit_log("Message: spostata foto gallery ".$file.". (admin/save)");
						}else{
							audit_log("Error: spostamento foto gallery ".$file.". (admin/save)");
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
						audit_log("Message: create foto gallery usato ".json_encode($pics).". (admin/save)");						
					}else{
						audit_log("Error: creazione foto gallery usato ".json_encode($pics).". (admin/save)");						
					}
				}
				$this->session->set_flashdata('save','Salvataggio usato completato');
				$this->session->set_flashdata('save_status','success');
				audit_log("Message: salvataggio usato effettuato ".json_encode($post).". (admin/save)");
				echo "1";
			}else{
				audit_log("Error: salvataggio record usato ".json_encode($record).". Errore DB ".$newid['message'].". (admin/save)");				
				echo $newid['message'];
			}			
		}else{
			echo strip_tags(validation_errors());
		}
		
	}

}
