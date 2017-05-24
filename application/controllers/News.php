<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function index() {
		
		$lang="it"; // eliminare quando avremo pulsanti traduzioni e sostituire con valore in sessione

		/* LISTA NEWS */
		
		// dati menu prodotti
		if ($this->session->menuprod){
			$dati['menuprod']=$this->session->menuprod;
		}else{
			$dati['menuprod']=$this->common->buildProductsMenu($lang="it");
			$this->session->menuprod=$dati['menuprod'];
		}
		
		// news
		if ($news=$this->news_model->getNews()) {
			foreach ($news as $key=>$val) {
				$news[$key]->ts=convertDateTime($val->ts);
				$titolo=json_decode($val->titolo);
				$abst=json_decode($val->abst);
				$news[$key]->titolo=$titolo->$lang;
				$news[$key]->abst=$abst->$lang;
			}
			$dati['news']=$news;
		}else{
			$dati['news']="";
		}
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('news/list');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
	}
	
	public function single ($news) {
		
		/* SINGOLA NEWS */
				
		if (!isset($news)) redirect('news');
		
		$lang="it"; // eliminare quando avremo pulsanti traduzioni e sostituire con valore in sessione
		
		// dati menu prodotti
		if ($this->session->menuprod){
			$dati['menuprod']=$this->session->menuprod;
		}else{
			$dati['menuprod']=$this->common->buildProductsMenu($lang="it");
			$this->session->menuprod=$dati['menuprod'];
		}
		
		// dati singola news
		if (!$news=$this->news_model->getNewsbyUrl($news)) show_404();
		$news->ts=convertDateTime($news->ts);
		$news->titolo=json_decode($news->titolo); $news->titolo=$news->titolo->$lang;
		$news->text=json_decode($news->text); $news->text=$news->text->$lang;
	
		$dati['news']=$news;
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('news/single');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
		
	}
}
