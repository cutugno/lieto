<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usato extends CI_Controller {

	public function index() {

		/* LISTA USATI */
		
		// dati menu prodotti
		if ($this->session->menuprod){
			$dati['menuprod']=$this->session->menuprod;
		}else{
			$dati['menuprod']=$this->common->buildProductsMenu($lang="it");
			$this->session->menuprod=$dati['menuprod'];
		}
		
		// usati
		if ($usati=$this->usato_model->getUsati()) {
			$dati['usati']=$usati;
		}else{
			$dati['usati']="";
		}
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('usato/list');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
	}
	
	public function single ($usato) {
		
		/* SINGOLO USATO */
		
		$this->output->enable_profiler(TRUE);
		
		if (!isset($usato)) redirect('usato');
		
		$lang="it"; // eliminare quando avremo pulsanti traduzioni e sostituire con valore in sessione
		
		// dati menu prodotti
		if ($this->session->menuprod){
			$dati['menuprod']=$this->session->menuprod;
		}else{
			$dati['menuprod']=$this->common->buildProductsMenu($lang="it");
			$this->session->menuprod=$dati['menuprod'];
		}
		
		// dati singolo usato 
		if (!$usato=$this->usato_model->getUsatobyUrl($usato)) show_404();	
		$descr=json_decode($usato->descr);
		$tecniche=json_decode($usato->tecniche);
		$accessori=json_decode($usato->accessori);
		$usato->descr=$descr->$lang;
		$usato->tecniche=$tecniche->$lang;
		$usato->accessori=$accessori->$lang;
		// immagini carosello 
		$usato->images=array();
		if ($images=$this->usato_model->getUsatoPics($usato->id)) {
			foreach ($images as $val) {
				$usato->images[]=site_url('assets/img/usato/'.$usato->url.'/'.$val->pic);
			}
		}
	
		$dati['usato']=$usato;
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('usato/single');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
		
	}
}
