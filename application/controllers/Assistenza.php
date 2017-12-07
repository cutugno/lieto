<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assistenza extends CI_Controller {
	
	public function index() {
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','assistenza');
		
		// dati assistenza
		$assistenza=$this->prodotti_model->getServices();
		foreach ($assistenza as $key=>$val) {
			$descr=json_decode($val->descr);
			$assistenza[$key]->descr=$descr->$jlang;
		}
		$dati['assistenza']=$assistenza;
		
		// banner assistenza
		$dati['banner']=site_url('assets/img/banner/assistenza.jpg');
		
		/* COMMON */
		
		// dati SEO
		$dati['og']=$this->common->getOgData(uri_string());
		
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start',$dati);
		$this->load->view('templates/menu');
		$this->load->view('assistenza');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		$this->load->view('scripts/assistenza');
		// custom scripts
		$this->load->view('templates/close');
	}

}
