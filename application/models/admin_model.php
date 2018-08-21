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

	public function dataagent()
	{
		$sql = "select * from user_agent";

		return $this->db->query($sql)->result_array();
	}

	public function dataagent_byID($id)
	{
		$sql = "select * from user_agent where agentID = '$id'";

		return $this->db->query($sql)->result_array();
	}

	public function agentForm_Insert($data)
	{
		$this->db->insert('user_agent', $data);
	}

	public function agentForm_Update($data,$id)
	{
		$this->db->where('agentID', $id);
		$this->db->update('user_agent', $data);
	}

	public function agentForm_Delete($id)
	{
		$this->db->where('agentID', $id);
		$this->db->delete('user_agent');
	}

	public function subscription_Data()
	{
		$sql = "select subscription.* ,user_agent.name, user_agent.surname
from subscription
left join user_agent on  subscription.agentID = user_agent.agentID
order by subscription.createDate";

		return $this->db->query($sql)->result_array();
	}

	public function subscription_GetByID($id)
	{
		$sql = "select subscription.* ,user_agent.name, user_agent.surname, user_agent.expireDate
from subscription
left join user_agent on  subscription.agentID = user_agent.agentID
where subscriptionID = '$id'
order by subscription.createDate";

		return $this->db->query($sql)->result_array();
	}

	public function subscription_Update($data,$id)
	{
		$this->db->where('subscriptionID', $id);
		$this->db->update('subscription', $data);
	}


}
