<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userrole extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Common_model');
		$this->Common_model->is_logged_in();
		
	}
	 public function index()
	{
        $this->load->view('template/header');
		$this->load->view('user_role/add_user_role');
		$this->load->view('template/footer');
		
	}
	public function user_role_ajax(){
		$this->load->view('user_role/ajax');
	}
	public function view_user_role()
	{
		$this->load->view('template/header');
		$this->load->view('user_role/view_user_role');
		$this->load->view('template/footer');
		
	}
	public function edit_user_role()
	{
		$this->load->view('template/header');
		$this->load->view('user_role/edit_user_role');
		$this->load->view('template/footer');
		
	}
	

}