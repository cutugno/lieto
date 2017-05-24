<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contatti extends CI_Controller {

	public function index() {
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','contatti');
		
		/* COMMON */
	
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('contatti');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		$this->load->view('scripts/contatti');
		$this->load->view('templates/close');
	}
}
