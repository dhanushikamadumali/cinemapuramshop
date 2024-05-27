<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Report Module</h4>
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
                                <h6>All Stall Sales Report</h6>
                            </div>
                            <div class="card-body py-md-30">
                         
                                <?= form_open_multipart("", array("id" => "inForm")); ?>
                                    <div class="row">
                                       
                                        <div class="col-md-3 mb-25">
                                          
                                        <input type="month" class="form-control monthyear" id="FromDate" name="FromDate" value="<?php echo date("Y-M")?>">
                                            <span class="err err_bname required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <!-- <div class="col-md-3 mb-25">
                                          
                                          <input type="year" class="form-control" id="FromDate" name="FromDate">
                                              <span class="err err_bname required" style="font-size:10px; color: #F5576C !important" ></span>
                                          </div> -->
                                       
                                        <div class="col-md-3">
                                            <div class="layout-button mt-0">
                                                <!-- <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button> -->
                                                <button type="button" class="btn btn-primary btn-default btn-squared px-30 save_btn" name="login" value="Log in">search</button>
                                            </div>
                                        </div>
                                    </div>
                                <?= form_close() ?> 

                                <div class="row">
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="" style="overflow-x :scroll">
                                            <table class="table protable">
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

</div>

<script type="text/javascript">
    
      $("body").on('click', '.save_btn', function () {
       $(".table").empty();
       
       
            $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/sales/sales_ajax",
            data: {
                func_n: "get_stole_report",
                mothyear: $(".monthyear").val(),
                // man: $(".mname").val()
            }, 
            success: function (data) {
                
                $(".protable").append(data);
//                 $('.portable').DataTable(
//                     {
// 			//lengthChange: false,
// 			dom: "lBfrtip",
// 			buttons: [
//                 {
// 					extend: "excel",
// 					exportOptions: {
// 						columns: ":not(.notexport)"
// 					}
// 				},
				
// 				{
// 					extend: "csv",
// 					exportOptions: {
// 						columns: ":not(.notexport)"
// 					}
// 				},
// 				{
// 					extend: "pdf",
// 					exportOptions: {
// 						columns: ":not(.notexport)"
// 					}
// 				},
// 				{
// 					extend: "print",
// 					exportOptions: {
// 						columns: ":not(.notexport)"
// 					}
// 				}
// 			],
// 			processing: true,
// 			serverSide: true,
// 			"info": true,
//             "aLengthMenu": [[50, 150, - 1], [50, 150, "All"]], 
//             "iDisplayLength": 50,
//             "order": [[0, "ASC"]]
// 		}
//                 );
            }
        });
       
       
        
    });

    

</script>
