<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Blog_model extends CI_Model
{
   
  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_blogs',$data);
	     return $this->db->insert_id();
		}
  }
  
  
  function get_data()
  {
	 $this->db->select('tbl_blogs.*,tbl_category.cat_name');
	 $this->db->from('tbl_blogs');
      $this->db->join('tbl_category', 'tbl_category.id = tbl_blogs.blog_category', 'inner');
      $this->db->order_by("orderid", "asc");
      $this->db->where('tbl_blogs.status!=', 2);
	 $query = $this->db->get();
	 $result = $query->result();
	 return $result;
	
  }
	
	
  public function delete_row_data($id)
  {
	  $data['status']=2;
	  $this->db->where('id',$id);
      $this->db->update('tbl_blogs', $data);
  }	
  
   public function delete_all_data($id)
  {
	  $this->db->empty_table('city_mng');
  }	
  
  
  
  
  
  function get_data_by_id($id)
  {
	 $this->db->select('tbl_blogs.*,tbl_category.cat_name');
	  $this->db->from('tbl_blogs');
	  $this->db->join('tbl_category', 'tbl_category.id = tbl_blogs.blog_category', 'inner');
	 $this->db->where('tbl_blogs.id', $id);
	 $query = $this->db->get();
	 $result = $query->result();
	 return $result;
	
  }
  
  
  function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_blogs', $data);
			 return $this->db->affected_rows();
		}
	}

  function get_blog_category()
  {
	 $this->db->select('*');
	 $this->db->where('cat_type', 'Blog');
	 $this->db->where('status!=', '2');
	 $query = $this->db->get('tbl_category');
	 
	 $result = $query->result();
	 return $result;
	
  }
  
  
	
}
