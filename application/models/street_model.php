<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once BASEPATH.'core/Model.php';

	/**
	* 
	*/
	class Street_model extends CI_Model
	{
		var $id;
		var $name;
		var $name_cn;
		var $added_time;
	}
?>