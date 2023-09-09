//sign in starts here

jQuery(document).ready(function($){
    $("#mgsignInForm").submit(function(e){
        e.preventDefault();
        const phone = $("#mgsignInId").val();
        const pass = $("#mgsignInPass").val();
        const secretkey = $("#mgsignInKey").val();
        const info=[phone,pass,secretkey];
        if(phone.length===0 || pass.length===0 || secretkey.length===0){
            const output='<span class="text-danger me-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>No field should be empy</span>';
            $("#signErrorAlert").html(output);
        }
        else if(phone.length !==11){
            const output1='<span class="text-danger fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>Must contain 11 digits..</span>';
            $("#signPhErrorAlert").html(output1);
        }
        else if(pass.length < 4){
            const output1='<span class="text-danger fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>Password shoud be 4 digits.</span>';
            $("#signPsErrorAlert").html(output1);
        }
        else{
            $.ajax({
                url: 'Admin/backendajax.php',
                type: 'POST',
                data:{
                    'phone' : phone,
                    'pass': pass,
                    'secret': secretkey,
                    'action':'signin'
                },
                // processData: false,
                //contentType: "appliction/json",
                success:function(response){
                    if(response==="Done"){
                        window.location.href='Admin/dashboard.php'
                    }
                    else{
                    const output='<span class="text-danger me-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>'+response+'</span>';
                    $("#signErrorAlert").html(output);
                    }
                }
            });
        }  
    });
});

jQuery(document).ready(function($){
    $("#mgsignInId").change(function(){
        if($("#mgsignInId").val().length===11){
            const output="";
            $("#signPhErrorAlert").html(output);
        }
        else{
            $("#signPhErrorAlert").html('<span class="fs-6" >Should contain 11 digit</span>');
        }
    });
});
jQuery(document).ready(function($){
    $("#mgsignInPass").change(function(){
        if($("#mgsignInPass").val().length > 3  ){
            const output="";
            $("#signPsErrorAlert").html(output);
        }
        else{
            $("#signPsErrorAlert").html('<span class="fs-6" >Should contain 4 digit</span>');
        }
    });
});

//sign in ends here


//login starts here
jQuery(document).ready(function($){
    $("#loginForm").submit(function(e){
        e.preventDefault();
        const phone = $("#loginPhone").val();
        const pass = $("#loginPass").val();
        if(phone.length===0 || pass.length===0 ){
            const output='<span class="text-danger me-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>No field should be empy</span>';
            $("#loginErrorAlert").html(output);
        }
        else if(phone.length !==11){
            const output1='<span class="text-danger fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>Must contain 11 digits..</span>';
            $("#loginPhErrorAlert").html(output1);
        }
        else if(pass.length < 4){
            const output1='<span class="text-danger fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>Password shoud be 4 digits.</span>';
            $("#loginPsErrorAlert").html(output1);
        }
        else{
            console.log("ajax calling");
            $.ajax({
                url: 'Admin/backendajax.php',
                type: 'POST',
                data:{
                    'phone' : phone,
                    'pass': pass,
                    'action':'login'
                },
                // processData: false,
                //contentType: "appliction/json",
                success:function(response){
                    if(response === "pass"){
                        window.location.href='Admin/dashboard.php'
                    }
                    else{
                        const output='<span class="text-danger me-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>'+response+'</span>';
                        $("#loginErrorAlert").html(output);
                    }
                    console.log("function succedd");
                }
            });
        }  
    });
});

jQuery(document).ready(function($){
    $("#loginPhone").change(function(){
        if($("#loginPhone").val().length===11){
            const output="";
            $("#loginPhErrorAlert").html(output);
        }
        else{
            $("#loginPhErrorAlert").html('<span class="fs-6" >Should contain 11 digit</span>');
        }
    });
});
jQuery(document).ready(function($){
    $("#loginPass").change(function(){
        if($("#loginPass").val().length > 3  ){
            const output="";
            $("#loginPass").html(output);
        }
        else{
            $("#loginPsErrorAlert").html('<span class="fs-6" >Should contain 4 digit</span>');
        }
    });
});


//login ends here




//ad_expense starts here

jQuery(document).ready(function($){
    $("#addExpenseBtn").click(function (e){
        e.preventDefault();
        const amountstr=$("#expenseAmount").val();
        const amount=Number($("#expenseAmount").val());
        const purpose=$("#expensePurpose").val();
        const done_by=$("#expenseDoneBy").val();
        const confirmed_by=$("#expenseConfirmedBy").val();
        console.log(amount,purpose,done_by,confirmed_by);
        if(purpose !==null && purpose=== "tpay" ){
            const tname=$("#expenseTeacherName").val();
            const tphone=$("#expenseTeacherPhone").val();
            console.log(tname,tphone);
            if( amount === 0 ) {
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else if( !tname || tname.length===0 ){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * feilds should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else if( !done_by){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else if( !confirmed_by ){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * field should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else {
                console.log("all provided");
                if(tname.length > 20 || amountstr.length > 20 || tphone.length > 20 ){
                    const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>opps..Input must be 1-20 digits.</span>';
                    $("#expenseAlert").html(output);   
                }
                else{
                    $.ajax({
                        url : 'Admin/backendajax.php',
                        method : 'POST',
                        data : {
                            "amount" :amount,
                            "purpose":"Teacher Payment",
                            "tname" :tname,
                            "tphone" : tphone ? tphone : 'not set',
                            "done_by": done_by,
                            "con_by" : confirmed_by,
                            "action" : "add_teach_expense"

                        },
                        success:function(response){
                            if(response === "created"){
                                const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-check"></i>Expense created successfully</span>';
                                $("#expenseAlert").html(output);
                                setTimeout(window.location.href="Admin/expense.php",3000);  
                            }
                            else{
                                const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-check"></i>'+response+'</span>';
                                $("#expenseAlert").html(output);
                            }
                            
                        }
                    });
                }
            }
        }
        else if(purpose !==null && purpose === "epay"){
            const ename=$("#expenseEmployeeName").val();
            const edes=$("#expenseEmployeeDesignation").val();
            const ephone=$("#expenseEmployeePhone").val();
            console.log(ename,edes,ephone);
            if( amount === 0 ) {
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else if( !ename || ename.length===0 ){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * feilds should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else if( !edes || edes.length===0 ){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * feilds should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else if( !done_by){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else if( !confirmed_by ){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * field should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else {
                console.log("all provided");
                if(ename.length > 20 || amountstr.length > 20 || ephone.length > 20 || edes.length >20 ){
                    const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>opps..Input must be 1-20 digits.</span>';
                    $("#expenseAlert").html(output);   
                }
                else{
                    $.ajax({
                        url : 'Admin/backendajax.php',
                        method : 'POST',
                        data : {
                            "amount" :amount,
                            "purpose":"Employee Payment",
                            "ename" :ename,
                            "edes" :edes,
                            "ephone" : ephone ? ephone : 'not set',
                            "done_by": done_by,
                            "con_by" : confirmed_by,
                            "action" : "add_emp_expense"

                        },
                        success:function(response){
                            if(response === "created"){
                                const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-check"></i>Expense created successfully</span>';
                                $("#expenseAlert").html(output);
                                setTimeout(window.location.href="Admin/expense.php",3000);  
                            }
                            else{
                                const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-check"></i>'+response+'</span>';
                                $("#expenseAlert").html(output);
                            }
                        }
                    });
                }
            }
        }
        else if(purpose !==null && purpose === "other"){
            const exinfo=$("#expenseOtherInfo").val();
            console.log(exinfo);
            if( amount === 0 ) {
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else if( !exinfo || exinfo.length===0 ){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * feilds should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else if( !done_by){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else if( !confirmed_by ){
                const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * field should not be empty</span>';
                $("#expenseAlert").html(output);
            }
            else {
                console.log("all provided");
                if(exinfo.length > 20 || amountstr.length > 20 ){
                    const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>opps..Input must be 1-20 digits.</span>';
                    $("#expenseAlert").html(output);   
                }
                else{
                    $.ajax({
                        url : 'Admin/backendajax.php',
                        method : 'POST',
                        data : {
                            "amount" :amount,
                            "purpose":"Other Expense",
                            "exinfo" :exinfo,
                            "done_by": done_by,
                            "con_by" : confirmed_by,
                            "action" : "add_other_expense"

                        },
                        success:function(response){
                            if(response === "created"){
                                const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-check"></i>Expense created successfully</span>';
                                $("#expenseAlert").html(output);
                                setTimeout(window.location.href="Admin/expense.php",3000);  
                            }
                            else{
                                const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-check"></i>'+response+'</span>';
                                $("#expenseAlert").html(output);
                            }
                        }
                    });
                }
            }
        }
        else{
            console.log("unusal activity alert..")
        }
    });
});

//ad_expense ends here


//add course starts here
jQuery(document).ready(function($){
    $("#addCourseBtn").click(function(){
        const coursetitle=$("#courseTitle").val();
        const courseprice=$("#coursePrice").val();
        if( !coursetitle || !courseprice || coursetitle.length <=0 || courseprice.length <=0 ){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> * fields should not be empty</span>';
            $("#courseAlert").html(output);
            
        }
        else if(coursetitle.length > 50 ){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Title must be within 1-30 digits.</span>';
            $("#courseAlert").html(output);
        }
        else if(courseprice.length > 20 ){
            const output='<span class="text-danger me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Price must be within 1-20 digits.</span>';
            $("#courseAlert").html(output);
        }
        else{
            $.ajax({
                url : 'Admin/backendajax.php',
                method : "POST",
                data:{
                    'title' : coursetitle,
                    'price' : Number(courseprice),
                    'action' : 'add_course'
                },
                success:function(response){
                    if(response === "course_added"){
                        const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i> Course added successfully..</span>';
                        $("#courseAlert").html(output);
                    }
                    else{
                        const output='<span class="text-success me-2 mb-2  fs-6 align-items-center"><i class="fa-solid fa-circle-exclamation"></i>'+response+'</span>';
                        $("#courseAlert").html(output);
                    }

                }
            })
            
            
        }
    });
});
//add course ends here