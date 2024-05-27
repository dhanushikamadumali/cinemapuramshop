 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                   <h3>Register</h3>
                    <ul>
                        <li><a href="<?php echo base_url() ?>index.php">home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->
    
<!-- customer login start -->
<div class="customer_login">
    <div class="container">
        <div class="row">
          

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Register</h2>
                    <?= form_open_multipart("", array("id" => "inForm")); ?>
                       
                        <p>
                            <label>Customer Name  <span>*</span></label>
                            <input type="email" name="cname">
                            <span class="err err_cname required" style="font-size:10px; color: #F5576C !important" ></span>
                        </p>
                        <p>
                            <label>Address  <span>*</span></label>
                            <input type="text" name="address">
                            <span class="err err_address required" style="font-size:10px; color: #F5576C !important" ></span>
                        </p>
                        <p> 
                            <label>Mobile  <span>*</span></label>
                            <input type="text" name="mobile">
                            <span class="err err_mobile required" style="font-size:10px; color: #F5576C !important" ></span>
                        </p>
                        <p>
                            <label>Email<span>*</span></label>
                            <input type="text" name="email">
                            <span class="err err_email required" style="font-size:10px; color: #F5576C !important" ></span>
                        </p>
                        <p>
                            <label>Password <span>*</span></label>
                            <input type="password" name="pswrd">
                            <span class="err err_uname required" style="font-size:10px; color: #F5576C !important" ></span>
                        </p>
                        <div class="login_submit">
                            <button type="submit" class="save_btn">Register</button>
                        </div>
                        <?= form_close() ?> 
                </div>    
            </div>
            <!--register area end-->
        </div>
    </div>    
</div>
<!-- customer login end -->
<script type="text/javascript">

 $(".save_btn").click(function (e) {
    e.preventDefault(); 
    $form = $("#inForm"); 
    add_form($form);
    function add_form($form) { 
        var formdata = new FormData($form[0]);
        // formdata.append("func_n","ad_customer");
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/frontend/register_customer",
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
                    $(".err_uname").html(data.uname);
                    $(".err_pswrd").html(data.pswrd);
                   
                        $.each(data.errors, function(key,val) {
                            $(".err_"+key).html(val);
                        });
            
                }else{
                  
                    setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php/login";  },);
                }
            }
        });
    }
}); 
</script>