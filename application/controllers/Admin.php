<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
    if ($this->session->has_userdata("role")) {
      if ($this->session->userdata("role") != "Administrator") {
        redirect(base_url());
      }
    } else {
      redirect(base_url());
    }

    $this->load->model("admin_model","admindb");
 	}

  public function index()
	{
		redirect(base_url());
	}

	public function manageadmin()
	{

		$menu = array(
	    'menu' => 'ผู้จัดการระบบ',
      'userData' => $this->session->userdata()
		);

    $data = array(
      'adminData' => $this->admindb->dataadmin()
    );

		$this->load->view('Template/Header');
		$this->load->view('Template/Menu', $menu);
		$this->load->view('Admin/manageadmin', $data);
		$this->load->view('Template/Footer');
	}

  public function adminForm($id = "")
	{
    $menu = array(
	    'menu' => 'ผู้จัดการระบบ',
      'userData' => $this->session->userdata()
		);

    $data = array(
      'adminData' => $this->admindb->dataadmin_byID($id)
    );

		$this->load->view('Template/Header');
		$this->load->view('Template/Menu', $menu);
		$this->load->view('Admin/adminForm', $data);
		$this->load->view('Template/Footer');
	}

  public function adminFormSave()
	{

    $id = $this->input->post('adminID');

    $data = array(
  			'username' => $this->input->post('username'),
  			'password' => $this->input->post('password'),
  			'name' => $this->input->post('name'),
  			'surname' => $this->input->post('surname'),
  			'telephone' => $this->input->post('telephone'),
        'superadmin' => $this->input->post('superadmin')
		);

    if ($id == "") {
      $this->admindb->adminForm_Insert($data);
    } else {
      $this->admindb->adminForm_Update($data,$id);
    }

    return "OK";

  }

  public function adminFormDelete()
  {
    $id = $this->input->post('adminID');
    $this->admindb->adminForm_Delete($id);
    return "OK";
  }

  public function adminFormActive()
  {
    $id = $this->input->post('adminID');
    $data = array(
  			'active' => 1
		);
    $this->admindb->adminForm_Update($data,$id);
    return "OK";
  }

  public function adminFormDeActive()
  {
    $id = $this->input->post('adminID');
    $data = array(
  			'active' => 0
		);
    $this->admindb->adminForm_Update($data,$id);
    return "OK";
  }

  public function manageagent()
	{

		$menu = array(
	    'menu' => 'จัดการ Agent',
      'userData' => $this->session->userdata()
		);

    $data = array(
      'agentData' => $this->admindb->dataagent()
    );

		$this->load->view('Template/Header');
		$this->load->view('Template/Menu', $menu);
		$this->load->view('Admin/manageagent', $data);
		$this->load->view('Template/Footer');
	}

  public function agentForm($id = "")
	{
    $menu = array(
	    'menu' => 'จัดการ Agent',
      'userData' => $this->session->userdata()
		);

    $data = array(
      'agentData' => $this->admindb->dataagent_byID($id)
    );

		$this->load->view('Template/Header');
		$this->load->view('Template/Menu', $menu);
		$this->load->view('Admin/agentForm', $data);
		$this->load->view('Template/Footer');
	}

  public function agentFormSave()
	{

    $id = $this->input->post('agentID');

    $data = array(
  			'username' => $this->input->post('username'),
  			'password' => $this->input->post('password'),
  			'name' => $this->input->post('name'),
  			'surname' => $this->input->post('surname'),
  			'telephone' => $this->input->post('telephone')
		);

    if ($id == "") {
      $data["createDate"] = date("Y-m-d");
      $data["expireDate"] = date("Y-m-d", strtotime("+ 30 day"));
      $this->admindb->agentForm_Insert($data);
    } else {
      $this->admindb->agentForm_Update($data,$id);
    }

    return "OK";

  }

  public function agentFormDelete()
  {
    $id = $this->input->post('agentID');
    $this->admindb->agentForm_Delete($id);
    return "OK";
  }

  public function agentFormActive()
  {
    $id = $this->input->post('agentID');
    $data = array(
  			'active' => 1
		);
    $this->admindb->agentForm_Update($data,$id);
    return "OK";
  }

  public function agentFormDeActive()
  {
    $id = $this->input->post('agentID');
    $data = array(
  			'active' => 0
		);
    $this->admindb->agentForm_Update($data,$id);
    return "OK";
  }




}
