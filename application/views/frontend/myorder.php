 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                   <h3>My Order</h3>
                    <ul>
                        <li><a href="<?php echo base_url() ?>index.php">Home</a></li>
                        <li>My Order</li>
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
           
               
                    <h2>My Order</h2>
                    <div class="col-lg-12">
                            <div class="card card-Vertical card-default card-md mb-4">
                                <!--<div class="card-header">-->
                                <!--    <h6>View User </h6>-->
                                <!--</div>-->
                                <div class="card-body py-md-30">
                               
                                <input type="hidden" class="cus_id" value="<?=$this->input->get('id'); ?>">

                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                            <div class="table-responsive">
                                                <div id="filter-form-container"></div>
                                                <table class="table mb-0 table-borderless adv-table example" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10" style="font-size:14px">
                                                    <thead>
                                                        <tr class="userDatatable-header">
                                                            <th style="width:10%">
                                                                <span class="userDatatable-title">Tnumber</span>
                                                            </th>
                                                           
                                                            <th style="width:10%">
                                                                <span class="userDatatable-title">Pac charge</span>
                                                            </th>
                                                            <th style="width:10%">
                                                                <span class="userDatatable-title">Amount</span>
                                                            </th>
                                                            <th style="width:10%">
                                                                <span class="userDatatable-title">Sales date</span>
                                                            </th>  <th style="width:10%">
                                                                <span class="userDatatable-title">Order Type</span>
                                                            </th>
                                                            <th style="width:10%">
                                                                <span class="userDatatable-title float-right">Action</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                     <tbody>
                                     
                                                     </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
            </div>
                            <!-- ends: .card -->

            </div>

              
            <!--login area start-->
        </div>
    </div>   
</div>
<div class="modal fade bd-example-modal-lg" id="productModal-lg" tabindex="-1" role="dialog" aria-labelledby="addcusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"  >View My Order Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

				
            <?= form_open_multipart("", array("id" => "inForm")); ?>

            <div class="row product">
				  
            </div>
            <?= form_close() ?> 
				
            </div>
           
        </div>
    </div>
</div>

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jszip-2.5.0/b-2.2.3/b-html5-2.2.3/datatables.min.js"></script> 


<!-- customer login end -->
<script type="text/javascript">

      //  $('.example').DataTable();        
        // $(document).ready(function(){
			
        $toggleSidebar = true;		
        var table = $(".example").DataTable( {
            //lengthChange: false,
            dom: "lBfrtip",
            buttons: [
                {
                    extend: "excel",
                    exportOptions: {
                        columns: ":not(.notexport)",
                        title: 'PickMe Food '

                    }
                },
                {
                    extend: "csv",
                    exportOptions: {
                        columns: ":not(.notexport)"
                    }
                },
                {
                    extend: "pdf",
                    exportOptions: {
                        columns: ":not(.notexport)"
                    }
                },
                {
                    extend: "print",
                    exportOptions: {
                        columns: ":not(.notexport)"
                    }
                }
            ],
            processing: true,
            serverSide: true,
            "info": true,
            "ajax": {
                "url": "<?= base_url(); ?>index.php/frontend/view_myorder_ajax",
                "type": "POST",
                data:{
                    // pu_mid: function(){ return $('input[name="vw_mid"]:checked').val() }
                	pu_dt: function(){ return $(".cus_id").val() },
                // 	pu_pytp: function(){ return $(".vw_pu_pytp").val() },
                // 	pu_bnk: function(){ return $(".vw_pu_bnk").val() },
                // 	pu_inv: function(){ return $(".vw_pu_inv").val() },
                // 	pu_stat: function(){ return $(".vw_pu_stat").val() },
                }
            },
            "columnDefs": [
              { "width": "5%", "targets": 0 },
              { "width": "5%", "targets": 1 },
              { "width": "5%", "targets": 2 },
              { "width": "10%", "targets": 3 },
              { "width": "5%", "targets": 4 },
              { "width": "1%", "targets": 5 } 
            ],
             columns: [
                {"data": "dtb_trno",className: "dtb_trno" ,
                    "render": function(data, type, full, meta) {
                        if(data == "" || data == null){
                            return "-";
                        }else{
                            if(data.length > 25){
                                return data.substring(0,25) + "...";
                            }else{  return data }
                        }
                    } },
                  
                    {"data": "dtb_pcharge",className: "dtb_pcharge" ,
                    "render": function(data, type, full, meta) {
                        if(data == "" || data == null){
                            return "-";
                        }else{
                            if(data.length > 25){
                                return data.substring(0,25) + "...";
                            }else{  return data }
                        }


                    } },
                    {"data": "dtb_tamount",className: "dtb_tamount" ,
                    "render": function(data, type, full, meta) {
                        if(data == "" || data == null){
                            return "-";
                        }else{
                            if(data.length > 25){
                                return data.substring(0,25) + "...";
                            }else{  return data }
                        }


                    } },
                       
                   
                    {"data": "dtb_saledate",className: "dtb_saledate" ,
                    "render": function(data, type, full, meta) {
                        if(data == "" || data == null){
                            return "-";
                        }else{
                            if(data.length > 25){
                                return data.substring(0,25) + "...";
                            }else{  return data }
                        }


                    } },
                    {"data": "dtb_otype",className: "dtb_otype" ,
                    "render": function(data, type, full, meta) {
                        if(data == "" || data == null){
                            return "-";
                        }else{
                            if(data.length > 25){
                                return data.substring(0,25) + "...";
                            }else{  return data }
                        }


                    } },
                   
                   
                    {"data": "renival_igGrt",className: "renival_igGrt" ,
                        "render": function(data, type, full, meta) {					
                        return ' <ul class="orderDatatable_actions mb-0 d-flex flex-wrap ml-10"><li><a href="#" cid="'+data+'" class="edit_btn" data-toggle="modal" data-target=".bd-example-modal-lg" >  <span class="fa fa-eye" style="margin-left:60px"></span>      </a> </li> ';
                    } },
            ],
            "aLengthMenu": [[50, 150, - 1], [50, 150, "All"]], 
            "iDisplayLength": 50,
		
            "order": [[0, "DESC"]]
        } );//End Datatable Function


        $("body").on("click",".edit_btn",function(e){
    e.preventDefault();
        $.ajax({
            type: "post",
		
            url: "<?php echo base_url(); ?>index.php/frontend/getmyorderdetails",
            data: {
                // func_n: "product_edit",
                id: $(this).attr("cid"),
                // orderid: a
                // man: $(".mname").val()
            },
            success: function (data) {
                console.log(data);
                $(".product").empty();
                $(".product").append(data);
				
                // setTimeout(function(){ window.location.reload(); });
            }

        });
	
    });

 
</script>