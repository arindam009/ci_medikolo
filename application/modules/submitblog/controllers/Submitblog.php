<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Submitblog extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
       $this->load->model('Submitblog_model'); 
    }
    //===================================================================
    public function index()
    {
    	
    	$data_class['all_category'] = $this->Submitblog_model->category_allvalue();
		
       
        $data_class['pages_data'] = $this->Submitblog_model->get_sng_pages_data();
        
		
	    $meta_title = $data_class['pages_data'][0]->meta_title ;
		$meta_keyword = $data_class['pages_data'][0]->meta_keyword ;
		$meta_descrip  = $data_class['pages_data'][0]->meta_descrip  ;
	   
        $canonical_tag  = $data_class['pages_data'][0]->canonical_tag  ;
		 $robot_index  = $data_class['pages_data'][0]->robot_index  ;
	   
	    $robotindex  = $data_class['pages_data'][0]->robotindex  ;
	   
        $this->template->set('title',$meta_title);
        $this->template->set('MetaKeyword',$meta_keyword );
        $this->template->set('MetaDescription',$meta_descrip );
	    $this->template->set('CanonicalTag',$canonical_tag );
		
		$this->template->set('RobotIndex',$robot_index );
		$this->template->set('MainIndex',$robotindex );
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{ 		
            
            $this->form_validation->set_rules('blog_name', 'Blog Name', 'trim|required');
            $this->form_validation->set_rules('blog_description', 'Blog Description', 'required');
                        
            $data['blog_name']= strip_tags($this->input->post('blog_name'));
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['blog_name'])));
            $data['slug']=$slug;
            $data['orderid']='0';
            $data['blog_category']= strip_tags($this->input->post('blog_category'));
            $data['blog_description']= $this->input->post('blog_description');
            $data['is_feature_blog']= 0;
            $data['blog_type']= normal;
            $data['status']= 0;
            $data['user_code']=$this->session->user_code;
            $data['blog_code']='BLOG'.date('ymdHis');
            if($this->session->user_type==1){
                $data['is_approved']=1;
            }else{
                 $data['is_approved']=0;
            }
             $data['post_on']=date('Y-m-d H:i:s');
             $data['approve_on']=date('Y-m-d H:i:s');
              $data['meta_title']= $data['blog_name'];
            //$data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
            $data['meta_descrip']= $data['blog_description'];
            //$data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
            //$data['robot_index']= strip_tags($this->input->post('robot_index'));
            //$data['follow']= strip_tags($this->input->post('follow'));
               
            
             $this->load->library('upload');
                  if($_FILES['feature_image']['name']!='' || $_FILES['feature_image']['name']!=null)
                  {
                    $number_of_files_uploaded = count($_FILES['feature_image']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['feature_image']['name'];
                        $_FILES['userfile']['type']     = $_FILES['feature_image']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['feature_image']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['feature_image']['error'];
                        $_FILES['userfile']['size']     = $_FILES['feature_image']['size'];
                        $config['upload_path']          = './uploads/blog_image';

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
                    
            
                    /*echo "<pre>";print_r($error);
                    print_r($data);die("here");*/
                    if ($this->form_validation->run() == TRUE) 
             		{  
                     $data_inserted = $this->Submitblog_model->add_data($data);
                     $this->session->set_flashdata('success_msg', 'Your blog has been successfully submited.'); 
                    	//redirect($_SERVER['HTTP_REFERER']);
             		}
		}
		
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('submitblog',$data_class);
    }
    //===================================================================
    public function edit()
    {
    	if( $this->uri->segment(3) )
		{ 
				$slugdata = $this->uri->segment(3);
				//print_r($slugdata);die("here");
		}
    	$data_single = $this->Submitblog_model->get_data_by_slug($slugdata);
    	$data_class['single_data']=$data_single ;
    	//echo "<pre>"; print_r($data_single);die("here");
		$data_class['all_category'] = $this->Submitblog_model->category_allvalue();
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	           $data['blog_name']= strip_tags($this->input->post('blog_name'));
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['blog_name'])));
            $data['slug']=$slug;
            
            $data['blog_category']= strip_tags($this->input->post('blog_category'));
            $data['blog_description']= $this->input->post('blog_description');

            $data['meta_title']= $data['blog_name'];
            $data['meta_descrip']= $data['blog_description'];
			
			/*echo "<pre>";
            print_r($data);
            die("here");*/
            
             $this->form_validation->set_rules('blog_name', 'Blog Name', 'trim|required');
             $this->form_validation->set_rules('blog_description', 'Blog Description', 'trim|required');
             
			
          
            if ($this->form_validation->run() == true) {
                 $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['image_src']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = './uploads/blog_image';

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
                            
                            @unlink("./uploads/blog_image/".$this->input->post('prev_link'));
                           
                        }
                         $data_inserted = $this->Submitblog_model->edit_data($data,$slugdata);
                $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
                //redirect('admin/blog');         
            }
        }
		
    	$this->template->set_layout('layout_main', 'front');
        $this->template->build('submiteditblog',$data_class);
	}
	
	
	 
	
	
	
	
	
	
	
}
