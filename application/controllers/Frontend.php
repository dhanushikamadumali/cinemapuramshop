<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {
    
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
        date_default_timezone_set("Asia/Colombo");
        $this->load->library('cart');
        // $this->Common_model->is_logged_in();
        
    }
    public function index()
    {
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/home');
        $this->load->view('frontend/template/footer');
        
    }
    
     public function ebill()
    {
        // $this->load->view('frontend/template/header');
        $this->load->view('frontend/bill');
        // $this->load->view('frontend/template/footer');
        
    }
    
     public function myorder()
    {
                        
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/myorder');
        $this->load->view('frontend/template/footer');
                        
    }
    
    public function view_myorder_ajax(){
                $this->load->library("Datatables");
                // $this->load->helper("datatable_helper");
                // $this->db->select('sales_order.*,customer_information.customer_name as cname,branch.branch_name as bname');
                // $this->db->join("customer_information","customer_information.id=sales_order.customer_id");
                // $this->db->join("branch","branch.id=sales_order.branch_id");
                //    $order = $this->Common_model->get_all('sales_order')->result();
                // $product =$this->db->query("SELECT product_information.*,manufacturer_information.manufacturer_name as mname,product_category.category_name as cname FROM product_information 
                //                             LEFT JOIN product_category ON product_category.id=product_information.category_id LEFT JOIN manufacturer_information ON manufacturer_information.id=product_information.manufacturer_id")->result();
                $this->datatables->select("	sales_order.id  as DT_RowId,
                                            sales_order.transaction_no as dtb_trno,
                                            sales_order.packaging_charge as dtb_pcharge,
                                            sales_order.total_amount as dtb_tamount,
                                            DATE_FORMAT(sales_order.sales_date,'%b ,%d %Y - %h:%i %p') as dtb_saledate,
                                            sales_order.order_type as dtb_otype,");				
                $this->datatables->from("sales_order");
                    $this->datatables->where(array("sales_order.customer_id"=> $this->session->userdata('cus_id')) );
                $this->datatables->add_column("renival_igGrt", "$1" ,"DT_RowId");
                echo $this->datatables->generate();

            }//End Purchase view datatable ajax
            public function getmyorderdetails(){
                // var_dump($this->input->post('id'));
	
                $this->db->select('sales_order.*,customer_information.customer_name as cname,sales_order_payment.payment_type as ptye');
                // $this->db->join('customer_information','customer_information.id = sales_order.customer_id',"left");
                $this->db->join("customer_information","customer_information.id=sales_order.customer_id","right");
                $this->db->join("sales_order_payment","sales_order_payment.order_id=sales_order.id");
                $sodetails = $this->Common_model->get_all('sales_order',["sales_order.id"=>$this->input->post('id')])->result();
                if(	$sodetails):
		
                ?>
                <div class="row">	
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">		
                            <div class="col-md-6 ">
                                Customer Name : <?=$sodetails[0]->cname?>
                            </div>
                            <div  class="col-md-6">
                                Transaction No : <?=$sodetails[0]->transaction_no?>
                            </div>
                            <div class="col-md-6">
                                Sale Date : <?=$sodetails[0]->sales_date?>
                            </div>	
                            <div class="col-md-6">
                                Payment Type : <?=$sodetails[0]->ptye?>
                            </div>	
                            <div class="col-md-6">
                                Order Type : <?=$sodetails[0]->order_type?>
                            </div>
                        </div>
			
                    </div>
		
                </div>
                <?php
                    endif;
                ?>
                <div class="row">&nbsp;</div>
                 <div class="row">
                 <!-- <table class="table mb-0" style="width:100%">
                     <thead>
                        <tr class="userDatatable-header">
                            <th>
                                <span class="userDatatable-title">Product Name</span>
                            </th>
                            <th>
                                <span class="userDatatable-title">Quantity</span>
                            </th>
                            <th>
                                <span class="userDatatable-title">Per Price</span>
                            </th>
                            <th>
                                <span class="userDatatable-title">Packaging Charge</span>
                            </th>                                     
                            <th>
                                <span class="userDatatable-title">Total Price</span>
                            </th>
			
                        </tr>
                    </thead>
                    <tbody> -->
                    <div class="userDatatable projectDatatable project-table bg-white w-100 border-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr class="userDatatable-header">
                                <th>
                                    <span class="projectDatatable-title">Product Name</span>
                                </th>
                                <th>
                                    <span class="projectDatatable-title">Quantity</span>
                                </th>
                                <th>
                                    <span class="projectDatatable-title">Per Price</span>
                                </th>
                                <th>
                                    <span class="projectDatatable-title">Packaging Charge</span>
                                </th>
					
                                <th>
                                    <span class="projectDatatable-title">Total Price</span>
                                </th>                       
                            </tr>
                        </thead>

                        <tbody class="tablebody">
                        <?php
                $mCounter=0;
                $this->db->select('sales_order_details.*,product_information.product_name as pname');
                $this->db->join("product_information","product_information.id=sales_order_details.product_id","right");
                $pname = $this->Common_model->get_all('sales_order_details',["sales_order_details.order_id"=>$this->input->post('id')])->result();
   
              //  $i=0; 
               foreach($pname as $prname):
                  // $mCounter++;
                  ?>

            <tr>
	
                <td>
                    <div class="userDatatable-content">
                    <!-- <input  type="text" placeholder="Batch ID" class="form-control table_pname " name="table_pname[]"  > -->
                    <span  ><?php echo $prname->pname ?></span>
                    </div>
                </td>
                <td>
                    <div class="userDatatable-content">
                    <!-- <input  type="text" placeholder="Qty" class="form-control table_qty " name="table_qty[]"  value="<?= $prname->item_qty ?>"> -->
                    <span ><?php echo $prname->item_qty ?></span>
                </div>
                </td>
									   
                <td>
                    <div class="userDatatable-content">
                        <!-- <input  type="text" placeholder="Price" class="form-control table_pprice " name="table_pprice[]"  value=""> -->
                        <span ><?php echo $prname->per_price ?></span>
                    </div>
                </td>
                <td>
                    <div class="userDatatable-content">
                    <!-- <input disabled  type="text" placeholder="Total Amount" class="form-control table_pcharge table_pcharge" name=""  value="<?= $prname->packaging_charge ?>"> -->
                    <!-- <input  type="hidden" placeholder="Total Amount" class="form-control table_pcharge " name="table_pcharge[]"  value=""> -->
                   <spsn><?= $prname->packaging_charge ?></spsn>
                    </div>
                </td>
                <td>
                    <div class="userDatatable-content">
                    <!-- <input  type="text" placeholder="Manufaturer Price" class="form-control table_tprice " name="table_tprice[]"  value="<?= ($prname->per_price* $prname->item_qty)+$prname->packaging_charge ?>"> -->
                   <span><?php echo ($prname->per_price* $prname->item_qty)+$prname->packaging_charge ?></span>
                    </div>
                </td>
              
                </tr>

                <?php
                    endforeach;
                ?>
                </tbody>
											

                  <tfoot>
                          <tr>
                          <td colspan="4">
                          <span style="margin-left: 50px;font-weight: bold">Sub Total</span>
                          </td>
                           <td>
                              <span ><?=  number_format($sodetails[0]->total_amount,"2",".",",")?></span>
                          </td>

                      </tr>
                      <tr>
                          <td colspan="4">
                          <span style="margin-left: 50px;font-weight: bold">Service Charge</span>
                          </td>
                           <td>
                              <span ><?= number_format($sodetails[0]->service_charge,"2",".",",")?></span>
                          </td>

                      </tr>
                      <tr>
                          <td colspan="4">
                          <span style="margin-left: 50px;font-weight: bold">Total Amount</span>
                          </td>
                           <td>
                              <span style="font-weight: bold"> <?= number_format($sodetails[0]->total_amount+$sodetails[0]->service_charge,"2",".",",")?></span>
                          </td>

                      </tr>
                  </tfoot>
              </table>
  
            </div>	


            <?php
 
     }
            
    public function product()
    {
        $data['resultscat'] = $this->Common_model->fetch_filter_typecategory();
        $data['resultsstall'] = $this->Common_model->fetch_filter_typestall();
        
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/product',$data);
        $this->load->view('frontend/template/footer');
        
    }
   public function fetch_data()
    {
       //var_dump($_POST);
        sleep(1);
        $minimum_price = $this->input->post('minimum_price');
        $maximum_price = $this->input->post('maximum_price');
        $stall = $this->input->post('stall');
        $category = ($this->input->post('category')!=null)?$this->input->post('category'):"";
        $category1 =($this->input->post('category1')!=null)?$this->input->post('category1'):"";
        $productname = $this->input->post('pname');
       
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = "#";
        $config['total_rows'] = $this->Common_model->count_all($minimum_price, $maximum_price,$stall, $category, $category1, $productname);
        // //var_dump($category);
        $config['per_page'] = 30;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul >';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link'] = '<<';
        $config['first_tag_open'] = '<li >';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = '>>';
        $config['last_tag_open'] = '<li >';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '>';
        $config['next_tag_open'] = '<li class="next" >';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '<';
        $config['prev_tag_open'] = '<li >';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="current" ><a  href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li >';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 3;
        
        
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config['per_page'];
        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'product_list'   => $this->Common_model->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price,$stall, $category, $category1, $productname)
        );
        // echo ($output);
        echo json_encode($output);
        
    }
    public function get_price(){
        $minpri=$this->db->query("SELECT MIN(manufacturer_price) AS min_price FROM product_information WHERE status=1")->result();
        $maxpri=$this->db->query("SELECT MAX(manufacturer_price) AS max_price FROM product_information WHERE status=1")->result();
        
        $data["min_price"]=($minpri)?$minpri[0]->min_price:0;
        $data["max_price"]=($maxpri)?$maxpri[0]->max_price:0;
        echo json_encode($data);
    }
    public function contact()
    {
        
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/contact');
        $this->load->view('frontend/template/footer');
        
    }
    
    public function cart()
    {
        
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/cart');
        $this->load->view('frontend/template/footer');
        
    }
    
    public function frontend_ajax(){
        $this->load->view('frontend/ajax');
    }//End POS_ajax
    // public function add_customer(){
        // 	$this->load->view('add_customer');
        // }
        
        
            
    //========================================================
    //================ Add to Cart Session ===================
    //========================================================
 
        public function add_to_cart() {
           
           // $this->session->unset_userdata('cart');
           
           $pid=$this->input->post('product_id'); 
           if(isset($_SESSION['cart'])):
               $is_in=false;
                foreach($_SESSION['cart'] as $product => $qty):
                    if($pid ==$product):
                        $qt=$_SESSION['cart'][$pid];
                        //echo "in product".$qt."<br>";
                        $_SESSION['cart'][$pid]=++$qt; 
                        $is_in=true;
                    endif;
                    
                endforeach;
                if($is_in==false): 
                    // echo "no product"."<br>";
                    $_SESSION['cart'][$pid]=1;
                endif;
           else:
                $data = array(
                    'cart'=>[]
                );
                $this->session->set_userdata($data); 
                 $_SESSION['cart'][$pid]=1;
           endif;
            $success['status'] = true; 
            $success['count'] = count($_SESSION['cart']); 
            echo json_encode($success);
           
    }

    public function remove_to_cart() {
                $pid=$this->input->post('product_id'); 
                if(isset($_SESSION['cart'])):
                    foreach($_SESSION['cart'] as $product => $qty):
                        if($pid ==$product):
                            $qt=$_SESSION['cart'][$pid]; 
                            $_SESSION['cart'][$pid]=--$qt;  
                        endif; 
                    endforeach;
                    
                endif;
                $success['status'] = true; 
            $success['count'] = count($_SESSION['cart']); 
            echo json_encode($success);
                    
    }
    public function remove_cart_item() {
                $pid=$this->input->post('product_id'); 
                if(isset($_SESSION['cart'])):
                   unset($_SESSION['cart'][$pid]);
                endif; 
                $success['status'] = true; 
            $success['count'] = count($_SESSION['cart']); 
            echo json_encode($success);
    }   
    //========================================================
    //================ End Add to Cart Session ===============
    //========================================================
    
    //========================================================
    //================ Table Booking =========================
    //========================================================
    public function tablebooking(){
                var_dump($this->input->get('table_no'));
                $data = array(
                    'table_id'=>$this->input->get('table_no')
                ); 
                $this->session->set_userdata($data); 
                header(location.redirect("shop")); 
            } 
    public function remove_table() {
                $pid=$this->input->post('product_id'); 
                if(isset($_SESSION['table_id'])):
                   unset($_SESSION['table_id']);
                endif; 
                $success['status'] = true; 
            $success['count'] = count($_SESSION['cart']); 
            echo json_encode($success);
    }   
    
    //========================================================
    //================ End Table Booking =====================
    //========================================================
     public function empty_cart() { 
        if(isset($_SESSION['cart'])):
           unset($_SESSION['cart']);
        endif; 
        $success['status'] = true; 
        $success['count'] = 0; 
        echo json_encode($success);
    }   
    
            public function login()
            {
                
                $this->load->view('frontend/template/header');
                $this->load->view('frontend/login');
                $this->load->view('frontend/template/footer');
                
            }
            public function customer_login() {
                
                // if ($this->input->post("login")):
                   
                    $this->form_validation->set_rules('uname', 'username', 'trim|required|callback_check_user_exists');
                    $this->form_validation->set_rules('pswrd', 'Password', 'trim|required');
                    $this->form_validation->set_message('check_user_exists', 'Invalid Username or Password!');
                    if ($this->form_validation->run()):
                        $this->db->where('email',$this->input->post('uname'));
                        $this->db->or_where("mobile",$this->input->post('uname'));
                        $user_details=$this->Common_model->get_all("customer_information")->result();
                        $user_insertID =$user_details[0]->id;
                        // var_dump();
                        if($user_insertID): 
                            $data = array(
                                'cus_id'=>$user_insertID
                            );
                            // var_dump($data);
                            $this->session->set_userdata($data); 
                        endif;
                       $success['status'] = true; 
                        echo json_encode($success);
                    else:
                        $error['status'] = false;
                        $error['uname'] = form_error("uname");
                        $error['pswrd'] = form_error("pswrd");
                        echo  json_encode($error);
                    endif;
                }
                
                //end admin login validation
                //check user exists
                public function check_user_exists() {
                    
                    $this->db->where('email',$this->input->post('uname'));
                    $this->db->or_where("mobile",$this->input->post('uname'));
                    $user_details=$this->Common_model->get_all("customer_information")->result();
                    // var_dump($user_details);
                    if ($user_details):
                        // echo 'callback';
                        // var_dump($user_details);
                        //decode and check system user password
                        // $ps = $this->Common_model->password_encode($this->input->post('password'));
                        // echo "udetails in";
                        //var_dump($this->encrypt->encode("ABC"));
                        //var_dump($this->encrypt->decode($this->encrypt->encode("ABC")));
                        //  var_dump($ps['password']);
                        //  var_dump(($user_details[0]->password));
                        //  var_dump($this->input->post('password'));
                        if ($user_details[0]->password == $this->input->post('pswrd')):
                            // echo "udetails pw";
                            // var_dump($user_details[0]->password);
                            return TRUE;
                        else:
                            return FALSE;
                        endif;
                    else:
                        return FALSE;
                    endif;
                }
                public function register()
                {
                    
                    $this->load->view('frontend/template/header');
                    $this->load->view('frontend/register');
                    $this->load->view('frontend/template/footer');
                    
                }
                public function register_customer()
                {
                    // if($this->input->post("func_n") == "ad_customer"):
                        
                        $this->form_validation->set_rules('cname', 'customer', "trim|required");
                        $this->form_validation->set_rules('address', 'Address', "trim");
                        $this->form_validation->set_rules('mobile', 'Mobile', "trim|required|is_unique[customer_information.mobile]");
                        $this->form_validation->set_rules('email', 'Email', "trim|required|is_unique[customer_information.email]");
                        $this->form_validation->set_rules('pswrd', 'Password', "trim|required");
                        
                        
                        if ($this->form_validation->run()):
                            #region ------- // create customer id
                            $cusquery = $this->db->query("SELECT * FROM customer_information ORDER BY id DESC LIMIT 1")->result();
                            
                            if($cusquery):
                                $exp_tranno_code = (explode("-", $cusquery[0]->customer_id));
                                $Eacc_number =  $exp_tranno_code[1];
                                $Eacc_number++;
                                $cId = "CUS".'-'.str_pad($Eacc_number, 3, "0", STR_PAD_LEFT);
                            else: 
                                $cId = "CUS".'-'."001";
                            endif;
                            // create acc id
                            $query = $this->db->query("SELECT * FROM acc_name ORDER BY id DESC LIMIT 1")->result();
                            if($query):
                                $exp_acc_code = (explode("-", $query[0]->acc_code));
                                $Eacc_code =  $exp_acc_code[1];
                                $Eacc_code++;
                                $lngth = strlen((string)$Eacc_code)+2;
                                $accCD = 'ACC-'.str_pad($Eacc_code, $lngth, "0", STR_PAD_LEFT);
                            else:
                                $accCD = 'ACC-'."001";
                            endif;
                            $acc_name_details = array("acc_categry"=> 1,
                            "acc_code"=> $accCD,
                            "account_name"=> "Customer Account -".$cId." ".$this->input->post("cname") ,
                            "description"=> $this->input->post("cname")
                        );
                        // get acc id
                        $this->Common_model->insert("acc_name", $acc_name_details);
                        $acc_name_insertID = $this->Common_model->getInsert_id();
                        $account_id = $acc_name_insertID;
                        $DateTime = date('Y-m-d H:i:s');
                        $add_customer_details = array(  "customer_id"=>$cId,
                        "customer_name"=>$this->input->post("cname"),
                        "address"=>$this->input->post("address"),
                        "mobile"=>$this->input->post("mobile"),
                        "status"=> 1,
                        "acc_id"=>$account_id,
                        "datetime"=> $DateTime,
                        "email"=>$this->input->post("email"),
                        "password"=>$this->input->post("pswrd")
                    );
                    
                    
                    $this->Common_model->insert("customer_information",$add_customer_details);
                    $success['status'] = true; 
                    echo json_encode($success);
                    
                else:
                    $error['status'] = false;
                    $error['cname'] = form_error("cname"); 	
                    $error['mobile'] = form_error("mobile"); 	
                    $error['uname'] = form_error("uname"); 
                    $error['pswrd'] = form_error("pswrd"); 	
                    echo json_encode($error);
                    
                endif;
                // endif;
            }
            
            public function logout(){
                
                $this->session->unset_userdata('cus_id');
                $this->session->sess_destroy();
                redirect(base_url().'index.php/login');
            }
            
    //         public function add_invoice2() {
    //              $success['status'] = true; 
    //                 $success["saleid"] = 1256325;
    //                 echo json_encode($success);
    //   }
       
       
            public function add_invoice(){
                    
                // // 	#region ------- Producs purchase Details -------
                // $this->form_validation->set_rules("table_pid[]" , "product id " ,"trim|required" );
                // $this->form_validation->set_rules("table_qty[]" , " product qty" ,"trim|required" );
                // $this->form_validation->set_rules("table_rt[]" , "product rate " ,"trim|required" );
                // $this->form_validation->set_rules("table_pr[]" , " product price" ,"trim|required" );
                
                if (true):
                    //             #region ------- Create Doube Entry Details 
                    $this->db->select('acc_id');
                    $customer_acc_id    = $this->Common_model->get_all('customer_information',['id'=>$this->session->userdata('cus_id')])->result();
                    
                    //             #region ------- // get bank commpany account id
                    $this->db->select('*');
                    $branch_details  = $this->Common_model->get_all('branch',['id'=>1])->result();
                    //             #region ------- // create transation number
                    $query = $this->db->query("SELECT * FROM sales_order ORDER BY id DESC LIMIT 1")->result();
                    if($query):
                        $exp_tranno_code = (explode("_", $query[0]->transaction_no));
                        $Eacc_number =  $exp_tranno_code[1];
                        $Eacc_number++;
                        $traNo = "SO". date('Ym').'_'.str_pad($Eacc_number, 5, "0", STR_PAD_LEFT); //$branch_details[0]->code.
                    else: 
                        $traNo = "SO". date('Ym').'_'."00001"; //$branch_details[0]->code.
                    endif;
                    //             #region ------- // insert sales order details
                    $DateTime = date('Y-m-d H:i:s');
                    
                    $this->db->limit(1);
                    $this->db->order_by("id","desc");
                    $accdate=$this->Common_model->get_all("cashier_open")->result();
                    
                    $subTotal=0;
                    $service_charge=0;
                    $packaging_charge=0;
                    $table_no=0;
                    $order_type='';
                        if(isset($_SESSION['cart'])):
                            foreach($_SESSION['cart'] as $key=>$value) :
                                $p_details = $this->Common_model->get_all('product_information',['id'=>$key])->result()[0];
                                if ($p_details):
                                     $subTotal+= $p_details->manufacturer_price * $value;
                                     $packaging_charge+=$p_details->package_charge * $value;
                                endif;
                            endforeach;
                        endif;
                    
                    
                    if($this->session->userdata('table_id')):
                      $service_charge=($subTotal*2)/100;
                       $packaging_charge=0;
                        $table_no=$this->session->userdata('table_id');
                         $order_type='dine-in';
                    else:
                        $service_charge=0; 
                         $order_type='take away';
                    endif;
                     
                    
                    $add_sales_order_details = array( 		 
                        "branch_id "=>1,
                        "transaction_no"=> $traNo,
                        "customer_id "=>$this->session->userdata('cus_id'),
                        "service_charge"=>$service_charge,
                        "packaging_charge"=> $packaging_charge,
                        "customer_paid"=>$subTotal+$service_charge+$packaging_charge,
                        "total_amount"=>$subTotal+$service_charge+$packaging_charge,
                        "sales_date"=> $DateTime,
                        "cr"=>$branch_details[0]->acc_sales_order,
                        "dr"=>$customer_acc_id[0]->acc_id,                                   
                        "status"=>0, 
                        "order_type"=>$order_type,
                        "token_number"=> $table_no,
                        "acc_date"=> $accdate[0]->acc_date,
                        "paid_status"=>0,
                        "portal"=>1
                    );
                    
                    $this->Common_model->insert("sales_order",  $add_sales_order_details);
                    $sales_order_insertID = $this->Common_model->getInsert_id();
                    
//             # region ------- // create transation number sales order payment
                    
                    $query1 = $this->db->query("SELECT * FROM sales_order_payment ORDER BY id DESC LIMIT 1")->result();
                    if($query1):
                        $exp_tranno_code = (explode("_", $query1[0]->transaction_no));
                        $Eacc_number =  $exp_tranno_code[1];
                        $Eacc_number++;
                        $traNo1 = $branch_details[0]->code."SP". date('Ym').'_'.str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
                    else: 
                        $traNo1 = $branch_details[0]->code."SP". date('Ym').'_'."0001";
                    endif;
                    
                    $DateTime = date('Y-m-d H:i:s');
                    $add_sales_order_payment_details = array( 	
                        "transaction_no"=> $traNo1,	 
                        "order_id "=>$sales_order_insertID ,
                        "date" => $DateTime,
                        "amount"=>$subTotal+$service_charge+$packaging_charge,
                        "payment_type"=>"bank",
                        "bank_id "=>1, 
                        "cr"=>10,  
                        "dr"=>$branch_details[0]->acc_sales_order,                               
                        "acc_remark"=>"Online Payment",
                        "acc_date"=> $accdate[0]->acc_date,
                        "status"=>0
                    );
                    
                    $this->Common_model->insert("sales_order_payment",  $add_sales_order_payment_details);
                     if(isset($_SESSION['cart'])):
                            foreach($_SESSION['cart'] as $key=>$value) :
                                $p_details = $this->Common_model->get_all('product_information',['id'=>$key])->result()[0];
                                if ($p_details):
                                    
                                if($this->session->userdata('table_id')): 
                                   $packaging_charge=0; 
                                else:
                                   $packaging_charge=$value *$p_details->package_charge;
                                endif;
                                      
                                $DateTime = date('Y-m-d H:i:s');
                                $sales_order_details_details = array(  
                                    "branch_id"=> 1,
                                    "order_id"=>$sales_order_insertID,
                                    "product_id"=>$key,
                                    "item_qty"=> $value,
                                    "per_price"=> $p_details->manufacturer_price,
                                    "packaging_charge"=> $packaging_charge,
                                    "total_price"=>$p_details->manufacturer_price*$value,
                                    "status"=> 0,
                                    "order_date"=> $DateTime,
                                    "acc_date"=> $accdate[0]->acc_date
                                );
                                $this->Common_model->insert("sales_order_details", $sales_order_details_details);
                        
                        
                        
                        
                        
                        
                        
                                $ppqty=$this->Common_model->get_all('product_purchase_details',['product_id '=>$key,'date(acc_date)'=>$accdate[0]->acc_date])->result();
                                if($ppqty):
                                    $updetails=array(
                                        "quantity"=>$ppqty[0]->quantity-$value,
                                        "sold_qty"=>$ppqty[0]->sold_qty+$value
                                    );
                                    $this->Common_model->update('product_purchase_details',$updetails,['product_id '=>$key,'date(acc_date)'=>$accdate[0]->acc_date]);
                                endif;
                                endif;
                            endforeach;
                        endif;
                    $success['status'] = true; 
                    $success["saleid"] = $sales_order_insertID;
                    echo json_encode($success);
                    
                else:
                    $error['status'] = false;
                    $error["errors"] = $this->form_validation->error_array();
                    echo json_encode($error);
                    
                    
                endif;
                
            }

            // public function order_callback()
            // {
                
               
                
            // }
       
      
            public function order_completion()
            {
                $this->load->view('frontend/template/header');
                $this->load->view('frontend/ordersuccessfully');
                $this->load->view('frontend/template/footer');
                                
            }
            public function termscondition()
            {
                                
                $this->load->view('frontend/template/header');
                $this->load->view('frontend/termsandcond');
                $this->load->view('frontend/template/footer');
                                
            }
            public function prypolcy()
            {
                                
                $this->load->view('frontend/template/header');
                $this->load->view('frontend/prypolycy');
                $this->load->view('frontend/template/footer');
                                
            }
            public function retunrefundpolcy()
            {
                                
                $this->load->view('frontend/template/header');
                $this->load->view('frontend/returnrefundpolicy');
                $this->load->view('frontend/template/footer');
                                
            }
            
            
        }
