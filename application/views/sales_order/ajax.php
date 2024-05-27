<?php

if ($this->input->post("func_n") == "s_prdct") :
	$this->db->select('product_information.*,manufacturer_information.manufacturer_name as mname');
	$this->db->like('product_information.product_name', $this->input->post('srchTrm'));
	$this->db->join("manufacturer_information", "manufacturer_information.id=product_information.manufacturer_id", "right");
	$product_information = $this->Common_model->get_all('product_information', ['product_information.status' => 1])->result();
?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height:92vh; overflow-y:scroll">
		<div class="row">
			<?php
			if ($product_information) :
				foreach ($product_information as $information) :
			?>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 productDiv" manu_price="<?= $information->manufacturer_price ?>" prod_name="<?= $information->product_name ?>" id="<?= $information->id; ?>" style="padding:3px">
						<?php
						$prod_count = $this->Common_model->get_all("product_purchase_details", ["product_id" => $information->id, "date(prod_date)" => date("Y-m-d"),])->result();
						$proqty = ($prod_count) ? $prod_count[0]->quantity : 0;
						?>
						<div class="product_card" style="<?php echo ($proqty <= 1) ?  "border-color:red" : NULL ?>">
							<div class="product_name"><?= $information->product_name ?></div>
							<div class="col-md-12">

								<div class="row">
									<div class="col-md-8" style="padding:0px">
										<div class="product_strenth"><?= $information->strength ?><?= $information->measure ?></div>
										<div class="product_price">Price : <?= $information->manufacturer_price ?></div>
										<?php
										$prod_count = $this->Common_model->get_all("product_purchase_details", ["product_id" => $information->id, "date(prod_date)" => date("Y-m-d"),])->result();
										?>
										<div class="product_qty">Qty :<?= ($prod_count) ? $prod_count[0]->quantity : 0 ?></div>
									</div>
								</div>
								<div class="row product_manu">
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
	if ($this->input->post('srchTrm')) :

	else :
	//$error["error"] = true;
	//$error["errors"] = $this->form_validation->error_array();
	//echo json_encode($error);
	endif;
endif;

if ($this->input->post("func_n") == "m_prdct") :
	// var_dump($this->input->post('clickTrm'));
	$this->db->select('product_information.*,manufacturer_information.manufacturer_name as mname');
	$this->db->like('product_information.manufacturer_id', $this->input->post('clickTrm'));
	$this->db->join("manufacturer_information", "manufacturer_information.id=product_information.manufacturer_id", "right");
	$product_information = $this->Common_model->get_all('product_information', ['product_information.status' => 1])->result();

	// var_dump($product_information[0]->id);
	?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height:75vh; overflow-y:scroll">
		<div class="row">
			<?php
			if ($product_information) :
				foreach ($product_information as $information) :
			?>
					<!-- <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 productDiv" id="<?= $information->id; ?>" >
			<div class="product_card" >
			<div class="product_name"><?= $information->product_name ?></div>
			<div class="row">
			<div class="col-md-6">
			<div class="product_strenth"><?= $information->strength ?><?= $information->measure ?></div>
			
			<div class="product_price" ><?= $information->manufacturer_price ?></div>
			
			</div>
			<div class="col-md-6 ">
			<div class="product_image">
			<img src="<?php echo base_url() . "assets/content/product_images/" . $information->image  ?>" alt="<?= $information->product_name . " - " . $information->strength ?>" style="width:90%;  cursor: pointer;margin-top:0px;border-radius: 15px">
			</div>
			</div>
			</div>
			
			</div>
			</div> -->
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 productDiv" manu_price="<?= $information->manufacturer_price ?>" prod_name="<?= $information->product_name ?>" id="<?= $information->id; ?>" style="padding:3px">
						<?php
						$prod_count = $this->Common_model->get_all("product_purchase_details", ["product_id" => $information->id, "date(prod_date)" => date("Y-m-d"),])->result();
						$proqty = ($prod_count) ? $prod_count[0]->quantity : 0;
						?>
						<div class="product_card" style="<?php echo ($proqty <= 1) ?  "border-color:red" : NULL ?>">
							<div class="product_name"><?= $information->product_name ?></div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8" style="padding:0px">
										<div class="product_strenth"><?= $information->strength ?><?= $information->measure ?></div>
										<div class="product_price">Price : <?= $information->manufacturer_price ?></div>
										<?php
										$prod_count = $this->Common_model->get_all("product_purchase_details", ["product_id" => $information->id, "date(prod_date)" => date("Y-m-d"),])->result();
										?>
										<div class="product_qty">Qty :<?= ($prod_count) ? $prod_count[0]->quantity : 0 ?></div>
									</div>
								</div>
								<div class="row product_manu">
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
	if ($this->input->post('srchTrm')) :

	else :
	//$error["error"] = true;
	//$error["errors"] = $this->form_validation->error_array();
	//echo json_encode($error);
	endif;
endif;

if ($this->input->post("func_n") == "gt_product") :

	$pu_details = $this->db->query("SELECT product_purchase_details.*,product_information.id as prod_id,product_information.product_name FROM product_purchase_details 
	LEFT JOIN product_information ON product_information.id=product_purchase_details.product_id 
	WHERE  product_purchase_details.product_id =" . $this->input->post('pid') . " AND product_purchase_details.status = 1  GROUP BY product_purchase_details.manufacturer_price ")->result();

	if (count($pu_details) > 0) :
		$success["product_status"] = 1;
		$success["product_arr"] = $pu_details;
		echo json_encode($success);
	else :
		$product_information = $this->Common_model->get_all("product_information", ["id" => $this->input->post('pid')])->result();
		$success["product_status"] = 0;
		$success["product_id"] = $this->input->post('pid');
		$success["product_name"] = $product_information[0]->product_name;
		$success["product_price"] = ($product_information != "") ? $product_information[0]->manufacturer_price : 0;
		echo json_encode($success);
	endif;

endif;

if ($this->input->post("func_n") == "get_barcode_product") :
	$pu_details = $this->db->query("SELECT product_purchase_details.*,product_information.id as prod_id,product_information.product_name FROM product_purchase_details 
	JOIN product_information ON product_information.id=product_purchase_details.product_id 
	WHERE  product_purchase_details.batch_id =" . $this->input->post('srchTrm') . " AND
	product_purchase_details.status = 1")->result();
	if (count($pu_details) > 0) :
		$success["product_status"] = 1;
		$success["product_arr"] = $pu_details;
		echo json_encode($success);
	else :
		$success["product_status"] = 0;
		echo json_encode($success);
	endif;
endif;


if ($this->input->post("func_n") == "edit_inv") :

	// var_dump($_POST);

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

	if ($this->form_validation->run()) :

		$orderid = $this->input->post('id');

		$salesorder_details = $this->Common_model->get_all("sales_order", array("id" => $orderid))->result();

		if ($salesorder_details != NULL) :
			#region ------- Create Doube Entry Details 
			$this->db->select('acc_id');
			$customer_acc_id    = $this->Common_model->get_all('customer_information', ['id' => $this->input->post('in_pu_cus')])->result();
			#region ------- // get bank commpany account id
			$this->db->select('*');
			$branch_details  = $this->Common_model->get_all('branch', ['id' => $this->input->post('in_pu_branch')])->result();
			#region ------- // create transation number
			$query = $this->db->query("SELECT * FROM sales_order WHERE id='$orderid'")->result();
			if ($query) :
				$exp_tranno_code = (explode("_", $query[0]->transaction_no));
				$Eacc_number =  $exp_tranno_code[1];
				// $Eacc_number++;
				$traNo = "SO" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
			else :
				$traNo = "SO" . date('Ym') . '_' . "0001";
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
				"cr" => $branch_details[0]->acc_sales_order,
				"dr" => $customer_acc_id[0]->acc_id,
				"add_by" => $this->session->userdata("user_id"),
				"status" => 1,
				"order_type" => $this->input->post("otype"),
				"token_number" => $this->input->post("tno"),

			);

			$this->Common_model->update("sales_order", $add_sales_order_details, array("id" => $orderid));
			$this->Common_model->delete("sales_order_details", ["order_id" => $orderid]);

			# region ------- // create transation number sales order payment

			if ($this->input->post("in_pu_pytp") == 'cash') {

				$query1 = $this->db->query("SELECT * FROM sales_order_payment WHERE order_id='$orderid'")->result();
				if ($query1) :
					$exp_tranno_code = (explode("_", $query1[0]->transaction_no));
					$Eacc_number =  $exp_tranno_code[1];
					// $Eacc_number++;
					$traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
				else :
					$traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . "0001";
				endif;


				$DateTime = date('Y-m-d H:i:s');
				$add_sales_order_payment_details = array(
					"transaction_no" => $traNo1,
					"order_id " => $orderid,
					"date" => $DateTime,
					"amount" => $this->input->post("in_pu_gtot"),
					"payment_type" => $this->input->post("in_pu_pytp"),
					"bank_id " => $this->input->post("in_pu_bnk"),
					"cr" => $branch_details[0]->acc_cashin_hand,
					"dr" => $branch_details[0]->acc_sales_order,
					"add_by" => $this->session->userdata("user_id")
				);

				$this->Common_model->update("sales_order_payment",  $add_sales_order_payment_details, array("order_id" => $orderid));
				// $this->Common_model->update("sales_order",$add_sales_order_details,array("id"=>$orderid));

			} else {

				$this->db->select('acc_id');
				$company_bank_acc_id = $this->Common_model->get_all('bank_company_accounts', ['id' => $this->input->post('in_pu_bnk')])->result();

				$query1 = $this->db->query("SELECT * FROM sales_order_payment WHERE order_id='$orderid'")->result();
				if ($query1) :
					$exp_tranno_code = (explode("_", $query1[0]->transaction_no));
					$Eacc_number =  $exp_tranno_code[1];

					$traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
				else :
					$traNo1 = $branch_details[0]->code . "SP" . date('Ym') . '_' . "0001";
				endif;

				$DateTime = date('Y-m-d H:i:s');
				$add_sales_order_payment_details = array(
					"transaction_no" => $traNo1,
					"order_id " => $orderid,
					"date" => $DateTime,
					"amount" => $this->input->post("in_pu_gtot"),
					"payment_type" => $this->input->post("in_pu_pytp"),
					"bank_id " => $this->input->post("in_pu_bnk"),
					"cr" => $company_bank_acc_id[0]->acc_id,
					"dr" => $branch_details[0]->acc_sales_order,
					"add_by" => $this->session->userdata("user_id")
				);

				// $this->Common_model->insert("sales_order_payment",  $add_sales_order_payment_details);
				$this->Common_model->update("sales_order_payment",  $add_sales_order_payment_details, array("order_id" => $orderid));
			}
			$details_array = new MultipleIterator();
			// var_dump( $details_array);
			$details_array->attachIterator(new ArrayIterator($this->input->post("table_pid")));
			$details_array->attachIterator(new ArrayIterator($this->input->post("table_qty")));
			$details_array->attachIterator(new ArrayIterator($this->input->post("table_pr")));
			$details_array->attachIterator(new ArrayIterator($this->input->post("table_rt")));
			$details_array->attachIterator(new ArrayIterator(($this->input->post("table_btchid") != "") ? $this->input->post("table_btchid") : ""));
			$details_array->attachIterator(new ArrayIterator(($this->input->post("table_dscnt") != "") ? $this->input->post("table_dscnt") : ""));
			//  var_dump( $details_array);
			#region ------- Product Purchase Details -------
			foreach ($details_array as $dtArray) :
				$table_pid = $dtArray[0];
				$table_qty = $dtArray[1];
				$table_pr = $dtArray[2];
				$table_rt = $dtArray[3];
				$table_btchid = $dtArray[4];
				$table_dscnt = $dtArray[5];
				$branchid = $this->input->post('in_pu_branch');
				$sales_order_details_details = array(
					"branch_id" => $branchid,
					"order_id" => $orderid,
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
				if ($ppqty) :
					$updetails = array(
						"quantity" => $ppqty[0]->quantity - $table_qty,
						"sold_qty" => $ppqty[0]->sold_qty + $table_qty
					);
					$this->Common_model->update('product_purchase_details', $updetails, ['product_id ' => $table_pid, 'prod_date' => date("Y-m-d")]);
				endif;
			endforeach; //End Iterator Foreach

			$success['status'] = true;
			$success["saleid"] = $orderid;
			echo json_encode($success);

		else :
			$error['status'] = false;
			$error["errors"] = $this->form_validation->error_array();
			echo json_encode($error);


		endif;
	endif;


endif;
$func_n = "bill_hold";
if ($this->input->post("func_n") == $func_n) :

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

	if ($this->form_validation->run()) :
		#region ------- Create Doube Entry Details 
		$this->db->select('acc_id');
		$customer_acc_id    = $this->Common_model->get_all('customer_information', ['id' => $this->input->post('in_pu_cus')])->result();
		#region ------- // get bank commpany account id
		$this->db->select('*');
		$branch_details  = $this->Common_model->get_all('branch', ['id' => $this->input->post('in_pu_branch')])->result();
		#region ------- // create transation number
		$query = $this->db->query("SELECT * FROM sales_order ORDER BY id DESC LIMIT 1")->result();
		if ($query) :
			$exp_tranno_code = (explode("_", $query[0]->transaction_no));
			$Eacc_number =  $exp_tranno_code[1];
			$Eacc_number++;
			$traNo = $branch_details[0]->code . "SO" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
		else :
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
			"cr" => $branch_details[0]->acc_sales_order,
			"dr" => $customer_acc_id[0]->acc_id,
			"add_by" => $this->session->userdata("user_id"),
			"status" => 2,
			"order_type" => $this->input->post("otype"),
			"token_number" => $this->input->post("tno"),

		);

		$this->Common_model->insert("sales_order_hold",  $add_sales_order_details);
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
		// var_dump( $details_array);
		$details_array->attachIterator(new ArrayIterator($this->input->post("table_pid")));
		$details_array->attachIterator(new ArrayIterator($this->input->post("table_qty")));
		$details_array->attachIterator(new ArrayIterator($this->input->post("table_pr")));
		$details_array->attachIterator(new ArrayIterator($this->input->post("table_rt")));
		$details_array->attachIterator(new ArrayIterator(($this->input->post("table_btchid") != "") ? $this->input->post("table_btchid") : ""));
		$details_array->attachIterator(new ArrayIterator(($this->input->post("table_dscnt") != "") ? $this->input->post("table_dscnt") : ""));
		//  var_dump( $details_array);
		#region ------- Product Purchase Details -------
		foreach ($details_array as $dtArray) :

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

	else :
		$error['status'] = false;
		$error["errors"] = $this->form_validation->error_array();
		echo json_encode($error);


	endif;
endif;



//************************************************
//===================== Report stall Product Count 
//************************************************
if ($this->input->post("func_n") == "get_sales_report") :
	$mnY = explode("-", $this->input->post("mothyear"));
	$products = $this->Common_model->get_all("product_information", ["manufacturer_id" => $this->input->post("man")])->result();
	$monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1], $mnY[0]); // 31
	echo "<thead>";
	echo "<tr>";
	echo "<td style='width:450px'>Product Name</td>";
	for ($x = 1; $x <= $monthdates; $x++) :
		//$dvar="day".$x;
		// $dvar=0;
	?>
		<th style="<?php echo ($x % 2 == 0) ?: "background:#ccc" ?>"><?php echo $x ?></th>
	<?php
	endfor;
	echo  "	<th>Total</th></tr>";
	echo "</thead>";
	$odmy = $this->input->post("mothyear");
	echo "<tbody>";
	$mdate = 1;
	foreach ($products as $product) :
	?>
		<tr>
			<td style="width:450px"><?php echo $product->product_name ?></td>
			<?php
			$dvar = 0;
			for ($x = 1; $x <= $monthdates; $x++) :
				$dt = $odmy . "-" . $x;
				$prodcount = $this->db->query("SELECT SUM(item_qty) as qty from sales_order_details 
			where product_id=" . $product->id . " and date(acc_date)='" . $dt . "'")->result();

				$dvar += $prodcount[0]->qty ? intval($prodcount[0]->qty) : 0;
			?>
				<td style="<?php echo ($x % 2 == 0) ?: "background:#ccc" ?>"><?php echo  $prodcount[0]->qty  ?></td>
			<?php
			endfor;
			?>
			<th><?= $dvar ?></th>
		</tr>
		<?php
	endforeach;
	echo "</tbody> ";
endif;
//************************************************
//===================== Report Stall Sales 
//************************************************
if ($this->input->post("func_n") == "get_stole_report") :

	$mnY = explode("-", $this->input->post("mothyear"));
	$monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1], $mnY[0]); // 31
	$odmy = $this->input->post("mothyear");

	$date = '2022-12-18';
	//echo date('l', strtotime($date));

	//	die();

	echo "<tr>";
	echo "<td>Date</td>";
	echo "<td>stole</td>";
	echo "<td>Total</td>";
	echo "<td>18%</td>";
	echo "<td>Balance</td>";
	echo "</tr>";


	for ($x = 1; $x <= $monthdates; $x++) :
		$manus = $this->Common_model->get_all("manufacturer_information")->result();
		// var_dump($manus);
		foreach ($manus as $manu) :
			$prods = $this->Common_model->get_all("product_information", ["manufacturer_id" => $manu->id])->result();
			// var_dump($prods);
			$manu_total = 0;
			// var_dump($prodid);
			foreach ($prods as $prod) :
				$dt = $odmy . "-" . $x;
				$this->db->select("SUM(total_price) as pricesum");
				$prods = $this->Common_model->get_all("sales_order_details", ["date(acc_date)" => $dt, "product_id" => $prod->id, "status" => 1])->result();
				$manu_total += $prods[0]->pricesum;
			endforeach;
		?>
			<tr style="<?php echo ($x % 2 == 1) ? "background-color:#ccc" : NULL ?>">
				<td><?php echo $x ?></td>
				<td><?php echo $manu->manufacturer_name ?></td>
				<td><?php echo $manu_total ?></td>
				<td><?php echo ($manu_total * 18) / 100 ?></td>
				<td><?php echo $manu_total - (($manu_total * 18) / 100) ?></td>
			</tr>
		<?php
		endforeach;
	endfor;
endif;

if ($this->input->post("func_n") == "get_sales_weekly") :

	$mnY = explode("-", $this->input->post("mothyear"));
	$monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1], $mnY[0]); // 31
	$odmy = $this->input->post("mothyear");


	$success['status'] = true;
	$success["monthyear"] = $odmy;
	echo json_encode($success);





endif;

if ($this->input->post("func_n") == "get_sales_dailly") :

	$twodate = (($this->input->post("fromdate")) . "*" . ($this->input->post("todate")));

	// $monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1],$mnY[0]); // 31
	// $odmy=$this->input->post("mothyear");


	$success['status'] = true;
	$success["twodate"] = $twodate;
	echo json_encode($success);


endif;


if ($this->input->post("func_n") == "delete_sales_order") :

	$so_details = $this->Common_model->get_all("sales_order", array("id" => $this->input->post("id")))->result();

	if ($so_details !== "") :
		$sop_details = $this->Common_model->get_all("sales_order_payment", array("order_id" => $this->input->post("id")))->result();

		if ($sop_details !== "") :
			$sod_details = $this->Common_model->get_all("sales_order_details", array("order_id" => $this->input->post("id")))->result();

			if ($sod_details !== "") :
				$update_order_status = array("status" => 0);
				$this->Common_model->update("sales_order", $update_order_status, array('id' => $this->input->post("id")));
				$this->Common_model->update("sales_order_payment", $update_order_status, array('order_id' => $this->input->post("id")));
				$this->Common_model->update("sales_order_details", $update_order_status, array('order_id' => $this->input->post("id")));

			endif;
		endif;
	endif;

endif;

if ($this->input->post("func_n") == "sales_order_product") :

	$this->db->select('sales_order.*,customer_information.customer_name as cname,sales_order_payment.payment_type as ptye');
	// $this->db->join('customer_information','customer_information.id = sales_order.customer_id',"left");
	$this->db->join("customer_information", "customer_information.id=sales_order.customer_id", "right");
	$this->db->join("sales_order_payment", "sales_order_payment.order_id=sales_order.id");
	$sodetails = $this->Common_model->get_all('sales_order', ["sales_order.id" => $this->input->post('id')])->result();
	if ($sodetails) :
		?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-md-6 mb-4">
						Customer Name : <?= $sodetails[0]->cname ?>
					</div>
					<div class="col-md-6 mb-4">
						Transaction No : <?= $sodetails[0]->transaction_no ?>
					</div>
					<div class="col-md-6 mb-4">
						Sale Date : <?= $sodetails[0]->sales_date ?>
					</div>
					<div class="col-md-6 mb-4">
						Payment Type : <?= $sodetails[0]->ptye ?>
					</div>
					<div class="col-md-6 mb-4">
						Order Type : <?= $sodetails[0]->order_type ?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
	?>
	<div class="row">&nbsp;</div>
	<div class="row">
		<table class="table mb-0" style="width:100%">
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
			<tbody>
				<?php
				$mCounter = 0;
				$this->db->select('sales_order_details.*,product_information.product_name as pname');
				$this->db->join("product_information", "product_information.id=sales_order_details.product_id", "right");
				$pname = $this->Common_model->get_all('sales_order_details', ["order_id" => $this->input->post('id')])->result();
				$stotal = 0;
				$pkgtotal = 0;
				foreach ($pname as $prname) :
					// $mCounter++;
				?>
					<tr style="<?php echo ($prname->status != 1) ? "background-color:#ffc9c9" : "" ?>">
						<td>
							<div class="d-flex">
								<div class="userDatatable-inline-title">
									<a href="#" class="text-dark fw-500">
										<h6> <?= $prname->pname ?></h6>
									</a>
								</div>
							</div>
						</td>
						<td>
							<div class="d-flex">
								<div class="userDatatable-inline-title">
									<a href="#" class="text-dark fw-500">
										<h6> <?= $prname->item_qty ?></h6>
									</a>
								</div>
							</div>
						</td>
						<td>
							<div class="d-flex">
								<div class="userDatatable-inline-title">
									<a href="#" class="text-dark fw-500">
										<h6> <?= $prname->per_price ?></h6>
									</a>
								</div>
							</div>
						</td>
						<td>
							<div class="d-flex">
								<div class="userDatatable-inline-title">
									<a href="#" class="text-dark fw-500">
										<h6> <?= $prname->packaging_charge;
												$pkgtotal += ($prname->status == 1) ? $prname->packaging_charge : 0; ?></h6>
									</a>
								</div>
							</div>
						</td>
						<td>
							<div class="d-flex">
								<div class="userDatatable-inline-title">
									<a href="#" class="text-dark fw-500">
										<h6> <?= ($prname->per_price * $prname->item_qty) + $prname->packaging_charge;
												$stotal += ($prname->status == 1) ? ($prname->per_price * $prname->item_qty) : 0
												?></h6>
									</a>
								</div>
							</div>
						</td>
					</tr>
					<!-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <i class="fa fa-circle" style="color: #99b3ff;"></i><span style="color: #333333"><?php echo " " ?><?php echo $prname->pname ?></span>
                         </div> -->
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
						<span><?= number_format($stotal, "2", ".", ",") ?></span>
					</td>
				</tr>
				<?php
				if ($sodetails[0]->order_type == "dine-in") :
				?>
					<tr>
						<td colspan="4">
							<span style="margin-left: 50px;font-weight: bold">Service Charge</span>
						</td>
						<td>
							<span><?= number_format(($sodetails[0]->status == 1) ? $sodetails[0]->service_charge : 0, "2", ".", ",") ?></span>
						</td>
					</tr>
				<?php
				else :
				?>
					<tr>
						<td colspan="4">
							<span style="margin-left: 50px;font-weight: bold">Delivery Charge</span>
						</td>
						<td>
							<span><?= number_format(($sodetails[0]->status == 1) ? $sodetails[0]->delivery_charge : 0, "2", ".", ",") ?></span>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<span style="margin-left: 50px;font-weight: bold">Packaging Charge</span>
						</td>
						<td>
							<span><?= number_format($pkgtotal, "2", ".", ",") ?></span>
						</td>
					</tr>
				<?php
				endif;
				?>
				<tr>
					<td colspan="4">
						<span style="margin-left: 50px;font-weight: bold">Total Amount</span>
					</td>
					<td>
						<span style="font-weight: bold"> <?= number_format($stotal + (($sodetails[0]->status == 1) ? $sodetails[0]->service_charge : 0) + $pkgtotal + (($sodetails[0]->status == 1) ? $sodetails[0]->delivery_charge : 0), "2", ".", ",") ?></span>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
	<?php
endif;







if ($this->input->post("func_n") == "voide_sales_order_product") :
	$this->db->select('sales_order.*,customer_information.customer_name as cname,sales_order_payment.payment_type as ptye');
	// $this->db->join('customer_information','customer_information.id = sales_order.customer_id',"left");
	$this->db->join("customer_information", "customer_information.id=sales_order.customer_id", "right");
	$this->db->join("sales_order_payment", "sales_order_payment.order_id=sales_order.id");
	$sodetails = $this->Common_model->get_all('sales_order', ["sales_order.id" => $this->input->post('id')])->result();
	if ($sodetails) :
	?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-md-6 mb-4">
						Customer Name : <?= $sodetails[0]->cname ?>
					</div>
					<div class="col-md-6 mb-4">
						Transaction No : <?= $sodetails[0]->transaction_no ?>
					</div>
					<div class="col-md-6 mb-4">
						Sale Date : <?= $sodetails[0]->sales_date ?>
					</div>
					<div class="col-md-6 mb-4">
						Payment Type : <?= $sodetails[0]->ptye ?>
					</div>
					<div class="col-md-6 mb-4">
						Order Type : <?= $sodetails[0]->order_type ?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
	?>
	<div class="row">&nbsp;</div>
	<div class="row">
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
						$mCounter = 0;
						$this->db->select('sales_order_details.*,product_information.product_name as pname');
						$this->db->join("product_information", "product_information.id=sales_order_details.product_id", "right");
						$pname = $this->Common_model->get_all('sales_order_details', ["sales_order_details.order_id" => $this->input->post('id'), "sales_order_details.status" => '1'])->result();
						$stotal = 0;
						$pkgtotal = 0;
						foreach ($pname as $prname) :
						?>
							<tr>
								<td>
									<div class="userDatatable-content">
										<input readonly type="text" placeholder="Batch ID" class="form-control table_pname " name="table_pname[]" value="<?= $prname->pname ?>">
										<span class="err err_table_btchid required" style="font-size:10px;color: #F5576C;position:absolute;"></span>
									</div>
								</td>
								<td>
									<div class="userDatatable-content">
										<input readonly type="text" placeholder="Qty" class="form-control table_qty " name="table_qty[]" value="<?= $prname->item_qty ?>">
										<span class="err err_table_qty required" style="font-size:10px;color: #F5576C;position:absolute;"></span>
									</div>
								</td>
								<td>
									<div class="userDatatable-content">
										<input readonly type="text" placeholder="Price" class="form-control table_pprice " name="table_pprice[]" value="<?= $prname->per_price ?>">
										<span class="err err_table_pprice required" style="font-size:10px;color: #F5576C;position:absolute;"></span>
									</div>
								</td>
								<td>
									<div class="userDatatable-content">
										<input disabled type="text" placeholder="Total Amount" class="form-control table_pcharge table_pcharge" name="" value="<?= $prname->packaging_charge ?>">
										<?php $pkgtotal += ($prname->status == 1) ? $prname->packaging_charge : 0; ?>
										<input type="hidden" placeholder="Total Amount" class="form-control table_pcharge " name="table_pcharge[]" value="">
									</div>
								</td>
								<td>
									<div class="userDatatable-content">
										<input readonly type="text" placeholder="Manufaturer Price" class="form-control table_tprice " name="table_tprice[]" value="<?= ($prname->per_price * $prname->item_qty) + $prname->packaging_charge ?>">
										<?php $stotal += ($prname->status == 1) ? ($prname->per_price * $prname->item_qty) : 0 ?>
									</div>
								</td>
								<td>
									<div class="userDatatable-content">
										<a href='' style="padding-top: 6px;font-size:20px" type="button" class="text-danger void_delete_butt" prodid="<?php echo $prname->product_id ?>" order_id="<?php echo $prname->order_id ?>"><i class="fas fa-times"></i></a>
									</div>
								</td>
							</tr>
						<?php
						endforeach;
						?>
						<tr>
							<td colspan="5">

								<span class="delete_error" style="color:red"></span>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4">
								<span style="margin-left: 50px;font-weight: bold">Sub Total</span>
							</td>
							<td>
								<span><?= number_format($stotal, "2", ".", ",") ?></span>
							</td>
						</tr>
						<?php
						if ($sodetails[0]->order_type == "dine-in") :
						?>
							<tr>
								<td colspan="4">
									<span style="margin-left: 50px;font-weight: bold">Service Charge</span>
								</td>
								<td>
									<span><?= number_format(($sodetails[0]->status == 1) ? $sodetails[0]->service_charge : 0, "2", ".", ",") ?></span>
								</td>
							</tr>
						<?php
						else :
						?>
							<tr>
								<td colspan="4">
									<span style="margin-left: 50px;font-weight: bold">Delivery Charge</span>
								</td>
								<td>
									<span><?= number_format(($sodetails[0]->status == 1) ? $sodetails[0]->delivery_charge : 0, "2", ".", ",") ?></span>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<span style="margin-left: 50px;font-weight: bold">Packaging Charge</span>
								</td>
								<td>
									<span><?= number_format($pkgtotal, "2", ".", ",") ?></span>
								</td>
							</tr>
						<?php
						endif;
						?>
						<tr>
							<td colspan="4">
								<span style="margin-left: 50px;font-weight: bold">Total Amount</span>
							</td>
							<td>
								<span style="font-weight: bold"> <?= number_format($stotal + (($sodetails[0]->status == 1) ? $sodetails[0]->service_charge : 0) + $pkgtotal + (($sodetails[0]->status == 1) ? $sodetails[0]->delivery_charge : 0), "2", ".", ",") ?></span>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
<?php
endif;


if ($this->input->post("func_n") == "delete_void_sales_order_product") :

	//var_dump($_POST);
	$this->db->order_by("payment_type", "ASC");
	$sop_details = $this->Common_model->get_all("sales_order_payment", array("order_id" => $this->input->post("orderId")))->result();

	if (count($sop_details) == 1) :

		$this->Common_model->update("sales_order_details", ["status" => 0], array("order_id" => $this->input->post("orderId"), "product_id" => $this->input->post("ProductId")));

		$so_details = $this->Common_model->get_all("sales_order", array("id" => $this->input->post("orderId")))->result();
		$sod_details = $this->db->query("SELECT SUM(total_price) AS totprice,SUM(packaging_charge) AS pkgchrg, SUM(discount) AS linedisc FROM sales_order_details  WHERE order_id=" . $this->input->post("orderId") . " AND status='1'")->result();
		$servicecharge = (($sod_details[0]->totprice) * 2) / 100;
		$opfinaltotal = 0;
		if ($so_details[0]->order_type == "dine-in") :
			$updetails = array(
				"service_charge" => $servicecharge,
				"total_stall_discount" => $sod_details[0]->linedisc,
				"total_amount" => $sod_details[0]->totprice + $servicecharge - ($sod_details[0]->linedisc + $so_details[0]->total_discount)
			);
			$opfinaltotal = $sod_details[0]->totprice + $servicecharge - ($sod_details[0]->linedisc + $so_details[0]->total_discount);
			// var_dump($updetails);
			$this->Common_model->update('sales_order', $updetails, ['id ' => $this->input->post("orderId")]);
		else :
			$updetails = array(
				"total_stall_discount" => $sod_details[0]->linedisc,
				"packaging_charge" => $sod_details[0]->pkgchrg,
				"total_amount" => $sod_details[0]->totprice + $so_details[0]->delivery_charge + $sod_details[0]->pkgchrg - ($sod_details[0]->linedisc + $so_details[0]->total_discount)
			);
			$opfinaltotal = $sod_details[0]->totprice + $so_details[0]->delivery_charge + $sod_details[0]->pkgchrg - ($sod_details[0]->linedisc + $so_details[0]->total_discount);
			// var_dump($updetails);
			$this->Common_model->update('sales_order', $updetails, ['id ' => $this->input->post("orderId")]);
		endif;

		if ($sop_details[0]->payment_type == "cash") :
			$this->Common_model->update("sales_order_payment", ["amount" => $opfinaltotal], ["id" => $sop_details[0]->id]);
		else :
			$this->Common_model->update("sales_order_payment", ["amount" => $opfinaltotal], ["id" => $sop_details[0]->id]);
		endif;


		$success["status"] = true;
		echo json_encode($success);


	else :
		//errormsg
		$error["status"] = false;
		$error["message"] = "More than 1 payment Please contact Admin";
		echo json_encode($error);
	endif;


//            
// 
//            $uppayment = array("amount" => $query[0]->totprice + $servicecharge + $packagecharge); 
//            $this->Common_model->update("sales_order_payment", $uppayment, array('order_id' => $this->input->post("orderId")));
// 
//            $this->Common_model->update("sales_order_payment", $uppayment, array('order_id' => $this->input->post("orderId")));

endif;



//**********************
//******** Sales Chart Dashboard *******
//**********************

if ($this->input->post("func_n") == "db_chart1") :


	$mnY = explode("-", date("Y-m"));
	$monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1], $mnY[0]); // 31
	$odyear = $mnY[0];
	$odmnth = $mnY[1];
	$pricelist1 = '';
	for ($x = 1; $x <= $monthdates; $x++) :
		$amts = $this->db->query("SELECT SUM(total_amount)as tamt FROM sales_order WHERE acc_date='" . $odyear . "-" . $odmnth . "-" . $x . "' AND status='1'")->result();
		$pricelist1 .= (!is_null($amts[0]->tamt)) ? $amts[0]->tamt . "," :   "0,";
	endfor;

	$newdate = date("Y-m", strtotime("-1 months"));
	$mnY = explode("-", $newdate);
	$monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1], $mnY[0]); // 31
	$odyear = $mnY[0];
	$odmnth = $mnY[1];
	$pricelist2 = '';
	for ($x = 1; $x <= $monthdates; $x++) :
		$amts = $this->db->query("SELECT SUM(total_amount)as tamt FROM sales_order WHERE acc_date='" . $odyear . "-" . $odmnth . "-" . $x . "' AND status='1'")->result();
		$pricelist2 .= (!is_null($amts[0]->tamt)) ? $amts[0]->tamt . "," :   "0,";
	// echo  $this->db->last_query();
	endfor;

	$newdate = date("Y-m", strtotime("-2 months"));
	$mnY = explode("-", $newdate);
	$monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1], $mnY[0]); // 31
	$odyear = $mnY[0];
	$odmnth = $mnY[1];
	$pricelist3 = '';
	for ($x = 1; $x <= $monthdates; $x++) :
		$amts = $this->db->query("SELECT SUM(total_amount)as tamt FROM sales_order WHERE acc_date='" . $odyear . "-" . $odmnth . "-" . $x . "' AND status='1'")->result();
		$pricelist3 .= (!is_null($amts[0]->tamt)) ? $amts[0]->tamt . "," :   "0,";
	// echo  $this->db->last_query();
	endfor;

	$success["firstMonth"] = rtrim($pricelist1, ",");
	$success["secondMonth"] = rtrim($pricelist2, ",");
	$success["thirdMonth"] = rtrim($pricelist3, ",");
	echo json_encode($success);
endif;


if ($this->input->post("func_n") == "db_chart20") :
	$mid = $this->input->post('m_id');
	$mnY = explode("-", date("Y-m"));
	$monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1], $mnY[0]); // 31
	$odyear = $mnY[0];
	$odmnth = $mnY[1];
	$pricelist1 = '';
	for ($x = 1; $x <= $monthdates; $x++) :
		$productid = $this->db->query("SELECT id FROM product_information WHERE manufacturer_id ='" . $mid . "' AND status='1'")->result();
		$listtotal = 0;
		foreach ($productid as $information) :
			$amts = $this->db->query("SELECT SUM(total_price)as tamt FROM sales_order_details WHERE product_id=$information->id  AND acc_date='" . $odyear . "-" . $odmnth . "-" . $x . "' AND status='1'")->result();
			$listtotal += (!is_null($amts[0]->tamt)) ? $amts[0]->tamt : 0;
		//var_dump($amts);
		endforeach;
		$pricelist1 .= $listtotal . ",";
	endfor;

	$newdate = date("Y-m", strtotime("-1 months"));
	$mnY = explode("-", $newdate);
	$monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1], $mnY[0]); // 31
	$odyear = $mnY[0];
	$odmnth = $mnY[1];
	$pricelist2 = '';
	for ($x = 1; $x <= $monthdates; $x++) :
		$productid = $this->db->query("SELECT id FROM product_information WHERE manufacturer_id ='" . $mid . "' AND status='1'")->result();
		$listtotal=0;
		foreach ($productid as $information) :
			$amts = $this->db->query("SELECT SUM(total_price)as tamt FROM sales_order_details WHERE product_id IN ($information->id)  AND acc_date='" . $odyear . "-" . $odmnth . "-" . $x . "' AND status='1'")->result();
			$listtotal += (!is_null($amts[0]->tamt)) ? $amts[0]->tamt : 0;
			// $pricelist2 .= (!is_null($amts[0]->tamt)) ? $amts[0]->tamt . "," :   "0,";
		endforeach;
		$pricelist2 .= $listtotal . ",";


	// echo  $this->db->last_query();
	endfor;

	// $newdate = date("Y-m", strtotime("-2 months")); 
	// $mnY = explode("-", $newdate);
	// $monthdates = cal_days_in_month(CAL_GREGORIAN, $mnY[1], $mnY[0]); // 31
	// $odyear = $mnY[0];
	// $odmnth = $mnY[1];
	// $pricelist3 = '';
	// for ($x = 1; $x <= $monthdates; $x++):
	// 	$amts = $this->db->query("SELECT SUM(total_amount)as tamt FROM sales_order WHERE acc_date='" . $odyear . "-" . $odmnth . "-" . $x . "' AND status='1'")->result();
	// 	$pricelist3 .= (!is_null($amts[0]->tamt)) ? $amts[0]->tamt . "," :   "0,";
	// 	// echo  $this->db->last_query();
	// endfor;

	$success["firstMonth"] = rtrim($pricelist1, ",");
	$success["secondMonth"] = rtrim($pricelist2, ",");

	echo json_encode($success);
endif;
