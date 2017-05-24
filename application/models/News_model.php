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
		
		public function getRecentNews($limit) {
			$query=$this->db->order_by('ts', 'DESC')
							->limit($limit)
							->get('news');
			return $query->result();
		}
		
	}
	
