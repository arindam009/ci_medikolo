<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Courses extends MX_Controller

{

    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        $this->load->library('form_validation');
		$this->load->model('Courses_model');
    }
    //===================================================================
    public function index()
    {
        $data_get= $this->Courses_model->get_data();
		$data['alldata_row']=$data_get;
        $this->template->set('title', 'Course | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('courses',$data);
	}

/*================================ Add===========================*/	

public function addcourses()
    {
        $data_get= $this->Courses_model->get_data();
		$data_like['alldata_row']=$data_get;
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
            $data['course_name']= strip_tags($this->input->post('course_name'));
		    $data['course_description']= $this->input->post('course_description');
			$data['course_duration']= strip_tags($this->input->post('course_duration'));
			$data['course_duration_desc']= $this->input->post('course_duration_desc');
			$data['course_fees']= strip_tags($this->input->post('course_fees'));
			$data['course_type']= strip_tags($this->input->post('course_type'));
			$data['is_upcoming']= strip_tags($this->input->post('is_upcoming'));
			$data['is_latest']= strip_tags($this->input->post('is_latest'));
			
			
			$data['meta_title']= strip_tags($this->input->post('meta_title'));
			$data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
			$data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
			$data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
			
			$data['robot_index']= strip_tags($this->input->post('robot_index'));
				$data['robotindex']= strip_tags($this->input->post('robotindex'));
			
			$data_related_courses = $this->input->post('like_chk[]');
			$data['related_courses'] = implode(",",$data_related_courses);
			$data['course_slug'] =  str_replace(' ','-',strtolower(strip_tags($this->input->post('course_slug'))));
			
			
            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('course_name', 'course_name', 'trim|required');
			$this->form_validation->set_rules('course_description', 'course_description', 'trim|required');
			$this->form_validation->set_rules('course_duration', 'course_duration', 'trim|required');
			$this->form_validation->set_rules('course_fees', 'course_fees', 'trim|required');
			$this->form_validation->set_rules('course_type', 'course_type', 'trim|required');

            $option_batch_array = array();
		    $option_batch_array = $_REQUEST['batch_time_all'];
        
            if ($this->form_validation->run() == false) 
			{
                $err_flag=1;
            }
            if ($err_flag==0) {
                        $this->load->library('upload');
                        $number_of_files_uploaded = count($_FILES['image_src']['name']);
                        // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = '../uploads/courses_image';
                        $config['allowed_types']        = 'png|jpg|jpeg|gif';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);

                        if (! $this->upload->do_upload()) 
						{
                         $error = array('error' => $this->upload->display_errors()); 
                        } 
						else 
						{
                            $final_files_data[] = $this->upload->data();
							$data['image_src']= $final_files_data[0]['file_name'];
							
							$data_inserted = $this->Courses_model->add_data($data);
						
								foreach($option_batch_array as $single_val)
								{ 
								  if($single_val!="")
								  {
									$bacth_data['course_id']= $data_inserted;
									$bacth_data['batch_time_all ']= $single_val;
									$bacth_data['is_upcoming '] = 'yes';
									$this->Courses_model->add_batches_data($bacth_data);
								  }
									
								}

                        }
               $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
               redirect('admin/courses');				
            } 
			else 
			{
				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  
				redirect('admin/courses/addcourses');
            }
   }

		else
		{
		$data_like['lecturer_list'] = $this->Courses_model->get_lecturer_data();	
	    $this->template->set('title', 'Add Course | Inetwork');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addcourses',$data_like);
		}

    }

	

/*================================ Edit ===========================*/	



public function editcourses($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/courses');	
		}
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
            $data['course_name']= strip_tags($this->input->post('course_name'));
		    $data['course_description']= $this->input->post('course_description');
			$data['course_duration']= strip_tags($this->input->post('course_duration'));
			$data['course_duration_desc']= $this->input->post('course_duration_desc');
			$data['course_fees']= strip_tags($this->input->post('course_fees'));
			$data['course_type']= strip_tags($this->input->post('course_type'));
			$data['is_upcoming']= strip_tags($this->input->post('is_upcoming'));
			$data['is_latest']= strip_tags($this->input->post('is_latest'));
			
			
				$data['meta_title']= strip_tags($this->input->post('meta_title'));
			$data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
			$data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
			$data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
			
			$data['robot_index']= strip_tags($this->input->post('robot_index'));
				$data['robotindex']= strip_tags($this->input->post('robotindex'));
			
			$data_related_courses = $this->input->post('like_chk[]');
			
			$data['related_courses'] = implode(",",$data_related_courses);
			
			$data['course_slug'] =  str_replace(' ','-',strtolower(strip_tags($this->input->post('course_slug'))));
            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('course_name', 'course_name', 'trim|required');
			$this->form_validation->set_rules('course_description', 'course_description', 'trim|required');
			$this->form_validation->set_rules('course_duration', 'course_duration', 'trim|required');
			$this->form_validation->set_rules('course_fees', 'course_fees', 'trim|required');
			$this->form_validation->set_rules('course_type', 'course_type', 'trim|required');

            $option_batch_array = array();
		    $option_batch_array = $_REQUEST['batch_time_all'];
			
			
			
            if ($this->form_validation->run() == false) {
                $err_flag=1;
            }

            if ($err_flag==0) {
                    $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['image_src']['name']);
                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = '../uploads/courses_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload())
						 {
                         $error = array('error' => $this->upload->display_errors()); 
                         }
						 else
						 {
                          $final_files_data[] = $this->upload->data();
						  $data['image_src']= $final_files_data[0]['file_name'];
                        }

                            $crs_data = $id;
							
							$this->Courses_model->delete_batches_data($crs_data);
							
								foreach($option_batch_array as $single_val)
								{ 
								  if($single_val!="")
								  {
									$bacth_data['course_id']= $crs_data;
									$bacth_data['batch_time_all ']= $single_val;
									$bacth_data['is_upcoming '] = 'yes';
									$this->Courses_model->add_batches_data($bacth_data);
								  }
									
								}
				
				
				
                $data_inserted = $this->Courses_model->edit_data_image($data,$id);
				
				
				if($data['is_upcoming']=='no')
				{			
				$this->Courses_model->delete_batches_data($id);
				}
				
                $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
                redirect('admin/courses');				

            } else {

				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  
				$this->template->set('title', 'Edit Course | '.$this->config->item('site_name'));
				$data_single = $this->Courses_model->get_data_by_id($id);
				$data['single_data']=$data_single ;
				$data['batch_all_data'] = $this->Courses_model->get_batch_data($id);
				$data['lecturer_list'] = $this->Courses_model->get_lecturer_data();	
				$this->template->set_layout('layout_main', 'front');
				$this->template->build('editcourses',$data);
            }
		}

		

		else{
			
		$data_get= $this->Courses_model->get_data();
		$data['alldata_row']= $data_get;
	    $this->template->set('title', 'Edit Course | '.$this->config->item('site_name'));
		$data_single = $this->Courses_model->get_data_by_id($id);
		$data['single_data']=$data_single ;
        $data['batch_all_data'] = $this->Courses_model->get_batch_data($id);
		$data['lecturer_list'] = $this->Courses_model->get_lecturer_data();	
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editcourses',$data);

		}

    }



public function featuredstatus($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/courses');	
		}
		else
		{
               $data['status'] = '1';
               $data_inserted = $this->Courses_model->edit_data_image($data,$id);
			   $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
               redirect('admin/courses');				
		}
    }

public function inactivestatus($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/courses');	
		}
		else
		{
               $data['status'] = '0';
               $data_inserted = $this->Courses_model->edit_data_image($data,$id);
			   $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
               redirect('admin/courses');				
		}
    }
	
	

/*================================ Delete Data ===========================*/	

	

public function delete_data($dataid,$data_image)

    {

        $this->Courses_model->delete_row_data($dataid);

		$path_file = '../uploads/courses_image/'.base64_decode($data_image);

		unlink($path_file);

		redirect('admin/courses');

        exit;

    }

			

	

	

	

	

	

	

	

	

}

