<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Profile extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();

        is_logged_in(); 	//common function for session checking.

		

        $this->load->library('form_validation');

		$this->load->model('Profile_model');

    }

    //===================================================================

    public function index()

    {

		

       

        $data_get= $this->Profile_model->get_data();

		$data['alldata_row']=$data_get;

        $this->template->title('Clirnet', 'Clirnet');

        $this->template->set('metaDesc', 'Clirnet');

        $this->template->set('metaKeyword', 'Clirnet');

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('profile',$data);

    

	

	

	}

	


/*================================ Edit ===========================*/	



public function editprofile($id)
    {

		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/profile');	

		}

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

	        $data['email']= strip_tags($this->input->post('email'));
			$data['f_name']= strip_tags($this->input->post('f_name'));
			$data['mobile_primary']= strip_tags($this->input->post('mobile_primary'));
		

            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('email', 'email', 'trim|required');
			$this->form_validation->set_rules('f_name', 'f_name', 'trim|required');
			$this->form_validation->set_rules('mobile_primary', 'mobile_primary', 'trim|required');

          

            if ($this->form_validation->run() == false) {

                $err_flag=1;

            }

            if ($err_flag==0) {

                
              
                $data_inserted = $this->Profile_model->edit_data_image($data,$id);
                $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
                redirect('admin/profile');				

               

            } else {

				

				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  

				$this->template->title('Clirnet', 'Clirnet');

				$this->template->set('metaDesc', 'Clirnet');

				$this->template->set('metaKeyword', 'Clirnet');

				$data_single = $this->Profile_model->get_data_by_id($id);

				$data['single_data']=$data_single ;

				$this->template->set_layout('layout_main', 'front');

				$this->template->build('editprofile',$data);

              

            }

		}

		

		else{

	    $this->template->title('Clirnet', 'Clirnet');

        $this->template->set('metaDesc', 'Clirnet');

        $this->template->set('metaKeyword', 'Clirnet');

		$data_single = $this->Profile_model->get_data_by_id($id);

		$data['single_data']=$data_single ;

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editprofile',$data);

		}

    }
	
	
public function editpassword($id)
    {


		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{
			

	        $old_pass= strip_tags($this->input->post('old_psw'));
			$new_pass= strip_tags($this->input->post('new_psw'));
			$new_pass_conf= strip_tags($this->input->post('new_cnf_psw'));
		

            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('old_psw', 'old_psw', 'trim|required');
			$this->form_validation->set_rules('new_psw', 'new_psw', 'trim|required');
			$this->form_validation->set_rules('new_cnf_psw', 'new_cnf_psw', 'trim|required');
			
          

            if ($this->form_validation->run() == false) {

                $err_flag=1;
                $this->session->set_flashdata('err_msg', 'Fill All the fields.'); 
            }
			$data_single = $this->Profile_model->get_data_by_id($id);
			$data_pss=$data_single[0]->password;
			if($this->form_validation->run() == true && ($data_pss!=md5($this->input->post('old_psw'))))
			{
				$err_flag=1;
                $this->session->set_flashdata('err_msg', 'Please Enter Previous Password Correctly.'); 
			}
			
			if($this->form_validation->run() == true && $new_pass!=$new_pass_conf)
			{
				$err_flag=1;
                $this->session->set_flashdata('err_msg', 'Please Confirm New Password Correctly'); 
			}

            if ($err_flag==0) {

                $data['password']=md5($new_pass);
              $data_single = $this->Profile_model->update_password($id,$data);
               			
                $this->session->set_flashdata('err_msg', '');

				$this->session->set_flashdata('succ_msg', 'Password Edited Successfully.');
 $data_get= $this->Profile_model->get_data();

		$data['alldata_row']=$data_get;

        $this->template->title('Clirnet', 'Clirnet');

        $this->template->set('metaDesc', 'Clirnet');

        $this->template->set('metaKeyword', 'Clirnet');

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('profile',$data);

               

            } else {

				

				

				$this->template->title('Clirnet', 'Clirnet');

				$this->template->set('metaDesc', 'Clirnet');

				$this->template->set('metaKeyword', 'Clirnet');

				//$data_single = $this->Profile_model->get_data_by_id($id);

				$data['single_data']=$data_single ;

				$this->template->set_layout('layout_main', 'front');

				$this->template->build('editpassword',$data);

              

            }

		}

		

		else{

	    $this->template->title('Clirnet', 'Clirnet');

        $this->template->set('metaDesc', 'Clirnet');

        $this->template->set('metaKeyword', 'Clirnet');

		$data_single = $this->Profile_model->get_data_by_id($id);

		$data['single_data']=$data_single ;

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editpassword',$data);

		}

    }	


	

	

	

	

	

	

	

}

