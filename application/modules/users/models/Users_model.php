<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Users_model extends CI_Model
{
	
	function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 18);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   function get_details_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 18);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
  
  function get_single_member_data($slug)
     {
	 
	  $this->db->select('tbl_users.*,tbl_customer.*');
	  $this->db->from('tbl_users');
      $this->db->join('tbl_customer', 'tbl_customer.cust_code = tbl_users.user_code', 'left');
      $this->db->where('tbl_users.status=', '1');
      $this->db->where('tbl_customer.status=', '1');
      $this->db->where('tbl_users.profile_url',$slug);
	  $query = $this->db->get();
	  $result = $query->row();
	  /*echo $this->db->last_query();
	  exit();*/
	  //print_r($result); die();
	  return $result;
   
   }
   
   function get_total_blog_data($slug)
     {
	 
	  $this->db->select('tbl_users.*,tbl_blogs.*');
	  $this->db->from('tbl_users');
      $this->db->join('tbl_blogs', 'tbl_blogs.user_code = tbl_users.user_code', 'left');
      $this->db->where('tbl_users.status=', '1');
      $this->db->where('tbl_blogs.status!=', '2');
      
      $this->db->where('tbl_users.profile_url',$slug);
	  $query = $this->db->get();
	  $result = $query->result();
	  //echo $this->db->last_query();
	  //exit();
	  //print_r($result); die();
	  return $result;
   }
   
   
   function get_blog_data($slug)
     {
	 
	  $this->db->select('COUNT(*) AS post_count, ');
	  $this->db->from('tbl_users');
      $this->db->join('tbl_blogs', 'tbl_blogs.user_code = tbl_users.user_code', 'left');
      $this->db->where('tbl_users.status=', '1');
      $this->db->where('tbl_blogs.status!=', '2');
      
      $this->db->where('tbl_users.profile_url',$slug);
	  $query = $this->db->get();
	  $result = $query->row();
	  /*echo $this->db->last_query();
	  exit();*/
	  //print_r($result); die();
	  return $result;
   }
   
   function get_total_recipe_data($slug)
   {
	 
	  $this->db->select('tbl_users.*,tbl_recipe.*,tbl_difficulty.name as diff_name');
	  $this->db->from('tbl_users');
      $this->db->join('tbl_recipe', 'tbl_recipe.user_code = tbl_users.user_code', 'left');
      $this->db->join('tbl_difficulty', 'tbl_difficulty.id = tbl_recipe.dificulty', 'left');
      $this->db->where('tbl_users.status=', '1');
      $this->db->where('tbl_users.profile_url',$slug);
	  $query = $this->db->get();
	  $result = $query->result();
	 /* echo $this->db->last_query();
	  exit();*/
	  //print_r($result); die();
	  return $result;
   }
   
   function get_recipe_data($slug)
     {
	 
	  $this->db->select('COUNT(*) AS post_count, ');
	  $this->db->from('tbl_users');
      $this->db->join('tbl_recipe', 'tbl_recipe.user_code = tbl_users.user_code', 'left');
      $this->db->where('tbl_users.status=', '1');
      $this->db->where('tbl_recipe.status=', '1');
      $this->db->where('tbl_recipe.is_approved=', '1');
      $this->db->where('tbl_users.profile_url',$slug);
	  $query = $this->db->get();
	  $result = $query->row();
	  //echo $this->db->last_query();
	  //exit();
	  //print_r($result); die();
	  return $result;
   }
   
   function count_comments($refcode)
  {
  		$this->db->select('count(id) as total');
      $this->db->where('status', 1);
      $this->db->where('ref_code', $refcode);
      
      $query = $this->db->get('tbl_comment_reviews');
	  $result = $query->row();
	  //print_r ($result);
	  //echo $this->db->last_query();
	  //exit;
      return $result;
  }
  
}
