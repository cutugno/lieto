<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contatti extends CI_Controller {

	public function index() {
		
		/* COMMON */
	
		// dati menu prodotti
		if ($this->session->menuprod){
			$dati['menuprod']=$this->session->menuprod;
		}else{
			$dati['menuprod']=$this->common->buildProductsMenu($lang="it");
			$this->session->menuprod=$dati['menuprod'];
		}
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('contatti');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		$this->load->view('contatti_scripts');
		$this->load->view('templates/close');
	}
}
