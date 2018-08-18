<?php
class admin_model extends CI_Model
{

	public function __construct()
  {
          $this->load->database();
  }

	public function example()
	{
		$sql = "select * from games";

		return $this->db->query($sql)->result_array();
	}

	public function dataadmin()
	{
		$sql = "select * from user_admin";

		return $this->db->query($sql)->result_array();
	}

	public function dataadmin_byID($id)
	{
		$sql = "select * from user_admin where adminID = '$id'";

		return $this->db->query($sql)->result_array();
	}

	public function adminForm_Insert($data)
	{
		$this->db->insert('user_admin', $data);
	}

	public function adminForm_Update($data,$id)
	{
		$this->db->where('adminID', $id);
		$this->db->update('user_admin', $data);
	}

	public function adminForm_Delete($id)
	{
		$this->db->where('adminID', $id);
		$this->db->delete('user_admin');
	}


}
