<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Userregistration extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();
         $this->load->library('form_validation');

      	$this->load->model('Registration_model'); 

    }

    //===================================================================

    public function index()

    {
             if ($this->input->server('REQUEST_METHOD') == 'POST')
            {
                //$data['user_type']='2';
                $data['full_name']= strip_tags($this->input->post('full_name'));
                $data['email']= $this->input->post('email');
                $data['password']= md5(strip_tags($this->input->post('password')));
                $data['mobile']= $this->input->post('mobile');
                
               
                $this->form_validation->set_rules('full_name', 'Name', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('mobile', 'mobile', 'trim|required');

                
                if ($this->form_validation->run() == TRUE) {

                    $data_inserted = $this->Registration_model->add_data('tbl_customer',$data);
                    $this->session->set_flashdata('success_msg', 'Registration Successfully'); 
                    redirect('userregistration');
                      
                  }

                                    

                   
                    
                }

         $this->template->set_layout('layout_main', 'front');

           $this->template->build('registration',$data);

    }

	





	

	

	

}

