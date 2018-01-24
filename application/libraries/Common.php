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
	
	public function cleanObsoleteFiles() {
		
		$CI =& get_instance();
		$CI->load->database();
		$CI->config->load('admin');
		
		$query=$CI->db->query("SELECT GROUP_CONCAT(f) as files FROM (select group_concat(img_home,',',img_banner) as f from usato AS f UNION select pic as f from usato_pics AS f UNION select group_concat(img_home,',',img_banner,',',link) as f from offerte AS f UNION select pic as f from offerte_pics AS f) AS T");
		$files=$query->row()->files;
		$realFiles=explode(',',$files);
		foreach ($realFiles as $key=>$file) {
			// elimino i caratteri del json
			$pattern[]='/("it":")/';
			$pattern[]='/("en":")/';
			$cosa[]='"';
			$cosa[]='{';
			$cosa[]='}';
			$file=preg_replace($pattern,"",$file);
			$file=str_replace($cosa	,"",$file);
			$realFiles[$key]=$file;
		}
		$realFiles[]="null.jpg"; // null.jpg non va mai cancellato
		
		$deletedFiles=0; // contatore
		
		// devo controllare per ogni file di public/img/offerte, public/img/usato e public se è presente anche in $files: se non cancello
		$storeDir=$CI->config->item('store_folder');
		$offerteDir=str_replace("%type%","offerte",$storeDir);
		$usatoDir=str_replace("%type%","usato",$storeDir);
		$publicDir=$CI->config->item('public_folder');
		$offerteFiles=$this->cleanScanDir($offerteDir);
		foreach ($offerteFiles as $file) {
			if (!in_array($file,$realFiles)) {
				if (!is_dir($offerteDir.$file)) {
					unlink($offerteDir.$file);
					$deletedFiles++;
				}
			}
		}
		$usatoFiles=$this->cleanScanDir($usatoDir);
		foreach ($usatoFiles as $file) {
			if (!in_array($file,$realFiles)) {
				if (!is_dir($usatoDir.$file)) {
					unlink($usatoDir.$file);
					$deletedFiles++;
				}
			}
		}
		$publicFiles=$this->cleanScanDir($publicDir);
		foreach ($publicFiles as $file) {
			if (!in_array($file,$realFiles)) {
				if (!is_dir($publicDir.$file)) {
					unlink($publicDir.$file);
					$deletedFiles++;
				}
			}
		}
		
		// svuoto directory tmp
		$tmpDir=$CI->config->item('tmp_store_folder');
		$tmpFiles=$this->cleanScanDir($tmpDir);
		foreach ($tmpFiles as $item) {
			if (file_exists($tmpDir.$item)) {
				unlink ($tmpDir.$item);
				$deletedFiles++;
			}
				
		}
		
		audit_log("Message: Bonifica file obsoleti completata. $deletedFiles file cancellato/i");
		
	}
	
	private function cleanScanDir($dir) {
		$files = array_filter(scandir($dir), function($item) {
			return $item[0] !== '.';
		});
		return $files;
	}
	
	public function getOgData($page) {
		$CI =& get_instance();
		
		// carico dati seo OpenGraph da file lingua -> array("title","description")
		$title=$CI->lang->line('og_'.$page.'_title');
		$description=$CI->lang->line('og_'.$page.'_description');
		return array("title"=>$title,"description"=>$description);
	}
		
}
