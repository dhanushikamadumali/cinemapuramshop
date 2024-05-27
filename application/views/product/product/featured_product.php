        <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row" >
                    <div class="col-lg-12" >

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Product Module</h4>
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
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                                <div class="card card-Vertical card-default card-md mb-4">
                                    <div class="card-header">
                                        <h6>Custom Product </h6>
                                    </div>
                                    <div class="card-body py-md-30">
                                    <?= form_open_multipart("", array("id" => "inForm")); ?>
                                            <div class="row">
                                               
                                                <div class="row">
                                                <div style="margin-bottom: 10px;font-weight:800" >Trending Product</div>
                                                </div>
                                                 <?php 
                                            $trfeaturedprods=$this->Common_model->get_all("featured_product",["position"=>2])->result();
                                            ?>
                                                        <div class="col-md-4 mb-25">
                                                            <div class="select-style2" style="width:100%">
                                                                <div class="atbd-select  ">
                                                                    <select  id="select-alerts2-7" class="form-control select-alerts2" style="padding: 0;" name="Tproid[]">
                                                                    <!-- <option value="">Select a Product</option> -->
                                                                    <?php
                                                                        $this->db->select("id,product_name");
                                                                        $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                        if ($tableResult):
                                                                            foreach ($tableResult as $tableRes):
                                                                                ?>
                                                                                <option  value="<?= $tableRes->id ?>" <?php echo ($trfeaturedprods[0]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                                <?php
                                                                            endforeach;
                                                                        endif;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span class="err err_Tproid required" style="color:red;position:absolute;font-size:10px"></span>
                                            
                                            
                                                        </div>
                                                        <div class="col-md-4 mb-25">
                                                            <div class="select-style2" style="width:100%">
                                                                <div class="atbd-select  ">
                                                                    <select  id="select-alerts2-8" class="form-control select-alerts2" style="padding: 0;" name="Tproid[]">
                                                                    <!-- <option value="">Select a Product</option> -->
                                                                    <?php
                                                                        $this->db->select("id,product_name");
                                                                        $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                        if ($tableResult):
                                                                            foreach ($tableResult as $tableRes):
                                                                                ?>
                                                                                <option  value="<?= $tableRes->id ?>" <?php echo ($trfeaturedprods[1]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                                <?php
                                                                            endforeach;
                                                                        endif;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span class="err err_Tproid required" style="color:red;position:absolute;font-size:10px"></span>
                                            
                                                        </div>
                                                        <div class="col-md-4 mb-25">
                                                            <div class="select-style2" style="width:100%">
                                                                <div class="atbd-select  ">
                                                                    <select  id="select-alerts2-9" class="form-control select-alerts2" style="padding: 0;" name="Tproid[]">
                                                                    <!-- <option value="">Select a Product</option> -->
                                                                        <?php
                                                                        $this->db->select("id,product_name");
                                                                        $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                        if ($tableResult):
                                                                            foreach ($tableResult as $tableRes):
                                                                                ?>
                                                                                <option  value="<?= $tableRes->id ?>" <?php echo ($trfeaturedprods[2]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                                <?php
                                                                            endforeach;
                                                                        endif;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span class="err err_Tproid required" style="color:red;position:absolute;font-size:10px"></span>
                                            
                                                        </div>
                                                        <div class="col-md-4 mb-25">
                                                            <div class="select-style2" style="width:100%">
                                                                <div class="atbd-select  ">
                                                                    <select  id="select-alerts2-10" class="form-control select-alerts2" style="padding: 0;" name="Tproid[]">
                                                                    <!-- <option value="">Select a Product</option> -->
                                                                    <?php
                                                                        $this->db->select("id,product_name");
                                                                        $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                        if ($tableResult):
                                                                            foreach ($tableResult as $tableRes):
                                                                                ?>
                                                                                <option  value="<?= $tableRes->id ?>" <?php echo ($trfeaturedprods[3]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                                <?php
                                                                            endforeach;
                                                                        endif;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span class="err err_Tproid required" style="color:red;position:absolute;font-size:10px"></span>
                                            
                                                        </div>
                                                        <div class="col-md-4 mb-25">
                                                            <div class="select-style2" style="width:100%">
                                                                <div class="atbd-select  ">
                                                                    <select  id="select-alerts2-11" class="form-control select-alerts2" style="padding: 0;" name="Tproid[]">
                                                                    <!-- <option value="">Select a Product</option> -->
                                                                        <?php
                                                                        $this->db->select("id,product_name");
                                                                        $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                        if ($tableResult):
                                                                            foreach ($tableResult as $tableRes):
                                                                                ?>
                                                                                <option  value="<?= $tableRes->id ?>" <?php echo ($trfeaturedprods[4]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                                <?php
                                                                            endforeach;
                                                                        endif;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span class="err err_Tproid required" style="color:red;position:absolute;font-size:10px"></span>
                                            
                                                        </div>
                                                        <div class="col-md-4 mb-25">
                                                            <div class="select-style2" style="width:100%">
                                                                <div class="atbd-select  ">
                                                                    <select  id="select-alerts2-12" class="form-control select-alerts2" style="padding: 0;" name="Tproid[]">
                                                                    <!-- <option value="">Select a Product</option> -->
                                                                        <?php
                                                                        $this->db->select("id,product_name");
                                                                        $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                        if ($tableResult):
                                                                            foreach ($tableResult as $tableRes):
                                                                                ?>
                                                                                <option  value="<?= $tableRes->id ?>" <?php echo ($trfeaturedprods[5]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                                <?php
                                                                            endforeach;
                                                                        endif;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span class="err err_Tproid required" style="color:red;position:absolute;font-size:10px"></span>
                                            
                                                        </div>
                                                        
                                                        
                                                         <div class="row">
                                                <div style="margin-bottom: 10px;font-weight:800" >Featured Product</div>
                                                </div>
                                            <?php 
                                            $featuredprods=$this->Common_model->get_all("featured_product",["position"=>1])->result();
                                            ?>
                                                <div class="col-md-4 mb-25">
                                                    <div class="select-style2" style="width:100%">
                                                        <div class="atbd-select  ">
                                                            <select id="select-alerts2-1" class="form-control in_pu_pro select-alerts2" style="padding: 0;" name="Fproid[]">
                                                            <!-- <option value="">Select a Product</option> -->
                                                            <?php
                                                                $this->db->select("id,product_name");
                                                                $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                if ($tableResult):
                                                                    foreach ($tableResult as $tableRes):
                                                                        ?>
                                                                            <option  value="<?= $tableRes->id ?>" <?php echo ($featuredprods[0]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                        <?php
                                                                    endforeach;
                                                                endif;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="err err_Fproid required" style="color:red;position:absolute;font-size:10px"></span>
                                                </div>
                                                <div class="col-md-4 mb-25">
                                                    <div class="select-style2" style="width:100%">
                                                        <div class="atbd-select  ">
                                                            <select  id="select-alerts2-2" class="form-control select-alerts2" style="padding: 0;" name="Fproid[]">
                                                            <!-- <option value="">Select a Product</option> -->
                                                            <?php
                                                                $this->db->select("id,product_name");
                                                                $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                if ($tableResult):
                                                                    foreach ($tableResult as $tableRes):
                                                                        ?>
                                                                        <option  value="<?= $tableRes->id ?>" <?php echo ($featuredprods[1]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                        <?php
                                                                    endforeach;
                                                                endif;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="err err_Fproid required" style="color:red;position:absolute;font-size:10px"></span>
                                                </div>
                                                <div class="col-md-4 mb-25">
                                                    <div class="select-style2" style="width:100%">
                                                        <div class="atbd-select  ">
                                                            <select  id="select-alerts2-3" class="form-control select-alerts2" style="padding: 0;" name="Fproid[]">
                                                            <!-- <option value="">Select a Product</option> -->
                                                            <?php
                                                                $this->db->select("id,product_name");
                                                                $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                if ($tableResult):
                                                                    foreach ($tableResult as $tableRes):
                                                                        ?>
                                                                        <option  value="<?= $tableRes->id ?>" <?php echo ($featuredprods[2]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                        <?php
                                                                    endforeach;
                                                                endif;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="err err_Fproid required" style="color:red;position:absolute;font-size:10px"></span>
                                                </div>
                                                <div class="col-md-4 mb-25">
                                                    <div class="select-style2" style="width:100%">
                                                        <div class="atbd-select  ">
                                                            <select  id="select-alerts2-4" class="form-control select-alerts2" style="padding: 0;" name="Fproid[]">
                                                            <!-- <option value="">Select a Product</option> -->
                                                            <?php
                                                                $this->db->select("id,product_name");
                                                                $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                if ($tableResult):
                                                                    foreach ($tableResult as $tableRes):
                                                                        ?>
                                                                        <option  value="<?= $tableRes->id ?>" <?php echo ($featuredprods[3]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                        <?php
                                                                    endforeach;
                                                                endif;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="err err_Fproid required" style="color:red;position:absolute;font-size:10px"></span>
                                            
                                            
                                                </div>
                                                <div class="col-md-4 mb-25">
                                                    <div class="select-style2" style="width:100%">
                                                        <div class="atbd-select  ">
                                                            <select  id="select-alerts2-5" class="form-control select-alerts2" style="padding: 0;" name="Fproid[]">
                                                            <!-- <option value="">Select a Product</option> -->
                                                            <?php
                                                                $this->db->select("id,product_name");
                                                                $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                if ($tableResult):
                                                                    foreach ($tableResult as $tableRes):
                                                                        ?>
                                                                        <option  value="<?= $tableRes->id ?>" <?php echo ($featuredprods[4]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                        <?php
                                                                    endforeach;
                                                                endif;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="err err_Fproid required" style="color:red;position:absolute;font-size:10px"></span>
                                            
                                                </div>
                                                <div class="col-md-4 mb-25">
                                                    <div class="select-style2" style="width:100%">
                                                        <div class="atbd-select  ">
                                                            <select  id="select-alerts2-6" class="form-control select-alerts2" style="padding: 0;" name="Fproid[]">
                                                            <!-- <option value="">Select a Product</option> -->
                                                            <?php
                                                                $this->db->select("id,product_name");
                                                                $tableResult = $this->Common_model->get_all("product_information")->result();
                                                                if ($tableResult):
                                                                    foreach ($tableResult as $tableRes):
                                                                        ?>
                                                                        <option  value="<?= $tableRes->id ?>" <?php echo ($featuredprods[5]->product_id ==$tableRes->id )?"selected" : NULL?>> <?= $tableRes->product_name ?></option>
                                                                        <?php
                                                                    endforeach;
                                                                endif;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="err err_Fproid required" style="color:red;position:absolute;font-size:10px"></span>
                                            
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-6 mb-25">
                                              
                                                <div class="col-md-6">
                                                    <div class="layout-button mt-0">
                                                        <button type="button" class="btn btn-primary btn-default btn-squared px-30 save_btn"  value="Log in">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?= form_close() ?> 
                                    </div>
                                </div>
                                <!-- ends: .card -->

                            </div>
                </div>
            </div>
        </div>

        </div>


        <script type="text/javascript">
        
        $(".save_btn").click(function (e) {
            e.preventDefault(); 
            $form = $("#inForm"); 
            add_form($form);
            function add_form($form) { 
                var formdata = new FormData($form[0]);
                formdata.append("func_n","custome_product");
                $.ajax({
                    type: "post",
                    dataType: "JSON",
                    url: "<?php echo base_url(); ?>index.php/product/product_ajax",
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $(".err").html("");
                        if(data.status==false){
                            $.each(data.errors, function(key,val) {
                                $(".err_"+key.replace('[]','')).html(val);
                            });
                        
                        }else{
                        
                            // setTimeout(function(){ window.location.href="<?php echo base_url()?>index.php/product/add_product";  });
                        }
                    }
                });
            }
        }); 



        </script>
