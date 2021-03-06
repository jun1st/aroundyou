 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once BASEPATH.'core/Model.php';
	
	class User_model extends CI_Model
	{
		var $id;
		var $name;
		var $email;
		var $password;
		var $weibo;
		var $register_time;
		var $last_login_time;
		var $last_activity_time;
		var $profile_image_path;
		var $profile_small_image_path;
		var $profile_tiny_image_path;
		var $description;
		var $website;
		var $location;
		var $birthday;
		var $remember_me_token;
		var $last_visit_time;
		var $messages_count;
		var $comments_count;
		
		function __construct()
		{
			parent::__construct();
		}
		
		public function authenticate_user($email, $password)
		{
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
			
			return $query->row();
		}
		
		
		public function get_user($id)
		{
			$query = $this->db->get_where('users', array('id'=>$id));
			
			return $query->row();
		}

		public function add_user($name, $email, $password)
		{
			$model = new User_model;
			$model->name = $name;
			$model->email = $email;
			$model->password = SHA1($password);
			$model->register_time = date('Y-m-d H:i:s');

			$this->db->insert('users', $model);

			return $this->db->insert_id();
		}
		
		function get_user_by_email($email)
		{
			$query = $this->db->get_where('users', array('email'=>$email));
			
			return $query->row();
		}
		
		function add_oauth_user($user_name, $email)
		{
			$oauth_user = new User_model;
			$oauth_user->name = $user_name;
			$oauth_user->email = $email;
			$oauth_user->register_time = date('Y-m-d H:i:s');
			
			$this->db->insert('users', $oauth_user);
			
			return $this->db->insert_id();
		}
		
		function get_users()
		{
			$query = $this->db->get('users');
			
			return $query->result();
		}
		
		function update_password($user_id, $new_password)
		{
			$data = array(
				'password' => $new_password
			);
			
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
			
		}
		
		function update_profile_image($new_profile_image_path, $new_profile_small_image_path, 
			$new_profile_tiny_image_path, $user_id)
		{
			
			$data = array(
				'profile_image_path' => $new_profile_image_path,
				'profile_small_image_path' => $new_profile_small_image_path,
				'profile_tiny_image_path' => $new_profile_tiny_image_path
			);
			
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
		
		}
		
		function set_auth_token($remember_me_token, $user_id)
		{
			$data = array(
				'remember_me_token' =>$remember_me_token,
				'last_visit_time' => date('Y-m-d H:i:s')
			);
			
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
		}
		
		function cookie_authenticate($token)
		{
			$query = $this->db->get_where('users', array('remember_me_token'=>$token));
			
			return $query->row();
		}
	}
?>