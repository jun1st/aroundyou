<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	require_once BASEPATH.'core/Model.php';
	
	class Region_model extends CI_Model
	{
		var $id;
		var $name;
		var $name_cn;
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
			$region->name_cn = $name;
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
		
		function get_regions()
		{
			$this->db->select('regions.id, regions.name_cn as name, COUNT(messages.id) as messages_count');
            $this->db->from('regions');
            $this->db->join('messages', 'regions.id = messages.region_id');
            $this->db->group_by(array('regions.id', 'regions.name_cn'));
            $this->db->order_by('messages_count', 'desc');
            
            return $this->db->get()->result();
		}
        
        function get_hot_regions()
        {
            $this->db->select("hot_regions.id, hot_regions.name, messages_count, streets.name_cn as street");
            $this->db->from("hot_regions");
            $this->db->join("street_region", "hot_regions.id = street_region.region_id", "left");
            $this->db->join("streets", "street_region.street_id = streets.id", "left");
            
            return $this->db->get()->result();
        }
        
        function get_regions_by_message($message_id)
        {
            $this->db->select('regions.name as region_name, regions.id as region_id');
            $this->db->from('regions');
            $this->db->join('message_region', 'regions.id = message_region.region_id');
            $this->db->where('message_region.message_id', $message_id);
            
            return $this->db->get()->result();
        }
	}
?>