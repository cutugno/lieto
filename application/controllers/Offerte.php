<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offerte extends CI_Controller {

	public function index() {

		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','offerte');
		
		/* LISTA OFFERTE */
		
		// offerte
		if ($offerte=$this->offerte_model->getOfferte()) {			
			$dati['offerte']=$offerte;
		}else{
			$dati['offerte']="";
		}
		
		// banner
		$dati['banner']=site_url('public/img/banner/offerte.jpg');
		
		/* COMMON */
		
		// dati SEO
		$dati['og']=$this->common->getOgData(uri_string());
		$dati['og']['image']=$dati['banner'];
		
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start',$dati);
		$this->load->view('templates/menu');
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
				$offerta->images[]=site_url('public/img/offerte/'.$val->pic);
			}
		}
	
		$dati['offerta']=$offerta;
		
		// banner
		$dati['banner']=site_url('public/img/offerte/'.$offerta->img_banner);
		
		// dati SEO
		$seo=json_decode($offerta->seo);
		$dati['og']['title']=$seo->og_title->$jlang;
		$dati['og']['description']=$seo->og_description->$jlang;
		$dati['og']['image']=site_url('public/img/offerte/'.$offerta->img_home);
		$dati['og']['image_width']="450";
		$dati['og']['image_height']="285";
		
		/* COMMON */
		
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start',$dati);
		$this->load->view('templates/menu');
		$this->load->view('offerte/single');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
		
	}
}
