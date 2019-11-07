<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Submitblog_model extends CI_Model
{
	
	
   /*function get_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 16);
		
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }*/
 
    function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id',16);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   
   function category_allvalue() 

  {

		 $this->db->select('*');

		 $this->db->where('is_parent=', 1);

		 $this->db->where('cat_type=',Blog);

		 $query = $this->db->get('tbl_category');

		 $result = $query->result();

		 return $result;

  }
  
  function add_data($data)

  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_blogs',$data);

	     return $this->db->insert_id();
	     
			
		}

  }
  
  
  function getLastid($table)
  {
		$this->db->select('max(id) as lastid');
	 	$query = $this->db->get($table);
	 	$result = $query->row();
		/*echo $this->db->last_query();
		exit;*/
	 	return $result;
	}
	
	function get_data_by_slug($slug)
  {
	 $this->db->select('tbl_blogs.*,tbl_category.cat_name');
	  $this->db->from('tbl_blogs');
	  $this->db->join('tbl_category', 'tbl_category.id = tbl_blogs.blog_category', 'inner');
	 $this->db->where('tbl_blogs.slug', $slug);
	 $query = $this->db->get();
	 $result = $query->result();
	 /*echo $this->db->last_query();
		exit;*/
	 return $result;
	
  }
  function edit_data($data,$slug)
	{
		if(!empty($data))
		{
			 $this->db->where('slug',$slug);
             $this->db->update('tbl_blogs', $data);
             /*echo $this->db->last_query();exit;*/
			 return $this->db->affected_rows();
		}
	}
  
	
}
