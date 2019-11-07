<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Comment_model extends CI_Model
{
   
  function get_data()
  {
	 $this->db->select('*');
	 $query = $this->db->get('tbl_comment_reviews');
	 $result = $query->result();
	 return $result;
  }
  
  
  function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_comment_reviews', $data);
             //echo $this->db->last_query();die();
			 return $this->db->affected_rows();
		}
	}

	
}
