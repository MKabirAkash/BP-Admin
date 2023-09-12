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
        <?php
            include 'dbconnect.php';
            include 'myfunc.php';
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $gs = $conn ->prepare("SELECT * FROM student WHERE id = ?;");
                $gs -> bindParam(1, $id, PDO::PARAM_STR);
                $gs -> execute();
                $std = $gs ->fetch(PDO::FETCH_ASSOC);
                if($std){
                    $bid = (string)$std['batch_id'];
                    $ecourseid=(string)$std['course_id'];                                        
                    $gb = $conn ->prepare("SELECT * FROM batch WHERE batch_id = ?;");
                    $gb -> bindParam(1, $bid, PDO::PARAM_STR);
                    $gb ->execute();
                    $bti = $gb ->fetch(PDO::FETCH_ASSOC); ?>
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
                                        <div id="studentUpdateAlert2"></div>
                                        <input type="hidden" name="upstudent" value="upstudentvalue"/>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-5">
                                                    <label class="form-label text-muted fs-6">Name*</label>
                                                    <input type="text" name="editedname" id="editedName" value="<?php echo out($std['sname']); ?>" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-5">
                                                    <label class="form-label text-muted fs-6">Phone No*</label>
                                                    <input type="text" value="<?php echo out($std['snumber']); ?>" name="editedphone" id="editedPhone" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-5">
                                                    <label class="form-label text-muted fs-6">Date Of Birth*</label>
                                                    <input type="date" name="editebday" id="editedBday" value="<?php echo out($std['sdob']); ?>" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-5">
                                                    <label class="form-label text-muted fs-6">Guardian Phone No*</label>
                                                    <input type="text" value="<?php echo out($std['gnumber']); ?>" name="editedgphone" id="editedGPhone" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                                </div>
                                            </div>
                                        </div> 



                                        <div class="mb-5">
                                            <label class="form-label text-muted fs-6">College Name*</label>
                                            <input type="test" value="<?php echo out($std['scollege']); ?>" name="editedclg" id="editedClg" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-5">
                                                    <label class="form-label text-muted fs-6">SSC Roll</label>
                                                    <input type="text" name="editebday" id="editedSSC" value="<?php echo out($std['sssc']); ?>" class="text-dark form-control fw-bold fs-6" placeholder="(optional)" /> 
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-5">
                                                    <label class="form-label text-muted fs-6">HSC Roll</label>
                                                    <input type="text" value="<?php echo out($std['shsc']); ?>" name="editedhsc" id="editedHSC" class="text-dark form-control fw-bold fs-6" placeholder="(optional)" /> 
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" id="editedStuentInfo" value="<?php echo $id; ?>">Save</button> 
                                        
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
                                        <div id="studentUpdateAlert"></div>
                                        <input type="hidden" name="upstudent" value="upstudentvalue"/>
                                        <div class="mb-5">
                                            <label class="form-label text-muted fs-6">Batch*</label>
                                            <select name="editedbatch" id="editedBatch" class=" fw-bold  form-control custom-select" style="background-color: #f8f9fa;
                                            border: 1px solid #ced4da;font-size: 15px;">
                                                <option selected value="<?php echo $bid; ?>" ><?php echo out(date("h:i A", strtotime($bti['startTime'])))."-".out(date("h:i A", strtotime($bti['endTime'])))."(".$bti['weekdays'].")"; ?></option>
                                                <?php
                                                    $allb = $conn ->prepare("SELECT * FROM batch WHERE course_id = ?;");
                                                    $allb -> bindParam(1, $ecourseid, PDO::PARAM_STR);
                                                    $allb ->execute();
                                                    $allrow = $allb ->fetchAll(PDO::FETCH_ASSOC);
                                                    if($allrow>0){
                                                        foreach($allrow as $row){ ?>
                                                            <option value="<?php echo $row['batch_id']?>" ><?php echo out(date("h:i A", strtotime($row['startTime'])))."-".out(date("h:i A", strtotime($row['endTime'])))."(".$row['weekdays'].")"; ?></option>
                                                       <?php }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-5">
                                            <label class="form-label text-muted fs-6">Roll No*</label>
                                            <input type="number" value="<?php echo out($std['sroll']); ?>" name="editedroll" id="editedRoll" class="text-dark form-control fw-bold fs-6" placeholder="" /> 
                                        </div>
                                        <button type="button" class="btn btn-primary mb-5" id="studentUpdate" value="<?php echo $id; ?>">Update</button>
                                        <div class="separator border-gray-200"></div>
                                        <button type="button" class="btn btn-danger w-100 mt-10" id="studentDelete" value="<?php echo $id; ?>"><i class="fas fa-trash"></i>Delete this Admission</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php }
                else{            
                }
            }
        ?>
            
        </div>    
    </div>
</div>







<?php require_once 'footer.php'; ?>