<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Recipe extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();

        is_logged_in(); 	//common function for session checking.

		

        $this->load->library('form_validation');

		$this->load->model('Difficulty_model');

		$this->load->model('Ingredients_model');

		$this->load->model('Meal_type_model');

		$this->load->model('Nutritional_elements_model');

		$this->load->model('Recipe_model');

		

    }

//==========================view difficulty=========================================

	public function viewdifficulty()

    {

		

      

        $data_get= $this->Difficulty_model->get_data();

		$data['difficulty']=$data_get;

		

		$site_name=$this->config->item('site_name');

        $this->template->set('title', 'Difficulty | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewdifficulty',$data);

    

	

	

	}

	

/*================================ Add difficulty===========================*/	

	public function adddifficulty()

	{

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

			//print_r($_POST);die();

			$data['name']= strip_tags($this->input->post('name'));

			$name=strip_tags($this->input->post('name'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			$data['description']= strip_tags($this->input->post('description'));

			$data['status']= strip_tags($this->input->post('status'));

			

			 $this->form_validation->set_rules('name', 'Name', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');

			  if ($this->form_validation->run() == TRUE) {

			  	

			  	  $data_inserted = $this->Difficulty_model->add_data($data);

			  	  $this->session->set_flashdata('success_msg', 'Difficulty added Successfully'); 

                	redirect('admin/recipe/viewdifficulty');

			  }

			

		}

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Add Difficulty | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('adddifficulty');

	}

	

/*================================ Edit difficulty ===========================*/	



	public function editdifficulty($id)

    {

		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/recipe/viewdifficulty');	

		}

		

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

       

	       $data['name']= strip_tags($this->input->post('name'));

			$name=strip_tags($this->input->post('slug'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			$data['description']= strip_tags($this->input->post('description'));

			$data['status']= strip_tags($this->input->post('status'));

            

            

			 $this->form_validation->set_rules('name', 'Name', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');

			 $this->form_validation->set_rules('slug', 'Slug', 'trim|required');

          

            if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Difficulty_model->edit_data($data,$id);

                $this->session->set_flashdata('success_msg', 'Slider edited Successfully'); 

                redirect('admin/recipe/viewdifficulty');	

            }

		}

		

		

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Difficulty | '.$site_name);

		$data_single = $this->Difficulty_model->get_data_by_id($id);

		$data['difficulty']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editdifficulty',$data);

    }

	

/*================================ Delete difficulty===========================*/	

	

	public function delete_difficulty($dataid)

    {

        $this->Difficulty_model->delete_row_data($dataid);

		redirect('admin/recipe/viewdifficulty');

        exit;

    }

			

	

	

//===========================view ingredient========================================

	public function viewingredients()

    {

		$data_get= $this->Ingredients_model->get_data();

		$data['ingredients']=$data_get;

		

		$site_name=$this->config->item('site_name');

        $this->template->set('title', 'Ingredients | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewingredients',$data);

    }

	

	

	/*================================ Add ingredient===========================*/	

	public function addingredients()

	{

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

			//print_r($_POST);die();

			$data['name']= strip_tags($this->input->post('name'));

			$name=strip_tags($this->input->post('name'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			$data['description']= strip_tags($this->input->post('description'));

			$data['status']= strip_tags($this->input->post('status'));

			

			 $this->form_validation->set_rules('name', 'Name', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');

			  if ($this->form_validation->run() == TRUE) {

			  	

			  	  $data_inserted = $this->Ingredients_model->add_data($data);

			  	  $this->session->set_flashdata('success_msg', 'Ingredient added Successfully'); 

                	redirect('admin/recipe/viewingredients');

			  }

			

		}

		

		$site_name=$this->config->item('site_name');

        $this->template->set('title', 'Ingredients | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addingredients',$data);

		

	}

	

	

	/*================================ Edit ingredient ===========================*/	



	public function editingredients($id)

    {

		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/recipe/viewingredients');	

		}

		

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

       

	        $data['name']= strip_tags($this->input->post('name'));

			$name=strip_tags($this->input->post('slug'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			$data['description']= strip_tags($this->input->post('description'));

			$data['status']= strip_tags($this->input->post('status'));

            

            

			 $this->form_validation->set_rules('name', 'Name', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');

			 $this->form_validation->set_rules('slug', 'Slug', 'trim|required');

          

            if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Ingredients_model->edit_data($data,$id);

                $this->session->set_flashdata('success_msg', 'Ingredient edited Successfully'); 

                redirect('admin/recipe/viewingredients');	

            }

		}

		

		

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Ingredients | '.$site_name);

		$data_single = $this->Ingredients_model->get_data_by_id($id);

		$data['ingredients']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editingredients',$data);

    }

	

/*================================ Delete ingredient===========================*/	

	

	public function delete_ingredients($dataid)

    {

        $this->Ingredients_model->delete_row_data($dataid);

		redirect('admin/recipe/viewingredients');

        exit;

    }

    

    

    

    

    

//===========================view Meal========================================

	public function viewmeal()

    {

		$data_get= $this->Meal_type_model->get_data();

		$data['meal']=$data_get;

		

		$site_name=$this->config->item('site_name');

        $this->template->set('title', 'Meal | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewmeal',$data);

    }

	

	

	/*================================ Add Meal===========================*/	

	public function addmeal()

	{

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

			//print_r($_POST);die();

			$data['name']= strip_tags($this->input->post('name'));

			$name=strip_tags($this->input->post('name'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			$data['description']= strip_tags($this->input->post('description'));

			$data['status']= strip_tags($this->input->post('status'));

			

			 $this->form_validation->set_rules('name', 'Name', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');

			  if ($this->form_validation->run() == TRUE) {

			  	

			  	  $data_inserted = $this->Meal_type_model->add_data($data);

			  	  $this->session->set_flashdata('success_msg', 'Meal added Successfully'); 

                	redirect('admin/recipe/viewmeal');

			  }

			

		}

		

		$site_name=$this->config->item('site_name');

        $this->template->set('title', 'Meal | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addmeal',$data);

		

	}

	

	

/*================================ Edit Meal ===========================*/	



	public function editmeal($id)

    {

		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/recipe/viewmeal');	

		}

		

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

       

	        $data['name']= strip_tags($this->input->post('name'));

			$name=strip_tags($this->input->post('slug'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			$data['description']= strip_tags($this->input->post('description'));

			$data['status']= strip_tags($this->input->post('status'));

            

            

			 $this->form_validation->set_rules('name', 'Name', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');

			 $this->form_validation->set_rules('slug', 'Slug', 'trim|required');

          

            if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Meal_type_model->edit_data($data,$id);

                $this->session->set_flashdata('success_msg', 'Meal edited Successfully'); 

                redirect('admin/recipe/viewmeal');	

            }

		}

		

		

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Meal | '.$site_name);

		$data_single = $this->Meal_type_model->get_data_by_id($id);

		$data['meal']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editmeal',$data);

    }

	

/*================================ Delete Meal===========================*/	

	

	public function delete_meal($dataid)

    {

        $this->Meal_type_model->delete_row_data($dataid);

		redirect('admin/recipe/viewmeal');

        exit;

    }

    

    

    

    //===========================view Nutritional========================================

	public function viewnutritionalelements()

    {

		$data_get= $this->Nutritional_elements_model->get_data();

		$data['nutritional']=$data_get;

		

		$site_name=$this->config->item('site_name');

        $this->template->set('title', 'Nutritional Elements| '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewnutritionalelements',$data);

    }

	

	

	/*================================ Add Nutritional===========================*/	

	public function addnutritionalelements()

	{

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

			//print_r($_POST);die();

			$data['name']= strip_tags($this->input->post('name'));

			$name=strip_tags($this->input->post('name'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			$data['description']= strip_tags($this->input->post('description'));

			$data['status']= strip_tags($this->input->post('status'));

			

			 $this->form_validation->set_rules('name', 'Name', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');

			  if ($this->form_validation->run() == TRUE) {

			  	

			  	  $data_inserted = $this->Nutritional_elements_model->add_data($data);

			  	  $this->session->set_flashdata('success_msg', 'Nutritional added Successfully'); 

                	redirect('admin/recipe/viewnutritionalelements');

			  }

			

		}

		

		$site_name=$this->config->item('site_name');

        $this->template->set('title', 'Nutritional | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addnutritionalelements',$data);

		

	}

	

	

	

	/*================================ Edit Nutritional ===========================*/	



	public function editnutritionalelements($id)

    {

		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/recipe/viewnutritionalelements');	

		}

		

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

       

	        $data['name']= strip_tags($this->input->post('name'));

			$name=strip_tags($this->input->post('slug'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			$data['description']= strip_tags($this->input->post('description'));

			$data['status']= strip_tags($this->input->post('status'));

            

            

			 $this->form_validation->set_rules('name', 'Name', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');

			 $this->form_validation->set_rules('slug', 'Slug', 'trim|required');

          

            if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Nutritional_elements_model->edit_data($data,$id);

                $this->session->set_flashdata('success_msg', 'Nutritional edited Successfully'); 

                redirect('admin/recipe/viewnutritionalelements');	

            }

		}

		

		

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Nutritional | '.$site_name);

		$data_single = $this->Nutritional_elements_model->get_data_by_id($id);

		$data['nutritional']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editnutritionalelements',$data);

    }

	

/*================================ Delete Nutritional===========================*/	

	

	public function delete_nutritionalelements($dataid)

    {

        $this->Nutritional_elements_model->delete_row_data($dataid);

		redirect('admin/recipe/viewnutritionalelements');

        exit;

    }

    

    

    

    //==========================view Recipe=========================================

	public function viewrecipe()

    {

		

      

        $data_get= $this->Recipe_model->get_data();


		$data['recipe_all']=$data_get;

		

		$site_name=$this->config->item('site_name');

        $this->template->set('title', 'Recipe | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewrecipe',$data);

    

	

	

	}

	

/*================================ Add Recipe===========================*/	

	public function addrecipe()

	{

		$data_class['all_difficulty'] = $this->Recipe_model->difficulty_allvalue();

		

		$data_class['all_meal'] = $this->Recipe_model->meal_allvalue();

		$data_class['all_category'] = $this->Recipe_model->category_allvalue();

		/*echo $this->db->last_query();

    	die("here");*/

    	$data_class['all_unit'] = $this->Recipe_model->unit_allvalue();

		

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{
			extract($_POST);
			extract($_FILES);
			//echo  "<pre>";
			//print_r($_POST);
			//print_r($_FILES);
			//echo "</pre>";die("hi");
			$lastid=$this->Recipe_model->getLastid("tbl_recipe");
			//print_r($lastid);
			$recipe_code='RECP'.date('Y').str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
			//echo $recipe_code;die("here");
			//INSERT INSTUCTION
			for($i=0;$i<count($inst_name);$i++){
				$this->load->library('upload');
				$_FILES['userfile']['name']=$_FILES['ins_image']['name'][$i];
				$_FILES['userfile']['type'] = $_FILES['ins_image']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $_FILES['ins_image']['tmp_name'][$i];
                $_FILES['userfile']['error']    = $_FILES['ins_image']['error'][$i];
                $_FILES['userfile']['size']     = $_FILES['ins_image']['size'][$i];
                $config['upload_path']          = '../uploads/recipe_image/instruction';
                $config['allowed_types']        = 'png|jpg|jpeg';
                $config['max_size']             = 100000;
                //$config['encrypt_name'] = TRUE;
                //$config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->upload->initialize($config);	
                if (! $this->upload->do_upload()) {
                	$error = array('error' => $this->upload->display_errors()); 
				} else {
					$instruction['recipe_code']=$recipe_code;
					$instruction['name']=$inst_name[$i];
					$final_files_data[] = $this->upload->data();    
					$instruction['images']= $final_files_data[0]['file_name'];
					$data_instuction_insert = $this->Recipe_model->instruction_insert($instruction);
				}			 
				
			}
			//insert into ingradients
			
			for($ig=0;$ig<count($ing_name);$ig++){
				$ingradients['recipe_code']=$recipe_code;
				$ingradients['name']=$ing_name[$ig];
				$ingradients['quantity']=$ing_quantity[$ig];
				$ingradients['unit']=$ing_unit[$ig];
				$data_ingradients_insert = $this->Recipe_model->ingradients_insert($ingradients);
			}
			
			
			//insert nutrituioin element
			
			for($ne=0;$ne<count($ne_name);$ne++){
				$nutrition['recipe_code']=$recipe_code;
				$nutrition['name']=$ne_name[$ne];
				$nutrition['quantity']=$ne_quantity[$ne];
				$nutrition['unit']=$ne_unit[$ne];
				$data_nutrition_insert = $this->Recipe_model->nutrition_insert($nutrition);
			}
			
			
			//die("here");
			
			
			$data['recipe_code']= strip_tags($recipe_code);

			$name=strip_tags($this->input->post('recipe_name'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			

			$data['recipe_name']= strip_tags($this->input->post('recipe_name'));

			$data['preparetion_time']= strip_tags($this->input->post('preparetion_time'));

			$data['cook_time']= strip_tags($this->input->post('cook_time'));

			$data['serving_people']= strip_tags($this->input->post('serving_people'));

			$data['dificulty']= strip_tags($this->input->post('dificulty'));

			$data['type_of_meal']= strip_tags($this->input->post('type_of_meal'));
			
			$data['category']=json_encode($this->input->post('category'));
		    
			//print_r($data['category']);die();
			$data['description']= $this->input->post('description');

			$data['status']= strip_tags($this->input->post('status'));

			$now = date('Y-m-d');

			$data['created_on'] =$now;
			$data['approve_on']=date('Y-m-d H:i:s');
						

			 $this->form_validation->set_rules('recipe_name', 'Recipe Name', 'trim|required');

			 $this->form_validation->set_rules('preparetion_time', 'Preparetion Time', 'trim|required');

			 $this->form_validation->set_rules('cook_time', 'Cook Time', 'trim|required');

			 $this->form_validation->set_rules('serving_people', 'Serving People', 'trim|required');

			 $this->form_validation->set_rules('dificulty', 'Dificulty', 'trim|required');

			 $this->form_validation->set_rules('type_of_meal', 'Type Of Meal', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');
			 
					 $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['feature_image']['name']);



                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['feature_image']['name'];

                        $_FILES['userfile']['type']     = $_FILES['feature_image']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['feature_image']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['feature_image']['error'];

                        $_FILES['userfile']['size']     = $_FILES['feature_image']['size'];

                        $config['upload_path']          = '../uploads/recipe_image';
                        $config['allowed_types']        = 'png|jpg|jpeg';

                        $config['max_size']             = 100000;
                        //$config['encrypt_name'] = TRUE;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);





                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 

                        

                        } else {

                            

                            $final_files_data[] = $this->upload->data();

                            

                             $data['feature_image']= $final_files_data[0]['file_name'];

			  if ($this->form_validation->run() == TRUE) {

			  	

			  	  $data_inserted = $this->Recipe_model->add_data($data);

			  	  $this->session->set_flashdata('success_msg', 'Recipe added Successfully'); 

                	redirect('admin/recipe/viewrecipe');
                	
				}

			  }

			

		}

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Add Recipe | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addrecipe',$data_class);

	}

	

/*================================ Edit recipe ===========================*/



	public function editrecipe($id)

    {

		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/recipe/viewrecipe');	

		}

		$data_class['all_difficulty'] = $this->Recipe_model->difficulty_allvalue();

		$data_class['all_meal'] = $this->Recipe_model->meal_allvalue();

		$data_class['all_category'] = $this->Recipe_model->category_allvalue();

    	$data_class['all_unit'] = $this->Recipe_model->unit_allvalue();
    	
    	$data_class['all_instruction'] = $this->Recipe_model->instruction_allvalue();
    	
    	$data_class['all_ingredients'] = $this->Recipe_model->ingredients_allvalue();
    	
    	$data_class['all_nutritional'] = $this->Recipe_model->nutritional_allvalue();
    	
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		
		{
			extract($_POST);
			extract($_FILES);
			/*echo  "<pre>";
			print_r($_POST);
			print_r($_FILES);
			echo "</pre>";*/			
			//print_r($lastid);
			//echo $recipe_code;die("here");
			//INSERT INSTUCTION
			for($i=0;$i<count($inst_name);$i++){
				$this->load->library('upload');
				$_FILES['userfile']['name']=$_FILES['ins_image']['name'][$i];
				$_FILES['userfile']['type'] = $_FILES['ins_image']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $_FILES['ins_image']['tmp_name'][$i];
                $_FILES['userfile']['error']    = $_FILES['ins_image']['error'][$i];
                $_FILES['userfile']['size']     = $_FILES['ins_image']['size'][$i];
                $config['upload_path']          = '../uploads/recipe_image/instruction';
                $config['allowed_types']        = 'png|jpg|jpeg';
                $config['max_size']             = 100000;
                //$config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->upload->initialize($config);	
                if (! $this->upload->do_upload()) {
                	$error = array('error' => $this->upload->display_errors()); 
				} else {
					$instruction['recipe_code']=$recipe_code;
					$instruction['name']=$inst_name[$i];
					$final_files_data[] = $this->upload->data();    
					$instruction['images']= $final_files_data[0]['file_name'];
					$data_instuction_insert = $this->Recipe_model->instruction_insert($instruction);
				}			 
				
			}
			//insert into ingradients
			//$delete_ingradient=$this->Recipe_model->delete_ingredient($recipe_code);
			
			for($ig=0;$ig<count($ing_name);$ig++){
				$ingradients['recipe_code']=$recipe_code;
				$ingradients['name']=$ing_name[$ig];
				$ingradients['quantity']=$ing_quantity[$ig];
				$ingradients['unit']=$ing_unit[$ig];
				$data_ingradients_insert = $this->Recipe_model->ingradients_insert($ingradients);
			}
			
			
			//insert nutrituioin element
			
			for($ne=0;$ne<count($ne_name);$ne++){
				$nutrition['recipe_code']=$recipe_code;
				$nutrition['name']=$ne_name[$ne];
				$nutrition['quantity']=$ne_quantity[$ne];
				$nutrition['unit']=$ne_unit[$ne];
				$data_nutrition_insert = $this->Recipe_model->nutrition_insert($nutrition);
			}
			
			
			//die("here");
			
			
			$data['recipe_code']= strip_tags($recipe_code);

			$name=strip_tags($this->input->post('recipe_name'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			

			$data['recipe_name']= strip_tags($this->input->post('recipe_name'));

			$data['preparetion_time']= strip_tags($this->input->post('preparetion_time'));

			$data['cook_time']= strip_tags($this->input->post('cook_time'));

			$data['serving_people']= strip_tags($this->input->post('serving_people'));

			$data['dificulty']= strip_tags($this->input->post('dificulty'));

			$data['type_of_meal']= strip_tags($this->input->post('type_of_meal'));
			
			$data['category']=json_encode($this->input->post('category'));
		    
			//print_r($data['category']);die();
			$data['description']= $this->input->post('description');

			$data['status']= strip_tags($this->input->post('status'));

			$now = date('Y-m-d');

			$data['created_on'] =$now;
			$data['approve_on']=date('Y-m-d H:i:s');
						

			 $this->form_validation->set_rules('recipe_name', 'Recipe Name', 'trim|required');

			 $this->form_validation->set_rules('preparetion_time', 'Preparetion Time', 'trim|required');

			 $this->form_validation->set_rules('cook_time', 'Cook Time', 'trim|required');

			 $this->form_validation->set_rules('serving_people', 'Serving People', 'trim|required');

			 $this->form_validation->set_rules('dificulty', 'Dificulty', 'trim|required');

			 $this->form_validation->set_rules('type_of_meal', 'Type Of Meal', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');
			 
					 $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['feature_image']['name']);



                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['feature_image']['name'];

                        $_FILES['userfile']['type']     = $_FILES['feature_image']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['feature_image']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['feature_image']['error'];

                        $_FILES['userfile']['size']     = $_FILES['feature_image']['size'];

                        $config['upload_path']          = '../uploads/recipe_image';
                        $config['allowed_types']        = 'png|jpg|jpeg';

                        $config['max_size']             = 100000;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);





                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 

                        

                        } else {

                            

                            $final_files_data[] = $this->upload->data();

                            

                             $data['feature_image']= $final_files_data[0]['file_name'];

			  if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Recipe_model->edit_data($data,$id);

                $this->session->set_flashdata('success_msg', 'Recipe edited Successfully'); 

                redirect('admin/recipe/viewrecipe');
                	
				}

			  }

			

		}
		

		

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Recipe | '.$site_name);

		$data_single = $this->Recipe_model->get_data_by_recipecode($id);

		$data_class['recipe_all']=$data_single ;
		$data_class['ingredients']=$this->Ingredients_model->get_data_by_recipe_code($id);
		$data_class['instruction']=$this->Recipe_model->instruction_by_recipecode($id);
		$data_class['nutrition_element']=$this->Nutritional_elements_model->get_data_by_recipecode($id);

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editrecipe',$data_class);

    }

	

/*================================ Delete recipe===========================	

	

	public function delete_recipe($dataid)

    {

        $this->Recipe_model->delete_row_data($dataid);

		redirect('admin/recipe/viewrecipe');

        exit;

    }*/
    public function reject($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_approved'] = '0';
               $data_inserted = $this->Recipe_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

    
    public function approve($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_approved'] = '1';
               $data_inserted = $this->Recipe_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }       

	

}

