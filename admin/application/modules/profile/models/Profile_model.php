<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Profile_model extends CI_Model

{

   

  function get_data()
  {

	 $this->db->select('*');
     $this->db->where('user_master_id', 1);
	 $query = $this->db->get('user_master');
	 $result = $query->result();
	 return $result;

  }



  function get_data_by_id($id)
  {
	 $this->db->select('*');
	 $this->db->where('user_master_id', $id);
	 $query = $this->db->get('user_master');
	 $result = $query->result();
	 return $result;

  }

  

  

  function edit_data_image($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('user_master_id',$id);
             $this->db->update('user_master', $data);
			 return $this->db->affected_rows();
		}

	}
	
	
	function update_password($id,$data)
	{
		
		if(!empty($data))
		{
			 $this->db->where('user_master_id',$id);
             $this->db->update('user_master', $data);
			 return $this->db->affected_rows();
		}
	}


  

	

}

