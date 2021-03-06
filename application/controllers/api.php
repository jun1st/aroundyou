<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/message_model.php';

class Api extends CI_Controller{

	public function messages()
	{
		if ($this->input->post()) {
			$this->load->Model('Message_model');
			$this->load->Model('Region_model');
			$this->load->Model('Street_model');

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
            $street_obj = $this->Street_model->get_street_by_name($street);
            $new_street_id;
            if ($street_obj == null) 
            {
            	 $new_street_id = $this->Street_model->add_street($street, $street);
            }else
            {
            	$new_street_id = $street_obj->id;
            }

			$message_id = $this->Message_model->add_message($content, $user_id, $new_region_id, $latitude, $longitude, $new_street_id);

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

	public function hot_messages()
	{
		$this->load->Model('Message_model');
		$this->load->Model('Region_model');
		
		$count = null;
        $messages = $this->Message_model->get_hot_messages(PAGE_SIZE, null, $count);

        $this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($messages));
	}

	public function messages_in_region($region)
	{
		if (is_null($region) || empty($region)) {
			$this->output->set_status_header("400");
			$this->output->set_output("region name cannot be null");
		}		
		$this->load->Model("Region_model");
		$region_name = urldecode($region);
		$region_obj = $this->Region_model->get_region_by_name($region_name);
		if ($region_obj == null) {
			$this->output->set_status_header("404");
			$this->output->set_output("region doesn't exists");
		}
		$data = $this->Message_model->get_messages_by_region($region_obj->id, 50, null, null, $count);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
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
                	$this->output->set_status_header('200');
                    $this->output->set_content_type('application/json');
                    $this->output->set_output(json_encode($user));
                }
                else
                {
                	$this->output->set_status_header('403');
                	$this->output->set_content_type('application/json');	
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
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = SHA1($this->input->post('password'));

			$new_user_id = $this->User_model->add_user($name, $email, $password);

			$this->output->set_status_header('201');
			$this->output->set_output(json_encode(array('user_id'=>$new_user_id)));
		}
		else
		{
			$this->output->set_status_header('400');
			//$errors = "";
			$error_array = $this->form_validation->error_array();

			if (!array_key_exists("name", $error_array)) {
				$error_array["name"] = "";
			}
			if (!array_key_exists("email", $error_array)) {
				$error_array["email"] = "";
			}
			if (!array_key_exists("password", $error_array)) {
				$error_array["password"] = "";
			}
			$this->output->set_output(json_encode($error_array));
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