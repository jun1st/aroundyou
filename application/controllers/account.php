<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
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
                    $this->load->view('Login/index.php', $data);
                    return;
				}
			}
			$this->load->view('Account/login.php');
		}
		
        public function sina_oauth()
        {
            $this->session->userdata['oauth_type'] = 'sina';
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
            
            echo $user_id;
        }
        
        public function douban_oauth()
        {
            $this->load->add_package_path(APPPATH.'third_party/douban_oauth/');
            $this->session->userdata['oauth_type'] = 'douban';
            
            $this->load->library('douban_oauth');
			$douban = new Douban_OAuth();
			
			$authorize_url = $douban->get_auth_request();
			
			header('location:' . $authorize_url);
        }
		
		public function douban_register()
		{
			$this->load->add_package_path(APPPATH.'third_party/douban_oauth/');
            $this->load->library('douban_oauth');
			$douban = new Douban_OAuth();
			
			$user_id = $douban_oauth->get_authorized_user_id();
			
			echo $user_id;
			
		}
        
        
		public function register()
		{
			if (isset($_POST['submit'])) {
				
				$user = $this->session->userdata('user');
				$user->email = $this->input->post('email');
				
				$this->db->insert('users', $user);
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