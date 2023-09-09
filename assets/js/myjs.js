$(document).ready(function() {
    $("#fCourse").change(function() {
        const course=$(this).val();
        if(course === "first" ){
        const option = '<option selected disabled value >Batch</option><option value="c1b1">C1batch1</option><option value="c1b2">C1batch2</option>';
        $("#fBatch").html(option);
        }
        else if (course === "second" ){
            const option2 = '<option selected disabled value >Batch</option><option value="c2b1">C2batch1</option><option value="c2b2">C2batch2</option>';
        $("#fBatch").html(option2);

        }
        else{
            $("#fBatch").html("<option selected disabled value >Batch</option>");
        }
    });
})



$(document).ready(function() {
    $("#expensePurpose").change(function() {
        const purpose=$(this).val();
        if(purpose === "tpay" ){
        const option = '<div class="col-6"><label class="form-label fs-6 fw-bold text-dark">Teacher*</label><input name="tname" id="expenseTeacherName" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;border: 1px solid #ced4da;font-size: 16px;" /></div>';
        const option2= option+'<div class="col-6"><label class="form-label fs-6 fw-bold text-dark">Phone No</label><input name="tphone" id="expenseTeacherPhone" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;border: 1px solid #ced4da;font-size: 16px;" placeholder="(optional)"/></div>';
        $("#conditionaldiv1").html(option2);
        }
        else if (purpose === "epay" ){
            const option = '<div class="col-6"><label class="form-label fs-6 fw-bold">Employee*</label><input name="ename" id="expenseEmployeeName" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;border: 1px solid #ced4da;font-size: 16px;" /></div>';
            const option2= option+'<div class="col-6"><label class="form-label fs-6 fw-bold text-dark">Designation*</label><input name="edesignation" id="expenseEmployeeDesignation" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;border: 1px solid #ced4da;font-size: 16px;" /></div>';
            const option3= option2+'<div class="col-6"><label class="form-label fs-6 fw-bold text-dark">Phone No</label><input name="ephone" id="expenseEmployeePhone" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;border: 1px solid #ced4da;font-size: 16px;" placeholder="(optional)"/></div>';
            $("#conditionaldiv1").html(option3);

        }
        else{
            $("#conditionaldiv1").html('<div class="col-12"><label class="form-label fs-6 fw-bold text-dark">Expense Info*</label><input name="expenseotherinfo" id="expenseOtherInfo" class=" fw-bolder form-control custom-select" style="background-color: #f8f9fa;border: 1px solid #ced4da;font-size: 16px;" /></div>');
        }
    });
})






$(document).ready(function() {
    $("#studentCourse").change(function() {
        console.log("course selected")
       $("#paymentamount").html('<p class="pt-1 fs-5 fw-bold" >Total payable : BDT 15000 </p>');
    });
});


$(document).ready(function() {
    $("#studentDeposit").change(function() {
        console.log("counting starter")
        const sum=15000;
        const depo=Number($(this).val())
        const due=sum-depo  
       $("#studentDue").val(due);
       if(due!==0){
        $("#studentDueDate").html('<div class="col-12"><label class="form-label fs-6 fw-bold text-muted">Due date</label><input type="date" name="studentduedate" id="stdDueDate" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;border: 1px solid #ced4da;font-size: 16px;" /></div>');
       }
       else{
        $("#studentDueDate").html('<div class="col-12"><p class="form-label fs-6 fw-bold text-muted">Full amount paid</p></div>')
       }
    });
});




