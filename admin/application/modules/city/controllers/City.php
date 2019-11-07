<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class City extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('City_model');
    }
    //===================================================================
    public function index()
    {
		
       
        $data_get= $this->City_model->get_data();
		$data['alldata_row']=$data_get;
        $this->template->set('title', 'City');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('city',$data);
    
	
	
	}
	
	
/*================================ Add Data===========================*/	
	
public function addcity()
    {
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	        $data['city_name']= strip_tags($this->input->post('city_name'));
			$data['area_name']= strip_tags($this->input->post('area_name'));
			
			
            
            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('city_name', 'city_name', 'trim|required');
			
			
            if ($this->form_validation->run() == false) {
                $err_flag=1;
            }
            if ($err_flag==0) {
                
                   
                $data_inserted = $this->City_model->add_data($data);
                $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
                redirect('admin/city');				
               
            } else {
				
				
				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  
				redirect('admin/city/addcity');
              
            }
		}
		
		else{
	    $this->template->set('title', 'Add City');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addcity');
		}
    }
	
/*================================ Edit ===========================*/	

public function editcity($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/city');	
		}
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	           $data['city_name']= strip_tags($this->input->post('city_name'));
			$data['area_name']= strip_tags($this->input->post('area_name'));
			
            
            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('city_name', 'city_name', 'trim|required');
			
          
            if ($this->form_validation->run() == false) {
                $err_flag=1;
            }
            if ($err_flag==0) {
                
                  
                $data_inserted = $this->City_model->edit_data_image($data,$id);
                $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
                redirect('admin/city');				
               
            } else {
				
				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  
				$this->template->set('title', 'Edit City');
				$data_single = $this->City_model->get_data_by_id($id);
				$data['single_data']=$data_single ;
				$this->template->set_layout('layout_main', 'front');
				$this->template->build('editcity',$data);
              
            }
		}
		
		else{
	    $this->template->set('title', 'Edit City');
		$data_single = $this->City_model->get_data_by_id($id);
		$data['single_data']=$data_single ;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editcity',$data);
		}
    }
	
/*================================ Delete Data ===========================*/	
	
public function delete_data($dataid)
    {
        $this->City_model->delete_row_data($dataid);
		redirect('admin/city');
        exit;
    }

public function delete_all_data($dataid)
    {
        $this->City_model->delete_all_data($dataid);
		redirect('admin/city');
        exit;
    }			
/*========================= CSV =================================*/	
	public function csvupload()
	{
		 $count=0;
        $fp = fopen($_FILES['csvfile']['tmp_name'],'r') or die("can't open file");
        while($csv_line = fgetcsv($fp,1024))
        {
            $count++;
            if($count == 1)
            {
                continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
                $insert_csv = array();
             //   $insert_csv['id'] = $csv_line[0];//remove if you want to have primary key,
                $insert_csv['city_name'] = $csv_line[0];
                $insert_csv['area_name'] = $csv_line[1];

            }
            $i++;
            $data = array(
                'city_name' => $insert_csv['city_name'],
                'area_name' => $insert_csv['area_name']
               );
			   
			   $data_inserted = $this->City_model->add_data($data);
			   $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
			   $this->template->set_layout('layout_main', 'front');
               $this->template->build('citycsv');  
            
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        return $data;
              
	}
	
	
	
	
	
}
