<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Doctors_model extends CI_Model
{

 public function get_all_department($table) // Fetch All Data
  {
  	 
	 $this->db->select('*');
	 $this->db->order_by('id');
	 $query = $this->db->get($table);
	 $result = $query->result();
	 return $result;
	
  }

  
	
}
