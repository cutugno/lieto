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
		$this->load->view('prodotti', $dati);
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
		
	}

}
