<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Region extends CI_Controller
{
    public function hot()
    {
    	$this->load->Model('Region_model');
		
		$hot_regions = $this->Region_model->get_hot_regions();
		//var_dump($hot_regions);
		$structured_regions = array();
		foreach ($hot_regions as $hot_region) {
			if (!array_key_exists($hot_region->id, $structured_regions)) {
				
				$structured_regions[$hot_region->id] = $hot_region->name;
			}
		}
		$data["structured_regions"] = $structured_regions;
		$data["hot_regions"] = $hot_regions;
		$this->load->view('Region/hot', $data);
    }
}

?>