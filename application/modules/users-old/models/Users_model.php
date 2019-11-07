<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Users_model extends CI_Model
{
	
	function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 3);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   function get_details_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 4);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
  
  function get_single_member_data($slug)
     {
	 
	  $this->db->select('tbl_users.*,tbl_blogs.blog_name,tbl_blogs.slug,tbl_blogs.blog_description,');
	  $this->db->from('tbl_users');
      $this->db->join('tbl_blogs', 'tbl_blogs.user_code = tbl_users.user_code', 'left');
      $this->db->where('tbl_users.status=', 1);
      $this->db->where('tbl_users.profile_url',$slug);
	  $query = $this->db->get();
	  $result = $query->result();
	  echo $this->db->last_query();
	  exit();
	  //print_r($result); die();
	  return $result;
   }
  
}
