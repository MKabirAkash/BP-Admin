
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







//add new admission
$(document).ready(function() {
    let studentPay=0;    
    $('#backToStep2').click(function(e) {
        e.preventDefault();

        $('#stepThree').hide();
        $('#stepTwo').show();
    });

    $('#backToStep1').click(function(e) {
        e.preventDefault();
        $('#stepTwo').hide();
        $('#stepOne').show();
    });
    
    $('#studentGoStep2').click(function(e) {
        e.preventDefault();
        if(!$("#studentNum").val() || !$("#studentName").val() || !$('#studentDob').val() || !$('#studentGender').val() || !$('#studentGuardian').val() || !$("#studentRoll").val()){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
            $("#stepOneAlert").html(output);
        }
        else if($("#studentNum").val().length > 30 || $("#studentName").val().length >30 || $('#studentDob').val().length >30 || $('#studentGender').val().length > 30 || $('#studentGuardian').val().length > 30 || $("#studentRoll").val().length >30){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Fields length must be within 1-30</span>';
            $("#stepOneAlert").html(output);
        }
        else{
            $('#stepOne').hide();
            $('#stepTwo').show();
        }  
    });
    $('#studentCourse').change(function(e){
        e.preventDefault();
        const cid = $('#studentCourse').val();
        
        if(cid){
            
            $.ajax({
                url : 'Admin/backendGETajax.php',
                method : 'GET',
                data : {
                    'course_id' :cid,
                    'action' :  'get_batches'
                },
                success : function(response){
                    if(response){
                        $('#studentBatch').html(response);
                    }
                    else{
                        const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>No available batc </span>';
                        $("#batchAlert").html(output);
                    }
                }  
            });
        }
    });

    $('#studentGoStep3').click(function(e) {
        e.preventDefault();
        if(!$("#studentCourse").val() || !$("#studentBatch").val() ){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
            $("#stepTwoAlert").html(output);
        }
        else if($("#studentCourse").val().length > 30 || $("#studentBatch").val().length > 30 ){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>Fields length must be within 1-30</span>';
            $("#stepTwoAlert").html(output);
        }
        else{
           
            const selectedcourse = Number($("#studentCourse").val());
            if(selectedcourse){
                $.ajax({
                    url: 'Admin/backendGETajax.php',
                    method : 'GET',
                    data : {
                        'course_id' : selectedcourse,
                        'action' : 'get_course_price'
                    },
                    success: function(response){
                        if(response){
                            $("#paymentamount").html('<p class="pt-1 fs-5 fw-bold" id="studentCoursePrice" value="'+response+'">Total payable : BDT '+response+ '</p>');
                            studentPay = Number(response);
                        }
                        else{
                            $("#paymentamount").html('<p class="pt-1 fs-5 fw-bold" id="studentCoursePrice">Course Price is not set. </p>');
                        }
                    }
                });
            }
                
            $('#stepTwo').hide();
            $('#stepThree').show();

            $("#studentDeposit").change(function() {
                const sum = studentPay;
                const depo=Number($(this).val());
                const due=sum-depo;  
                $("#studentDue").val(due);
                if(due>0){
                    $("#studentDueDate").html('<div class="col-12"><label class="form-label fs-6 fw-bold text-muted">Due date</label><input type="date" name="studentduedate" id="stdDueDate" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;border: 1px solid #ced4da;font-size: 16px;" /></div>');
                }
                else{
                    $("#studentDueDate").html('<div class="col-12"><p class="form-label fs-6 fw-bold text-muted">Full amount paid</p></div>')
                }
            });
              
            
        }
        
    });
    
    $('#confirmAdmission').click(function(){
        const name = $('#studentName').val();
        const number = $('#studentNum').val();
        const gender = $('#studentGender').val();
        const gnumber = $('#studentGuardian').val();
        const dob = $('#studentDob').val();
        const roll = $("#studentRoll").val();
        const course= $('#studentCourse').val();
        const batch = $('#studentBatch').val();
        const ssc = $('#studentSSCRoll').val() ? $('#studentSSCRoll').val() : 'not set';
        const hsc = $('#studentHSCRoll').val() ? $('#studentHSCRoll').val() : 'not set';
        const college = $('#studentCollege').val() ? $('#studentCollege').val() : 'not set';
        const deposit = $("#studentDeposit").val() ? $("#studentDeposit").val() : 0 ;
        const due = $("#studentDue").val() ? $("#studentDue").val() : 0 ;
        const duedate = $("#stdDueDate").val() ? $("#stdDueDate").val() : 'not set';
        const issued_by = $("#studentIssue").val() ? $("#studentIssue").val() : 'none';
        if(deposit.length > 30 || due.length > 30 || duedate.length > 30 || issued_by.length >30){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Fields length must be within 1-30</span>';
            $("#stepThreeAlert").html(output);
        }
        else if(Number(deposit) <=0 ){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Must have a minimum deposit</span>';
            $("#stepThreeAlert").html(output);
        }
        else if(issued_by === 'none'){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Must have an Authorizer</span>';
            $("#stepThreeAlert").html(output);
        }
        else if(duedate === 'not set' && due > 0 ){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Set a due date</span>';
            $("#stepThreeAlert").html(output);
        }
        else{
            $.ajax({
                url : 'Admin/backendajax.php',
                method : 'POST',
                data :{
                  'sname' : name,
                  'snumber' : number,
                  'sdob' : dob,
                  'sgender' : gender,
                  'sgnumber' : gnumber,
                  'sroll' : roll,
                  'scourse' : course,
                  'sbatch' : batch ,
                  'sssc' : ssc,
                  'shsc' : hsc,
                  'scollege' : college,
                  'deposit' : deposit,
                  'due' : due,
                  'duedate' : duedate,
                  'issued_by' : issued_by,
                  'action' : 'add_student'
                },
                success:function(response){
                    if(response === 'student_added'){
                        const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-check"></i>Student Admission successful</span>';
                                $("#stepThreeAlert").html(output);
                                setTimeout(window.location.href="Admin/allstudent.php",3000);  
                            }
                            else{
                                const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-check"></i>'+response+'</span>';
                                $("#stepThreeAlert").html(output);
                            }
                    
                }
            })
        }
    

        
    });
});

//end new admission



//all student with pagination
function loadstudents(page){
    $.ajax({
        url : 'Admin/backendGETajax.php',
        method : 'GET',
        dataType: 'json',
        data : {
            'page' : page,
            'action' : 'get_all_student'
        },
        success : function(data){
            console.log("response",data);
            if(data.length > 0 ){
                var output="";
                for (var i=0 ; i<data.length ;i++){
                output = output+
                    '<tr>'+
                        '<td>'+data[i].sname+'</td>'+
                        '<td>'+data[i].snumber+'</td>'+
                        '<td class="text-muted">'+data[i].sgender+'</td>'+
                        '<td class="text-muted">'+data[i].course+'</td>'+
                        '<td class="text-muted">'+data[i].batch_start+' - '+data[i].batch_end+' ( '+data[i].weekdays+' )</td>'+
                        '<td class="text-muted">'+data[i].sroll+'</td>'+
                        '<td class="text-end" style="min-width:150px">'+
                        '<a href="Admin/editstudent.php?id=' + data[i].id + '" class="btn btn-primary btn-sm mx-3 "><i class="fas fa-pencil-alt"></i></a>'+
                        '<a href="Admin/singlestudent.php?id=' + data[i].id + '" class="btn btn-primary btn-sm mx-3"><i class="far fa-eye"></i>View</a>'+
                        '</td>'+
                    '</tr>';
                }
                $("#allStudentList").html(output);
            }
            else{
                console.log("no data found");
            }
        },
        error : function(){
            console.log("ajax call not succeding");
        }
    });
}

$(document).ready(function(){
    loadstudents(1);
    $('#prevPage').click(function(e) {
        e.preventDefault();
        var currentPage = parseInt($('#currentPage').text());
        console.log(currentPage);
        if (currentPage > 1) {
            loadstudents(currentPage - 1);
            $('#currentPage').text(currentPage - 1);
        }
    });

    $('#nextPage').click(function(e) {
        e.preventDefault();
        var currentPage = parseInt($('#currentPage').text());
        loadstudents(currentPage + 1);
        $('#currentPage').text(currentPage + 1);
    });
   
});

//end all stduent with pagination


$(document).ready(function(){
    $("#studentUpdate").click(function(e){
        e.preventDefault();
        const stdId=$("#studentUpdate").val();
        if(stdId){
            if(!$("#editedBatch") || !$("#editedRoll") || $("#editedRoll").val().length<=0 ){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
                $("#studentUpdateAlert").html(output);
            }
            else if($("#editedRoll").val().length >10){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Roll must be within 1-10 digits</span>';
                $("#studentUpdateAlert").html(output);
            }
            else{
                $.ajax({
                    url : 'Admin/backendajax.php',
                    method : 'POST',
                    data : {
                        'id' : stdId,
                        'action' : 'update_admit',
                        'batch' : $("#editedBatch").val(),
                        'roll' : $("#editedRoll").val()
                    },
                    success:function(response){
                        if(response === "updated"){
                            const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-check"></i>updated successfully</span>';
                            $("#studentUpdateAlert").html(output);
                            setTimeout(window.location.href=`Admin/editstudent.php?id=${stdId}`,3000);
                        }
                        else{
                            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>'+response+'</span>';
                            $("#studentUpdateAlert").html(output);
                        }

                    }

                });
            }
        }
        else{
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> No student selected</span>';
            $("#studentUpdateAlert").html(output);
        }
        
    });

    $("#studentDelete").click(function(e){
        e.preventDefault();
        const sid = $("#studentDelete").val();
        console.log(sid);
        if(sid){
            $.ajax({
                url : 'Admin/backendGETajax.php',
                type : 'GET',
                data:{
                    'action' : 'del_student',
                    'id' : sid 
                },
                success:function(response){
                    console.log(response)
                    if(response==="deleted"){
                        const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Deleted Student</span>';
                        $("#studentUpdateAlert").html(output);
                        setTimeout(window.location.href="Admin/allstudent.php",3000);
                    }
                    else{
                        const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> '+response+'</span>';
                        $("#studentUpdateAlert").html(output);
                    }
                }
            });
        }
        else{
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> No student selected</span>';
            $("#studentUpdateAlert").html(output);
        }
    });


    $("#editedStuentInfo").click(function(e){
        e.preventDefault();
        const sd = $("#editedStuentInfo").val();
        const nname=$("#editedName").val();
        const nnumber =$("#editedPhone").val();
        const ndob = $("#editedBday").val();
        const ngn = $("#editedGPhone").val();
        const nclg = $("#editedClg").val() ? $("#editedClg").val() :'not set';
        const nssc = $("#editedSSC").val() ? $("#editedSSC").val() : 'not set';
        const nhsc = $("#editedHSC").val() ? $("#editedHSC").val() : 'not set';
        console.log(sd);
        if(sd){
            if(!nname || nname.length <=0 || !nnumber || nnumber.length <=0 || !ndob || !ngn || ngn.length <=0 ){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
                $("#studentUpdateAlert2").html(output);
            }
            else if( nname.length >30 || nnumber.length > 30 || ngn.length >30 || nclg.length >30 || nssc.length >30 || nhsc.length >30){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Fields must be within 1-30  digits</span>';
                $("#studentUpdateAlert2").html(output);
            }
            else{
                $.ajax({
                    url : 'Admin/backendajax.php',
                    type : 'POST',
                    data:{
                        'action' : 'up_student_info',
                        'id' : sd,
                        'name' : nname,
                        'num' : nnumber,
                        'dob' : ndob,
                        'gn' : ngn,
                        'clg' : nclg,
                        'ssc' : nssc,
                        'hsc' : nhsc
                    },
                    success:function(response){
                        console.log(response)
                        if(response==="updated_info"){
                            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>Student infoormations updates</span>';
                            $("#studentUpdateAlert2").html(output);
                            setTimeout(window.location.href=`Admin/editstudent.php?id=${sd}`,3000);
                        }
                        else{
                            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> '+response+'</span>';
                            $("#studentUpdateAlert2").html(output);
                        }
                    }
                });

            }
            
        }
        else{
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> No student selected</span>';
            $("#studentUpdateAlert").html(output);
        }
    });


});



$(document).ready(function(){
    let select=0;
    $(".expensePay").click(function (e){
        const select = $(this).data('id');
        console.log(select);
        $(this).hide(); // Hide the clicked .expensePay button
        $(this).siblings(".confirmBtn").show();

    });
    $(".confirmBtn").click(function(e){
        e.preventDefault();
        const ex_id = $(this).data('id'); // Get the ID from the clicked .confirmBtn
        console.log(ex_id);
        if(ex_id){
            $.ajax({
                url : 'Admin/backendajax.php',
                method : 'POST',
                data :{
                    'action' : 'ex_pay',
                    'id' : ex_id
                },
                success: function(response){
                    if (response==="done"){
                        $(this).hide();
                        setTimeout(window.location.href="Admin/expense.php",3000);
                    }
                    else{
                        alert("some problem withserver");
                        setTimeout(window.location.href="Admin/expense.php",3000);
                    }
                }
            });
        }
    });

    $(".deleteExpense").click(function(e){
        e.preventDefault();
        const del_ex = $(this).data('id');
        console.log(del_ex);
        if(del_ex){
            $.ajax({
                url : 'Admin/backendajax.php',
                method : 'POST',
                data : {
                    'action' : 'del_expense',
                    'id' : del_ex
                },
                success:function(response){
                    setTimeout(window.location.href="Admin/expense.php",3000);
                }
            });
        }
    });
    
});





