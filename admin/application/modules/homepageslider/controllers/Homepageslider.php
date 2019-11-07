<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Homepageslider extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Homepageslider_model');
    }
    //===================================================================
    public function index()
    {
		
      
        $data_get= $this->Homepageslider_model->get_slider_image();
		$data['slider']=$data_get;
		
		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Home Slider | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('homepageslider',$data);
    
	
	
	}
	
	
/*================================ Add===========================*/	
	
public function addslider()
    {
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	        $data['image_caption']= strip_tags($this->input->post('image_caption'));
			$data['image_caption2']= strip_tags($this->input->post('image_caption2'));
			$data['image_caption3']= strip_tags($this->input->post('image_caption3'));
			$data['link_bttn_name']= strip_tags($this->input->post('link_bttn_name'));
			$data['link_bttn_link']= strip_tags($this->input->post('link_bttn_link'));
			
            
            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('image_caption', 'image_caption', 'trim|required');
			 $this->form_validation->set_rules('image_caption2', 'image_caption2', 'trim|required');
			 //$this->form_validation->set_rules('image_caption3', 'image_caption3', 'trim|required');
          
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
                        $config['upload_path']          = '../uploads/slider_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						
                        } else {
							
                            $final_files_data[] = $this->upload->data();
							
							 $data['image_src']= $final_files_data[0]['file_name'];
                            
                            $data_inserted = $this->Homepageslider_model->add_slider_image($data);
                           
                        }
                    

                $this->session->set_flashdata('success_msg', 'Slider added Successfully'); 
                redirect('admin/homepageslider');				
               
            } else {
				
				
				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  
				redirect('admin/homepageslider/addslider');
              
            }
		}
		
		else{
	     $this->template->set('title', 'Add Home Slider | Inetwork Experts');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addslider');
		}
    }
	
/*================================ Edit ===========================*/	

public function editslider($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/homepageslider');	
		}
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	        $data['image_caption']= strip_tags($this->input->post('image_caption'));
			$data['image_caption2']= strip_tags($this->input->post('image_caption2'));
			$data['image_caption3']= strip_tags($this->input->post('image_caption3'));
			$data['link_bttn_name']= strip_tags($this->input->post('link_bttn_name'));
			$data['link_bttn_link']= strip_tags($this->input->post('link_bttn_link'));
            
            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('image_caption', 'image_caption', 'trim|required');
			 $this->form_validation->set_rules('image_caption2', 'image_caption2', 'trim|required');
			 $this->form_validation->set_rules('image_caption3', 'image_caption3', 'trim|required');
          
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
                        $config['upload_path']          = '../uploads/slider_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						
                        } else {
							
                            $final_files_data[] = $this->upload->data();
							
							 $data['image_src']= $final_files_data[0]['file_name'];
                            
                            unlink("../uploads/slider_image/".$this->input->post('prev_link')."");
                           
                        }
                    
                $data_inserted = $this->Homepageslider_model->edit_slider_image($data,$id);
                $this->session->set_flashdata('success_msg', 'Slider edited Successfully'); 
                redirect('admin/homepageslider');				
               
            } else {
				
				
				$this->session->set_flashdata('err_msg', 'Fill All The Fields');
				  
		$site_name=$this->config->item('site_name');
		$this->template->set('title', 'Edit Home Slider | '.$site_name);
		$data_single = $this->Homepageslider_model->get_slider_by_id($id);
		$data['slider']=$data_single ;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editslider',$data);
              
            }
		}
		
		else{
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Home Slider | '.$site_name);
		$data_single = $this->Homepageslider_model->get_slider_by_id($id);
		$data['slider']=$data_single ;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editslider',$data);
		}
    }
	
/*================================ Delete ===========================*/	
	
public function delete_data($dataid,$data_image)
    {
        $this->Homepageslider_model->delete_row_data($dataid);
		$path_file = '../uploads/slider_image/'.base64_decode($data_image);
		unlink($path_file);
		redirect('admin/homepageslider');
        exit;
    }
			
	
	
	
	
	
	
	
	
}
