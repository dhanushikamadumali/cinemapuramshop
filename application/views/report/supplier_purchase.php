<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Supplier Module</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap"  style="display:none">
                        <div class="action-btn">

                            <div class="form-group mb-0">
                                <div class="input-container icon-left position-relative">
                                    <span class="input-icon icon-left">
                                        <span data-feather="calendar"></span>
                                    </span>
                                    <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">
                                    <span class="input-icon icon-right">
                                        <span data-feather="chevron-down"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown action-btn">
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
                        </div>
                        <div class="dropdown action-btn">
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
                        </div>
                        <div class="action-btn">
                            <a href="#" class="btn btn-sm btn-primary btn-add">
                                <i class="la la-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Supplier Purchase </h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                    <div class="table-responsive">
                                     
                                        <div id="filter-form-container"></div>
                                        <table class="table mb-0 table-borderless adv-table example" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                            <thead>
                                                <tr class="userDatatable-header">

                                                  
                                                    <th>
                                                        <span class="userDatatable-title">transaction no</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">supplier name</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">total discount</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">total amount</span>
                                                    </th>
													<th>
                                                        <span class="userDatatable-title">details</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">date</span>
                                                    </th>
                                                    <th data-type="html" data-name='status'>
                                                        <span class="userDatatable-title">status</span>
                                                    </th>
                                                    <!-- <th>
                                                        <span class="userDatatable-title float-right">action</span>
                                                    </th> -->
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
				"url": "<?= base_url(); ?>index.php/Supplier/supplier_purchase_datatable_ajax",
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
              
				{"data": "dtb_purtranno",className: "dtb_purtranno" ,
					"render": function(data, type, full, meta) {
						if(data == "" || data == null){
							return "-";
						}else{
							if(data.length > 25){
								return data.substring(0,25) + "...";
							}else{  return data }
						}


					} },
					{"data": "dtb_suNalsdkj",className: "dtb_suNalsdkj" ,
					"render": function(data, type, full, meta) {
						if(data == "" || data == null){
							return "-";
						}else{
							if(data.length > 25){
								return data.substring(0,25) + "...";
							}else{  return data }
						}


					} },
				{"data": "dtb_purdisamount",className: "dtb_purdisamount" ,
					"render": function(data, type, full, meta) {
						if(data == "" || data == null){
							return "-";
						}else{
							if(data.length > 25){
								return data.substring(0,25) + "...";
							}else{  return data }
						}


					} },

				{"data": "dtb_purtoamount",className: "dtb_purtoamount" ,
					"render": function(data, type, full, meta) {
						if(data == "" || data == null){
							return "-";
						}else{
							if(data.length > 25){
								return data.substring(0,25) + "...";
							}else{  return data }
						}


					} },
                    {"data": "dtb_purremark",className: "dtb_purremark" ,
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
				
				
				// {"data": "renival_igGrt",className: "renival_igGrt" ,
				// 	"render": function(data, type, full, meta) {					
                //       return ' <ul class="orderDatatable_actions mb-0 d-flex flex-wrap"><li><a href="#" class="view"><span class="fa fa-eye"></span></a> </li>  <li><a  href="<?= base_url() ?>index.php/Supplier/Edit?id='+data+'"   class="edit"><span class="far fa-edit"></span></a></li><li><a href="#" class="remove"><span class="far fa-trash-alt"></span></a></li></ul> ';
                //     } },
			],
			"aLengthMenu": [[50, 150, - 1], [50, 150, "All"]], 
			"iDisplayLength": 50,
            "order": [[0, "ASC"]]
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
   
                                        
</script>
