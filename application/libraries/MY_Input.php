<?php

class My_Input extends CI_Input{
	
	public function post($index = '', $xss_clean = FALSE)
	{
		if ($index === '') {
			return $_SERVER['REQUEST_METHOD'] === 'POST';
		}
		
		return parent::post($index, $xss_clean);
	}

	public function get($index = '', $xss_clean = FALSE)
	{
		if ($index === '') {
			return $_SERVER['REQUEST_METHOD'] === 'GET';
		}

		return parent::get($index, $xss_clean);
	}
}

?>