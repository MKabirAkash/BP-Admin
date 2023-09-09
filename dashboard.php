
<?php include 'header.php' ?>
<div class="toolbar py-5 pb-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
        <!--begin::Actions--> 
        <div class="d-flex align-items-center py-3 py-md-1 fw-bold">
            <a  class="btn btn-custom btn-active-white btn-flex btn-color-white btn-active-color-white " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-filter fs-5 me-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>Dashbord</a>
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
            <a href="#" data-bs-theme="light" class="btn bg-body btn-active-color-primary" data-kt-menu-placement="bottom-end" data-bs-toggle="modal" data-bs-target="#addstudentmodal" id="kt_toolbar_primary_button">New Admission</a>
            </div>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
<!--begin::Container-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <!--begin::Post-->
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Row-->
        <div class="row">
            <!--begin::Col-->
            <div class="col-xl-4 mb-xl-9 height-75">
                <!--begin::Engage widget 3-->
                <div class="card bg-white h-md-100" data-bs-theme="light">
                    <div class="card-body ">
                        <h2 class="fs-2hx fw-bolder">
                            <i class="fas fa-user-graduate fs-2hx text primary"></i>
                            20
                        </h2>
                        <p class="fw-bold text-muted mb-4">Total students Admitted</p>
                        <p class="mt-3 fw-bold text-muted position-relative ps-5" style="margin-bottom:5px"> <span style="width: 12px;background:#009EF7;border-radius:50%;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                             Total Male Students : 20
                        </p>
                        <p class="mt-3 fw-bold text-muted position-relative ps-5" style="margin-bottom:5px"> <span style="width: 12px;background:#009EF7;border-radius:50%;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                            Total Female Students : 0
                       </p>
                        <p class="mb-1 mt-8 fw-bold text-dark position-relative ps-5"><span style="width: 12px;background:#00e396;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                        Number of Students With No Due : 8
                        </p>
                        <p class="mb-1 fw-bold text-dark position-relative ps-5"><span style="width: 12px;background:#ffc450;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                        Number of Students with Due : 10
                        </p>
                        <p class="mb-1 fw-bold text-dark position-relative ps-5"><span style="width: 12px;background:red;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                        Students with OverDue Status : 2
                        </p>
                    </div>
                </div>
                <!--end::Engage widget 3-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-8 mb-5 mb-xl-10">
                <!--begin::Chart widget 11-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Student Admitted in Last Months</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    
                    <div class="card-body pb-0 pt-4">
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <div class="tab-content">
                                <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                                <script>
                                    const lValues = [100,200,300,400,500,600,700,800,900,1000];
                                    
                                    new Chart("myChart", {
                                      type: "line",
                                      data: {
                                        labels: lValues,
                                        datasets: [{ 
                                          data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
                                          borderColor: "blue",
                                          fill: false
                                        }]
                                      },
                                      options: {
                                        legend: {display: false}
                                      }
                                    });
                                    </script>
                            
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Chart widget 11-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <div class="row gy-5 g-xl-10" style="max-height:50%;">
            <!--begin::Col-->
            <div class="col-xl-4 mb-xl-10">
                <!--begin::Engage widget 3-->
                <div class="card bg-white h-md-100" data-bs-theme="light">
                    <div class="card-body ">
                        <h2 class="fs-2hx fw-bolder">
                            <span style="color:#00e396">৳</span>
                            201000
                        </h2>
                        <p class="fw-bold text-muted mb-4">Branch's Current Balance </p>
                        
                        <p class="mb-1 mt-8 fw-bold text-dark position-relative ps-5"><span style="width: 12px;background:#00e396;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                        Deposited : ৳
                        </p>
                        <p class="mb-1 fw-bold text-dark position-relative ps-5"><span style="width: 12px;background:#ffc450;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                        Due : ৳
                        </p>
                        <p class="mb-1 fw-bold text-dark position-relative ps-5"><span style="width: 12px;background:red;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                        Over Due : ৳
                        </p>
                        <p class="mb-1 fw-bold text-dark position-relative ps-5"><span style="width: 12px;background:black;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                            Total : ৳
                        </p>

                        <p class="mt-4 fw-bold text-muted position-relative ps-5" style="margin-bottom:5px"> <span style="width: 12px;background:#009EF7;border-radius:50%;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                            Teacher Payment : ৳
                       </p>
                       <p class="mt-1 fw-bold text-muted position-relative ps-5" style="margin-bottom:5px"> <span style="width: 12px;background:#009EF7;border-radius:50%;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                           Employee Payment : ৳
                      </p>
                      <p class="mt-1 fw-bold text-muted position-relative ps-5" style="margin-bottom:5px"> <span style="width: 12px;background:#009EF7;border-radius:50%;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                        Branch Expense : ৳
                       </p>
                       <p class="mt-1 fw-bold text-muted position-relative ps-5" style="margin-bottom:5px"> <span style="width: 12px;background:#009EF7;border-radius:50%;display:inline-block;height: 12px;position:absolute;left: 0;top:3px;"></span>
                        Loans Taken : ৳
                       </p>
                </div>
            </div>
        </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-8 mb-5 mb-xl-10">
                <!--begin::Chart widget 11-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Student Admitted in Last Months</span>
                        </h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pb-0 pt-4">
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <canvas id="myChart2" style="width:100%;max-width:700px"></canvas>
                            <script>
                                const xValues = [100,200,300,400,500,600,700,800,900,1000];
                                
                                new Chart("myChart2", {
                                  type: "line",
                                  data: {
                                    labels: xValues,
                                    datasets: [{ 
                                      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
                                      borderColor: "blue",
                                      fill: false
                                    }]
                                  },
                                  options: {
                                    legend: {display: false}
                                  }
                                });
                                </script>
                            
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Chart widget 11-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->




        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-xl-12 mb-xl-12">
                <div class="card card-flush h-xl-100">
                    <div class="card-header pt-7">
                        <h4 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-gray-800"> All Courses </span>
                        </h4>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive" >
                            <table class="table table-row-dashed align-middle gs-0 gy-5 my-0">
                                <thead>
                                    <tr class="border-bottom-0">
                                        <th class="p-0 min-w-300px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-50px"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-0">
                                            <span class="text-dark fw-bolder fs-6">....</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-info fw-bolder d-block fs-6">3</span>
                                            <span class="text-gray-400 fw-bold d-block fs-7">Total Batches</span>

                                        </td>
                                        <td class="text-center">
                                            <span class="text-primary fw-bolder d-block fs-6">20</span>
                                            <span class="text-gray-400 fw-bold d-block fs-7">Total Students</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-success fw-bolder d-block fs-6">৳ 155484</span>
                                            <span class="text-gray-400 fw-bold d-block fs-7">Total Deposit</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-warning fw-bolder d-block fs-6">৳ 9999</span>
                                            <span class="text-gray-400 fw-bold d-block fs-7">Total Due</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-danger fw-bolder d-block fs-6">৳ 7999</span>
                                            <span class="text-gray-400 fw-bold d-block fs-7">Total Over Due</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="Admin/courseinfo.php" class="btn text-white btn-sm btn-bg-primary">Details</a>
                                        </td>
                                        

                                    </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>	
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->

    </div>
</div>
</div>
<?php require_once 'footer.php'?>