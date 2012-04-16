<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class My_Controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->check_identity();
		}
		
		function check_identity()
		{
			if (!$this->session->is_authenticated()) 
			{
				echo 'not authenticated';
				if ($this->input->cookie('remember_me_token')) 
				{
					$this->load->model('User_model');
					$user = $this->User_model->cookie_authenticate($this->input->cookie('remember_me_token'));
					if($user != null)
					{
						$this->load->library('session');
					
						$this->session->set_userdata('is_login', 'true');
						$this->session->set_userdata('user', $user);
						redirect('/messages');
					}
					else
					{
						redirect('login');
					}
				}
				else
				{
					redirect('/login');
				}
			}

		}
	}

?>