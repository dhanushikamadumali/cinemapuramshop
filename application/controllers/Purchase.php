<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {

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
		$this->load->view('purchase/add_purchase');
		$this->load->view('template/footer');
		
	}
	public function purchase_ajax(){
		$this->load->view('purchase/ajax');
	}
	public function view_purchase()
	{
		$this->load->view('template/header');
		$this->load->view('purchase/view_purchase');
		$this->load->view('template/footer');
		
	}
	public function edit_purchase()
	{
		$this->load->view('template/header');
		$this->load->view('purchase/edit_purchase');
		$this->load->view('template/footer');
		
	}
	public function view_purchase_ajax(){
		$this->load->library("Datatables");
		// $this->load->helper("datatable_helper");
		 $this->datatables->select("product_purchase.id  as DT_RowId,
		 							product_purchase.transaction_no as dtb_purnodkr,
									DATE_FORMAT(product_purchase.purchase_date,'%b ,%d %Y - %h:%i %p') as dtb_Datdresf,
									product_purchase.total_discount as dtb_purdis,
									product_purchase.total_amount as dtb_purtot,
									product_purchase.status as dtb_status, 
									(select supplier_name from supplier_information where id = product_purchase.supplier_id) as dtb_suNalsdkj, 
									(select branch_name from branch where id = product_purchase.branch_id) as dtb_branchid, 
									");
		$this->datatables->join('supplier_information','supplier_information.id = product_purchase.supplier_id');					
		$this->datatables->join('branch','branch.id = product_purchase.branch_id');					
		$this->datatables->from("product_purchase");
	
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
	public function purchase_product()
	{
		$this->load->view('template/header');
		$this->load->view('report/purchase_product');
		$this->load->view('template/footer');
		
	}
	public function purchase_product_datatable_ajax(){
		if(!empty($this->input->post("fromdate"))):
		$this->load->library("Datatables");
		// $this->load->helper("datatable_helper");
		 $this->datatables->select("product_purchase_details.id  as DT_RowId,	
									SUM(product_purchase_details.purchase_qty) as dtb_QtRTY,								
									SUM(product_purchase_details.amount) as dtb_puramount,
									product_purchase_details.status as dtb_status, 
									(select product_name from product_information where id = product_purchase_details.product_id) as dtb_proname,
									
								   ");
		$this->datatables->join('product_information','product_information.id = product_purchase_details.product_id');	
		$this->datatables->join('product_purchase','product_purchase.id = product_purchase_details.purchase_id ');					
		$this->datatables->from("product_purchase_details");
	
		if($this->input->post("productid") != null):
			$this->datatables->where(array("product_purchase_details.product_id"=> trim($this->input->post("productid"))) );
		endif;//end check filter
		if($this->input->post("fromdate") != null):
			$this->datatables->where(array("DATE(product_purchase.purchase_date) >="=> trim($this->input->post("fromdate"))) );
		endif;//end check filter
		if($this->input->post("todate") != null):
			$this->datatables->where(array("DATE(product_purchase.purchase_date) <="=> trim($this->input->post("todate"))) );
		endif;//end check filter
		// if($this->input->post("pu_stat") != null):
		// 	$this->datatables->where(array("invoice.status"=> trim($this->input->post("pu_stat"))) );
		// endif;//end check filter
		// if($this->input->post("fromdate") != null):
		// 	$this->datatables->like(array("product_purchase_details.date"=> trim($this->input->post("fromdate"))) );
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
		else:
			return "no data";
		endif;

	}//End Purchase view datatable ajax
	
	

}