<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index() {
		
		$this->load->database();
		$this->config->load('admin');
		
		$query=$this->db->query("SELECT GROUP_CONCAT(f) as files FROM (select group_concat(img_home,',',img_banner) as f from usato AS f UNION select pic as f from usato_pics AS f UNION select group_concat(img_home,',',img_banner,',',link) as f from offerte AS f UNION select pic as f from offerte_pics AS f) AS T");
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
		
		// devo controllare per ogni file di assets/img/offerte, assets/img/usato e public se è presente anche in $files: se non cancello
		$storeDir=$this->config->item('store_folder');
		$offerteDir=str_replace("%type%","offerte",$storeDir);
		$usatoDir=str_replace("%type%","usato",$storeDir);
		$publicDir=$this->config->item('public_folder');
		$offerteFiles=$this->cleanScanDir($offerteDir);
		foreach ($offerteFiles as $file) {
			if (!in_array($file,$realFiles)) {
				if (!is_dir($offerteDir.$file)) {
					unlink($offerteDir.$file);
					echo "Cancellato file ".$offerteDir.$file."<br>";
					$deletedFiles++;
				}
			}
		}
		$usatoFiles=$this->cleanScanDir($usatoDir);
		foreach ($usatoFiles as $file) {
			if (!in_array($file,$realFiles)) {
				if (!is_dir($usatoDir.$file)) {
					unlink($usatoDir.$file);
					echo "Cancellato file ".$usatoDir.$file."<br>";
					$deletedFiles++;
				}
			}
		}
		$publicFiles=$this->cleanScanDir($publicDir);
		foreach ($publicFiles as $file) {
			if (!in_array($file,$realFiles)) {
				if (!is_dir($publicDir.$file)) {
					unlink($publicDir.$file);
					echo "Cancellato file ".$publicDir.$file."<br>";
					$deletedFiles++;
				}
			}
		}
		
		// svuoto directory tmp
		$tmpDir=$this->config->item('tmp_store_folder');
		$tmpFiles=$this->cleanScanDir($tmpDir);
		foreach ($tmpFiles as $item) {
			if (file_exists($tmpDir.$item)) {
				unlink ($tmpDir.$item);
				echo "Cancellato file ".$tmpDir.$item."<br>";
				$deletedFiles++;
			}
				
		}
		
		echo "Cancellazione completata. $deletedFiles file cancellato/i";
		audit_log("Message: Bonifica file obsoleti completata. $deletedFiles file cancellato/i");
	
	}
	
	private function cleanScanDir($dir) {
		$files = array_filter(scandir($dir), function($item) {
			return $item[0] !== '.';
		});
		return $files;
	}

}
