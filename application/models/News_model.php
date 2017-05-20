<?php

	class News_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getNews() {		
			$query=$this->db->where('visible',1)
							->get('news');						
			return $query->result();
		}
		
		public function getNewsByUrl($url) {
			$query=$this->db->where('url',$url)
							->get('news');
			return $query->row();
		}
		
		public function getUsatoPics($id) {
			$query=$this->db->where('id_usato',$id)
							->order_by('pic')
							->get('usato_pics');
			return $query->result();
		}
	
	}
	
