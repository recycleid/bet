<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
 	}

	public function index()
	{
		$menu = array(
	        'menu' => 'หน้าแรก',
          'userData' => $this->session->userdata()
		);

		$this->load->view('Template/Header');
		$this->load->view('Template/Menu', $menu);
		$this->load->view('Home/Content');
		$this->load->view('Template/Footer');
	}

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

	public function ballresult()
	{
		$menu = array(
	        'menu' => 'ผลบอล',
          'userData' => $this->session->userdata()
		);

		$this->load->view('Template/Header');
		$this->load->view('Template/Menu', $menu);
		$this->load->view('Home/ballresult');
		$this->load->view('Template/Footer');
	}
}
