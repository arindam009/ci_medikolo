<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Contact extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
       $this->load->model('Contact_model'); 
    }
    //===================================================================
    public function index()
    {
		
        $data['pages_data']= $this->Contact_model->get_pages_data();
		$data['support_data']= $this->Contact_model->get_support_data();
		
		$data['address_data']= $this->Contact_model->get_address_data();
		
		$data['center_data']= $this->Contact_model->get_center_data();
       
       
	   $data['pages_data'] = $this->Contact_model->get_sng_pages_data();
	    $meta_title = $data['pages_data'][0]->meta_title ;
		$meta_keyword = $data['pages_data'][0]->meta_keyword ;
		$meta_descrip  = $data['pages_data'][0]->meta_descrip  ;
	   
       $canonical_tag  = $data['pages_data'][0]->canonical_tag  ;
	   	 $robot_index  = $data['pages_data'][0]->robot_index  ;
		 $robotindex  = $data['pages_data'][0]->robotindex  ;
	   
        $this->template->set('title',$meta_title);
        $this->template->set('MetaKeyword',$meta_keyword );
        $this->template->set('MetaDescription',$meta_descrip );
	    $this->template->set('CanonicalTag',$canonical_tag );
		$this->template->set('RobotIndex',$robot_index );
		$this->template->set('MainIndex',$robotindex );
	   
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('contact',$data);
    }
	

	
	
	
	
	
	
	
	
}
