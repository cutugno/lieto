<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preventivo extends CI_Controller {

	public function index() {
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','preventivo');
		
		// validazione form preventivo
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nome', $this->lang->line('custom_preventivo_07'), 'required',
				array('required' => $this->lang->line('custom_form_01'))
		);
		$this->form_validation->set_rules('cognome', $this->lang->line('custom_preventivo_08'), 'required',
				array('required' => $this->lang->line('custom_form_01'))
		);
		$this->form_validation->set_rules('email', $this->lang->line('custom_preventivo_09'), 'required|valid_email',
				array('required' => $this->lang->line('custom_form_02'),
					  'valid_email' => $this->lang->line('custom_form_03')
				)
		);
		$this->form_validation->set_rules('telefono', $this->lang->line('custom_preventivo_10'), 'required',
				array('required' => $this->lang->line('custom_form_01'))
		);
		$this->form_validation->set_rules('indirizzo', $this->lang->line('custom_preventivo_11'), 'required',
				array('required' => $this->lang->line('custom_form_01'))
		);
		$this->form_validation->set_rules('citta', $this->lang->line('custom_preventivo_12'), 'required',
				array('required' => $this->lang->line('custom_form_02'))
		);
		$this->form_validation->set_rules('provincia', $this->lang->line('custom_preventivo_13'), 'required|max_length[2]',
				array('required' => $this->lang->line('custom_form_02'),
					  'max_length' => $this->lang->line('custom_form_03')
				)
		);
		$this->form_validation->set_rules('cap', $this->lang->line('custom_preventivo_14'), 'required|numeric|exact_length[5]',
				array('required' => $this->lang->line('custom_form_01'),
					  'numeric' => $this->lang->line('custom_form_03'),
					  'exact_length' => $this->lang->line('custom_form_03')
				)
		);
		$this->form_validation->set_rules('richiesta', $this->lang->line('custom_preventivo_15'), 'required',
				array('required' => $this->lang->line('custom_form_02'))
		);
		
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
				
		if ($this->form_validation->run() !== FALSE) {
			// procedura creazione e invio mail
			
			$this->session->set_flashdata('ok', 1);
			redirect(current_url());
		};
		
		/* COMMON */
	
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('preventivo');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		$this->load->view('scripts/preventivo');
		$this->load->view('templates/close');
	}
}
