<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Common {


    public function __construct() {

    }

	public function buildProductsMenu($lang) { // restituisce i dati relativi al menu prodotti tradotti
		
		$CI =& get_instance();
		$lang="it"; // eliminare quando avremo pulsanti traduzioni e sostituire con valore in sessione
		
		$prodcat=$CI->prodotti_model->getProdCat();
		$prodotti=$CI->prodotti_model->getProducts();
		$prodmenu=array();

		$totcat=0;
		foreach ($prodcat as $val) {
			$nome=json_decode($val->nome);
			$val->nome=$nome->$lang;
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
	
	
}
