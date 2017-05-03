<?php

	class Usato_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getUsati() {		
			$query=$this->db->where('visible',1)
							->get('usato');						
			return $query->result();
		}
		
		public function getUsatoByUrl($url) {
			$query=$this->db->where('url',$url)
							->get('usato');
			return $query->row();
		}
		
		public function getUsatoPics($id) {
			$query=$this->db->where('id_usato',$id)
							->order_by('pic')
							->get('usato_pics');
			return $query->result();
		}
	
	}
	
