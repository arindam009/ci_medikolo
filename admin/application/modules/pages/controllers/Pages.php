<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Pages extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Pages_model');
    }
    //===================================================================
    public function index()
    {
		
       
        $data_get= $this->Pages_model->get_data();
		$data['alldata_row']=$data_get;
		
		
        $this->template->set('title', 'Pages | '.$this->config->item('site_name'));
      
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('pages',$data);
    
	
	
	}
	
	

/*================================ Edit ===========================*/	

public function editpages($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/pages');	
		}
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	        $data['title']= strip_tags($this->input->post('title'));
			$data['descrip']= $this->input->post('descrip');
			$data['heading_title']= $this->input->post('heading_title');
			
			$data['extra_title']= $this->input->post('extra_title');
			$data['extra_descrip']= $this->input->post('extra_descrip');
			
			$data['meta_title']= strip_tags($this->input->post('meta_title'));
			$data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
			$data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
			
			$data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
			$data['robot_index']= strip_tags($this->input->post('robot_index'));
				$data['robotindex']= strip_tags($this->input->post('robotindex'));
            
            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('heading_title', 'heading_title', 'trim|required');
			
          
            if ($this->form_validation->run() == false) {
                $err_flag=1;
            }
            if ($err_flag==0) {
                
                    $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['image_src']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = '../uploads/pages_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						
						  $data_inserted = $this->Pages_model->edit_data_image($data,$id); 			
				
                        } else {
							
                            $final_files_data[] = $this->upload->data();
							
							$data['image_src']= $final_files_data[0]['file_name'];
                            
                            
                           
                        }
                    
                $data_inserted = $this->Pages_model->edit_data_image($data,$id);
                $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
                redirect('admin/pages');				
               
            } else {
				
				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  
				$this->template->set('title', 'Edit Pages | '.$this->config->item('site_name'));
				
				$data_single = $this->Pages_model->get_data_by_id($id);
				$data['single_data']=$data_single ;
				$this->template->set_layout('layout_main', 'front');
				$this->template->build('editpages',$data);
              
            }
		}
		
		else{
	    $this->template->set('title', 'Edit Pages | '.$this->config->item('site_name'));
		
		$data_single = $this->Pages_model->get_data_by_id($id);
		$data['single_data']=$data_single ;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editpages',$data);
		}
    }
	
/*================================ Delete Data ===========================*/	
	
public function delete_data($dataid,$data_image)
    {
        $this->Pages_model->delete_row_data($dataid);
		$path_file = '../uploads/pages_image/'.base64_decode($data_image);
		unlink($path_file);
		redirect('admin/pages');
        exit;
    }
			
	
	
	
	
	
	
	
	
}
