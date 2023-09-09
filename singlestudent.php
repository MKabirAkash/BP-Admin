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
                </i>Md. Student</a>
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
                <div class="card-title text-dark fw-bold">Student Information</div>
                <div class="card-toolbar">
                    <div class="row">
                    <div class="col-md-auto col-sm-1 ">
                            <div class="d-felx">
                                <div>
                                    <button type="button" class="btn btn-light-primary me-0" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="modal" data-bs-target="#expenseModal">
                                        <span class="svg-icon svg-icon-2"> 
                                        </span>
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-auto col-sm-3 ">
                            <div class="d-felx">
                                <div>
                                    <button type="button" class="btn btn-light-primary me-0" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="modal" data-bs-target="#expenseModal">
                                        <span class="svg-icon svg-icon-2">
                                        <i class="fa-solid fa-print"></i>  
                                        </span>
                                        Recipt
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto col-sm-3 ">
                            <div class="d-felx">
                                <div>
                                    <button type="button" class="btn btn-light-primary me-0" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="modal" data-bs-target="#expenseModal">
                                        <span class="svg-icon svg-icon-2">
                                        <i class="fa-solid fa-download text primary"></i>
                                        
                                        </span>
                                        Recipt
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto col-sm-3 ">
                            <div class="d-felx">
                                <div>
                                    <button type="button" class="btn btn-light-primary me-0" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="modal" data-bs-target="#expenseModal">
                                        <span class="svg-icon svg-icon-2">
                                        <i class="fa-solid fa-download text primary"></i>  
                                        </span>
                                        ID Card
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card-body py-8">  
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="container">
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">Student Name</label></div>
                                <div class="col-6"><span class=" text-gray-80 fw-bolder fs-6">akash</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold">Student Phone</label></div>
                                <div class="col-6"><span class=" text-gray-80 fw-bolder fs-6">01711111182</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold">Date of Birth</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6">5th September,2008</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">Gender</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6">Male</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">Student College</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6">[not set]</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-2">
                                <div class="col-6"><label class="text-muted fw-bold ">SSC Roll</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6">[not set]</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">HSC Roll</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6 ">[not set]</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold">Guardian's Phone</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6">00118822332</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 border-left ">
                        <div class="container">
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold">Admission Date</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6">05 Sep 2023</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold">Admission Time</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6">09:36:44 PM</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">Course Name</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6">DU A</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">Roll Number</label></div>
                                <div class="col-6"><sapn class="text-gray-80 fw-bolder fs-6">123444</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">Batch Days</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6">Sat-Mon-Wed</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">Batch Time</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6">07:00 AM - 09:00 AM</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">Course Fee</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6 ">Tk. 9999</span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">Total</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6 ">Tk. 9999</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                    <div class="container">
                            <div class="row my-5">
                                <div class="col-12"><h4 class=" fw-bold align-items-start">Payment Details</h4></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold">Paid on Admission</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6 ">Tk 7999 <span class="badge badge-light-success fs-7">paid</span></span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-12"><h4 class=" fw-bold align-items-start">Late Payment(s)</h4></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <div class="col-6"><label class="text-muted fw-bold ">31st september,2023</label></div>
                                <div class="col-6"><span class="text-gray-80 fw-bolder fs-6 align-items-start">Tk 2000<span class="badge badge-light-warning fs-7">unpaid</span></span></div>
                            </div>
                            <div class="separator separator-dashed border-gray-200"></div>
                            <div class="row my-5">
                                <button class="btn btn-block btn-light btn-active-primary">Pay Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>
</div>


<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl pt-8">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card">
            <div class="card-header pt-6 boarder-0">
                <div class="card-title text-dark fw-bold">Material Details</div>
            </div>
            <div class="card-body">
                <div class="row p-5">
                    <span class="text-gray-80 fs-5"> material 1</span>
                </div>
                <div class="row p-5">
                    <span class="text-gray-80 fs-5"> material 2</span>
                </div>
                <button class="btn btn-primary">Upgrade materials</button>
            </div>      
        </div>
    </div>
</div>






<?php require_once 'footer.php'; ?>