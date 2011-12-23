<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/message_model.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/comment_model.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/region_model.php';
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
		$this->load->Model('Region_model');

		$data['messages'] = $this->Message_model->get_messages();
		$data['regions'] = $this->Region_model->get_regions();
			
		$this->load->view('Message/index', $data);
	}
		
	public function get_by_region()
	{
		if(empty($_GET['name']))
		{
			redirect('/messages');
		}
		$this->load->helper('date');
		$this->load->Model('Message_model');
		$this->load->Model('Region_model');
		$region = $this->Region_model->get_region_by_name($_GET['name']);
		$data['messages'] = $this->Message_model->get_messages_by_region($region->id);
		$data['regions'] = $this->Region_model->get_regions();
			
		$this->load->view('Message/index', $data);
	}
		
	public function view($id)
	{	
		$this->load->helper('date');
    
		$this->load->Model('Message_model');
    
		$data['message'] = $this->Message_model->get_message_detail($id);
			
		if ($data['message'] == null) {
			echo 'not found';
		}
		else
		{
			$this->load->Model('Coment_model');
			$data['comments'] = $this->db->get_comments_details_by_message();
				
			$this->load->view('Message/view', $data);
		}
	}
	
	public function edit($id)
	{
        $this->load->Model('Message_model');
        $this->load->Model('Region_model');
		if (!isset($id)) {
            redirect('/messages');
		}
        
        if (isset($_POST['submit'])) {
			$this->load->library('form_validation');
				
			$this->form_validation->set_rules('content', '内容', 'required|max_length[140]');
			$this->form_validation->set_rules('regions', '地标', 'required');
            
            if ($this->form_validation->run() == TRUE) {
                $region_name = $this->input->post('regions');
                $content = $this->input->post('content');
                
                $region = $this->Region_model->get_region_by_name($region_name);
                $new_region_id;
                if($region == null)
                {
                    $new_region_id = $this->Region_model->add_region($region_name, 1, 1);
                }
                else
                {
                    $new_region_id = $region->id;
                }
                
                $this->Message_model->update_message($id, $content, $new_region_id);
            }
        }
        
        $data['message'] = $this->Message_model->get_message($id);
        $data['regions'] = $this->Region_model->get_regions_by_message($id);
        $this->load->view('message/edit', $data);

	}
		
	public function add()
	{

		if($this->session->userdata('is_login') != 'true')
		redirect('login/');
			
		if(isset($_POST['submit']))
		{
			$this->load->library('form_validation');
				
			$this->form_validation->set_rules('content', '内容', 'required|max_length[140]');
			$this->form_validation->set_rules('regions', '地标', 'required');
			if ($this->form_validation->run() == TRUE) 
			{
				
				$region_name = $this->input->post('regions');
				$this->load->Model('Region_model');
				$region = $this->Region_model->get_region_by_name($region_name);
				if ($region == null) {
					$region_id = $this->Region_model->add_region($region_name);
				}else {
					$region_id = $region->id;
				}
					
				$topic = $this->input->post('topic');
				$content = $this->input->post('content');
				$user_id = $this->session->userdata('user')->id;
				
				$this->load->Model('Message_model');
				$message_id = $this->Message_model->add_message($topic, $content, $user_id, $region_id);
					
				redirect('/message');
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