<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Customer extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Customer_model');
    }
    //===================================================================
    public function index()
    {
        $data_get= $this->Customer_model->get_data();
        //echo $this->db->last_query();die();
		$data['allcustomer_row']=$data_get;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Customer | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('customer',$data);
	}
	
	
/*================================ Edit ===========================*/	

/*public function edit($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/user');	
		}
		/*if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//print_r($_POST);exit;
       
	           $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

             if ($this->form_validation->run() == TRUE) 
             {
             	$data['full_name']= strip_tags($this->input->post('full_name'));
	            $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['full_name'])));
	            $data['profile_url']=$profile_url;
	            $data['email']= strip_tags($this->input->post('email'));
	            $data['mobile']= $this->input->post('mobile');
	            
	            $data['profile_bio']= $this->input->post('profile_bio');
	            $data['is_feature_profile']= strip_tags($this->input->post('is_feature_profile'));
	            $data['status']= $this->input->post('status');           
            
            
            
	              //$data['created_on']=date('Y-m-d H:i:s');
	            $data['updated_on']=date('Y-m-d H:i:s');
	            
	            $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['profile_photo']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['profile_photo']['name'];
                        $_FILES['userfile']['type']     = $_FILES['profile_photo']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['profile_photo']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['profile_photo']['error'];
                        $_FILES['userfile']['size']     = $_FILES['profile_photo']['size'];
                        $config['upload_path']          = '../uploads/users/profile_photo';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        //print_r($error); die();
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['profile_photo']= $final_files_data[0]['file_name'];
                            
                            @unlink("../uploads/users/profile_photo/".$this->input->post('prev_link'));
                           
                        }
                        $data_inserted = $this->User_model->edit_data($data,$id);
		                $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
		                redirect('admin/user'); 
          
                   
            }
        }
	    $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Edit User | '.$site_name);
		$data_single = $this->User_model->get_data_by_id($id);
		$data['single_data']=$data_single ;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('edituser');
    }*/
	
/*================================ Delete Data ===========================*/	
	
/*public function delete_data($dataid)
    {
        $this->User_model->delete_row_data($dataid);
		redirect('admin/user');
        exit;
    }*/
	
	


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
               $data_inserted = $this->Customer_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }


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
               $data_inserted = $this->Customer_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }
    public function featured($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_feature_profile'] = '1';
               $data_inserted = $this->Customer_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

    
    public function normal($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_feature_profile'] = '0';
               $data_inserted = $this->Customer_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }

    
         
    
}
