<div class="contents">

<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row" >
            <div class="col-lg-12" >
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Bank Module</h4>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <h6>View bank company </h6>
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
                                            $this->db->select('bank_company_accounts.*,bank.bank_name as bname,bank_branches.branch_name as branchname');
                                            $this->db->join("bank","bank.id=bank_company_accounts.bank","left");
                                            $this->db->join("bank_branches","bank_branches.id=bank_company_accounts.bank_branch","left");
                                            $baccount = $this->Common_model->get_all('bank_company_accounts')->result();
                                            if ($baccount):
                                                foreach ($baccount as $information):  
                                            ?>
                                                <tr>
                                                  
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                                <a href="#" class="text-dark fw-500">
                                                                    <h6> <?= $information->bname ?></h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                        <?= $information->branchname ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                        <?= $information->account_no ?> 
                                                        </div>
                                                    </td>
                                                   
                                                   
                                                    <td>
                                                        <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                         <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                            <li>
                                                                <a href="#" class="view">
                                                                    <span class="fa fa-eye"></span></a>
                                                            </li>
                                                            <li>
                                                                <a href='#' class="edit">
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


<script type="text/javascript">
        $('.example').DataTable();        
   
                                        
</script>
