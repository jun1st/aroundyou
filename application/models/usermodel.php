<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once BASEPATH.'core/Model.php';
	
	class Usermodel extends CI_Model{
		
		var $id = 0;
		var $name = '';
		var $email = '';
		var $password = '';
		var $weibo = '';
		var $register_time = '';
		var $last_login_time = '';
		var $last_activity_time = '';
		
		function __construct()
		{
			parent::__construct();
		}
		
		function get_users()
		{
			$query = $this->db->get('users');
			
			return $query->result();
		}
	}
?>