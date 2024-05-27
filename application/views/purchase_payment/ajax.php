<?php 
if($this->input->post("func_n") == "ad_payment"):
	$this->form_validation->set_rules('sid', 'supplier id', "trim|required");
	$this->form_validation->set_rules('amount', 'amount', "trim|required");
    $this->form_validation->set_rules('ptype', 'ptype', "trim|required");
    $this->form_validation->set_rules('branchid', 'branch', "trim|required");
    $this->form_validation->set_rules('pdtls', 'payment details', "trim|required");

	if ($this->form_validation->run()):
            #region ------- // get supplier acc id
            $this->db->select('acc_id');
		    $supplier_acc_id  = $this->Common_model->get_all('supplier_information',['id'=>$this->input->post('sid')])->result();
            #region ------- // get bank commpany account id
            $this->db->select('*');
            $branch_details  = $this->Common_model->get_all('branch',['id'=>$this->input->post('branchid')])->result();
            #region ------- // create transation number
            $query = $this->db->query("SELECT * FROM product_purchase_payment ORDER BY id DESC LIMIT 1")->result();
            if($query):
                $exp_tranno_code = (explode("_", $query[0]->transaction_no));
                $Eacc_number =  $exp_tranno_code[1];
                $Eacc_number++;
                $traNo = $branch_details[0]->code."PP". date('Ym').'_'.str_pad($Eacc_number, 4, "0", STR_PAD_LEFT);
            else: 
                $traNo = $branch_details[0]->code."PP". date('Ym').'_'."0001";
            endif;
            #region ------- // insert product purchase payment details
            $DateTime = date('Y-m-d H:i:s');
            $add_product_purchase_payment_details = array( "transaction_no"=> $traNo,
                                                    "branch_id "=>$this->input->post("branchid"),
                                                    "date"=> $DateTime,
                                                    "amount"=>$this->input->post("amount"),
                                                    "payment_type"=>$this->input->post("ptype"),
                                                    "cr"=>$branch_details [0]->acc_purchase_payment	,
                                                    "dr"=>$supplier_acc_id [0]->acc_id,                                   
                                                    "acc_remark "=>$this->input->post("pdtls"),
                                                    "add_by"=>$this->session->userdata("user_id"),
                                                   
                                                );
                                        
            $this->Common_model->insert("product_purchase_payment", $add_product_purchase_payment_details);
            // $product_purchase_insertID = $this->Common_model->getInsert_id();
            $success['status'] = true; 
            echo json_encode($success);

        else:
            $error['status'] = false;
            $error['sid'] = form_error("csd");
            $error['amount'] = form_error("amount"); 	
            $error['ptype'] = form_error("ptype");
            $error['branchid'] = form_error("branchid"); 	
            $error['pdtls'] = form_error("pdtls");	
            echo json_encode($error);
	
	endif;
endif;



