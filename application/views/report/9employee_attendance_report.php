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
                                <h6>Employee Attendance Report </h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                    <div class="row">
                                   
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            
                                            <label for="datepicker9" class="il-gray fs-14 fw-500 align-center">From : </label>
                                            
                                            <input type="date" class="form-control fromdate"  name="fromdate" value="<?php echo date("Y-m-d")?>">
                                       
                                    </div>
                                    
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                   
                                            <label for="datepicker9" class="il-gray fs-14 fw-500 align-center">To : </label>
                                            
                                            <input type="date" class="form-control todate"  name="todate" value="<?php echo date("Y-m-d",strtotime("+1 day", strtotime(date("Y-m-d"))))?>">
                                        
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15 ename " name="ename" style="margin-top: 24px;" >
                                        <option value="">Select Employee</option>
                                        <?php
                                            
                                            $tableResult = $this->Common_model->get_all("employee",['status'=>1])->result();
                                            if ($tableResult):
                                                foreach ($tableResult as $tableRes):
                                                     ?>
                                                    <option value="<?= $tableRes->id ?>"  > <?= $tableRes->ename ?></option>
                                                <?php
                                                endforeach;
                                            endif;
                                        ?>
                                        </select>
                                        <span class="err err_ename required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 25px;" >
                                                <div class="">
                                                    <!-- <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button> -->
                                                    <button type="button" class="btn btn-primary btn-default btn-squared px-30 search_stallreport">search</button>
                                                </div>
                                          </div>
                                     </div>
                                    
                                    </div>
                                    <script>
                                    $(".search_stallreport").click(function(){
                                         $.ajax({
                                            type: "post",
                                            url: "<?php echo base_url(); ?>index.php/sales/report_ajax",
                                            data: {
                                                func_n: "get_employee_attendance_report",
                                                fromdate: $(".fromdate").val(),
                                                todate: $(".todate").val(),
                                                eid: $(".ename").val()
                                            }, 
                                            success: function (data) {
                                                $(".stall_sales").empty();
                                                $(".stall_sales").append(data);
                                            }
                                        });
                                    })
                                    </script>
                                    <div class="table-responsive col-md-12">
                                        <table class="table stall_sales">     
                          
                                         
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
  
                                        
</script>
