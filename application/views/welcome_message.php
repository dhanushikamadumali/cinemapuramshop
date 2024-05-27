<div class="contents">

<div class="container-fluid">
    <div class="row ">
        <div class="col-lg-12">

            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Dashboard</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <div class="action-btn">

                        <!-- <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <span class="input-icon icon-left">
                                    <span data-feather="calendar"></span>
                                </span>
                                <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">
                                <span class="input-icon icon-right">
                                    <span data-feather="chevron-down"></span>
                                </span>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="dropdown action-btn">
                        <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <span class="dropdown-item">Export With</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="la la-print"></i> Printer</a>
                            <a href="#" class="dropdown-item">
                                <i class="la la-file-pdf"></i> PDF</a>
                            <a href="#" class="dropdown-item">
                                <i class="la la-file-text"></i> Google Sheets</a>
                            <a href="#" class="dropdown-item">
                                <i class="la la-file-excel"></i> Excel (XLSX)</a>
                            <a href="#" class="dropdown-item">
                                <i class="la la-file-csv"></i> CSV</a>
                        </div>
                    </div> -->
                    <!-- <div class="dropdown action-btn">
                        <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-share"></i> Share
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                            <span class="dropdown-item">Share Link</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="la la-facebook"></i> Facebook</a>
                            <a href="#" class="dropdown-item">
                                <i class="la la-twitter"></i> Twitter</a>
                            <a href="#" class="dropdown-item">
                                <i class="la la-google"></i> Google</a>
                            <a href="#" class="dropdown-item">
                                <i class="la la-feed"></i> Feed</a>
                            <a href="#" class="dropdown-item">
                                <i class="la la-instagram"></i> Instagram</a>
                        </div>
                    </div> -->
                    <!-- <div class="action-btn">
                        <a href="#" class="btn btn-sm btn-primary btn-add">
                            <i class="la la-plus"></i> Add New</a>
                    </div> -->
                </div>
            </div>

        </div>
        
        <?php if($this->Common_model->if_set_privileges("db_todayorderscount")): ?>
        <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
            <!-- Card 1 -->
            <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                <div>
                    <div class="overview-content">
                        <?php
                         $ordercount =$this->db->query('SELECT count(*) as ordercount from sales_order where  status=1 AND MONTH(acc_date)=MONTH(now()) and YEAR(acc_date)=YEAR(now())')->result();
                            
                         $todayordercount = $this->db->query('SELECT count(id) as todaycount from sales_order where status=1 AND DATE(`acc_date`)="'.date("Y-m-d").'"')->result();  
                        ?>
                        <h1><?php echo $todayordercount[0]->todaycount ?></h1>
                        <p>Today Orders</p>
                        <div class="ap-po-details-time">
                            <!--<span class="color-success"><i class="las la-arrow-up"></i>-->
                            <!--    <strong>25%</strong></span>-->
                            <!--<small>Since last week</small>-->
                        </div>
                    </div>

                </div>
                <div class="ap-po-timeChart">
                    <div class="overview-single__chart d-md-flex align-items-end">
                        <div class="parentContainer">


                            <div>
                                <canvas id="mychart8"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 1 End -->
        </div>
        <?php endif; ?>
        <?php if($this->Common_model->if_set_privileges("db_todayrevenue")): ?>
        <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
            <!-- Card 2 End  -->
            <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                <div>
                    <div class="overview-content">
                        <?php
                        // $order =$this->db->query('SELECT SUM(total_amount) as totalorder from sales_order where MONTH(acc_date)=MONTH(now()) and YEAR(acc_date)=YEAR(now())')->result();
                            //MONTH(acc_date)=MONTH(now()) and YEAR(acc_date)=YEAR(now())
                         
                         $order =$this->db->query('SELECT SUM(total_amount) as totalorder from sales_order where  status=1 AND date(acc_date)="'.date("Y-m-d").'"')->result();
                         $totalorder = $order[0]-> totalorder;
                        ?>
                        <h1><?php echo number_format( $totalorder, 2, '.', ', ')?></h1>
                        <p>Today Revenue</p>
                        <div class="ap-po-details-time">
                            <!--<span class="color-success"><i class="las la-arrow-up"></i>-->
                            <!--    <strong>25%</strong></span>-->
                            <!--<small>Since last week</small>-->
                        </div>
                    </div>

                </div>
                <div class="ap-po-timeChart">
                    <div class="overview-single__chart d-md-flex align-items-end">
                        <div class="parentContainer">


                            <div>
                                <canvas id="mychart9"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2 End  -->
        </div>
         <?php endif; ?>
        <?php if($this->Common_model->if_set_privileges("db_todayavgrevenue")): ?>
        <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
            <!-- Card 3 -->
            <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                <div>
                    <div class="overview-content">
                    <?php 
                    $totalorder = floatval($order[0]-> totalorder);
                    $orcount = count($this->db->query('SELECT id from sales_order where  status=1 AND date(acc_date)="'.date("Y-m-d").'"')->result());
                //   var_dump($totalorder);
                //   var_dump($orcount);
                    ?>
                        <h1><?php echo ( $totalorder == 0)? "0.00": number_format($totalorder/$orcount , 2, '.', ', ')?></h1>
                        <p>Today Avg. Order Value</p>
                        <div class="ap-po-details-time">
                            <!--<span class="color-danger"><i class="las la-arrow-down"></i>-->
                            <!--    <strong>25%</strong></span>-->
                            <!--<small>Since last week</small>-->
                        </div>
                    </div>

                </div>
                <div class="ap-po-timeChart">
                    <div class="overview-single__chart d-md-flex align-items-end">
                        <div class="parentContainer">


                            <div>
                                <canvas id="mychart10"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3 End -->
        </div>
         <?php endif; ?>
        <?php if($this->Common_model->if_set_privileges("db_thismonth_ordercnt")): ?>
        <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
            <!-- Card 1 -->
            <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                <div>
                    <div class="overview-content">
                    <h1><?php echo $ordercount[0]->ordercount ?></h1>
                        <p>This Month Orders</p>
                        <div class="ap-po-details-time">
                            <!--<span class="color-success"><i class="las la-arrow-up"></i>-->
                            <!--    <strong>25%</strong></span>-->
                            <!--<small>Since last week</small>-->
                        </div>
                    </div>

                </div>
                <div class="ap-po-timeChart">
                    <div class="overview-single__chart d-md-flex align-items-end">
                        <div class="parentContainer">


                            <div>
                                <canvas id="mychart11"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 1 End -->
        </div>
         <?php endif; ?>
         <?php if($this->Common_model->if_set_privileges("db_month_chart1")): ?>
        <div class="col-xxl-6 mb-30"> 
                <div class="card broder-0">
                    <div class="card-header">
                        <h6>Total Revenue</h6>
                        <div class="card-extra">
                            <ul class="card-tab-links mr-3 nav-tabs nav" role="tablist">
                                <li>
                                    <a class="active" href="#tl_revenue-week" data-toggle="tab" id="tl_revenue-week-tab" role="tab" aria-selected="true"></a>
                                </li> 
                            </ul>
                            <div class="dropdown dropleft"> 
                            </div>
                        </div>
                    </div>
                    <!-- ends: .card-header -->
                    <div class="card-body pt-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tl_revenue-week" role="tabpanel" aria-labelledby="tl_revenue-week-tab">
                                <div class="revenue-labels">
<!--                                    <div>
                                        <strong class="text-primary">$72,848</strong>
                                        <span>Current Period</span>
                                    </div>
                                    <div>
                                        <strong>$52,458</strong>
                                        <span>Previous Period</span>
                                    </div>-->
                                </div>
                                <!-- ends: .performance-stats -->
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                                
                                <div class="wp-chart">
                                    <div class="parentContainer">

<canvas id="speedChart" width="600" height="200"></canvas> 
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <!-- ends: .card-body -->
                </div>

            </div>
             <?php endif; ?>
            
            
           <?php  if( $this->session->userdata("manufaturer_id")!=null ):
            $this->db->limit(1);
                    $this->db->order_by("id","desc");
                    $accdate=$this->Common_model->get_all("cashier_open")->result();
           
           ?>
            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
            <!-- Card 1 -->
            <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                <div>
                    <div class="overview-content">
                        <?php
                        //  $ordercount =$this->db->query('SELECT count(*) as ordercount from sales_order where  status=1 AND MONTH(acc_date)=MONTH(now()) and YEAR(acc_date)=YEAR(now())')->result();
                        $query=$this->db->query('SELECT SUM(total_price) as pricesum FROM `sales_order_details` RIGHT JOIN product_information as pi ON pi.id=sales_order_details.product_id WHERE pi.manufacturer_id='.$this->session->userdata("manufaturer_id").' AND sales_order_details.status=1 AND date(acc_date)="'.$accdate[0]->acc_date.'"')->result();
                        //  $todayordercount = $this->db->query('SELECT count(id) as todaycount from sales_order where status=1 AND DATE(`acc_date`)="'.date("Y-m-d").'"')->result();  
                        // var_dump( $todaytotalkotrevanue);   WHERE  date("Y-m-d")
                        $ftotal=0;
                       ?>
                         <h1> <?php echo  number_format($query[0]->pricesum,2,".",",");$ftotal+=$query[0]->pricesum ?></h1>
                        <p>Today Sales Orders</p>
                        <div class="ap-po-details-time">
                            <!--<span class="color-success"><i class="las la-arrow-up"></i>-->
                            <!--    <strong>25%</strong></span>-->
                            <!--<small>Since last week</small>-->
                        </div>
                    </div>

                </div>
                <div class="ap-po-timeChart">
                    <div class="overview-single__chart d-md-flex align-items-end">
                        <div class="parentContainer">


                            <div>
                                <canvas id="mychart8"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 1 End -->
        </div>
        
        <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
            <!-- Card 2 End  -->
            <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                <div>
                    <div class="overview-content">
                          <?php
                        //  $ordercount =$this->db->query('SELECT count(*) as ordercount from sales_order where  status=1 AND MONTH(acc_date)=MONTH(now()) and YEAR(acc_date)=YEAR(now())')->result();
                        $query=$this->db->query('SELECT SUM(total_price) as pricesum FROM `sales_order_details` JOIN product_information as pi ON pi.id=sales_order_details.product_id WHERE pi.manufacturer_id='.$this->session->userdata("manufaturer_id") .' AND  sales_order_details.status=1 AND MONTH(acc_date)=MONTH(now()) and YEAR(acc_date)=YEAR(now())')->result();
                        //  $todayordercount = $this->db->query('SELECT count(id) as todaycount from sales_order where status=1 AND DATE(`acc_date`)="'.date("Y-m-d").'"')->result();  
                        // var_dump( $todaytotalkotrevanue);
                        $ftotal=0;
                       ?>
                         <h1> <?php echo  number_format($query[0]->pricesum,2,".",",");$ftotal+=$query[0]->pricesum ?></h1>
                        <p>This Month Sales Orders</p>
                        <div class="ap-po-details-time">
                            <!--<span class="color-success"><i class="las la-arrow-up"></i>-->
                            <!--    <strong>25%</strong></span>-->
                            <!--<small>Since last week</small>-->
                        </div>
                    </div>

                </div>
                <div class="ap-po-timeChart">
                    <div class="overview-single__chart d-md-flex align-items-end">
                        <div class="parentContainer">


                            <div>
                                <canvas id="mychart9"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2 End  -->
        </div>
         
         
        <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
            <!-- Card 1 -->
            <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                <div>
                    <div class="overview-content">
                        <?php
                        //  $ordercount =$this->db->query('SELECT count(*) as ordercount from sales_order where  status=1 AND MONTH(acc_date)=MONTH(now()) and YEAR(acc_date)=YEAR(now())')->result();
                        // $query=$this->db->query('SELECT count(sales_order_details.order_id) as todaykot FROM `sales_order_details` JOIN product_information as pi ON pi.id=sales_order_details.product_id WHERE pi.manufacturer_id='.$this->session->userdata("manufaturer_id") .' AND  sales_order_details.status=1 AND date(acc_date)="'.date("Y-m-d").'" GROUP BY sales_order_details.order_id')->result();
                       $query1=$this->db->query('SELECT order_id FROM sales_order_details WHERE sales_order_details.status=1 AND product_id IN(SELECT id FROM product_information WHERE manufacturer_id='.$this->session->userdata("manufaturer_id") .') AND date(sales_order_details.acc_date)="'.$accdate[0]->acc_date.'"  GROUP BY sales_order_details.order_id')->result();
                        //var_dump($query1);
                       
                        ?>
                      
                         <h1> <?php echo  count($query1); ?></h1>
                        <p>Today Kot</p>
                        <div class="ap-po-details-time">
                            <!--<span class="color-success"><i class="las la-arrow-up"></i>-->
                            <!--    <strong>25%</strong></span>-->
                            <!--<small>Since last week</small>-->
                        </div>
                    </div>

                </div>
                <div class="ap-po-timeChart">
                    <div class="overview-single__chart d-md-flex align-items-end">
                        <div class="parentContainer">


                            <div>
                                <canvas id="mychart10"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 1 End -->
        </div>
        <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
            <!-- Card 1 -->
            <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                <div>
                    <div class="overview-content">
                        <?php
                        //  $ordercount =$this->db->query('SELECT count(*) as ordercount from sales_order where  status=1 AND MONTH(acc_date)=MONTH(now()) and YEAR(acc_date)=YEAR(now())')->result();
                        // $query=$this->db->query('SELECT count(sales_order_details.order_id) as thismonthkot FROM `sales_order_details` JOIN product_information as pi ON pi.id=sales_order_details.product_id WHERE pi.manufacturer_id='.$this->session->userdata("manufaturer_id") .' AND  sales_order_details.status=1 AND MONTH(acc_date)=MONTH(now()) and YEAR(acc_date)=YEAR(now()) GROUP BY sales_order_details.order_id')->result();
                        //  $todayordercount = $this->db->query('SELECT count(id) as todaycount from sales_order where status=1 AND DATE(`acc_date`)="'.date("Y-m-d").'"')->result();  
                        $query2=$this->db->query('SELECT order_id FROM sales_order_details WHERE sales_order_details.status=1 AND product_id IN(SELECT id FROM product_information WHERE manufacturer_id='.$this->session->userdata("manufaturer_id") .') AND  MONTH(sales_order_details.acc_date)=MONTH(now()) and YEAR(sales_order_details.acc_date)=YEAR(now()) GROUP BY sales_order_details.order_id ')->result();
                    //   var_dump($query2)
                      ?>
                         <h1> <?php echo  count($query2) ?></h1>
                        <p>This Month Kot</p>
                        <div class="ap-po-details-time">
                            <!--<span class="color-success"><i class="las la-arrow-up"></i>-->
                            <!--    <strong>25%</strong></span>-->
                            <!--<small>Since last week</small>-->
                        </div>
                    </div>

                </div>
                <div class="ap-po-timeChart">
                    <div class="overview-single__chart d-md-flex align-items-end">
                        <div class="parentContainer">


                            <div>
                                <canvas id="mychart11"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 1 End -->
        </div>
        
        
        
          <?php endif; ?>

    
          <?php  if( $this->session->userdata("manufaturer_id")!=null ):?>
          <div class="col-xxl-6 mb-30"> 
                        <div class="card broder-0">
                            <div class="card-header">
                                <h6>Manufature Total Revenue</h6>
                                <div class="card-extra">
                                    <ul class="card-tab-links mr-3 nav-tabs nav" role="tablist">
                                        <li>
                                            <a class="active" href="#tl_revenue-week" data-toggle="tab" id="tl_revenue-week-tab" role="tab" aria-selected="true"></a>
                                        </li> 
                                    </ul>
                                    <div class="dropdown dropleft"> 
                                    </div>
                                </div>
                            </div>
                            <!-- ends: .card-header -->
                            <div class="card-body pt-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="tl_revenue-week" role="tabpanel" aria-labelledby="tl_revenue-week-tab">
                                        <div class="revenue-labels">
        <!--                                    <div>
                                                <strong class="text-primary">$72,848</strong>
                                                <span>Current Period</span>
                                            </div>
                                            <div>
                                                <strong>$52,458</strong>
                                                <span>Previous Period</span>
                                            </div>-->
                                        </div>
                                        <!-- ends: .performance-stats -->
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                                
                                        <div class="wp-chart">
                                            <div class="parentContainer">

        <canvas id="Chart1" width="600" height="200"></canvas> 
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <!-- ends: .card-body -->
                        </div>

                    </div>   
                    <?php
                    endif;
                    ?>
            
            
            
            
        <div class="col-xxl-6 mb-30">

            <div class="card border-0">
                <div class="card-header">
                    <h6>Source of Revenue Generated</h6>
                    <div class="card-extra">
                        <ul class="card-tab-links mr-3 nav-tabs nav">
                            <li>
                                <a href="#s_revenue-today" class="active" data-toggle="tab" id="s_revenue-today-tab" role="tab" area-controls="s_revenue-table" aria-selected="true">Today</a>
                            </li>
                            <li>
                                <a href="#s_revenue-week" data-toggle="tab" id="s_revenue-week-tab" role="tab" area-controls="s_revenue-table" aria-selected="false">Week</a>
                            </li>
                            <li>
                                <a href="#s_revenue-month" data-toggle="tab" id="s_revenue-month-tab" role="tab" area-controls="s_revenue-table" aria-selected="false">Month</a>
                            </li>
                            <li>
                                <a href="#s_revenue-year" data-toggle="tab" id="s_revenue-year-tab" role="tab" area-controls="s_revenue-table" aria-selected="false">Year</a>
                            </li>
                        </ul>
                        <div class="dropdown dropleft">
                            <a href="#" role="button" id="action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather="more-horizontal"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="action">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="s_revenue-today" role="tabpanel" aria-labelledby="s_revenue-today-tab">
                            <div class="table-responsive table-revenue">
                                <table class="table table--default">
                                    <thead>
                                        <tr>
                                            <th>Name of Source</th>
                                            <th>Visitors</th>
                                            <th>Page View</th>
                                            <th>Revenue</th>
                                            <th>Trend</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Direct</td>
                                            <td>3,256</td>
                                            <td>12,156</td>
                                            <td>$2,225</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm1"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>4,658</td>
                                            <td>21,584</td>
                                            <td>$9,753</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm2"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Organic Search</td>
                                            <td>1,698</td>
                                            <td>7,956%</td>
                                            <td>1,159</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm3"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Referral</td>
                                            <td>2,856</td>
                                            <td>8,256</td>
                                            <td>1,456</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm4"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Social Media</td>
                                            <td>9,456</td>
                                            <td>36,478</td>
                                            <td>13,852</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm5"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="s_revenue-week" role="tabpanel" aria-labelledby="s_revenue-week-tab">
                            <div class="table-responsive table-revenue">
                                <table class="table table--default">
                                    <thead>
                                        <tr>
                                            <th>Name of Source</th>
                                            <th>Visitors</th>
                                            <th>Page View</th>
                                            <th>Revenue</th>
                                            <th>Trend</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Direct</td>
                                            <td>3,256</td>
                                            <td>12,156</td>
                                            <td>$2,225</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm1"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>4,658</td>
                                            <td>21,584</td>
                                            <td>$9,753</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm2"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Organic Search</td>
                                            <td>1,698</td>
                                            <td>7,956%</td>
                                            <td>1,159</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm3"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Referral</td>
                                            <td>2,856</td>
                                            <td>8,256</td>
                                            <td>1,456</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm4"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Social Media</td>
                                            <td>9,456</td>
                                            <td>36,478</td>
                                            <td>13,852</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm5"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="s_revenue-month" role="tabpanel" aria-labelledby="s_revenue-month-tab">
                            <div class="table-responsive table-revenue">
                                <table class="table table--default">
                                    <thead>
                                        <tr>
                                            <th>Name of Source</th>
                                            <th>Visitors</th>
                                            <th>Page View</th>
                                            <th>Revenue</th>
                                            <th>Trend</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Direct</td>
                                            <td>3,256</td>
                                            <td>12,156</td>
                                            <td>$2,225</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm1"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>4,658</td>
                                            <td>21,584</td>
                                            <td>$9,753</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm2"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Organic Search</td>
                                            <td>1,698</td>
                                            <td>7,956%</td>
                                            <td>1,159</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm3"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Referral</td>
                                            <td>2,856</td>
                                            <td>8,256</td>
                                            <td>1,456</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm4"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Social Media</td>
                                            <td>9,456</td>
                                            <td>36,478</td>
                                            <td>13,852</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm5"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="s_revenue-year" role="tabpanel" aria-labelledby="s_revenue-year-tab">
                            <div class="table-responsive table-revenue">
                                <table class="table table--default">
                                    <thead>
                                        <tr>
                                            <th>Name of Source</th>
                                            <th>Visitors</th>
                                            <th>Page View</th>
                                            <th>Revenue</th>
                                            <th>Trend</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Direct</td>
                                            <td>3,256</td>
                                            <td>12,156</td>
                                            <td>$2,225</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm1"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>4,658</td>
                                            <td>21,584</td>
                                            <td>$9,753</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm2"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Organic Search</td>
                                            <td>1,698</td>
                                            <td>7,956%</td>
                                            <td>1,159</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm3"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Referral</td>
                                            <td>2,856</td>
                                            <td>8,256</td>
                                            <td>1,456</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm4"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Social Media</td>
                                            <td>9,456</td>
                                            <td>36,478</td>
                                            <td>13,852</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <canvas id="lineChartSm5"></canvas>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xxl-4 mb-30">

            <div class="card border-0">
                <div class="card-header">
                    <h6>Top Selling Products</h6>
                    <div class="card-extra">
                        <ul class="card-tab-links mr-3 nav-tabs nav" role="tablist">
                            <li>
                                <a class="active" href="#t_selling-today" data-toggle="tab" id="t_selling-today-tab" role="tab" aria-selected="true">Today</a>
                            </li>
                            <li>
                                <a href="#t_selling-week" data-toggle="tab" id="t_selling-week-tab" role="tab" aria-selected="true">Week</a>
                            </li>
                            <li>
                                <a href="#t_selling-month" data-toggle="tab" id="t_selling-month-tab" role="tab" aria-selected="true">Month</a>
                            </li>
                            <li>
                                <a href="#t_selling-year" data-toggle="tab" id="t_selling-year-tab" role="tab" aria-selected="true">Year</a>
                            </li>
                        </ul>
                        <div class="dropdown dropleft">
                            <a href="#" role="button" id="todo12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather="more-horizontal"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="todo12">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="t_selling-today" role="tabpanel" aria-labelledby="t_selling-today-tab">
                            <div class="selling-table-wrap">
                                <div class="table-responsive">
                                    <table class="table table--default">
                                        <thead>
                                            <tr>
                                                <th>Prduct Name</th>
                                                <th>Price</th>
                                                <th>Sold</th>
                                                <th>Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Samsung Galaxy S8 256GB</td>
                                                <td>$289</td>
                                                <td>339</td>
                                                <td>$60,258</td>
                                            </tr>
                                            <tr>
                                                <td>Half Sleeve Shirt</td>
                                                <td>$29</td>
                                                <td>136</td>
                                                <td>$2,483</td>
                                            </tr>
                                            <tr>
                                                <td>Marco Shoes</td>
                                                <td>$59</td>
                                                <td>448</td>
                                                <td>$19,758</td>
                                            </tr>
                                            <tr>
                                                <td>15" Mackbook Pro</td>
                                                <td>$1,299</td>
                                                <td>159</td>
                                                <td>$197,458</td>
                                            </tr>
                                            <tr>
                                                <td>Apple iPhone X</td>
                                                <td>$899</td>
                                                <td>146</td>
                                                <td>115,254</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="t_selling-week" role="tabpanel" aria-labelledby="t_selling-week-tab">
                            <div class="selling-table-wrap">
                                <div class="table-responsive">
                                    <table class="table table--default">
                                        <thead>
                                            <tr>
                                                <th>Prduct Name</th>
                                                <th>Price</th>
                                                <th>Sold</th>
                                                <th>Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Samsung Galaxy S8 256GB</td>
                                                <td>$289</td>
                                                <td>339</td>
                                                <td>$60,258</td>
                                            </tr>
                                            <tr>
                                                <td>Half Sleeve Shirt</td>
                                                <td>$29</td>
                                                <td>136</td>
                                                <td>$2,483</td>
                                            </tr>
                                            <tr>
                                                <td>Marco Shoes</td>
                                                <td>$59</td>
                                                <td>448</td>
                                                <td>$19,758</td>
                                            </tr>
                                            <tr>
                                                <td>15" Mackbook Pro</td>
                                                <td>$1,299</td>
                                                <td>159</td>
                                                <td>$197,458</td>
                                            </tr>
                                            <tr>
                                                <td>Apple iPhone X</td>
                                                <td>$899</td>
                                                <td>146</td>
                                                <td>115,254</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="t_selling-month" role="tabpanel" aria-labelledby="t_selling-month-tab">
                            <div class="selling-table-wrap">
                                <div class="table-responsive">
                                    <table class="table table--default">
                                        <thead>
                                            <tr>
                                                <th>Prduct Name</th>
                                                <th>Price</th>
                                                <th>Sold</th>
                                                <th>Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Samsung Galaxy S8 256GB</td>
                                                <td>$289</td>
                                                <td>339</td>
                                                <td>$60,258</td>
                                            </tr>
                                            <tr>
                                                <td>Half Sleeve Shirt</td>
                                                <td>$29</td>
                                                <td>136</td>
                                                <td>$2,483</td>
                                            </tr>
                                            <tr>
                                                <td>Marco Shoes</td>
                                                <td>$59</td>
                                                <td>448</td>
                                                <td>$19,758</td>
                                            </tr>
                                            <tr>
                                                <td>15" Mackbook Pro</td>
                                                <td>$1,299</td>
                                                <td>159</td>
                                                <td>$197,458</td>
                                            </tr>
                                            <tr>
                                                <td>Apple iPhone X</td>
                                                <td>$899</td>
                                                <td>146</td>
                                                <td>115,254</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="t_selling-year" role="tabpanel" aria-labelledby="t_selling-year-tab">
                            <div class="selling-table-wrap">
                                <div class="table-responsive">
                                    <table class="table table--default">
                                        <thead>
                                            <tr>
                                                <th>Prduct Name</th>
                                                <th>Price</th>
                                                <th>Sold</th>
                                                <th>Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Samsung Galaxy S8 256GB</td>
                                                <td>$289</td>
                                                <td>339</td>
                                                <td>$60,258</td>
                                            </tr>
                                            <tr>
                                                <td>Half Sleeve Shirt</td>
                                                <td>$29</td>
                                                <td>136</td>
                                                <td>$2,483</td>
                                            </tr>
                                            <tr>
                                                <td>Marco Shoes</td>
                                                <td>$59</td>
                                                <td>448</td>
                                                <td>$19,758</td>
                                            </tr>
                                            <tr>
                                                <td>15" Mackbook Pro</td>
                                                <td>$1,299</td>
                                                <td>159</td>
                                                <td>$197,458</td>
                                            </tr>
                                            <tr>
                                                <td>Apple iPhone X</td>
                                                <td>$899</td>
                                                <td>146</td>
                                                <td>115,254</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
         
         
    </div>
    <!-- ends: .row -->
</div>

</div>