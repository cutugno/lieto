<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next',base_url());
		
		/* COMMON */
	
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		// dati partner
		$partner=array();
		array_push($partner,array("castoldi.jpg","www.castoldijet.it"));
		array_push($partner,array("ellebi.jpg","www.ellebi.com"));
		array_push($partner,array("evinrude.jpg","www.evinrude.com"));
		array_push($partner,array("fiart.jpg","www.fiart.com"));
		array_push($partner,array("fnm.jpg","www.fnm-marine.com"));
		array_push($partner,array("garmin.jpg","www.garmin.com"));
		array_push($partner,array("joker-boat.jpg","www.jokerboat.it"));
		array_push($partner,array("saver.jpg","www.saverimbarcazioni.com"));
		array_push($partner,array("saver-mg.jpg","www.saverimbarcazioni.com"));
		array_push($partner,array("sea-doo.jpg","www.sea-doo.com"));
		array_push($partner,array("selva.jpg","www.selvamarine.com"));
		array_push($partner,array("torqeedo.jpg","www.torqeedo.com"));
		array_push($partner,array("volvo-penta.jpg","www.volvopenta.com"));
		array_push($partner,array("yanmar.jpg","www.yanmaritalia.it"));
		$dati['partner']=$partner;
		
		// news (prendo le 3 più recenti)
		$news=$this->news_model->getRecentNews(3);
		foreach ($news as $key=>$val) {
			$titolo=json_decode($val->titolo);
			$abst=json_decode($val->abst);
			$news[$key]->titolo=$titolo->$jlang;
			$news[$key]->abst=$abst->$jlang;
		}
		$dati['news']=$news;
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('home',$dati);
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
	}
}
