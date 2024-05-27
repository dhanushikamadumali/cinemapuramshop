<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Product Module</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap"  style="display:none">
                        <div class="action-btn">

                            <div class="form-group mb-0">
                                <div class="input-container icon-left position-relative">
                                    <span class="input-icon icon-left">
                                        <span data-feather="calendar"></span>
                                    </span>
                                    <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">
                                    <span class="input-icon icon-right">
                                        <span data-feather="chevron-down"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>View Product </h6>
                            </div>
                            <div class="card-body py-md-30">
							<div class="filter">
								<div class="row">
									
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="row">
											<?php
												  $mCounter=0;
												  $this->db->select('*');
												  $manufature_information = $this->Common_model->get_all('`manufacturer_information', ['status' => 1])->result();
												  if ($manufature_information):
													foreach ($manufature_information as $information):
													$mCounter++;
													?>
														<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
														<!-- <div class="custom-control custom-switch switch-primary switch-md "><br>
														  <input type="checkbox" class="custom-control-input isitemAvail" id="switch-s<?php echo $prname->id?>" name="qty[]"  value="<?php echo $prname->id?>"  <?php //echo ($prname->status == 1 )?"checked":NULL ?>>
														  <label class="custom-control-label " for="switch-s<?php echo $prname->id?>"> <?php echo $prname->product_name?></label>
														
														
														</div> -->
														<div class="radio-theme-default custom-radio ">
															<input class="radio vw_mid" type="radio" name="vw_mid" mid="<?php echo $information->id?>" value="<?php echo $information->id?>" id="mid-<?php echo $information->id?>">
															<label for="mid-<?php echo $information->id?>">
																<span class="radio-text"><?= $information->manufacturer_name ?></span>
															</label>
														</div>
														<!-- <input  type="checkbox" class="chkbx " value="" id="<?php //echo $prname->id?>">                -->
														<!-- <input class="chkbx isitemAvail toSwitch"  type="checkbox"  onclick="" value="<?php // echo $prname->id?>"  id=""  />  <?php echo $prname->product_name?> -->
													  </div>
														
													<?php if ($mCounter % 4 == 0):  ?>
               
											  </div>
												<div class="row">
													<?php
													endif;
													?>
													<?php
												 endforeach;
												endif;
													?>
											 </div>	

									</div>
										
										
									
								</div>
								<div class="row">
									
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="col-md-6">
											<div class="layout-button mt-0">
											
												<button type="button" class="btn btn-primary btn-default btn-squared px-30 search_btn" name="search_btn" value="search_btn">Search</button>
											</div>
										</div>
									</div>
									
								</div>
								</div>
                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                    <div class="table-responsive">
                                        <div id="filter-form-container"></div>
                                        <table class="table mb-0 table-borderless adv-table example" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10" style="font-size:14px">
                                            <thead>
                                                <tr class="userDatatable-header">
                                                    <th style="width:20%">
                                                        <span class="userDatatable-title">image</span>
                                                    </th>
                                                    <th style="width:20%">
                                                        <span class="userDatatable-title">pname</span>
                                                    </th>
                                                    <!-- <th>
                                                        <span class="userDatatable-title">pcode</span>
                                                    </th> -->
                                                    <th style="width:10%">
                                                        <span class="userDatatable-title">cname</span>
                                                    </th>
                                                    <th style="width:20%">
                                                        <span class="userDatatable-title">mname </span>
                                                    </th>
                                                    <!-- <th>
                                                        <span class="userDatatable-title">purchase price</span>
                                                    </th> -->
                                                   
                                                    <th style="width:10%">
                                                        <span class="userDatatable-title">mprice</span>
                                                    </th>
                                                   
                                                     <th data-type="html" data-name='status'>
                                                        <span class="userDatatable-title">status</span>
                                                    </th>  
                                                    <th style="width:40%">
                                                        <span class="userDatatable-title float-right">action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                     
                                             </tbody>
                                        </table>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                        <!-- ends: .card -->

                    </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="productModal-lg" tabindex="-1" role="dialog" aria-labelledby="addcusModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" >Edit Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				
				<?= form_open_multipart("", array("id" => "inForm")); ?>

				<div class="row product">
				  
				</div>
				<?= form_close() ?> 
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary productedit" ppdid="">Edit</button>
				</div>
			</div>
		</div>
	</div>
<!-- 
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabel">Crop image</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="img-container">
						<div class="row">
							<div class="col-md-8">  
									default image where we will set the src via jquery
								<img id="image">
							</div>
							<div class="col-md-4">
								<div class="preview"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="crop">Crop</button>
				</div>
			</div>
		</div>
	</div> -->

</div>
<!-- alert -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/sweetalert.js" rel="stylesheet"></script>
<script type="text/javascript">
      //  $('.example').DataTable();        
        // $(document).ready(function(){
		$toggleSidebar = true;		
		var table = $(".example").DataTable( {
			//lengthChange: false,
			dom: "lBfrtip",
			buttons: [
                {
					extend: "excel",
					exportOptions: {
						columns: ":not(.notexport)"
					}
				},
				{
					extend: "csv",
					exportOptions: {
						columns: ":not(.notexport)"
					}
				},
				{
					extend: "pdf",
					exportOptions: {
						columns: ":not(.notexport)"
					}
				},
				{
					extend: "print",
					exportOptions: {
						columns: ":not(.notexport)"
					}
				}
			],
			processing: true,
			serverSide: true,
			"info": true,
			"ajax": {
				"url": "<?= base_url(); ?>index.php/Product/view_product_ajax",
				"type": "POST",
				data:{
					pu_mid: function(){ return $('input[name="vw_mid"]:checked').val() }
				// 	pu_dt: function(){ return $(".vw_pu_dt").val() },
				// 	pu_pytp: function(){ return $(".vw_pu_pytp").val() },
				// 	pu_bnk: function(){ return $(".vw_pu_bnk").val() },
				// 	pu_inv: function(){ return $(".vw_pu_inv").val() },
				// 	pu_stat: function(){ return $(".vw_pu_stat").val() },
				}
			},
			"columnDefs": [
      { "width": "5%", "targets": 0 },
      { "width": "5%", "targets": 1 },
      { "width": "5%", "targets": 2 },
      { "width": "5%", "targets": 3 },
      { "width": "5%", "targets": 4 },
      { "width": "5%", "targets": 5 },
      { "width": "70%", "targets": 6 } 
    ],
			columns: [
			    	{"data": "dtb_proimage",className: "dtb_proimage" ,
					"render": function(data, type, full, meta) {
					    console.log(full)
						if(data == "" || data == null){
							return "-";
						}else{
							  return '<img src="<?php echo base_url() ?>assets/content/product_images/'+data +'" style="width:100px;height:100px"><img src="<?php echo base_url() ?>assets/content/product_images/'+data +'" style="width:100px;height:100px">' ;
						}
					} },
				{"data": "dtb_proname",className: "dtb_proname" ,
					"render": function(data, type, full, meta) {
						if(data == "" || data == null){
							return "-";
						}else{
							if(data.length > 25){
								return data.substring(0,25) + "...";
							}else{  return data }
						}
					} },
                    // {"data": "dtb_procode",className: "dtb_procode" ,
					// "render": function(data, type, full, meta) {
					// 	if(data == "" || data == null){
					// 		return "-";
					// 	}else{
					// 		if(data.length > 25){
					// 			return data.substring(0,25) + "...";
					// 		}else{  return data }
					// 	}


					// } },
                    {"data": "dtb_cname",className: "dtb_cname" ,
					"render": function(data, type, full, meta) {
						if(data == "" || data == null){
							return "-";
						}else{
							if(data.length > 25){
								return data.substring(0,25) + "...";
							}else{  return data }
						}


					} },
                    {"data": "dtb_mname",className: "dtb_mname" ,
					"render": function(data, type, full, meta) {
						if(data == "" || data == null){
							return "-";
						}else{
							if(data.length > 25){
								return data.substring(0,25) + "...";
							}else{  return data }
						}


					} },
                       
					// {"data": "dtb_purprice",className: "dtb_purprice" ,
					// "render": function(data, type, full, meta) {
					// 	if(data == "" || data == null){
					// 		return "-";
					// 	}else{
					// 		if(data.length > 25){
					// 			return data.substring(0,25) + "...";
					// 		}else{  return data }
					// 	}


					// } },
                    {"data": "dtb_manuprice",className: "dtb_manuprice" ,
					"render": function(data, type, full, meta) {
						if(data == "" || data == null){
							return "-";
						}else{
							if(data.length > 25){
								return data.substring(0,25) + "...";
							}else{  return data }
						}


					} },
                    {"data": "dtb_status",className: "dtb_status" ,
                        "render": function(data, type, full, meta) {
                            if(data == "" || data == null){
                                return "-";
                            }else{
                                if(data == 1 ){
                                    return '<span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>';
                                }else{  return '<span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">deactivate</span>' }
                            }


                        } },
					{"data": "renival_igGrt",className: "renival_igGrt" ,
						"render": function(data, type, full, meta) {					
                      	return ' <ul class="orderDatatable_actions mb-0 d-flex flex-wrap"><li><a  href="" pid="'+data+'"   class="edit_btn" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="far fa-edit"></span></a></li><li><a  href="<?= base_url() ?>index.php/Product/productEdit?id='+data+'"   class="edit" ><span class="far fa-edit"></span></a></li></ul>'; //<li><a href="#" pid="'+data+'" class="cpy_abtn"><span class="fa fa-clone"></span></a></li><li><a href="#" pid="'+data+'"  class="delete_btn"><span class="far fa-trash-alt"></span></a></li>
                    } },
			],
			"aLengthMenu": [[50, 150, - 1], [50, 150, "All"]], 
			"iDisplayLength": 50,
		
            "order": [[0, "DESC"]]
		} );//End Datatable Function

		// table.buttons().container()
		// 	.appendTo( "#dt_table_wrapper .col-md-6:eq(0)" );

		$("body").on("click",".search_btn",function(){ 
		     
			table.ajax.reload();
		});
		
		
		$("body").on("click",".cpy_abtn",function(e){
			e.preventDefault();
			swal({            
				text: "Are you sure you want to duplicate product!",
				icon: "info",
				buttons: true,
           
				})
				.then((willDelete) => {
				if (willDelete) { 
					$.ajax({
						type: "post",
						url: "<?php echo base_url(); ?>index.php/product/product_ajax",
						data: {
							func_n: "duplicate_product",
							id: $(this).attr("pid"),
							// orderid: a
							// man: $(".mname").val()
						},
						success: function (data) {
                       
							setTimeout(function(){ window.location.reload(); });
						}

					});
				} 
            
			}); 
		});


		$("body").on("click",".delete_btn",function(e){
				e.preventDefault();
			swal({            
				title: "Delete Product?",
				text: "Are you sure you want to delete product now !",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			   
				})
				.then((willDelete) => {
				if (willDelete) { 
					$.ajax({
						type: "post",
						url: "<?php echo base_url(); ?>index.php/product/product_ajax",
						data: {
							func_n: "delete_product",
							id: $(this).attr("pid"),
							// orderid: a
							// man: $(".mname").val()
						},
						success: function (data) {
						   
							setTimeout(function(){ window.location.reload(); });
						}
	
					});
				} 
				
			}); 
		});

	// });      
   
	$("body").on("click",".edit_btn",function(e){
	e.preventDefault();
		$.ajax({
			type: "post",
		
			url: "<?php echo base_url(); ?>index.php/product/product_ajax",
			data: {
				func_n: "product_edit",
				id: $(this).attr("pid"),
				// orderid: a
				// man: $(".mname").val()
			},
			success: function (data) {
				console.log(data);
				$(".product").empty();
				$(".product").append(data);
				
				// setTimeout(function(){ window.location.reload(); });
			}

		});
	
	});

	$("body").on('keyup', '.pname', function (e) {
       	e.preventDefault();
	   $('.gname').val($(this).val());
   });
   $("body").on('keyup', '.pprice', function (e) {
       	e.preventDefault();
	   $('.mprice').val($(this).val());
   });
	$(".productedit").click(function(e){ 
		e.preventDefault(); 
	$form = $("#inForm"); 
	add_form($form);
	function add_form($form) { 
		var formdata = new FormData($form[0]);
		formdata.append("func_n","edit_product");
		$.ajax({
			type: "post",
			dataType: "JSON",
			url: "<?php echo base_url(); ?>index.php/product/product_ajax",
			data: formdata,
			cache: false,
			contentType: false,
			processData: false,
			success: function (data) {
				$(".err").html("");
				if(data.status==false){
					$(".err_pid").html(data.pid);
					// $(".err_cid").html(data.cid);
					$(".err_pname").html(data.pname);
					// $(".err_gname").html(data.gname);
					// $(".err_strength").html(data.strength);
					// $(".err_bsize").html(data.bsize); 
					// $(".err_plocation").html(data.plocation);
					// $(".err_pmodel").html(data.pmodel);
					$(".err_pprice").html(data.pprice);
					$(".err_mid").html(data.mid);
					$(".err_mprice").html(data.mprice);
					// $(".err_unit").html(data.unit);
					// $(".err_pdetail").html(data.pdetail);
                  
						$.each(data.errors, function(key,val) {
							$(".err_"+key).html(val);
						});
            
				}else{
                   
					setTimeout(function(){ window.location.reload ()});
				}
			}
		});
	}

})   



function readURL(input) {
    if (input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#prev_img')
            .attr('src',e.target.result)
            .height(150)
            .width(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function readURL2(input) {
    if (input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#prev_img2')
            .attr('src',e.target.result)
            .height(150)
            .width(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
}




// $(document).ready(function(){
// 		var  canvas;
// 		var    url;
// 		var base64data;

// 		var bs_modal = $('#modal');
// 			var image = document.getElementById('image');
// 			var cropper,reader,file;
    
// 			$("body").on("change", ".image", function(e) {
// 				var files = e.target.files;
// 				var done = function(url) {
// 					image.src = url;
// 					bs_modal.modal('show');
// 				};

// 				if (files && files.length > 0) {
// 					file = files[0];

// 					if (URL) {
// 						done(URL.createObjectURL(file));
// 					} else if (FileReader) {
// 						reader = new FileReader();
// 						reader.onload = function(e) {
// 							done(reader.result);
// 						};
// 						reader.readAsDataURL(file);
// 					}
// 				}
// 			});

// 			bs_modal.on('shown.bs.modal', function() {
// 				cropper = new Cropper(image, {
// 					aspectRatio: 1,
// 					viewMode: 3,
// 					preview: '.preview'
// 				});
// 			}).on('hidden.bs.modal', function() {
// 				cropper.destroy();
// 				cropper = null;
// 			});
// 			$("body").on('click', '#crop', function () {
// 			alert()
// 				canvas = cropper.getCroppedCanvas({
// 					width: 160,
// 					height: 160,
// 				});
// 				canvas.toBlob(function(blob) {
// 					url = URL.createObjectURL(blob);
// 					var reader = new FileReader();
// 					reader.readAsDataURL(blob);
// 					reader.onloadend = function() {
// 						var base64data = reader.result;
// 						$('#pimage').val(base64data);
// 						$('#pimage1').attr('src',base64data);
// 						bs_modal.modal('hide');
// 					};
// 				});
// 			});
// 	});
				
			
		
                                        
</script>

