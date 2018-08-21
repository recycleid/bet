<?php
class agent_model extends CI_Model
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

	public function datauser_byAgentID($id)
	{
		$sql = "select * from user where agentID='$id'";

		return $this->db->query($sql)->result_array();
	}

	public function datauser_byID($id)
	{
		$sql = "select * from user where userID = '$id'";

		return $this->db->query($sql)->result_array();
	}

	public function userForm_Insert($data)
	{
		$this->db->insert('user', $data);
	}

	public function userForm_Update($data,$id)
	{
		$this->db->where('userID', $id);
		$this->db->update('user', $data);
	}

	public function userForm_Delete($id)
	{
		$this->db->where('userID', $id);
		$this->db->delete('user');
	}

	public function subscriprate()
	{
		$sql = "select * from subscrib_rate order by days";

		return $this->db->query($sql)->result_array();
	}

	public function subscripData()
	{
		$sql = "select * from subscription order by createDate Desc";

		return $this->db->query($sql)->result_array();
	}

	public function subscription_Insert($data)
	{
		$this->db->insert('subscription', $data);
	}


}
