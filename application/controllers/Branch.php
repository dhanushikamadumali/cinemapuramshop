<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

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
		$this->load->view('branch/add_branch');
		$this->load->view('template/footer');
		
	}
	public function branch_ajax(){
		$this->load->view('branch/ajax');
	}
	public function view_branch()
	{
		$this->load->view('template/header');
		$this->load->view('branch/view_branch');
		$this->load->view('template/footer');
		
	}
	
	

}