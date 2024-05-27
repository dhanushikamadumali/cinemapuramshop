<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

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
		$this->load->view('purchase_payment/add_payment');
		$this->load->view('template/footer');
		
	}
	public function payment_ajax(){
		$this->load->view('purchase_payment/ajax');
	}
	public function view_payment()
	{
		$this->load->view('template/header');
		$this->load->view('purchase_payment/view_payment');
		$this->load->view('template/footer');
		
	}
	public function purchase_payment_ajax(){
		$this->load->library("Datatables");
		// $this->load->helper("datatable_helper");
		 $this->datatables->select("product_purchase_payment.id  as DT_RowId,
		 							product_purchase_payment.transaction_no as dtb_paynodkr,
									DATE_FORMAT(product_purchase_payment.date,'%b ,%d %Y - %h:%i %p') as dtb_Datdresf,
									product_purchase_payment.payment_type as dtb_paytype,
									product_purchase_payment.amount as dtb_paytot,								
									(select supplier_name from supplier_information where acc_id = product_purchase_payment.dr) as dtb_suNalsdkj, 
									(select branch_name from branch where id =product_purchase_payment.branch_id) as dtb_branchid, 
									");
		$this->datatables->join('supplier_information','supplier_information.acc_id = product_purchase_payment.dr');					
		$this->datatables->join('branch','branch.id =product_purchase_payment.branch_id');					
		$this->datatables->from("product_purchase_payment");
	
		// if($this->input->post("pu_sup") != null):
		// 	$this->datatables->where(array("invoice.customer_id"=> trim($this->input->post("pu_sup"))) );
		// endif;//end check filter
		// if($this->input->post("pu_stat") != null):
		// 	$this->datatables->where(array("invoice.status"=> trim($this->input->post("pu_stat"))) );
		// endif;//end check filter
		// if($this->input->post("pu_dt") != null):
		// 	$this->datatables->like(array("invoice.date"=> trim($this->input->post("pu_dt"))) );
		// endif;//end check filter
		// if($this->input->post("pu_pytp") != null):
		// 	$this->datatables->like(array("invoice.payment_type"=> trim($this->input->post("pu_pytp"))) );
		// endif;//end check filter
		// if($this->input->post("pu_bnk") != null):
		// 	$this->datatables->like(array("invoice.bank_id"=> trim($this->input->post("pu_bnk"))) );
		// endif;//end check filter
		// if($this->input->post("pu_inv") != null):
		// 	$this->datatables->like(array("invoice.invoice_id"=> trim($this->input->post("pu_inv"))) );
		// endif;//end check filter
		$this->datatables->add_column("renival_igGrt", "$1" ,"DT_RowId");
		echo $this->datatables->generate();

	}//End Purchase view datatable ajax
	 
	

}