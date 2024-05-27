<?php
if ($this->input->post("func_n") == "ad_purchase"):

    $this->form_validation->set_rules('sid', 'supplier name', "trim|required");
    $this->form_validation->set_rules('branchid', 'branch name', "trim|required");
    $this->form_validation->set_rules('pdtls', 'Purchase Description', "trim");

    #region ------- product purchase details.......
    $this->form_validation->set_rules('pid[]', 'Product', "trim|required");
    $this->form_validation->set_rules('table_qty[]', 'Quantity', "trim|required");
    $this->form_validation->set_rules('table_btchid[]', 'Barcode', "trim");
    $this->form_validation->set_rules('table_pprice[]', 'Purchased price', "trim");
    $this->form_validation->set_rules('table_tot[]', 'Total amount', "trim|required");
    $this->form_validation->set_rules('table_sprice[]', 'Selling price', "trim|required");
    $this->form_validation->set_rules('table_expdate[]', 'Expiry Date', "trim|required");

    if ($this->form_validation->run()):

        #region ------- // get supplier acc id
        $this->db->select('acc_id');
        $supplier_acc_id = $this->Common_model->get_all('supplier_information', ['id' => $this->input->post('sid')])->result();
        #region ------- // get bank commpany account id
        $this->db->select('*');
        $branch_details = $this->Common_model->get_all('branch', ['id' => $this->input->post('branchid')])->result();
        #region ------- // create transation number
        $query = $this->db->query("SELECT * FROM product_purchase ORDER BY id DESC LIMIT 1")->result();
        if ($query):
            $exp_tranno_code = (explode("_", $query[0]->transaction_no));
            $Eacc_number = $exp_tranno_code[1];
            $Eacc_number++;
            $traNo = $branch_details[0]->code . "GP" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
        else:
            $traNo = $branch_details[0]->code . "GP" . date('Ym') . '_' . "0001";
        endif;

        #region ------- // insert product purchase details
        $DateTime = date('Y-m-d H:i:s');
        $add_product_purchase_details = array(
            "branch_id " => $this->input->post("branchid"),
            "supplier_id" => $this->input->post("sid"),
            "transaction_no" => $traNo,
            "purchase_remark" => $this->input->post("pdtls"),
            "total_amount" => $this->input->post("alltotal"),
            "purchase_date" => $DateTime,
            "cr" => $branch_details [0]->acc_good_purchase,
            "dr" => $supplier_acc_id [0]->acc_id,
            "acc_remark " => $this->input->post("pdtls"),
            "add_by" => $this->session->userdata("user_id"),
            "status" => 1,
        );

        $this->Common_model->insert("product_purchase", $add_product_purchase_details);
        $product_purchase_insertID = $this->Common_model->getInsert_id();

        $details_array = new MultipleIterator();

        $details_array->attachIterator(new ArrayIterator($this->input->post("pid")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_qty")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_btchid")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_pprice")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_tot")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_sprice")));
        $details_array->attachIterator(new ArrayIterator($this->input->post("table_expdate")));


        #region ------- Product Purchase Details -------
        foreach ($details_array as $dtArray):

            $pid = $dtArray[0];
            $table_qty = $dtArray[1];
            $table_btchid = $dtArray[2];
            $table_pprice = $dtArray[3];
            $table_tot = $dtArray[4];
            $table_sprice = $dtArray[5];
            $tableExpirydate = $dtArray[6];
            $branchid = $this->input->post('branchid');
            $product_purchase_details_details = array(
                "branch_id" => $branchid,
                "purchase_id" => $product_purchase_insertID,
                "product_id" => $pid,
                "purchase_qty" => $table_qty,
                "quantity" => $table_qty,
                "sold_qty" => 0,
                "purchase_price" => $table_pprice,
                "manufacturer_price" => $table_sprice,
                "amount" => $table_tot,
                "expire_date" => $tableExpirydate,
                "batch_id" => $table_btchid,
                "status" => 1
            );

            $this->Common_model->insert("product_purchase_details", $product_purchase_details_details);
            $product_purchase_id = array("manufacturer_price" => $table_sprice);
            $this->Common_model->update("product_information", $product_purchase_id, array("id" => $pid));
        endforeach; //End Iterator Foreach



        $success['status'] = true;
        echo json_encode($success);

    else:
        $error['status'] = false;
        $error["errors"] = $this->form_validation->error_array();
        echo json_encode($error);


    endif;
endif;


if ($this->input->post("func_n") == "get_row"):
    ?>
    <tr> 
    <!--        <td style="display: none;">
            <input type="hidden" placeholder="" class="form-control table_pu_d_id " name="table_pu_d_id[]"  value="00">
            <input type="hidden" placeholder="" class="form-control table_pu_id" name="table_pu_id[]"  value="00">
        </td>-->
        <td>
            <div class="userDatatable-content">
                <select name="pid[]"  class="form-control table_product productclass" style="padding: 0;">
                    <?php
                    $this->db->select("id,product_name");
                    $tableResult = $this->Common_model->get_all("product_information")->result();
                    if ($tableResult):
                        foreach ($tableResult as $tableRes):
                            ?>
                            <option <?= $tableRes->id == '1' ? 'selected' : null ?>  value="<?= $tableRes->id ?>" ><?= $tableRes->product_name ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>

            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                <input  type="text" placeholder="Qty" class="form-control table_qty " name="table_qty[]"  value="">
            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                <input  type="text" placeholder="Batch ID" class="form-control table_btchid " name="table_btchid[]"  value="">
            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                <input  type="date" placeholder="Exp Date" class="form-control table_exp_dateate" name="table_expdate[]"  value="">
                <span class="err err_table_expdate required" style="font-size:10px;color: #F5576C;position:absolute;"></span>
            </div>
        </td>

        <td>
            <div class="userDatatable-content">
                <input  type="text" placeholder="Price" class="form-control table_pprice " name="table_pprice[]"  value="">
            </div>
        </td>
        <!-- <td>
            <div class="userDatatable-content">
            <input  type="text" placeholder="Discount" class="form-control table_pdscnt " name="table_pdscnt[]"  value="">
            </div>
        </td> -->
        <td>
            <div class="userDatatable-content">
                <input disabled  type="text" placeholder="Total Amount" class="form-control table_tot table_total" name=""  value="">
                <input  type="hidden" placeholder="Total Amount" class="form-control table_tot " name="table_tot[]"  value="">
            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                <input  type="text" placeholder="Selling Price" class="form-control table_sprice " name="table_sprice[]"  value="">
                <span class="err err_table_sprice required" style="font-size:10px;color: #F5576C;position:absolute;"></span>
            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                <a href='javascript:void(0)' style="padding-top: 6px;font-size:20px"  type="button" class="text-danger delete_butt"><i class="fas fa-times"></i></a>
            </div>
        </td>
    </tr>
    <?php
endif;

if ($this->input->post("func_n") == "edit_purchase"):

    $this->form_validation->set_rules('sid', 'supplier name', "trim|required");
    $this->form_validation->set_rules('branchid', 'branch name', "trim|required");
    $this->form_validation->set_rules('pdtls', 'Address', "trim|required");
    #region ------- product purchase details.......

    $this->form_validation->set_rules('pid[]', 'Product', "trim|required");
    $this->form_validation->set_rules('table_qty[]', 'Quantity', "trim|required");
    $this->form_validation->set_rules('table_btchid[]', 'Barcode', "trim|required");
    $this->form_validation->set_rules('table_pprice[]', 'Purchased price', "trim|required");
    $this->form_validation->set_rules('table_tot[]', 'Total amount', "trim|required");
    $this->form_validation->set_rules('table_sprice[]', 'Selling price', "trim|required");

    if ($this->form_validation->run()):
        $purchaseid = $this->input->post("purchaseid");
        $purchase_details = $this->Common_model->get_all("product_purchase", array("id" => $purchaseid))->result();

        if ($purchase_details != NULL):
            #region ------- // get supplier acc id
            $this->db->select('acc_id');
            $supplier_acc_id = $this->Common_model->get_all('supplier_information', ['id' => $this->input->post('sid')])->result();
            #region ------- // get bank commpany account id
            $this->db->select('*');
            $branch_details = $this->Common_model->get_all('branch', ['id' => $this->input->post('branchid')])->result();
            #region ------- // create transation number
            $query = $this->db->query("SELECT * FROM product_purchase WHERE id='$purchaseid'")->result();
            // var_dump($query);
            if ($query):
                $exp_tranno_code = (explode("_", $query[0]->transaction_no));
                $Eacc_number = $exp_tranno_code[1];
                // $Eacc_number++;
                $traNo = $branch_details[0]->code . "GP" . date('Ym') . '_' . str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
            else:
                $traNo = $branch_details[0]->code . "GP" . date('Ym') . '_' . "0001";
            endif;
            #region ------- // insert product purchase details
            $DateTime = date('Y-m-d H:i:s');
            $add_product_purchase_details = array(
                "branch_id " => $this->input->post("branchid"),
                "supplier_id" => $this->input->post("sid"),
                "transaction_no" => $traNo,
                "purchase_remark" => $this->input->post("pdtls"),
                "total_amount" => $this->input->post("alltotal"),
                "purchase_date" => $DateTime,
                "cr" => $branch_details [0]->acc_good_purchase,
                "dr" => $supplier_acc_id [0]->acc_id,
                "acc_remark " => $this->input->post("pdtls"),
                "add_by" => $this->session->userdata("user_id"),
                "status" => 1,
            );

            $this->Common_model->update("product_purchase", $add_product_purchase_details, array("id" => $purchaseid));

            //$this->Common_model->delete("product_purchase_details", ["purchase_id" => $purchaseid]);

            $details_array = new MultipleIterator();
            $details_array->attachIterator(new ArrayIterator($this->input->post("pid")));
            $details_array->attachIterator(new ArrayIterator($this->input->post("table_qty")));
            $details_array->attachIterator(new ArrayIterator($this->input->post("table_btchid")));
            $details_array->attachIterator(new ArrayIterator($this->input->post("table_pprice")));
            $details_array->attachIterator(new ArrayIterator($this->input->post("table_tot")));
            $details_array->attachIterator(new ArrayIterator($this->input->post("table_sprice")));


            #region ------- Product Purchase Details -------
            foreach ($details_array as $dtArray):
                $pid = $dtArray[0];
                $table_qty = $dtArray[1];
                $table_btchid = $dtArray[2];
                $table_pprice = $dtArray[3];
                $table_tot = $dtArray[4];
                $table_sprice = $dtArray[5];
                $branchid = $this->input->post('branchid');
                $product_purchase_details_details = array(
                    "branch_id" => $branchid,
                    "purchase_id" => $purchaseid,
                    "product_id" => $pid,
                    "purchase_qty" => $table_qty,
                    "quantity" => $table_qty,
                    "sold_qty" => 0,
                    "purchase_price" => $table_pprice,
                    "manufacturer_price" => $table_sprice,
                    "amount" => $table_tot,
                    "batch_id" => $table_btchid,
                    "status" => 1
                );

                $this->Common_model->insert("product_purchase_details", $product_purchase_details_details);
                $product_purchase_id = array("manufacturer_price" => $table_sprice);
                $this->Common_model->update("product_information", $product_purchase_id, array("id" => $pid));

            endforeach; //End Iterator Foreach
        endif;



        $success['status'] = true;
        echo json_encode($success);

    else:
        $error['status'] = false;
        $error["errors"] = $this->form_validation->error_array();
        echo json_encode($error);
    endif;
endif;


if ($this->input->post("func_n") == "purchase_order_product"):
     
    
//        $this->db->select('sales_order.*,customer_information.customer_name as cname,sales_order_payment.payment_type as ptye');
//	// $this->db->join('customer_information','customer_information.id = sales_order.customer_id',"left");
//	$this->db->join("customer_information","customer_information.id=sales_order.customer_id","right");
//	$this->db->join("sales_order_payment","sales_order_payment.order_id=sales_order.id");
//	$sodetails = $this->Common_model->get_all('sales_order',["sales_order.id"=>$this->input->post('id')])->result();
	if(true):
		
	?>
	<div class="row">	
<!--		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">		
				<div class="col-md-6 mb-4">
					Customer Name : <?php //echo $sodetails[0]->cname?>
				</div>
				<div  class="col-md-6 mb-4">
					Transaction No : <?php //echo $sodetails[0]->transaction_no?>
				</div>
				<div class="col-md-6 mb-4">
					Sale Date : <?php //echo $sodetails[0]->sales_date?>
				</div>	
				<div class="col-md-6 mb-4">
					Payment Type : <?php //echo $sodetails[0]->ptye?>
				</div>	
				<div class="col-md-6 mb-4">
					Order Type : <?php //echo $sodetails[0]->order_type?>
				</div>
			</div>
			
		</div>-->
		
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
					<span class="userDatatable-title">Total Price</span>
				</th>
			
			</tr>
		</thead>
		<tbody>
                                           
	
	<?php
		  $mCounter=0;
		  $this->db->select('product_purchase_details.*,product_information.product_name as pname');
		  $this->db->join("product_information","product_information.id=product_purchase_details.product_id","right");
		  $pname = $this->Common_model->get_all('product_purchase_details',["purchase_id"=>$this->input->post('id')])->result();
		 
		  $subttl=0; 
		 foreach($pname as $prname):
			// $mCounter++;
			?> 
			 <tr style="<?php echo $prname->status!=1?"background-color:#ff9e9e":"" ?>">                                 
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
								<h6> <?= $prname->purchase_qty ?></h6>
							</a>
						</div>
					</div>
				</td>
				<td>
					<div class="d-flex">
						<div class="userDatatable-inline-title">
							<a href="#" class="text-dark fw-500">
								<h6> <?= $prname->purchase_price ?></h6>
							</a>
						</div>
					</div>
				</td> 
				<td>
					<div class="d-flex">
						<div class="userDatatable-inline-title">
							<a href="#" class="text-dark fw-500">
								<h6><?php echo $prname->status!=1?"":$subttl+= ($prname->purchase_price* $prname->purchase_qty)  ?> </h6>
							</a>
						</div>
					</div>
				</td>
				
				
			</tr>
			 <!-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			 <i class="fa fa-circle" style="color: #99b3ff;"></i><span style="color: #333333"><?php echo " " ?><?php echo $prname->pname?></span>
			  </div> -->
		 	<?php
			   endforeach;
			?>
			 </tbody>
			<tfoot>
			    	<tr>
					<td colspan="3">
					<span style="margin-left: 50px;font-weight: bold">Sub Total</span>
					</td>
					 <td>
						<span ><?=  number_format($subttl,"2",".",",")?></span>
					</td>

				</tr> 
				<tr>
					<td colspan="3">
					<span style="margin-left: 50px;font-weight: bold">Total Amount</span>
					</td>
					 <td>
						<span style="font-weight: bold"> <?= number_format($subttl,"2",".",",")?></span>
					</td>

				</tr>
			</tfoot>
		</table>
		
	 </div>	
	 
	<?php
	endif;
		

