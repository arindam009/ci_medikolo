<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Advertise extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Advertise_model');
		
    }
//==========================view Advertise=========================================
	public function viewadvertise()
    {
		$data_get= $this->Advertise_model->get_join_data();
		
		//$data_get= $this->Advertise_model->get_data();
		$data['advertise']=$data_get;
		/*echo "<pre>";
		print_r($data); die();*/
		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Advertise | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('viewadvertise',$data);
    
	
	
	}
	
/*================================ Add Advertise===========================*/	
	public function addadvertise()
	{
		$data_class['get_all_pages']=$this->Advertise_model->get_pages();
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//print_r($_POST);die();
			$data['page_id']= strip_tags($this->input->post('page_id'));
			$data['placement']= strip_tags($this->input->post('placement'));
			$data['ad_code']= $this->input->post('ad_code');
			$data['script']= $this->input->post('script');		
			$data['is_third_party']= strip_tags($this->input->post('is_third_party'));
			$data['orderid']= strip_tags($this->input->post('orderid'));
			
			 $this->form_validation->set_rules('page_id', 'Page Id', 'trim|required');
			 $this->form_validation->set_rules('placement', 'Placement', 'trim|required');
			 $this->form_validation->set_rules('is_third_party', 'Third Party', 'trim|required');
			 
			 $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['images']['name']);



                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['images']['name'];

                        $_FILES['userfile']['type']     = $_FILES['images']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['images']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['images']['error'];

                        $_FILES['userfile']['size']     = $_FILES['images']['size'];

                        $config['upload_path']          = '../uploads/advertise_image';
                        $config['allowed_types']        = 'png|jpg|jpeg';

                        $config['max_size']             = 100000;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                        
                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 

                        

                        } else {

                            

                            $final_files_data[] = $this->upload->data();

                            

                             $data['images']= $final_files_data[0]['file_name'];
						}

			  if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Advertise_model->add_data($data);
                  $this->session->set_flashdata('success_msg', 'Advertise added Successfully'); 
                	redirect('admin/advertise/viewadvertise');
                	
				}
			  	
			 
			 
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Advertise | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addadvertise', $data_class);
	}
	
/*================================ Edit advertise ===========================*/

	public function editadvertise($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/advertise/viewadvertise');	
		}
		$data_class['get_all_pages']=$this->Advertise_model->get_pages();
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	       	$data['page_id']= strip_tags($this->input->post('page_id'));
			$data['placement']= strip_tags($this->input->post('placement'));
			$data['ad_code']= strip_tags($this->input->post('ad_code'));
			$data['script']= strip_tags($this->input->post('script'));		
			$data['is_third_party']= strip_tags($this->input->post('is_third_party'));
			$data['orderid']= strip_tags($this->input->post('orderid'));
			
			 $this->form_validation->set_rules('page_id', 'Page Id', 'trim|required');
			 $this->form_validation->set_rules('placement', 'Placement', 'trim|required');
			 $this->form_validation->set_rules('is_third_party', 'Third Party', 'trim|required');
			 
			 $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['images']['name']);



                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['images']['name'];

                        $_FILES['userfile']['type']     = $_FILES['images']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['images']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['images']['error'];

                        $_FILES['userfile']['size']     = $_FILES['images']['size'];

                        $config['upload_path']          = '../uploads/advertise_image';
                        $config['allowed_types']        = 'png|jpg|jpeg';

                        $config['max_size']             = 100000;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);
                        
                        if (! $this->upload->do_upload()) 
                        {
                         $error = array('error' => $this->upload->display_errors()); 
                        } 
                        else
                        {
                            $final_files_data[] = $this->upload->data();
                            
                            $data['images']= $final_files_data[0]['file_name'];
                            @unlink("../uploads/advertise_image/".$this->input->post('prev_link')."");
						}
          
            if ($this->form_validation->run() == TRUE) {
                  $data_inserted = $this->Advertise_model->edit_data($data,$id);
                $this->session->set_flashdata('success_msg', 'Advertise edited Successfully'); 
                redirect('admin/advertise/viewadvertise');	
            }
		}
		
		
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Advertise | '.$site_name);
		$data_single = $this->Advertise_model->get_data_by_id($id);
		$data_class['advertise']=$data_single ;
		//print_r($data_single);die();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editadvertise',$data_class);
    }
	
/*================================ Delete advertise===========================*/
	
	public function delete_advertise($dataid)
    {
        $this->Advertise_model->delete_row_data($dataid);
		redirect($_SERVER['HTTP_REFERER']);   
      
    }
    
/*===================== Inactive=======================================*/
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
               $data_inserted = $this->Advertise_model->edit_data($data,$id);
               //echo $this->db->last_query();die("heremnjjm");
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

/*=====================Active =======================================*/

  public function active($id)
    {
    	//die($id);
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '1';
               $data_inserted = $this->Advertise_model->edit_data($data,$id);
               //echo $this->db->last_query();die("here");
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }		
    
}