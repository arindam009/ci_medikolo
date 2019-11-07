<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Order_model extends CI_Model
{
   


    function update_data($data,$id,$table)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update($table, $data);
			 return $this->db->affected_rows();
			 
			 echo query();
			 exit;
		}
	}
  
  
  
 
  
  
	
}
