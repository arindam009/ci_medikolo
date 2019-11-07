<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Shippingzone_model extends CI_Model
{
   
  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_product_shipping_zone',$data);
	     return $this->db->insert_id();
	     
		}
  }
  
  
  function get_data()
  {
	 $this->db->select('*');
	 $this->db->where('status!=', 2);
	 $query = $this->db->get('tbl_product_shipping_zone');
	 $result = $query->result();
	 return $result;
	
  }
	
	
  public function delete_row_data($id)
  {
  		$data['status']=2;
	  $this->db->where('id', $id);
	  $this->db->update('tbl_product_shipping_zone', $data);
  }	
  
  
  
  
  
  function get_data_by_id($id)
  {
	 $this->db->select('*');
     $this->db->where('id', $id);
	 $query = $this->db->get('tbl_product_shipping_zone');
	 $result = $query->result();
	 return $result;
	
  }
  
  
  function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_product_shipping_zone', $data);
			 return $this->db->affected_rows();			 
		}
	}
  
  
  function class_allvalue() 
  {
		 $this->db->select('*');
		 $this->db->where('status!=', 2);
		 $query = $this->db->get('tbl_product_shipping_class');
		 $result = $query->result();
		 return $result;
  }
  
  function class_allvaluemethod() 
  {
		 $this->db->select('*');
		 $query = $this->db->get('tbl_product_shipping_method');
		 $result = $query->result();
		 return $result;
  }
  
  function join()
  {
	  	$this->db->select('tbl_product_shipping_zone.*,tbl_product_shipping_method.method_title,tbl_product_shipping_class.class_name');
	 	$this->db->from('tbl_product_shipping_zone');
	    $this->db->join('tbl_product_shipping_method', 'tbl_product_shipping_method.id = tbl_product_shipping_zone.shipping_method', 'inner');
	    $this->db->join('tbl_product_shipping_class', 'tbl_product_shipping_class.id = tbl_product_shipping_zone.class_id', 'inner');
	 $query = $this->db->get();
	 $result = $query->result();
	 return $result;
  }
	
}
