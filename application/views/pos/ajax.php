<?php
if ($this->input->post("func_n") == "s_prdct"):
    $this->db->select('product_information.*,manufacturer_information.manufacturer_name as mname');
    $this->db->like('product_information.product_name', $this->input->post('srchTrm'));
    $this->db->join("manufacturer_information", "manufacturer_information.id=product_information.manufacturer_id", "right");
    $this->db->order_by("product_information.product_name", "asc");
    $product_information = $this->Common_model->get_all('product_information', ['product_information.status' => 1, 'manufacturer_information.shop_status' => 1])->result();
    ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height:100vh; overflow-y:scroll" >
        <div class="row">
            <?php
            if ($product_information):
                $this->db->limit(1);
                $this->db->order_by("id", "desc");
                $accdate = $this->Common_model->get_all("cashier_open")->result();

                foreach ($product_information as $information):
                    ?>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 productDiv" manu_price="<?= $information->manufacturer_price ?>"  table_pkcharge="<?= $information->package_charge ?>" prod_name="<?= $information->product_name ?>" id="<?= $information->id; ?>" style="padding:3px" >
                        <?php
                        $prod_count = $this->Common_model->get_all("product_purchase_details", ["product_id" => $information->id, "date(prod_date)" => $accdate[0]->acc_date])->result();
                        $proqty = ($prod_count) ? $prod_count[0]->quantity : 0;
                        ?>
                        <div class="product_card" style="<?php echo ($proqty <= 1) ? "border-color:red" : NULL ?>" >
                            <div class="product_name"><?= $information->product_name ?></div>
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-8" style="padding:0px">
                                        <div class="product_strenth"><?= $information->strength ?><?= $information->measure ?></div>      
                                        <div class="product_price" >Price : <?= $information->manufacturer_price ?></div>
                                        <?php
                                        $prod_count = $this->Common_model->get_all("product_purchase_details", ["product_id" => $information->id, "date(prod_date)" => $accdate[0]->acc_date])->result();
                                        ?>
                                        <div class="product_qty" >Qty :<?= ($prod_count) ? $prod_count[0]->quantity : 0 ?></div>       
                                    </div>    
                                </div>
                                <div class="row product_manu" >
                                    <?= $information->mname ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
    <?php
    if ($this->input->post('srchTrm')):

    else:
    //$error["error"] = true;
    //$error["errors"] = $this->form_validation->error_array();
    //echo json_encode($error);
    endif;
endif;

if ($this->input->post("func_n") == "m_prdct"):
    
    $this->db->select('product_information.*,manufacturer_information.manufacturer_name as mname');
    $this->db->join("manufacturer_information", "manufacturer_information.id=product_information.manufacturer_id", "right");
    $this->db->order_by("product_information.product_name", "asc");
    $product_information = $this->Common_model->get_all('product_information', ['product_information.status' => 1, 'product_information.manufacturer_id' => $this->input->post('clickTrm')])->result();

    ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height:100vh; overflow-y:scroll" >
        <div class="row">
            <?php
            if ($product_information):

                foreach ($product_information as $information):
                    ?>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 productDiv" manu_price="<?= $information->manufacturer_price ?>"  table_pkcharge="<?= $information->package_charge ?>" prod_name="<?= $information->product_name ?>" id="<?= $information->id; ?>" style="padding:3px" >
                        <?php
                        $prod_count = $this->Common_model->get_all("product_purchase_details", ["product_id" => $information->id, "date(prod_date)" => date("Y-m-d"),])->result();
                        $proqty = ($prod_count) ? $prod_count[0]->quantity : 0;
                        ?>
                        <div class="product_card" style="<?php echo ($proqty <= 1) ? "border-color:red" : NULL ?>" >
                            <div class="product_name"><?= $information->product_name ?></div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8" style="padding:0px">
                                        <div class="product_strenth"><?= $information->strength ?><?= $information->measure ?></div>
                                        <div class="product_price" >Price : <?= $information->manufacturer_price ?></div>
                                        <?php
                                        $prod_count = $this->Common_model->get_all("product_purchase_details", ["product_id" => $information->id, "date(prod_date)" => date("Y-m-d"),])->result();
                                        ?>
                                        <div class="product_qty" >Qty :<?= ($prod_count) ? $prod_count[0]->quantity : 0 ?></div>
                                    </div>
                                </div>
                                <div class="row product_manu" >
                                    <?= $information->mname ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
    <?php
    if ($this->input->post('srchTrm')):

    else:
    //$error["error"] = true;
    //$error["errors"] = $this->form_validation->error_array();
    //echo json_encode($error);
    endif;
endif;

if ($this->input->post("func_n") == "gt_product"):

    $pu_details = $this->db->query("SELECT product_purchase_details.*,product_information.id as prod_id,product_information.product_name FROM product_purchase_details 
	LEFT JOIN product_information ON product_information.id=product_purchase_details.product_id 
	WHERE  product_purchase_details.product_id =" . $this->input->post('pid') . " AND product_purchase_details.status = 1  GROUP BY product_purchase_details.manufacturer_price ")->result();

    if (count($pu_details) > 0):
        $success["product_status"] = 1;
        $success["product_arr"] = $pu_details;
        echo json_encode($success);
    else:
        $product_information = $this->Common_model->get_all("product_information", ["id" => $this->input->post('pid')])->result();
        $success["product_status"] = 0;
        $success["product_id"] = $this->input->post('pid');
        $success["product_name"] = $product_information[0]->product_name;
        $success["product_price"] = ($product_information != "") ? $product_information[0]->manufacturer_price : 0;
        echo json_encode($success);
    endif;

endif;

if ($this->input->post("func_n") == "get_barcode_product"):
    $pu_details = $this->db->query("SELECT product_purchase_details.*,product_information.id as prod_id,product_information.product_name FROM product_purchase_details 
	JOIN product_information ON product_information.id=product_purchase_details.product_id 
	WHERE  product_purchase_details.batch_id =" . $this->input->post('srchTrm') . " AND
	 product_purchase_details.status = 1")->result();
    if (count($pu_details) > 0):
        $success["product_status"] = 1;
        $success["product_arr"] = $pu_details;
        echo json_encode($success);
    else:
        $success["product_status"] = 0;
        echo json_encode($success);
    endif;
endif;

$func_n = "ad_inv";
if ($this->input->post("func_n") == $func_n):

    $this->form_validation->set_rules("in_pu_cus", "customer", "trim|required|numeric");
    $this->form_validation->set_rules("in_pu_branch", "branch", "trim|required");
    $this->form_validation->set_rules("in_pu_pytp", "payment type ", "trim|required");
    $this->form_validation->set_rules("in_pu_gtot", "total", "trim|required");
    $this->form_validation->set_rules("in_pu_totdsc", "discount", "trim|numeric");
    $this->form_validation->set_rules("in_pu_recive", "customer paid ", "trim|required|greater_than_equal_to[" . $this->input->post("in_pu_gtot") . "]");
// 	#region ------- Producs purchase Details -------
    $this->form_validation->set_rules("table_pid[]", "product id ", "trim|required");
    $this->form_validation->set_rules("table_prdct[]", " product name", "trim|required");
    $this->form_validation->set_rules("table_qty[]", " product qty", "trim|required");
    $this->form_validation->set_rules("table_rt[]", "product rate ", "trim|required");
    $this->form_validation->set_rules("table_pr[]", " product price", "trim|required");

    if ($this->form_validation->run()):
        $customerID="";
        $customer_mobile='';
        $customer_info = $this->Common_model->get_all('customer_information', ['mobile' => $this->input->post('in_pu_cus')])->result();

        if ($customer_info):
            $customerID=$customer_info[0]->id;
            $customer_mobile=$customer_info[0]->mobile;
        else:
//            $cusquery = $this->db->query("SELECT * FROM customer_information ORDER BY id DESC LIMIT 1")->result();
//            if ($cusquery):
//                $exp_tranno_code = (explode("-", $cusquery[0]->customer_id));
//                $Eacc_number = $exp_tranno_code[1];
//                $Eacc_number++;
//                $cId = "CUS" . '-' . str_pad($Eacc_number, 3, "0", STR_PAD_LEFT);
//            else:
//                $cId = "CUS" . '-' . "001";
//            endif;
            $customer_mobile=$this->input->post("in_pu_cus");
            $DateTime = date('Y-m-d H:i:s');
            $add_customer_details = array(
//                "customer_id" => $cId,
                "mobile" => $this->input->post("in_pu_cus"),
                "status" => 1,
                "acc_id" => 0,
                "datetime" => $DateTime);
            $this->Common_model->insert("customer_information", $add_customer_details);
            $customerID= $this->Common_model->getInsert_id();
        endif;

        #region ------- Create Doube Entry Details 
//        $this->db->select('acc_id');
//        $customer_acc_id = $this->Common_model->get_all('customer_information', ['id' => $this->input->post('in_pu_cus')])->result();
        #region ------- // get bank commpany account id
        $this->db->select('*');
        $branch_details = $this->Common_model->get_all('branch', ['id' => $this->input->post('in_pu_branch')])->result();
        #region ------- // create transation number
        $query = $this->db->query("SELECT * FROM sales_order WHERE transaction_no LIKE 'SO".date('Ym')."_%' ORDER BY id DESC LIMIT 1")->result();
        if ($query):
            $exp_tranno_code = (explode("_", $query[0]->transaction_no));
            $Eacc_number = $exp_tranno_code[1];
            $Eacc_number++;
            $traNo = "SO" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT); //$branch_details[0]->code.
        else:
            $traNo = "SO" . date('Ym') . '_' . "0001"; //$branch_details[0]->code.
        endif;
        #region ------- // insert sales order details
        $DateTime = date('Y-m-d H:i:s');

        $this->db->limit(1);
        $this->db->order_by("id", "desc");
        $accdate = $this->Common_model->get_all("cashier_open")->result();

        $add_sales_order_details = array(
            "branch_id " => $this->input->post("in_pu_branch"),
            "transaction_no" => $traNo,
            "customer_id" => $customerID,
            "total_discount" => $this->input->post("in_pu_totcpdsc"),
            "total_stall_discount" => $this->input->post("in_pu_totdsc"),
            "customer_paid" => $this->input->post("in_pu_recive"),
            "total_amount" => $this->input->post("in_pu_gtot"),
            "sales_date" => $DateTime,
            "cr" => $branch_details [0]->acc_sales_order,
            "dr" => $branch_details [0]->acc_customer,
            "add_by" => $this->session->userdata("user_id"),
            "status" => 1,
            "order_type" => $this->input->post("otype"),
            "token_number" => $this->input->post("tno"),
            "service_charge" => $this->input->post("servicechargeamount"),
            "delivery_charge" => $this->input->post("in_pu_deliverycharge"),
            "packaging_charge" => $this->input->post("in_pu_packagingcharge"),
            "acc_date" => $accdate[0]->acc_date
        );

        $this->Common_model->insert("sales_order", $add_sales_order_details);
        $sales_order_insertID = $this->Common_model->getInsert_id();

        # region ------- // create transation number sales order payment

        if ($this->input->post("in_pu_pytp") == 'cash') {

            $query1 = $this->db->query("SELECT * FROM sales_order_payment ORDER BY id DESC LIMIT 1")->result();
            if ($query1):
                $exp_tranno_code = (explode("_", $query1[0]->transaction_no));
                $Eacc_number = $exp_tranno_code[1];
                $Eacc_number++;
                $traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
            else:
                $traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . "0001";
            endif;

            $DateTime = date('Y-m-d H:i:s');
            $add_sales_order_payment_details = array(
                "transaction_no" => $traNo1,
                "order_id " => $sales_order_insertID,
                "date" => $DateTime,
                "amount" => $this->input->post("in_pu_gtot"),
                "payment_type" => $this->input->post("in_pu_pytp"),
                "bank_id " => $this->input->post("in_pu_bnk"),
                "cr" => $branch_details [0]->acc_cashin_hand,
                "dr" => $branch_details [0]->acc_sales_order,
                "add_by" => $this->session->userdata("user_id"),
                "acc_date" => $accdate[0]->acc_date
            );

            $this->Common_model->insert("sales_order_payment", $add_sales_order_payment_details);
        } else if ($this->input->post("in_pu_pytp") == 'bank') {

            $this->db->select('acc_id');
            $company_bank_acc_id = $this->Common_model->get_all('bank_company_accounts', ['id' => $this->input->post('in_pu_bnk')])->result();

            $query1 = $this->db->query("SELECT * FROM sales_order_payment ORDER BY id DESC LIMIT 1")->result();
            if ($query1):
                $exp_tranno_code = (explode("_", $query1[0]->transaction_no));
                $Eacc_number = $exp_tranno_code[1];
                $Eacc_number++;
                $traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
            else:
                $traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . "0001";
            endif;

            $DateTime = date('Y-m-d H:i:s');
            $add_sales_order_payment_details = array(
                "transaction_no" => $traNo1,
                "order_id " => $sales_order_insertID,
                "date" => $DateTime,
                "amount" => $this->input->post("in_pu_gtot"),
                "payment_type" => $this->input->post("in_pu_pytp"),
                "bank_id " => $this->input->post("in_pu_bnk"),
                "cr" => $company_bank_acc_id[0]->acc_id,
                "dr" => $branch_details [0]->acc_sales_order,
                "add_by" => $this->session->userdata("user_id"),
                "acc_date" => $accdate[0]->acc_date
            );

            $this->Common_model->insert("sales_order_payment", $add_sales_order_payment_details);
        }
        $details_array = new MultipleIterator();
       
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_pid")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_qty")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_pr")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_rt")));
        $details_array->attachIterator(new ArrayIterator(($this->input->post("table_btchid") != "") ? $this->input->post("table_btchid") : ""));
        $details_array->attachIterator(new ArrayIterator(($this->input->post("table_dscnt") != "") ? $this->input->post("table_dscnt") : ""));
        $details_array->attachIterator(new ArrayIterator(($this->input->post("table_pkcharge") != "") ? $this->input->post("table_pkcharge") : ""));
        
        #region ------- Product Purchase Details -------
        foreach ($details_array as $dtArray):

            $table_pid = $dtArray[0];
            $table_qty = $dtArray[1];
            $table_pr = $dtArray[2];
            $table_rt = $dtArray[3];
            $table_btchid = $dtArray[4];
            $table_dscnt = $dtArray[5];
            $table_pkcharge = $dtArray[6];
            $branchid = $this->input->post('in_pu_branch');

            $DateTime = date('Y-m-d H:i:s');
            $sales_order_details_details = array(
                "branch_id" => $branchid,
                "order_id" => $sales_order_insertID,
                "product_id" => $table_pid,
                "item_qty" => $table_qty,
                "per_price" => $table_pr,
                "packaging_charge" => $this->input->post("otype") == "dine-in" ? 0.00 : $table_pkcharge,
                "total_price" => $table_rt,
                "batch_id" => $table_btchid,
                "status" => 1,
                "discount" => $table_dscnt,
                "order_date" => $DateTime,
                "acc_date" => $accdate[0]->acc_date
            );
            $this->Common_model->insert("sales_order_details", $sales_order_details_details);
            $ppqty = $this->Common_model->get_all('product_purchase_details', ["product_id" => $table_pid, "date(acc_date)" => $accdate[0]->acc_date])->result();
            if ($ppqty):
                $updetails = array(
                    "quantity" => $ppqty[0]->quantity - $table_qty,
                    "sold_qty" => $ppqty[0]->sold_qty + $table_qty
                );
                $this->Common_model->update('product_purchase_details', $updetails, ["product_id" => $table_pid, "date(acc_date)" => $accdate[0]->acc_date]);
            endif;
        endforeach; //End Iterator Foreach


            if($customer_mobile!="0000000000"): //|| $customer_mobile!=""
           
            /* Endpoint */
            $url = 'https://e-sms.dialog.lk/api/v1/login';
            /* eCurl */
            $curl = curl_init($url);
            /* Data */
            $data = json_encode(["username" => "cinemapuramlk", "password" => "Sameera@123"]);

            /* Set JSON data to POST */
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            /* Define content type */
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            /* Return json */
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            /* make request */
            $result = curl_exec($curl);
            curl_close($curl);


            if(json_decode($result)->userData->walletBalance>2):
                    /* Endpoint */
                    $url = 'https://e-sms.dialog.lk/api/v1/sms';
                    /* eCurl */
                    $curl = curl_init($url);
                    /* Data *///Your order amount is :".$this->input->post("in_pu_gtot") $customer_mobile
                    $data = json_encode(["message" => "Thank you for ordering with Cinemapuram. See your E bill:".base_url()."index.php/ebill?id=".base64_encode($sales_order_insertID),
                            "transaction_id" => $sales_order_insertID,
                            "msisdn" => [
                                ["mobile"=> $customer_mobile]
                                ],
                        "push_notification_url"=> ""
                    ]);
                    /* Set JSON data to POST */
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    /* Define content type */
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Content-Type:application/json',
                        'Authorization:Bearer ' . json_decode($result)->token));
                    /* Return json */
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    /* make request */
                    $result = curl_exec($curl);
                    curl_close($curl);
            endif;
        endif;















        $success['status'] = true;
        $success["saleid"] = $sales_order_insertID;
        echo json_encode($success);

    else:
        $error['status'] = false;
        $error["errors"] = $this->form_validation->error_array();
        echo json_encode($error);

    endif;
endif;

$func_n = "bill_hold";
if ($this->input->post("func_n") == $func_n):

    $this->form_validation->set_rules("in_pu_cus", "customer", "trim|required");
    $this->form_validation->set_rules("in_pu_branch", "branch", "trim|required");
    $this->form_validation->set_rules("in_pu_pytp", "payment type ", "trim|required");
    $this->form_validation->set_rules("in_pu_gtot", "total", "trim|required");
    $this->form_validation->set_rules("in_pu_totdsc", "discount", "trim|numeric");
    $this->form_validation->set_rules("in_pu_recive", "customer paid ", "trim|greater_than_equal_to[" . $this->input->post("in_pu_gtot") . "]");
// 	#region ------- Producs purchase Details -------
    $this->form_validation->set_rules("table_pid[]", "product id ", "trim|required");
    $this->form_validation->set_rules("table_prdct[]", " product name", "trim|required");
    $this->form_validation->set_rules("table_qty[]", " product qty", "trim|required");
    $this->form_validation->set_rules("table_rt[]", "product rate ", "trim|required");
    $this->form_validation->set_rules("table_pr[]", " product price", "trim|required");

    if ($this->form_validation->run()):
        #region ------- Create Doube Entry Details 
        $this->db->select('acc_id');
        $customer_acc_id = $this->Common_model->get_all('customer_information', ['id' => $this->input->post('in_pu_cus')])->result();
        #region ------- // get bank commpany account id
        $this->db->select('*');
        $branch_details = $this->Common_model->get_all('branch', ['id' => $this->input->post('in_pu_branch')])->result();
        #region ------- // create transation number
        $query = $this->db->query("SELECT * FROM sales_order_hold ORDER BY id DESC LIMIT 1")->result();
        if ($query):
            $exp_tranno_code = (explode("_", $query[0]->transaction_no));
            $Eacc_number = $exp_tranno_code[1];
            $Eacc_number++;
            $traNo = $branch_details[0]->code . "SO" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
        else:
            $traNo = $branch_details[0]->code . "SO" . date('Ym') . '_' . "0001";
        endif;
        #region ------- // insert sales order details
        $DateTime = date('Y-m-d H:i:s');
        $add_sales_order_details = array(
            "branch_id " => $this->input->post("in_pu_branch"),
            "transaction_no" => $traNo,
            "customer_id " => $this->input->post("in_pu_cus"),
            "total_discount" => $this->input->post("in_pu_totdsc"),
            "customer_paid" => $this->input->post("in_pu_recive"),
            "total_amount" => $this->input->post("in_pu_gtot"),
            "sales_date" => $DateTime,
            "cr" => $branch_details [0]->acc_sales_order,
            "dr" => $customer_acc_id [0]->acc_id,
            "add_by" => $this->session->userdata("user_id"),
            "status" => 2,
            "order_type" => $this->input->post("otype"),
            "token_number" => $this->input->post("tno"),
        );

        $this->Common_model->insert("sales_order_hold", $add_sales_order_details);
        $sales_order_insertID = $this->Common_model->getInsert_id();

        # region ------- // create transation number sales order payment
        //   	if($this->input->post("in_pu_pytp") == 'cash'){
        // 		$query1 = $this->db->query("SELECT * FROM sales_order_payment ORDER BY id DESC LIMIT 1")->result();
        // 		if($query1):
        // 			$exp_tranno_code = (explode("_", $query1[0]->transaction_no));
        // 			$Eacc_number =  $exp_tranno_code[1];
        // 			$Eacc_number++;
        // 			$traNo1 = $branch_details[0]->code."SP". date('Ym').'_'.str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
        // 		else: 
        // 			$traNo1 = $branch_details[0]->code."SP". date('Ym').'_'."0001";
        // 		endif;
        // 		$DateTime = date('Y-m-d H:i:s');
        // 		$add_sales_order_payment_details = array( 	
        // 											"transaction_no"=> $traNo1,	 
        // 											"order_id "=>$sales_order_insertID ,
        // 											"date" => $DateTime,
        // 											"amount"=>$this->input->post("in_pu_gtot"),
        // 											"payment_type"=>$this->input->post("in_pu_pytp"),
        // 											"bank_id "=>$this->input->post("in_pu_bnk"), 
        // 											"cr"=>$branch_details [0]->acc_cashin_hand,  
        // 											"dr"=>$branch_details [0]->acc_sales_order,                               
        // 											"add_by"=>$this->session->userdata("user_id")
        // 											);
        // 		$this->Common_model->insert("sales_order_payment",  $add_sales_order_payment_details);
        //   }else{
        // 		$this->db->select('acc_id');
        // 		$company_bank_acc_id = $this->Common_model->get_all('bank_company_accounts',['id'=>$this->input->post('in_pu_bnk')])->result();
        // 		$query1 = $this->db->query("SELECT * FROM sales_order_payment ORDER BY id DESC LIMIT 1")->result();
        // 		if($query1):
        // 			$exp_tranno_code = (explode("_", $query1[0]->transaction_no));
        // 			$Eacc_number =  $exp_tranno_code[1];
        // 			$Eacc_number++;
        // 			$traNo1 = $branch_details[0]->code."SP". date('Ym').'_'.str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
        // 		else: 
        // 			$traNo1 = $branch_details[0]->code."SP". date('Ym').'_'."0001";
        // 		endif;
        // 		$DateTime = date('Y-m-d H:i:s');
        // 		$add_sales_order_payment_details = array( 	
        // 												"transaction_no"=> $traNo1,	 
        // 												"order_id "=>$sales_order_insertID ,
        // 												"date" => $DateTime,
        // 												"amount"=>$this->input->post("in_pu_gtot"),
        // 												"payment_type"=>$this->input->post("in_pu_pytp"),
        // 												"bank_id "=>$this->input->post("in_pu_bnk"), 
        // 												"cr"=>$company_bank_acc_id[0]->acc_id,  
        // 												"dr"=>$branch_details [0]->acc_sales_order,                               
        // 												"add_by"=>$this->session->userdata("user_id")
        // 											);
        // 		$this->Common_model->insert("sales_order_payment",  $add_sales_order_payment_details);
        //   }
        $details_array = new MultipleIterator();
        
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_pid")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_qty")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_pr")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_rt")));
        $details_array->attachIterator(new ArrayIterator(($this->input->post("table_btchid") != "") ? $this->input->post("table_btchid") : ""));
        $details_array->attachIterator(new ArrayIterator(($this->input->post("table_dscnt") != "") ? $this->input->post("table_dscnt") : ""));
        
        #region ------- Product Purchase Details -------
        foreach ($details_array as $dtArray):

            $table_pid = $dtArray[0];
            $table_qty = $dtArray[1];
            $table_pr = $dtArray[2];
            $table_rt = $dtArray[3];
            $table_btchid = $dtArray[4];
            $table_dscnt = $dtArray[5];
            $branchid = $this->input->post('in_pu_branch');
            $sales_order_details_details = array(
                "branch_id" => $branchid,
                "order_id" => $sales_order_insertID,
                "product_id" => $table_pid,
                "item_qty" => $table_qty,
                "per_price" => $table_pr,
                "total_price" => $table_rt,
                "batch_id" => $table_btchid,
                "status" => 2,
                "discount" => $table_dscnt,
            );
            $this->Common_model->insert("sales_order_hold_details", $sales_order_details_details);

            //  $ppqty=$this->Common_model->get_all('product_purchase_details',['product_id '=>$table_pid,'prod_date'=>date("Y-m-d")])->result();
            // if($ppqty):
            // 	$updetails=array(
            // 	"quantity"=>$ppqty[0]->quantity-$table_qty,
            // 	"sold_qty"=>$ppqty[0]->sold_qty+$table_qty
            // 	);
            // 	$this->Common_model->update('product_purchase_details',$updetails,['product_id '=>$table_pid,'prod_date'=>date("Y-m-d")]);
            // endif;
        endforeach; //End Iterator Foreach

        $success['status'] = true;
        // $success["saleid"] = $sales_order_insertID;
        echo json_encode($success);

    else:
        $error['status'] = false;
        $error["errors"] = $this->form_validation->error_array();
        echo json_encode($error);

    endif;
endif;

$func_n = "recallpos";
if ($this->input->post("func_n") == $func_n):

    $this->form_validation->set_rules("in_pu_cus", "customer", "trim|required");
    $this->form_validation->set_rules("in_pu_branch", "branch", "trim|required");
    $this->form_validation->set_rules("in_pu_pytp", "payment type ", "trim|required");
    $this->form_validation->set_rules("in_pu_gtot", "total", "trim|required");
    $this->form_validation->set_rules("in_pu_totdsc", "discount", "trim|numeric");
    $this->form_validation->set_rules("in_pu_recive", "customer paid ", "trim|required|greater_than_equal_to[" . $this->input->post("in_pu_gtot") . "]");
// 	#region ------- Producs purchase Details -------
    $this->form_validation->set_rules("table_pid[]", "product id ", "trim|required");
    $this->form_validation->set_rules("table_prdct[]", " product name", "trim|required");
    $this->form_validation->set_rules("table_qty[]", " product qty", "trim|required");
    $this->form_validation->set_rules("table_rt[]", "product rate ", "trim|required");
    $this->form_validation->set_rules("table_pr[]", " product price", "trim|required");

    if ($this->form_validation->run()):
        $orderid = $this->input->post('id');
        #region ------- Create Doube Entry Details 
        $this->db->select('acc_id');
        $customer_acc_id = $this->Common_model->get_all('customer_information', ['id' => $this->input->post('in_pu_cus')])->result();
        #region ------- // get bank commpany account id
        $this->db->select('*');
        $branch_details = $this->Common_model->get_all('branch', ['id' => $this->input->post('in_pu_branch')])->result();
        #region ------- // create transation number
        $query = $this->db->query("SELECT * FROM sales_order ORDER BY id DESC LIMIT 1")->result();
        if ($query):
            $exp_tranno_code = (explode("_", $query[0]->transaction_no));
            $Eacc_number = $exp_tranno_code[1];
            $Eacc_number++;
            $traNo = $branch_details[0]->code . "SO" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
        else:
            $traNo = $branch_details[0]->code . "SO" . date('Ym') . '_' . "0001";
        endif;
        #region ------- // insert sales order details
        $DateTime = date('Y-m-d H:i:s');
        $add_sales_order_details = array(
            "branch_id " => $this->input->post("in_pu_branch"),
            "transaction_no" => $traNo,
            "customer_id " => $this->input->post("in_pu_cus"),
            "total_discount" => $this->input->post("in_pu_totdsc"),
            "customer_paid" => $this->input->post("in_pu_recive"),
            "total_amount" => $this->input->post("in_pu_gtot"),
            "sales_date" => $DateTime,
            "cr" => $branch_details [0]->acc_sales_order,
            "dr" => $customer_acc_id [0]->acc_id,
            "add_by" => $this->session->userdata("user_id"),
            "status" => 1,
            "order_type" => $this->input->post("otype"),
            "token_number" => $this->input->post("tno"),
        );

        $this->Common_model->insert("sales_order", $add_sales_order_details);
        $sales_order_insertID = $this->Common_model->getInsert_id();
        $this->Common_model->delete("sales_order_hold", ["id" => $orderid]);
        $this->Common_model->delete("sales_order_hold_details", ["order_id" => $orderid]);

        # region ------- // create transation number sales order payment

        if ($this->input->post("in_pu_pytp") == 'cash') {

            $query1 = $this->db->query("SELECT * FROM sales_order_payment ORDER BY id DESC LIMIT 1")->result();
            if ($query1):
                $exp_tranno_code = (explode("_", $query1[0]->transaction_no));
                $Eacc_number = $exp_tranno_code[1];
                $Eacc_number++;
                $traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
            else:
                $traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . "0001";
            endif;

            $DateTime = date('Y-m-d H:i:s');
            $add_sales_order_payment_details = array(
                "transaction_no" => $traNo1,
                "order_id " => $sales_order_insertID,
                "date" => $DateTime,
                "amount" => $this->input->post("in_pu_gtot"),
                "payment_type" => $this->input->post("in_pu_pytp"),
                "bank_id " => $this->input->post("in_pu_bnk"),
                "cr" => $branch_details [0]->acc_cashin_hand,
                "dr" => $branch_details [0]->acc_sales_order,
                "add_by" => $this->session->userdata("user_id")
            );

            $this->Common_model->insert("sales_order_payment", $add_sales_order_payment_details);
        } else {

            $this->db->select('acc_id');
            $company_bank_acc_id = $this->Common_model->get_all('bank_company_accounts', ['id' => $this->input->post('in_pu_bnk')])->result();

            $query1 = $this->db->query("SELECT * FROM sales_order_payment ORDER BY id DESC LIMIT 1")->result();
            if ($query1):
                $exp_tranno_code = (explode("_", $query1[0]->transaction_no));
                $Eacc_number = $exp_tranno_code[1];
                $Eacc_number++;
                $traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
            else:
                $traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . "0001";
            endif;

            $DateTime = date('Y-m-d H:i:s');
            $add_sales_order_payment_details = array(
                "transaction_no" => $traNo1,
                "order_id " => $sales_order_insertID,
                "date" => $DateTime,
                "amount" => $this->input->post("in_pu_gtot"),
                "payment_type" => $this->input->post("in_pu_pytp"),
                "bank_id " => $this->input->post("in_pu_bnk"),
                "cr" => $company_bank_acc_id[0]->acc_id,
                "dr" => $branch_details [0]->acc_sales_order,
                "add_by" => $this->session->userdata("user_id")
            );

            $this->Common_model->insert("sales_order_payment", $add_sales_order_payment_details);
        }
        $details_array = new MultipleIterator();
       
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_pid")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_qty")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_pr")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_rt")));
        $details_array->attachIterator(new ArrayIterator(($this->input->post("table_btchid") != "") ? $this->input->post("table_btchid") : ""));
        $details_array->attachIterator(new ArrayIterator(($this->input->post("table_dscnt") != "") ? $this->input->post("table_dscnt") : ""));
       
        #region ------- Product Purchase Details -------
        foreach ($details_array as $dtArray):

            $table_pid = $dtArray[0];
            $table_qty = $dtArray[1];
            $table_pr = $dtArray[2];
            $table_rt = $dtArray[3];
            $table_btchid = $dtArray[4];
            $table_dscnt = $dtArray[5];
            $branchid = $this->input->post('in_pu_branch');
            $sales_order_details_details = array(
                "branch_id" => $branchid,
                "order_id" => $sales_order_insertID,
                "product_id" => $table_pid,
                "item_qty" => $table_qty,
                "per_price" => $table_pr,
                "total_price" => $table_rt,
                "batch_id" => $table_btchid,
                "status" => 1,
                "discount" => $table_dscnt,
            );
            $this->Common_model->insert("sales_order_details", $sales_order_details_details);
            $ppqty = $this->Common_model->get_all('product_purchase_details', ['product_id ' => $table_pid, 'prod_date' => date("Y-m-d")])->result();
            if ($ppqty):
                $updetails = array(
                    "quantity" => $ppqty[0]->quantity - $table_qty,
                    "sold_qty" => $ppqty[0]->sold_qty + $table_qty
                );
                $this->Common_model->update('product_purchase_details', $updetails, ['product_id ' => $table_pid, 'prod_date' => date("Y-m-d")]);
            endif;
        endforeach; //End Iterator Foreach
        $success['status'] = true;
        $success["saleid"] = $sales_order_insertID;
        echo json_encode($success);
    else:
        $error['status'] = false;
        $error["errors"] = $this->form_validation->error_array();
        echo json_encode($error);
    endif;
endif;

if ($this->input->post("func_n") == "get_customer"):
    $this->form_validation->set_rules('cusname', 'customer name', "trim|required");
    $this->form_validation->set_rules('cmobile', 'Mobile', "trim|required|is_unique[customer_information.mobile]");

    if ($this->form_validation->run()):
        #region ------- // create customer id
        $cusquery = $this->db->query("SELECT * FROM customer_information ORDER BY id DESC LIMIT 1")->result();

        if ($cusquery):
            $exp_tranno_code = (explode("-", $cusquery[0]->customer_id));
            $Eacc_number = $exp_tranno_code[1];
            $Eacc_number++;
            $cId = "CUS" . '-' . str_pad($Eacc_number, 3, "0", STR_PAD_LEFT);
        else:
            $cId = "CUS" . '-' . "001";
        endif;
        // create acc id
        $query = $this->db->query("SELECT * FROM acc_name ORDER BY id DESC LIMIT 1")->result();
        if ($query):
            $exp_acc_code = (explode("-", $query[0]->acc_code));
            $Eacc_code = $exp_acc_code[1];
            $Eacc_code++;
            $lngth = strlen((string) $Eacc_code) + 2;
            $accCD = 'ACC-' . str_pad($Eacc_code, $lngth, "0", STR_PAD_LEFT);
        else:
            $accCD = 'ACC-' . "001";
        endif;
        $acc_name_details = array("acc_categry" => 1,
            "acc_code" => $accCD,
            "account_name" => "Customer Account -" . $cId . " " . $this->input->post("cusname"),
            "description" => $this->input->post("cusname")
        );
        // get acc id
        $this->Common_model->insert("acc_name", $acc_name_details);
        $acc_name_insertID = $this->Common_model->getInsert_id();
        $account_id = $acc_name_insertID;
        $DateTime = date('Y-m-d H:i:s');
        $add_customer_details = array("customer_id" => $cId,
            "customer_name" => $this->input->post("cusname"),
            "mobile" => $this->input->post("cmobile"),
            "status" => 1,
            "acc_id" => $account_id,
            "datetime" => $DateTime
        );
        $this->Common_model->insert("customer_information", $add_customer_details);
        $success['cus_id'] = $this->Common_model->getInsert_id();
        $success['cus_name'] = $this->input->post("cusname");
        $success['status'] = true;
        echo json_encode($success);
    else:
        $error['status'] = false;
        $error['cname'] = form_error("cname");
        $error['cmobile'] = form_error("cmobile");
        echo json_encode($error);
    endif;
endif;

if ($this->input->post("func_n") == "get_bill_details"):
    $this->db->select('sales_order_hold_details.*,product_information.product_name as pname,product_information.package_charge as package_charge');
    $this->db->join("product_information", "product_information.id=sales_order_hold_details.product_id");
    $sales_order_details_res = $this->Common_model->get_all("sales_order_hold_details", array("order_id" => $this->input->post("bill_id")))->result();
    $sales_order = $this->Common_model->get_all("sales_order_hold", array("id" => $this->input->post("bill_id")))->result();
    if ($sales_order_details_res):
        $dscnts = 0;
        $count = 0;
        foreach ($sales_order_details_res as $dtailsArray):
            $sales_order_details[0] = $dtailsArray;
            ?>
            <tr class="cartrowitem" style="margin:0px">
                <td style=" padding-top: 0.85rem;padding-right: 0.20rem;padding-bottom: 0.85rem;padding-left: 0.40rem;">
                    <?php
                    if ($count == 0):
                        ?>
                        <input type="hidden" value="<?= $sales_order[0]->customer_id ?>" class="rccusname">
                        <input type="hidden" value="<?= $sales_order[0]->order_type ?>" class="rcotype"> 
                        <input type="hidden" value="<?= $sales_order[0]->token_number ?>" class="rctblno">
                        <?php
                    endif;
                    ?>
                    <input type="hidden" placeholder="" class="form-control in_id " name="table_id[]" >
                    <input type="hidden" placeholder="" class="form-control table_pid " name="table_pid[]"  value="<?= $sales_order_details[0]->product_id ?>">
                    <input class="form-control-plaintext a  text-left view table_prdct" name="table_prdct[]" id="table_prdct"  value="<?= $sales_order_details[0]->pname ?>"  style="font-size:small;width:190px;" readonly="readonly"></div>
            </td>
            <td>
                <div class="input-group" style="width:120px;height:auto">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text minus" value=""  style="border-radius: 15px;"><i class="fa fa-minus" ></i></button>
                    </div>
                    <div class='custom-file'>
                        <input  class="form-control-plaintext a text-center view table_qty"  id='table_qty' name='table_qty[]' value='<?= $sales_order_details[0]->item_qty ?>'   oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                    <div class="input-group-prepend qtyparent ">
                        <button class="input-group-text pluse" type="button"  value="" style="border-radius: 15px;" ><i class='fa fa-plus'></i></button>
                    </div>
                </div>
            </td>
            <td>
                <input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_pr" name="table_pr[]"  value="<?= $sales_order_details[0]->per_price ?>">
                <span class="err err_table_pr required" style="color:red;position:absolute;font-size:10px"></span>
            </td>
            <td class="pkchargecolumn">
                <input  type="hidden" class="form-control-plaintext a  text-center view hiddenpackagingcharge" name="hiddenpackagingcharge[]"  value="<?= $sales_order_details[0]->package_charge ?>" >
                <input  type="text" placeholder="Packaging" class="form-control-plaintext a  text-center view table_pkcharge" name="table_pkcharge[]"  value="<?= $sales_order_details[0]->package_charge * $sales_order_details[0]->item_qty ?>" >
                <span class="err err_table_pkcharge" style="color:red;position:absolute;font-size:10px"></span>
            </td>
            <td>
                <input  type="text" placeholder="Price" class="form-control-plaintext a  text-center view table_rt" name="table_rt[]"  value="<?= $sales_order_details[0]->total_price ?>" readonly>
                <span class="err err_table_rt required" style="color:red;position:absolute;font-size:10px"></span>
            </td>
            <td >
                <div style="padding-top: 0px;">
                    <a href='javascript:void(0)' style="padding-top: 6px;font-size:20px"  type="button" class="text-danger delete_butt"><i class="fas fa-times"></i></a>
                    <input  type="hidden" class="form-control table_dscnt" name="table_dscnt[]"  value="<?= $sales_order_details[0]->discount ?>">
                    <input  type="hidden" class="form-control table_btchid" name="table_btchid[]"  value="<?= $sales_order_details[0]->batch_id ?>">
                </div>
            </td>
            </tr>
            <?php
            $count++;
        endforeach;
    endif;
endif;

//====================================================================================================	
//============================ Cashier Open  Close ======================================	
//====================================================================================================	

if ($this->input->post("func_n") == "cashier_open"):
    $DateTime = date('Y-m-d H:i:s');
    $cashire_opendate = array(
        "acc_date" => date('Y-m-d'),
        "opendate " => $DateTime,
        "user_id" => $this->session->userdata("user_id")
    );
    $this->Common_model->insert("cashier_open", $cashire_opendate);
    $success['status'] = true;
    echo json_encode($success);
endif;

if ($this->input->post("func_n") == "cashier_close"):
    $query = $this->db->query("SELECT * FROM cashier_open ORDER BY id DESC LIMIT 1")->result();
    if ($query):
        $DateTime = date('Y-m-d H:i:s');
        $cashire_opendate = array("close_date " => $DateTime);
        $this->Common_model->update("cashier_open", $cashire_opendate, ['id' => $query[0]->id]);
    endif;
    $success['status'] = true;
    echo json_encode($success);
endif;

if ($this->input->post("func_n") == "get_select_date_sales_order"):
    ?>
    <tr> 
        <td>
            <b>Open Date</b>
        </td>
        <td >
            <b> Close Date</b>
        </td>
        <td>
            <b> Total</b>
        </td>
    </tr>             
    <?php
    $selectdate_details = $this->db->query('SELECT * FROM `cashier_open` WHERE DATE(opendate)="' . $this->input->post("selectdate") . '"')->result();
    $oddeven = 0;
    $ftotal = 0;
    $totalqty = 0;
    foreach ($selectdate_details as $sdetails):
        $salesdetails = $this->db->query('SELECT SUM(total_amount) as totprice FROM sales_order  WHERE sales_date>"' . $sdetails->opendate . '" AND sales_date<"' . $sdetails->close_date . '"')->result();
        $oddeven++;
        // $kot_details= $this->db->query('SELECT * FROM `sales_order_details` JOIN product_information as pi ON pi.id=sales_order_details.product_id WHERE order_id="'.$manu->order_id.'"')->result();
        ?>
        <tr style="font-size:13px;<?php echo ($oddeven % 2 == 1) ? "background-color:#ccc" : "background-color:#d9daf8" ?>"> 
            <td>
                <?= $sdetails->opendate ?>
            </td>
            <td >
                <?= $sdetails->close_date ?>
            </td> 
            <td >
                <?= $salesdetails[0]->totprice ?>
            </td>
        </tr>
        <?php
    endforeach;
endif;

if ($this->input->post("func_n") == "get_neworders"):
    $this->db->select("sales_order_details.id  as DT_RowId,
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
    $this->db->join('sales_order', 'sales_order.id=sales_order_details.order_id', "LEFT");
    $this->db->join('product_information', 'product_information.id=sales_order_details.product_id', "LEFT");
    // $this->datatables->order_by('id', "DESC");
    $this->db->where(['product_information.manufacturer_id' => 0, 'sales_order_details.delivery_status' => '0', 'sales_order_details.status' => '1']);
    $sods = $this->Common_model->get_all("sales_order_details")->result();
    // $this->db->add_column("renival_igGrt", "$1", "DT_RowId");
    if ($sods):
        ?>
        <div class="row" style="border:1px solid #ccc;padding:5px;font-weight:500">
            <div class="col-md-2" style="padding:0px"> Order ID </div>
            <div class="col-md-1" style="padding:0px"> TNO</div>
            <div class="col-md-6" style="padding:0px">Product Name</div>
            <div class="col-md-1" style="padding:0px">Qty</div>
            <div class="col-md-2" style="padding:0px">Od Type</div>
        </div>
        <?php
        foreach ($sods as $sod):
            ?> 
            <div class="row" style="border:1px solid #ccc;padding:5px">
                <div class="col-md-2" style="padding:0px"><?php echo explode("_", $sod->dtb_transno)[1]; ?></div>
                <div class="col-md-1" style="padding:0px"><?php echo $sod->dtb_sotblno ?></div>
                <div class="col-md-6" style="padding:0px"><?php echo $sod->dtb_prodName ?></div>
                <div class="col-md-1" style="padding:0px"><?php echo $sod->dtb_sodiqty ?></div>
                <div class="col-md-2" style="padding:0px"><?php echo $sod->dtb_otype ?></div>
                <div class="col-md-7" style="padding:0px"><?php echo $sod->dtb_Datdresf ?></div>
                <div class="col-md-5" style="padding:0px"><button type="button" class="btn btn-primary btn-default btn-squared px-30 " onclick="product('<?php echo $sod->DT_RowId ?>')">Delivered</button></div>
            </div>
            <?php
        endforeach;
    endif;
endif;

if ($this->input->post("func_n") == "get_customer_name"):
    $cusname = $this->Common_model->get_all("customer_information", ["mobile" => $this->input->post("cusmno")])->result();
    if ($cusname):
        $success["status"] = true;
        $success["cusname"] = $cusname[0]->customer_name;
        echo json_encode($success);
    else:
        $success["status"] = false;
        echo json_encode($success);
    endif;
endif;
