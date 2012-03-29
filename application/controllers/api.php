<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/message_model.php';

class Api extends CI_Controller{

	public function messages()
	{

		$this->load->Model('Message_model');
		$this->load->Model('Region_model');

		if (isset($_POST['user_id'])) {
			
			$topic = $this->input->post('topic');
			$content = $this->input->post('content');
			$user_id = $this->input->post('user_id');
			$region_name = $this->input->post('region_name');
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
			
			$message_url = "http://aroundyou.com/message/" . $message_id;
			
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($message_url));
			
		}
		else
		{
			$how_many_messages = $this->uri->segment(3);
			$start_from_message_id = $this->uri->segment(4);

			$messages = $this->Message_model->get_messages($how_many_messages, NULL, $start_from_message_id);
			
			//$data['regions'] = $this->Region_model->get_regions();
			
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($messages));
		}
	}
	
    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            if (isset($email) && isset($password)) {
                $user = $this->User_model->authenticate_user($email, SHA1($password));
                if($user != null)
                {
                    $this->output->set_content_type('application/json');
                    $this->output->set_output(json_encode($user));
                }
            }
        }
    }
}

?>