<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Region extends CI_Controller
{
    public function hot()
    {
    	$this->load->Model('Region_model');
		
		$data['regions'] = $this->Region_model->get_hot_regions();
		
		$this->load->view('Region/hot', $data);
    }
}

?>