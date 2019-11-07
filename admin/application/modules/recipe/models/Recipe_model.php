<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Recipe_model extends CI_Model

{

  function add_data($data)

  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_recipe',$data);

	     return $this->db->insert_id();
	     
			
		}

  }
  
  function instruction_insert($data)
  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_recipe_instruction',$data);

	     return $this->db->insert_id();
	     
			
		}

  }
  function ingradients_insert($data)
  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_recipe_ingredients',$data);

	     return $this->db->insert_id();
	     
			
		}

  }
  
  
	
  function nutrition_insert($data)
  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_recipe_nutritional_elements',$data);

	     return $this->db->insert_id();
	     
			
		}

  }
  
  
	function getLastid($table){
		$this->db->select('max(id) as lastid');
	 	$query = $this->db->get($table);
	 	$result = $query->row();
		/*echo $this->db->last_query();
		exit;*/
	 	return $result;
	}
  

  

  function get_data()

  {

  	 

	 $this->db->select('tbl_recipe.*,tbl_difficulty.name as dificulty_name');
	 $this->db->from('tbl_recipe');
	 $this->db->join('tbl_difficulty', 'tbl_difficulty.id = tbl_recipe.dificulty', 'left');
     $this->db->join('tbl_meal_type', 'tbl_meal_type.id = tbl_recipe.type_of_meal', 'left');
     $this->db->where('tbl_recipe.status!=', 2);
     $this->db->order_by("orderid", "asc");
     $query = $this->db->get(); 
	 $result = $query->result();
	// echo $this->db->last_query();
	// exit;
	return $result;

	

  }

	

	

  public function delete_row_data($id)

  {

  	  $data['status']=2;

	  $this->db->where('id', $id);

	  $this->db->update('tbl_recipe', $data);

	  

  }	

  function get_data_by_id($id)

  {

	 $this->db->select('*');

     

	  $this->db->where('tbl_recipe', $id);

	 $query = $this->db->get('tbl_recipe');

	 $result = $query->result();

	 return $result;

	

  }
  function get_data_by_recipecode($id)

  {

	 $this->db->select('*');

     

	  $this->db->where('recipe_code', $id);

	 $query = $this->db->get('tbl_recipe');

	 $result = $query->result();

	 return $result;

	

  }


  

  

  function edit_data($data,$id)

	{

		if(!empty($data))

		{

			 $this->db->where('id',$id);

             $this->db->update('tbl_recipe', $data);

			 return $this->db->affected_rows();

		}

	}

  function edit_data_by_recipecode($data,$id)

	{

		if(!empty($data))

		{

			 $this->db->where('recipe_code',$id);

             $this->db->update('tbl_recipe', $data);

			 return $this->db->affected_rows();

		}

	}
	
	 

  function difficulty_allvalue() 

  {

		 $this->db->select('*');

		 $this->db->where('status!=', 2);

		 $query = $this->db->get('tbl_difficulty');

		 $result = $query->result();

		 return $result;

  }

  

  

  function meal_allvalue() 

  {

		 $this->db->select('*');

		 $this->db->where('status!=', 2);

		 $query = $this->db->get('tbl_meal_type');

		 $result = $query->result();

		 return $result;

  }

  function category_allvalue() 

  {

		 $this->db->select('*');

		 $this->db->where('is_parent=', 1);

		 $this->db->where('cat_type=',Recipe);

		 $query = $this->db->get('tbl_category');

		 $result = $query->result();

		 return $result;

  }

  

  

  function unit_allvalue() 

  {

		 $this->db->select('*');

		 $this->db->where('status!=', 2);

		 $query = $this->db->get('tbl_unit');

		 $result = $query->result();

		 return $result;

  }
  
  function instruction_allvalue() 

  {

		 $this->db->select('*');

		 $query = $this->db->get('tbl_recipe_instruction');

		 $result = $query->result();

		 return $result;

  }
  function instruction_by_recipecode($id) 

  {

		 $this->db->select('*');

	  $this->db->where('recipe_code', $id);

	 $query = $this->db->get('tbl_recipe_instruction');

	 $result = $query->result();

	 return $result;

  }

  function ingredients_allvalue() 

  {

		 $this->db->select('*');

		 $query = $this->db->get('tbl_recipe_ingredients');

		 $result = $query->result();

		 return $result;

  }
  
  function nutritional_allvalue() 

  {

		 $this->db->select('*');

		 $query = $this->db->get('tbl_recipe_nutritional_elements');

		 $result = $query->result();

		 return $result;

  }
  function delete_data_by_recipecode($id,$tbl_name)

	{

		 $this->db->where('recipe_code', $id);
   		 $this->db->delete($tbl_name);
   		//echo $this->db->last_query();die("here");

	}

  

  

	

}

