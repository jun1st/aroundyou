<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Login extends CI_Controller
	{
		public function Index()
		{
			$this->load->library('form_validation');

			if (isset($_POST['submit'])) {
				
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$password = SHA1($password);
				
				$query = $this->db->query("select * from users where email = '$email' and password = 	'$password'");
				$user = $query->row();
				if( $user != null )
				{
					$this->session->set_userdata('is_login', 'true');
					$this->session->set_userdata('user', $user);
					
					redirect('message/');
				}
				else
				{
					echo "Login failed!";
				}
			}
			
			$this->load->view('Login/index.php');
		}
	}
?>