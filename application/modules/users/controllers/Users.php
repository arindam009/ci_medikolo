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
    	if( $this->uri->segment(2) )
		{
			 $slugdata = $this->uri->segment(2);
		  	
		  	$data['member_single_data']= $this->Users_model->get_single_member_data($slugdata);
		  	$data['blog_total_data']= $this->Users_model->get_total_blog_data($slugdata);
		  	$data['blog_data']= $this->Users_model->get_blog_data($slugdata);
		  	$data['recipe_total_data']= $this->Users_model->get_total_recipe_data($slugdata);
		  	$data['recipe_data']= $this->Users_model->get_recipe_data($slugdata);
		  	$data['comment_count']= $this->Users_model->count_comments($data['recipe_total_data'][0]->recipe_code);
		  	//print_r($data['recipe_total_data']);exit;
		  	
		  	$data['pages_data'] = $this->Users_model->get_details_sng_pages_data();
		  	
					/*  echo "<pre>";
					  print_r($data);die();*/
					  
					$meta_title = $data['member_single_data']->full_name. ' | '. $data['pages_data'][0]->meta_title;
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
        			$this->template->build('users_single',$data);
		
		}
		/*else
		{
			//user listing page
		}*/
	}
	
	
	public function edit()
    {
    	$this->template->set_layout('layout_main', 'front');
        $this->template->build('edituser');
	}
	
    	

  
}

