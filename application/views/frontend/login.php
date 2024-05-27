 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                   <h3>Login</h3>
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
           <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>login</h2>
                    <?= form_open_multipart("", array("id" => "inForm")); ?>
                        <p>   
                            <label>Mobile or Email <span>*</span></label>
                            <input type="text" name="uname" >
                            <span class="err err_uname" style="color:red;font-size:10px" ></span>
                         </p>
                         <p>   
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="pswrd">
                            <span class="err err_password" style="color:red;font-size:10px" ></span>
                         </p>   
                        <div class="login_submit">
                           <!--<a href="#">Lost your password?</a>-->
                           <!-- <label for="remember">-->
                           <!--     <input id="remember" type="checkbox">-->
                           <!--     Remember me-->
                           <!-- </label>-->
                            <button type="submit" class="save_btn">login</button>
                                
                        </div>

                        <?= form_close() ?> 
                 </div>    
            </div>
            <!--login area start-->
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
        var cntrl = "Frontend";
        var mthd = "customer_login";
        var formdata = new FormData($form[0]);
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
                    $(".err_uname").html(data.uname);
                    $(".err_password").html(data.pswrd);
                    notification_message("error","Error Occurred ! Please Check the fields.");
                        $.each(data.errors, function(key,val) {
                            $(".err_"+key).html(val);
                        });
                }else{
                    
                    // notification_message("info", "User Login Successfully!!");
                    setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php";  });
                }
                
            }
        });
    }


}); //End save btn click
</script>