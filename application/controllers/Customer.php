<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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
		$this->load->view('customer/add_customer');
		$this->load->view('template/footer');
		
	}
	public function customer_ajax(){
		$this->load->view('customer/ajax');
	}
	public function view_customer()
	{
		$this->load->view('template/header');
		$this->load->view('customer/view_customer');
		$this->load->view('template/footer');
		
	}
	public function edit_customer()
	{
		$this->load->view('template/header');
		$this->load->view('customer/edit_customer');
		$this->load->view('template/footer');
		
	}
	public function customer_view_datatable_ajax(){
		$this->load->library("Datatables");
		// $this->load->helper("datatable_helper");
		 $this->datatables->select("customer_information.id  as DT_RowId,
		 							customer_information.customer_id as dtb_cusiddkr,
									DATE_FORMAT(customer_information.datetime,'%b ,%d %Y - %h:%i %p') as dtb_Datdresf,
									customer_information.customer_name	 as dtb_cusname,
									customer_information.address as dtb_cusaddress,
									customer_information.mobile as dtb_cusmobile,
									customer_information.details as dtb_cusdetails,
									customer_information.status as dtb_status, 
								   ");
							
		$this->datatables->from("customer_information");
	
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
	public function customer_sales_order()
	{
		$this->load->view('template/header');
		$this->load->view('report/customer_sales_order');
		$this->load->view('template/footer');
		
	}
	public function customer_sales_order_datatable_ajax(){
		$this->load->library("Datatables");
		// $this->load->helper("datatable_helper");
		 $this->datatables->select("sales_order.id  as DT_RowId,									
									DATE_FORMAT(sales_order.sales_date,'%b ,%d %Y - %h:%i %p') as dtb_Datdresf,
									sales_order.transaction_no	 as dtb_salortranno,
									sales_order.total_discount as dtb_salordisamount,
									sales_order.customer_paid	 as dtb_salorcustpaid,
									sales_order.total_amount as dtb_saleortoamount,
									sales_order.sales_remark as dtb_saleorremark,
									sales_order.status as dtb_status, 
									(select customer_name from customer_information where id = sales_order.customer_id) as dtb_cusNalsdkj, 
								   ");
		$this->datatables->join('customer_information','customer_information.id = sales_order.customer_id');			
		$this->datatables->from("sales_order");
	
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