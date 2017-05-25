<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		
		$uploadedFiles=json_decode($this->input->post('uploaded_files'));
		$type=$this->input->post('type');
		$storeFolder="assets/tmp/$type/"; 
		
		if (!empty($_FILES)) {		
			$this->load->helper('string'); 
			foreach ($_FILES['file']['tmp_name'] as $tempFile) {  
				$storeFile=random_string('alnum',8).".jpg";   
				$targetFile=$storeFolder.$storeFile;
				if (move_uploaded_file($tempFile,$targetFile)) {
					$uploadedFiles[]=$storeFile;
				}else{
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
	
	public function save() {
		
		echo json_encode($this->input->post());
		
		// sposto immagini tmp in cartella giusta
		// salvo record usato
		// salvo record usato_pics
		
	}

}
