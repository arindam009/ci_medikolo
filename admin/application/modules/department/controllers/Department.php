<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Department extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Department_model');
		$this->load->model('crud/Crud_model');
		
    }
//==========================view =========================================
	public function index()
    {
		$data['data_all'] = $this->Crud_model->get_all_data('tbl_department');

		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Department | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('view', $data);
	
	}
	
/*================================ Add ===========================*/	
	public function add()
	{
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$data['title']= strip_tags($this->input->post('title'));
            $data['descrip']= $this->input->post('descrip');
			
			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['title'])));
			$data['status']=$this->input->post('status');
			$data['featured_home']=$this->input->post('featured_home');
			 $this->form_validation->set_rules('title', 'title', 'trim|required');
			 
			        $this->load->library('upload');
                    $number_logo_img = count($_FILES['logo_img']['name']);

                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['logo_img']['name'];
                        $_FILES['userfile']['type']     = $_FILES['logo_img']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['logo_img']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['logo_img']['error'];
                        $_FILES['userfile']['size']     = $_FILES['logo_img']['size'];
                        $config['upload_path']          = '../uploads/department';
                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                       
                        if (!$this->upload->do_upload()) {
                         
                         $this->form_validation->set_rules('logo_img', $this->upload->display_errors() , 'trim|required');
                        
                       
                        } else {
                           
                            $final_files_data_logo[] = $this->upload->data();
                            $data['logo_img']= $final_files_data_logo[0]['file_name'];
						}

                        $this->load->library('upload');
                        $number_banner_img = count($_FILES['banner_img']['name']);

                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['banner_img']['name'];
                        $_FILES['userfile']['type']     = $_FILES['banner_img']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['banner_img']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['banner_img']['error'];
                        $_FILES['userfile']['size']     = $_FILES['banner_img']['size'];
                        $config['upload_path']          = '../uploads/department';
                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                       
                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 
                       
                        } else {
                           
                            $final_files_data_banner[] = $this->upload->data();
                            $data['banner_img']= $final_files_data_banner[0]['file_name'];
                        }

			  if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Crud_model->add_data('tbl_department',$data);
                  $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
                  redirect('admin/department');
                	
				}
		 				 
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Department| '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('form', $data_class);
	}
	
/*================================ Edit advertise ===========================*/

	public function edit($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/department');	
		}
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

       
	       	$data['title']= strip_tags($this->input->post('title'));
            $data['descrip']= $this->input->post('descrip');
			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['title'])));
			$data['status']=$this->input->post('status');
			$data['featured_home']=$this->input->post('featured_home');
			 $this->form_validation->set_rules('title', 'title', 'trim|required');
            

			       

                       // File Upload 1

			            $this->load->library('upload');
                        $number_logo_img = count($_FILES['logo_img']['name']);

                        $_FILES['userfile']['name']     = $_FILES['logo_img']['name'];
                        $_FILES['userfile']['type']     = $_FILES['logo_img']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['logo_img']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['logo_img']['error'];
                        $_FILES['userfile']['size']     = $_FILES['logo_img']['size'];
                        $config['upload_path']          = '../uploads/department';
                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                       
                        if (! $this->upload->do_upload()) {
                    
                         $error = array('error' => $this->upload->display_errors()); 
                      
                        } else {
                           
                            $final_files_data_logo[] = $this->upload->data();
                            $data['logo_img']= $final_files_data_logo[0]['file_name'];
                            @unlink("../uploads/department/".$this->input->post('prev_link_logo')."");
						}

                       

                      // File Upload 2
						$this->load->library('upload');
                        $number_banner_img = count($_FILES['banner_img']['name']);

                        $_FILES['userfile']['name']     = $_FILES['banner_img']['name'];
                        $_FILES['userfile']['type']     = $_FILES['banner_img']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['banner_img']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['banner_img']['error'];
                        $_FILES['userfile']['size']     = $_FILES['banner_img']['size'];
                        $config['upload_path']          = '../uploads/department';
                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                       
                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 
                       
                        } else {
                           
                            $final_files_data_banner[] = $this->upload->data();
                            $data['banner_img']= $final_files_data_banner[0]['file_name'];
                            @unlink("../uploads/department/".$this->input->post('prev_link_banner')."");
                        }
			         
            if ($this->form_validation->run() == TRUE) {

                $data_updated = $this->Crud_model->update_data('tbl_department',$data,$id);
                $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
                redirect('admin/department');	
            }
		}
		
		
        $data_single = $this->Crud_model->get_data_by_id('tbl_department',$id);
		$data_single_val['single_row_data']=$data_single ;

		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Department | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('form',$data_single_val);
    }
	
/*================================ Delete Data ===========================*/
	
	public function delete_data($dataid)
    {
    	if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
        $data_single = $this->Crud_model->get_data_by_id('tbl_department',$dataid);
        @unlink("../uploads/department/".$data_single[0]->logo_img."");
        @unlink("../uploads/department/".$data_single[0]->banner_img."");
        $this->Crud_model->empty_row_data('tbl_department',$dataid);
       
        $this->session->set_flashdata('success_msg', 'Data Deleted Successfully'); 
		redirect($_SERVER['HTTP_REFERER']);   
       }
    }
    
/*===================== Inactive =======================================*/
	public function inactive($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_inserted = $this->Crud_model->update_data('tbl_department',$data,$id);
               $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
               redirect($_SERVER['HTTP_REFERER']);               
        }
    }

/*=====================Active =======================================*/

  public function active($id)
    {
    	
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '1';
               $data_inserted = $this->Crud_model->update_data('tbl_department',$data,$id);
               $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
               redirect($_SERVER['HTTP_REFERER']);             
        }
    }		
   /*=====================Featured =======================================*/ 
	
	public function featured($id)
	{
		if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
		else
        {
               $data['featured_home'] = '1';
               $data_inserted = $this->Crud_model->update_data('tbl_department',$data,$id);
               $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
               redirect($_SERVER['HTTP_REFERER']);             
        }
	}
	
	 /*=====================Disappeared =======================================*/ 
	
	public function disappeared($id)
	{
		 if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['featured_home'] = '0';
               $data_inserted = $this->Crud_model->update_data('tbl_department',$data,$id);
               $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
               redirect($_SERVER['HTTP_REFERER']);               
        }
	}
}