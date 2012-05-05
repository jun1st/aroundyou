<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class My_Form_validation extends CI_Form_validation{
    
       
    function __construct(){
        parent::__construct();
    }
    
    function error_array(){
        if(count($this->_error_array)===0){
            return null;
        }else{
            return $this->_error_array;
        }
    }
} 