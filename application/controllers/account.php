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
			
            require_once  $_SERVER['DOCUMENT_ROOT'] . '/application/third_party/sinaweibo/config.php';
            require_once  $_SERVER['DOCUMENT_ROOT'] . '/application/third_party/sinaweibo/saetv2.ex.class.php';
			
			include_once  $_SERVER['DOCUMENT_ROOT'] . '/application/third_party/douban/douban_oauth.php';
			
            $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
			
			

            $data['code_url'] = $o->getAuthorizeURL( WB_CALLBACK_URL );
			
            
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
			$this->load->view('Account/login.php', $data);
		}
		
        public function douban_oauth()
        {
			include_once  $_SERVER['DOCUMENT_ROOT'] . '/application/third_party/douban/douban_oauth.php';
			
			$douban = new DoubanOAuth();
			
			$authorize_url = $douban->get_auth_request();
			
			header('location:' . $authorize_url);
        }
		
		public function douban_register()
		{
			include_once  $_SERVER['DOCUMENT_ROOT'] . '/application/third_party/douban/douban_oauth.php';

			$douban_oauth = new DoubanOAuth();
			
			$user_id = $douban_oauth->get_authorized_user_id();
			
			echo $user_id;
			
		}
        
        public function Callback()
        {   
            include_once  $_SERVER['DOCUMENT_ROOT'] . '/application/third_party/sinaweibo/config.php';
            include_once  $_SERVER['DOCUMENT_ROOT'] . '/application/third_party/sinaweibo/saetv2.ex.class.php';

            $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
            $str = $_SERVER['QUERY_STRING'];
            //echo $str;
            parse_str($str);

            if (isset($code)) {
                $keys = array();
                $keys['code'] = $code;
                $keys['redirect_uri'] = WB_CALLBACK_URL;
                try {
                    $token = $o->getAccessToken( 'code', $keys ) ;
                } catch (OAuthException $e) {
                    echo $e;
                }
            }
                        
            if ($token) {
				
				$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token'] );
				//$ms  = $c->home_timeline(); // done
				$uid_get = $c->get_uid();
				$uid = $uid_get['uid'];
				$user_message = $c->show_user_by_id( $uid);
				
				$user = new User_model;
				$user->name = $user_message['name'];
				$user->weibo = $user_message['uid'];
				$user->location = $user_message['location'];
				$user->description = $user_message['description'];
				$user->register_time = date('Y-m-d H:i:s');
				
				$this->session->set_userdata('user', $user);
				
				redirect('/account/register');
            }
            
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