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
                                <h6>Edit Employee </h6>
                            </div>
                            <div class="card-body py-md-30">
                            <?= form_open_multipart("", array("id" => "inForm")); ?>
                            <?php
                            if ($this->input->get('id')):
                               
                                $employee=$this->Common_model->get_all("employee",array('id' => $this->input->get('id')))->result();
                                
                                if ($employee !=NULL):
                        
                            ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-25" hidden >
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Name" name="id" value="<?php echo ($employee[0]->id) ?>">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Name" name="name" value="<?php echo ($employee[0]->ename) ?>">
                                            <span class="err err_name required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Address" name="address" value="<?php echo ($employee[0]->address) ?>">
                                            <span class="err err_address required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Tno" name="tno" value="<?php echo ($employee[0]->t_no) ?>">
                                            <span class="err err_tno required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="email"  class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Email" name="email" value="<?php echo ($employee[0]->email) ?>">
                                            <span class="err err_email required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                      
                                        <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                                <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button>
                                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30 save_btn" name="login" value="Log in">update</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        endif;
                                    endif;
                                    ?>
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
    var func_n = "edit_employee"; 
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
                    $(".err_name").html(data.name);
                    $(".err_address").html(data.address);
                    $(".err_tno").html(data.tno);
                    $(".err_email").html(data.email);
                    
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
