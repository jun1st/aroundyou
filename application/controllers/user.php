<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/usermodel.php';
	
	class User extends CI_Controller{
		
		public function index()
		{
			$this->load->model('Usermodel');
			
			$data['users'] = $this->Usermodel->get_users();
			
			$this->load->view('User/index', $data);
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