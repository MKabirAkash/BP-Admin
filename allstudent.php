
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
                </i>All Students</a>
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
            <a href={% url 'addstudent' %} data-bs-theme="light" class="btn bg-body btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#addstudentmodal" id="kt_toolbar_primary_button">New Admission</a>
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
                <div class="card-title">View Students</div>
                <div class="card-toolbar">
                    <div class="row">
                        <div class="col-md-auto col-sm-6 ">
                            <div class="d-felx">
                                <div>
                                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="modal" data-bs-target="#myModal2">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" fill="none" viewbox="0 0 24 24">
                                                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor">

                                                </path>
                                            </svg>
                                        </span>
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto col-sm-6 ">
                            <div class="d-felx">
                                <div>
                                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="modal" data-bs-target="#myModal">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" fill="none" viewbox="0 0 24 24">
                                                <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor"></rect>
                                                <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor"></path>
                                                <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4"></path>
                                            </svg>
                                        </span>
                                        Export
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
                                <th class="min-w-125px">Name</th>
                                <th class="min-w-125px">Phone</th>
                                <th class="min-w-125px">Gender</th>
                                <th class="min-w-125px">Course</th>
                                <th class="min-w-125px">Batch</th>
                                <th class="min-w-125px">Roll</th>
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
                                    <td class="text-muted">123456</td>
                                    <td class="text-end" style="min-width:150px">
                                        <a href="#" class="btn btn-primary btn-sm px-3"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="far fa-eye"></i>View</a>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                </div>                
            </div>          
        </div>
    </div>
</div>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="fs-5 text-dark fw-bolder">
                <h5 class="modal-title" id="exampleModalLabel">Export Options</h5>
            </div>
            <div class="separator border-gray-200"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="px-7 py-5">
            <form action="#" method="POST" target="_blank">
                <input type="hidden" name="type" value="export" />
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">Course</label>
                    <select name="course" id="IdCourse" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;">
                        <option selected disabled value >All courses</option>
                    </select>
                </div>
                <div class="separator border-gray-200"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">Batch</label>
                    <select name="course" id="IdBatch" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;">
                        <option selected disabled value >Batch</option>
                    </select>
                </div>
                <div class="separator border-gray-200"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">Gender</label>
                    <select name="gender" id="IdGender" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;">
                        <option selected disabled value >Any Gender</option>
                        <option value="Female" >Female</option>
                        <option value="Male" >Male</option>
                        
                    </select>
                </div>

            </form>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Export</button>
        </div>
      </div>
    </div>
  </div>







  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="fs-5 text-dark fw-bolder">
                <h5 class="modal-title" id="exampleModalLabel">Filter Options</h5>
            </div>
            <div class="separator border-gray-200"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="px-7 py-5">
            <form action="#" method="POST" target="_blank">
                <input type="hidden" name="type" value="filter" />
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">Course</label>
                    <select name="filtercourse" id="fCourse" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;">
                        <option selected disabled value >All courses</option>
                        <option  value="first" >First Course</option>
                        <option  value="second" >2nd course</option>
                    </select>
                </div>
                <div class="separator border-gray-200"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">Batch</label>
                    <select name="filterbatch" id="fBatch" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;">
                        <option selected disabled value >Batch</option>
                    </select>
                </div>
                <div class="separator border-gray-200"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">Gender</label>
                    <select name="filtergender" id="fGender" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;">
                        <option selected disabled value >Any Gender</option>
                        <option value="Female" >Female</option>
                        <option value="Male" >Male</option>
                        
                    </select>
                </div>
                <div class="separator border-gray-200"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">Gender</label>
                    <select name="filterpayment" id="fpayment" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;">
                        <option selected disabled value >Payment Status</option>
                        <option value="Paid" >Full Paid</option>
                        <option value="Due" >Only due</option>
                        <option value="Overdue" >Over due</option>
                    </select>
                </div>

            </form>
          </div>
          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary-light">Reset</button>
          <button type="button" class="btn btn-primary">Apply</button>
        </div>
      </div>
    </div>
  </div>
  


<?php require_once 'footer.php'; ?>