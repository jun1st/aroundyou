<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/message_model.php';

class Api extends CI_Controller{

	public function messages()
	{

		$this->load->Model('Message_model');
		$this->load->Model('Region_model');

		if ($this->input->post()) {
			$topic = $this->input->post('topic');
			$content = $this->input->post('content');
			$user_id = $this->input->post('user_id');
			$region_name = $this->input->post('region_name');
			$street = $this->input->post('street');
			$latitude = $this->input->post('latitude');
			$longitude = $this->input->post('longitude');
			if (empty($content) || empty($user_id) || empty($region_name) || empty($latitude) || empty($longitude) ) {
			    $this->output->set_status_header(400);
                $this->output->set_output(json_encode("bad request"));
                return;
			}

            $region = $this->Region_model->get_region_by_name($region_name);
            $new_region_id;
            if($region == null)
            {
                $new_region_id = $this->Region_model->add_region($region_name, $latitude, $longitude);
            }
            else
            {
                $new_region_id = $region->id;
            }

			$message_id = $this->Message_model->add_message($topic, $content, $user_id, $new_region_id, $latitude, $longitude);

			$message_url = "http://iaroundyou.com/messages/" . $message_id;

			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($message_url));

		}
		else
		{
			$how_many_messages = $this->uri->segment(3);
			$start_from_message_id = $this->uri->segment(4);
			$page = $this->uri->segment(5);
			$count;
			$messages = $this->Message_model->get_messages($how_many_messages, $page, $start_from_message_id, $count);

			//$data['regions'] = $this->Region_model->get_regions();

			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($messages));
		}
	}

    function login()
    {
        if ($this->input->post()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if (isset($email) && isset($password)) {
                $user = $this->User_model->authenticate_user($email, SHA1($password));
                if($user != null)
                {
                    $this->output->set_content_type('application/json');
                    $this->output->set_output(json_encode($user));
                }
                else
                {
                	$this->output->set_content_type('application/json');
                	$this->output->set_output(json_encode(array('error_message' => "Invalid email or password")));	
                }
            }
        }
    }

    function register()
    {
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('name', 'Name', 'required|is_unique[users.name]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

		if($this->form_validation->run() == true)
		{
			$model = new User_model;
			$model->name = $this->input->post('name');
			$model->email = $this->input->post('email');
			$model->password = SHA1($this->input->post('password'));
			$model->register_time = date('Y-m-d H:i:s');

			$this->db->insert('users', $model);
		}
		else
		{
			$this->output->set_status_header('400');
			$this->output->set_output(json_encode($this->form_validation->error_array()));
		}	

    }

	public function message($id)
	{
		if ($this->input->get()) {
			$data['message'] = $this->Message_model->get_message($id);
			if ($data['message']) {
				$this->output->set_content_type('application/json');
				$data['comments'] = $this->Message_model->get_comments_of_message($id);
				$this->output->set_output(json_encode($data));
			}
			else
			{
				$this->output->set_status_header('404');
				$this->output->set_output('resource not found');
			}
		}
		else
		{
			$this->output->set_status_header('400');
		}
	}

	public function comments()
	{
		if ($this->input->post()) {
			$message_id = $this->input->post('message_id');
			$user_id = $this->input->post('user_id');
			$content = htmlspecialchars($this->input->post('comment_content', true));
			$posted_time = date('Y-m-d H:i:s');

			if (!empty($message_id) && !empty($user_id) && !empty($content) && !empty($posted_time)) {
				$this->Message_model->add_comment($message_id, $user_id, $content, $posted_time);

				$this->output->set_status_header('200');
				$this->output->set_output('comment posted!');
			}
			else
			{
				$this->output->set_status_header('400');
				$this->output->set_output('bad request');
			}
		}
		else{
			$this->output->set_status_header('400');
			$this->output->set_output('HTTP GET is not allowed to post a comment');
		}
	}

	public function user($id)
	{
		if ($this->input->get()) {
			$user = $this->User_model->get_user($id);
			if ($user) {
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode($user));
			}
			else
			{
				$this->output->set_status_header('404');
				$this->output->set_output('resource not found');
			}
		}
		else
		{
			$this->output->set_status_header('400');
		}
	}
}

?>