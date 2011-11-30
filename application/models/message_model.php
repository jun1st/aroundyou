<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once BASEPATH.'core/Model.php';
	
	class Message_model extends CI_Model
	{
		var $id;
		var $user_id;
		var $topic;
		var $content;
		var $latitude;
		var $longitude;
		var $posted_time;
		
		function __construct()
		{
			parent::__construct();
		}
		
		function get_messages()
		{
			$query = $this->db->get('messages');
			
			return $query->result();
		}
		
		function get_message($id)
		{
			$query = $this->db->get_where('messages', array('id'=>$id));
			
			return $query->row();
		}
	}
?>