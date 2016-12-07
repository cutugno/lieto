<?php

	class Prodotti_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getProdCat() {
		
			$query=$this->db->where('visible',1)
							->get('catprod');						
			return $query->result();

		}
		
		public function getProducts() {
			
			$ids=array("2","3");
			$query=$this->db->where_in('visible', $ids)
							->order_by('nome','ASC')
							->get('prodotti');
			return $query->result();
			
		}
		
		public function getServices() {
			
			$ids=array("1","3");
			$query=$this->db->where_in('visible', $ids)
							->order_by('nome','ASC')
							->get('prodotti');
			return $query->result();
			
		}
		
		public function getProductbyUrl($cat,$marchio) {
			
			
			$query=$this->db->select('prodotti.*')
							->join('catprod', 'catprod.id=prodotti.id_cat')
							->where('prodotti.url',$marchio)
							->where('catprod.url',$cat)
							->get('prodotti'); 
			return $query->row();
							
		}
			
	
	}
	
