<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usato extends CI_Controller {

	public function index() {
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','usato');

		/* LISTA USATI */

		if ($usati=$this->usato_model->getUsati()) {
			$dati['usati']=$usati;
		}else{
			$dati['usati']="";
		}
		
		// banner
		$dati['banner']=site_url('public/img/banner/usato.jpg');
		
		/* COMMON */
		
		// dati SEO
		$dati['og']=$this->common->getOgData(uri_string());
		$dati['og']['image']=$dati['banner'];
		
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start',$dati);
		$this->load->view('templates/menu');
		$this->load->view('usato/list');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
	}
	
	public function single ($usato) {
		
		/* SINGOLO USATO */
		
		if (!isset($usato)) redirect('usato');
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','usato/'.$usato);
		
		// dati singolo usato 
		if (!$usato=$this->usato_model->getUsatobyUrl($usato)) show_404();	
		$descr=json_decode($usato->descr);
		$tecniche=json_decode($usato->tecniche);
		$accessori=json_decode($usato->accessori);
		$usato->descr=$descr->$jlang;
		$usato->tecniche=$tecniche->$jlang;
		$usato->accessori=$accessori->$jlang;
		// immagini carosello 
		$usato->images=array();
		if ($images=$this->usato_model->getUsatoPics($usato->id)) {
			foreach ($images as $val) {
				$usato->images[]=site_url('public/img/usato/'.$val->pic);
			}
		}
	
		$dati['usato']=$usato;
		
		// banner
		$dati['banner']=site_url('public/img/usato/'.$usato->img_banner);
		
		// dati SEO
		$seo=json_decode($usato->seo);
		$dati['og']['title']=$seo->og_title->$jlang;
		$dati['og']['description']=$seo->og_description->$jlang;
		$dati['og']['image']=site_url('public/img/usato/'.$usato->img_home);
		$dati['og']['image_width']="450";
		$dati['og']['image_height']="285";
		
		/* COMMON */
		
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start',$dati);
		$this->load->view('templates/menu');
		$this->load->view('usato/single');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
		
	}
}
