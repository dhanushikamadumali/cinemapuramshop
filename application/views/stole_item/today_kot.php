<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                 

            </div>
        </div>
        <div class="row">
           
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Today Kot</h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                <input type="hidden" class="mid" value="<?php echo $this->session->userdata("manufaturer_id") ?>">
                                    <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            
                                            <label for="datepicker9" class="il-gray fs-14 fw-500 align-center">From : </label>
                                            
                                            <input type="date" class="form-control fromdate"  name="fromdate" value="<?php echo date("Y-m-d")?>">
                                       
                                    </div>
                                    
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                   
                                            <label for="datepicker9" class="il-gray fs-14 fw-500 align-center">To : </label>
                                            
                                            <input type="date" class="form-control todate"  name="todate" value="<?php echo date("Y-m-d",strtotime("+1 day", strtotime(date("Y-m-d"))))?>">
                                        
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top:28px">
                                                <div class="">
                                                    <!-- <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button> -->
                                                    <button type="button" class="btn btn-primary btn-default btn-squared px-30 search_todaykot">search</button>
                                                </div>
                                          </div>
                                     </div>
                                    
                                    </div>
                                <div class="row">
                                    &nbsp;
                                </div>
                                   
                                    <div class="table-responsive col-md-12" style="width:100%;overflow-x:scroll">
                                        <table class="table stall_sales" style="width:100vw">     
                          
                                         
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
<script>
$(".search_todaykot").click(function(){
  
     $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
        data: {
            func_n: "get_today_kot",
            fromdate: $(".fromdate").val(),
            todate: $(".todate").val(),
            mid: $(".mid").val()
        }, 
        success: function (data) {
            $(".stall_sales").empty();
            $(".stall_sales").append(data);
        }
    });
})
</script>
