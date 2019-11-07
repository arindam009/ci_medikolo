<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Login extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $CI = & get_instance();
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('login_model');
    }
    ################################################################################
    ################################################################################
    public function index()
    {
        is_logged_in_profile(); //common function for session checking.
        //$this->form_validation->set_message('required', 'Please fill this field');
        $this->form_validation->set_error_delimiters("<span class='error_text'>", "</span>");
        $this->form_validation->set_message('alpha_space', 'Some strange character present in user name');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        if ($this->form_validation->run() == false) {
            
            $this->template->title('Clirnet', 'Clirnet');
            $this->template->set('metaDesc', 'Clirnet');
            $this->template->set('metaKeyword', 'Clirnet');
            $this->template->set_layout('layout_login', 'front');
            $this->template->build('login', $data);
        } else {
            
            if ($query = $this->login_model->validate()) {
                //write my json code here
                //$output[''] =
                redirect('admin/home');
            } else {
                
                $this->session->set_flashdata('error_login', "<span class='login_error_text_final'>The username or password you have entered is incorrect. Please try using another email id or click on 'Forgot Password' to reset the password for this email id.</span>");
                redirect('admin/login');
            }
        }
    }
    
    ################################################################################
    //logout all server session for tesing
    ################################################################################
    public function logout()
    {
       
        $this->session->sess_destroy();
        //$this->index();
        redirect('admin/login');
    }
    ################################################################################
    //logout all server session for tesing
    ################################################################################
   
    
    
    
    
    
    
}
