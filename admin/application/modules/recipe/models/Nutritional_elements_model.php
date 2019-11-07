<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Nutritional_elements_model extends CI_Model

{

   

  function add_data($data)

  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_nutritional_elements',$data);

	     return $this->db->insert_id();

		}

  }

  

  

  function get_data()

  {

	 $this->db->select('*');

	 $this->db->where('status!=', 2);

	 $query = $this->db->get('tbl_nutritional_elements');

	 $result = $query->result();

	 return $result;

	

  }

	

	

  public function delete_row_data($id)

  {

  	  $data['status']=2;

	  $this->db->where('id', $id);

	  $this->db->update('tbl_nutritional_elements', $data);

  }	

  

  

  

  

  

  function get_data_by_id($id)

  {

	 $this->db->select('*');

     

	  $this->db->where('id', $id);

	 $query = $this->db->get('tbl_nutritional_elements');

	 $result = $query->result();

	 return $result;

	

  }
   function get_data_by_recipecode($id)

  {

	 $this->db->select('*');

     

	  $this->db->where('recipe_code', $id);

	 $query = $this->db->get('tbl_recipe_nutritional_elements');

	 $result = $query->result();

	 return $result;

	

  }

  

  

  function edit_data($data,$id)

	{

		if(!empty($data))

		{

			 $this->db->where('id',$id);

             $this->db->update('tbl_nutritional_elements', $data);

			 return $this->db->affected_rows();

		}

	}

  

  

	

}

