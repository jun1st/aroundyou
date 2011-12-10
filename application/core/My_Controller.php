<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/user_model.php';
	class My_Controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->test();
		}
		
		function test()
		{
			//$this->load->library('cookie');
						
			$this->input->set_cookie('hook', true);
			//$this->output->set_output('shanghai international school');
			if ($this->input->cookie('remember_me_token')) {
				
				$this->load->model('User_model');
				$user = $this->User_model->cookie_authenticate($this->input->cookie('remember_me_token'));
				//echo 'user: ' . $user;
				if($user != null)
				{
					$this->load->library('session');
					
					$this->session->set_userdata('is_login', 'true');
					$this->session->set_userdata('user', $user);
				}
			}
		}
	}

?>