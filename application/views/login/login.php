<!doctype html>
<html lang="en" dir="ltr">


<!-- Mirrored from demo.jsnorm.com/html/strikingdash/strikingdash/ltr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Jul 2022 02:54:26 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply Bright Solutions</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- inject:css-->

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugin.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/style.css">

    <!-- endinject -->
    
    <link rel="icon" type="image/png"href="<?php echo base_url()?>assets/content/logo/New_Brand2.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/notifications/css/lobibox.min.css"/>
</head>

<body>
    <main class="main-content">

        <div class="signUP-admin">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-5 p-0">
                        <div class="signUP-admin-left signIn-admin-left position-relative">
                            <!-- <div class="signUP-overlay"> 
                            <img class="light" src="<?php echo base_url()?>assets/content/logo/New_Brand2.png" alt="img">
                                <img class="svg signupBottom" src="<?php echo base_url()?>assets/img/svg/signupbottom.html" alt="img" />
                            </div> -->
                            <div class="signUP-admin-left__content">
                                <div class="text-capitalize mb-md-30 mb-15 d-flex align-items-center justify-content-md-start justify-content-center">
                                    <!-- <a class="wh-36 bg-primary text-white radius-md mr-10 content-center" href="index.html"> -->
                                    <!-- <img class=" wh-36 content-center" src="<?php echo base_url()?>assets/content/logo/New_Brand2.png" alt="img"> -->
                                    <!-- </a> -->
                                    <!-- <span class="text-dark">admin</span> -->
                                    <img class="light" src="<?php echo base_url()?>assets/content/logo/New_Brand2.png" alt="img" style="width:100%">
                                </div>
                                <h1>Cinema Puram POS System </h1>
                            </div><!-- End: .signUP-admin-left__content  -->
                            <div class="signUP-admin-left__img">
                                <img class="img-fluid svg" src="<?php echo base_url()?>assets/img/svg/signupIllustration.svg" alt="img" />
                            </div><!-- End: .signUP-admin-left__img  -->
                        </div><!-- End: .signUP-admin-left  -->
                    </div><!-- End: .col-xl-4  -->
                    <div class="col-xl-8 col-lg-7 col-md-7 col-sm-8">
                        <div class="signUp-admin-right signIn-admin-right  p-md-40 p-10">
                            <div class="signUp-topbar d-flex align-items-center justify-content-md-end justify-content-center mt-md-0 mb-md-0 mt-20 mb-1">
                                <!-- <p class="mb-0">
                                    Don't have an account?
                                    <a href="sign-up.html" class="color-primary">
                                        Sign up
                                    </a>
                                </p> -->
                            </div><!-- End: .signUp-topbar  -->
                            <div class="row justify-content-center">
                                <div class="col-xl-7 col-lg-8 col-md-12">
                                    <div class="edit-profile mt-md-25 mt-0">
                                        <div class="card border-0">
                                            <div class="card-header border-0  pb-md-15 pb-10 pt-md-20 pt-10 ">
                                                <div class="edit-profile__title">
                                                    <h6>Sign up to <span class="color-primary">Admin</span></h6>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                            <?= form_open_multipart("", array("id" => "inForm")); ?>
                                                <div class="edit-profile__body">
                                                    <div class="form-group mb-20">
                                                        <label for="username">Username or Email Address</label>
                                                        <input type="text" class="form-control"  name="uname" placeholder="Username">
                                                        <span class="err err_uname" style="color:red;font-size:10px" ></span>
                                                    </div>
                                                    <div class="form-group mb-15">
                                                        <label for="password-field">password</label>
                                                        <div class="position-relative">
                                                            <input id="password-field" type="password" class="form-control" name="pswrd" placeholder="Password">
                                                            <div class="fa fa-fw fa-eye-slash text-light fs-16 field-icon toggle-password2"></div>
                                                            <span class="err err_password" style="color:red;font-size:10px" ></span>
                                                        </div>
                                                    </div>
                                                    <div class="signUp-condition signIn-condition">
                                                        <!-- <div class="checkbox-theme-default custom-checkbox ">
                                                            <input class="checkbox" type="checkbox" id="check-1">
                                                            <label for="check-1">
                                                                <span class="checkbox-text">Keep me logged in</span>
                                                            </label>
                                                        </div> -->
                                                        <!-- <a href="forget-password.html">forget password</a> -->
                                                    </div>
                                                    <div class="button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                        <button class="btn btn-primary btn-default btn-squared mr-15 text-capitalize lh-normal px-50 py-15 signIn-createBtn save_btn ">
                                                            sign in
                                                        </button>
                                                    </div>
                                                    <!-- <p class="social-connector text-center mb-sm-25 mb-15  mt-sm-30 mt-20"><span>Or</span></p>
                                                    <div class="button-group d-flex align-items-center justify-content-md-start justify-content-center">
                                                        <ul class="signUp-socialBtn">
                                                            <li>
                                                                <button class="btn text-dark px-30"><img class="svg" src="<?php echo base_url()?>assets/img/svg/google.svg" alt="img" /> Sign up with
                                                                    Google</button>
                                                            </li>
                                                            <li>
                                                                <button class=" radius-md wh-48 content-center"><img class="svg" src="<?php echo base_url()?>assets/img/svg/facebook.svg" alt="img" /></button>
                                                            </li>
                                                            <li>
                                                                <button class="radius-md wh-48 content-center"><img class="svg" src="<?php echo base_url()?>assets/img/svg/twitter.svg" alt="img" /></button>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                </div>
                                            </div><!-- End: .card-body -->
                                            <?= form_close() ?> 
                                        </div><!-- End: .card -->
                                    </div><!-- End: .edit-profile -->
                                </div><!-- End: .col-xl-5 -->
                            </div>
                        </div><!-- End: .signUp-admin-right  -->
                    </div><!-- End: .col-xl-8  -->
                </div>
            </div>
        </div><!-- End: .signUP-admin  -->

    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <!-- <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div> -->
        </span>
    </div>
 
  

    <!-- inject:js-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <script src="<?php echo base_url()?>assets/js/plugins.min.js"></script>

    <script src="<?php echo base_url()?>assets/js/script.min.js"></script>
        <!--notification js -->
    <script src="<?= base_url() ?>assets/plugins/notifications/js/lobibox.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/notifications/js/notifications.min.js"></script>

    <script type="text/javascript">
        function notification_message(success_status,message,size = false){
			if (size){
				n_size = 'large';
			}else{
				n_size = 'mini';
				}

			if (success_status == 'success'){
				var icon_class = 'fa-check-circle';
				var msg_status = '<b>Success</b> <br>';
			}

			if (success_status == 'error'){
				var icon_class = 'fa-times-circle';
				var msg_status = '<b>Error</b> <br>';
			}

			if (success_status == 'warning'){
				var icon_class = 'fa-exclamation-circle';
				var msg_status = '<b>Warning</b> <br>';
			}

			if (success_status == 'info'){
				var icon_class = 'fa-info-circle';
				var msg_status = '<b>Info</b> <br>';
			}

			Lobibox.notify(success_status, {
				pauseDelayOnHover: true,
				size: n_size,
				icon: 'fa '+icon_class,
				continueDelayOnInactiveTab: false,
				position: 'bottom right',
				msg: msg_status+' '+message
			});
		}

        $(".save_btn").click(function (e) {
        e.preventDefault();
        $form = $("#inForm"); 
        add_form($form);
        function add_form($form) {
            var cntrl = "Login";
            var mthd = "admin_login_validation";
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
                        $(".err_uname").html(data.mobile);
                        $(".err_password").html(data.password);
                        notification_message("error","Error Occurred ! Please Check the fields.");
                            $.each(data.errors, function(key,val) {
                                $(".err_"+key).html(val);
                            });
                    }else{
                    
                        // notification_message("info", "User Login Successfully!!");
                        setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php/welcome";  });
                    }
                
                }
            });
        }


    }); //End save btn click
    </script>


    <!-- endinject-->
</body>


<!-- Mirrored from demo.jsnorm.com/html/strikingdash/strikingdash/ltr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Jul 2022 02:54:30 GMT -->
</html>