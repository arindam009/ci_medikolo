<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home_model extends CI_Model
{
	function get_all_slider($table) // Fetch All slider Data
  {
  	 //echo "hello";
	  $this->db->select('*');
	   $this->db->order_by('slide_id','DESC');
	   $query = $this->db->get($table);
	   $result = $query->result();
	   return $result;
	  //print_r($result);
	  

  }

  
   
}
