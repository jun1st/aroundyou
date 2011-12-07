<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once BASEPATH.'core/Model.php';
	
	class User_model extends CI_Model{
		
		var $id;
		var $name;
		var $email;
		var $password;
		var $weibo;
		var $register_time;
		var $last_login_time;
		var $last_activity_time;
		var $profile_image_path;
		var $description;
		var $website;
		var $location;
		var $birthday;
		
		function __construct()
		{
			parent::__construct();
		}
		
		function get_user($name)
		{
			$query = $this->db->get_where('users', array('name'=>$name));
			
			return $query->row();
		}
		
		function get_users()
		{
			$query = $this->db->get('users');
			
			return $query->result();
		}
		
		function update_profile_image($new_profile_image_path, $user_id)
		{
			
			$data = array(
				'profile_image_path' => $new_profile_image_path
			);
			
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
		
		}
	}
?>