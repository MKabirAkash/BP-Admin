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
                </i>Edit Details</a>
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
        <div class="row">
            <div class="col-6 p-5">
                <div class="card">
                    <div class="card-header pt-6">
                        <div class="card-title text-dark fw-bold">
                            Edit Student Data
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="container p-2">
                            <form>
                                <input type="hidden" name="upstudent" value="upstudentvalue"/>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-5">
                                            <label class="form-label text-muted fs-6">Name*</label>
                                            <input type="text" name="editedname" id="editedName" value="" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-5">
                                            <label class="form-label text-muted fs-6">Phone No*</label>
                                            <input type="text" value="" name="editedphone" id="editedPhone" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-5">
                                            <label class="form-label text-muted fs-6">Date Of Birth*</label>
                                            <input type="date" name="editebday" id="editedBday" value="" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-5">
                                            <label class="form-label text-muted fs-6">Guardian Phone No*</label>
                                            <input type="text" value="" name="editedgphone" id="editedGPhone" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                        </div>
                                    </div>
                                </div> 



                                <div class="mb-5">
                                    <label class="form-label text-muted fs-6">College Name*</label>
                                    <input type="test" value="" name="editedclg" id="editedClg" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-5">
                                            <label class="form-label text-muted fs-6">SSC Roll</label>
                                            <input type="text" name="editebday" id="editedBday" value="" class="text-dark form-control fw-bold fs-6" placeholder="(optional)" /> 
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-5">
                                            <label class="form-label text-muted fs-6">HSC Roll</label>
                                            <input type="text" value="" name="editedgphone" id="editedGPhone" class="text-dark form-control fw-bold fs-6" placeholder="(optional)" /> 
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Save</button> 
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 p-5">
                <div class="card">
                    <div class="card-header pt-6">
                        <div class="card-title text-dark fw-bold">
                            Update Admission Data
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container p-2">
                            <form>
                                <input type="hidden" name="upstudent" value="upstudentvalue"/>
                                <div class="mb-5">
                                    <label class="form-label text-muted fs-6">Batch*</label>
                                    <select name="editedbatch" id="editedBatch" class=" fw-bold  form-control custom-select" style="background-color: #f8f9fa;
									border: 1px solid #ced4da;font-size: 16px;">
										<option selected disabled value >--select batch--</option>
										<option value="c1" >course 1</option>
										<option value="c2" >course 2 </option>
										<option value="c3" >course 3</option>
									</select>
                                </div>
                                <div class="mb-5">
                                    <label class="form-label text-muted fs-6">Roll No*</label>
                                    <input type="number" value="" name="editedroll" id="editedroll" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                </div>
                                <button class="btn btn-primary mb-5">Update</button>
                                <div class="separator border-gray-200"></div>
                                <button class="btn btn-danger w-100 mt-10"><i class="fas fa-trash"></i>Delete this Admission</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>







<?php require_once 'footer.php'; ?>