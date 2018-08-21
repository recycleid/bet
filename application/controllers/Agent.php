<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

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
      if ($this->session->userdata("role") != "Agent") {
        redirect(base_url());
      }
    } else {
      redirect(base_url());
    }

    $this->load->model("agent_model","agentdb");
 	}

  public function index()
	{
		redirect(base_url());
	}

	public function manageuser()
	{
		$menu = array(
	    'menu' => 'จัดการ User',
      'userData' => $this->session->userdata()
		);

    $data = array(
      'userData' => $this->agentdb->datauser_byAgentID($this->session->userdata("id"))
    );

		$this->load->view('Template/Header');
		$this->load->view('Template/Menu', $menu);
		$this->load->view('Agent/manageuser', $data);
		$this->load->view('Template/Footer');
	}

  public function userForm($id = "")
	{
    $menu = array(
	    'menu' => 'ผู้จัดการระบบ',
      'userData' => $this->session->userdata()
		);

    $data = array(
      'userData' => $this->agentdb->datauser_byID($id),
      'agentID' => $this->session->userdata("id")
    );

		$this->load->view('Template/Header');
		$this->load->view('Template/Menu', $menu);
		$this->load->view('agent/userForm', $data);
		$this->load->view('Template/Footer');
	}

  public function userFormSave()
	{

    $id = $this->input->post('userID');

    $data = array(
        'agentID' => $this->input->post('agentID'),
  			'username' => $this->input->post('username'),
  			'password' => $this->input->post('password'),
  			'name' => $this->input->post('name'),
  			'surname' => $this->input->post('surname'),
  			'telephone' => $this->input->post('telephone')
		);

    if ($id == "") {
      $this->agentdb->userForm_Insert($data);
    } else {
      $this->agentdb->userForm_Update($data,$id);
    }

    return "OK";

  }

  public function userFormDelete()
  {
    $id = $this->input->post('userID');
    $this->agentdb->userForm_Delete($id);
    return "OK";
  }

  public function userFormActive()
  {
    $id = $this->input->post('userID');
    $data = array(
  			'active' => 1
		);
    $this->agentdb->userForm_Update($data,$id);
    return "OK";
  }

  public function userFormDeActive()
  {
    $id = $this->input->post('userID');
    $data = array(
  			'active' => 0
		);
    $this->agentdb->userForm_Update($data,$id);
    return "OK";
  }

  public function subscription()
	{

		$menu = array(
	    'menu' => 'ต่ออายุ Agent',
      'userData' => $this->session->userdata()
		);

    $data = array(
      'rate' => $this->agentdb->subscriprate(),
      'ssData' => $this->agentdb->subscripData()
    );

		$this->load->view('Template/Header');
		$this->load->view('Template/Menu', $menu);
		$this->load->view('Agent/subscription', $data);
		$this->load->view('Template/Footer');
	}

  public function saveSubsciption()
  {
    $agentID = $this->input->post('agentID');
    $data = array(
      'agentID' => $agentID,
      'telephone' => $this->input->post('telephone'),
      'days' => $this->input->post('days'),
      'rate' => $this->input->post('rate'),
      'createDate' => date("Y-m-d H:i:s")
    );

    $slip = $_FILES["slip"]["name"];

    $target_dir = "resource/transactionImage/subscription/";
    $imageFileType = strtolower(pathinfo($_FILES["slip"]["name"],PATHINFO_EXTENSION));
    $target_file = $target_dir . $agentID.date("YmdHis").".".$imageFileType;
    $target_fullfile = FCPATH.$target_file;
    $uploadOk = 1;

    if (move_uploaded_file($_FILES["slip"]["tmp_name"], $target_fullfile)) {
        $data["slip"] = $target_file;
        $this->agentdb->subscription_Insert($data);
        echo "ok";
    } else {
        echo "no";
    }
  }


}
