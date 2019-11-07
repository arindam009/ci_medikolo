<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Order extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
	
		$this->load->model('Order_model');
    }
    //===================================================================
    public function index()
    {
			
	
	}
	
	

/*================================ Approve  ===========================*/	

	
public function data_submit($orderid,$ordrval,$table)
    {

	   $id = strip_tags($this->input->post('orderid'));
	   $table = strip_tags($this->input->post('table'));
	   $ordrval = strip_tags($this->input->post('ordrval'));
	   $data['orderid']= $ordrval ;
	   $this->Order_model->update_data($data,$id,$table);
       		
    }	
	

	
	
	
	
	
}
