<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once BASEPATH.'core/Model.php';
	
	class Region extends CI_Model
	{
		var $id;
		var $name;
		var $added_time;
		var $longitude;
		var $latitude;
		
		
	}
?>