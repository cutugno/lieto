<?php

	class Offerte_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getOfferte($all=false) {		
			if (!$all) $query=$this->db->where('visible',1);
			$query=$this->db->order_by('nome')
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
		
		public function createOfferta($record) {
			$this->db->db_debug = FALSE; // mi serve l'eventuale messaggio errore

			if ($query=$this->db->set($record)->insert('offerte')) return $this->db->insert_id();
			return $this->db->error();
		}
		
		public function createOffertaPics($pics) {
			$query=$this->db->insert_batch('offerte_pics',$pics);
			return $query;
		}
		
		public function updateOfferta($record,$id) {
			$this->db->db_debug = FALSE; // mi serve l'eventuale messaggio errore

			if ($query=$this->db->set($record)->where('id',$id)->update('offerte')) return $id;
			return $this->db->error();
		}
		
		public function deleteOfferta($id) {
			$query=$this->db->where('id',$id)
							->delete('offerte');
			return $query;
		}
		
		public function deleteOffertaPics($tokeep,$id_usato) {
			// elimino tutte le foto dell'usato che non sono presenti in $tokeep
			$query=$this->db->where('id_offerta',$id_usato)
							->where_not_in('id',$tokeep)
							->delete('offerte_pics');
			return $this->db->affected_rows();
		}
	
	}
	
