<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Stall Module</h4>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6 class="col-md-6">stall order </h6> 
                                <h6 class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-4" style="width:33.3333%;text-align:right">
                                             <label class="" for="">Pause Orders</label>
                                        </div> 
                                        <div class="col-sm-4"  style="width:33.3333%">
                                             <?php
                                            $details = $this->Common_model->get_all("manufacturer_information",["id"=>$this->session->userdata("manufaturer_id")])->result();
                                             
                                            if( $details ):
                                                if($details[0]->shop_status=="1"){ ?>    
                                                <div class="custom-control custom-switch switch-primary switch-md "> 
                                                <input type="checkbox" class="custom-control-input editavail" id="editavail" value="<?php echo $this->session->userdata("manufaturer_id")?>" checked>
                                                  <label class="custom-control-label " for="editavail"></label>
                                            </div>
                                                              
                                            <?php }else{?>
                                                <div class="custom-control custom-switch switch-primary switch-md "> 
                                                <input type="checkbox" class="custom-control-input editavail" id="editavail"   value="<?php echo $this->session->userdata("manufaturer_id")?>" >
                                                <label class="custom-control-label " for="editavail"></label>
                                            </div>
                                            <?php }
                                            endif;
                                            ?>
                                        </div> 
                                        <div class="col-sm-4"  style="width:33.3333%;text-align:left">
                                             <label class="" for="">Accept Orders</label>
                                        </div>
                                     </div>
                                </h6>
                            </div>
                            <div class="card-body py-md-30">
                            <?php 
                                $mid = $this->session->userdata("manufaturer_id");
                            ?> 
                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                    <div class="table-responsive">
                                        <div id="filter-form-container"></div>
                                        <table  class="table mb-0 table-borderless adv-table example" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                            <thead>
                                                <tr class="userDatatable-header">
                                                    <th>
                                                        <span class="userDatatable-title">Order ID</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">T No</span>
                                                    </th> <th>
                                                        <span class="userDatatable-title">Product name</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">item qty</span>
                                                    </th>
                                                    <!--<th>-->
                                                    <!--    <span class="userDatatable-title">Order Type</span>-->
                                                    <!--</th> -->
                                                    <th>
                                                        <span class="userDatatable-title">Per Price</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">action</span>
                                                    </th> 
                                                    <th>
                                                        <span class="userDatatable-title">Order Date</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                           
                                             </tbody>
                                        </table>
                                        <div class="t1"></div>
                                        <div class="t2"></div>
                                        <div class="t3"></div>
                                        <audio id="myAudio">
                                            <source src="<?php echo base_url()?>assets/order_alarm.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
                                    </div>
                                </div>

                                </div>
                            </div>
        </div>
                        <!-- ends: .card -->

        </div>
        </div>
    </div>
</div>





<!--<audio id="myAudio">-->
<!--<source src="<?php //echo base_url()?>assets/order_alarm.mp3" type="audio/mpeg">-->
 <!--<source src="<?php //echo base_url()?>assets/order_alarm.ogg" type="audio/ogg"> -->
<!--</audio>-->
<!--<button onclick="playAudio()" type="button">Play Audio</button>-->


</div>
 <!-- alert -->
 <script type="text/javascript" src="<?=base_url()?>assets/js/sweetalert.js" rel="stylesheet"></script>

<script type="text/javascript">
        $toggleSidebar = true;
    var table = $(".example").DataTable({
        //lengthChange: false,
        dom: "lBfrtip",
        buttons: [],
        processing: true,
        serverSide: true,
        "info": true,
        "ajax": {
            "url": "<?= base_url(); ?>index.php/stoleitem/view_stall_orders",
            "type": "POST"
        },
        columns: [
            {"data": "dtb_transno", className: "dtb_transno",
                "render": function (data, type, full, meta) {
                    if (data == "" || data == null) {
                        return "-";
                    } else {
                       return data.split("_")[1]
                    }
                }},
            {"data": "dtb_sotblno", className: "dtb_sotblno",
                "render": function (data, type, full, meta) {
                    if (data == "" || data == null) {
                        return "-";
                    } else {
                        if (full['dtb_otype']=='dine-in') {
                            return data;
                        } else {
                            return full['dtb_otype'];
                        }
                    }
                }},
            {"data": "dtb_prodName", className: "dtb_prodName",
                "render": function (data, type, full, meta) {
                    if (data == "" || data == null) {
                        return "-";
                    } else {
                        return data;
                    }
                }},
            {"data": "dtb_sodiqty", className: "dtb_sodiqty",
                "render": function (data, type, full, meta) {
                    if (data == "" || data == null) {
                        return "-";
                    } else {
                        if (data.length > 25) {
                            return data.substring(0, 25) + "...";
                        } else {
                            return data;
                        }
                    }
                }},
                // {"data": "dtb_otype", className: "dtb_otype",
                // "render": function (data, type, full, meta) {
                //     if (data == "" || data == null) {
                //         return "-";
                //     } else {
                //         if (data.length > 25) {
                //             return data.substring(0, 25) + "...";
                //         } else {
                //             return data;
                //         }
                //     }
                // }},
                {"data": "dtb_manuprice", className: "dtb_manuprice",
                "render": function (data, type, full, meta) {
                    if (data == "" || data == null) {
                        return "-";
                    } else {  
                        return data*full['dtb_sodiqty'];   
                    }
                }},
            {"data": "renival_igGrt", className: "renival_igGrt",
                "render": function (data, type, full, meta) {
                    return '<button type="button" class="btn btn-primary btn-default btn-squared px-30 save_btn" onclick="product('+data+')">Delivered</button>'; // <li><a href="#" class="delete_btn" id="' + data + '"><span class="far fa-trash-alt"></span></a></li><li><a  href="<?= base_url() ?>index.php/Sales/Edit?id='+data+'"   class="edit"><span class="far fa-edit"></span></a></li>
                }},
            {"data": "dtb_Datdresf", className: "dtb_Datdresf",
                "render": function (data, type, full, meta) {
                    if (data == "" || data == null) {
                        return "-";
                    } else {
                        if (data.length > 25) {
                            return data.substring(0, 25) + "...";
                        } else {
                            return data
                        }
                    }
                }}
        ],
        "aLengthMenu": [[50, 150, -1], [50, 150, "All"]],
        "iDisplayLength": 50,
        "order": [[0, "ASC"]]
    });//End Datatable Function   
    
 
    
    setTimeout(function () {
      location.reload();
     },180000);
      
//   var x = document.getElementById("myAudio");
   
//   x.play();
//   x.play();
      
    $("audio").on({
    play:function(){ // the audio is playing!
        $(".play", parent.content.document).css("display", "none");
        $(".pause", parent.content.document).css("display", "block");
    },
    pause:function(){ // the audio is paused!
        $(".play", parent.content.document).css("display", "block");
        $(".pause", parent.content.document).css("display", "none");
    },
    })  
      
      $(document).ready(function(){
          //alert();
        //   var x = document.getElementById("myAudio");
        //   x.play();
         // $("audio").trigger("play"); 
      })
    
   setInterval(function() {
      
        table.ajax.reload( function ( json ) {
           var diff=4563433213654535665;
           var rodid=0;
           var rot=true;
           var rclr='#cccccc !important';
            $("tbody tr").each(function(){ 
                if(rot){
                    rodid=$(this).find('td:nth-child(1)').html();
                    rot=false;
                }
                if(rodid == $(this).find('td:nth-child(1)').html()){
                    $(this).css("background-color",rclr);
                }else{
                    if(rclr=='#cccccc !important'){rclr="#d3d3d3 !important";}else{rclr='#cccccc !important';}
                    $(this).css("background-color",rclr); 
                }
                rodid=$(this).find('td:nth-child(1)').html();
                if($(this).find('td:nth-child(7)').html()!=null){
                    var d = new Date();
                    var tme=Date.parse($(this).find('td:nth-child(7)').html().replace(" ", "T"));
                    diff= d.getTime()-tme;
                    $(".t1").html(d.getTime()); 
          	        $(".t2").html(tme); 
          	        $(".t3").html(diff);
                } 
            });   
            if(parseInt(diff)<30000){  
    	     //alert();
      	        var x = document.getElementById("myAudio");
                x.play();
            } 
        } ); 
    },15000);


      
    function product(e) { 
            swal({            
            text: "Are you sure you want to delivered product!",
            icon: "info",
            buttons: true,
           
            })
            .then((willDelete) => {
            if (willDelete) { 
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
                    data: {
                        func_n: "get_stole_order",
                        id: e
                    },
                    success: function (data) {
                       	table.ajax.reload();
                    }

                });
            } 
            
        }); 

    }  
    
    
    
    $("#editavail").on("click",function(){
   
   
    if($(this).is(":checked")==true){ 
        swal({
            title: "is Shop Open?",
            text: "Are you sure you want to Accept Orders!",
            icon: "success",
            buttons: true,
            dangerMode: false,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
                    type:'POST',
                    data: {
                    "sstatus":1,
                    "func_n":"shop_pause"
                    }, 
                    success: function(data){ 
                        location.reload();
                    }
                }); 
            } 
        }); 
    }else{
        swal({
            title: "is Shop PAUSE?",
            text: "Are you sure you want to PAUSE Orders!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/stoleitem/stole_item_ajax",
                    type:'POST',
                    data: {
                    "sstatus": 2,
                    "func_n":"shop_pause"
                    }, 
                    success: function(data){ 
                       location.reload();
                    }
                }); 
            } 
        });
    } 
  });
</script>
