<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home_model extends CI_Model
{
	
	function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 1);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   
	function get_blog_data()
  {
	 $this->db->select('tbl_blogs.*,tbl_category.cat_name');
	 $this->db->from('tbl_blogs');
      $this->db->join('tbl_category', 'tbl_category.id = tbl_blogs.blog_category', 'inner');    
      $this->db->order_by("orderid", "asc");
      $this->db->where('tbl_blogs.status=', 1);
      $this->db->where('tbl_blogs.is_approved=',1);
     $this->db->limit(3, 0);
	 $query = $this->db->get();
	
	 $result = $query->result();
	 return $result;
	
  }
  function get_featured_blog_data()
  {
	 $this->db->select('tbl_blogs.*,tbl_category.cat_name');
	 $this->db->from('tbl_blogs');
      $this->db->join('tbl_category', 'tbl_category.id = tbl_blogs.blog_category', 'inner');    
      $this->db->order_by("orderid", "asc");
      $this->db->where('tbl_blogs.status=', 1);
      $this->db->where('tbl_blogs.is_approved=',1);
      $this->db->where('tbl_blogs.is_feature_blog=',1);
     $this->db->limit(1, 0);
	 $query = $this->db->get();
	
	 $result = $query->result();
	 return $result;
	
  }
  
  
  function get_latest_recipe_data()
  {
	  $this->db->select('*');
      $this->db->order_by('tbl_recipe.orderid', "asc");
      $this->db->where('tbl_recipe.status=', 1);
      $this->db->where('tbl_recipe.is_approved=',1);
      $this->db->limit(3, 0);
      $query = $this->db->get('tbl_recipe');
       //echo $this->db->last_query();die();
      $result = $query->result();
      return $result;
	
  }
  function get_featured_recipe_data()
  {
	 $this->db->select('*');
      $this->db->order_by("orderid", "asc");
      $this->db->where('status=',1);
      $this->db->where('is_approved=',1);
      $this->db->where('is_featured=','1');
     $this->db->limit(3, 0);
	 $query = $this->db->get('tbl_recipe');
	 $result = $query->result();
	 //echo $this->db->last_query();die();
	 return $result;
	
  }
  function get_recipe_of_week()
  {
	 $this->db->select('*');
	 $this->db->from('tbl_recipe');
      $this->db->order_by("orderid", "asc");
      $this->db->where('tbl_recipe.status=', 1);
      $this->db->where('tbl_recipe.is_approved=',1);
      $this->db->where('tbl_recipe.recipe_type=','recipe of the week');
     $this->db->limit(1, 0);
	 $query = $this->db->get();
	$result = $query->result();
	//echo $this->db->last_query();die();
	 return $result;
	
  }
  function get_recipe_of_month()
  {
	 $this->db->select('*');
	 $this->db->from('tbl_recipe');
      $this->db->order_by("orderid", "asc");
      $this->db->where('tbl_recipe.status=', 1);
      $this->db->where('tbl_recipe.is_approved=',1);
      $this->db->where('tbl_recipe.recipe_type=','recipe of the month');
     $this->db->limit(1, 0);
	 $query = $this->db->get();
	$result = $query->result();
	//echo $this->db->last_query();die();
	 return $result;
	
  }
  function get_recipe_category_data()
  {
  	$this->db->select('*');
  	$this->db->where('tbl_category.status=', '1');
	$this->db->where('tbl_category.cat_type=', 'Recipe');
	$query = $this->db->get('tbl_category');	
	$result = $query->result();
	//echo $this->db->last_query();die();
    return $result;
  }
  function get_newest_member_data()
     {
	  $this->db->select('*');
      $this->db->order_by('tbl_users.id', "asc");
      $this->db->where('tbl_users.status=', '1');
      $this->db->limit(9, 0);
      $query = $this->db->get('tbl_users');
       //echo $this->db->last_query();die();
      $result = $query->result();
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
	  
      return $result;
  }
   
   
}
