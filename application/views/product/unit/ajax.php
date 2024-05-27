<?php 
if($this->input->post("func_n") == "ad_unit"):

	$this->form_validation->set_rules('unitname', 'unit name', "trim|required");

	if ($this->form_validation->run()):
		
		$add_unit_details = array("unit_name"=>$this->input->post("unitname"),"status"=>"1");
									
		$this->Common_model->insert("product_unit", $add_unit_details);
		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		$error['unitname'] = form_error("unitname");
		echo json_encode($error);
	
	endif;
endif;
unset($func_n);

if($this->input->post("func_n") =="edit_unit"):

	$this->form_validation->set_rules('unitname', 'unit name', "trim|required");

    if ($this->form_validation->run()):
        $unit_details = $this->Common_model->get_all("product_unit",array("id"=>$this->input->post("id")))->result();

    if($unit_details != NULL):
		
		$edit_unit_details = array("unit_name"=>$this->input->post("unitname"),"status"=>"1");	
		$update_unit_details=$this->Common_model->update("product_unit", $edit_unit_details,array("id"=>$unit_details[0]->id));
        $success["status"] = true;
		echo json_encode($success);
   
    endif;
    else:
       	$error['status'] = false;
		$error['unitname'] = form_error("unitname");
	
		echo json_encode($error);
    endif;
endif;
unset($func_n);


