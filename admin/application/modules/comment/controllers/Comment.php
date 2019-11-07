<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Comment extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Comment_model');
    }
    //===================================================================
    public function index()
    {
        $data_get= $this->Comment_model->get_data();
        //echo $this->db->last_query();die();
		$data['allcomment_row']=$data_get;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Comment | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('comment',$data);
	}
	
	


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
               $data_inserted = $this->Comment_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }


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
               $data_inserted = $this->Comment_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }

    
         
    
}
