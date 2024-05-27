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
                                <h6>Available Product</h6>
                            </div>
                            <div class="card-body py-md-30">
                            <?= form_open_multipart("", array("id" => "inForm")); ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-25">
                                          
                                            <select class="js-example-basic-single js-states form-control mname" name="mid">
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
                                        <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="row">
                                                <div class="product"  >
                                                </div>
                                            </div>
                                            <!-- <span class="err err_bbranch required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                            </div>
                                        </div>
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

<script type="text/javascript">

 $(".save_btn").click(function (e) {
    e.preventDefault(); 
    $form = $("#inForm"); 
   
    add_form($form);
    function add_form($form) { 
        var formdata = new FormData($form[0]);
       
        formdata.append("func_n","available_product");
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
                    // $(".err_bname").html(data.bname);
                    // $(".err_bbranch").html(data.bbranch);
                    // $(".err_accno").html(data.accno);
                    // notification_message("error","Error Occurred ! Please Check the fields.");
                    //     $.each(data.errors, function(key,val) {
                    //         $(".err_"+key).html(val);
                    //     });
            
                }else{
                    notification_message("info", "available product Added Successfully!!");
                   
                    setTimeout(function(){ window.location.reload(); }, 1500);
                }
                
            }
        });
    }

    
});
    $('.mname').change(function(e){

        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/product/product_ajax",
            data: {
                "m_id":$(this).val(),
                "func_n":"get_product"
                }, 
            success: function (data) {
                $(".product").empty();
                $(".product").append(data);
               
            }
        });
        


    });




</script>
