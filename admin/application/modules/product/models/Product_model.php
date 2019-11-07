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
	public function get_tax_group(){
		$this->db->select('*');
	 $this->db->where('status', '1');

	 $query = $this->db->get('tbl_tax_group');

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
	function  add_attribute($table,$data)
	{

	 if(!empty($data))
		{
	     $this->db->insert($table,$data);
	     return $this->db->insert_id();
		}
	}

	function  get_variation($table,$pcode)
	{

	$this->db->select('*');

	 $this->db->where('	pcode', $pcode);
	 $this->db->where('used_variation', '1');

	 $query = $this->db->get($table);

	 $result = $query->result();
	 return $result;
	}
	function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_product',$data);
	     return $this->db->insert_id();
		}
  }
function gallery_img_insert($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_product_gallery_image',$data);
	     return $this->db->insert_id();
		}
  }
  function get_data()
  {
	 $this->db->select('*');
	 $this->db->from('tbl_product');	 
	  $this->db->where('status!=', 4);
	 $this->db->order_by("orderid", "asc");
	 $query = $this->db->get();
	 $result = $query->result();
	 return $result;
	
  }	
  function get_data_by_productcode($id)

  {

	 $this->db->select('*');

     

	  $this->db->where('pcode', $id);
	 $query = $this->db->get('tbl_product');

	 $result = $query->row();

	 return $result;

	

  }
  function get_image_by_productcode($id)

  {

	 $this->db->select('*');

     

	  $this->db->where('pcode', $id);

	 $query = $this->db->get('tbl_product_gallery_image');

	 $result = $query->result();

	 return $result;

	

  }
  function edit_data_by_productcode($data,$id)

	{

		if(!empty($data))

		{

			 $this->db->where('pcode',$id);

             $this->db->update('tbl_product', $data);

			 return $this->db->affected_rows();

		}

	}
	function delete_data_by_productcode($id,$tbl_name)

	{

		 $this->db->where('pcode', $id);
   		 $this->db->delete($tbl_name);
   		//echo $this->db->last_query();die("here");

	}
	function delete_data_by_id($id,$tbl_name)

	{

		 $this->db->where('id', $id);
   		 $this->db->delete($tbl_name);
   		//echo $this->db->last_query();die("here");

	}

	function delete($id)

	{

		 $this->db->where('pcode', $id);
   		 $this->db->delete('tbl_product');
   		//echo $this->db->last_query();die("here");

	}
	 function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_product', $data);
			 return $this->db->affected_rows();
		}
	}



	
}
