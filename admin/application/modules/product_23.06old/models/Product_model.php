<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Product_model extends CI_Model
{
    

  
	public function get_shipping_class(){
		$this->db->select('*');

	 $this->db->where('status!=', '2');

	 $query = $this->db->get('tbl_product_shipping_class');

	 $result = $query->result();

	 return $result;
	}
	public function get_shop_category(){
		$this->db->select('*');

	 $this->db->where('cat_type', 'Shop');
	 $this->db->where('status!=', '2');

	 $query = $this->db->get('tbl_category');

	 $result = $query->result();
	 return $result;
	}
	function getLastid($table){
		$this->db->select('max(id) as lastid');
	 	$query = $this->db->get($table);
	 	$result = $query->row();
		//echo $this->db->last_query();
		//exit;
	 	return $result;
	}

	
}
