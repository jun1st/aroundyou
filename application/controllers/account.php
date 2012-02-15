<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/user_model.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/user_oauth_model.php';
	
	class Account extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function Login()
		{
			$this->load->library('form_validation');
            
			if (isset($_POST['submit'])) {
				
				$this->form_validation->set_rules('email', "邮箱", "required");
				$this->form_validation->set_rules("password", "密码", "required");
				if ($this->form_validation->run() == FALSE) {
					$data['validation_fails'] = TRUE;
					$this->load->view("Account/login", $data);
					return;
				}
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$password = SHA1($password);
				
				$this->load->model('User_model');
				
				$user = $this->User_model->authenticate_user($email, $password);

				if( $user != null )
				{
					$this->session->set_userdata('is_login', 'true');
					$this->session->set_userdata('user', $user);
					
					if($this->input->post('remember_me') == 'remember_me')
					{
						$remember_me_token = uniqid();
						$this->User_model->set_auth_token($remember_me_token, $user->id);
						
						$cookie = array(
						    'name'   => 'remember_me_token',
						    'value'  => $remember_me_token,
						    'expire' => '1209600',  // Two weeks
						);
						$this->load->helper('cookie');
						$this->input->set_cookie($cookie);
						
					}
					
					redirect('message/');
				}
				else
				{
					$data['login_error'] = "对不起，您的用户名和密码有误！";
                    $this->load->view('Account/login.php', $data);
                    return;
				}
			}
			$this->load->view('Account/login.php');
		}
		
        public function sina_oauth()
        {
            $this->session->set_userdata('oauth_type', 'sina');
            $this->load->add_package_path(APPPATH . 'third_party/sina_oauth');
            $this->load->library('sina_oauth');
            
            $sina_oauth = new Sina_Oauth();
            
            $oauth_request_uri = $sina_oauth->get_auth_request_uri();
            
            header('location:' . $oauth_request_uri);
        }
        
        public function sina_register()
        {
            $this->load->add_package_path(APPPATH . 'third_party/sina_oauth');
            $this->load->library('sina_oauth');
            
            $sina_oauth = new Sina_Oauth();
            
            $user_id = $sina_oauth->get_authorized_user_id();
            
			if (isset($user_id)) {
				$this->session->set_userdata('oauth_user_id', $user_id);
				$this->load->model('User_OAuth_Model');
				$oauthed_user = $this->User_OAuth_Model->get_oauth_user($user_id, $this->session->userdata('oauth_type'));

				if ($oauthed_user){
					$user = $this->User_model->get_user($oauthed_user->user_id);
					$this->session->set_userdata('is_login', 'true');
					$this->session->set_userdata('user', $user);
				
					header('location:'. '/messages');
					return;
				}
				
				header('location:' . '/account/register');
				return;
			}
			else
			{
				header('location:' . '/account/login');
			}
            
        }
        
        public function douban_oauth()
        {
            $this->load->add_package_path(APPPATH.'third_party/douban_oauth/');
            $this->session->set_userdata('oauth_type','douban');
            
            $this->load->library('douban_oauth');
			$douban = new Douban_OAuth();
			
			$authorize_url = $douban->get_auth_request();
			
			header('location:' . $authorize_url);
        }
		
		public function douban_register()
		{
			$this->load->add_package_path(APPPATH.'third_party/douban_oauth/');
            $this->load->library('douban_oauth');
			$douban_oauth = new Douban_OAuth();
			
			$user_id = $douban_oauth->get_authorized_user_id();
			if (isset($user_id)) {
				$this->session->set_userdata('oauth_user_id', $user_id);
				
				$this->load->model('User_OAuth_Model');
				$oauthed_user = $this->User_OAuth_Model->get_oauth_user($user_id, $this->session->userdata('oauth_type'));

				if ($oauthed_user){
					$user = $this->User_model->get_user($oauthed_user->user_id);
					
					$this->session->set_userdata('is_login', 'true');
					$this->session->set_userdata('user', $user);
				
					header('location:' . '/messages');
					return;
					
				}
				
				header('location:' . '/account/register');
				return;
			}
			else
			{
				header('location:' . '/account/login');
			}
		}
        
        
		public function register()
		{
			$this->load->library('form_validation');
			
			if (isset($_POST['submit'])) {
				
				$this->form_validation->set_rules('name', 'Name', 'required|is_unique[users.name]');
				$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
				
				if ($this->form_validation->run() == true) {
					
					$this->load->model('User_model');
					$this->load->model('User_OAuth_Model');
					$name = $this->input->post('name');
					$email = $this->input->post('email');
				
					$new_user_id = $this->User_model->add_oauth_user($name, $email);
				
					$this->User_OAuth_Model->add($new_user_id, $this->session->userdata('oauth_user_id'), $this->session->userdata('oauth_type'));
				
					$user = $this->User_model->get_user($new_user_id);
				
					$this->session->set_userdata('is_login', 'true');
					$this->session->set_userdata('user', $user);
				
					header('location: /messages');
				}
				else
				{
					$data['validation_fails'] = true;
					$this->load->view('Account/register', $data);
					return;
				}
				
			}
			$this->load->view('Account/register');
		}
		
		public function logout()
		{
			$this->load->helper('cookie');
			$this->session->sess_destroy();
		
			delete_cookie('ci_session');
			delete_cookie('remember_me_token');
			
			redirect('/message');
		}
	}
?>