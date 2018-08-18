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

	public function checklogin($table,$user,$pwd)
	{
		$sql = "select * from $table where username = '$user' and password = '$pwd'";

		return $this->db->query($sql)->result_array();
	}


}
