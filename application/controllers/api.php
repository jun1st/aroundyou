<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/message_model.php';

class Api extends CI_Controller{

	public function messages()
	{

		$this->load->Model('Message_model');
		//$this->load->Model('Region_model');

		$messages = $this->Message_model->get_messages();
		//$data['regions'] = $this->Region_model->get_regions();
			
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($messages));
		
	}
	

}

?>