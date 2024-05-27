<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Stall Module</h4>
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
                                <h6>Edit Stall Payment </h6>
                            </div>
                            <div class="card-body py-md-30">
                                <?= form_open_multipart("", array("id" => "inForm")); ?>
                                <?php
                                    if ($this->input->get('id')):
                                        $manu=$this->Common_model->get_all("manufacturer_payment",array('id' => $this->input->get('id')))->result();
                                        if ($manu !=NULL):
                                    ?>
                                    <div class="row">
                                        <input type="hidden" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="id"  value="<?php echo ($manu[0]->id) ?>"> 
                                        <div class="col-md-6 mb-25">
                                          
                                            <select class="js-example-basic-single js-states form-control" name="mname">
                                                <option value="">Select Manufaturer</option>
                                                <?php
                                                $this->db->select("id,manufacturer_name");
                                                $manufaturer = $this->Common_model->get_all("manufacturer_information")->result();
                                                if ( $manufaturer):
                                                    foreach ( $manufaturer as $tableRes):
                                                      
                                                        $selected = $manu[0]->manu_id == $tableRes->id ? "selected" : null; ?>
                                                    <option  <?= $selected ?>  value="<?= $tableRes->id ?>"  > <?= $tableRes->manufacturer_name ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="err err_mname required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Amount" name="amount"  value="<?php echo ($manu[0]->amount) ?>"> 
                                            <span class="err err_amount required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                                <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button>
                                                <button type="button" class="btn btn-primary btn-default btn-squared px-30 save_btn" name="login" value="Log in">update</button>
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

<script type="text/javascript">

 $(".save_btn").click(function (e) {
    e.preventDefault(); 
    $form = $("#inForm"); 
    add_form($form);
    function add_form($form) { 
        var formdata = new FormData($form[0]);
        formdata.append("func_n","edit_stallpayment");
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
               
                $(".err").html("");
                if(data.status==false){
                    $(".err_mname").html(data.mname);
                    $(".err_amount").html(data.amount);
                   
                    // notification_message("error","Error Occurred ! Please Check the fields.");
                        $.each(data.errors, function(key,val) {
                            $(".err_"+key).html(val);
                        });
            
                }else{
                    // notification_message("info", "Bank Company Added Successfully!!");
                    setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php/stoleitem/view_stole_payment";  });
                }
                
            }
        });
    }

    
});
   
</script>
