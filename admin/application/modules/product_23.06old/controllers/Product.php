<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Product extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 
        $this->load->model('Product_model');	//common function for session checking.
		
        
    }
    //===================================================================
    public function index()
    {
		
       
        
         $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Product | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('product');
    }
    public function add()
    {
       $lastid=$this->Product_model->getLastid("tbl_product");
       $product_code='P'.date('His').str_pad($lastid->lastid, 4, "0", STR_PAD_LEFT);
        $data['product_code']=$product_code;
        $data['all_shipping_class']=$this->Product_model->get_shipping_class();
        $data['all_categories']=$this->Product_model->get_shop_category();
         
        //$data['html']=$this->createTreeView($data['all_categories']);
       if ($this->input->server('REQUEST_METHOD') == 'POST'){
       	print_r($_POST);
       }
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Add Product | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addproduct',$data);
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

	
	
	
	
	
	
	
	
	
	
}
