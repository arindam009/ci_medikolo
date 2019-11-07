<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Shipping extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Shippingzone_model');
		$this->load->model('Shippingclass_model');
		$this->load->model('Shippingmethod_model');
    }
    //===================================================================
    //===================================================================

    public function viewshippingzone()

    {
    	$data_get= $this->Shippingzone_model->join();
    	/*echo $this->db->last_query();
    	die("here");*/
    	
    	//$data_get= $this->Shippingzone_model->get_data();
    	
		$data['shippingzone']=$data_get;

        $this->template->set('title','Shipping Zone  | '.$this->config->item('site_name'));

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewshippingzone',$data);
	}
	

	
/*================================ Add Shippingzone===========================*/
	public function addshippingzone()
	{
		$data_class['all_shipping_class'] = $this->Shippingzone_model->class_allvalue();
		
		$data_class['all_method_class'] = $this->Shippingzone_model->class_allvaluemethod();
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$data['class_id']= strip_tags($this->input->post('class_id'));
			$data['zone_name']= strip_tags($this->input->post('zone_name'));
			$data['zone_region']= strip_tags($this->input->post('zone_region'));
			$data['pincode']= strip_tags($this->input->post('pincode'));
			$data['shipping_method']= strip_tags($this->input->post('shipping_method'));
			$data['status']= strip_tags($this->input->post('status'));
			
			 $this->form_validation->set_rules('class_id', 'Class Id', 'trim|required');
			 $this->form_validation->set_rules('zone_name', 'Zone Name', 'trim|required');
			 $this->form_validation->set_rules('zone_region', 'Zone Region', 'trim|required');
			 $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
			 $this->form_validation->set_rules('shipping_method', 'Shipping Method', 'trim|required');
			 $this->form_validation->set_rules('status', 'Status', 'trim|required');
			 
			  if ($this->form_validation->run() == TRUE) {
			  	
			  	  $data_inserted = $this->Shippingzone_model->add_data($data);
			  	  $this->session->set_flashdata('success_msg', 'Shipping Zone added Successfully'); 
                	redirect('admin/shipping/viewshippingzone');
			  }
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Shipping Zone | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addshippingzone',$data_class);
	}


/*================================ Edit Shipping Zone===========================*/
	public function editshippingzone($id)
	{
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/shipping/viewshippingzone');	
		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	        $data['class_id']= strip_tags($this->input->post('class_id'));
			$data['zone_name']= strip_tags($this->input->post('zone_name'));
			$data['zone_region']= strip_tags($this->input->post('zone_region'));
			$data['pincode']= strip_tags($this->input->post('pincode'));
			$data['shipping_method']= strip_tags($this->input->post('shipping_method'));
			$data['status']= strip_tags($this->input->post('status'));
			//print_r($data);die();
			
			 $this->form_validation->set_rules('class_id', 'Class Id', 'trim|required');
			 $this->form_validation->set_rules('zone_name', 'Zone Name', 'trim|required');
			 $this->form_validation->set_rules('zone_region', 'Zone Region', 'trim|required');
			 $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
			 $this->form_validation->set_rules('shipping_method', 'Shipping Method', 'trim|required');
			 $this->form_validation->set_rules('is_active', 'Status', 'trim|required');
         
            if ($this->form_validation->run() == TRUE) {
            	
                  $data_inserted = $this->Shippingzone_model->edit_data($data,$id);
                 // echo $this->db->last_query();
			 //die("here");
                $this->session->set_flashdata('success_msg', 'Shipping zone  edited Successfully'); 
               redirect('admin/shipping/viewshippingzone');	
            }
		}
		
		
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Shipping zone | '.$site_name);
		$data_single = $this->Shippingzone_model->get_data_by_id($id);
		$data['all_shipping_class'] = $this->Shippingzone_model->class_allvalue();
		$data['all_method_class'] = $this->Shippingzone_model->class_allvaluemethod();
		$data['shippingzone']=$data_single ;
		//print_r($data_single);die();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editshippingzone',$data);
    }
   
/*================================ Delete Shipping zone===========================*/	
	
	public function delete_shippingzone($dataid)
    {
        $this->Shippingzone_model->delete_row_data($dataid);
		redirect('admin/shipping/viewshippingzone');
        exit;
    }
    
    
    //===================================================================
    //===================================================================

    public function viewshippingclass()

    {
    	$data_get= $this->Shippingclass_model->get_data();
    	
		$data['shippingclass']=$data_get;

        $this->template->set('title','Shipping Class  | '.$this->config->item('site_name'));

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewshippingclass',$data);
	}
	

	
/*================================ Add Shipping class===========================*/
	public function addshippingclass()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//print_r($_POST);die();
			$data['class_name']= strip_tags($this->input->post('class_name'));
			$class_name=strip_tags($this->input->post('class_name'));
			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $class_name)));
			$data['description']= strip_tags($this->input->post('description'));
			$data['status']= strip_tags($this->input->post('status'));
			
			 $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
			 $this->form_validation->set_rules('description', 'Description', 'trim|required');
			 
			  if ($this->form_validation->run() == TRUE) {
			  	
			  	  $data_inserted = $this->Shippingclass_model->add_data($data);
			  	  $this->session->set_flashdata('success_msg', 'Shipping Class added Successfully'); 
                	redirect('admin/shipping/viewshippingclass');
			  }
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Shipping Class | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addshippingclass');
	}


/*================================ Edit Shipping class===========================*/
	public function editshippingclass($id)
	{
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/shipping/viewshippingclass');	
		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	        $data['class_name']= strip_tags($this->input->post('class_name'));
			$class_name=strip_tags($this->input->post('class_name'));
			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $class_name)));
			$data['description']= strip_tags($this->input->post('description'));
			$data['status']= strip_tags($this->input->post('status'));
			
			 $this->form_validation->set_rules('class_name', 'Class Name', 'trim|required');
			 $this->form_validation->set_rules('description', 'Description', 'trim|required');
         
            if ($this->form_validation->run() == TRUE) {
            	
                  $data_inserted = $this->Shippingclass_model->edit_data($data,$id);
                $this->session->set_flashdata('success_msg', 'Shipping Class  edited Successfully'); 
               redirect('admin/shipping/viewshippingclass');	
            }
		}
		
		
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Shipping Class | '.$site_name);
		$data_single = $this->Shippingclass_model->get_data_by_id($id);
		$data['shippingclass']=$data_single ;
		//print_r($data_single);die();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editshippingclass',$data);
    }
   
/*================================ Delete shipping class===========================	*/
	
	public function delete_shippingclass($dataid)
    {
        $this->Shippingclass_model->delete_row_data($dataid);
		redirect('admin/shipping/viewshippingclass');
        exit;
    }

//===================================================================

    public function viewshippingmethod()

    {
    	$data_get= $this->Shippingmethod_model->joining();
    	/*echo $this->db->last_query();
    	die("here");*/
    	//$data_get= $this->Shippingmethod_model->get_data();
    	
		$data['shippingmethod']=$data_get;

        $this->template->set('title','Shipping Method  | '.$this->config->item('site_name'));

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewshippingmethod',$data);
	}
	

	
/*================================ Add Shipping Method===========================*/
	public function addshippingmethod()
	{
		$data_class['all_shipping_class'] = $this->Shippingmethod_model->class_allvalue();
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$data['shipping_class_id']= strip_tags($this->input->post('shipping_class_id'));
			$data['method_title']= strip_tags($this->input->post('method_title'));
			$data['shipping_charge']= strip_tags($this->input->post('shipping_charge'));
			$data['shipping_cost']= strip_tags($this->input->post('shipping_cost'));
			$data['calculation_type']= strip_tags($this->input->post('calculation_type'));
			$data['free_shipping_enabled']= strip_tags($this->input->post('free_shipping_enabled'));
			$data['minimum_order_amount']= strip_tags($this->input->post('minimum_order_amount'));
			
			 $this->form_validation->set_rules('shipping_class_id', 'Shipping Class', 'trim|required');
			 $this->form_validation->set_rules('method_title', 'Method Title', 'trim|required');
			 $this->form_validation->set_rules('shipping_charge', 'Shipping Charge', 'trim|required');
			 $this->form_validation->set_rules('shipping_cost', 'Shipping Cost', 'trim|required');
			 $this->form_validation->set_rules('calculation_type', 'Calculation Type', 'trim|required');
			 $this->form_validation->set_rules('free_shipping_enabled', 'Free Shipping Enabled', 'trim|required');
			 $this->form_validation->set_rules('minimum_order_amount', 'Minimum Order Amount', 'trim|required');
			 
			  if ($this->form_validation->run() == TRUE) {
			  	
			  	  $data_inserted = $this->Shippingmethod_model->add_data($data);
			  	  $this->session->set_flashdata('success_msg', 'Shipping Method added Successfully'); 
                	redirect('admin/shipping/viewshippingmethod');
			  }
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Shipping Method | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addshippingmethod',$data_class);
	}
	
	
	
	/*================================ Edit Shipping Method===========================*/
	public function editshippingmethod($id)
	{
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/shipping/viewshippingmethod');	
		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	        $data['shipping_class_id']= strip_tags($this->input->post('shipping_class_id'));
			$data['method_title']= strip_tags($this->input->post('method_title'));
			$data['shipping_charge']= strip_tags($this->input->post('shipping_charge'));
			$data['shipping_cost']= strip_tags($this->input->post('shipping_cost'));
			$data['calculation_type']= strip_tags($this->input->post('calculation_type'));
			$data['free_shipping_enabled']= strip_tags($this->input->post('free_shipping_enabled'));
			$data['minimum_order_amount']= strip_tags($this->input->post('minimum_order_amount'));
			
			 $this->form_validation->set_rules('shipping_class_id', 'Shipping Class', 'trim|required');
			 $this->form_validation->set_rules('method_title', 'Method Title', 'trim|required');
			 $this->form_validation->set_rules('shipping_charge', 'Shipping Charge', 'trim|required');
			 $this->form_validation->set_rules('shipping_cost', 'Shipping Cost', 'trim|required');
			 $this->form_validation->set_rules('calculation_type', 'Calculation Type', 'trim|required');
			 $this->form_validation->set_rules('free_shipping_enabled', 'Free Shipping Enabled', 'trim|required');
			 $this->form_validation->set_rules('minimum_order_amount', 'Minimum Order Amount', 'trim|required');
         
            if ($this->form_validation->run() == TRUE) {
            	
                  $data_inserted = $this->Shippingmethod_model->edit_data($data,$id);
                $this->session->set_flashdata('success_msg', 'Shipping Method  edited Successfully'); 
               redirect('admin/shipping/viewshippingmethod');	
            }
		}
		
		
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Shipping Method | '.$site_name);
		$data_single = $this->Shippingmethod_model->get_data_by_id($id);
		$data['all_shipping_class'] = $this->Shippingmethod_model->class_allvalue();
		$data['shippingmethod']=$data_single ;
		//print_r($data_single);die();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editshippingmethod',$data);
    }
   
/*================================ Delete shipping Method===========================*/	
	public function delete_shippingmethod($dataid)
    {
        $this->Shippingmethod_model->delete_row_data($dataid);
		redirect('admin/shipping/viewshippingmethod');
        exit;
    }
	
	
	
	
	
	
	
	
}
