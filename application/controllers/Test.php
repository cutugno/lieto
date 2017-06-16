<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index() {
		
		$this->load->database();
		$this->config->load('admin');
		
		$query=$this->db->query("SELECT GROUP_CONCAT(f) as files FROM (select group_concat(img_home,',',img_banner) as f from usato AS f UNION select pic as f from usato_pics AS f UNION select group_concat(img_home,',',img_banner,',',link) as f from offerte AS f UNION select pic as f from offerte_pics AS f) AS T");
		$files=$query->row()->files;
		$files=explode(',',$files);
		foreach ($files as $key=>$file) {
			// elimino i caratteri del json
			$pattern[]='/("it":")/';
			$pattern[]='/("en":")/';
			$cosa[]='"';
			$cosa[]='{';
			$cosa[]='}';
			$file=preg_replace($pattern,"",$file);
			$file=str_replace($cosa	,"",$file);
			$files[$key]=$file;
		}
		
		$tmpDir=$this->config->item('tmp_store_folder');
		$tmpFiles=$this->cleanScanDir($tmpDir);
		array_walk($tmpFiles,'deleteFile');
		
	}
	
	private function cleanScanDir($dir) {
		$files = array_filter(scandir($dir), function($item) {
			return $item[0] !== '.';
		});
		return $files;
	}
	
	function deleteFile($item) {
		if (file_exists($item)) unlink ($item);
	}
}
