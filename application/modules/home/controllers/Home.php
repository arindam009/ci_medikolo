<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Home extends MX_Controller

{

    public function __construct()

    {
      parent::__construct();
        
         //$this->load->library('session');
       // $this->load->library('template');
      	$this->load->model('Home_model'); 
        
    }

    //===================================================================

    public function index()

    {
        $data['slider']=$this->Home_model->get_all_slider('tbl_homebanner');
        
        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'home | medikolo'.$site_name);
        $this->template->set_layout('layout_main','front');
        $this->template->build('home',$data);
    }

	
	



	

	

	

}

