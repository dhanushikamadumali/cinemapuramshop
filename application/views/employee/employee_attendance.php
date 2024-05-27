<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Employee Module</h4>
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
                                <h6>Employee Attendance </h6>
                            </div>
                            <div class="card-body py-md-30">
                            <?= form_open_multipart("", array("id" => "inForm")); ?>
                                    <div class="row">
                                    <div class="col-md-6 mb-25">
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15 " name="ename" >
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
                                        
                                        <div class="col-md-6 mb-25">
                                            <!-- <label for="datepicker9" class="il-gray fs-14 fw-500 align-center">From : </label> -->
                                            
                                            <input type="date" class="form-control date"  name="date" value="<?php echo date("Y-m-d")?>">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Amount" name="amount">
                                            <span class="err err_amount required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <div class="d-inline-flex">
                                            <div class="radio-theme-default custom-radio ">
                                                    <input class="radio" type="radio" name="status" value=1 id="radio-un4" checked>
                                                    <label for="radio-un4" >
                                                        <span class="radio-text" style="margin-right:10px">On</span>
                                                    </label>
                                                </div>
                                                <div class="radio-theme-default custom-radio ">
                                                    <input class="radio" type="radio" name="status" value=0 id="radio-un3" >
                                                    <label for="radio-un3">
                                                        <span class="radio-text" style="margin-right:10px">Off</span>
                                                    </label>
                                                </div>
                                                <div class="radio-theme-default custom-radio ">
                                                    <input class="radio" type="radio" name="status" value=2 id="radio-un5">
                                                    <label for="radio-un5">
                                                        <span class="radio-text" style="margin-right:10px">Half</span>
                                                    </label>
                                                </div>
                                            </div>
                                      
                                           
                                        </div>
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                                <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button>
                                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30 save_btn" name="login" value="Log in">save</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script type="text/javascript">

 $(".save_btn").click(function (e) {
   
    e.preventDefault();
    var func_n = "employee_attendance"; 
    $form = $("#inForm"); 
    add_form($form);
    function add_form($form) {
        
        var cntrl = "Employee";
        var mthd = "ajax";
        var formdata = new FormData($form[0]);
        formdata.append("func_n", func_n);
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/" + cntrl + "/" + mthd,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".err").html("");
                if(data.status==false){
                   
                  
                        $.each(data.errors, function(key,val) {
                            $(".err_"+key).html(val);
                        });
            
                }else{
                   
                    setTimeout(function(){ window.location.reload ()});
                }
            }
        });
    }
}); 
</script>
