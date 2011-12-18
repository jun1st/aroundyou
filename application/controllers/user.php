<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	include_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/user_model.php';
	
	class User extends My_Controller{
		
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
			
			if(isset($_POST['submit']))
			{
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'birthday' => $this->input->post('birthday'),
					'location' => $this->input->post('location'),
					'website' => $this->input->post('website'),
					'description' => $this->input->post('description')
				);
				
				$this->db->where('id', $this->session->userdata['user']->id);
				$this->db->update('users', $data);
			}
			
			$data['user'] = $this->User_model->get_user($this->session->userdata['user']->id);
			
			
			$this->load->view('User/setting', $data);
		}
		
		public function upload()
		{
			$filePath = "./uploads/profile_images/" . $this->session->userdata['user']->id ."/";
		
			if(!file_exists($filePath))
			{
				mkdir($filePath, 0777);
			}
		
			$config['upload_path'] = $filePath;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '4096';
			

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('fileToUpload'))
			{
				
				$info = array('error_message'=>$this->upload->display_errors());
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode($info));
			}
			else
			{
				
				$data = $this->upload->data();
				$source_file = $filePath . $data['client_name'];
				
				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image']	= $source_file;
				$config['overwrite'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				
				for ($width=128; $width >= 32 ; $width = $width/2 ) { 
					$new_profile_image = $filePath . 'profile_image_' . $width . $data['file_ext'];
					$config['new_image'] = $new_profile_image;
					$config['width'] = $width;
					$config['height'] = $width;
					
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}
				
				$this->load->model('User_model');
				
				$normal = $filePath . 'profile_image_128' . $data['file_ext'];
				$small = $filePath . 'profile_image_64'. $data['file_ext'];
				$tiny = $filePath . 'profile_image_32' . $data['file_ext'];
				
				$this->User_model->update_profile_image(substr($normal, 1),
				substr($small, 1), substr($tiny, 1), $this->session->userdata['user']->id);
				
				$info = array('image_address'=>substr($normal, 1));
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode($info));
				
			}
		}
		
		public function register()
		{
			$this->load->library('form_validation');
			
			if (isset($_POST['submit'])) {
				
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
				$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
				
				if($this->form_validation->run() == true)
				{
					$model = new User_model;
					$model->name = $this->input->post('name');
					$model->email = $this->input->post('email');
					$model->password = SHA1($this->input->post('password'));
					$model->register_time = date('Y-m-d H:i:s');


					$this->db->insert('users', $model);
					$this->register_succeed();
				}
				else
				{
					$this->load->view('User/register');
					return;
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