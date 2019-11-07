<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Aboutus_model extends CI_Model
{
	
	
   function get_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 2);
		
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
 
    function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id',2);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   
   function get_recipe_category_data()
  {
  	$this->db->select('*');
  	$this->db->where('tbl_category.status=', '1');
	$this->db->where('tbl_category.cat_type=', 'Recipe');
	$query = $this->db->get('tbl_category');	
	$result = $query->result();
    return $result;
  }
	
}
