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
		
		function __construct()
		{
			parent::__construct();
		}
		
		function add_message($topic, $content, $user_id, $region_id)
		{
			$message = new Message_model;
			$message->topic = $topic;
			$message->content = $content;
			$message->posted_time = date('Y-m-d H:i:s');
			$message->user_id = $user_id;

			$this->db->insert('messages', $message);
			
			$message_id = $this->db->insert_id();
			
			$message_region = array(
					'message_id' => $message_id,
					'region_id' => $region_id,
					'added_time' => date('Y-m-d H:i:s')
			);
			
			$this->db->insert('message_region', $message_region);
			
			return $message_id;
		}
		
        function update_message($message_id, $content, $new_region_id)
        {
            $data = array('content' => $content);
            $this->db->where('id', $message_id);
            $this->db->update('messages', $data);
            
            $this->update_regions($message_id, $new_region_id);
        }
		/*
		//get messages with auth, region
		*/
		function get_messages()
		{	
			$this->db->select("messages.id as message_id, messages.content as content, messages.posted_time, messages.comments_count, users.id as user_id, users.name as user_name, users.description as user_description, profile_tiny_image_path, regions.name as region_name");
			$this->db->from("messages");
			$this->db->join("users", 'messages.user_id = users.id');
			$this->db->join('message_region', 'messages.id = message_region.message_id', 'left');
			$this->db->join('regions', 'message_region.region_id = regions.id', 'left');
			$this->db->order_by("posted_time", "desc");
			
			return $this->db->get()->result();
		}
		
		function get_messages_by_region($region_id)
		{
			$this->db->select("messages.id as message_id, messages.content as content, messages.posted_time, users.id as user_id, users.name as user_name, users.description as user_description, profile_tiny_image_path, regions.name as region_name");
			$this->db->from("messages");
			$this->db->join("users", 'messages.user_id = users.id');
			$this->db->join('message_region', 'messages.id = message_region.message_id');
			$this->db->join('regions', 'message_region.region_id = regions.id', 'left');
			$this->db->where('message_region.region_id', $region_id);
			$this->db->order_by("posted_time", "desc");
			
			return $this->db->get()->result();
			
		}
		
		function get_messages_by_user($id)
		{
			$this->db->select("messages.id as message_id, messages.content as content, messages.posted_time, users.id as user_id, users.name as user_name, users.description as user_description, profile_tiny_image_path, regions.name as region_name");
			$this->db->from("messages");
			$this->db->join("users", 'messages.user_id = users.id');
			$this->db->join('message_region', 'messages.id = message_region.message_id');
			$this->db->join('regions', 'message_region.region_id = regions.id', 'left');
			$this->db->where('users.id', $id);
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
            $this->db->select("messages.id as message_id, topic, content, posted_time, users.id as user_id, users.name as user_name,users.description as user_description, users.profile_tiny_image_path as user_profile_image, regions.name as region_name");
            $this->db->from("messages");
            $this->db->join("users", 'messages.user_id = users.id');
            $this->db->join('message_region', 'messages.id = message_region.message_id', 'left');
            $this->db->join('regions', 'message_region.region_id = regions.id', 'left');
            $this->db->where('messages.id', $id);
            
            return $this->db->get()->row();
            
        }
        
        function update_regions($message_id, $new_region_ids)
        {
            $this->db->delete('message_region', array('message_id'=>$message_id));
            
            $data = array('message_id'=>$message_id, 'region_id'=>$new_region_ids);
            
            $this->db->insert('message_region', $data);
        }
	}
?>