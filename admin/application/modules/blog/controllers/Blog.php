<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Blog extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Blog_model');
    }
    //===================================================================
    public function index()
    {
        $data_get= $this->Blog_model->get_data();
       // echo $this->db->last_query();die();
		$data['alldata_row']=$data_get;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Blog | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('blog',$data);
	}
	
	
/*================================ Add Data===========================*/	
	
public function add()
{ 
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
            $this->form_validation->set_rules('blog_name', 'Blog Name', 'trim|required');
            $this->form_validation->set_rules('blog_description', 'Blog Description', 'required');
            $this->form_validation->set_rules('blog_type', 'Blog Type', 'trim|required');

             if ($this->form_validation->run() == TRUE) {
             
               $data['blog_name']= strip_tags($this->input->post('blog_name'));
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['blog_name'])));
            $data['slug']=$slug;
            $data['orderid']='0';
            $data['blog_category']= strip_tags($this->input->post('blog_category'));
            $data['blog_description']= $this->input->post('blog_description');
            $data['is_feature_blog']= strip_tags($this->input->post('is_feature_blog'));
            $data['blog_type']= strip_tags($this->input->post('blog_type'));
            $data['status']= strip_tags($this->input->post('status'));
            $data['user_code']=$this->session->user_code;
            $data['blog_code']='BLOG'.date('ymdHis');
            if($this->session->user_type==1){
                $data['is_approved']=1;
            }else{
                 $data['is_approved']=0;
            }
             $data['post_on']=date('Y-m-d H:i:s');
             $data['approve_on']=date('Y-m-d H:i:s');
              $data['meta_title']= strip_tags($this->input->post('meta_title'));
            $data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
            $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
            $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
            $data['robot_index']= strip_tags($this->input->post('robot_index'));
            $data['follow']= strip_tags($this->input->post('follow'));   
             $this->load->library('upload');
                  if($_FILES['image_src']['name']!='' || $_FILES['image_src']['name']!=null)
                  {
                    $number_of_files_uploaded = count($_FILES['image_src']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = '../uploads/blog_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['feature_image']= $final_files_data[0]['file_name'];
                            
                           
                        }
                    }else{
                        $data['feature_image']= 'No_Image_Available.jpg';
                    }
                    //print_r($data);
                     $data_inserted = $this->Blog_model->add_data($data);
                     $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
                         redirect('admin/blog'); 
                    
             }
		}
		
		$data['category']= $this->Blog_model->get_blog_category();
      $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Add Blog | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addblog',$data);
}
	
/*================================ Edit ===========================*/	

public function edit($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/city');	
		}
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	           $data['blog_name']= strip_tags($this->input->post('blog_name'));
            $slug = strip_tags($this->input->post('slug'));
            $data['slug']=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug)));
            $data['orderid']= strip_tags($this->input->post('order'));
            $data['blog_category']= strip_tags($this->input->post('blog_category'));
            $data['blog_description']= $this->input->post('blog_description');
            $data['is_feature_blog']= strip_tags($this->input->post('is_feature_blog'));
            $data['blog_type']= strip_tags($this->input->post('blog_type'));
            $data['status']= strip_tags($this->input->post('status'));
            $data['meta_title']= strip_tags($this->input->post('meta_title'));
            $data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
            $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
            $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
            $data['robot_index']= strip_tags($this->input->post('robot_index'));
            $data['follow']= strip_tags($this->input->post('follow'));
			
            
            $err_flag=0;
            $err_val=0;
             $this->form_validation->set_rules('blog_name', 'Blog Name', 'trim|required');
             $this->form_validation->set_rules('order', 'Short Order', 'trim|required');
             $this->form_validation->set_rules('blog_description', 'Blog Description', 'trim|required');
             $this->form_validation->set_rules('blog_type', 'Blog Type', 'trim|required');
			
          
            if ($this->form_validation->run() == true) {
                 $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['image_src']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = '../uploads/blog_image';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        //print_r($error); die();
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                            
                             $data['feature_image']= $final_files_data[0]['file_name'];
                            
                            @unlink("../uploads/blog_image/".$this->input->post('prev_link'));
                           
                        }
                         $data_inserted = $this->Blog_model->edit_data($data,$id);
                $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
                redirect('admin/blog');         
            }
        }
		
		else{
             $data['category']= $this->Blog_model->get_blog_category();
	       $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Edit Blog | '.$site_name);
		$data_single = $this->Blog_model->get_data_by_id($id);
		$data['single_data']=$data_single ;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editblog',$data);
		}
    }
	
/*================================ Delete Data ===========================*/	
	
public function delete_data($dataid)
    {
        $this->Blog_model->delete_row_data($dataid);
		redirect('admin/blog');
        exit;
    }

public function delete_all_data($dataid)
    {
        $this->City_model->delete_all_data($dataid);
		redirect('admin/city');
        exit;
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
               $data_inserted = $this->Blog_model->edit_data($data,$id);
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
               $data_inserted = $this->Blog_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }		

    public function reject($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_approved'] = '0';
               $data_inserted = $this->Blog_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

    
    public function approve($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_approved'] = '1';
               $data_inserted = $this->Blog_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }       
    public function featured($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_feature_blog'] = '1';
               $data_inserted = $this->Blog_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

    
    public function normal($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_feature_blog'] = '0';
               $data_inserted = $this->Blog_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }
    
    public function week($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['blog_type'] = 'articale of the week';
               $data_inserted = $this->Blog_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    } 
    
    public function month($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['blog_type'] = 'articale of the month';
               $data_inserted = $this->Blog_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }       


	
	
	
	
	
}
