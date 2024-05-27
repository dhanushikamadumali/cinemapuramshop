<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Purchase Module</h4>
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
                        <div class="dropdown action-btn">
                            <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i> Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <span class="dropdown-item">Export With</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-print"></i> Printer</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-file-pdf"></i> PDF</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-file-text"></i> Google Sheets</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-file-csv"></i> CSV</a>
                            </div>
                        </div>
                        <div class="dropdown action-btn">
                            <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-share"></i> Share
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                <span class="dropdown-item">Share Link</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-facebook"></i> Facebook</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-twitter"></i> Twitter</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-google"></i> Google</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-feed"></i> Feed</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-instagram"></i> Instagram</a>
                            </div>
                        </div>
                        <div class="action-btn">
                            <a href="#" class="btn btn-sm btn-primary btn-add">
                                <i class="la la-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Add Purchase </h6>
                            </div>
                            <div class="card-body py-md-30">
                            <?= form_open_multipart("", array("id" => "inForm")); ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-25">
                                          
                                            <select class="js-example-basic-single js-states form-control bank" name="sid">
                                                <option value="">Select Supplier</option>
                                                <?php
                                                $this->db->select("id,supplier_name");
                                                $supplier = $this->Common_model->get_all("supplier_information")->result();
                                                if ($supplier):
                                                    foreach ($supplier as $tableRes):
                                                        ?>
                                                        <option value="<?= $tableRes->id ?>"  > <?= $tableRes->supplier_name ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="err err_sid required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                          
                                          <select class="js-example-basic-single js-states form-control branch" name="branchid">
                                              <option value="">Select Branch</option>
                                              <?php
                                              $this->db->select("id,branch_name");
                                              $bank = $this->Common_model->get_all("branch")->result();
                                              if ($bank):
                                                  foreach ($bank as $tableRes):
                                                      ?>
                                                      <option value="<?= $tableRes->id ?>"  > <?= $tableRes->branch_name ?></option>
                                                  <?php
                                                  endforeach;
                                              endif;
                                              ?>
                                          </select>
                                          <span class="err err_branchid required" style="font-size:10px; color: #F5576C !important" ></span>
                                      </div>
                                        <div class="col-md-6 mb-25">
							                <textarea  type="text" placeholder="Purchase Details" class="form-control " name="pdtls"  style="height: 40px;"></textarea>
                                            <span class="err err_pdtls required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                      
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                               
                                                <button type="button" class="btn btn-primary btn-default btn-squared px-30 plusButton" name="login" value="Log in">add</button>
                                            </div>
                                        </div>
                                    </div
                                    <div class="row">
                                    <div class="userDatatable projectDatatable project-table bg-white w-100 border-0">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr class="userDatatable-header">
                                                    <th>
                                                        <span class="projectDatatable-title">Select Product</span>
                                                    </th>
                                                    <th>
                                                        <span class="projectDatatable-title">Qty</span>
                                                    </th>
                                                    <th>
                                                        <span class="projectDatatable-title">Barcode</span>
                                                    </th>
                                                    <th>
                                                        <span class="projectDatatable-title">Purchased Price</span>
                                                    </th>
                                                    <!-- <th>
                                                        <span class="projectDatatable-title">Purchased Discount</span>
                                                    </th> -->
                                                    <th>
                                                        <span class="projectDatatable-title">Total Amount</span>
                                                    </th>
                                                    <th>
                                                        <span class="projectDatatable-title">Selling Price</span>
                                                    </th>
                                                 
                                                    </th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tablebody">

                                                <tr>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            <select class="js-example-basic-single js-states form-control table_product" name="pid[]">
                                                            <option value="">Select Product</option>
                                                            <?php
                                                            $this->db->select("id,product_name");
                                                            $tableResult = $this->Common_model->get_all("product_information")->result();
                                                            if ($tableResult):
                                                                foreach ($tableResult as $tableRes):
                                                                    // $selected = "" == $tableRes->id ? "selected" : null; ?>
                                                                    <option  value="<?= $tableRes->id ?>"  > <?= $tableRes->product_name ?></option>
                                                                <?php
                                                                endforeach;
                                                            endif;
                                                            ?>
                                                        </select>
                                                       
                                                        <span class="err err_pid required" style="font-size:10px;color: #F5576C;position:absolute;"></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                        <input  type="text" placeholder="Qty" class="form-control table_qty " name="table_qty[]"  value="">
                                                        <span class="err err_table_qty required" style="font-size:10px;color: #F5576C;position:absolute;"></span>
                                                    </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                        <input  type="text" placeholder="Batch ID" class="form-control table_btchid " name="table_btchid[]"  value="">
                                                        <span class="err err_table_btchid required" style="font-size:10px;color: #F5576C;position:absolute;"></span>
                                                        </div>
                                                    </td>
                                                   
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            <input  type="text" placeholder="Price" class="form-control table_pprice " name="table_pprice[]"  value="">
                                                            <span class="err err_table_pprice required" style="font-size:10px;color: #F5576C;position:absolute;"></span>
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
                                                        <input  type="text" placeholder="Manufaturer Price" class="form-control table_sprice " name="table_sprice[]"  value="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                        <a href='javascript:void(0)' style="padding-top: 6px;font-size:20px"  type="button" class="text-danger delete_butt"><i class="fas fa-times"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                           
                                            <tfoot>
                                            <tr  class="fTr">
                                                    <td colspan="5">
                                                    <span style="margin-left: 50px;font-weight: bold">Total</span>
                                                    </td>
                                                     <td>
                                                        <input  type="text"  class="form-control alltotal " name="alltotal"  value="">
                                                    </td>
                                            </tr>
                                            </tfoot>
                                        </table><!-- End: .table -->
                                    </div>
                                </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                                <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button>
                                                <button type="button" class="btn btn-primary btn-default btn-squared px-30 save_btn" name="login" value="Log in">save</button>
                                            </div>
                                        </div>
                                    </div>
                                <?= form_close() ?> 
                            </div>
                        </div>
                        <!-- ends: .card -->

                    </div>
        </div>
    </div>
</div>
</div>
<!-- alert -->
<script type="text/javascript" src="<?=base_url()?>assets/js/sweetalert.js" rel="stylesheet"></script>
<script type="text/javascript">

 $(".save_btn").click(function (e) {
    e.preventDefault(); 
    $form = $("#inForm"); 
    add_form($form);
    function add_form($form) { 
        var formdata = new FormData($form[0]);
        formdata.append("func_n","ad_purchase");
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/purchase/purchase_ajax",
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".err").html("");
                if(data.status==false){
                //     $(".err_bname").html(data.bname);
                //     $(".err_bbranch").html(data.bbranch);
                //     $(".err_accno").html(data.accno);
                  
                        $.each(data.errors, function(key,val) {
                            $(".err_"+key.replace('[]','')).html(val);
                        });
            
                }else{
                  
                    setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php/purchase";  });
                }
                
            }
        });
    }
    });
 
    // $("body").on("change",".table_product",function(){
   
    //     var mnuPrice = $(this).closest('tr').find('.table_product :selected').data("value");
    //     if(mnuPrice != 'undefined' || mnuPrice != ''){
    //         $(this).closest('tr').find('.table_sprice').val(mnuPrice);
    //     }else{
    //         $(this).closest('tr').find('.table_sprice').val(0);
    //     }
    // });

    $("body").on("keyup change",".table_qty, .table_pprice",function(){
			set_amounts($(this));
	});
    function set_amounts(e){
        var qty         = e.closest('tr').find('.table_qty').val();
        var price       = e.closest('tr').find('.table_pprice').val();
        var allTotal    = 0;
       
        qty         = qty == '' ? 0 : qty;
        price       = price == '' ? 0 : price;
       
        var total   = ( qty * price);
        e.closest('tr').find('.table_tot').val(total);

        $(".table_total").each(function(){
            var thisVl = $(this).val() == '' ? 0 : parseFloat($(this).val());
            allTotal += thisVl;
            
        });

        $(".alltotal").val(allTotal);
        // $(".in_pu_gtot").val(grandTotal);

      
	}

    // get table row
    $(".plusButton").click(function(e){
			e.preventDefault();
			
			$.ajax({
				type: "post",
				url: "<?php echo base_url(); ?>index.php/purchase/purchase_ajax",
				data: {
					func_n:"get_row" 
				},
				success: function (data) {
					$(".tablebody").append(data);
					
				}
			});
			
			
        });
        $("body").on('click','.delete_butt',function(){
            swal({
                title: "Delete Product?",
                text: "Are you sure you want to delete product now !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) { 
                    $(this).closest("tr").remove();
                    set_amounts($(this));
                } 
                
            }); 
            
        })




</script>
