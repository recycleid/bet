<?php
class login_model extends CI_Model
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

	public function checklogin($role,$user,$pwd)
	{
		if ($role == "Administrator") {
			$sql = "select * from user_admin where username = '$user' and password = '$pwd' and active = '1'";
		} else if ($role == "Agent") {
			$sql = "select * from user_agent where username = '$user' and password = '$pwd' and active = '1'";
		} else {
			$sql = "select user.* , user_agent.expireDate
			from user
			left join user_agent on user.agentID = user_agent.agentID
			where user.username = '$user' and user.password = '$pwd' and user_agent.active = '1' and user.active = '1'";
		}


		return $this->db->query($sql)->result_array();
	}


}
