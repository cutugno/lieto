<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

	public function index($lang) {
		
		
		$this->session->set_userdata('lang',$lang);
		$this->session->set_userdata('jlang',substr($lang,0,2));
		
		$redir=$this->session->next ? $this->session->next : base_url();
		redirect($redir);
	
	}
}
