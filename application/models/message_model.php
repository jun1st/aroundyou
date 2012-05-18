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
		var $comments_count;
		var $street_id;
		var $region_id;
		
		function __construct()
		{
			parent::__construct();
		}
		
		function add_message($content, $user_id, $region_id, $latitude, $longitude, $street_id)
		{
			$message = new Message_model;
			$message->content = $content;
			$message->posted_time = date('Y-m-d H:i:s');
			$message->user_id = $user_id;
			$message->latitude = $latitude;
			$message->longitude = $longitude;
			$message->street_id = $street_id;
			$message->region_id = $region_id;

			$this->db->insert('messages', $message);
			
			// $message_id = $this->db->insert_id();
			
			// $message_region = array(
			// 		'message_id' => $message_id,
			// 		'region_id' => $region_id,
			// 		'added_time' => date('Y-m-d H:i:s')
			// );
			
			// $this->db->insert('message_region', $message_region);
			
			return $message_id;
		}
		
		function add_comment($message_id, $user_id, $content, $posted_time)
		{
			$this->load->model('Comment_model');
			$comment = new Comment_model;
			$comment->message_id = $message_id;
			$comment->user_id = $user_id;
			$comment->content = $content;
			$comment->posted_time = $posted_time;
				
			$this->db->insert('comments', $comment);
			
		}
		
        function update_message($message_id, $content, $new_region_id)
        {
            $data = array('content' => $content);
            $this->db->where('id', $message_id);
            $this->db->update('messages', $data);
            
            $this->update_regions($message_id, $new_region_id);
        }
        
        function get_messages_count()
        {
            return $this->db->count_all('messages');
        }
		
		/*
		//get messages with auth, region
		*/
		function get_messages($page_size=NULL, $which_page=NULL, $last_message_id=NULL, &$total_count)
		{	
			$total_count = $this->db->count_all('messages');
			
			$this->db->select("messages.id as message_id, messages.content as content, messages.posted_time,
				messages.comments_count, users.id as user_id, users.name as user_name, 
				users.description as user_description, profile_tiny_image_path, streets.name_cn as street, regions.name as region_name");
			$this->db->from("messages");
			$this->db->join("users", 'messages.user_id = users.id');
			$this->db->join('streets', 'messages.street_id = streets.id');
			$this->db->join('regions', 'messages.region_id = regions.id', 'left');
			if (isset($last_message_id) && !empty($last_message_id)) {
				$this->db->where("messages.id > ", $last_message_id);
			}
			$this->db->order_by("posted_time", "desc");
            if (is_null($page_size) || $page_size == 0) {
                $page_size = PAGE_SIZE;
            }
            if (is_null($which_page)) {
            	$which_page = 0;
            }
			$this->db->limit($page_size, $which_page * $page_size);
			return $this->db->get()->result();
		}
        
        //get hot messages
        function get_hot_messages($page_size=NULL, $which_page=NULL, &$count)
        {
			$count = $this->db->count_all('messages');
			
			$this->db->select("messages.id as message_id, messages.content as content, messages.posted_time,
				messages.comments_count, users.id as user_id, users.name as user_name, users.description as user_description, 
				profile_tiny_image_path, streets.name_cn as street, regions.name as region_name");
			$this->db->from("messages");
			$this->db->join("users", 'messages.user_id = users.id');
			$this->db->join("streets", "messages.street_id = streets.id");
			$this->db->join('regions', 'messages.region_id = regions.id', 'left');
            if (!isset($which_page)) {
                $which_page = 0;
            }
			if (!isset($page_size)) {
				$page_size = PAGE_SIZE;
			}
			$this->db->order_by("comments_count", "desc");
			$this->db->order_by("messages.posted_time", "desc");
            $this->db->limit($page_size, $which_page * $page_size);
            return $this->db->get()->result();
        }
		
		function get_messages_by_region($region_id, $page_size=NULL, $last_message_id=NULL, $which_page=NULL, &$count)
		{
			$this->db->from("messages");
			$this->db->where('messages.region_id', $region_id);
			$count = $this->db->count_all_results();
			
			$this->db->select("messages.id as message_id, messages.content as content, 
				messages.posted_time, messages.comments_count, users.id as user_id, users.name as user_name, 
				users.description as user_description, profile_tiny_image_path");
			$this->db->from("messages");
			$this->db->join("users", 'messages.user_id = users.id');
			$this->db->where('messages.region_id', $region_id);
			if (isset($last_message_id) && !empty($last_message_id)) {
				$this->db->where("messages.id > ", $last_message_id);
			}
            if (!isset($which_page)) {
                $which_page = 0;
            }
			if (!isset($page_size)) {
				$page_size = PAGE_SIZE;
			}
			$this->db->order_by("posted_time", "desc");
			$this->db->limit($page_size, $which_page * $page_size);
			
			return $this->db->get()->result();
			
		}
		
		function get_messages_by_user($id, $page)
		{
			$this->db->select("messages.id as message_id, messages.content as content, messages.posted_time, 
				users.id as user_id, users.name as user_name, users.description as user_description, profile_tiny_image_path, 
				regions.name as region_name");
			$this->db->from("messages");
			$this->db->join("users", 'messages.user_id = users.id');
			$this->db->join('regions', 'messages.region_id = regions.id', 'left');
			$this->db->where('users.id', $id);
			
			if (!isset($page)) {
                $page = 0;
            }
			$this->db->limit(PAGE_SIZE, $page * PAGE_SIZE);
			$this->db->order_by("posted_time", "desc");
			
			return $this->db->get()->result();
			
		}
		
		function get_message($id)
		{
			$query = $this->db->get_where('messages', array('id'=>$id));
			
			return $query->row();
		}
        
        function get_message_detail($id)
        {
            $this->db->select("messages.id as message_id, topic, content, posted_time, users.id as user_id, users.name as user_name,
            	users.description as user_description, users.profile_tiny_image_path as user_profile_image, regions.name as region_name,
            	streets.name_cn as street");
            $this->db->from("messages");
            $this->db->join("users", 'messages.user_id = users.id');
            $this->db->join('regions', 'messages.region_id = regions.id', 'left');
            $this->db->join("streets", "messages.street_id = streets.id", "left");
            $this->db->where('messages.id', $id);
            
            return $this->db->get()->row();
            
        }
		
		function get_comments_of_message($id)
		{
			$query = $this->db->get_where('comments', array('message_id'=>$id));
			
			return $query->result();
		}
		
        
        function update_regions($message_id, $new_region_ids)
        {
            $this->db->delete('message_region', array('message_id'=>$message_id));
            
            $data = array('message_id'=>$message_id, 'region_id'=>$new_region_ids);
            
            $this->db->insert('message_region', $data);
        }
	}
?>