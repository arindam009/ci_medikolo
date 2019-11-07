<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Client extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();

        is_logged_in(); 	//common function for session checking.

		

        $this->load->library('form_validation');

		$this->load->model('Client_model');

    }

    //===================================================================

    public function index()

    {

		

       

        $data_get= $this->Client_model->get_data();

		$data['alldata_row']=$data_get;

        $this->template->title('Clirnet', 'Clirnet');

        $this->template->set('metaDesc', 'Clirnet');

        $this->template->set('metaKeyword', 'Clirnet');

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('client',$data);

    

	

	

	}

	

	

/*================================ Add===========================*/	

	

public function addclient()

    {

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

       

	        $data['title']= strip_tags($this->input->post('title'));

			$data['status']= 0;

            

            $err_flag=0;

            $err_val=0;

            $this->form_validation->set_rules('title', 'title', 'trim|required');

			

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

                        $config['upload_path']          = '../uploads/client_image';



                        $config['allowed_types']        = 'png|jpg|jpeg|gif';

                        $config['max_size']             = 100000;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);





                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 

						

                        } else {

							

                            $final_files_data[] = $this->upload->data();

							

							 $data['image_src']= $final_files_data[0]['file_name'];

                            

                            $data_inserted = $this->Client_model->add_data($data);

                           

                        }

                    



                $this->session->set_flashdata('success_msg', 'Data added Successfully'); 

                redirect('admin/client');				

               

            } else {

				

				

				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  

				redirect('admin/client/addclient');

              

            }

		}

		

		else{

	    $this->template->title('Clirnet', 'Clirnet');

        $this->template->set('metaDesc', 'Clirnet');

        $this->template->set('metaKeyword', 'Clirnet');

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addclient');

		}

    }

	

/*================================ Edit ===========================*/	



public function editclient($id)

    {

		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/client');	

		}

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

       

	        $data['title']= strip_tags($this->input->post('title'));

			

            

            $err_flag=0;

            $err_val=0;

            $this->form_validation->set_rules('title', 'title', 'trim|required');

          

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

                        $config['upload_path']          = '../uploads/client_image';



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

                            

                            

                           

                        }

                    

                $data_inserted = $this->Client_model->edit_data_image($data,$id);

                $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 

                redirect('admin/client');				

               

            } else {

				

				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  

				$this->template->title('Clirnet', 'Clirnet');

				$this->template->set('metaDesc', 'Clirnet');

				$this->template->set('metaKeyword', 'Clirnet');

				$data_single = $this->Client_model->get_data_by_id($id);

				$data['single_data']=$data_single ;

				$this->template->set_layout('layout_main', 'front');

				$this->template->build('editclient',$data);

              

            }

		}

		

		else{

	    $this->template->title('Clirnet', 'Clirnet');

        $this->template->set('metaDesc', 'Clirnet');

        $this->template->set('metaKeyword', 'Clirnet');

		$data_single = $this->Client_model->get_data_by_id($id);

		$data['single_data']=$data_single ;

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editclient',$data);

		}

    }

	

/*================================ Delete Data ===========================*/	

	

public function delete_data($dataid,$data_image)

    {

        $this->Client_model->delete_row_data($dataid);

		$path_file = '../uploads/client_image/'.base64_decode($data_image);

		unlink($path_file);

		redirect('admin/client');

        exit;

    }

			

	

	

	

	

	

	

	

	

}

