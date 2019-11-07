<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Advertise_model extends CI_Model
{
   
  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_advertisement',$data);
	     return $this->db->insert_id();
	    // echo $this->db->last_query();("here");
		}
  }
  
  
  function get_data()
  {
  	 
	 $this->db->select('*');
	 //$this->db->where('status!=', 2);
	 $query = $this->db->get('tbl_advertisement');
	 $result = $query->result();
	 return $result;
	
  }
  
  function get_pages()
  {
  	 
	 $this->db->select('*');
	 $query = $this->db->get('pages_mng');
	 $result = $query->result();
	 return $result;
	
  }
	
	
  public function delete_row_data($id)
  {
  	  $data['status']='2';
	  $this->db->where('id', $id);
	  $this->db->update('tbl_advertisement', $data);
	  
  }	
  
  function get_data_by_id($id)
  {
	 $this->db->select('*');
     
	  $this->db->where('id', $id);
	 $query = $this->db->get('tbl_advertisement');
	 $result = $query->result();
	 return $result;
	
  }
  
  
  function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_advertisement', $data);
            // echo $this->db->last_query();
             //exit;
			return $this->db->affected_rows();
		}
	}
	
function get_join_data()
  {

	  	$this->db->select('tbl_advertisement.*,pages_mng.id as parent_page_id,pages_mng.title');
	 	$this->db->from('tbl_advertisement');
	    $this->db->join('pages_mng', 'pages_mng.id = tbl_advertisement.page_id', 'left');
	    $this->db->where('tbl_advertisement.status!=', '2');
	    $this->db->order_by("orderid", "asc");

	 	$query = $this->db->get();

	 	$result = $query->result();
       //echo $this->db->last_query();
     // die();
      
	    return $result;

  }
  
  
	
}
