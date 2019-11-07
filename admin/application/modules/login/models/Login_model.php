<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	
	
	function validate()
	{
		
		//first check if the user exit into our new user_master table 
		//start
		$this->db->where('email', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('status','1');
		$query = $this->db->get('tbl_users');
		$row = $query->row();
		
		//exit;
		
		if($query->num_rows() > 0)
		{
		//user_detail
			//exit;
			
			$data = array(
			'user_code'			=> $row->user_code,	
			'user_type'			=> $row->user_type,	
			'email' 			=> $row->email,			
			'mobile' 			=> $row->mobile,
			'user_name'     	=> $row->email,
			'full_name'     	=> $row->full_name,
			'profile_url'     	=> $row->profile_url,
			'is_logged_in' 		=> true,
			);
			$this->session->set_userdata($data);
			
 
			return TRUE;
			
		}
		
		
		
	}
	

	

				
}