<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Crud_model extends CI_Model
{


function get_all_data($table) // Fetch All Data
  {
  	 
	 $this->db->select('*');
	 $this->db->order_by('orderid');
	 $query = $this->db->get($table);
	 $result = $query->result();
	 return $result;
	
  }

   
  function add_data($table,$data) // Add Single Data
  {
	 if(!empty($data))
		{
	     $this->db->insert($table,$data);
	     return $this->db->insert_id();
	    // echo $this->db->last_query();("here");
		}
  }
  
 function get_data_by_id($table,$id) // Get Single Data By ID
  {
	 $this->db->select('*');
     
	  $this->db->where('id', $id);
	 $query = $this->db->get($table);
	 $result = $query->result();
	 return $result;
	
  }

 function update_data($table,$data,$id) // Update Data
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update($table, $data);
             return $this->db->affected_rows();
		}
	}
	
  function delete_row_data($table,$id) // Delete Data
  {
  	  $data['status']='2';
	  $this->db->where('id', $id);
	  $this->db->update($table, $data);
	  
  }	
  
 function empty_row_data($table,$id) // Empty Single Data From Row
  {
  	 
	  $this->db->where('id', $id);
	  $this->db->delete($table);
	  
  }	
  
	
}
