<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Company extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Company_model');
		$this->load->model('crud/Crud_model');
		
    }
//==========================view =========================================
	public function index()
    {
		$data['data_all'] = $this->Crud_model->get_all_data('tbl_company');

		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Comapany | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('view', $data);
	
	}
	
/*================================ Add ===========================*/	
	public function add()
	{
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$data['name']= strip_tags($this->input->post('name'));
            $data['email']= $this->input->post('email');
			$data['alt_email']= $this->input->post('alt_email');
			$data['descrip']= $this->input->post('descrip');
			$data['address']= $this->input->post('address');
			$data['phone']= $this->input->post('phone');
			$data['alt_phone']= $this->input->post('alt_phone');
			$data['status']=$this->input->post('status');
			
			 $this->form_validation->set_rules('name', 'name', 'trim|required');
			 $this->form_validation->set_rules('email','email','trim|required');
			 $this->form_validation->set_rules('address','address','required');
			 $this->form_validation->set_rules('phone','phone','required');
			
			        $this->load->library('upload');
                    $number_logo_img = count($_FILES['logo']['name']);

                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['logo']['name'];
                        $_FILES['userfile']['type']     = $_FILES['logo']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['logo']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['logo']['error'];
                        $_FILES['userfile']['size']     = $_FILES['logo']['size'];
                        $config['upload_path']          = '../uploads/company_details';
                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                       
                        if (!$this->upload->do_upload()) {
                         
                         $this->form_validation->set_rules('logo', $this->upload->display_errors() , 'trim|required');
                        
                       
                        } else {
                           
                            $final_files_data_logo[] = $this->upload->data();
                            $data['logo']= $final_files_data_logo[0]['file_name'];
						}

                        $this->load->library('upload');
                        
						$number_fav_icon = count($_FILES['fav_icon']['name']);

                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['fav_icon']['name'];
                        $_FILES['userfile']['type']     = $_FILES['fav_icon']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['fav_icon']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['fav_icon']['error'];
                        $_FILES['userfile']['size']     = $_FILES['fav_icon']['size'];
                        $config['upload_path']          = '../uploads/company_details';
                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                       
                        if (! $this->upload->do_upload()) {

                          $this->form_validation->set_rules('fav_icon', $this->upload->display_errors() , 'trim|required');						 
                       
                        } else {
                           
                            $final_files_data_icon[] = $this->upload->data();
                            $data['fav_icon']= $final_files_data_icon[0]['file_name'];
                        }

			 
			 if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Crud_model->add_data('tbl_company',$data);
                  $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
                  redirect('admin/company');
                	
				}
		 				 
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add company details| '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('form', $data_class);
	}
	
/*================================ Edit advertise ===========================*/

	public function edit($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/company');	
		}
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

       
	       	$data['name']= strip_tags($this->input->post('name'));
            $data['email']= $this->input->post('email');
			$data['alt_email']= $this->input->post('alt_email');
			$data['descrip']= $this->input->post('descrip');
			$data['address']= $this->input->post('address');
			$data['phone']= $this->input->post('phone');
			$data['alt_phone']= $this->input->post('alt_phone');
			$data['status']=$this->input->post('status');
			
			 $this->form_validation->set_rules('name', 'name', 'trim|required');
			 $this->from_validation->set_rules('email','email','required');
			 $this->from_validation->set_rules('address','address','required');
			 $this->from_validation->set_rules('phone','phone','required');
            

			       

                       // File Upload 1

			            $this->load->library('upload');
                        $number_logo_img = count($_FILES['logo']['name']);

                        $_FILES['userfile']['name']     = $_FILES['logo']['name'];
                        $_FILES['userfile']['type']     = $_FILES['logo']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['logo']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['logo']['error'];
                        $_FILES['userfile']['size']     = $_FILES['logo']['size'];
                        $config['upload_path']          = '../uploads/company_details';
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
                            @unlink("../uploads/company_details/".$this->input->post('prev_link_logo')."");
						}

                       

                      // File Upload 2
						$this->load->library('upload');
                        $number_fav_icon = count($_FILES['fav_icon']['name']);

                        $_FILES['userfile']['name']     = $_FILES['fav_icon']['name'];
                        $_FILES['userfile']['type']     = $_FILES['fav_icon']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['fav_icon']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['fav_icon']['error'];
                        $_FILES['userfile']['size']     = $_FILES['fav_icon']['size'];
                        $config['upload_path']          = '../uploads/company_details';
                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                       
                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 
                       
                        } else {
                           
                            $final_files_data_icon[] = $this->upload->data();
                            $data['fav_icon']= $final_files_data_banner[0]['file_name'];
                            @unlink("../uploads/company_details/".$this->input->post('prev_link_banner')."");
                        }
			         
            if ($this->form_validation->run() == TRUE) {

                $data_updated = $this->Crud_model->update_data('tbl_company',$data,$id);
                $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
                redirect('admin/company');	
            }
		}
		
		
        $data_single = $this->Crud_model->get_data_by_id('tbl_company',$id);
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
        $data_single = $this->Crud_model->get_data_by_id('tbl_company',$dataid);
        @unlink("../uploads/company_details/".$data_single[0]->logo_img."");
        @unlink("../uploads/company_details/".$data_single[0]->banner_img."");
        $this->Crud_model->empty_row_data('tbl_company',$dataid);
       
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
               $data_inserted = $this->Crud_model->update_data('tbl_company',$data,$id);
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
               $data_inserted = $this->Crud_model->update_data('tbl_company',$data,$id);
               $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
               redirect($_SERVER['HTTP_REFERER']);             
        }
    }		
    
	
	
}