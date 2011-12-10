<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/message_model.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/comment_model.php';
	//include_once $_SERVER['DOCUMENT_ROOT'] . '/application/helpers/relatime_time.php';

	class Message extends My_Controller
	{
		function __contruct()
		{
			parent::__construct();
		}
		public function index()
		{
			$this->load->helper('date');
			$this->load->Model('Message_model');
			
			$this->db->select("messages.id as message_id, topic, content, posted_time, users.name as user_name, users.profile_tiny_image_path as profile_image");
			$this->db->from("messages");
			$this->db->join("users", 'messages.user_id = users.id');

			$data['messages'] = $this->db->get()->result();
			
			$this->load->view('Message/index', $data);
		}
		
		public function view($id)
		{	
			$this->load->helper('date');
			$this->db->select("messages.id as message_id, topic, content, posted_time, users.name as user_name");
			$this->db->from("messages");
			$this->db->join("users", 'messages.user_id = users.id');
			$this->db->where('messages.id', $id);
			$data['message'] = $this->db->get()->row();
			
			
			if ($data['message'] == null) {
				echo 'not found';
			}
			else
			{
				$this->db->select("content, posted_time, users.name as user_name");
				$this->db->from('comments');
				$this->db->join('users', 'user_id = users.id');
				$this->db->where('message_id', $id);
				$data['comments'] = $this->db->get()->result();
				
				$this->load->view('Message/view', $data);
			}
		}
		
		public function add()
		{

			if($this->session->userdata('is_login') != 'true')
				redirect('login/');
			
			if(isset($_POST['submit']))
			{
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('topic', '标题', 'required|max_length[40]');
				$this->form_validation->set_rules('content', '内容', 'required|max_length[140]');
				
				if ($this->form_validation->run() == TRUE) {
				
					$message = new Message_model;
					$message->topic = $this->input->post('topic');
					$message->content = $this->input->post('content');
					$message->posted_time = date('Y-m-d H:i:s');
					$message->user_id = $this->session->userdata('user')->id;
					$message->latitude = 1;
					$message->longitude = 1;
				
					$this->db->insert('messages', $message);
				}
			}
			
			$data['user'] = $this->session->userdata('user');
			
			$this->load->view('Message/add', $data);
		}
		
		public function comment()
		{
			if (isset($_POST['submit'])) {
				
				$comment = new Comment_model;
				$comment->message_id = $this->input->post('message_id');
				$comment->user_id = $this->session->userdata('user')->id;
				$comment->content = $this->input->post('comment_content');
				$comment->posted_time = date('Y-m-d H:i:s');
				
				$this->db->insert('comments', $comment);
				
				redirect("message/view/$comment->message_id");
			}
		}
	}

?>