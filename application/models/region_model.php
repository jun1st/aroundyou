<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once BASEPATH.'core/Model.php';
	
	class Region_model extends CI_Model
	{
		var $id;
		var $name;
		var $added_time;
		var $longitude;
		var $latitude;
		
		function __construct()
		{
			parent::__construct();
		}
		
		function add_region($name, $latitude, $longitude)
		{
			$region = new Region_model;
			$region->name = $name;
			$region->added_time = date('Y-m-d H:i:s');
			$region->latitude = $latitude;
			$region->longitude = $longitude;
		
			$this->db->insert('regions', $region);
			
			return $this->db->insert_id();
		}
		
		function get_region_by_name($name)
		{
			$query = $this->db->get_where('regions', array('name'=>$name));
			
			return $query->row();
		}
	}
?>