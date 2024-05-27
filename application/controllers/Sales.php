<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

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
	
//=======================================================
//=============== View All Sales Order ==================
//=======================================================
    public function index() {
        $this->load->view('template/header');
        $this->load->view('sales_order/view_salesorder');
        $this->load->view('template/footer');
    }

    public function view_sales_ajax() {
        $this->load->library("Datatables");
        // $this->load->helper("datatable_helper");
        // $this->db->select('sales_order.*,customer_information.customer_name as cname,branch.branch_name as bname');
        // $this->db->join("customer_information","customer_information.id=sales_order.customer_id");
        // $this->db->join("branch","branch.id=sales_order.branch_id");
        //    $order = $this->Common_model->get_all('sales_order')->result();
        $this->datatables->select("sales_order.id  as DT_RowId,
		 							sales_order.transaction_no as dtb_trano,
									DATE(sales_order.sales_date) as dtb_Datdresf,
									sales_order.total_amount as dtb_saletot,
									sales_order.customer_paid as dtb_salecuspay,
									sales_order.order_type as dtb_order_type, 
									sales_order.dr as dtb_dr, 
									sales_order.status as dtb_status,
									sales_order.order_type as dtb_orderStatus,
									customer_name as dtb_cusname, 
									
									");
        $this->datatables->join('customer_information', 'customer_information.id = sales_order.customer_id');
        // $this->datatables->join('branch','branch.id = sales_order.branch_id');					
        $this->datatables->from("sales_order");

        // if($this->input->post("pu_sup") != null): _FORMAT,'%b ,%d %Y - %h:%i %p'
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
        $this->datatables->add_column("renival_igGrt", "$1", "DT_RowId");
        echo $this->datatables->generate();
    }

//End Purchase view datatable ajax
//=======================================================
//=============== View Today Sales Order ================
//=======================================================

    public function todaysales() {
        $this->load->view('template/header');
        $this->load->view('sales_order/today_sales_order');
        $this->load->view('template/footer');
    }

    public function today_sales_ajax() {
        $this->load->library("Datatables");
        $this->db->limit(1);
        $this->db->order_by("id","desc");
        $accdate=$this->Common_model->get_all("cashier_open")->result(); 
        $this->datatables->select("sales_order.id  as DT_RowId,
                sales_order.transaction_no as dtb_trano,
                DATE(sales_order.sales_date) as dtb_Datdresf,
                sales_order.total_amount as dtb_saletot,
                sales_order.customer_paid as dtb_salecuspay,
                sales_order.order_type as dtb_order_type, 
                sales_order.dr as dtb_dr, 
                sales_order.status as dtb_status,
                customer_name as dtb_cusname");
        $this->datatables->join('customer_information', 'customer_information.id = sales_order.customer_id');
        $this->datatables->where('DATE(sales_order.acc_date)',$accdate[0]->acc_date);//use date function
        $this->datatables->from("sales_order");
        $this->datatables->add_column("renival_igGrt", "$1", "DT_RowId");
        echo $this->datatables->generate();
    }

//End Purchase view datatable ajax
//======================================== 
//================ void sales ============
//========================================
    public function void_sales() {
        $this->load->view('template/header');
        $this->load->view('sales_order/voide_sales');
        $this->load->view('template/footer');
    }

    public function void_today_sales_ajax() {
        $this->load->library("Datatables");
        $this->db->limit(1);
        $this->db->order_by("id","desc");
        $accdate=$this->Common_model->get_all("cashier_open")->result(); 
        $this->datatables->select("sales_order.id  as DT_RowId,
									sales_order.transaction_no as dtb_trano,
									DATE(sales_order.sales_date) as dtb_Datdresf,
									sales_order.total_amount as dtb_saletot,
									sales_order.customer_paid as dtb_salecuspay,
									sales_order.order_type as dtb_order_type, 
									sales_order.dr as dtb_dr, 
									sales_order.status as dtb_status,
									customer_name as dtb_cusname");
        $this->datatables->join('customer_information', 'customer_information.id = sales_order.customer_id');
        $this->datatables->where('DATE(sales_order.acc_date)',$accdate[0]->acc_date);//use date function
        $this->datatables->from("sales_order");
        $this->datatables->add_column("renival_igGrt", "$1", "DT_RowId");
        echo $this->datatables->generate();
    }

//End Purchase view datatable ajax	
	
	
	
	
	
	
	 
	
	
	
 
	public function sales_ajax(){
		$this->load->view('sales_order/ajax');
	}

    public function edit_sales()
	{
		$this->load->view('sales_order/edit_salesorder');
	}
	
	
	public function report_ajax(){
		$this->load->view('report/ajax');
	}
	
	
 
 
	
	
 
	
	public function weeklysales()
	{
		$this->load->view('template/header');
		$this->load->view('report/sales_weekly');
		$this->load->view('template/footer');
	}
 
 
	
    public function settle_payment()
	{
		$this->load->view('template/header');
		$this->load->view('sales_order/settle_payment');
		$this->load->view('template/footer');
		
	}
	
	public function view_settle_payment(){
		$this->load->library("Datatables");
		// $this->load->helper("datatable_helper");
		// $this->db->select('sales_order.*,customer_information.customer_name as cname,branch.branch_name as bname');
		// $this->db->join("customer_information","customer_information.id=sales_order.customer_id");
		// $this->db->join("branch","branch.id=sales_order.branch_id");
		//    $order = $this->Common_model->get_all('sales_order')->result();
		 $this->datatables->select("sales_order.id  as DT_RowId,
									sales_order.transaction_no as dtb_trano,
									DATE(sales_order.sales_date) as dtb_Datdresf,
									sales_order.total_amount as dtb_saletot,
									sales_order.status as dtb_status,
									customer_name as dtb_cusname, 
									");
		$this->datatables->join('customer_information','customer_information.id = sales_order.customer_id');					
		// $this->datatables->join('branch','branch.id = sales_order.branch_id');
		$this->datatables->where('paid_status','0');//use date function					
		$this->datatables->from("sales_order");
	
	
		$this->datatables->add_column("renival_igGrt", "$1" ,"DT_RowId");
		echo $this->datatables->generate();

	}//End Purchase view datatable ajax
	
	public function sales_dailly_report(){
		
		// $string = "Here is a nice text string consisting of eleven words.";
		// $string1 = word_limiter($string, 4);
		// var_dump($string1);
		// $string = "Here is a nice text string consisting of eleven words.";
		// $string = character_limiter($string, 20);
		
		
		$fromdate = $this->input->post('fromdate');
		$todate = $this->input->post('todate');
		$withproduct = $this->input->post("withitem")?"1":"0";
	
	
		//$this->load->library('fpdf_gen');

	require('assets/fpdf/pdfhtml.php');
		// require('assets/content/logo/');

		// $pdf = new FPDF('L', 'mm', 'A5');
		$this->db->select('SUM(total_amount) as total_amount,system_user.user_name');
		$condition0 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
		$this->db->join("system_user","system_user.id=sales_order.add_by","left");
		$this->db->group_by("user_name");
		$query0= $this->Common_model->get_all("sales_order",$condition0)->result(); 
    
    
		$this->db->select('SUM(total_price) as pricesum, SUM(item_qty) as sumqty');
		$condition = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
		// $condition = 'date(acc_date) BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
		$query= $this->Common_model->get_all("sales_order_details",$condition)->result();
  
    
    
		$this->db->select('SUM(amount) as pricesum, payment_type as ptype');
		$condition1 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
		// $condition1 = 'acc_date BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
		$this->db->group_by('payment_type');
		$query1 = $this->Common_model->get_all("sales_order_payment",$condition1)->result();
   
		$this->db->select('SUM(total_amount) as pricesum, order_type as otype');
		 $condition2 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
		// $condition2 = 'acc_date BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
		$this->db->group_by('order_type');
		$query2 = $this->Common_model->get_all("sales_order",$condition2)->result();

		// $query2 = $this->db->query("SELECT SUM(total_amount) as pricesum, order_type as otype FROM sales_order WHERE   date(sales_date) BETWEEN '$fromdate' AND ' $todate '  GROUP BY order_type")->result();
		$this->db->select('SUM(item_qty) as sumqty');
		 $condition3 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
		// $condition3 = 'acc_date BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
		$query3 = $this->Common_model->get_all("sales_order_details",$condition3)->result();

		// $query3 = $this->db->query("SELECT SUM(item_qty) as sumqty FROM sales_order_details WHERE  date(order_date) BETWEEN '$fromdate' AND ' $todate '")->result();
		$pdf = new fpdf('P','mm',array(80,1000));
		// $pdf->Image("logo.jpg");
		$pdf->SetTitle("CINAMA PURAM");
		$pdf->AddPage();

		$pdf->SetFont("Arial","B","15");
		$pdf->Cell(65,6,"CINAMA PURAM",0,1,"C");
		$pdf->SetFont("Arial","B","9"); 
		$pdf->Cell(65,5,'No 20, Marine Drive',0,1,"C");
		$pdf->Cell(65,5,'Bambalapitiya Colombo 04',0,1,"C"); 
		$pdf->Cell(65,5,'070 7778647',0,1,"C");
		$pdf->Cell(0,3,'',0,1);

        $y=30;
		$pdf->SetFont("Arial","","9");
	    $pdf->SetXY(4,$y);
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
 
	    $pdf->SetXY(5,$y+=3);
		$pdf->SetFont("Arial","","10"); 
		$pdf->Cell(50,5,'From Date',0,0); 
		$pdf->Cell(0,5,$fromdate,0,1);
		$pdf->SetXY(5,$y+=5);
		$pdf->Cell(50,5,'To Date',0,0);
		$pdf->Cell(0,5,$todate,0,1);
		
        $pdf->SetXY(4,$y+=4);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
		
		$pdf->SetXY(5,$y+=4);
		$pdf->SetFont("Arial","B","10"); 
		// $pdf->SetFillColor(204,204,204);
		$pdf->Cell(50,5,'USER SALES',0,1);
        $pdf->SetXY(4,$y+=3);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);

		$counter=0;
		foreach($query0 as $usamount){
			$counter++;
			 $pdf->SetXY(5,$y+=4);
			$pdf->SetFont("Arial","","10");
			$pdf->Cell(50,5, $usamount->user_name,0,0);
			$pdf->Cell(20,5,$usamount->total_amount,0,1,"R");
			
		}
		$pdf->SetXY(4,$y+=4);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
		$pdf->SetXY(5,$y+=4);
		$pdf->SetFont("Arial","B","10"); 
		$pdf->Cell(50,5,'SALES BY PAYMENT METHODS',0,1); 
        $pdf->SetXY(4,$y+=3);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);

		$counter=0;
		foreach($query1 as $paymenttype){
		    $pdf->SetXY(5,$y+=4);
			$counter++;
			$pdf->SetFont("Arial","","10");
			$pdf->Cell(50,5, $paymenttype->ptype,0,0);
			$pdf->Cell(20,5,$paymenttype->pricesum ,0,1,"R");
			
		}
		$pdf->SetXY(4,$y+=4);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
		$pdf->SetXY(5,$y+=4);
		$pdf->SetFont("Arial","B","10"); 
		$pdf->Cell(40,5,'BILLING TYPE',0,1);
        $pdf->SetXY(4,$y+=3);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);

		$counter=0;
		foreach($query2 as $ordertype){
		    $pdf->SetXY(5,$y+=4);
			$counter++;
			$pdf->SetFont("Arial","","10");
			$pdf->Cell(50,5,$ordertype->otype,0,0);
			$pdf->Cell(20,5,$ordertype->pricesum,0,1,"R");
			
		}
		$pdf->SetXY(4,$y+=4);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
		$pdf->SetXY(5,$y+=4);
		$pdf->SetFont("Arial","B","10"); 
		$pdf->Cell(40,5,'DELLED VOID BILL',0,1);
        $pdf->SetXY(4,$y+=3);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);


 $cnd = ["status"=>0, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
$delbill=$this->Common_model->get_all("sales_order",$cnd)->result();
            $pdf->SetXY(5,$y+=4);
            $pdf->SetFont("Arial","","10");
			$pdf->Cell(40,5,"Avoid Bills",0,0,"L");
			$pdf->Cell(15,5, "",0,0,"R");
			$pdf->Cell(15,5,count($delbill) ,0,1,"R"); 
        $pdf->SetXY(4,$y+=4);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
		$pdf->SetXY(4,$y+=4);
		$pdf->SetFont("Arial","B","10"); 
		$pdf->Cell(25,5,'SALES BY ITEM STALL',10,1);
        $pdf->SetXY(4,$y+=3);
		$pdf->SetFont("Arial","","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
                $manus= $this->Common_model->get_all("manufacturer_information")->result();
                foreach($manus as $manu):
                            $prodin= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                        $manu_total=0;
                        $all_manutotal=($query[0]->pricesum==0)?1:$query[0]->pricesum;
                        foreach($prodin as $prod):
                            $pid = $prod->id;
                            $this->db->select('SUM(total_price) as pricesum');
                             $condition4 = ["product_id"=>$pid,"status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
                            // $condition4 = 'order_date BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
                            $query4 = $this->Common_model->get_all("sales_order_details",$condition4)->result();
                            // $query4 = $this->db->query("SELECT SUM(total_price) as pricesum FROM sales_order_details WHERE   date(order_date) BETWEEN '$fromdate' AND ' $todate ' AND product_id=$pid")->result();
                          
                            $manu_total+= $query4[0]->pricesum;
                          $manupre =  (($manu_total/$all_manutotal)*100);  
                        endforeach; 
                    $pdf->SetXY(5,$y+=4);
                    $pdf->SetFont("Arial","","7");
        			$pdf->Cell(40,5,($manu_total==0)?" ":$manu->manufacturer_name,0,0,"L");
        			$pdf->Cell(15,5,($manu_total==0)?" ": number_format($manupre,2,".",",") .'%',0,0,"R");
        			$pdf->Cell(15,5,($manu_total==0)?" ": number_format($manu_total,2,".",","),0,1,"R"); 
                endforeach;
        $pdf->SetXY(5,$y+=4);
		$pdf->SetFont("Arial","B","8"); 
		$pdf->Cell(70,5,number_format($query[0]->pricesum,2,".",","),0,1,"R");

	 $pdf->SetXY(5,$y+=4);
			$pdf->SetFont("Arial","","9");
			$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
			$pdf->SetXY(5,$y+=4);
			$pdf->SetFont("Arial","B","10"); 
			$pdf->Cell(40,5,'QUANTITY BY ITEM CATEGORY',0,1);
            $pdf->SetXY(5,$y+=3);
			$pdf->SetFont("Arial","","9");
			$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
 

            $manus= $this->Common_model->get_all("manufacturer_information")->result();
            foreach($manus as $manu):
                        $prodin= $this->Common_model->get_all("product_information" ,["manufacturer_id"=>$manu->id])->result();
                    $manu_total=0;
                    $all_manuqty=($query3[0]->sumqty==0)?1:$query3[0]->sumqty;
                    foreach($prodin as $prod):
                        $pid = $prod->id;
                        $this->db->select('SUM(item_qty) as sumqty');
                         $condition5 = ["product_id"=>$pid,"status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))];
                        // $condition5 = 'order_date BETWEEN "('. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).')" and status=1';
                        $query5 = $this->Common_model->get_all("sales_order_details",$condition5)->result();
                       
                        // $query5 = $this->db->query("SELECT SUM(item_qty) as sumqty FROM sales_order_details WHERE   date(order_date) BETWEEN '$fromdate' AND ' $todate ' AND product_id=$pid")->result();
                          
                        $manu_total+= $query5[0]->sumqty;
                      $manupre =  (($manu_total/$all_manuqty)*100)/100;  
                    endforeach;
                $pdf->SetXY(5,$y+=4);
                $pdf->SetFont("Arial","","7");
				 $pdf->Cell(40,5,($manu_total==0)?" ":$manu->manufacturer_name ,0,0,"L");
				 $pdf->Cell(15,5, ($manu_total==0)?" ": number_format($manupre,2,".",",").'%',0,0,"R");
				 $pdf->Cell(15,5,($manu_total==0)?" ":number_format($manu_total,0,".",","),0,1,"R");

	        endforeach;
        $pdf->SetXY(5,$y+=4);
		$pdf->SetFont("Arial","B","8"); 
		$pdf->Cell(70,5,$query[0]->sumqty,0,1,"R");

if($withproduct==1):
            $pdf->SetXY(5,$y+=4);  
            $pdf->SetFont("Arial","","9");
			$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
			$pdf->SetXY(5,$y+=4);
			$pdf->SetFont("Arial","B","10"); 
			$pdf->Cell(40,5,'QUANTITIES BY ITEMS',0,1);
            $pdf->SetXY(5,$y+=3);
			$pdf->SetFont("Arial","","9");
			$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
			
			 
                       $this->db->select('product_id as pid');
                       $condition6 = ["status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))]; 
                      $this->db->group_by('product_id ');
                      $proddid = $this->Common_model->get_all("sales_order_details",$condition6)->result();
                     
                      $itemallqty=0;
                      $itemallprice=0;
                     foreach( $proddid as $prod):
                        $pid =  $prod->pid;
                        $this->db->select('product_name as pname');
                        $prodid = $this->Common_model->get_all("product_information",["id"=>$pid])->result();
 
                         foreach($prodid as $prodids):
                            $this->db->select('SUM(item_qty) as sumqty, SUM(total_price) as totlprice');
                            $condition7 = ["product_id"=>$pid,"status"=>1, "date(acc_date)>="=> date('Y-m-d', strtotime($fromdate)), "date(acc_date)<"=>  date('Y-m-d', strtotime($todate))]; 
                            $proddetails = $this->Common_model->get_all("sales_order_details",$condition7)->result();
                            
                            $itemallqty +=$proddetails[0]->sumqty;
                            $itemallprice +=$proddetails[0]->totlprice;
                            
                            
                            
                             $pdf->SetXY(5,$y+=4);
                    $pdf->SetFont("Arial","","7"); 
				     $pdf->Cell(40,5, substr($prodids->pname , 0,32),0,0,"L");
				 $pdf->Cell(15,5, $proddetails[0]->sumqty,0,0,"R");
				 $pdf->Cell(15,5,number_format($proddetails[0]->totlprice,2,".",","),0,1,"R");
			
                        endforeach;
                       ?>
                       <?php
                     endforeach;
                
                    $pdf->SetXY(5,$y+=4);
                    $pdf->SetFont("Arial","","7");
				    $pdf->Cell(40,5,"",0,0,"L");
				    $pdf->Cell(15,5,number_format($itemallqty,0,".",","),0,0,"R");
				    $pdf->Cell(15,5,number_format($itemallprice,2,".",","),0,1,"R");
				 
            endif;

        $pdf->SetXY(4,$y+=4);
		$pdf->SetFont("Arial","B","9");
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);
		$pdf->SetXY(5,$y+=4);
		$pdf->Cell(0,5,'Thank You!!! Come Again',0,1,'C');
		$pdf->SetXY(4,$y+=4);
		$pdf->Cell(0,5,'-------------------------------------------------------------------',0,1);

		// $pdf->Print(false);
		$pdf->Output();
	}
	
 
	
	public function stall_date_report()
	{
		$this->load->view('template/header');
		$this->load->view('report/stall_date_report');
		$this->load->view('template/footer');
	}
	public function stalldatereport()
	{
		$this->load->view('report/stall_date_rep');
	}
	
 

}