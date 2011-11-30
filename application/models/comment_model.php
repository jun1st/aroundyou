<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once BASEPATH.'core/Model.php';
	
	class Comment_model extends CI_Model{
		var $id;
		var $message_id;
		var $user_id;
		var $content;
		var $posted_time;
		
		function __construct()
		{
			parent::__construct();
		}
		
		function get_comments_by_message($id)
		{
			$query = $this->db->get_where('comments', array('message_id'=>$id));
			
			return $query->result();
		}
	}
?>