<?php

	class Usato_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getUsati($all=false) {					
			if (!$all) $query=$this->db->where('visible',1);
			$query=$this->db->order_by('nome')
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
		
		public function createUsato($record) {
			$this->db->db_debug = FALSE; // mi serve l'eventuale messaggio errore
			
			//return 1; //TOGLIERE!!!

			if ($query=$this->db->set($record)->insert('usato')) return $this->db->insert_id();
			return $this->db->error();
		}
		
		public function createUsatoPics($pics) {
			//return true; // togliere!!!
			$query=$this->db->insert_batch('usato_pics',$pics);
			return $query;
		}
	
	}
	
