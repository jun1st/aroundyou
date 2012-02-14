<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once BASEPATH.'core/Model.php';
	
	class User_OAuth_Model extends CI_Model
	{
		var $user_id;
		var $oauth_user_id;
		var $oauth_type;
		
		public function add($id, $oauth_id, $type)
		{
			$instance = new User_OAuth_Model;
			$instance->user_id = $id;
			$instance->oauth_user_id = $oauth_id;
			$instance->oauth_type = $type;
			
			$this->db->insert('users_oauth', $instance);
		}
		
		
		public function get_oauth_user($oauth_id, $oauth_type)
		{
			$query = $this->db->get_where('users_oauth', array('oauth_user_id'=>$oauth_id, 'oauth_type'=>$oauth_type));
			
			return $query->row();
			
		}
	}

?>