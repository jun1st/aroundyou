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
		var $profile_small_image_path;
		var $profile_tiny_image_path;
		var $description;
		var $website;
		var $location;
		var $birthday;
		var $remember_me_token;
		var $last_visit_time;
		
		function __construct()
		{
			parent::__construct();
		}
		
		function authenticate_user($email, $password)
		{
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
			
			return $query->row();
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
		
		function update_profile_image($new_profile_image_path, $new_profile_small_image_path, 
			$new_profile_tiny_image_path, $user_id)
		{
			
			$data = array(
				'profile_image_path' => $new_profile_image_path,
				'profile_small_image_path' => $new_profile_small_image_path,
				'profile_tiny_image_path' => $new_profile_tiny_image_path
			);
			
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
		
		}
		
		function set_auth_token($remember_me_token, $user_id)
		{
			$data = array(
				'remember_me_token' =>$remember_me_token,
				'last_visit_time' => date('Y-m-d H:i:s')
			);
			
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
		}
		
		function cookie_authenticate($token)
		{
			$query = $this->db->get_where('users', array('remember_me_token'=>$token));
			
			return $query->row();
		}
	}
?>