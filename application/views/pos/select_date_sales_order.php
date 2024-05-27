<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Report Module</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap"  style="display:none">
                        <div class="action-btn">

                          
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
                                <h6>Select Date Sales Order </h6>
                            </div>
                            <div class="card-body py-md-30">
                           
                            <div class="row">
                                <div class="col-md-3 mb-25"><label>SELECT DATE</label></div>
                                <div class="col-md-3 mb-25"><input type="date" class="form-control sdate" id="sdate" name="sdate" value="<?php echo date("Y-m-d")?>"></div>
                                <div class="col-md-6">
                                    <div class="layout-button mt-0">
                                    <button type="button" class="btn btn-primary btn-default btn-squared px-30 save_btn" name="login" value="Log in">search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              
                            </div>
                            <div class="row">&nbsp;</div>    
                            <div class="row"> 
                                            <table class="table protable">
                                            </table>
                                       
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
            url: "<?php echo base_url(); ?>index.php/pos/pos_ajax",
            data: {
                func_n: "get_select_date_sales_order",
                selectdate: $(".sdate").val(),
                // man: $(".mname").val()
            }, 
            success: function (data) {
                
                $(".protable").append(data);
                $('.portable').DataTable(
                    {
            //lengthChange: false,
          
           
        }
                );
            }
        });
       
       
        
    });
                   
</script>
