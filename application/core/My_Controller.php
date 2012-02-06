<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/user_model.php';
	class My_Controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->check_identity();
		}
		
		function check_identity()
		{
			if ($this->session->userdata('is_login') != 'true') {
						
				if ($this->input->cookie('remember_me_token')) {
					$this->load->model('User_model');
					$user = $this->User_model->cookie_authenticate($this->input->cookie('remember_me_token'));
					if($user != null)
					{
						$this->load->library('session');
					
						$this->session->set_userdata('is_login', 'true');
						$this->session->set_userdata('user', $user);
						redirect('/messages');
					}
				}
			}

		}
	}

?>