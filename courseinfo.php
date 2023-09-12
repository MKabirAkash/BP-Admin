
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
                </i>Course Information</a>
        </div>
        <div class="d-flex align-items-center py-3 py-md-1 ">
            <!--begin::Wrapper-->
            <div class="mx-10">
                <a href="#" class="btn btn-custom btn-active-white btn-flex btn-color-white btn-active-color-white "  data-kt-menu-placement="bottom-end" data-bs-toggle="modal" data-bs-target="#addcoursemodal">
                <i class="ki-duotone ki-filter fs-5 me-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>New Course</a>
                <!--begin::Menu 1-->
            </div>
            
            <!--end::Wrapper-->
            <!--begin::Button-->
            <div>
            <a href="#" data-bs-theme="light" class="btn bg-body btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#addbatchmodal" id="kt_toolbar_primary_button">New Batch</a>
            </div>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>


<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="row ">
            <div class="col-md-6 p-8">
                <div class="card p-5">
                    <div class="card-header border-0 pt-5">
                        <div class="card-title">
                            <div>
                                <h1 class="text-dark  fw-bold"><span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">23</span></h1>
                                <p class="text-muted fs-6 mt-0">Total students</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-stack my-2">
                            <div class="text-gray-700 fw-bold fs-6 me-2 align-items-start"><i class="fa-solid fa-mars w-20px text-success" ></i>Male students</div>
                            <div class="d-flex align-items-senter"><span class="text-gray-900 fw-bolder fs-6">20</span></div>
                        </div>
                        <div class="separator separator-dashed border-gray-200"></div>
                        <div class="d-flex flex-stack my-2">
                            <div class="text-gray-700 fw-bold fs-6 me-2 align-items-start"><i class="fa-solid fa-venus w-20px text-danger" ></i>Female students</div>
                            <div class="d-flex align-items-senter"><span class="text-gray-900 fw-bolder fs-6">3</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 p-8">
                <div class="card p-5">
                    <div class="card-header border-0 pt-5">
                        <div class="card-title">
                            <div>
                                <h1>৳<span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">230000</span></h1>
                                <p class="text-muted fs-6 mt-0 px-2">Total course sales</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-stack my-1">
                            <div class="text-dark flex-glow fwfs-5 me-2 align-items-start">Total Tk Paid</div>
                            <div class="fw-boldest fs-6 badge badge-light-success text-xxl-end">৳ 120000</div>
                        </div>
                        <div class="d-flex flex-stack my-1">
                            <div class="text-dark flex-glow fs-5 me-2 align-items-start">Total Tk Due</div>
                            <div class="fw-boldest fs-6 badge badge-light-warning text-xxl-end">৳ 90000</div>
                        </div>
                        <div class="d-flex flex-stack my-1">
                            <div class="text-dark flex-glow fs-5 me-2 align-items-start">Total Tk Overdue</div>
                            <div class="fw-boldest fs-6 badge badge-light-danger text-xxl-end">৳ 20000</div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="row">
            <div class="card p-5">
                    <div class="card-header border-0 pt-5">
                        <div class="card-title">
                            <div>
                                <h3 class=""text-dark fw-bold">View by Batches</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed align-middle gs-0 gy-5 my-0">
                                <thead>
                                    <tr class="border-bottom-0">
                                        <th class="p-0 min-w-300px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-200px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-0">
                                        <span class="text-dark fw-bolder fs-6">09:00am - 11:00am (Sun-Mon-Wed)</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-dark fw-bolder d-block fs-6">3</span>
                                            <span class="text-gray-400 fw-bold d-block fs-7">Total students</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-dark fw-bolder d-block fs-6">3</span>
                                            <span class="text-gray-400 fw-bold d-block fs-7">Male students</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-dark fw-bolder d-block fs-6">0</span>
                                            <span class="text-gray-400 fw-bold d-block fs-7">Female students</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-primary">View all</a>
                                            <a href="#" class="btn btn-sm btn-warning">View Due</a>
                                            <a href="#" class="btn btn-sm btn-danger">View Overdue</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    <!--end::Container-->

 <div class="modal fade" id="addcoursemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="fs-5 text-dark fw-bolder">
                <h5 class="modal-title" id="exampleModalLabel">New Course</h5>
            </div>
            <div class="separator border-gray-200"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="px-7 py-5">
            <form action="#" method="POST" target="_blank" >
                <input type="hidden" name="type" value="filter" />
                <div id="courseAlert"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">Title</label>
                    <input type="text" name="coursetitle" id="courseTitle" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;" placeholder="Enter a title for new course" />
                </div>
                <div class="separator border-gray-200"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">Price</label>
                    <input type="number" name="courseprice" id="coursePrice" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;" placeholder="Enter price of course"/>
                </div>
                <div class="modal-footer">
                    <button id="addCourseBtn" type="button" class="btn btn-primary">Confirm</button>
                </div>
            </form>
          </div>
          
        </div>
       
      </div>
    </div>
  </div>



  <div class="modal fade" id="addbatchmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="fs-5 text-dark fw-bolder">
                <h5 class="modal-title" id="exampleModalLabel">New batch</h5>
            </div>
            <div class="separator border-gray-200"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="px-7 py-5">
            <form action="#" method="POST" target="_blank" id="checkBoxForm">
                <input type="hidden" name="type" value="filter" />
                <div id="batchAlert"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">*Course</label>
                    <select name="filtercourse" id="fCourse" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;">
                        <option selected disabled value >--select course--</option>
                        <?php 
                            include 'dbconnect.php'; 
                            try{
                                $userquery=$conn->prepare("SELECT * FROM course;");
                                $userquery->execute();
                                $rows=$userquery->fetchAll(PDO::FETCH_ASSOC);
                                foreach($rows as $row){
                                    echo '<option value="'.$row['course_id'].'">'.$row['title'].'</option>';
                                }
                            }
                            catch(error){
                                echo '<option value="own">No course running..</option>';
                            }
                            
                        
                        ?>
                    </select>
                </div>
                <div class="separator border-gray-200"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">*Weekdays</label>
                    <form >
                        <div class="form-group">
                            <div class="row my-2">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Friday" id="friday">
                                        <label class="form-check-label" for="friday">Friday</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Saturday" id="saturday">
                                        <label class="form-check-label" for="saturday">Saturday</label>
                                    </div>
                                </div> 
                                <div class="col-4">   
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Sunday" id="sunday">
                                        <label class="form-check-label" for="sunday">Sunday</label>
                                    </div>
                                </div>
                            <div class="row my-2">
                                <div class="col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Monday" id="monday">
                                        <label class="form-check-label" for="monday">Monday</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Tuesday" id="tuesday">
                                        <label class="form-check-label" for="tuesday">Tuesday</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Wednesday" id="wednesday">
                                        <label class="form-check-label" for="wednesday">Wednesday</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="days[]" value="Thursday" id="thursday">
                                        <label class="form-check-label" for="thursday">Thursday</label>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </form>
                </div>
                <div class="separator border-gray-200"></div>
                <div class="mb-5">
                    <label class="form-label fs-6 fw-bold">*Start Time</label>
                    <input type="time" name="filtercourse" id="fStartTime" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;" />
                </div>
                <div class="separator border-gray-200"></div>
                <div class="mb-5">
                <label class="form-label fs-6 fw-bold">*End Time</label>
                    <input type="time" name="filterbatch" id="fEndTime" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;
                    border: 1px solid #ced4da;font-size: 16px;" />
                </div>
                <button type="submit" id="addBatchBtn" class="btn btn-primary">Confirm</button>
            </form>
          </div> 
        </div>
        <div class="modal-footer">   
        </div>
      </div>
    </div>
  </div>


<?php require_once 'footer.php'; ?>