<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stoleitem extends CI_Controller {

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
	public function item_availability()
	{
		$this->load->view('template/header');
		$this->load->view('stole_item/item_availability');
		$this->load->view('template/footer');
		
	}
	public function stole_item_ajax(){
		$this->load->view('stole_item/ajax');
	}
	public function today_item_availability()
	{
		$this->load->view('template/header');
		$this->load->view('stole_item/today_available_item');
		$this->load->view('template/footer');
		
	}
	public function stole_order()
	{
		$this->load->view('template/header');
		$this->load->view('stole_item/stole_order');
		$this->load->view('template/footer');
		
	}
    
    public function stole_payment()
	{
		$this->load->view('template/header');
		$this->load->view('stole_item/stole_payment');
		$this->load->view('template/footer');
		
	}

	public function view_stole_payment()
	{
		$this->load->view('template/header');
		$this->load->view('stole_item/view_stole_payment');
		$this->load->view('template/footer');
		
	}
	
	public function view_single_stall_payment()
	{
		$this->load->view('template/header');
		$this->load->view('stole_item/view_single_stall_payment');
		$this->load->view('template/footer');
		
	}
	public function edit_stole_payment()
	{
		$this->load->view('template/header');
		$this->load->view('stole_item/edit_stole_payment');
		$this->load->view('template/footer');
		
	}
	
	public function today_kot()
	{
		$this->load->view('template/header');
		$this->load->view('stole_item/today_kot');
		$this->load->view('template/footer');
		
	}
	public function all_kot()
	{
		$this->load->view('template/header');
		$this->load->view('stole_item/all_kot');
		$this->load->view('template/footer');
		
	}
	
	 public function view_stall_orders() {
        $this->load->library("Datatables");
        // $this->load->helper("datatable_helper");
        // $this->db->select('sales_order.*,customer_information.customer_name as cname,branch.branch_name as bname');
        // $this->db->join("customer_information","customer_information.id=sales_order.customer_id");
        // $this->db->join("branch","branch.id=sales_order.branch_id");
        
        //    $order = $this->Common_model->get_all('sales_order')->result();
        
                                
                                         
        $this->datatables->select("sales_order_details.id  as DT_RowId,
		 							sales_order_details.order_id as dtb_sodOid,
		 							sales_order_details.item_qty as dtb_sodiqty,
									sales_order_details.order_date as dtb_Datdresf,
									sales_order.token_number as dtb_sotblno,
									sales_order.order_type as dtb_otype,
									sales_order.transaction_no as dtb_transno,
									product_information.manufacturer_price as dtb_manuprice,
									product_information.package_charge as dtb_package_charge,
									product_information.product_name as dtb_prodName,
									sales_order_details.product_id as dtb_prodId");
        $this->datatables->join('sales_order', 'sales_order.id=sales_order_details.order_id',"LEFT");
        $this->datatables->join('product_information', 'product_information.id=sales_order_details.product_id',"LEFT");
        // $this->datatables->order_by('id', "DESC");
        $this->datatables->where(['product_information.manufacturer_id'=>$this->session->userdata("manufaturer_id"),'sales_order_details.delivery_status'=>'0','sales_order_details.status'=>'1']);					
        $this->datatables->from("sales_order_details"); 
        $this->datatables->add_column("renival_igGrt", "$1", "DT_RowId");
        echo $this->datatables->generate();
    }
    
    

}