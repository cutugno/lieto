<?php

	class Users_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
				
		public function checkLogin ($dati) {									
			$query=$this->db->where('username',$dati['user'])
						->where('password',$dati['password'])
						->where('is_active',1)
						->get('users');
			return $query->row();
		}
		
		public function setLastLogin($id) {
			$query=$this->db->set('last_login','now()',false)
							->where('id',$id)
							->update('users');
			return $query;
		}
		
	}	
	
?>
