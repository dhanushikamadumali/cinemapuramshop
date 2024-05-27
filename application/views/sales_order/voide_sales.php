<div class="contents">

    <div class="container-fluid">
        <div class="social-dash-wrap">
            <div class="row" >
                <div class="col-lg-12" >
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Today Sales Order Module</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-Vertical card-default card-md mb-4">
                        <div class="card-header">
                            <h6>Today Sales Order </h6>
                        </div>
                        <div class="card-body py-md-30">
                            <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless adv-table example table-hover" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10" style="font-size:14px;width:100%">
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
                                                <th>
                                                    <span class="userDatatable-title">Order Type</span>
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
<div class="modal fade product_list_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sales Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="product">
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
    var table = $(".example").DataTable({
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
            "url": "<?= base_url(); ?>index.php/Sales/void_today_sales_ajax",
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
            {"data": "dtb_trano", className: "dtb_trano",
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
                }},
            {"data": "dtb_cusname", className: "dtb_cusname",
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
                }},
            {"data": "dtb_saletot", className: "dtb_saletot",
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
                }},
            {"data": "dtb_order_type", className: "dtb_order_type",
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
                }},
            {"data": "dtb_status", className: "dtb_status",
                "render": function (data, type, full, meta) {
                    if (data == "" || data == null) {
                        return "-";
                    } else {
                        if (data == 1) {
                            return '<span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>';
                        } else {
                            return '<span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">deactivate</span>';
                        }
                    }
                }},
            {"data": "renival_igGrt", className: "renival_igGrt",
                "render": function (data, type, full, meta) {
                    return ' <ul class="orderDatatable_actions mb-0 d-flex flex-wrap"><li><a href="#" class="viewbtn" id="' + data + '" ><span class="fa fa-eye"></span></a> </li><li><a href="#" class="delete_btn" id="' + data + '"><span class="far fa-trash-alt"></span></a></li></ul> ';
                }},
        ],
        "aLengthMenu": [[50, 150, -1], [50, 150, "All"]],
        "iDisplayLength": 50,
        "order": [[0, "DESC"]]
    });//End Datatable Function

    // table.buttons().container()
    // 	.appendTo( "#dt_table_wrapper .col-md-6:eq(0)" );

    // $("body").on("click",".search_btn",function(){
    // 	table.ajax.reload();
    // });
    // $("body").on("click",".dlt_abtn",function(){
    // 	$(".delHref").attr("href",$(this).attr("href"));
    // });

    // });
    $("body").on("click", ".viewbtn", function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/sales/sales_ajax",
            data: {
                func_n: "voide_sales_order_product",
                id: $(this).attr("id")
                        // orderid: a
                        // man: $(".mname").val()
            },
            success: function (data) {
                //console.log(data);
                $(".product_list_modal").modal('show');
                $(".product").empty();
                $(".product").append(data);

                // setTimeout(function(){ window.location.reload(); });
            }

        });


    });
    $("body").on("click", ".close", function () {
        $(".product_list_modal").modal('hide');
    });


    $("body").on("click", ".delete_btn", function (e) {
        e.preventDefault();
        swal({
            title: "Inactive Sales Order?",
            text: "Are you sure you want to inactive sales order now !",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url(); ?>index.php/sales/sales_ajax",
                            data: {
                                func_n: "delete_sales_order",
                                id: $(this).attr("id")
                                        // orderid: a
                                        // man: $(".mname").val()
                            },
                            success: function (data) {

                                setTimeout(function () {
                                    window.location.reload();
                                });
                            }

                        });
                    }

                });
    });


    $("body").on("click", ".void_delete_butt", function (e) {
        //function product(e, a) {
        e.preventDefault();
        var ProductId = $(this).attr("prodid");
        var orderId = $(this).attr("order_id");
        swal({
            title: "Inactive Sales Order?",
            text: "Are you sure you want to inactive sales order now !",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "post",
                            dataType: "JSON",
                            url: "<?php echo base_url(); ?>index.php/sales/sales_ajax",
                            data: {
                                func_n: "delete_void_sales_order_product",
                                ProductId: ProductId,
                                orderId: orderId
                            },
                            success: function (data) {
                                if (data.status == false) {
                                    $(".delete_error").html(data.message);
                                } else {
                                    setTimeout(function(){ window.location.reload(); });
                                }

                            }
                        });
                    }
                });

    });
</script>
