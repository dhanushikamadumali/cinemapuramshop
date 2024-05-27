<header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <a href="<?php echo base_url()?>index.php/welcome" class="sidebar-toggle">
                    <img class="svg" src="<?php echo base_url()?>assets/img/svg/bars.svg" alt="img">
                </a>
                <a class="navbar-brand"href="<?php echo base_url()?>index.php/welcome" style="margin:0 auto;">
                    <img class="dark" src="<?php echo base_url()?>assets/content/logo/New_Brand2.png" alt="svg">
                    <img class="light" src="<?php echo base_url()?>assets/content/logo/New_Brand2.png" alt="img">
                </a>
                 
                    <?php if($this->Common_model->if_set_privileges("dashboard")): ?>
                      <a href="<?php echo base_url()?>index.php/welcome" ><button class="btn btn-default btn-squared btn-outline-primary mr-20">Dashboard</button></a> 
                    <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("view_pos")): ?>
                      <a href="<?php echo base_url()?>index.php/pos" ><button class="btn btn-default btn-squared btn-outline-primary mr-20">POS</button></a> 
                    <?php endif; ?> 
                    <?php if($this->Common_model->if_set_privileges("view_sales_order")): ?>
                    <!-- <a href="#" ><button class="btn btn-default btn-squared btn-outline-primary  " data-toggle="modal" data-target=".bd-example-modal-lg">Today Sales Order</button></a> -->
                      <a href="<?php echo base_url()?>index.php/sales/todaysales" ><button class="btn btn-default btn-squared btn-outline-primary mr-20" >Today Sales Order</button></a> 
                    <?php endif; ?>
                    <?php if($this->Common_model->if_set_privileges("view_sales_order")): ?>
                    <!-- <a href="#" ><button class="btn btn-default btn-squared btn-outline-primary  " data-toggle="modal" data-target=".bd-example-modal-lg">Today Sales Order</button></a> -->
                      <a href="<?php echo base_url()?>index.php/stoleitem/stole_payment" ><button class="btn btn-default btn-squared btn-outline-primary mr-20" >Stall Payment</button></a> 
                    <?php endif; ?> 
                 
                <div class="top-menu">
                    <div class="strikingDash-top-menu position-relative">
                        
                        
                
                        <ul>
                           
                            <!-- <li class="has-subMenu">
                                <a href="#" class="">Dashboard</a>
                                <ul class="subMenu">
                                    <li>
                                        <a class="" href="index.html">Social Media</a>
                                    </li>
                                    <li>
                                        <a class="" href="business.html">FineTech /
                                            Business</a>
                                    </li>
                                    <li>
                                        <a class="" href="performance.html">Site
                                            Performance</a>
                                    </li>
                                    <li>
                                        <a class="" href="ecommerce.html">Ecommerce</a>
                                    </li>
                                    <li>
                                        <a class="" href="crm.html">
                                            CRM</a>
                                    </li>
                                    <li>
                                        <a class="" href="sales.html">
                                            Sales Performance</a>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                    </div>

                </div>
            </div>
            <!-- ends: navbar-left -->

            <div class="navbar-right">
                <ul class="navbar-right__menu">
                     <li class="nav-search ">
                        <!--<a href="#" class="search-toggle">-->
                        <!--    <i class="la la-search"></i>-->
                        <!--    <i class="la la-times"></i>-->
                        <!--</a>-->
                        
                        <?php 	$this->db->limit(1);
			$this->db->order_by("id","desc");
			$accdate=$this->Common_model->get_all("cashier_open")->result();?>
                        
                        <div id="clockbox" style="text-align:center"></div> <?php
                                    // echo " " . date("Y/m/d");
//    return ($weekDay == 0 || $weekDay == 6);
                                    ?>
                                  
<script type="text/javascript">
var acc_date='<?php echo $accdate[0]->acc_date ?>';
var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

function GetClock(){
var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

var clocktext=acc_date+" "+nhour+":"+nmin+":"+nsec+ap+""; 
//'<i class="fa fa-clock-o"></i> '+""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+
document.getElementById('clockbox').innerHTML=clocktext;
}

GetClock();
setInterval(GetClock,1000);
</script>
                    </li>  
                    <li class="nav-message">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <span data-feather="mail"></span></a>
                            <div class="dropdown-wrapper">
                                <h2 class="dropdown-wrapper__title">Messages <span class="badge-circle badge-success ml-1">2</span></h2>
                                <ul>
                                    <li class="author-online has-new-message">
                                        <div class="user-avater">
                                            <img src="<?php echo base_url()?>assets/img/team-1.png" alt="">
                                        </div>
                                        <div class="user-message">
                                            <p>
                                                <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                                <span class="time-posted">3 hrs ago</span>
                                            </p>
                                            <p>
                                                <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                    dolor amet cosec Lorem ipsum</span>
                                                <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="author-offline has-new-message">
                                        <div class="user-avater">
                                            <img src="<?php echo base_url()?>assets/img/team-1.png" alt="">
                                        </div>
                                        <div class="user-message">
                                            <p>
                                                <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                                <span class="time-posted">3 hrs ago</span>
                                            </p>
                                            <p>
                                                <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                    dolor amet cosec Lorem ipsum</span>
                                                <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="author-online has-new-message">
                                        <div class="user-avater">
                                            <img src="<?php echo base_url()?>assets/img/team-1.png" alt="">
                                        </div>
                                        <div class="user-message">
                                            <p>
                                                <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                                <span class="time-posted">3 hrs ago</span>
                                            </p>
                                            <p>
                                                <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                    dolor amet cosec Lorem ipsum</span>
                                                <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="author-offline">
                                        <div class="user-avater">
                                            <img src="<?php echo base_url()?>assets/img/team-1.png" alt="">
                                        </div>
                                        <div class="user-message">
                                            <p>
                                                <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                                <span class="time-posted">3 hrs ago</span>
                                            </p>
                                            <p>
                                                <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                    dolor amet cosec Lorem ipsum</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="author-offline">
                                        <div class="user-avater">
                                            <img src="<?php echo base_url()?>assets/img/team-1.png" alt="">
                                        </div>
                                        <div class="user-message">
                                            <p>
                                                <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                                <span class="time-posted">3 hrs ago</span>
                                            </p>
                                            <p>
                                                <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum dolor amet cosec Lorem ipsum</span>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                                <a href="#" class="dropdown-wrapper__more">See All Message</a>
                            </div>
                        </div>
                    </li>
                    <!-- ends: nav-message
                    <li class="nav-notification">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <span data-feather="bell"></span></a>
                            <div class="dropdown-wrapper">
                                <h2 class="dropdown-wrapper__title">Notifications <span class="badge-circle badge-warning ml-1">4</span></h2>
                                <ul>
                                    <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--primary">
                                            <span data-feather="inbox"></span>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p>
                                                <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                                <span>sent you a message</span>
                                            </p>
                                            <p>
                                                <span class="time-posted">5 hours ago</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--secondary">
                                            <span data-feather="upload"></span>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p>
                                                <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                                <span>sent you a message</span>
                                            </p>
                                            <p>
                                                <span class="time-posted">5 hours ago</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--success">
                                            <span data-feather="log-in"></span>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p>
                                                <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                                <span>sent you a message</span>
                                            </p>
                                            <p>
                                                <span class="time-posted">5 hours ago</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--info">
                                            <span data-feather="at-sign"></span>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p>
                                                <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                                <span>sent you a message</span>
                                            </p>
                                            <p>
                                                <span class="time-posted">5 hours ago</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--danger">
                                            <span data-feather="heart"></span>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p>
                                                <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                                <span>sent you a message</span>
                                            </p>
                                            <p>
                                                <span class="time-posted">5 hours ago</span>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                                <a href="#" class="dropdown-wrapper__more">See all incoming activity</a>
                            </div>
                        </div>
                    </li> -->
                    <!-- ends: .nav-notification -->
                    <!-- <li class="nav-settings">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <span data-feather="settings"></span></a>
                            <div class="dropdown-wrapper dropdown-wrapper--large">
                                <ul class="list-settings">
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="<?php echo base_url()?>assets/img/mail.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="#" class="stretched-link">All Features</a>
                                            </h6>
                                            <p>Introducing Increment subscriptions </p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="<?php echo base_url()?>assets/img/color-palette.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="#" class="stretched-link">Themes</a>
                                            </h6>
                                            <p>Third party themes that are compatible</p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="<?php echo base_url()?>assets/img/home.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="#" class="stretched-link">Payments</a>
                                            </h6>
                                            <p>We handle billions of dollars</p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="<?php echo base_url()?>assets/img/video-camera.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="#" class="stretched-link">Design Mockups</a>
                                            </h6>
                                            <p>Share planning visuals with clients</p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="<?php echo base_url()?>assets/img/document.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="#" class="stretched-link">Content Planner</a>
                                            </h6>
                                            <p>Centralize content gethering and editing</p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="<?php echo base_url()?>assets/img/microphone.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="#" class="stretched-link">Diagram Maker</a>
                                            </h6>
                                            <p>Plan user flows & test scenarios</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li> -->
                    <!-- ends: .nav-settings -->
                    <!-- <li class="nav-support">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <span data-feather="help-circle"></span></a>
                            <div class="dropdown-wrapper">
                                <div class="list-group">
                                    <span>Documentation</span>
                                    <ul>
                                        <li>
                                            <a href="#">How to customize admin</a>
                                        </li>
                                        <li>
                                            <a href="#">How to use</a>
                                        </li>
                                        <li>
                                            <a href="#">The relation of vertical spacing</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="list-group">
                                    <span>Payments</span>
                                    <ul>
                                        <li>
                                            <a href="#">How to customize admin</a>
                                        </li>
                                        <li>
                                            <a href="#">How to use</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="list-group">
                                    <span>Content Planner</span>
                                    <ul>
                                        <li>
                                            <a href="#">How to customize admin</a>
                                        </li>
                                        <li>
                                            <a href="#">How to use</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <!-- ends: .nav-support -->
                  

                    <?php 
                        $userdetails = $this->Common_model->get_all('system_user',["id"=>$this->session->userdata("user_id")])->result();
                        $manufaturerdetails = $this->Common_model->get_all('manufacturer_information',["id"=>$this->session->userdata("manufaturer_id")])->result();
                  // var_dump($this->session->userdata("user_id"));
                   ?>

                    <li>
                    <?php  echo ($manufaturerdetails)?$manufaturerdetails[0]->manufacturer_name:NULL ?>
                    </li>
                    <!-- ends: .nav-flag-select -->
                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><img src="<?php echo base_url()?>assets/content/user_images/<?php  echo $userdetails[0]->image ?>" alt="" class="rounded-circle"></a>
                            <div class="dropdown-wrapper">
                                <div class="nav-author__info">
                                    <div class="author-img">
                                        <img src="<?php echo base_url()?>assets/content/user_images/<?php  echo $userdetails[0]->image ?>" alt="" class="rounded-circle">
                                    </div>
                                    <div>
                                        <h6>
                                        <?php  echo $userdetails[0]->name ?>
                                        </h6>
                                        <span>
                                        <?php  echo $userdetails[0]->email ?> 
                                        </span>
                                    </div>
                                </div>
                                <div class="nav-author__options">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span data-feather="user"></span> Profile</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span data-feather="settings"></span> Settings</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#">
                                                <span data-feather="key"></span> Billing</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span data-feather="users"></span> Activity</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span data-feather="bell"></span> Help</a>
                                        </li> -->
                                    </ul>
                                    <a href="<?php echo base_url() ?>index.php/logout" class="nav-author__signout">
                                        <span data-feather="log-out"></span> Sign Out</a>
                                </div>
                            </div>
                            <!-- ends: .dropdown-wrapper -->
                        </div>
                    </li>
                    <!-- ends: .nav-author -->
                </ul>
                <!-- ends: .navbar-right__menu -->
                <div class="navbar-right__mobileAction d-md-none">
                    <!--<a href="#" class="btn-search">-->
                    <!--    <span data-feather="search"></span>-->
                    <!--    <span data-feather="x"></span></a>-->
                    <a href="#" class="btn-author-action">
                        <span data-feather="more-vertical"></span></a>
                </div>  
            </div>
            <!-- ends: .navbar-right -->
        </nav>
    </header>