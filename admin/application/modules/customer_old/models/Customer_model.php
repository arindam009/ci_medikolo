<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Customer_model extends CI_Model
{
	
	
   
  function get_data()
  {
	 $this->db->select('tbl_users.*,tbl_customer.*');
	 $this->db->from('tbl_users');
	 $this->db->join('tbl_customer', 'tbl_customer.cust_code = tbl_users.user_code', 'left');
     $this->db->where('tbl_users.user_type', 2);
     $query = $this->db->get(); 
	 $result = $query->result();
	 /*echo $this->db->last_query();
	 exit;*/
	return $result;
  }
  
  function get_data_by_id($id)
  {
	 $this->db->select('*');
     
	  $this->db->where('id', $id);
	 $query = $this->db->get('tbl_customer');
	 $result = $query->result();
	 //print_r($result);exit;
	 return $result;
	
  }
  
  
  public function delete_row_data($id)

  {

  	  $data['status']=2;

	  $this->db->where('id', $id);

	  $this->db->update('tbl_customer', $data);

	  

  }	
  
  
  function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_customer', $data);
             //echo $this->db->last_query();die();
			 return $this->db->affected_rows();
		}
	}

	
}
