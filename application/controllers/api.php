<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/message_model.php';

class Api extends CI_Controller{

	public function messages()
	{

		$this->load->Model('Message_model');
		//$this->load->Model('Region_model');

		if (isset($_POST['user_id'])) {
			
			$topic = $this->input->post('topic');
			$content = $this->input->post('content');
			$user_id = $this->input->post('user_id');
			$region_id = $this->input->post('region_id');
			$latitude = $this->input->post('latitude');
			$longitude = $this->input->post('longitude');
			
			if (isset($user_id) || empty($user_id)) {
				$user_id = 7;
			}
			if (isset($region_id) || empty($region_id)) {
				$region_id = 1;
			}
			
			$message_id = $this->Message_model->add_message($topic, $content, $user_id, $region_id, $latitude, $longitude);
			
			$message_url = "http://aroundyou.com/message/" . $message_id;
			
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($message_url));
			
		}
		else{
			$messages = $this->Message_model->get_messages();
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