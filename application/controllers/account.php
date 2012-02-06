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
		
        public function doubanOAuth()
        {
			require_once  $_SERVER['DOCUMENT_ROOT'] . '/application/third_party/douban/Zend/Gdata/DouBan.php';
			require_once  $_SERVER['DOCUMENT_ROOT'] . '/application/third_party/douban/Zend/Gdata/DouBan/BroadcastingEntry.php';
			require_once  $_SERVER['DOCUMENT_ROOT'] . '/application/third_party/douban/Zend/Gdata/App/Extension/Content.php';
            
			/* your apikey and secret */
			$APIKEY= '03aefb54538fc5e10b0cf1fcfaaf51a3';
			$API_SECRET= '634f7c150bc04ce0';

			/* the Douban client does everything */
			$client = new Zend_Gdata_DouBan($APIKEY, $API_SECRET);

			/* step 2: when it comes back from Douban auth page */
			if(isset($_GET['oauth_token']))
			{
			    /* exchange the request token for access token */
			    $key = $_COOKIE['key'];
			    $secret = $_COOKIE['secret'];
			    $result = $client->getAccessToken($key, $secret);
			    $key = $result["oauth_token"];
			    $secret = $result["oauth_token_secret"];
			    if($key){

			        /* access success, let's say something. */
			        $client->programmaticLogin($key, $secret);
			        echo 'logged in.';
			        $entry = new Zend_Gdata_Douban_BroadcastingEntry();
			        $content = new Zend_Gdata_App_Extension_Content('Oauth from PHP is easy.');
			        $entry->setContent($content);
			        $entry = $client->addBroadcasting("saying", $entry);
			        echo '<br/>you just posted: '.$entry->getContent()->getText();
			    }else{
			        echo 'Oops, get access token failed';
			    }
			}

			/* step 1: */
			else
			{
			    /* first, get request token. */
			    $result = $client->getRequestToken();
			    $key = $result["oauth_token"];
			    $secret = $result["oauth_token_secret"];

			    /* save them somewhere, you'll need them in step 2. */
			    setcookie('key',$result["oauth_token"],time()+3600);
			    setcookie('secret',$result["oauth_token_secret"],time()+3600);

			    /* get the auth url */
			    $authurl = $client->getAuthorizationURL($key, $secret, 'http://'.$_ENV['HTTP_HOST'].$_ENV['REQUEST_URI']);
			    echo '<a href="'.$authurl.'">click me to oauth it.</a>';
			}
			
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