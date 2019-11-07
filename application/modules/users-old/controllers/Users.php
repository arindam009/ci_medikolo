<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Users extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();

      	$this->load->model('Users_model'); 

    }

    //===================================================================

    public function index()
    {
    	$data['member_single_data']= $this->Users_model->get_single_member_data($slugdata);
    	
    	if( $this->uri->segment(2) )
		{
			 $slugdata = $this->uri->segment(2);
			 echo $slugdata;
			 echo "Single Profile";
		  	
		  	/*$data['member_single_data']= $this->Users_model->get_single_member_data($slugdata);
		  	$data['pages_data'] = $this->Users_model->get_details_sng_pages_data();
					  /*echo "<pre>";
					  print_r($data);die();
					  
					$meta_title = $data['member_single_data'][0]->meta_title. ' | '. $data['pages_data'][0]->meta_title;
					$meta_keyword = $data['member_single_data'][0]->meta_keyword ;
					$meta_descrip  = $data['member_single_data'][0]->meta_descrip  ;
			        $canonical_tag  = $data['member_single_data'][0]->canonical_tag  ;
					$robot_index  = $data['member_single_data'][0]->robot_index  ;
					$robotindex  = $data['member_single_data'][0]->robotindex  ;
				   
			        $this->template->set('title',$meta_title);
			        $this->template->set('MetaKeyword',$meta_keyword );
			        $this->template->set('MetaDescription',$meta_descrip );
				    $this->template->set('CanonicalTag',$canonical_tag );
					$this->template->set('RobotIndex',$robot_index );
					$this->template->set('MainIndex',$robotindex );
		  	
		  
					$this->template->set_layout('layout_main', 'front');
        			$this->template->build('users_single',$data);*/
		
		}
		/*else
		{
			//user listing page
		}*/
	}
	
    	

  
}

