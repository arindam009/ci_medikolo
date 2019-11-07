<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	
	
	function validate()
	{
		
		//first check if the user exit into our new user_master table 
		//start
		$this->db->where('email', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('status', '1');
		$query = $this->db->get('tbl_customer');
		if($query->num_rows() > 0)
		{	
 			$row = $query->row();
			return $row;
			
		}
		
		
		
	}
	

	

				
}