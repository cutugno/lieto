<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servizi extends CI_Controller {

	public function index($cat) {
		
		$lang="it"; // eliminare quando avremo pulsanti traduzioni e sostituire con valore in sessione
		$dati['cat']=$cat;
						
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
		$this->load->view('servizi', $dati);
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
		
	}
	
	public function assistenza() {
		
		$lang="it"; // eliminare quando avremo pulsanti traduzioni e sostituire con valore in sessione
		$dati['cat']="ASSISTENZA";
		
		// dati assistenza
		$assistenza=$this->prodotti_model->getServices();
		foreach ($assistenza as $key=>$val) {
			$descr=json_decode($val->descr);
			$assistenza[$key]->descr=$descr->$lang;
		}
		$dati['assistenza']=$assistenza;
		
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
		$this->load->view('assistenza', $dati);
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		$this->load->view('scripts/assistenza');
		// custom scripts
		$this->load->view('templates/close');
	}

}
