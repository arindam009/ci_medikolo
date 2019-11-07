<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Shippingmethod_model extends CI_Model
{
   
  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_product_shipping_method',$data);
	     return $this->db->insert_id();
	     /*$sql = $this->db->last_query();
	     echo $sql;die("here");*/ 
		}
  }
  
  
  function get_data()
  {
	 $this->db->select('*');
	 $query = $this->db->get('tbl_product_shipping_method');
	 $result = $query->result();
	 return $result;
	
  }
	
	
  public function delete_row_data($id)
  {
	  $this->db->where('id', $id);
	  $this->db->update('tbl_product_shipping_method', $data);
  }	
  
  
  
  
  
  function get_data_by_id($id)
  {
	 $this->db->select('*');
     $this->db->where('id', $id);
	 $query = $this->db->get('tbl_product_shipping_method');
	 $result = $query->result();
	 return $result;
	
  }
  
  
  function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_product_shipping_method', $data);
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
  function joining()
  {
  		$this->db->select('tbl_product_shipping_method.*,tbl_product_shipping_class.class_name');
 		 $this->db->from('tbl_product_shipping_method');
      	 $this->db->join('tbl_product_shipping_class', 'tbl_product_shipping_class.id = tbl_product_shipping_method.shipping_class_id', 'inner');
         $this->db->where('tbl_product_shipping_class.status!=', 2);
		 $query = $this->db->get();
		 $result = $query->result();
		 return $result;
  }
  

	
}
