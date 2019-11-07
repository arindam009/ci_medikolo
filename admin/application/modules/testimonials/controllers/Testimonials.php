<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Testimonials extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Testimonials_model');
		$this->load->model('crud/Crud_model');
		
    }
//==========================view =========================================
	public function index()
    {
		$data['data_all'] = $this->Crud_model->get_all_data('tbl_testimonials');

		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Testimonials | '.$site_name);
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
			$data['status']=$this->input->post('status');
			
			 $this->form_validation->set_rules('title', 'title', 'trim|required');
			 
			        

			  if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Crud_model->add_data('tbl_testimonials',$data);
                  $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
                  redirect('admin/testimonials');
                	
				}
		 				 
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Testimonials| '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('form', $data_class);
	}
	
/*================================ Edit advertise ===========================*/

	public function edit($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/testimonials');	
		}
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

       
	       	$data['title']= strip_tags($this->input->post('title'));
            $data['descrip']= $this->input->post('descrip');
			$data['status']=$this->input->post('status');
			
			 $this->form_validation->set_rules('title', 'title', 'trim|required');
            
       if ($this->form_validation->run() == TRUE) {

                $data_updated = $this->Crud_model->update_data('tbl_department',$data,$id);
                $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
                redirect('admin/department');	
            }
		}
		
		
        $data_single = $this->Crud_model->get_data_by_id('tbl_testimonials',$id);
		$data_single_val['single_row_data']=$data_single ;

		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Testimonials | '.$site_name);
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
        $data_single = $this->Crud_model->get_data_by_id('tbl_testimonials',$dataid);
        
        $this->Crud_model->empty_row_data('tbl_testimonials',$dataid);
       
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
               $data_inserted = $this->Crud_model->update_data('tbl_testimonials',$data,$id);
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
               $data_inserted = $this->Crud_model->update_data('tbl_testimonials',$data,$id);
               $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
               redirect($_SERVER['HTTP_REFERER']);             
        }
    }		
   
}