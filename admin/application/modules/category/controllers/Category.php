<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Category extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();

        is_logged_in(); 	//common function for session checking.

		

        $this->load->library('form_validation');

		$this->load->model('Category_model');

    }

    //===================================================================

    public function index()
    {


	}
     public function recipe()
    {
        $data_get= $this->Category_model->get_data_by_type('Recipe');

        $data['category']=$data_get;
        $data['type']='recipe';

        $site_name=$this->config->item('site_name');

        $this->template->set('title', 'Category | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('recipecategory',$data); 

    }
     public function blog()
    {       


        $data_get= $this->Category_model->get_data_by_type('Blog');

        $data['category']=$data_get; 
        $data['type']='blog';    


        $site_name=$this->config->item('site_name');

        $this->template->set('title', 'Category | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('blogcategory',$data);

    }
    public function shop()
    {       


        $data_get= $this->Category_model->get_data_by_type('Shop');

        $data['category']=$data_get;  
         $data['type']='shop';       

        $site_name=$this->config->item('site_name');

        $this->template->set('title', 'Category | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('shopcategory',$data);

    }

	

	

/*================================ Add===========================*/	

	

public function addrecipecategory()
    {

       if ($this->input->server('REQUEST_METHOD') == 'POST')

        {
           // print_r($_POST);die();
             $this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');

             $this->form_validation->set_rules('is_parent', 'Is Parent', 'trim|required');

             $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if ($this->form_validation->run() == TRUE) {

            $data['cat_name']= strip_tags($this->input->post('cat_name'));
            $catname=strip_tags($this->input->post('cat_name'));
            $data['slug']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $catname));
            $data['is_parent']= strip_tags($this->input->post('is_parent'));
            $data['cat_type']= strip_tags($this->input->post('cat_type'));
            $data['parent_cat']= strip_tags($this->input->post('parent_cat'));
            $data['orderid']= 0;
            $data['status']= strip_tags($this->input->post('status'));
            $data['description']= $this->input->post('description');
            $data['cat_icon']= $this->input->post('cat_icon');
            $data['cat_type']='Recipe';
            $data['created_on']=date('Y-m-d');
            $data['created_by']='admin';
            $data['meta_title']= strip_tags($this->input->post('meta_title'));
            $data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
            $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
            $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
            $data['robot_index']= strip_tags($this->input->post('robot_index'));
            $data['follow']= strip_tags($this->input->post('follow'));   
            //print_r($data);die();

            $this->load->library('upload');

                    if($_FILES['image_src']['name']!='' || $_FILES['image_src']['name']!=null){
                        $number_of_files_uploaded = count($_FILES['image_src']['name']);



                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];

                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];

                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];

                        $config['upload_path']          = '../uploads/category_image';
                        $config['allowed_types']        = 'png|jpg|jpeg';

                        $config['max_size']             = 100000;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);





                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 

                        

                        } else {

                            

                            $final_files_data[] = $this->upload->data();

                            

                             $data['cat_img']= $final_files_data[0]['file_name'];

                            

                            
                            }
                        }else{
                             $data['cat_img']= 'No_Image_Available.jpg';
                        }
                    
                            $data_inserted = $this->Category_model->add_data($data);
                            if($data_inserted){
                             $this->session->set_flashdata('success_msg', 'Category added Successfully'); 
                              redirect('admin/category/recipe'); 

            }

            } 
       
    }
        $data['category']=$this->Category_model->get_data_by_type('Recipe');
         $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Add Category | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addrecipecategory',$data);
}
//blog category//
public function addblogcategory()
    {

       if ($this->input->server('REQUEST_METHOD') == 'POST')

        {
           // print_r($_POST);die();
             $this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');

             $this->form_validation->set_rules('is_parent', 'Is Parent', 'trim|required');

             $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if ($this->form_validation->run() == TRUE) {

            $data['cat_name']= strip_tags($this->input->post('cat_name'));
            $catname=strip_tags($this->input->post('cat_name'));
            $data['slug']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $catname));
            $data['is_parent']= strip_tags($this->input->post('is_parent'));
            $data['cat_type']= strip_tags($this->input->post('cat_type'));
            $data['parent_cat']= strip_tags($this->input->post('parent_cat'));
            $data['orderid']= '0';
            $data['status']= strip_tags($this->input->post('status'));
            $data['description']= $this->input->post('description');
            $data['cat_icon']= $this->input->post('cat_icon');
            $data['cat_type']='Blog';
            $data['created_on']=date('Y-m-d');
            $data['created_by']='admin';
            $data['meta_title']= strip_tags($this->input->post('meta_title'));
            $data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
            $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
            $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
            $data['robot_index']= strip_tags($this->input->post('robot_index'));
            $data['follow']= strip_tags($this->input->post('follow'));   
            //print_r($data);die();

            $this->load->library('upload');
                    if($_FILES['image_src']['name']!='' || $_FILES['image_src']['name']!=null){
                        $number_of_files_uploaded = count($_FILES['image_src']['name']);



                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];

                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];

                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];

                        $config['upload_path']          = '../uploads/category_image';
                        $config['allowed_types']        = 'png|jpg|jpeg';

                        //$config['max_size']             = 100000;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);





                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 

                        

                        } else {

                            

                            $final_files_data[] = $this->upload->data();

                            

                             $data['cat_img']= $final_files_data[0]['file_name'];

                            

                           
                            }

                    }else{
                         $data['cat_img']= 'No_Image_Available.jpg';
                    }

                    
                             $data_inserted = $this->Category_model->add_data($data);
                            if($data_inserted){
                             $this->session->set_flashdata('success_msg', 'Category added Successfully'); 
                              redirect('admin/category/blog'); 

            }

            } 
       
    }
        $data['category']=$this->Category_model->get_data_by_type('Blog');
         $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Add Category | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addblogcategory',$data);
}


public function addshopcategory()
    {

       if ($this->input->server('REQUEST_METHOD') == 'POST')

        {
           // print_r($_POST);die();
             $this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');

             $this->form_validation->set_rules('is_parent', 'Is Parent', 'trim|required');

             $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if ($this->form_validation->run() == TRUE) {

            $data['cat_name']= strip_tags($this->input->post('cat_name'));
            $catname=strip_tags($this->input->post('cat_name'));
            $data['slug']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $catname));
            $data['is_parent']= strip_tags($this->input->post('is_parent'));
            $data['cat_type']= strip_tags($this->input->post('cat_type'));
            $data['parent_cat']= strip_tags($this->input->post('parent_cat'));
            $data['orderid']= strip_tags($this->input->post('order'));
            $data['status']= strip_tags($this->input->post('status'));
            $data['description']= $this->input->post('description');
            $data['cat_icon']= $this->input->post('cat_icon');
            $data['cat_type']='Shop';
            $data['created_on']=date('Y-m-d');
            $data['created_by']='admin';
            $data['meta_title']= strip_tags($this->input->post('meta_title'));
            $data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
            $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
            $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
            $data['robot_index']= strip_tags($this->input->post('robot_index'));
            $data['follow']= strip_tags($this->input->post('follow'));   
            //print_r($data);die();

            $this->load->library('upload');
             if($_FILES['image_src']['name']!='' || $_FILES['image_src']['name']!=null){

                 $number_of_files_uploaded = count($_FILES['image_src']['name']);




                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];

                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];

                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];

                        $config['upload_path']          = '../uploads/category_image';
                        $config['allowed_types']        = 'png|jpg|jpeg';

                       // $config['max_size']             = 100000;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);





                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 
                         //print_r($error);

                        

                        } else {

                            

                            $final_files_data[] = $this->upload->data();

                            

                             $data['cat_img']= $final_files_data[0]['file_name'];

                            

                           
                            }
             }else{
                 $data['cat_img']= 'No_Image_Available.jpg';
             }

                   
                             $data_inserted = $this->Category_model->add_data($data);
                            if($data_inserted){
                             $this->session->set_flashdata('success_msg', 'Category added Successfully'); 
                              redirect('admin/category/shop'); 

            }

            } 
       
    }
        $data['category']=$this->Category_model->get_data_by_type('Shop');
         $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Add Category | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addshopcategory',$data);
}


	

/*================================ Edit ===========================*/	



public function editrecipe($id)
    {
       // die("here");

		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/category/recipe');	

		}
        if ($this->input->server('REQUEST_METHOD') == 'POST')

        {

       

             $data['cat_name']= strip_tags($this->input->post('cat_name'));
            $catname=strip_tags($this->input->post('slug'));
            $data['slug']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $catname));
            $data['is_parent']= strip_tags($this->input->post('is_parent'));
            $data['parent_cat']= strip_tags($this->input->post('parent_cat'));
             $data['cat_icon']= $this->input->post('cat_icon');

            $data['orderid']= strip_tags($this->input->post('order'));

            $data['status']= strip_tags($this->input->post('status'));
            $data['description']= $this->input->post('description');
             $data['meta_title']= strip_tags($this->input->post('meta_title'));
            $data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
            $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
            $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
            $data['robot_index']= strip_tags($this->input->post('robot_index'));
            $data['follow']= strip_tags($this->input->post('follow'));
           

            $this->form_validation->set_rules('cat_name', 'cat_name', 'trim|required');

             $this->form_validation->set_rules('slug', 'slug', 'trim|required');

          

            if ($this->form_validation->run() == true) {

               
                    $this->load->library('upload');

                    $number_of_files_uploaded = count($_FILES['image_src']['name']);
                   // echo $number_of_files_uploaded;die();



                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];

                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];

                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];

                        $config['upload_path']          = '../uploads/category_image';



                        $config['allowed_types']        = 'png|jpg|jpeg';

                        $config['max_size']             = 100000;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);





                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 

                        

                        } else {

                            

                            $final_files_data[] = $this->upload->data();

                            

                             $data['cat_img']= $final_files_data[0]['file_name'];

                            

                            unlink("../uploads/category_images/".$this->input->post('prev_link')."");

                           

                        }

                    

                $data_inserted = $this->Category_model->edit_data($data,$id);

                $this->session->set_flashdata('success_msg', 'Slider edited Successfully'); 

                redirect('admin/category/recipe');  

            }

        }



        $site_name=$this->config->item('site_name');

        $this->template->set('title', 'Edit Category | '.$site_name);
        $data['allcategory']=$this->Category_model->get_data_by_type('Recipe');

        $data_single = $this->Category_model->get_data_by_id($id);

        $data['category']=$data_single ;

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editrecipecategory',$data);

    }

    public function editblog($id)
    {
      // die("here");

        if($this->uri->segment(3)=="")

        {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

            redirect('admin/category/blog');  

        }
        if ($this->input->server('REQUEST_METHOD') == 'POST')

        {
             $data['cat_name']= strip_tags($this->input->post('cat_name'));
            $catname=strip_tags($this->input->post('slug'));
            $data['slug']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $catname));
            $data['is_parent']= strip_tags($this->input->post('is_parent'));

            $data['parent_cat']= strip_tags($this->input->post('parent_cat'));

            $data['orderid']= strip_tags($this->input->post('order'));

            $data['status']= strip_tags($this->input->post('status'));
             $data['cat_icon']= $this->input->post('cat_icon');
            $data['description']= $this->input->post('description');
             $data['meta_title']= strip_tags($this->input->post('meta_title'));
            $data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
            $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
            $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
            $data['robot_index']= strip_tags($this->input->post('robot_index'));
            $data['follow']= strip_tags($this->input->post('follow'));
           

            $this->form_validation->set_rules('cat_name', 'cat_name', 'trim|required');

             $this->form_validation->set_rules('slug', 'slug', 'trim|required');

          

            if ($this->form_validation->run() == true) {

               
                    $this->load->library('upload');

                    $number_of_files_uploaded = count($_FILES['image_src']['name']);
                   // echo $number_of_files_uploaded;die();



                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];

                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];

                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];

                        $config['upload_path']          = '../uploads/category_image';



                        $config['allowed_types']        = 'png|jpg|jpeg';

                       // $config['max_size']             = 100000;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);





                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 

                        

                        } else {

                            

                            $final_files_data[] = $this->upload->data();

                            

                             $data['cat_img']= $final_files_data[0]['file_name'];

                            

                            unlink("../uploads/category_image/".$this->input->post('prev_link')."");

                           

                        }

                    

                $data_inserted = $this->Category_model->edit_data($data,$id);

                $this->session->set_flashdata('success_msg', 'Slider edited Successfully'); 

                redirect('admin/category/blog');  

            }

        }



        $site_name=$this->config->item('site_name');

        $this->template->set('title', 'Edit Category | '.$site_name);
         $data['allcategory']=$this->Category_model->get_data_by_type('Blog');

        $data_single = $this->Category_model->get_data_by_id($id);

        $data['category']=$data_single ;

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editblogcategory',$data);

    }



    public function editshop($id)
    {
      // die("here");

        if($this->uri->segment(3)=="")

        {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

            redirect('admin/category/shop');  

        }
        if ($this->input->server('REQUEST_METHOD') == 'POST')

        {

       

             $data['cat_name']= strip_tags($this->input->post('cat_name'));
            $catname=strip_tags($this->input->post('slug'));
            $data['slug']= strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $catname));
            $data['is_parent']= strip_tags($this->input->post('is_parent'));

            $data['parent_cat']= strip_tags($this->input->post('parent_cat'));
             $data['cat_icon']= $this->input->post('cat_icon');

            $data['orderid']= strip_tags($this->input->post('order'));

            $data['status']= strip_tags($this->input->post('status'));
            $data['description']= $this->input->post('description');
             $data['meta_title']= strip_tags($this->input->post('meta_title'));
            $data['meta_keyword']= strip_tags($this->input->post('meta_keyword'));
            $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
            $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
            $data['robot_index']= strip_tags($this->input->post('robot_index'));
            $data['follow']= strip_tags($this->input->post('follow'));
           

            $this->form_validation->set_rules('cat_name', 'cat_name', 'trim|required');

             $this->form_validation->set_rules('slug', 'slug', 'trim|required');


          

            if ($this->form_validation->run() == true) {

               
                    $this->load->library('upload');

                    $number_of_files_uploaded = count($_FILES['image_src']['name']);
                   // echo $number_of_files_uploaded;die();



                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];

                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];

                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];

                        $config['upload_path']          = '../uploads/category_image';



                        $config['allowed_types']        = 'png|jpg|jpeg';

                        //$config['max_size']             = 100000;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);





                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 

                        

                        } else {

                            

                            $final_files_data[] = $this->upload->data();

                            

                             $data['cat_img']= $final_files_data[0]['file_name'];

                            

                            unlink("../uploads/category_image/".$this->input->post('prev_link')."");

                           

                        }

                    

                $data_inserted = $this->Category_model->edit_data($data,$id);

                $this->session->set_flashdata('success_msg', 'Slider edited Successfully'); 

                redirect('admin/category/shop');  

            }

        }



        $site_name=$this->config->item('site_name');

        $this->template->set('title', 'Edit Category | '.$site_name);
        $data['allcategory']=$this->Category_model->get_data_by_type('Shop');

        $data_single = $this->Category_model->get_data_by_id($id);

        $data['category']=$data_single ;

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editshopcategory',$data);

    }


	

/*================================ Delete ===========================*/	

	

public function delete_recipe($dataid,$data_image)
    {
        //die($dataid);

        $this->Category_model->delete_row_data($dataid);

		//$path_file = '../uploads/category_icon/'.base64_decode($data_image);

		//unlink($path_file);

		redirect('admin/category/recipe');

        exit;

    }
    public function delete_blog($dataid,$data_image)
    {
        //die($dataid);

        $this->Category_model->delete_row_data($dataid);

        //$path_file = '../uploads/category_icon/'.base64_decode($data_image);

        //unlink($path_file);

        redirect('admin/category/blog');

        exit;

    }
    public function delete_shop($dataid,$data_image)
    {
        //die($dataid);

        $this->Category_model->delete_row_data($dataid);

        //$path_file = '../uploads/category_icon/'.base64_decode($data_image);

        //unlink($path_file);

        redirect('admin/category/shop');

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
               $data_inserted = $this->Category_model->edit_data($data,$id);
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
               $data_inserted = $this->Category_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }

			

	

	

	

	

	

	

	

	

}

