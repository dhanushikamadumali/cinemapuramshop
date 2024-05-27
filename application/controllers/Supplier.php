 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

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
		$this->load->view('supplier/add_supplier');
		$this->load->view('template/footer');
		
	}
	public function supplier_ajax(){
		$this->load->view('supplier/ajax');
	}
	public function view_supplier()
	{
		$this->load->view('template/header');
		$this->load->view('supplier/view_supplier');
		$this->load->view('template/footer');
		
	}
	public function edit_supplier()
	{
		$this->load->view('template/header');
		$this->load->view('supplier/edit_supplier');
		$this->load->view('template/footer');
		
	}
	public function supplier_view_datatable_ajax(){
		$this->load->library("Datatables");
		// $this->load->helper("datatable_helper");
		 $this->datatables->select("supplier_information.id  as DT_RowId,
									supplier_information.supplier_id as dtb_supiddkr,
									DATE_FORMAT(supplier_information.datetime,'%b ,%d %Y - %h:%i %p') as dtb_Datdresf,
									supplier_information.supplier_name	 as dtb_supname,
									supplier_information.address as dtb_supaddress,
									supplier_information.mobile as dtb_supmobile,
									supplier_information.details as dtb_supdetails,
									supplier_information.status as dtb_status, 
								   ");
							
		$this->datatables->from("supplier_information");
	
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
	public function supplier_purchase()
	{
		$this->load->view('template/header');
		$this->load->view('report/supplier_purchase');
		$this->load->view('template/footer');
		
	}
	public function supplier_purchase_datatable_ajax(){
		$this->load->library("Datatables");
		// $this->load->helper("datatable_helper");
		 $this->datatables->select("product_purchase.id  as DT_RowId,									
									DATE_FORMAT(product_purchase.purchase_date,'%b ,%d %Y - %h:%i %p') as dtb_Datdresf,
									product_purchase.transaction_no	 as dtb_purtranno,
									product_purchase.total_discount as dtb_purdisamount,
									product_purchase.total_amount as dtb_purtoamount,
									product_purchase.purchase_remark as dtb_purremark,
									product_purchase.status as dtb_status, 
									(select supplier_name from supplier_information where id = product_purchase.supplier_id) as dtb_suNalsdkj, 
								   ");
		$this->datatables->join('supplier_information','supplier_information.id = product_purchase.supplier_id');			
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
	

}