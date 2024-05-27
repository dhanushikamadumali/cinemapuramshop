<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">User Module</h4>
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
                                <h6>Edit User </h6>
                            </div>
                            <div class="card-body py-md-30">
                            <?= form_open_multipart("", array("id" => "inForm")); ?>
                            <?php
                            if ($this->input->get('id')):
                                $this->db->select('system_user.*');
                                $user=$this->Common_model->get_all("system_user",array('id' => $this->input->get('id')))->result();
                                
                                if ($user !=NULL):
                        
                            ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-25" hidden >
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Name" name="id" value="<?php echo ($user[0]->id) ?>">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Name" name="name" value="<?php echo ($user[0]->name) ?>">
                                            <span class="err err_name required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="User Name" name="uname" value="<?php echo ($user[0]->user_name) ?>">
                                            <span class="err err_uname required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="password" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Password" name="pswrd" value="<?php echo ($user[0]->password) ?>">
                                            <span class="err err_pswrd required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="password"  class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Confirm password" name="cpswrd" value="<?php echo ($user[0]->con_password) ?>">
                                            <span class="err err_cpswrd required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Email" name="email" value="<?php echo ($user[0]->email) ?>">
                                            <span class="err err_email required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <!-- <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="User role" name="urole" value="<?php echo ($user[0]->user_role) ?>"> -->
                                            <select class="form-control ih-medium ip-gray radius-xs b-light px-15 " name="urole" >
                                            <option value="">Select User role</option>
                                            <?php
                                                $this->db->select("id,name");
                                                $tableResult = $this->Common_model->get_all("system_user_type")->result();
                                                if ($tableResult):
                                                    foreach ($tableResult as $tableRes):
                                                        $selected = $user[0]->user_role == $tableRes->id ? "selected" : null; ?>
                                                        <option  <?= $selected ?>  value="<?= $tableRes->id ?>"  > <?= $tableRes->name ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                        </select>
                                            <span class="err err_urole required" style="font-size:10px; color: #F5576C !important" ></span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="product"  >
                                                <div class="row">
                                                    <?php
                                                    $mCounter=0;
                                                    $mname=$this->Common_model->get_all('manufacturer_information')->result();
                                                  
                                                    foreach($mname as $mnme):
                                                        $muserid=$this->Common_model->get_all('user_manufaturer',array('user_id' => $this->input->get('id')))->result();
                                                       
                                                        $mCounter++;
                                                        ?>
                                                        <?php    
                                                         $checked = ($muserid)? ($muserid[0]->manufaturer_id == $mnme->id) ? "checked" : null: null; ?>  
                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-bottom: 10px;">  
                                                            <div class="checkbox-theme-default custom-checkbox ">
                                                                <input class="checkbox" type="checkbox" id="check-un<?php echo  $mnme->id?>" value="<?php echo  $mnme->id?>" name="mname[]" <?= $checked ?> >
                                                                <label for="check-un<?php echo  $mnme->id?>" style="font-size:15px;color:#808080;">
                                                                    <span class="checkbox-text">
                                                                    <?php echo  $mnme->manufacturer_name?> 

                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                            <?php
                                                                if ($mCounter % 4 == 0):
                                                                ?>
                                                </div>
                                                <div class="row">
                                                        
                                                </div>
                                                <div class="row">
                                                    <?php
                                                    endif;
                                                    ?>
                                                    <?php
                                                    
                                                    endforeach;
                                               
                                                    ?>
                                                </div>	
                                            </div>
                                        </div>
                                        <!-- <span class="err err_bbranch required" style="font-size:10px; color: #F5576C !important" ></span> -->
                                        </div>
                                      
                                        <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                                <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button>
                                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30 save_btn" name="login" value="Log in">update</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        endif;
                                    endif;
                                    ?>
                                <?= form_close() ?> 
                            </div>
                        </div>
                        <!-- ends: .card -->

                    </div>
        </div>
    </div>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script type="text/javascript">

 $(".save_btn").click(function (e) {
    e.preventDefault();
    var func_n = "edit_user"; 
    $form = $("#inForm"); 
    add_form($form);
    function add_form($form) {
        var cntrl = "User";
        var mthd = "ajax";
        var formdata = new FormData($form[0]);
        formdata.append("func_n", func_n);
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>index.php/" + cntrl + "/" + mthd,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".err").html("");
                if(data.status==false){
                    $(".err_name").html(data.name);
                    $(".err_uname").html(data.uname);
                    $(".err_pswrd").html(data.pswrd);
                    $(".err_cpswrd").html(data.cpswrd);
                    $(".err_email").html(data.email);
                    $(".err_urole").html(data.urole);
                   
                        $.each(data.errors, function(key,val) {
                            $(".err_"+key).html(val);
                        });
            
                }else{
                   
                    setTimeout(function(){ window.location.reload ()});
                }
            }
        });
    }
}); 
</script>
