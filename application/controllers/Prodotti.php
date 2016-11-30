<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodotti extends CI_Controller {

	public function index($cat,$marchio) {
		
		$lang="it"; // eliminare quando avremo pulsanti traduzioni e sostituire con valore in sessione
		
		// query caricamento dati prodotto
		if (!$prodotto=$this->prodotti_model->getProductbyUrl($cat,$marchio)) show_404();	
		$descr=json_decode($prodotto->descr);
		$prodotto->descr=$descr->$lang;
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
