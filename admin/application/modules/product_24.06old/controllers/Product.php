<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Product extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 
        $this->load->model('Product_model');
         $this->load->library('form_validation');	//common function for session checking.
		
        
    }
    //===================================================================
    public function index()
    {
		
       
         $data_get= $this->Product_model->get_data();
         $data['product_all']=$data_get;
          $data['all_categories']=$this->Product_model->get_shop_category();
         $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Product | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('product',$data);
    }
    public function add()
    {
      
     //  $product_code='P'.date('His').str_pad($lastid->lastid, 4, "0", STR_PAD_LEFT);
       //$product_code='P1529020001';
       
        $data_view['all_shipping_class']=$this->Product_model->get_shipping_class();
        $data_view['all_categories']=$this->Product_model->get_shop_category();
        $data_view['all_tax_group']=$this->Product_model->get_tax_group();
        //$data['html']=$this->createTreeView($data['all_categories']);
       if ($this->input->server('REQUEST_METHOD') == 'POST'){     
       
            $this->form_validation->set_rules('product_name', 'product Name', 'trim|required');  
             if ($this->form_validation->run() == TRUE) {
                $data['name']= strip_tags($this->input->post('product_name'));
             $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['name'])));
              $data['slug']=$slug;
               $lastid=$this->Product_model->getLastid("tbl_product");
               $product_code='P'.date('His').str_pad($lastid->lastid, 4, "0", STR_PAD_LEFT);
                $data['pcode']=$product_code;
                 $data['short_description']= $this->input->post('product_short_description');

                 $data['description']=strip_tags($this->input->post('product_short_description'));
                 $data['regular_price']=strip_tags($this->input->post('regular_price'));
                 $data['sale_price']=strip_tags($this->input->post('sale_price'));
                 $data['sku']=strip_tags($this->input->post('sku'));
                 $data['qty']=strip_tags($this->input->post('stock_quantity'));
                 $data['status']=strip_tags($this->input->post('stock_status'));
                 $data['weight']=strip_tags($this->input->post('weight'));
                 $data['length']=strip_tags($this->input->post('length'));
                 $data['width']=strip_tags($this->input->post('width'));
                 $data['height']=strip_tags($this->input->post('height'));
                 $data['shipping_class']=strip_tags($this->input->post('shipping_class'));
                 $data['related_product']=strip_tags($this->input->post('related_product'));
                 $data['purchase_note']=strip_tags($this->input->post('purchase_note'));
                 $data['meta_title']= strip_tags($this->input->post('meta_title'));
            $data['meta_keywords']= strip_tags($this->input->post('meta_keyword'));
            $data['meta_descrip']= strip_tags($this->input->post('meta_descrip'));
            $data['canonical_tag']= strip_tags($this->input->post('canonical_tag'));
            $data['robot_index']= strip_tags($this->input->post('robot_index'));
            $data['follow']= strip_tags($this->input->post('follow')); 
            $data['category']= json_encode($_POST['category']); 
                 $data['product_type']='simple';

                  $this->load->library('upload');
                  if($_FILES['feature_image_src']['name']!='' || $_FILES['feature_image_src']['name']!=null)
                  {
                    $number_of_files_uploaded = count($_FILES['feature_image_src']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['feature_image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['feature_image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['feature_image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['feature_image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['feature_image_src']['size'];
                        $config['upload_path']          = '../uploads/product_image';

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
                      $data_inserted = $this->Product_model->add_data($data);
                     $number_of_files_uploaded = count($_FILES['gallery_image_src']['name']);
                     for($i=0;$i<$number_of_files_uploaded;$i++){
                        $this->load->library('upload');
                $_FILES['userfile']['name']=$_FILES['gallery_image_src']['name'][$i];
                $_FILES['userfile']['type'] = $_FILES['gallery_image_src']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $_FILES['gallery_image_src']['tmp_name'][$i];
                $_FILES['userfile']['error']    = $_FILES['gallery_image_src']['error'][$i];
                $_FILES['userfile']['size']     = $_FILES['gallery_image_src']['size'][$i];
                $config['upload_path']          = '../uploads/product_image';
                $config['allowed_types']        = 'png|jpg|jpeg';
                $config['max_size']             = 100000;
                //$config['encrypt_name'] = TRUE;
                //$config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->upload->initialize($config); 
                if (! $this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors()); 
                } else {
                    $data_image['pcode']=$product_code;
                    $final_files_data[$i] = $this->upload->data();    
                    $data_image['image']= $final_files_data[$i]['file_name'];
                    $data_image_insert = $this->Product_model->gallery_img_insert($data_image);
                }       
                     }
                      $this->session->set_flashdata('success_msg', 'Product added Successfully'); 

                    redirect('admin/product/product');

             }
         }
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Add Product | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addproduct',$data_view);
    }
    public function editproduct($id){
        if($this->uri->segment(3)=="")

        {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

            redirect('admin/recipe/viewrecipe');    

        }

        $data_class['product_all'] = $this->Product_model->get_data_by_productcode($id);
        $data_class['product_gallery'] = $this->Product_model->get_image_by_productcode($id);
         $data_class['all_categories']=$this->Product_model->get_shop_category();
          $data_class['all_shipping_class']=$this->Product_model->get_shipping_class();
        $site_name=$this->config->item('site_name');

        $this->template->set('title', 'Edit Product | '.$site_name);
        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editproduct',$data_class);

    }

	// public function createTreeView($data)
 //     {

 //      $arrayCategories = array();
 //     foreach($data as $row)
 //         { 
 //            $items[] = array('id' => $category->id, 'label' => $category->cat_name, 'parent' => $category->parent_cat);
 //             $arrayCategories[$row->id] = array("parent_id" => $row->parent_id, "name" =>$row->cat_name);   

 //         } 
 //     $html=$this->printChildren($items,0);
 //     return $html;
 //     //print_r($items);die();

 //    }

//     public function printChildren($array, $currentParent, $currLevel = 0, $prevLevel = -1) 
//     {
//         echo "<pre>";
//         print_r($array);
        
    
// foreach ($array as $categoryId => $category) {
//  if ($currentParent == $category['parent']) {
   
//      if ($currLevel > $prevLevel) {
//          $html.="<ul>";
//      }elseif($currLevel == $prevLevel){
// //         $html .=" </li> ";
//    }
// //    die("html");
// //     $html.='<li><span><input type="checkbox" name="test"/>'.$category['label'].'</span>';

// //     if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

// //     $currLevel++; 

// //     createTreeView ($array, $categoryId, $currLevel, $prevLevel);

// //     $currLevel--;
//     }

// }
// if ($currLevel == $prevLevel){
//     $html.=" </li>  </ul> ";
// } 
// return $html;

// }

	
	public function add_attribute()
    {
        extract($_POST);
        if(!isset($_POST['is_visible'])){
            $is_visible='0';
        }
         if(!isset($_POST['is_variation'])){
            $is_variation='0';
        }   
        $data['pcode']=$pcode;
        $data['name']=$att_name;
        $data['values']=$att_value;
        $data['visible']=$is_visible;
        $data['used_variation']=$is_variation;
        $result=$this->Product_model->add_attribute(" tbl_product_attribute",$data);
           // $data['data'] = $result;
           //  echo json_encode($data);
        echo "success";
        die();

    }
    public function get_variation()
    {
        if(isset($_POST['pcode'])){
            $pcode= $_POST['pcode'];    
            $result=$this->Product_model->get_variation("tbl_product_attribute",$pcode);
            print_r($result);
            die();
        }


    }
	
	
	
	
	
	
	
	
}
