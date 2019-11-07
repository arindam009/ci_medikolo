<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Quantityrules extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Quantityrules_model');
		$this->load->model('crud/Crud_model');
		
    }
//==========================view =========================================
	public function index()
    {
		$data['data_all'] = $this->Crud_model->get_all_data('tbl_quantity_rules');

		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Quantityrules | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('view', $data);
	
	}
	
/*================================ Add Advertise===========================*/	
	public function add()
	{
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$data['title']= strip_tags($this->input->post('title'));
            $data['min_value']= $this->input->post('min_value');
            $data['max_value']= $this->input->post('max_value');
            $data['stock_min_value']= $this->input->post('stock_min_value');
            $data['stock_max_value']= $this->input->post('stock_max_value');
            $data['step_value']= $this->input->post('step_value');
			
			
			
			 $this->form_validation->set_rules('title', 'title', 'trim|required');
             $this->form_validation->set_rules('min_value', 'minimum value', 'trim|required');
             $this->form_validation->set_rules('max_value', 'maximum value', 'trim|required');
             $this->form_validation->set_rules('stock_min_value', 'stock minimum value', 'trim|required');
             $this->form_validation->set_rules('stock_max_value', 'stock maximum value', 'trim|required');
             $this->form_validation->set_rules('step_value', 'step value', 'trim|required');
			 
			     

			  if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Crud_model->add_data('tbl_quantity_rules',$data);
                  $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
                  redirect('admin/quantityrules');
                	
				}
		 				 
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('form', $data_class);
	}
	
/*================================ Edit advertise ===========================*/

	public function edit($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/Quantityrules');	
		}
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{

       
	        $data['title']= strip_tags($this->input->post('title'));
            $data['min_value']= $this->input->post('min_value');
            $data['max_value']= $this->input->post('max_value');
            $data['stock_min_value']= $this->input->post('stock_min_value');
            $data['stock_max_value']= $this->input->post('stock_max_value');
            $data['step_value']= $this->input->post('step_value');
            
            
            
             $this->form_validation->set_rules('title', 'title', 'trim|required');
             $this->form_validation->set_rules('min_value', 'minimum value', 'trim|required');
             $this->form_validation->set_rules('max_value', 'maximum value', 'trim|required');
             $this->form_validation->set_rules('stock_min_value', 'stock minimum value', 'trim|required');
             $this->form_validation->set_rules('stock_max_value', 'stock maximum value', 'trim|required');
             $this->form_validation->set_rules('step_value', 'step value', 'trim|required');
			
			 $this->form_validation->set_rules('title', 'title', 'trim|required');
            

			          
            if ($this->form_validation->run() == TRUE) {

                $data_updated = $this->Crud_model->update_data('tbl_quantity_rules',$data,$id);
                $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
                redirect('admin/quantityrules');	
            }
		}
		
		
        $data_single = $this->Crud_model->get_data_by_id('tbl_quantity_rules',$id);
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
        
        $this->Crud_model->empty_row_data('tbl_quantity_rules',$dataid);
       
        $this->session->set_flashdata('success_msg', 'Data Deleted Successfully'); 
		redirect($_SERVER['HTTP_REFERER']);   
       }
    }
    
/*===================== Inactive Data =======================================*/
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
               $data_inserted = $this->Crud_model->update_data('tbl_quantity_rules',$data,$id);
               $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
               redirect($_SERVER['HTTP_REFERER']);               
        }
    }

/*=====================Active Data=======================================*/

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
               $data_inserted = $this->Crud_model->update_data('tbl_quantity_rules',$data,$id);
               $this->session->set_flashdata('success_msg', 'Data updated Successfully'); 
               redirect($_SERVER['HTTP_REFERER']);             
        }
    }		
    
	
}