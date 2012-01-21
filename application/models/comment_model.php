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
        
        function get_comments_details_by_message($message_id)
        {
			$this->db->select("content, posted_time, users.id as user_id,users.name as user_name,
                users.description as user_description, users.profile_tiny_image_path as profile_image");
			$this->db->from('comments');
			$this->db->join('users', 'user_id = users.id');
			$this->db->where('message_id', $message_id);
			$this->db->order_by('posted_time', 'desc');
            
            return $this->db->get()->result();
        }
	}
?>