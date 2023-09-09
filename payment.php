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
                </i>Payment History</a>
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
            <a href="#" data-bs-theme="light" class="btn bg-body btn-flex btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#addstudentmodal" id="kt_toolbar_primary_button">New Admission</a>
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
            <div class="card-header border-0 pt-6 fw-bold">
                <div class="card-title">Teacher's Payment</div>
            </div>
            <div class="card-body py-4">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-140px">Name</th>
                                <th class="min-w-140px">Phone</th>
                                <th class="min-w-140px">Track Id</th>
                                <th class="min-w-140px">Course</th>
                                <th class="min-w-140px">Issue Date</th>
    
                            </tr>
                        </thead>

                            <tbody class="text-gray-600 fw-bold">
                                <tr>
                                    <td>Sarjil</td>
                                    <td>01711233444</td>
                                    <td class="text-muted">Male</td>
                                    <td class="text-muted">Courses</td>
                                    <td class="text-muted">02:00pm - 04:30pm</td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
    </div>





    <div class="content flex-row-fluid" id="kt_content">
        <div class="card">
            <div class="card-header border-0 pt-6 fw-bold">
                <div class="card-title ">Employee's Payment</div>
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
                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-130px">Name</th>
                                <th class="min-w-130px">Phone</th>
                                <th class="min-w-130px">Track Id</th>
                                <th class="min-w-130px">Department</th>
                                <th class="min-w-130px">Designation</th>
                                <th class="min-w-130px">Issue Date</th>
    
                            </tr>
                        </thead>
                            <tbody class="text-gray-600 fw-bold">
                                <tr>
                                    <td>Sarjil</td>
                                    <td>01711233444</td>
                                    <td class="text-muted">Male</td>
                                    <td class="text-muted">Courses</td>
                                    <td class="text-muted">SE</td>
                                    <td class="text-muted">02:00pm - 04:30pm</td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
    </div>

</div>

<?php require_once 'footer.php'; ?>