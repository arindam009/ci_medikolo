<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Customers extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Customers_model');
		$this->load->model('crud/Crud_model');
		
    }
//==========================view =========================================
	public function index()
    {
		
		$data['data_all'] = $this->Crud_model->get_all_data('tbl_customer');
        //$data['dept_all'] = $this->Doctors_model->get_all_department('tbl_department');
		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Customers | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('view', $data);
	
	}
	
/*================================ Add ===========================*/	
	public function add()
	{
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			
            $data['name']= strip_tags($this->input->post('full_name'));
			$data['email']= $this->input->post('email');
			$data['password']= md5(strip_tags($this->input->post('password')));
			$data['mobile']= $this->input->post('mobile');
			
			$data['status']=$this->input->post('status');
			 
			 
			 $this->form_validation->set_rules('name', 'name', 'trim|required');
			 $this->form_validation->set_rules('email', 'email', 'trim|required');
			 $this->form_validation->set_rules('password', 'password', 'trim|required');
			 $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
			 $this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
			        

                        

			  if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Crud_model->add_data('tbl_customer',$data);
                  $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
                  redirect('admin/customers');
                	
				}
		 				 
			
		}
		
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Customers | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('form', $data);
	}
	
/*================================ Edit advertise ===========================*/

	public function edit($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/customers');	
		}
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

       
	       	$data['name']= strip_tags($this->input->post('full_name'));
			$data['email']= $this->input->post('email');
			$data['password']= md5(strip_tags($this->input->post('password')));
			$data['mobile']= $this->input->post('mobile');
			
			$data['status']=$this->input->post('status');
			 
			 
			 $this->form_validation->set_rules('name', 'name', 'trim|required');
			 $this->form_validation->set_rules('email', 'email', 'trim|required');
			 $this->form_validation->set_rules('password', 'password', 'trim|required');
			 $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
			 $this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
            

			       

                       
                       
			         
            if ($this->form_validation->run() == TRUE) {

                $data_updated = $this->Crud_model->update_data('tbl_customer',$data,$id);
                $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
                redirect('admin/customers');	
            }
		}
		
		
        $data_single = $this->Crud_model->get_data_by_id('tbl_customer',$id);
		$data_single_val['single_row_data']=$data_single ;
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
        $data_single = $this->Crud_model->get_data_by_id('tbl_customers',$dataid);
        $this->Crud_model->empty_row_data('tbl_customers',$dataid);
       
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
               $data_inserted = $this->Crud_model->update_data('tbl_customers',$data,$id);
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
               $data_inserted = $this->Crud_model->update_data('tbl_customers',$data,$id);
               $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
               redirect($_SERVER['HTTP_REFERER']);             
        }
    }		
    
	
}