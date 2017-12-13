<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodotti extends CI_Controller {

	public function index($cat,$marchio) {
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','prodotti/'.$cat.'/'.$marchio);
		
		// query caricamento dati prodotto
		if (!$prodotto=$this->prodotti_model->getProductbyUrl($cat,$marchio)) show_404();	
		$descr=json_decode($prodotto->descr);
		$prodotto->descr=$descr->$jlang;
		$dati['prodotto']=$prodotto;
		
		// banner
		$dati['banner']=site_url('assets/img/prodotti/banner/'.$prodotto->img_banner);
				
		/* COMMON */
		
		// dati SEO
		//var_dump (implode("_",explode("/",uri_string())));
		$dati['og']=$this->common->getOgData(implode("_",explode("/",uri_string())));
		$dati['og']['image']=$dati['banner'];
	
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start',$dati);
		$this->load->view('templates/menu');
		$this->load->view('prodotti');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
		
	}

}
