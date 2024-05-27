
<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">User Module</h4>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>View User </h6>
                            </div>
                            <div class="card-body py-md-30">
                          

                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                    <div class="table-responsive">
                                       
                                        <div id="filter-form-container"></div>
                                        <table  class="table mb-0 table-borderless adv-table example" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                            <thead>
                                                <tr class="userDatatable-header">
                                                 
                                                    <th>
                                                        <span class="userDatatable-title">name</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">emaill</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">user role</span>
                                                    </th>
                                                    <!-- <th data-type="html" data-name='position'>
                                                        <span class="userDatatable-title">position</span>
                                                    </th> -->
                                                    <!-- <th>
                                                        <span class="userDatatable-title">join date</span>
                                                    </th> -->
                                                    <th data-type="html" data-name='status'>
                                                        <span class="userDatatable-title">status</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title float-right">action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                            <?php
                                            $this->db->select('system_user.*,system_user_type.name as rolename');
                                            $this->db->join("system_user_type","system_user_type.id=system_user.user_role","LEFT");
                                            $user = $this->Common_model->get_all('system_user')->result();
                                            if ($user):
                                                foreach ($user as $information):  
                                            ?>
                                                <tr>
                                                  
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                                <a href="#" class="text-dark fw-500">
                                                                    <h6> <?= $information->name ?></h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                        <?= $information->email ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                        <?= $information->rolename ?> 
                                                        </div>
                                                    </td>
                                                   
                                                   
                                                    <td>
                                                       
                                                   
                                                        <div class="custom-control custom-switch switch-primary switch-md "><br>
                                                         

                                                          <?php if($information->active_status=="1"){ ?>    
                                                            <!-- <button  class="btn btn-success" style="color:#fff"  data-toggle="tooltip" title="activate"  ?>)" ><i class="fas fa-sync"></i>&nbsp;</button> -->
                                                            <input type="checkbox" class="custom-control-input deactive" id="switch-s<?php echo $information->id; ?>" value="<?php echo $information->id; ?>"  checked>
                                                              <label class="custom-control-label " for="switch-s<?php echo $information->id; ?>"> </label>
                                                          
                                                            <?php } ?> 
                                                            <?php if($information->active_status=="0") {?>
                                                            <!-- <button  class="btn btn-danger" style="color:#fff" data-toggle="tooltip" title="deactivate"  ><i class="fas fa-times"></i>&nbsp;</button> -->
                                                            <input type="checkbox" class="custom-control-input active" id="switch-s<?php echo $information->id; ?>" value="<?php echo $information->id; ?>">
                                                              <label class="custom-control-label " for="switch-s<?php echo $information->id; ?>"> </label>
                                                          
                                                            <?php }?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                            <li>
                                                                <a href="#" class="view">
                                                                    <span class="fa fa-eye"></span></a>
                                                            </li>
                                                            <li>
                                                                <a href='<?php echo base_url(); ?>index.php/User/Edit?id=<?php echo $information->id; ?>' class="edit">
                                                                   <span class="far fa-edit"></span></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="remove">
                                                                   <span class="far fa-trash-alt"></span></a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                           
                                            <?php
                                            endforeach;
                                            endif;
                                            ?>
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
<!-- sweetalert -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/sweetalert.js"></script>

<script type="text/javascript">
        $('.example').DataTable();        

    $("body").on("click",".deactive",function(){
        swal({
        title: "Deactive User?",
        text: "Are you sure you want to deactive user now !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/User/ajax",
                type:'POST',
                data: {
                "uid": $(this).val(),
                "func_n":"deactiveuser"
                }, 
                success: function(data){
                    
                    
                        setTimeout(function(){window.location.reload();});
                
                }
            });
        } 
        });  

  });

  $("body").on("click",".active",function(){
    swal({
    title: "Active User",
    text: "Are you sure you want to active user now !",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/User/ajax",
            type:'POST',
            data: {
            "uid": $(this).val(),
            "func_n":"activeuser"
            }, 
            success: function(data){
                   
                  
                    setTimeout(function(){window.location.reload();});
             
            }
        });
    } 
    });  
});

 

                                
</script>
