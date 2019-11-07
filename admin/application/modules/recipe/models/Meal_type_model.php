<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Meal_type_model extends CI_Model
{
   
  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_meal_type',$data);
	     return $this->db->insert_id();
		}
  }
  
  
  function get_data()
  {
	 $this->db->select('*');
	 $this->db->where('status!=', 2);
	 $query = $this->db->get('tbl_meal_type');
	 $result = $query->result();
	 return $result;
	
  }
	
	
  public function delete_row_data($id)
  {
  	  $data['status']=2;
	  $this->db->where('id', $id);
	  $this->db->update('tbl_meal_type', $data);
  }	
  
  
  
  
  
  function get_data_by_id($id)
  {
	 $this->db->select('*');
     
	  $this->db->where('id', $id);
	 $query = $this->db->get('tbl_meal_type');
	 $result = $query->result();
	 return $result;
	
  }
  
  
  function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_meal_type', $data);
			 return $this->db->affected_rows();
		}
	}
  
  
	
}
