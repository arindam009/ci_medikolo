<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Reset_model extends CI_Model
{

   function email_check($email){
    $this->db->where('email', $email);
    $this->db->where('status', '1');
    $query = $this->db->get('tbl_users');
    if($query->num_rows() > 0)
    { 
      $row = $query->row();
      return $row;
      
    }
    }

  
   function add_data($data,$table){
    if(!empty($data)){
        $this->db->insert($table, $data);
         return $this->db->insert_id();
    }
  
   }
   function check_user($hprk){
     $this->db->where('retrieval_key',$hprk);
     $this->db->where('status', '1');
    $query = $this->db->get('tbl_pass_recovery');   
      if ($query->num_rows() > 0){
        //die("greter");
         $result = $query->row();
        return $result;
    }
    else{
     // die("smaller");
        return false;
    }
  }
   function update_password($data,$cust_id)
   {
    if(!empty($data)){
    $this->db->where('user_code',$cust_id);
      $this->db->update('tbl_users', $data);
    }
  
   }
   function update_status($cust_id){
          $data['status']='0';
    $this->db->where('customer_id_fk',$cust_id);
      $this->db->update('tbl_pass_recovery', $data);
   }
	
	function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 15);
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
      $this->db->where('tbl_blogs.status!=', 2);
      $this->db->where('tbl_blogs.is_feature_blog=',1);
	 $query = $this->db->get();
	 $result = $query->result();
	 return $result;
	
  } 
}
