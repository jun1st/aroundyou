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

		function add_street($name, $name_cn)
		{
			$street = new Street_model;
			$street->name = $name;
			$street->name_cn = $name_cn;
			$region->added_time = date('Y-m-d H:i:s');
			
		
			$this->db->insert('streets', $street);
			
			return $this->db->insert_id();
		}
		
		//get street by name
		function get_street_by_name($name)
		{
			$query = $this->db->get_where('streets', array('name'=>$name));
			
            return $query->row();
		}
	}
?>