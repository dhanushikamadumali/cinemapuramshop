<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="facebook-domain-verification" content="dw95gxw31hyrhfawabayg6vmkkifa7" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinemapuram Operation Management System</title>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" integrity="sha512-0SPWAwpC/17yYyZ/4HSllgaK7/gg9OlVozq8K7rf3J8LvCjYEEIfzzpnA2/SSjpGIunCSD18r3UhvDcu/xncWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <!-- inject:css-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugin.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/style.css">
    <!-- endinject -->
    <link rel="icon" type="image/png"href="<?php echo base_url()?>assets/content/logo/New_Brand2.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/notifications/css/lobibox.min.css"/>
    	<!-- Font Awesome -->
	<link href="<?= base_url() ?>assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/fontawesome/css/regular.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/fontawesome/css/solid.min.css" rel="stylesheet"> 
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/b-2.2.3/b-html5-2.2.3/datatables.min.css"/> --

<!-- <scrip type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/b-2.2.3/b-html5-2.2.3/datatables.min.js"></scrip> -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jszip-2.5.0/b-2.2.3/b-html5-2.2.3/datatables.min.js"></script> 
</head>
<style>
    select{
        -webkit-appearance:auto !important;
    }
    </style>

<body class="layout-light side-menu overlayScroll">
    <!-- <div class="mobile-search">
        <form class="search-form">
            <span data-feather="search"></span>
            <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
        </form>
    </div> -->

    <div class="mobile-author-actions"></div>
    
<?php $this->load->view('template/header_menu'); ?>

    <main class="main-content">

        <aside class="sidebar"  >
            <div class="sidebar__menu-group">
                <ul class="sidebar_nav">
                    <li class="menu-title">
                        <span>Main menu</span>
                    </li>
                    <?php if($this->Common_model->if_set_privileges("dashboard")): ?>
                    <li>
                        <a href="<?php echo base_url()?>index.php/welcome" class="">
                            <span data-feather="home" class="nav-icon"></span>
                            <span class="menu-text">Dashboard</span>
                            
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("view_pos")): ?>
                    <li >
                        <a href="<?php echo base_url()?>index.php/Pos"  class="">
                            <span class="nav-icon fa fa-cart-arrow-down"></span>
                            <span class="menu-text">Pos</span>
                            
                        </a>
                    </li>
                    <?php endif; ?>
                   
                   <?php if($this->Common_model->if_set_privileges("sales_order")): ?>
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon fa fa-cart-arrow-down"></span>
                            <span class="menu-text">Sales Order</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if($this->Common_model->if_set_privileges("view_sales_order")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Sales" class="">View Order</a>
                            </li>
                            <?php endif; ?>
                            
                            <li>
                                <a href="<?php echo base_url()?>index.php/Sales/settle_payment" class="">Settle Payment</a>
                            </li>
                            <?php if($this->Common_model->if_set_privileges("void_sales")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Sales/void_sales" class="">Void Sales</a>
                            </li> 
                            <?php endif; ?>
                        </ul>
                      
                      
                      
                    </li>
                    <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("customer")): ?>
                    <li class="has-child"  style="border-top:1px solid #ccc">
                        <a href="#" class="">
                           
                            <span class="nav-icon far fa-user"></span>
                            <span class="menu-text">Customer</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if($this->Common_model->if_set_privileges("add_customer")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/customer" class="">Add Customer</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_customer")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/customer/view_customer" class="">View Customer</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                       
                      
                    </li>
                    <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("product")): ?>
                    <li class="has-child" style="border-top:1px solid #ccc">
                        <a href="#" class="">
                            <span data-feather="folder" class="nav-icon"></span>
                            <span class="menu-text">Product</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>  <?php if($this->Common_model->if_set_privileges("add_product")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/product/add_product" class="">Add Product</a>
                            </li>

                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_product")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/product/view_product" class="">View Product</a>
                            </li>
                            <?php endif; ?>
                           
                        </ul>
                      
                    </li>
                    <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("manufacturer")): ?>
                    <li class="has-child">
                        <a href="#" class="">
                            <span data-feather="folder" class="nav-icon"></span>
                            <span class="menu-text">Manufature</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if($this->Common_model->if_set_privileges("add_manufature")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/product/add_manu" class="">Add Manufature</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_manufature")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/product/view_manu" class="">View Manufature</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("add_category")): ?>
                    <li class="has-child">
                        <a href="#" class="">
                            <span data-feather="folder" class="nav-icon"></span>
                            <span class="menu-text">Category</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if($this->Common_model->if_set_privileges("add_category")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/product" class="">Add Category</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_category")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/product/view_category" class="">View Category</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("unit")): ?>
                    <li class="has-child">
                        <a href="#" class="">
                            <span data-feather="folder" class="nav-icon"></span>
                            <span class="menu-text">Unit</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if($this->Common_model->if_set_privileges("add_unit")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/product/add_unit" class="">Add Unit</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_unit")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/product/view_unit" class="">View Unit</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    
                    
                    <?php if($this->Common_model->if_set_privileges("report")): ?>
                    <li class="has-child"  style="border-top:1px solid #ccc">
                        <a href="#" class="">
                            <span data-feather="folder" class="nav-icon"></span>
                            <span class="menu-text">Report</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if($this->Common_model->if_set_privileges("supplier_detail_report")): ?>
                            <!--<li>-->
                            <!--    <a href="<?php echo base_url()?>index.php/supplier/view_supplier" class="">Supplier Details</a>-->
                            <!--</li>-->
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("supplier_purchase_report")): ?>
                            <!--<li>-->
                            <!--    <a href="<?php echo base_url()?>index.php/supplier/supplier_purchase" class="">Supplier Purchase</a>-->
                            <!--</li>-->
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("supplier_payment_report")): ?>
                            <!--<li>-->
                            <!--    <a href="<?php echo base_url()?>index.php/Payment/view_payment" class="">Supplier Payment</a>-->
                            <!--</li>-->
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("customer_detail_report")): ?>
                            <!--<li>-->
                            <!--    <a href="<?php echo base_url()?>index.php/customer/view_customer" class="">Customer Details</a>-->
                            <!--</li>-->
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("customer_order_report")): ?>
                            <!--<li>-->
                            <!--    <a href="<?php echo base_url()?>index.php/customer/customer_sales_order" class="">Customer Sales Order</a>-->
                            <!--</li>-->
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("purchase_detail_report")): ?>
                            <!--<li>-->
                            <!--    <a href="<?php echo base_url()?>index.php/purchase/view_purchase" class="">Purchase Details</a>-->
                            <!--</li>-->
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("purchase_product_detail_report")): ?>
                            <!--<li>-->
                            <!--    <a href="<?php echo base_url()?>index.php/purchase/purchase_product" class="">Purchase product Details</a>-->
                            <!--</li>-->
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("sales_report")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/report/sales_report" class="">1 Stall Product Sales Monthly</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("stole_report")): ?>
                            <!--<li>-->
                            <!--    <a href="<?php echo base_url()?>index.php/report/stole_sales_report" class="">2 All Stall Sales Report</a>-->
                            <!--</li>-->
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("sales_weekly_report")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/report/weeklysales" class="">3 Stall Sales Weekly Report</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("sales_dailly_report")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/report/sales_dailly" class="">4 Sales Dailly Report</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("sales_dailly_report")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/report/daily_stall_report" class="">5 WA Stall Sales Dailly</a>
                            </li>
                            <?php endif; ?>
                             <?php if($this->Common_model->if_set_privileges("sales_dailly_report")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/report/stall_item_date_report" class="">6 Stall Item Date report</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("pick_me_report")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/index.php/product/pick_me_food" class="">Pickme Report</a>
                            </li>
                            <?php endif; ?>
                            
                            
                            <li>
                                <a href="<?php echo base_url()?>index.php/report/service_charge" class="">Service Charge Report</a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url()?>index.php/report/stall_daterange" class="">Stall Date Report</a>
                            </li>
                            
                            
                             <?php if($this->Common_model->if_set_privileges("employee_attendance_report")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/report/employee_attendance" class="">Employee Attendance Report</a>
                            </li>
                            <?php endif; ?>
                             <?php if($this->Common_model->if_set_privileges("sales_dailly_report")): ?>
                            <!--<li>-->
                            <!--    <a href="<?php echo base_url()?>index.php/sales/stall_date_report" class="">Stall date report</a>-->
                            <!--</li>-->
                            <?php endif; ?>
                            
                        </ul>
                      
                    </li>
                    <?php endif; ?>
                    
                    
                  
                    
                    
                    
                    <?php if($this->Common_model->if_set_privileges("stole_item")): ?>
                    <li class="has-child">
                        <a href="#" class="">
                            <span data-feather="folder" class="nav-icon"></span>
                            <span class="menu-text">Stall & Item</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if($this->Common_model->if_set_privileges("item_availability")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/stoleitem/item_availability" class="">Item Availability</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("today_item_availability")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/stoleitem/today_item_availability" class="">Today Available Item</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("stole_order")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/stoleitem/stole_order" class="">Stall order</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("today_kot")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/stoleitem/today_kot" class="">Today KOT</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("all_kot")&& false): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/stoleitem/all_kot" class="">All KOT</a>
                            </li>
                            <?php endif; ?>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("stole_payment")): ?>
                    <li class="has-child">
                        <a href="#" class="">
                            <span data-feather="folder" class="nav-icon"></span>
                            <span class="menu-text">Stall Payment</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                           <?php if($this->Common_model->if_set_privileges("add_stole_payment")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/stoleitem/stole_payment" class="">Stall payment</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_stole_payment")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/stoleitem/view_stole_payment" class="">View Stall payment</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_single_stall_payment")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/stoleitem/view_single_stall_payment" class="">View My payment</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                   
                    <?php if($this->Common_model->if_set_privileges("employee")): ?>
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon far fa-user"></span>
                            <span class="menu-text">Employee</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Employee" class="">Add Employee</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Employee/view_employee" class="">View Employee</a>
                            </li> 
                            <li>
                                <a href="<?php echo base_url()?>index.php/Employee/employee_attendance" class="">Employee Attendance</a>
                            </li> 
                        </ul>
                    </li>
                     <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("bank")): ?>
                    <li class="has-child"  style="border-top:1px solid #ccc">
                        <a href="#" class="">
                            <span class="nav-icon fas fa-money-check-alt"></span>
                            <span class="menu-text">Bank</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                        <?php if($this->Common_model->if_set_privileges("add_bank")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Bankcompany" class="">Add Bank</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("View_bank")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Bankcompany/view_bank_company" class="">View Bank</a>
                            </li>
                            <?php endif; ?>
                        </ul> 
                    </li>
                    <?php endif; ?>
                     <?php if($this->Common_model->if_set_privileges("user_role")): ?>
                    
                        <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon far fa-user"></span>
                            <span class="menu-text">User role</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                        <?php if($this->Common_model->if_set_privileges("add_user_role")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Userrole" class="">Add User Role</a>
                            </li> 
                            <?php endif; ?>
                              <?php if($this->Common_model->if_set_privileges("view_user_role")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Userrole/view_user_role" class="">View User Role</a>
                            </li>
                        <?php endif; ?>
                           
                        </ul>
                    </li>
                   <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("user")): ?>
                    <li class="has-child">
                        <a href="#" class="">
                            <span class="nav-icon far fa-user"></span>
                            <span class="menu-text">Users</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <?php if($this->Common_model->if_set_privileges("add_user")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/User" class="">Add User</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_user")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/User/view_user" class="">View User</a>
                            </li> 
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    
                    <li class="has-child" style="display:none">
                        <a href="#" class="">
                            <span data-feather="folder" class="nav-icon"></span>
                            <span class="menu-text">Parchase</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Purchase" class="">Add Parchase</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Purchase/view_purchase" class="">View Parchase</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Payment" class="">Add purchase payment</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>index.php/Payment/view_payment" class="">View purchase payment</a>
                            </li>
                        </ul>
                      
                    </li>
                 <?php if($this->Common_model->if_set_privileges("supplier")): ?>
                    <li class="has-child"  style="display:none">
                        <a href="#" class="">
                            
                            <span class="nav-icon fas fa-users"></span>
                            <span class="menu-text">Supplier</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                        <?php if($this->Common_model->if_set_privileges("add_supplier")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/supplier" class="">Add Supplier</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_supplier")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/supplier/view_supplier" class="">View Supplier</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                      
                    </li>
                    <?php endif; ?>
                     <?php if($this->Common_model->if_set_privileges("branch")): ?>
                    <li class="has-child"  style="border-top:1px solid #ccc;display:none">
                        <a href="#" class="">
                          
                            <span class="nav-icon fas fa-money-check"></span>
                            <span class="menu-text">Branch</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                        <?php if($this->Common_model->if_set_privileges("add_branch")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/branch" class="">Add Branch</a>
                            </li>
                            <?php endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_branch")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/branch/view_branch" class="">View Branch</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                      
                    </li>
                    <?php endif; ?>
                    <?php  if($this->Common_model->if_set_privileges("employee")): ?>
                    <li class="has-child"  style="border-top:1px solid #ccc">
                        <a href="#" class=""> 
                            <span class="nav-icon fas fa-money-check"></span>
                            <span class="menu-text">Employee</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                        <?php if($this->Common_model->if_set_privileges("add_employee")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/employee" class="">Add Employee</a>
                            </li>
                            <?php  endif; ?>
                            <?php if($this->Common_model->if_set_privileges("view_employee")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/employee/employee_view" class="">View Employee</a>
                            </li>
                            <?php endif; ?>
                             <?php if($this->Common_model->if_set_privileges("employee_attendance")): ?>
                            <li>
                                <a href="<?php echo base_url()?>index.php/employee/employee_attendance" class="">Employee Attendance</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                      
                    </li>
                    <?php  endif; ?>
                    
                    <?php  if($this->Common_model->if_set_privileges("featured_product")): ?>
                    <li   style="border-top:1px solid #ccc">
                        <a href="<?php echo base_url()?>index.php/product/featured_product" class=""> 
                            <span class="nav-icon fas fa-money-check"></span>
                            <span class="menu-text">Featured Product</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul> 
                        </ul> 
                    </li> 
                    <?php  endif; ?>
                    
                </ul>
            </div>
        </aside>