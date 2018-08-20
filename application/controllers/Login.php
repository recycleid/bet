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

    $chk = $this->logindb->checklogin($role,$user,$pwd);

    if (count($chk) > 0) {
      $newdata = array(
              'user'      => $chk[0]["username"],
              'name'      => $chk[0]["name"],
              'surname'   => $chk[0]["surname"],
              'telephone' => $chk[0]["telephone"],
              'logged_in' => TRUE,
              'role'      => $role
      );

      $superadmin = false;

      if ($role == "Administrator") {
        $t_id = "adminID";
        $expireDate = "2037-12-31";
        if ($chk[0]["superadmin"] == 1) {
          $superadmin = true;
        }
      } else if ($role == "Agent") {
        $t_id = "agentID";
        $expireDate = $chk[0]["expireDate"];
      } else {
        $t_id = "userID";
        $expireDate = $chk[0]["expireDate"];
      }

      $newdata['id'] = $chk[0][$t_id];
      $newdata['superadmin'] = $superadmin;
      $newdata['expireDate'] = $expireDate;

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
