<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class City_model extends CI_Model
{
   
  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('city_mng',$data);
	     return $this->db->insert_id();
		}
  }
  
  
  function get_data()
  {
	 $this->db->select('*');
   //  $this->db->where('status', 0);
	 $query = $this->db->get('city_mng');
	 $result = $query->result();
	 return $result;
	
  }
	
	
  public function delete_row_data($id)
  {
	  $this->db->where('id', $id);
	  $this->db->delete('city_mng');
  }	
   public function delete_all_data($id)
  {
	  $this->db->empty_table('city_mng');
  }	
  
  
  
  
  
  function get_data_by_id($id)
  {
	 $this->db->select('*');
	 $this->db->where('id', $id);
	 $query = $this->db->get('city_mng');
	 $result = $query->result();
	 return $result;
	
  }
  
  
  function edit_data_image($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('city_mng', $data);
			 return $this->db->affected_rows();
		}
	}
  
  
	
}
