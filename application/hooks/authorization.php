<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	
	class Authorization {
		
		private $ci;
		
		function __construct()
		{
			parent::__construct();
			$this->ci = get_instance();
		}
		
		function authorize()
		{
			echo 'This should be outputed';
		}
		
		// public function my_function()
		// 		{
		// 			
		// 			die('tttt');
		// 			
		// 			$CI = get_instance();
		// 			
		// 			$CI->load->library('cookie');
		// 			
		// 			$CI->input->set_cookie('hook', true);
		// 			$CI->output->set_output('shanghai international school');
		// 			if ($CI->input->cookie('remember_me_token')) {
		// 				
		// 				$CI->load->model('User_model');
		// 				$user = $CI->User_model->cookie_authenticate($CI->input->cookie('remember_me_token'));
		// 				echo 'user: ' . $user;
		// 				if($user != null)
		// 				{
		// 					$CI->load->library('session');
		// 					
		// 					$CI->session->set_userdata('is_login', 'true');
		// 					$CI->session->set_userdata('user', $user);
		// 				}
		// 			}
		// 		}
	}
	/* End of file Authorization.php */


