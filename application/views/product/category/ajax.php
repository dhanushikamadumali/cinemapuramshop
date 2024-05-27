<?php 
if($this->input->post("func_n") == "ad_category"):

	$this->form_validation->set_rules('cname', 'category name', "trim|required");
	
	if ($this->form_validation->run()):
		#region ------- // create categoery id
		$query = $this->db->query("SELECT * FROM product_category ORDER BY id DESC LIMIT 1")->result();
		if($query):
			$exp_tranno_code = (explode("-", $query[0]->category_id));
			$Eacc_number =  $exp_tranno_code[1];
			$Eacc_number++;
			$catNo = "CAT".'-'.str_pad($Eacc_number, 3, "0", STR_PAD_LEFT);
		else: 
			$catNo = "CAT".'-'."001";
		endif;
		
		$add_category_details = array(	"category_id"=>$catNo,
										"category_name"=>$this->input->post("cname"),
										"status"=>"1");
									
		$this->Common_model->insert("product_category", $add_category_details);
		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		$error['cname'] = form_error("cname"); 		
		echo json_encode($error);
	
	endif;
endif;
unset($func_n);

if($this->input->post("func_n") == "edit_category"):

	$this->form_validation->set_rules('cname', 'category name', "trim|required");
	
    if ($this->form_validation->run()):
        $category_details = $this->Common_model->get_all("product_category",array("id"=>$this->input->post("id")))->result();

    if($category_details != NULL):
		
		$edit_category_details = array("category_id"=>$this->input->post("cid"),
										"category_name"=>$this->input->post("cname"));	
		$update_category_details=$this->Common_model->update("product_category", $edit_category_details,array("id"=>$category_details[0]->id));
        $success["status"] = true;
		echo json_encode($success);
   
    endif;
    else:
       	$error['status'] = false;	
		$error['cname'] = form_error("cname");
		echo json_encode($error);
    endif;
endif;
unset($func_n);


