<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Home extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();

      	$this->load->model('Home_model'); 

    }

    //===================================================================

    public function index()

    {
    	$data['blog_data']= $this->Home_model->get_blog_data();
    	$data['featured_blog_data']= $this->Home_model->get_featured_blog_data();
    	$data['featured_recipe_data']= $this->Home_model->get_featured_recipe_data();
    	$data['latest_recipe_data']= $this->Home_model->get_latest_recipe_data();
    	$data['get_recipe_week_data']= $this->Home_model->get_recipe_of_week();
    	$data['get_recipe_week_month']= $this->Home_model->get_recipe_of_month();
    	$data['recipe_category_data']= $this->Home_model->get_recipe_category_data();
    	$data['new_member_data']= $this->Home_model->get_newest_member_data($slug);
    	
    	$data['pages_data'] = $this->Home_model->get_sng_pages_data();

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

        $this->template->build('home',$data);

    }

	
	function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
     // echo $text;die("here");
      return $text;
    }



	

	

	

}

