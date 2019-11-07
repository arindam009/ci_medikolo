<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Courses_model extends CI_Model
{

  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('courses_mng',$data);
	     return $this->db->insert_id();
		}
  }

  function add_batches_data($data)
   {
	 if(!empty($data))
		{
	     $this->db->insert('batches_mng',$data);
	     return $this->db->insert_id();
		}
   }

 public function delete_batches_data($id)
  {
	  $this->db->where('course_id', $id);
	  $this->db->delete('batches_mng');
  }	 

  function get_batch_data($id)
  {
	 $this->db->select('*');
	 $this->db->where('course_id', $id);
	 $query = $this->db->get('batches_mng');
	 $result = $query->result();
	 return $result;
  }
  
  function get_data()
  {
	 $this->db->select('*');
     $this->db->order_by("orderid","ASC");
	 $query = $this->db->get('courses_mng');
	 $result = $query->result();
	 return $result;
  }

  function get_lecturer_data()
  {
	 $this->db->select('*');
     $this->db->order_by("id","asc");
	 $query = $this->db->get('lecturer_mng');
	 $result = $query->result();
	 return $result;
  }


  function get_data_by_id($id)
  {
	 $this->db->select('*');
	 $this->db->where('id', $id);
	 $query = $this->db->get('courses_mng');
	 $result = $query->result();
	 return $result;
  }

  function edit_data_image($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('courses_mng', $data);
			 return $this->db->affected_rows();
		}

	}
	
  public function delete_row_data($id)
  {
	  $this->db->where('id', $id);
	  $this->db->delete('courses_mng');
  }		

}

