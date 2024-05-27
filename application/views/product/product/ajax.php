<?php 

if($this->input->post("func_n") == "ad_product"):
	

	// $this->form_validation->set_rules('cid', 'category id', "trim|required");
	// $this->form_validation->set_rules('pcode', 'product code', "trim|required");
	$this->form_validation->set_rules('pname', 'product name', "trim|required");
	// $this->form_validation->set_rules('gname', 'generic name', "trim|required");
	// $this->form_validation->set_rules('strength', 'strength', "trim|required");
	// $this->form_validation->set_rules('measure', 'measure', "trim|required");
	// $this->form_validation->set_rules('boxsize', 'box size', "trim|required");
	// $this->form_validation->set_rules('plocation', 'product location', "trim|required");
	// $this->form_validation->set_rules('pmodel', 'product model', "trim|required");
	$this->form_validation->set_rules('pprice', 'product price', "trim");
	$this->form_validation->set_rules('mid', 'manufature id', "trim|required");
    $this->form_validation->set_rules('mprice', 'manufature price', "trim|required");
	// $this->form_validation->set_rules('unit', 'unit name', "trim|required");
	// $this->form_validation->set_rules('pdetail', 'product details', "trim|required");

	if ($this->form_validation->run()):

		// if($_POST['pimage']!=""){
		// 	$folderPath = 'assets/content/product_images/';
		// 	$image_parts = explode(";base64,", $_POST['pimage']);
		// 	$image_type_aux = explode("image/", $image_parts[0]);
		// 	$image_type = $image_type_aux[1];
		// 	$image_base64 = base64_decode($image_parts[1]);
		// 	$file = $folderPath . uniqid() . '.jpg';
		// 	$file1 =  uniqid() . '.jpg';
		// 	file_put_contents($file, $image_base64);
		// 	// echo json_encode($file);
	
		// }else{
		// 	$file1='default_image.jpg';
		// }
		
		
		$config1 = array('upload_path' => "./assets/content/product_images/",
            'allowed_types' => 'jpg|jpeg|png',
            'encrypt_name' => TRUE);
        $this->upload->initialize($config1);
        (!empty($_FILES['pimage']['name'])) ? $this->upload->do_upload('pimage') : NULL;
        $imageName = (!empty($_FILES['pimage']['name'])) ? $this->upload->data() : array("file_name" => "default_image.jpg");
        
        
		#region ------- // create product id
		$query = $this->db->query("SELECT * FROM product_information ORDER BY id DESC LIMIT 1")->result();
		if($query):
			$exp_tranno_code = (explode("-", $query[0]->product_id));
			$Eacc_number =  $exp_tranno_code[1];
			$Eacc_number++;
			$pId = "P".'-'.str_pad($Eacc_number, 3, "0", STR_PAD_LEFT);
		else: 
			$pId = "P".'-'."001";
		endif;
		
		
		$add_product_details = array(   "product_id "=>$pId,
                                        "category_id"=>$this->input->post("cid"),
										"product_code"=>$this->input->post("pcode"),
                                        "product_name"=>$this->input->post("pname"),
										"generic_name"=>$this->input->post("gname"),
                                        "strength"=>$this->input->post("strength"),
										"measure"=>$this->input->post("measure"),
                                        "box_size"=>$this->input->post("boxsize"),
                                        "product_location"=>$this->input->post("plocation"),
                                        "product_model"=>$this->input->post("pmodel"),
										"purchase_price"=>$this->input->post("pprice"),
                                        "manufacturer_id "=>$this->input->post("mid"),
                                        "manufacturer_price"=>$this->input->post("mprice"),
                                        "unit"=>$this->input->post("unit"),
                                        "product_details"=>$this->input->post("pdetail"),
										"image"=>$imageName['file_name'],
                                        "status"=>"1",
										"package_charge"=>$this->input->post("pcharge")
									);
									
		$this->Common_model->insert("product_information", $add_product_details);
		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		// $error['pcode'] = form_error("pcode");
		$error['pname'] = form_error("pname");
		$error['pprice'] = form_error("pprice");
		$error['mid'] = form_error("mid");
        $error['mprice'] = form_error("mprice");
		echo json_encode($error);
	
	endif;
endif;


if($this->input->post("func_n") =="edit_product"):
 
	// $this->form_validation->set_rules('cid', 'category id', "trim|required");
	// $this->form_validation->set_rules('pcode', 'product code', "trim|required");
	$this->form_validation->set_rules('pname', 'product name', "trim|required");
	// $this->form_validation->set_rules('gname', 'generic name', "trim|required");
	// $this->form_validation->set_rules('strength', 'strength', "trim|required");
	// $this->form_validation->set_rules('boxsize', 'box size', "trim|required");
	// $this->form_validation->set_rules('plocation', 'product location', "trim|required");
	// $this->form_validation->set_rules('pmodel', 'product model', "trim|required");
	$this->form_validation->set_rules('pprice', 'product price', "trim");
	$this->form_validation->set_rules('mid', 'manufature id', "trim|required");
    $this->form_validation->set_rules('mprice', 'manufature price', "trim|required");
	// $this->form_validation->set_rules('unit', 'unit name', "trim|required");
	// $this->form_validation->set_rules('pdetail', 'product details', "trim|required");

    if ($this->form_validation->run()):

        $product_details = $this->Common_model->get_all("product_information",array("id"=>$this->input->post("id")))->result();
		
    if($product_details != NULL):
        
        $imageName=array("file_name" => "default_image.jpg");
        
        if(!empty($_FILES['pimage']['name'])):
            if ($product_details[0]->image == "default_image.jpg"):
            else:
                $image_name = "assets/content/product_images/" .$product_details[0]->image;
                if (file_exists($image_name)):
                    unlink($image_name);
                endif; 
            endif; 
        endif;
        
        
        
        if(!empty($_FILES['pimage2']['name'])):
            if ($product_details[0]->image2 == "default_image.jpg"):
            else:
                $image_name2 = "assets/content/product_images/" .$product_details[0]->image2;
                if (file_exists($image_name2)):
                    unlink($image_name2);
                endif; 
            endif; 
        endif;
        $config1 = array('upload_path' => "./assets/content/product_images/",
            'allowed_types' => 'jpg|jpeg|png',
            'encrypt_name' => TRUE);
        $this->upload->initialize($config1);
        (!empty($_FILES['pimage']['name'])) ? $this->upload->do_upload('pimage') : NULL;
        $imageName = (!empty($_FILES['pimage']['name'])) ? $this->upload->data() : NULL;
        
        
        (!empty($_FILES['pimage2']['name'])) ? $this->upload->do_upload('pimage2') : NULL;
        $imageName2 = (!empty($_FILES['pimage2']['name'])) ? $this->upload->data() :NULL;
       
        
		$edit_product_details = array( "product_id "=>$this->input->post("pid"),
                                    "category_id"=>$this->input->post("cid"),
									"product_code"=>$this->input->post("pcode"),
                                    "product_name"=>$this->input->post("pname"),
                                    "generic_name"=>$this->input->post("gname"),
                                    "strength"=>$this->input->post("strength"),
                                    "box_size"=>$this->input->post("bsize"),
                                    "product_location"=>$this->input->post("plocation"),
                                    "product_model"=>$this->input->post("pmodel"),
                                    "purchase_price"=>$this->input->post("pprice"),
                                    "manufacturer_id "=>$this->input->post("mid"),
                                    "manufacturer_price"=>$this->input->post("mprice"),
                                    "unit"=>$this->input->post("unit"),
                                    "product_details"=>$this->input->post("pdetail"),
                                    "status"=>$this->input->post("pstatus"),
									"package_charge"=>$this->input->post("pcharge") 
								);
								(!empty($_FILES['pimage']['name'])) ? $edit_product_details['image']=$imageName['file_name'] : NULL;
								 (!empty($_FILES['pimage2']['name'])) ? $edit_product_details['image2']=$imageName2['file_name'] : NULL;
							//	var_dump($edit_product_details);
		// if($_POST['pimage']!=""):
		// 	$existing_image=  $product_details[0]->image;
		
		// 	if ($existing_image == "default_image.jpg"):
		// 	else:
		// 		$image_name = $existing_image;
		// 		if($existing_image != null):
		// 			if (file_exists($image_name)):
		// 				unlink($image_name);
		// 			endif;
		// 		endif;
	
		// 	endif;
			
		// 	$folderPath = 'assets/content/product_images/';
		// 	$image_parts = explode(";base64,", $_POST['pimage']);
		// 	$image_type_aux = explode("image/", $image_parts[0]);
		// 	$image_type = $image_type_aux[1];
		// 	$image_base64 = base64_decode($image_parts[1]);
		// 	$file = $folderPath . uniqid() . '.jpg';
		// 	$file1 =  uniqid() . '.jpg';
		// 	file_put_contents($file, $image_base64);
		// 	$edit_product_details["image"]=$file1;

		// endif;
		$update_product_details=$this->Common_model->update("product_information", $edit_product_details,array("id"=>$product_details[0]->id));
        $success["status"] = true;
		echo json_encode($success);
   
    endif;
    else:
        $error['status'] = false;
		// $error['pcode'] = form_error("pcode");
		$error['pname'] = form_error("pname");
		$error['pprice'] = form_error("pprice");
		$error['mid'] = form_error("mid");
        $error['mprice'] = form_error("mprice");
		// $error['unit'] = form_error("unit");
		// $error['pdetail'] = form_error("pdetail");
		echo json_encode($error);
		
    endif;
endif;

if($this->input->post("func_n") =="duplicate_product"):

	$product_details = $this->Common_model->get_all("product_information",array("id"=>$this->input->post("id")))->result();

	#region ------- // create product id
	$query = $this->db->query("SELECT * FROM product_information ORDER BY id DESC LIMIT 1")->result();
	if($query):
		$exp_tranno_code = (explode("-", $query[0]->product_id));
		$Eacc_number =  $exp_tranno_code[1];
		$Eacc_number++;
		$pId = "P".'-'.str_pad($Eacc_number, 3, "0", STR_PAD_LEFT);
	else: 
		$pId = "P".'-'."001";
	endif;

	if($product_details != NULL):
	
		$duplicate_product_details = array( "product_id "=>$pId,
									"category_id"=>$product_details[0]->category_id,
									"product_code"=>$product_details[0]->product_code,
									"product_name"=>$product_details[0]->product_name,
									"generic_name"=>$product_details[0]->generic_name,
									"strength"=>$product_details[0]->strength,
									"box_size"=>$product_details[0]->box_size,
									"product_location"=>$product_details[0]->product_location,
									"product_model"=>$product_details[0]->product_model,
									"purchase_price"=>$product_details[0]->purchase_price,
									"manufacturer_id "=>$product_details[0]->manufacturer_id,
									"manufacturer_price"=>$product_details[0]->manufacturer_price,
									"unit"=>$product_details[0]->unit,
									"product_details"=>$product_details[0]->product_details,
									"status"=>"1",
									"package_charge"=>$product_details[0]->package_charge,
									"image"=>$product_details[0]->image
								);
							
	$this->Common_model->insert("product_information",$duplicate_product_details);

   
	endif;
	endif;



	if($this->input->post("func_n") =="delete_product"):

		$so_details = $this->Common_model->get_all("sales_order_details",array("product_id"=>$this->input->post("id")))->result();
	
		if(!$so_details):
			$product_details = $this->Common_model->get_all("product_information",array("id"=>$this->input->post("id")))->result();
			if($product_details != NULL):
			$this->Common_model->delete("product_information",array('id'=>$this->input->post("id")));
			endif;
		endif;
		
	endif;
		
	if($this->input->post("func_n") == "product_edit"):
				?>
				<?php
					$product = $this->Common_model->get_all("product_information",array("id"=>$this->input->post("id")))->result();
					if ($product !=NULL):                  
				?>
					<div class="col-md-6 mb-25" hidden >
						<input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Name" name="id" value="<?php echo ($product[0]->id) ?>">
					</div>
					<div class="col-md-6 mb-25" hidden>
						<input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product id" name="pid"  value="<?php echo ($product[0]->product_id) ?>" readonly > 
						<span class="err err_pid required" style="font-size:10px; color: #F5576C !important" ></span>
					</div>
					<div class="col-md-6 mb-25">
						<select class="js-example-basic-single js-states form-control" name="cid"  >
							<option value="">Select Category</option>
							<?php
							$this->db->select("id,category_name");
							$this->db->order_by('category_name',"ASC");
							$tableResult = $this->Common_model->get_all("product_category")->result();
							if ($tableResult):
								foreach ($tableResult as $tableRes):
									$selected = $product[0]->category_id == $tableRes->id ? "selected" : null; ?>
									<option  <?= $selected ?> value="<?= $tableRes->id ?>"  > <?= $tableRes->category_name ?></option>
								<?php
								endforeach;
							endif;
						?>
						</select>
						<span class="err err_cid required" style="font-size:10px; color: #F5576C !important" ></span>
					</div>
					<!--<div class="col-md-6 mb-25">-->
					<!--	<input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Code" name="pcode"  value="<?php //echo ($product[0]->product_code) ?>"> -->
					<!--	 <span class="err err_pcode required" style="font-size:10px; color: #F5576C !important" ></span> -->
					<!--</div>-->
						<div class="col-md-6 mb-25">
                                          
						<select class="js-example-basic-single js-states form-control" name="pstatus" >
							<option value="">Select Active Status</option> 
									<option <?php  echo ($product[0]->status=="1")? "selected" : null ?> value="1"  >Active</option>
									<option <?php  echo ($product[0]->status=="0")? "selected" : null ?> value="0"  >In Active</option>
							 
						</select>
						<!-- <span class="err err_unit required" style="font-size:10px; color: #F5576C !important" ></span> -->
					</div>
					<div class="col-md-6 mb-25">
						<input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 pname" placeholder="Product Name" name="pname"  value="<?php echo ($product[0]->product_name) ?>"> 
						<span class="err err_pname required" style="font-size:10px; color: #F5576C !important" ></span>
					</div>
					<!--<div class="col-md-6 mb-25">-->
					<!--	<input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 gname" placeholder="Genaric Name" name="gname" value="<?php //echo ($product[0]->generic_name) ?>" > -->
					<!--	 <span class="err err_gname" style="font-size:10px; color: #F5576C !important" ></span> -->
					<!--</div>-->
					<!-- <div class="col-md-6 mb-25"> -->
						<!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Strength" name="strength" value="<?php echo ($product[0]->strength) ?>">  -->
						<!-- <span class="err err_strength" style="font-size:10px; color: #F5576C !important" ></span> -->
					<!-- </div> -->
					<!-- <div class="col-md-6 mb-25"> -->
						<!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Box Size" name="boxsize" value="<?php echo ($product[0]->box_size) ?>" >  -->
						<!-- <span class="err err_bsize required" style="font-size:10px; color: #F5576C !important" ></span> -->
					<!-- </div> -->
					<!-- <div class="col-md-6 mb-25"> -->
						<!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Location" name="plocation" value="<?php echo ($product[0]->product_location) ?>">  -->
						<!-- <span class="err err_plocation required" style="font-size:10px; color: #F5576C !important" ></span> -->
					<!-- </div> -->
					<!-- <div class="col-md-6 mb-25"> -->
						<!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Model" name="pmodel" value="<?php echo ($product[0]->product_model) ?>" >  -->
						<!-- <span class="err err_pmodel required" style="font-size:10px; color: #F5576C !important" ></span> -->
					<!-- </div> -->
					<!--<div class="col-md-6 mb-25">-->
					<!--	<input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 pprice" placeholder="Purchase Price" name="pprice"  value="<?php //echo ($product[0]->purchase_price) ?>"> -->
					<!--	<span class="err err_pprice" style="font-size:10px; color: #F5576C !important" ></span>-->
					<!--</div>-->
					<div class="col-md-6 mb-25">
						<input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15 mprice" placeholder="Manufature price" name="mprice"  value="<?php echo ($product[0]->manufacturer_price) ?>" > 
						<span class="err err_mprice required" style="font-size:10px; color: #F5576C !important" ></span>
					</div>
					<div class="col-md-6 mb-25">
						<select class="js-example-basic-single js-states form-control" name="mid" >
							<option value="">Select Manufature</option>
							<?php
							$this->db->select("id,manufacturer_name");
							$tableResult = $this->Common_model->get_all("manufacturer_information")->result();
							if ($tableResult):
								foreach ($tableResult as $tableRes):
									$selected = $product[0]->manufacturer_id  == $tableRes->id ? "selected" : null; ?>
									<option  <?= $selected ?> value="<?= $tableRes->id ?>"  > <?= $tableRes->manufacturer_name ?></option>
								<?php
								endforeach;
							endif;
							?>
						</select>
						<span class="err err_mid required" style="font-size:10px; color: #F5576C !important" ></span>
					</div>
                                        
					<!--<div class="col-md-6 mb-25">   -->
					<!--	<select class="js-example-basic-single js-states form-control" name="unit" >-->
					<!--		<option value="">Select Unit</option>-->
							<?php
				// 			$this->db->select("id,unit_name");
				// 			$tableResult = $this->Common_model->get_all("product_unit")->result();
				// 			if ($tableResult):
				// 				foreach ($tableResult as $tableRes):
				// 					$selected = $product[0]->unit  == $tableRes->id ? "selected" : null;           
									?>
									<!--<option <?= $selected ?> value="<?= $tableRes->id ?>"  > <?= $tableRes->unit_name ?></option>-->
								<?php
				// 				endforeach;
				// 			endif;
							?>
					<!--	</select>-->
					<!--	 <span class="err err_unit required" style="font-size:10px; color: #F5576C !important" ></span> -->
					<!--</div>-->
				
					<!--<div class="col-md-6 mb-25">-->
					<!--	<input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product Details" name="pdetail" value="<?php //echo ($product[0]->product_details) ?>" > -->
					<!--	 <span class="err err_pdetail" style="font-size:10px; color: #F5576C !important" ></span> -->
					<!--</div>  -->
					<div class="col-md-6 mb-25">
						<input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Package Charge" name="pcharge" value="<?php echo ($product[0]->package_charge==0)?"":$product[0]->package_charge ?>" > 
						<!-- <span class="err err_pdetail" style="font-size:10px; color: #F5576C !important" ></span> -->
					</div> 
					<div class="col-md-6 mb-25">
						<div class="input-group">
    						<div class="custom-file">
    							<input type="file" class="custom-file-input" id="pimage"  name="pimage" onchange="readURL(this) " >
    							<input  type="hidden" class="custom-file-input" id="old-pimage"  name="old-pimage" value="<?=$product[0]->image?>">
    							<label class="custom-file-label" for="pimage">Choose file</label>
    						</div>
						</div>
						<br/>      
					    <img  src="<?= base_url()."assets/content/product_images/".$product[0]->image?>" id="prev_img" width="150px" height="150px" > 
					</div>
                        <div class="col-md-6 mb-25">
						<div class="input-group">
    						<div class="custom-file">
    							<input type="file" class="custom-file-input" id="pimage2"  name="pimage2" onchange="readURL2(this) " >
    							<input  type="hidden" class="custom-file-input" id="old-pimage2"  name="old-pimage2" value="<?=$product[0]->image2 ?>">
    							<label class="custom-file-label" for="pimage2">Choose file</label>
    						</div>
						</div>
						<br/>      
					    <img  src="<?= base_url()."assets/content/product_images/".$product[0]->image2 ?>" id="prev_img2" width="150px" height="150px" > 
					</div>               
				<?php
					 endif;
endif;


if($this->input->post("func_n") == "custome_product"):
	
	$this->form_validation->set_rules("Fproid[]" , "productid" ,"trim|required" );
	$this->form_validation->set_rules("Tproid[]" , "productid" ,"trim|required" );

	if ($this->form_validation->run()):

	$this->Common_model->delete("featured_product",['position'=>1]);
	$this->Common_model->delete("featured_product",['position'=>2]);

    foreach($this->input->post("Fproid") as $fprodids):
    	$featured_details = array(
			"product_id" => $fprodids,
			"position	" => "1",
		);
		$this->Common_model->insert("featured_product", $featured_details);
    endforeach;
    
    foreach($this->input->post("Tproid") as $tprodids):
    	$t_details = array(
					"product_id" => $tprodids,
					"position	" => "2",
				);
				$this->Common_model->insert("featured_product", $t_details);
    endforeach;

		$success['status'] = true; 
		echo json_encode($success);

 else:
		$error['status'] = false;
		$error["errors"] = $this->form_validation->error_array();
		echo json_encode($error);
	endif;
endif;



