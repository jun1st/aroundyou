<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Message extends My_Controller
{
	function __contruct()
	{
		parent::__construct();
	}
	public function index($page = NULL)
	{
		$this->load->helper('date');
        $this->load->helper('url');
		//$this->load->library('pagination');
		$this->load->Model('Message_model');
		$this->load->Model('Region_model');
        
        if (!isset($page)) {
            $page = 1;
        }
        
		$data['messages'] = $this->Message_model->get_messages(PAGE_SIZE, $page-1);
		$data['regions'] = $this->Region_model->get_hot_regions();
		
        $data['page_count'] = ceil($this->Message_model->get_messages_count() / PAGE_SIZE);
		
		$this->load->view('Message/index', $data);
	}
    
    public function messages_hot()
    {
        $this->load->helper('date');
        
		$this->load->Model('Message_model');
		$this->load->Model('Region_model');

        $data['messages'] = $this->Message_model->get_hot_messages();
        $data['regions'] = $this->Region_model->get_regions();
        
        $this->load->view('Message/index', $data);
    }
    
    public function regions_hot()
    {
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
		$this->load->helper('html');
		$this->load->Model('Message_model');
        $this->load->Model('Region_model');
        
		$data['message'] = $this->Message_model->get_message_detail($id);
        if(isset($data['message']->region_name))
        {
		    $region = $this->Region_model->get_region_by_name($data['message']->region_name);
            $data['region_messages'] = $this->Message_model->get_messages_by_region($region->id);
        }
        if ($data['message'] == null) {
			echo 'not found';
		}
		else
		{
			$this->load->Model('Comment_model');
			$data['comments'] = $this->Comment_model->get_comments_details_by_message($id);
				
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
        
        $data['message'] = $this->Message_model->get_message_detail($id);
        //$data['regions'] = $this->Region_model->get_regions_by_message($id);
		$region = $this->Region_model->get_region_by_name($data['message']->region_name);
		$data['region_messages'] = $this->Message_model->get_messages_by_region($region->id);
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
		$this->load->library('form_validation');
		if (isset($_POST['submit'])) {
			
			$this->form_validation->set_rules('comment_content', '评论内容', 'required|max_length[140]|min_length[7]');
			if ($this->form_validation->run() == TRUE) {
				$comment = new Comment_model;
				$comment->message_id = $this->input->post('message_id');
				$comment->user_id = $this->session->userdata('user')->id;
				$comment->content = htmlspecialchars($this->input->post('comment_content', true));
				$comment->posted_time = date('Y-m-d H:i:s');
				
				$this->db->insert('comments', $comment);
				
				redirect("/message/view/" . $comment->message_id);
			}
			else
			{
				redirect("/message/view/" . $this->input->post('message_id'));
			}
			
		}
	}
}

?>