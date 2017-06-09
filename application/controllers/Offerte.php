<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offerte extends CI_Controller {

	public function index() {

		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','offerte');
		
		/* LISTA OFFERTE */
		
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		// offerte
		if ($offerte=$this->offerte_model->getOfferte()) {			
			$dati['offerte']=$offerte;
		}else{
			$dati['offerte']="";
		}
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('offerte/list');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
	}
	
	public function single ($offerta) {
		
		/* SINGOLA OFFERTA */
		
		
		if (!isset($offerta)) redirect('offerte');
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','offerte/'.$offerta);
		
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		// dati singola offerta
		if (!$offerta=$this->offerte_model->getOffertabyUrl($offerta)) show_404();	
		$descr=json_decode($offerta->descr);
		$tecniche=json_decode($offerta->tecniche);
		$accessori=json_decode($offerta->accessori);
		$btn_txt=json_decode($offerta->btn_txt);
		$link=json_decode($offerta->link);
		$offerta->descr=$descr->$jlang;
		$offerta->btn_txt=$btn_txt->$jlang;
		$offerta->link=$link->$jlang;
		// immagini carosello 
		$offerta->images=array();
		if ($images=$this->offerte_model->getOffertaPics($offerta->id)) {
			foreach ($images as $val) {
				$offerta->images[]=site_url('assets/img/offerte/'.$val->pic);
			}
		}
	
		$dati['offerta']=$offerta;
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('offerte/single');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
		
	}
}
