<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Category_model extends CI_Model

{

   

  function add_data($data)

  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_category',$data);

	     return $this->db->insert_id();

		}

  }

  

  

   function get_all()
  {
	 $this->db->select('*');
	  $this->db->where('status!=', '2');
	 $query = $this->db->get('tbl_category');
	 $this->db->where('tbl_category.order.id=','asc');
	 $result = $query->result();
	 return $result;
	
  }

	

	

  public function delete_row_data($id)

  { 
	  $data['status']='2';
	   $this->db->where('id',$id);
       $this->db->update('tbl_category', $data);
     // echo $this->db->last_query();die();
            return $this->db->affected_rows();


  }	

  

  

  

  

  

  function get_data_by_id($id)

  {

	 $this->db->select('*');

     

	  $this->db->where('id', $id);

	 $query = $this->db->get('tbl_category');

	 $result = $query->result();

	 return $result;

	

  }
  function get_data_by_type($type)

  {

	  $this->db->select('*');
	  $this->db->where('cat_type', $type);
	  $this->db->where('status!=', '2');
	  $this->db->order_by("orderid", "asc");
	  $query = $this->db->get('tbl_category');
	  $result = $query->result();
	//echo $this->db->last_query();
	 /*echo "<pre>"; print_r($result); die();*/
	 return $result;

	

  }


  

  

  function edit_data($data,$id)

	{

		if(!empty($data))

		{

			 $this->db->where('id',$id);

             $this->db->update('tbl_category', $data);

			 return $this->db->affected_rows();

		}

	}

  

  

	

}

