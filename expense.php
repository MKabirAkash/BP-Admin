<?php require_once 'header.php' ?>

<div class="toolbar py-5 pb-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
        <!--begin::Actions--> 
        <div class="d-flex align-items-center py-3 py-md-1 fw-bold">
            <a  class="btn btn-custom btn-active-white btn-flex btn-color-white btn-active-color-white " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-filter fs-5 me-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>Expenses</a>
        </div>
        <div class="d-flex align-items-center py-3 py-md-1 ">
            <!--begin::Wrapper-->
            <div class="mx-10">
                <a href="Admin/allstudent.php" class="btn btn-custom btn-active-white btn-flex btn-color-white btn-active-color-white "  data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-filter fs-5 me-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>View Students</a>
                <!--begin::Menu 1-->
            </div>
            
            <!--end::Wrapper-->
            <!--begin::Button-->
            <div>
            <a href="#" data-bs-theme="light" class="btn bg-body btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#addstudentmodal" id="kt_toolbar_primary_button">New Admission</a>
            </div>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>




<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">Branch Expenses</div>
                <div class="card-toolbar">
                    <div class="row">
                        <div class="col-md-auto col-sm-6 ">
                            <div class="d-felx">
                                <div>
                                    <button type="button" id="expenseAddBtn" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="modal" data-bs-target="#expenseModal">
                                        <span class="svg-icon svg-icon-2">
                                            
                                        </span>
                                        Create Expense
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Amount</th>
                                <th class="min-w-125px">Done By</th>
                                <th class="min-w-125px">Purpose</th>
                                <th class="min-w-125px">Confirmed by</th>
                                <th class="min-w-125px">Issue Date</th>
                                <th class="text-end" style="min-width: 150px"></th>
                            </tr>
                        </thead>
                            <tbody class="text-gray-600 fw-bold">
                                <tr>
                                    <td>Sarjil</td>
                                    <td>01711233444</td>
                                    <td class="text-muted">Male</td>
                                    <td class="text-muted">Courses</td>
                                    <td class="text-muted">02:00pm - 04:30pm</td>
                                    <td class="text-end" style="min-width:150px">
                                        <a href="#" class="btn btn-danger btn-sm px-3"><i class="fas fa-trash"></i></a>
                                        <a href="#" class="btn btn-primary btn-sm px-3"><i class="fa-solid fa-download"></i></a>
                                        <a href="#" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i>paid</a>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                </div>

                
               
            </div>          
        </div>
    </div>
</div>



<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="fs-5 text-dark fw-bolder">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Create new expense</h5>
            </div>
            <div class="separator border-gray-200"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="px-7 py-2">
            <div id="expenseAlert"></div>
            <form action="#" id="addExpenseForm">
                <input type="hidden" name="type" value="export" />
                <div class="mb-5">
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label fs-6 fw-bold">Amount*</label>
                            <input type="number" name="expenseamount" id="expenseAmount" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                            border: 1px solid #ced4da;font-size: 16px;" />
                        </div>
                        <div class="col-8">
                            <label class="form-label fs-6 fw-bold">Purpose*</label>
                            <select name="expensepurpose" id="expensePurpose" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                            border: 1px solid #ced4da;font-size: 16px;">
                                <option selected disabled value >Select Expense purpose</option>
                                <option value="tpay" >Teacher Payment</option>
                                <option value="epay" >Employee Payment</option>
                                <option value="other" >Others..</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="row mb-5" id="conditionaldiv1">
                    </div>

                <div class="separator border-gray-200"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">Done By*</label>
                    <select name="expensedoneby" id="expenseDoneBy" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;">
                        <option selected disabled value >---select a person---</option>
                        <?php 
                            include 'dbconnect.php'; 
                            try{
                                $userquery=$conn->prepare("SELECT phone FROM user;");
                                $userquery->execute();
                                $rows=$userquery->fetchAll(PDO::FETCH_ASSOC);
                                foreach($rows as $row){
                                    echo '<option value="'.$row['phone'].'">'.$row['phone'].'</option>';
                                }
                            }
                            catch(error){
                                echo '<option value="own">Own</option>';
                            }
                            
                        
                        ?>
                    </select>
                </div>
                <div class="separator border-gray-200"></div>
                <div class="mb-0">
                    <label class="form-label fs-6 fw-bold">Confirmed By*</label>
                    <select name="expenseconfirmedby" id="expenseConfirmedBy" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;">
                        <option selected disabled value >---select a person---</option>
                        <?php 
                            include 'dbconnect.php'; 
                            try{
                                $userquery=$conn->prepare("SELECT phone FROM user;");
                                $userquery->execute();
                                $rows=$userquery->fetchAll(PDO::FETCH_ASSOC);
                                foreach($rows as $row){
                                    echo '<option value="'.$row['phone'].'">'.$row['phone'].'</option>';
                                }
                            }
                            catch(error){
                                echo '<option value="own">Own</option>';
                            }
                            
                        
                        ?> 
                    </select>
                </div>
            </form>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" id="addExpenseBtn"class="btn btn-primary">Confirm</button>
        </div>
      </div>
    </div>
  </div>



<?php require_once 'footer.php'; ?>