<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Doctors extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Doctors_model');
		$this->load->model('crud/Crud_model');
		
    }
//==========================view =========================================
	public function index()
    {
		$data['data_all'] = $this->Crud_model->get_all_data('tbl_doctors');
        $data['dept_all'] = $this->Doctors_model->get_all_department('tbl_department');
		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Doctors | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('view', $data);
	
	}
	
/*================================ Add ===========================*/	
	public function add()
	{
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$data['dept_id']= $this->input->post('dept_id');
            $data['name']= strip_tags($this->input->post('name'));
			$data['email']= $this->input->post('email');
			$data['address']= $this->input->post('address');
			$data['city']= $this->input->post('city');
			$data['pincode']= $this->input->post('pincode');
			$data['website']= $this->input->post('website');
			$data['state']= $this->input->post('state');
			$data['phone']= $this->input->post('phone');
			$data['alt_phone']= $this->input->post('alt_phone');
			$data['status']=$this->input->post('status');
			 
			 $this->form_validation->set_rules('dept_id', 'department', 'required');
			 $this->form_validation->set_rules('name', 'name', 'trim|required');
			 $this->form_validation->set_rules('email', 'email', 'required');
			 $this->form_validation->set_rules('address', 'address', 'required');
			 $this->form_validation->set_rules('city', 'city', 'required');
			 $this->form_validation->set_rules('pincode', 'pincode', 'required');
			 $this->form_validation->set_rules('state', 'state', 'required');
			 $this->form_validation->set_rules('phone', 'phone', 'required');
			        $this->load->library('upload');
                    $number_img = count($_FILES['img']['name']);

                    //  upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['img']['name'];
                        $_FILES['userfile']['type']     = $_FILES['img']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['img']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['img']['error'];
                        $_FILES['userfile']['size']     = $_FILES['img']['size'];
                        $config['upload_path']          = '../uploads/doctors';
                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                       
                        if (!$this->upload->do_upload()) {
                         
                         $this->form_validation->set_rules('img', $this->upload->display_errors() , 'trim|required');
                        
                       
                        } else {
                           
                            $final_files_data_logo[] = $this->upload->data();
                            $data['img']= $final_files_data_logo[0]['file_name'];
						}

                        

			  if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Crud_model->add_data('tbl_doctors',$data);
                  $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
                  redirect('admin/doctors');
                	
				}
		 				 
			
		}
		$data['dept_all'] = $this->Doctors_model->get_all_department('tbl_department');
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Doctors | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('form', $data);
	}
	
/*================================ Edit advertise ===========================*/

	public function edit($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/doctors');	
		}
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

       
	       	$data['dept_id']= $this->input->post('dept_id');
            $data['name']= strip_tags($this->input->post('name'));
			$data['email']= $this->input->post('email');
			$data['address']= $this->input->post('address');
			$data['city']= $this->input->post('city');
			$data['pincode']= $this->input->post('pincode');
			$data['website']= $this->input->post('website');
			$data['state']= $this->input->post('state');
			$data['phone']= $this->input->post('phone');
			$data['alt_phone']= $this->input->post('alt_phone');
			$data['status']=$this->input->post('status');
			 
			 $this->form_validation->set_rules('dept_id', 'department', 'required');
			 $this->form_validation->set_rules('name', 'name', 'trim|required');
			 $this->form_validation->set_rules('email', 'email', 'required');
			 $this->form_validation->set_rules('address', 'address', 'required');
			 $this->form_validation->set_rules('city', 'city', 'required');
			 $this->form_validation->set_rules('pincode', 'pincode', 'required');
			 $this->form_validation->set_rules('state', 'state', 'required');
			 $this->form_validation->set_rules('phone', 'phone', 'required');
            

			       

                       // File Upload 1

			            $this->load->library('upload');
                        $number_logo_img = count($_FILES['img']['name']);

                        $_FILES['userfile']['name']     = $_FILES['img']['name'];
                        $_FILES['userfile']['type']     = $_FILES['img']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['img']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['img']['error'];
                        $_FILES['userfile']['size']     = $_FILES['img']['size'];
                        $config['upload_path']          = '../uploads/doctors';
                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                       
                        if (! $this->upload->do_upload()) {
                    
                         $error = array('error' => $this->upload->display_errors()); 
                      
                        } else {
                           
                            $final_files_data_logo[] = $this->upload->data();
                            $data['img']= $final_files_data_logo[0]['file_name'];
                            @unlink("../uploads/doctors/".$this->input->post('prev_link_logo')."");
						}

                       
			         
            if ($this->form_validation->run() == TRUE) {

                $data_updated = $this->Crud_model->update_data('tbl_doctors',$data,$id);
                $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
                redirect('admin/doctors');	
            }
		}
		
		
        $data_single = $this->Crud_model->get_data_by_id('tbl_doctors',$id);
		$data_single_val['single_row_data']=$data_single ;
        $data_single_val['dept_all'] = $this->Doctors_model->get_all_department('tbl_department');
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit | '.$site_name);
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
        $data_single = $this->Crud_model->get_data_by_id('tbl_doctors',$dataid);
        @unlink("../uploads/doctors/".$data_single[0]->img."");
        //@unlink("../uploads/brand/".$data_single[0]->banner_img."");
        $this->Crud_model->empty_row_data('tbl_doctors',$dataid);
       
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
               $data_inserted = $this->Crud_model->update_data('tbl_doctors',$data,$id);
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
               $data_inserted = $this->Crud_model->update_data('tbl_doctors',$data,$id);
               $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
               redirect($_SERVER['HTTP_REFERER']);             
        }
    }		
    
	
}