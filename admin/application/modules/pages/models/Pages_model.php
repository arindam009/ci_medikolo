<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Pages_model extends CI_Model
{
   
  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('pages_mng',$data);
	     return $this->db->insert_id();
		}
  }
  
  
  function get_data()
  {
	 $this->db->select('*');
   //  $this->db->where('status', 0);
	 $query = $this->db->get('pages_mng');
	 $result = $query->result();
	 return $result;
	
  }
	
	
  public function delete_row_data($id)
  {
	  $this->db->where('id', $id);
	  $this->db->delete('pages_mng');
  }	
  
  
  
  
  
  function get_data_by_id($id)
  {
	 $this->db->select('*');
	 $this->db->where('id', $id);
	 $query = $this->db->get('pages_mng');
	 $result = $query->result();
	 return $result;
	
  }
  
  
  function edit_data_image($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('pages_mng', $data);
			 return $this->db->affected_rows();
		}
	}
  
  
	
}
