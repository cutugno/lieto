<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Azienda extends CI_Controller {

	public function index() {
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','azienda');
		
		// banner
		$dati['banner']=site_url('assets/img/banner/azienda.jpg');
		
		/* COMMON */
		
		// dati SEO
		$dati['og']=$this->common->getOgData(uri_string());
		$dati['og']['image']=$dati['banner'];
	
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start',$dati);
		$this->load->view('templates/menu');
		$this->load->view('azienda');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
	}
}
