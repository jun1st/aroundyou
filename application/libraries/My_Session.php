<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class My_Session extends CI_Session{

	public function is_authenticated()
	{
		return $this->userdata('is_login') === 'true';
	}

	public function authenticate_user()
	{
		$this->set_userdata('is_login', 'true');
	}
}

?>