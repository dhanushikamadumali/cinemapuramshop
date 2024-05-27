<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->view('users/add_user');
		$this->load->view('template/footer');
		
	}
	public function user_ajax(){
		$this->load->view('users/ajax');
	}//End POS_ajax
	// public function add_customer(){
	// 	$this->load->view('add_customer');
	// }
	public function user_view()
	{
		$this->load->view('template/header');
		$this->load->view('users/view_user');
		$this->load->view('template/footer');
		
	}
	public function user_edit()
	{
		$this->load->view('template/header');
		$this->load->view('users/edit_user');
		$this->load->view('template/footer');
		
	}
	

}