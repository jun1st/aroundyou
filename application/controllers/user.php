<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/user_model.php';
	
	class User extends CI_Controller{
		
		public function index()
		{
			$this->load->model('User_model');
			
			$data['users'] = $this->User_model->get_users();
			
			$this->load->view('User/index', $data);
		}
		
		public function get($name)
		{
			if(!isset($name) || $name=='')
			{
				$this->index();
			}
			
			$this->load->model('User_model');
			
			$data['user'] = $this->User_model->get_user($name);
			
			$this->load->view('User/view', $data);
			
		}
		
		public function setting()
		{
			if ($this->session->userdata['is_login'] != 'true') {
				redirect('login');
			}
			$this->load->model('User_model');
			
			$data['user'] = $this->User_model->get_user($this->session->userdata['user']->name);
			
			$this->load->view('User/setting', $data);
		}
		
		public function upload_profile_image()
		{
			if ($this->session->userdata['is_login'] != 'true') {
				redirect('login');
			}
			$config['upload_path'] = './uploads/profile_images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				echo 'failed';
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('user/upload_form', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('upload_success', $data);
			}
			
		}
		
		public function register()
		{
			echo $this->session->userdata('is_login');
			if($this->session->userdata('is_login') != 'true')
				redirect('login/index');
			$this->load->library('form_validation');
			
			if (isset($_POST['submit'])) {
				
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
				$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
				
				if($this->form_validation->run() == true)
				{
					$model = new Usermodel;
					$model->name = $this->input->post('name');
					$model->email = $this->input->post('email');
					$model->password = SHA1($this->input->post('password'));
					$model->register_time = date('Y-m-d H:i:s');


					$this->db->insert('users', $model);
					$this->register_succeed();
				}	
			}
			
			
			$this->load->view('User/register');
		}
		
		public function register_succeed()
		{
			$this->load->view('User/register_succeed');
		}
	}
?>