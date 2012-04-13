<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class User extends My_Controller{
		
		public function index()
		{
			$this->load->model('User_model');
			
			$data['users'] = $this->User_model->get_users();
			
			$this->load->view('User/index', $data);
		}
		
		public function get($id)
		{
			if(!isset($id) || $id=='')
			{
				$this->index();
			}
			$this->load->helper('html');
			$this->load->helper('date');
			$this->load->Model('User_model');
			$this->load->Model('Message_model');
			$this->load->Model('Comment_model');
			
			$data['user'] = $this->User_model->get_user($id);

			$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
			if ($page == 0) {
				$page = 1;
			}
	        $total_count;
			$data['messages'] = $this->Message_model->get_messages(PAGE_SIZE, $page-1, null, $total_count);
			
			$data['page_url'] = "messages?page=";
	        $data['page_count'] = ceil($total_count / PAGE_SIZE);

			$data['messages'] = $this->Message_model->get_messages_by_user($data['user']->id);
			$data['comments'] = $this->Comment_model->get_comments_by_user($data['user']->id);
			$this->load->view('User/view', $data);
			
		}
		
		public function setting()
		{
			if ($this->session->userdata['is_login'] != 'true') {
				redirect('login');
			}
			$this->load->Model('User_model');

			if($this->input->post())
			{
                $birthday = $this->input->post('birthday');
				$data = array(
					'name' => htmlspecialchars($this->input->post('name')),
					'birthday' => empty($birthday) ? NULL : $birthday,
					'location' => htmlspecialchars($this->input->post('location')),
					'website' => htmlspecialchars($this->input->post('website')),
					'description' => htmlspecialchars($this->input->post('description'))
				);
				
				$this->db->where('id', $this->session->userdata['user']->id);
				$this->db->update('users', $data);
			}
			$user = $this->User_model->get_user($this->session->userdata['user']->id);
			$data['user'] = $user;
			$this->session->set_userdata('user', $user);
			
			
			$this->load->view('User/setting', $data);
		}
		
		public function change_password()
		{
			if ($this->input->post()) {
				
				$this->load->Model('User_model');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('old', '旧密码', 'required');
				$this->form_validation->set_rules('new', '新密码', 'required');
				$this->form_validation->set_rules('confirm', '确认新密码', 'required|matches[new]');
				if ($this->form_validation->run() == TRUE) {
					$old = $this->input->post('old');
					$new = $this->input->post('new');
					$user = $this->session->userdata('user');
					if ($user->password == SHA1($old)) {
						$this->User_model->update_password($user->id, SHA1($new));
					}
					else
					{
						$this->form_validation->set_message('旧密码不正确');
					}
				}
				
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode($info));
				
			}
			//header('location:' . '/user/setting#password');
		}
		
		public function upload()
		{
			
			$filePath = "./uploads/profile_images/" . $this->session->userdata['user']->id ."/";
		
			if(!file_exists($filePath))
			{
				mkdir($filePath, 0777);
			}
		
			$config['upload_path'] = $filePath;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
				
				$this->form_validation->set_rules('name', 'Name', 'required|is_unique[users.name]');
				$this->form_validation->set_rules('password', 'Password', 'required|is_unique[users.email]');
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
					$data['validation_fails'] = TRUE;
					$this->load->view('User/register', $data);
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