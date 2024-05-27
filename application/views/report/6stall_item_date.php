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
                                <h6>Stall item Report</h6>
                            </div>
                            <div class="card-body py-md-30">
                         
                                <?= form_open( base_url()."index.php/report/stallitemdate", array('method'=>'get',"id" => "inForm")); ?>
                                    <div class="row">
                                       
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                                        <label for="datepicker9" class="il-gray fs-14 fw-500 align-center">manufature : </label>
                                          <select class="js-example-basic-single js-states form-control mid" name="mid">
                                              <option value="">Select Manufature</option>
                                              <?php
                                              $this->db->select("id,manufacturer_name");
                                              $manu = $this->Common_model->get_all("manufacturer_information")->result();
                                              if ($manu):
                                                  foreach ($manu as $tableRes):
                                                      ?>
                                                      <option value="<?= $tableRes->id ?>"  > <?= $tableRes->manufacturer_name ?></option>
                                                  <?php
                                                  endforeach;
                                              endif;
                                              ?>
                                          </select>
                                          <span class="err err_bname required" style="font-size:10px; color: #F5576C !important" ></span>
                                      </div>
                                        
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            
                                                <label for="datepicker9" class="il-gray fs-14 fw-500 align-center">From : </label>
                                                <!-- <div class="position-relative">
                                                    <input type="text" class="form-control  ih-medium ip-gray radius-xs b-light fromdate" id="datepicker9" >
                                                    <a href="#"><span data-feather="calendar"></span></a>
                                                </div> -->
                                                <input type="date" class="form-control fromdate"  name="fromdate" value="<?php echo date("Y-m-d")?>">
                                           
                                        </div>
                                        
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <div class="form-group form-group-calender">
                                                <label for="datepicker9" class="il-gray fs-14 fw-500 align-center">To : </label>
                                                <!-- <div class="position-relative">
                                                    <input type="text" class="form-control  ih-medium ip-gray radius-xs b-light todate" id="datepicker9" >
                                                    <a href="#"><span data-feather="calendar"></span></a>
                                                </div> -->
                                                <input type="date" class="form-control todate"  name="todate" value="<?php echo date("Y-m-d",strtotime("+1 day", strtotime(date("Y-m-d"))))?>">
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label  class="il-gray fs-14 fw-500 align-center">With Products :</label>
                                            <div class="checkbox-theme-default custom-checkbox" style="padding:10px 0px">
                                               
                                                <input class="checkbox checkval" type="checkbox" id="check-un1" value="1" name="withitem">
                                                <label for="check-un1" style="font-size:15px;color:#808080;">
                                                    <span class="checkbox-text"></span>
                                                </label>
                                            </div>
                                        </div> -->
                                        
                                       
                                        <!-- <div class="col-md-3 mb-25">
                                          
                                          <input type="year" class="form-control" id="FromDate" name="FromDate">
                                              <span class="err err_bname required" style="font-size:10px; color: #F5576C !important" ></span>
                                          </div> -->
                                       
                                       
                                    </div>
                                    <div class="col-md-3">
                                    <div class="layout-button mt-0" style="padding-top:20px">
                                        <!-- <button type="button" class="btn btn-primary btn-default btn-squared px-30 save_btn ">PDF</button> -->
                                        <button type="submit" class="btn btn-primary btn-default btn-squared px-30" >search</button>
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
        document.body.innerHTML += '<form id="dynForm" action="<?php echo base_url(); ?>index.php/report/sales_dailly_report" method="post"><input type="hidden" name="fromdate" value="'+ $(".fromdate").val()+'"><input type="hidden" name="todate" value="'+ $(".todate").val()+'">   <input type="hidden" name="withitem" value="'+ $(".checkval").val()+'">     </form>';
            document.getElementById("dynForm").submit(); 
        });
</script>
