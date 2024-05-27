<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Customer Module</h4>
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
                                <h6>Edit customer</h6>
                            </div>
                            <div class="card-body py-md-30">
                            <?= form_open_multipart("", array("id" => "inForm")); ?>
                                    <?php
                                    if ($this->input->get('id')):
                                        $this->db->select('customer_information.*');
                                        $customer=$this->Common_model->get_all("customer_information",array('id' => $this->input->get('id')))->result();
                                        if ($customer !=NULL):
                                        
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-25" hidden>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"  name="cid"  value="<?php echo ($customer[0]->id) ?>"> 
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Customer id" name="customerid"  value="<?php echo ($customer[0]->customer_id) ?>" readonly> 
                                            <span class="err err_customerid required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Customer name" name="cname"  value="<?php echo ($customer[0]->customer_name) ?>"> 
                                            <span class="err err_cname required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Address" name="address"  value="<?php echo ($customer[0]->address) ?>"> 
                                            <span class="err err_address required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Mobile" name="mobile" value="<?php echo ($customer[0]->mobile) ?>" > 
                                            <span class="err err_mobile" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Details" name="details" value="<?php echo ($customer[0]->details) ?>"> 
                                            <span class="err err_details" style="font-size:10px; color: #F5576C !important" ></span>
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
        formdata.append("func_n","edit_customer");
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/customer/customer_ajax",
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".err").html("");
                if(data.status==false){
                    $(".err_cname").html(data.cname);
                    $(".err_address").html(data.address);
                    $(".err_mobile").html(data.mobile);
                    $(".err_details").html(data.details); 
                   
                        $.each(data.errors, function(key,val) {
                            $(".err_"+key).html(val);
                        });
            
                }else{
                   
                    setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php/customer/view_customer";  });
                }
            }
        });
    }
}); 
</script>
