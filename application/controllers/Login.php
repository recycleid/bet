<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
 	public function __Construct()
 	{
 		parent::__Construct();
 		$this->load->library('session');
    $this->load->model("login_model","logindb");

 	}

	public function index()
	{
    $this->load->view('Login/Index');
	}

  public function checklogin()
  {
    $user = $this->input->post('username');
    $pwd = $this->input->post('password');
    $role = $this->input->post('userrole');

    $data = "user";
    if ($role == "Administrator") {
      $data = "user_admin";
    } else if ($role == "Agent") {
      $data = "user_agent";
    } else {
      $data = "user";
    }

    $chk = $this->logindb->checklogin($data,$user,$pwd);

    if (count($chk) > 0) {

      if ($role == "Administrator") {
        $t_id = "adminID";
      } else if ($role == "Agent") {
        $t_id = "agentID";
      } else {
        $t_id = "userID";
      }

      $newdata = array(
              'id'        => $chk[0][$t_id],
              'user'      => $chk[0]["username"],
              'name'      => $chk[0]["name"],
              'surname'   => $chk[0]["surname"],
              'role'      => $role,
              'logged_in' => TRUE
      );

      $this->session->set_userdata($newdata);
    } else {
      $this->session->sess_destroy();
    }

    if ($this->session->userdata('id') != "") {
      redirect(base_url());
    } else {
      redirect(base_url()."Login?error=1");
    }


  }

}
