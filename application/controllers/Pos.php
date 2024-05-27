<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {

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
		date_default_timezone_set("Asia/Colombo");
		$this->load->model('Common_model');
		$this->Common_model->is_logged_in();
	}
	public function index()
	{
		$this->load->view('pos/pos');
	}
	public function pos_ajax(){
		$this->load->view('pos/ajax');
	}

	public function edit_sales_hold_order()
	{
		$this->load->view('pos/recall_pos');
	}
	public function bill(){
		// $this->load->library('fpdf_gen');
		require('assets/fpdf/pdfhtml.php');
		// require('assets/content/logo');

        // $pdf = new FPDF('L', 'mm', 'A5');
		// $this->db->select('sales_order.*,customer_information.customer_name as cname,branch.branch_name as bname');
		// $this->db->join("customer_information","customer_information.id=sales_order.customer_id");
		// $this->db->join("branch","branch.id=sales_order.branch_id");
		//    $order = $this->Common_model->get_all('sales_order')->result();
		$saleid = $this->input->get('id');
		$this->db->select('sales_order.*,system_user_type.name as urolename');
		$this->db->join("system_user_type","system_user_type.id=sales_order.add_by");
		$sales_order = $this->Common_model->get_all('sales_order',['sales_order.id'=> $this->input->get('id')])->result();
		
		$sales_order_payment = $this->Common_model->get_all('sales_order_payment',['order_id'=> $this->input->get('id')])->result();
		
		$this->db->select('sales_order_details.*,product_information.product_name as pname');
		$this->db->join("product_information","product_information.id=sales_order_details.product_id");
		$sales_order_details = $this->Common_model->get_all('sales_order_details',['sales_order_details.order_id'=> $this->input->get('id')])->result();
		
		$itemcount  = $this->db->query("SELECT count(product_id) as pid from sales_order_details where order_id= '$saleid'")->result();
		
		$itemquty  = $this->db->query("SELECT SUM(item_qty) as qty from sales_order_details where order_id= '$saleid'")->result();
		
		// $query = $this->db->query("SELECT * FROM product_purchase WHERE id='$purchaseid'")->result();
		$pdf = new fpdf('p','mm',array(80,300));
		// $pdf->Image('logo.jpg',10,10,20,20,'jpg');
		$pdf->SetTitle("CINAMA PURAM");
		$pdf->AddPage();

		$pdf->SetFont("Arial","B","15");
		$pdf->Cell(55,6,"CINAMA PURAM",0,1,"C");
		$pdf->SetFont("Arial","B","9"); 
		$pdf->Cell(55,5,'No 20, Marine Drive',0,1,"C");
		$pdf->Cell(55,5,'Bambalapitiya',0,1,"C");
		$pdf->Cell(55,5,'Colombo 04',0,1,"C");
		$pdf->Cell(55,5,'070 7778647',0,1,"C");
		$pdf->Cell(0,3,'',0,1);

		
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'---------------------------------------------------------',0,1);

		$pdf->SetFont("Arial","B","10"); 
		$pdf->Cell(55,5,$sales_order[0]->order_type." bill",0,1,"C");
		$pdf->Cell(0,3,'',0,1);

		$pdf->SetFont("Arial","B","9"); 
		$pdf->Cell(25,5,'Order No',0,0);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(20,5,$saleid,0,1);

		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(25,5,'Date',0,0);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(20,5,date($sales_order[0]->sales_date),0,1);

		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(25,5,'Bill No',0,0);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(20,5, $sales_order_payment[0]->transaction_no,0,1);

		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(25,5,'User Role',0,0);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(20,5,$sales_order[0]-> urolename,0,1);

		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(25,5,'Payment mode',0,0);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(20,5,$sales_order_payment[0]->payment_type,0,1);
		

		$pdf->Cell(0,5,'---------------------------------------------------------',0,1);
		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(20,5,'Item',0,0);
		$pdf->Cell(10,5,'Qty',0,0);
		$pdf->Cell(15,5,'Price',0,0);
		$pdf->Cell(15,5,'Amount',0,1);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'---------------------------------------------------------',0,1);
		$counter=0;
		foreach($sales_order_details as $sadetails){
			$counter++;
			$pdf->SetFont("Arial","","9");
			$pdf->Cell(0,5, $sadetails->pname,0,1);
			$pdf->Cell(20,5,'',0,0);
			$pdf->Cell(10,5,$sadetails->item_qty,0,0);
			$pdf->Cell(15,5,$sadetails->per_price,0,0);
			$pdf->Cell(15,5,$sadetails->total_price,0,1);
		}
		$pdf->Cell(0,5,'---------------------------------------------------------',0,1);  

		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(10,5,'Item :',0,0);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(30,5, $itemcount[0]->pid,0,0);
		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(10,5,'Qty :',0,0);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(10,5,$itemquty[0]->qty,0,1);

		$pdf->Cell(0,5,'---------------------------------------------------------',0,1); 

		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(40,5,'Total',0,0);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(20,5, $sales_order[0]->total_amount,0,1);

		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(40,5,'Customer Paid',0,0);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(20,5,$sales_order[0]->customer_paid,0,1);

		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(40,5,'Balance',0,0);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(20,5,  $sales_order[0]->customer_paid - $sales_order[0]->total_amount. ".00" ,0,1);
		// $pdf->Cell(40,6,'Payment :',0,0);
		// $pdf->Cell(0,5,'',0,1);
		// $pdf->Cell(0,5,'---------------------------------------------------------',0,1);

		// $pdf->Cell(40,5,'Cash',0,0);
		// $pdf->Cell(20,5,$row1["recieved_amount"],0,1);
		// $pdf->Cell(40,5,'Balance',0,0);
		// $pdf->Cell(20,5,$row1["balance"],0,1);
		// $pdf->Cell(0,5,'',0,1);
		// $pdf->Cell(0,5,'',0,1);
		// $pdf->Cell(0,7,'---------------------------------------------------------',0,1);

		
		$pdf->Cell(0,7,'---------------------------------------------------------',0,1);
		$pdf->Cell(0,5,'Thank You!!! Come Again',0,1,'C');
		$pdf->Cell(0,7,'---------------------------------------------------------',0,1);

		$pdf->AutoPrint(false);
		$pdf->Output();
	}

	public function printbill()
	{
		$this->load->view('pos/bill');
	}
	public function kotbill()
	{
		$this->load->view('pos/kot');
	}
	 public function cashier_open() {
        $this->load->view('template/header');
        $this->load->view('pos/cashier_open');
        $this->load->view('template/footer');
    }
    
	

}