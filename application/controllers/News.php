<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function index() {
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','news');

		/* LISTA NEWS */
		
		// news
		if ($news=$this->news_model->getNews()) {
			foreach ($news as $key=>$val) {
				$news[$key]->ts=convertDateTime($val->ts);
				$titolo=json_decode($val->titolo);
				$abst=json_decode($val->abst);
				$news[$key]->titolo=$titolo->$jlang;
				$news[$key]->abst=$abst->$jlang;
			}
			$dati['news']=$news;
		}else{
			$dati['news']="";
		}
		
		// banner
		$dati['banner']=site_url('assets/img/banner/news.jpg');
		
		/* COMMON */
		
		// dati SEO
		$dati['og']=$this->common->getOgData(uri_string());
		$dati['og']['image']=$dati['banner'];
		
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start',$dati);
		$this->load->view('templates/menu');
		$this->load->view('news/list');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
	}
	
	public function single ($news) {
		
		/* SINGOLA NEWS */
				
		if (!isset($news)) redirect('news');
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','news/'.$news);
		
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		// dati singola news
		if (!$news=$this->news_model->getNewsbyUrl($news)) show_404();
		$news->ts=convertDateTime($news->ts);
		$news->titolo=json_decode($news->titolo); $news->titolo=$news->titolo->$jlang;
		$news->text=json_decode($news->text); $news->text=$news->text->$jlang;
	
		$dati['news']=$news;
		
		// banner
		$dati['banner']=site_url('assets/img/banner/news.jpg');
		
		/* COMMON */
		
		// dati SEO
		//var_dump (implode("_",explode("/",uri_string())));
		$dati['og']=$this->common->getOgData(implode("_",explode("/",uri_string())));
		$dati['og']['image']=$dati['banner'];
		
		$this->load->view('templates/start',$dati);
		$this->load->view('templates/menu');
		$this->load->view('news/single');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
		
	}
}
