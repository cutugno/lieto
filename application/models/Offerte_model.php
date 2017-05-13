<?php

	class Offerte_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getOfferte() {		
			$query=$this->db->where('visible',1)
							->get('offerte');						
			return $query->result();
		}
		
		public function getOffertaByUrl($url) {
			$query=$this->db->where('url',$url)
							->get('offerte');
			return $query->row();
		}
		
		public function getOffertaPics($id) {
			$query=$this->db->where('id_offerta',$id)
							->order_by('pic')
							->get('offerte_pics');
			return $query->result();
		}
	
	}
	
