<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Settle Payment</h4>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>View Sales Order </h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-borderless adv-table example" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                            <thead>
                                                <tr class="userDatatable-header">
                                                    <th>
                                                        <span class="userDatatable-title">transaction no</span>
                                                    </th>
                                                   
                                                    <th>
                                                        <span class="userDatatable-title">customer name</span>
                                                    </th>
                                                   
                                                    <th>
                                                        <span class="userDatatable-title">total amount</span>
                                                    </th>
                                                  
                                                    <th>
                                                        <span class="userDatatable-title">sales date</span>
                                                    </th>
                                                  
                                                 
                                                    <th data-type="html" data-name='status'>
                                                        <span class="userDatatable-title">status</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title float-right">action</span>
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
        </div>
    </div>
</div>

</div>
<div class="modal fade settle_payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Settle Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  
                    <div class="payment">
                    </div>
                  
                    </div>
            </div>
            </div>
        </div>

    </div>
</div>
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
                        columns: ":not(.notexport)"
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
                "url": "<?= base_url(); ?>index.php/Sales/view_settle_payment",
                "type": "POST",
                // data:{
                // 	pu_sup: function(){ return $(".vw_pu_sup").val() },
                // 	pu_dt: function(){ return $(".vw_pu_dt").val() },
                // 	pu_pytp: function(){ return $(".vw_pu_pytp").val() },
                // 	pu_bnk: function(){ return $(".vw_pu_bnk").val() },
                // 	pu_inv: function(){ return $(".vw_pu_inv").val() },
                // 	pu_stat: function(){ return $(".vw_pu_stat").val() },
                // }
            },
            columns: [
              
              
                {"data": "dtb_trano",className: "dtb_trano" ,
                    "render": function(data, type, full, meta) {
                        if(data == "" || data == null){
                            return "-";
                        }else{
                            if(data.length > 25){
                                return data.substring(0,25) + "...";
                            }else{  return data }
                        }


                    } },
                    
                    {"data": "dtb_cusname",className: "dtb_cusname" ,
                    "render": function(data, type, full, meta) {
                        if(data == "" || data == null){
                            return "-";
                        }else{
                            if(data.length > 25){
                                return data.substring(0,25) + "...";
                            }else{  return data }
                        }


                    } },
                    {"data": "dtb_saletot",className: "dtb_saletot" ,
                    "render": function(data, type, full, meta) {
                        if(data == "" || data == null){
                            return "-";
                        }else{
                            if(data.length > 25){
                                return data.substring(0,25) + "...";
                            }else{  return data }
                        }


                    } },
                    
                    
                    {"data": "dtb_Datdresf",className: "dtb_Datdresf" ,
                    "render": function(data, type, full, meta) {
                        if(data == "" || data == null){
                            return "-";
                        }else{
                            if(data.length > 25){
                                return data.substring(0,25) + "...";
                            }else{  return data }
                        }


                    } },
			
                  


			
                {"data": "dtb_status",className: "dtb_status" ,
                    "render": function(data, type, full, meta) {
                        if(data == "" || data == null){
                            return "-";
                        }else{
                            if(data == 1 ){
                                return '<span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>';
                            }else{  return '<span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">deactivate</span>' }
                        }


                    } },
				
				
                {"data": "renival_igGrt",className: "renival_igGrt" ,
                    "render": function(data, type, full, meta) {					
                      return ' <ul class="orderDatatable_actions mb-0 d-flex flex-wrap"><li><a href="<?php echo base_url()?>index.php/pos/printbill?id='+data+'" target="_blank" ><span class="fa fa-print"></span></a> </li><li><a href="#" class="viewbtn" id="'+data+'"><span class="fa fa-eye"></span></a> </li>  <li><a  href="<?= base_url() ?>index.php/Sales/Edit?id='+data+'"   class="edit"><span class="far fa-edit"></span></a></li><li><a href="#" class="delete_btn" id="'+data+'"><span class="far fa-trash-alt"></span></a></li></ul> ';
                    } },
            ],
            "aLengthMenu": [[50, 150, - 1], [50, 150, "All"]], 
            "iDisplayLength": 50,
            "order": [[0, "DESC"]]
        } );//End Datatable Function

        // table.buttons().container()
        // 	.appendTo( "#dt_table_wrapper .col-md-6:eq(0)" );

        // $("body").on("click",".search_btn",function(){
        // 	table.ajax.reload();
        // });
        // $("body").on("click",".dlt_abtn",function(){
        // 	$(".delHref").attr("href",$(this).attr("href"));
        // });

    // });

    $("body").on("click",".viewbtn",function(){
            $.ajax({
                type: "post",
				
                url: "<?php echo base_url(); ?>index.php/sales/sales_ajax",
                data: {
                    func_n: "settle_payment",
                    id: $(this).attr("id"),
                    // orderid: a
                    // man: $(".mname").val()
                },
                success: function (data) {
                    console.log(data);
                    $(".settle_payment_modal").modal('show');
                    $(".payment").empty();
                    $(".payment").append(data);
							
                    // setTimeout(function(){ window.location.reload(); });
                }
	
            });
			
			
    });
    $("body").on("click",".close",function(){
        $(".product_list_modal").modal('hide');
    });
	   
   
                      

    // $("body").on("click",".save_btn",function(){
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo base_url(); ?>index.php/sales/sales_ajax",
    //             data: {
    //                 func_n: "delete_sales_order",
    //                 id: $(this).attr("id"),
    //                 // orderid: a
    //                 // man: $(".mname").val()
    //             },
    //             success: function (data) {
                            
    //                 setTimeout(function(){ window.location.reload(); });
    //             }
    
    //         });
    // }); 
    $("body").on("click",".save_btn",function(e){
            e.preventDefault(); 
        $form = $("#inForm"); 
        add_form($form);
        function add_form($form) { 
            var formdata = new FormData($form[0]);
            formdata.append("func_n","insert_due_payment");
            $.ajax({
                type: "post",
                dataType: "JSON",
                url: "<?php echo base_url(); ?>index.php/sales/sales_ajax",
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $(".err").html("");
                    if(data.status==false){
                        $(".err_damount").html(data.due_amount);
                        $(".err_ptype").html(data.ptype);
                            $.each(data.errors, function(key,val) {
                                $(".err_"+key).html(val);
                            });
            
                    }else{
                   
                        // setTimeout(function(){ window.location.reload ()});
                    }
                }
            });
        }

    })   
    $("body").on('change', '.ptype', function () {
       
        if ($(this).val() == 'bank') {
            $(".in_pu_bnk").removeAttr('disabled');
            get_total();
        } else {
            $(".in_pu_bnk").attr('disabled', true);
            get_total();
        }

    });
						
          
	   
   
                                        
</script>
