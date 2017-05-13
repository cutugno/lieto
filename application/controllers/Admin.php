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
		
		// gestione upload immagini da dropzone
		$storeFolder = site_url('assets/tmp'); 
 
		if (!empty($_FILES)) {
			 
			$tempFile = $_FILES['file']['tmp_name'];     
			 
			$targetFile =  $storeFolder. $_FILES['file']['name'];
		 
			move_uploaded_file($tempFile,$targetFile);
			 
		}
		
	}

}
