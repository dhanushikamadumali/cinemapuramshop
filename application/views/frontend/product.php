 
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Stall</h3>
                    <!--<ul>-->
                    <!--    <li><a href="<?php //echo base_url() ?>index.php">home</a></li>-->
                    <!--    <li>shop</li>-->
                    <!--</ul>-->
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->
    
<!--shop  area start  shop_reverse-->
<div class="shop_area  mt-70 mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
               <!--sidebar widget start-->
                <aside class="sidebar_widget">
                    <div class="widget_inner">
                    <div class="widget_list widget_manu" style="margin-bottom:20px">
                            <h3 style="margin-bottom:0px">Stall</h3> 
                            <div class="form-group">
                                    <select class="form-control common_combo stall" name="stall">
                                        <option value="">Select Stall</option>
                                            <?php
                                                foreach ($resultsstall as $tableRes):
                                            ?>
                                            <option  value="<?= $tableRes->id ?>"  > <?= $tableRes->manufacturer_name ?></option>
                                            <?php
                                            endforeach;
                                        ?>
                                    </select>
                               
                            </div>
                        </div>
                        <style>
                        @media only screen and (max-width: 767px){
                            .hidden-sm{
                                display:none;
                            }
                        }
                        </style>
                        <div class="hidden-sm widget_list widget_manu"  style="margin-bottom:20px">
                            <h3 style="margin-bottom:0px">Category</h3>
                            <ul>
                                <?php
                                foreach ($resultscat as $tableRes):
                                ?> 
                                <li>
                                <label><input type="checkbox" class="common_selector category" value="<?= $tableRes->id ?>"  > <span class="categories_name"><?= $tableRes->category_name ?></span></span></label>
                                </li>
                                <?php
                                    endforeach;
                                ?>
                            </ul>
                        </div>
     
                        <div class="widget_list widget_filter"  style="margin-bottom:20px">
                            <h3>Filter by price</h3>
                            <!-- <form action="#">  -->
                                <div id="slider-range"></div>   
                                <!-- <button type="submit">Filter</button> -->
                                <span id="amount" style="font-size: 18px;font-weight:700"></span> 
                                <input type="hidden" id="hidden_minimum_price"  value="0"/>
                                <input type="hidden" id="hidden_maximum_price" value="10000"/>

                            <!-- </form>  -->
                        </div>

                        <!-- <div class="widget_list widget_filter">
                            <h3>Filter by price</h3>
                            <form action="#"> 
                                <div id="slider-range"></div>   
                                <button type="submit">Filter</button>
                                <input type="text" name="text" id="amount" />   

                            </form> 
                        </div>
                        -->
                        <div class="widget_list banner_widget hidden-sm">
                            <div class="banner_thumb">
                                <a href="#"><img src="<?php echo base_url()?>assets/frontend/img/bg/banner17.jpg" alt=""></a>
                            </div>
                        </div>
                           
                    </div>
                </aside>
                <!--sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <!-- <div class="shop_toolbar_wrapper"> -->
                    <!-- <div class="shop_toolbar_btn"> -->

                        <!-- <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                        <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                        <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button> -->
                    <!-- </div> -->
                    <!-- <div class=" niceselect_option"> -->
                        <!-- <form class="select_option" action="#"> -->
                            <!-- <select name="orderby" id="short">

                                <option selected value="1">Sort by average rating</option>
                                <option  value="2">Sort by popularity</option>
                                <option value="3">Sort by newness</option>
                                <option value="4">Sort by price: low to high</option>
                                <option value="5">Sort by price: high to low</option>
                                <option value="6">Product Name: Z</option>
                            </select> -->
                        <!-- </form> -->
                    <!-- </div> -->
                    <!-- <div class="page_amount"> -->
                        <!-- <p>Showing 1–9 of 21 results</p> -->
                    <!-- </div> -->
                <!-- </div> -->
                 <!--shop toolbar end-->
                 <div class="row shop_wrapper">
                    <div class="filter_data">

                    </div>
                </div>
                <style>
                    .pagination ul li {
                      display: inline-block;
                      width: 30px;
                      height: 30px;
                      line-height: 30px;
                      text-align: center;
                      background: #f1f1f1;
                      border-radius: 3px;
                      margin-left: 3px;
                    }

                </style> 
                <!-- <div align="center" id="pagination_link"> -->
                 <div class="t_bottom" style="text-align:center"> 
                    <div class="pagination" id="pagination_link" style="display:block;text-align:center"> 

                    </div>
                 </div>
                 <br>
                 <br>
                <!-- </div>  -->
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
<!--shop  area end-->
<script>
    $(document).ready(function(){
       
       $.ajax({
            url:"<?php echo base_url(); ?>index.php/frontend/get_price/",
            method:"POST",
            dataType:"JSON",
            data:{},
            success:function(data){ 
                $("#slider-range").slider({
                    range: true,
                    min:parseInt(data.min_price),
                    max:parseInt(data.max_price),
                    values:[parseInt(data.min_price),parseInt(data.max_price)],
                    step:100,
                    slide: function( event, ui ) {
                        $("#amount").html( "Rs " + ui.values[0] + ".00 - Rs " + ui.values[1]+".00");
                        $("#hidden_minimum_price").val(ui.values[0]);
                        $("#hidden_maximum_price").val(ui.values[1]);
                        console.log(ui);
                        console.log(event);
                        filter_data(1);
                    }
                });
                $("#amount").html( "Rs " + data.min_price +".00"+ " - Rs " + data.max_price+"" ); // $("#slider-range").slider("values",1)
                $("#hidden_minimum_price" ).val(data.min_price);
                $("#hidden_maximum_price" ).val(data.max_price);  
            }
           
        })

    });
    
    
        filter_data(1);

        function filter_data(page)
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var stall = $('.stall').val();
            var pname ="<?php echo ($this->input->get("product_name")!=null)?$this->input->get("product_name"):null?>";
            var category1 = "<?php echo ($this->input->get("category1")!=null)?$this->input->get("category1"):null?>";
            // alert(area);
            var category = get_filter('category');
            // alert(category); 
            // var storage = get_filter('storage');area:area,
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/frontend/fetch_data/"+page,
                method:"POST",
                dataType:"JSON",
                data:{
                    action:action, 
                    minimum_price:minimum_price,
                    maximum_price:maximum_price,
                    stall:stall,
                    category:category,
                    category1:category1,
                    pname:pname 
                },
                success:function(data)
                {

                    // console.log(data);
                    $('.filter_data').html(data.product_list);
                    $('#pagination_link').html(data.pagination_link);
           
                }
           
            })
        }

        function get_filter(class_name){
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                // alert($(this).val());
                filter.push($(this).val());
            });
            return filter;
        }

        $(document).on('click', '.pagination li a', function(event){
            event.preventDefault(); 
            var page = $(this).data('ci-pagination-page');
            filter_data(page);
             $(window).scrollTop(250);
        });

        $('.common_selector').click(function(){
            // alert()
            filter_data(1);
        });
        $('.common_combo').change(function(){
       
            filter_data(1);
        });

       
        

    // $("body").on("click",".add_cart",function(e){
    //     e.preventDefault(); 
    //     // var availItems= [];
    //     // var avArr={};
    //     // avArr[]=1;
    //     // availItems.push(avArr);
    //         $.ajax({
    //             type: "post",
				
    //             url: "<?php echo base_url(); ?>index.php/frontend/add_to_cart",
    //             data: {
    //                 product_id:$(this).attr("id"),
    //                 func_n: "add_to_cart",
    //             },
    //             success: function (data) {
    //             //    setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php/cart";  });
    //             }
	
    //         });
			
			
    // });

   $("body").on("click",".add_cart",function(e){
        e.preventDefault(); 
        $.ajax({
            type: "post",	
            dataType:"JSON",
            url: "<?php echo base_url(); ?>index.php/frontend/add_to_cart",
            data: {
                product_id:$(this).attr("id"),
                func_n: "add_to_cart",
            },
            success: function (data) {
                if(data.status=true){
                     swal({
            title: "Add to Cart",
            text: "Successfully Added!",
            icon: "success"});
            $(".item_count").html(data.count);
                }else{
                    
                }
               
             
            }
	
        });
			
			
    });

</script>