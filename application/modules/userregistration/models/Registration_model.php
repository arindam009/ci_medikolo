<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Registration_model extends CI_Model
{

  function add_data($table,$data) // Add Single Data
  {
	 if(!empty($data))
		{
	     $this->db->insert($table,$data);
	     return $this->db->insert_id();
	    
		}
  }
 
}
