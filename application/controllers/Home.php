<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->load->view('templates/start');
		$this->load->view('templates/menu');
		$this->load->view('home');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		// custom scripts
		$this->load->view('templates/close');
	}
}
