<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contatti extends CI_Controller {

	public function index() {
		
		$lang=$this->session->lang ? $this->session->lang : "italian";	
		$jlang=$this->session->jlang ? $this->session->jlang : "it";	
		$this->lang->load('custom',$lang);
		$this->session->set_userdata('next','contatti');
		
		// validazione form contatti
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nome', $this->lang->line('custom_contatti_07'), 'required',
				array('required' => $this->lang->line('custom_form_01'))
		);
		$this->form_validation->set_rules('cognome', $this->lang->line('custom_contatti_08'), 'required',
				array('required' => $this->lang->line('custom_form_01'))
		);
		$this->form_validation->set_rules('email', $this->lang->line('custom_contatti_09'), 'required|valid_email',
				array('required' => $this->lang->line('custom_form_02'),
					  'valid_email' => $this->lang->line('custom_form_03')
				)
		);
		$this->form_validation->set_rules('telefono', $this->lang->line('custom_contatti_10'), 'required',
				array('required' => $this->lang->line('custom_form_01'))
		);
		$this->form_validation->set_rules('indirizzo', $this->lang->line('custom_contatti_11'), 'required',
				array('required' => $this->lang->line('custom_form_01'))
		);
		$this->form_validation->set_rules('citta', $this->lang->line('custom_contatti_12'), 'required',
				array('required' => $this->lang->line('custom_form_02'))
		);
		$this->form_validation->set_rules('provincia', $this->lang->line('custom_contatti_13'), 'required|max_length[2]',
				array('required' => $this->lang->line('custom_form_02'),
					  'max_length' => $this->lang->line('custom_form_03')
				)
		);
		$this->form_validation->set_rules('cap', $this->lang->line('custom_contatti_14'), 'required|numeric|exact_length[5]',
				array('required' => $this->lang->line('custom_form_01'),
					  'numeric' => $this->lang->line('custom_form_03'),
					  'exact_length' => $this->lang->line('custom_form_03')
				)
		);
		
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
				
		if ($this->form_validation->run() !== FALSE) {
			// procedura creazione e invio mail
			$post=$this->input->post();
			$type="contatti";
			$this->session->set_flashdata('esito',$this->common->sendMail($post,$type));
			redirect(current_url());			
		}
		
		/* COMMON */
		// dati menu prodotti
		$dati['menuprod']=$this->common->buildProductsMenu();
		
		$this->load->view('templates/start');
		$this->load->view('templates/menu', $dati);
		$this->load->view('contatti');
		$this->load->view('templates/footer');
		$this->load->view('templates/scripts');
		$this->load->view('scripts/contatti');
		$this->load->view('templates/close');
	}

}
