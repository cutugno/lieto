<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Common {


    public function __construct() {

    }

	public function buildProductsMenu() { // restituisce i dati relativi al menu prodotti tradotti
		
		$CI =& get_instance();
		$lang=$CI->session->lang ? $CI->session->lang : "italian";	
		$jlang=$CI->session->jlang ? $CI->session->jlang : "it";	
		$CI->lang->load('custom',$lang);
		
		$prodcat=$CI->prodotti_model->getProdCat();
		$prodotti=$CI->prodotti_model->getProducts();
		$prodmenu=array();

		$totcat=0;
		foreach ($prodcat as $val) {
			$nome=json_decode($val->nome);
			$val->nome=$nome->$jlang;
			$prodmenu[$val->id]=$val;
			$prodmenu[$val->id]->prodotti=array();
			$totcat++;
		}
		
		foreach ($prodotti as $val) {
			$val->link="prodotti/".$prodmenu[$val->id_cat]->url."/".$val->url;
			$prodmenu[$val->id_cat]->prodotti[$val->id]=$val;
		}
		
		$maxprod=0;
		foreach ($prodmenu as $val) {			
			$c=count($val->prodotti);
			if ($c>$maxprod) $maxprod=$c;			
		}
		
		return array($prodmenu,$maxprod,$totcat);
		
	}
	
	public function sendMail ($post,$type) { // invia una mail
		
		// $type può essere o "preventivo" o "contatti"
		if ( ($type!="preventivo") && ($type!="contatti") ) return "Errore parametro type sendMail ($type)";
		
		$CI =& get_instance();
		$message=$CI->load->view('templates/email/'.$type,$post,true);
			
		$CI->load->library('email');
		$CI->config->load('email');
		
		$CI->email->from($post['email'], $post['nome']." ".$post['cognome']);
		$CI->email->to($CI->config->item('to_'.$type),$CI->config->item('to_'.$type.'_name'));
		$CI->email->subject($CI->config->item('subject_'.$type));
		$CI->email->message($message);
		if ($CI->email->send(false)) {
			return "1"; // mail inviata				
		}else{
			return strip_tags($CI->email->print_debugger('header')); // errori invio mail
		}
	
	}
	
	public function resizeImage ($image,$width,$height) { // ridimensione un'immagine usando la libreria GD
		
		$CI =& get_instance();
		$CI->load->library('image_lib');
		
		$config['image_library'] = 'gd2';
		$config['file_permissions'] = '0777';
		$config['source_image'] = $image;
		$config['maintain_ratio'] = false;
		$config['width'] = $width;
		$config['height'] = $height;
		
		
		$CI->image_lib->initialize($config);
		
		if ( ! @$CI->image_lib->resize()) {			
			$return=$CI->image_lib->display_errors();
		}else{			
			$return=true;
		}
		$CI->image_lib->clear();
		return $return;
		
	}
}
