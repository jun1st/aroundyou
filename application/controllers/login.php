<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Login extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		public function Index()
		{
			$this->load->library('form_validation');

			if (isset($_POST['submit'])) {
				
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$password = SHA1($password);
				
				$this->load->model('User_model');
				
				$user = $this->User_model->authenticate_user($email, $password);
				// $query = $this->db->query("select * from users where email = '$email' and password = 	'$password'");
				// 				$user = $query->row();
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
				}
			}
			
			$this->load->view('Login/index.php', $data);
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