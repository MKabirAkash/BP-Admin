<?php include 'dbconnect.php' ?>
<?php include 'myfunc.php' ?>
<?php 
    global $errmsg;
    global $secretkey;
    $secretkey="deshweb";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        #sign in starts here
        if (isset($_POST["action"]) && $_POST["action"] == "signin") {
            if( $_POST['phone'] && $_POST['pass'] && $_POST['secret'] ){
                $skey = $_POST['secret'];
                if($skey == $secretkey){
                    $phone = $_POST['phone'];
                    $pass = $_POST['pass'];
                    $phonestats = isphone($phone);
                    if($phonestats){
                        $phone=onlyD($phone);
                        try{

                            $checkphone=$conn->prepare("SELECT 'phone' FROM user WHERE `phone` = ?;");
                            $checkphone->bindParam(1, $phone, PDO::PARAM_STR);
                            $checkphone->execute();
                            $res=$checkphone->fetchAll(PDO::FETCH_ASSOC);
                            if(count($res) ==1){
                                $errmsg="Phone Number already exists.";
                            }
                            else{
                                $sgnQuery= $conn->prepare("INSERT INTO user (`phone`, `password`) VALUES (:dbphone, :dbpass)");
                                $sgnQuery ->bindParam(':dbphone',$phone);
                                $sgnQuery ->bindParam(':dbpass',$pass);
                                $sgnQuery->execute();
                                $errmsg="Done";
                            }
                            
                        }
                        catch(PDOException $er){
                            $errmsg= $er;
                        }
                        
                    }
                    else{
                        $errmsg="Invalid Phone Number..";
                    }
                    
                }
                else{
                    $errmsg = "oops..Secret key doesn't match ";
                }
            }
            else{
                $errmsg = "operation failed.Check your credentials again";
            }
            
           
            echo $errmsg;
        }
        #sign in ends here

        #login starts here
        else if (isset($_POST["action"]) && $_POST["action"] == "login"){
            if( $_POST['phone'] && $_POST['pass'] ){
                $phone = $_POST['phone'];
                $pass = $_POST['pass'];
                $phonestats = isphone($phone);
                if($phonestats){
                    $phone=onlyD($phone);
                    try{
                        $lgnQuery= $conn->prepare("SELECT 'phone' FROM user WHERE `phone` = ? AND `password` = ?;");
                        $lgnQuery ->bindParam(1, $phone, PDO::PARAM_STR);
                        $lgnQuery ->bindParam(2, $pass, PDO::PARAM_STR);
                        $lgnQuery->execute();
                        $result = $lgnQuery->fetchAll(PDO::FETCH_ASSOC);
                        if(count($result)==1){
                            $errmsg = "pass";
                        }
                        else{
                            $errmsg = "opps..Wrong Credentials.";
                        }
                        
                    }
                    catch(PDOException $er){
                        $errmsg= $er;
                    }

                }
                else{
                    $errmsg = "invalid Phone number..";
                }
            }
            else{
                $errmsg="Invalid credentials..";
            }
            echo $errmsg;

        }
        #login ends here


        #adding teacher expense starts here
        else if(isset($_POST['action']) && $_POST['action']=="add_teach_expense"){
            if( isset($_POST['amount']) && isset($_POST['purpose']) ) {
                $amount = $_POST['amount'];
                $purpose = $_POST['purpose'];
                $tname = $_POST['tname'];
                $tphone = $_POST['tphone'];
                $done_by = $_POST['done_by'];
                $con_by = $_POST['con_by'];
                $phonestats = isphone($tphone);
                $stats="not set";
                if($phonestats){
                    $stats=$tphone;
                }
                $amount=onlyD($amount);
                $tname=onlyABC($tname);
                try{
                    $crtTable=$conn->prepare("CREATE TABLE IF NOT EXISTS expense (
                                    expense_id INT AUTO_INCREMENT PRIMARY KEY,
                                    amount INT(10),
                                    purpose VARCHAR(15),
                                    done_by VARCHAR(20),
                                    confirmed_by VARCHAR(20),
                                    is_paid BOOLEAN DEFAULT false,
                                    issue_time DATETIME DEFAULT CURRENT_TIMESTAMP
                                    );"
                                );
                    $crtTable->execute();
                    $addexpense = $conn->prepare("INSERT INTO expense (`amount`,`purpose`,`done_by`,`confirmed_by` ) VALUES (:amount, :purpose, :done_by, :con_by);");
                    $addexpense ->bindParam(':amount',$amount);
                    $addexpense -> bindParam(':purpose',$purpose);
                    $addexpense -> bindParam(':done_by',$done_by);
                    $addexpense -> bindParam(':con_by',$con_by);
                    $addexpense->execute();
                    $rows=$addexpense->rowCount();
                    if($rows == 1){
                        $getexpenseid = $conn->prepare("SELECT `expense_id` FROM expense ORDER BY `expense_id` DESC LIMIT 1");
                        $getexpenseid -> execute();
                        $expense_id = $getexpenseid->fetchColumn();
                        $crtTable2 = $conn ->prepare("CREATE TABLE IF NOT EXISTS t_expense (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            expense_id INT,
                            tname VARCHAR(20),
                            tphone VARCHAR(20),
                            FOREIGN KEY (expense_id) REFERENCES expense(expense_id));"
                        );
                        $crtTable2 -> execute();
                        $addTexpense = $conn->prepare("INSERT INTO t_expense (`expense_id`,`tname`,`tphone`) VALUES (:xid, :tname, :tphone);");
                        $addTexpense -> bindParam(':xid',$expense_id);
                        $addTexpense -> bindParam(':tname',$tname);
                        $addTexpense -> bindParam(':tphone',$stats);
                        $addTexpense -> execute();
                        $affected = $addTexpense->rowCount();
                        if($affected){
                            $errmsg = "created";
                        }
                        else{
                            $errmsg = "Server Operation Failed";
                        }
                    }
                    else{
                        $errmsg="expense succeed";
                    }
                }
                catch(PDOException $e){
                    $errmsg = $e;
                }
                  
            }
            else{
                $errmsg="Server Operation Failed";
            }  
            echo $errmsg;
        }


        #adding teacher expense ends here


        #adding employee expense starts here
        else if(isset($_POST['action']) && $_POST['action']=="add_emp_expense"){
            if( isset($_POST['amount']) && isset($_POST['purpose']) ) {
                $amount = $_POST['amount'];
                $purpose = $_POST['purpose'];
                $ename = $_POST['ename'];
                $edes = $_POST['edes'];
                $ephone = $_POST['ephone'];
                $done_by = $_POST['done_by'];
                $con_by = $_POST['con_by'];
                $phonestats = isphone($ephone);
                $stats="not set";
                if($phonestats){
                    $stats=$ephone;
                }

                $amount=onlyD($amount);
                $ename=onlyABC($ename);
                $edes=onlyABC($edes);
                try{
                    $crtTable=$conn->prepare("CREATE TABLE IF NOT EXISTS expense (
                                    expense_id INT AUTO_INCREMENT PRIMARY KEY,
                                    amount INT(10),
                                    purpose VARCHAR(15),
                                    done_by VARCHAR(20),
                                    confirmed_by VARCHAR(20),
                                    is_paid BOOLEAN DEFAULT false,
                                    issue_time DATETIME DEFAULT CURRENT_TIMESTAMP
                                    );"
                                );
                    $crtTable->execute();
                    $addexpense = $conn->prepare("INSERT INTO expense (`amount`,`purpose`,`done_by`,`confirmed_by` ) VALUES (:amount, :purpose, :done_by, :con_by);");
                    $addexpense ->bindParam(':amount',$amount);
                    $addexpense -> bindParam(':purpose',$purpose);
                    $addexpense -> bindParam(':done_by',$done_by);
                    $addexpense -> bindParam(':con_by',$con_by);
                    $addexpense->execute();
                    $rows=$addexpense->rowCount();
                    if($rows == 1){
                        $getexpenseid = $conn->prepare("SELECT `expense_id` FROM expense ORDER BY `expense_id` DESC LIMIT 1");
                        $getexpenseid -> execute();
                        $expense_id = $getexpenseid->fetchColumn();
                        $crtTable2 = $conn ->prepare("CREATE TABLE IF NOT EXISTS e_expense (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            expense_id INT,
                            ename VARCHAR(20),
                            edes VARCHAR(20),
                            ephone VARCHAR(20),
                            FOREIGN KEY (expense_id) REFERENCES expense(expense_id));"
                        );
                        $crtTable2 -> execute();
                        $addEexpense = $conn->prepare("INSERT INTO e_expense (`expense_id`,`ename`,`edes`,`ephone`) VALUES (:xid, :ename, :edes, :ephone);");
                        $addEexpense -> bindParam(':xid',$expense_id);
                        $addEexpense -> bindParam(':ename',$ename);
                        $addEexpense -> bindParam(':edes',$edes);
                        $addEexpense -> bindParam(':ephone',$stats);
                        $addEexpense -> execute();
                        $affected = $addEexpense->rowCount();
                        if($affected){
                            $errmsg = "created";
                        }
                        else{
                            $errmsg = "Server Operation Failed";
                        }
                    }
                    else{
                        $errmsg="expense succeed";
                    }
                }
                catch(PDOException $e){
                    $errmsg = $e;
                }
                  
            }
            else{
                $errmsg="Server Operation Failed";
            }  
            echo $errmsg;
        }



        #adding employee expense ends here



        #adding other expense starts here

        else if(isset($_POST['action']) && $_POST['action']=="add_other_expense"){
            if( isset($_POST['amount']) && isset($_POST['purpose']) ) {
                $amount = $_POST['amount'];
                $purpose = $_POST['purpose'];
                $exinfo = $_POST['exinfo'];
                $done_by = $_POST['done_by'];
                $con_by = $_POST['con_by'];

                $amount=onlyD($amount);
                $exinfo=onlyABC($exinfo);
                try{
                    $crtTable=$conn->prepare("CREATE TABLE IF NOT EXISTS expense (
                                    expense_id INT AUTO_INCREMENT PRIMARY KEY,
                                    amount INT(10),
                                    purpose VARCHAR(15),
                                    done_by VARCHAR(20),
                                    confirmed_by VARCHAR(20),
                                    is_paid BOOLEAN DEFAULT false,
                                    issue_time DATETIME DEFAULT CURRENT_TIMESTAMP
                                    );"
                                );
                    $crtTable->execute();
                    $addexpense = $conn->prepare("INSERT INTO expense (`amount`,`purpose`,`done_by`,`confirmed_by` ) VALUES (:amount, :purpose, :done_by, :con_by);");
                    $addexpense ->bindParam(':amount',$amount);
                    $addexpense -> bindParam(':purpose',$purpose);
                    $addexpense -> bindParam(':done_by',$done_by);
                    $addexpense -> bindParam(':con_by',$con_by);
                    $addexpense->execute();
                    $rows=$addexpense->rowCount();
                    if($rows == 1){
                        $getexpenseid = $conn->prepare("SELECT `expense_id` FROM expense ORDER BY `expense_id` DESC LIMIT 1");
                        $getexpenseid -> execute();
                        $expense_id = $getexpenseid->fetchColumn();
                        $crtTable3 = $conn ->prepare("CREATE TABLE IF NOT EXISTS o_expense (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            expense_id INT,
                            exinfo VARCHAR(20),
                            FOREIGN KEY (expense_id) REFERENCES expense(expense_id));"
                        );
                        $crtTable3 -> execute();
                        $addOexpense = $conn->prepare("INSERT INTO o_expense (`expense_id`,`exinfo`) VALUES (:xid, :exinfo);");
                        $addOexpense -> bindParam(':xid',$expense_id);
                        $addOexpense -> bindParam(':exinfo',$exinfo);
                        $addOexpense -> execute();
                        $affected = $addOexpense->rowCount();
                        if($affected){
                            $errmsg = "created";
                        }
                        else{
                            $errmsg = "Server Operation Failed";
                        }
                    }
                    else{
                        $errmsg="expense succeed";
                    }
                }
                catch(PDOException $e){
                    $errmsg = $e;
                }
                  
            }
            else{
                $errmsg="Server Operation Failed";
            }  
            echo $errmsg;
        }

        #adding other expense ends here


        #adding course starts here

        else if(isset($_POST['action']) && $_POST['action']=="add_course"){
            if( isset($_POST['title']) && isset($_POST['price']) ) {
                $title = $_POST['title'];
                $price = $_POST['price'];

                $title=onlyABC($title);
                $price=onlyD($price);
                try{
                    $crtTable4=$conn->prepare("CREATE TABLE IF NOT EXISTS course (
                                    course_id INT AUTO_INCREMENT PRIMARY KEY,
                                    price INT(20),
                                    title VARCHAR(30)
                                    );"
                                );
                    $crtTable4->execute();
                    $addCourse = $conn->prepare("INSERT INTO course (`title`,`price` ) VALUES (:title, :price);");
                    $addCourse ->bindParam(':title',$title);
                    $addCourse -> bindParam(':price',$price);
                    $addCourse->execute();
                    $rows=$addCourse->rowCount();
                    if($rows == 1){
                        $errmsg ="course_added";
                    }
                    else{
                        $errmsg="expense succeed";
                    }
                }
                catch(PDOException $e){
                    $errmsg = $e;
                }
                  
            }
            else{
                $errmsg="Server Operation Failed";
            }  
            echo $errmsg;
        }


        #adding course end here


        #adding batch starts here

        else if(isset($_POST['action']) && $_POST['action']=="add_batch"){
            if( isset($_POST['course']) && isset($_POST['days']) && isset($_POST['startTime']) && isset($_POST['endTime']) ) {
                $course_id = (int)($_POST['course']);
                $weekdays = $_POST['days'];
                $stime = $_POST['startTime'];
                $etime = $_POST['endTime'];
                $weekdays = onlyABC($weekdays);
                try{
                    $crtTable5=$conn->prepare("CREATE TABLE IF NOT EXISTS batch (
                                    batch_id INT AUTO_INCREMENT PRIMARY KEY,
                                    course_id INT,
                                    startTime VARCHAR(20),
                                    endTime VARCHAR(20),
                                    weekdays VARCHAR(50),
                                    FOREIGN KEY (course_id) REFERENCES course(course_id)
                                    );"
                                );
                    $crtTable5->execute();
                    $addBatch = $conn->prepare("INSERT INTO batch (`course_id`,`weekdays`,`startTime`,`endTime` ) VALUES (:cid, :weekdays, :stime , :etime);");
                    $addBatch ->bindParam(':cid',$course_id);
                    $addBatch -> bindParam(':weekdays',$weekdays);
                    $addBatch ->bindParam(':stime',$stime);
                    $addBatch -> bindParam(':etime',$etime);
                    $addBatch->execute();
                    $rows=$addBatch->rowCount();
                    if($rows == 1){
                        $errmsg ="batch_added";
                    }
                    else{
                        $errmsg="Someting fatal.contact administration.";
                    }
                }
                catch(PDOException $e){
                    $errmsg = $e;
                }
                  
            }
            else{
                $errmsg="Server Operation Failed";
            }  
            echo $errmsg;
        }

        #adding batch ends here




        //adding New student starts here
        else if(isset($_POST['action']) && $_POST['action'] == 'add_student'){
            if(isset($_POST['sname']) && isset($_POST['snumber']) && isset($_POST['sdob']) && isset($_POST['sgender']) && isset($_POST['sgnumber']) 
                && isset($_POST['sroll']) && isset($_POST['scourse']) && isset($_POST['sbatch']) && isset($_POST['sssc']) && isset($_POST['shsc']) && isset($_POST['scollege']) 
                && isset($_POST['deposit']) && isset($_POST['due']) && isset($_POST['duedate']) && isset($_POST['issued_by'])){
                
                $name = $_POST['sname'];
                $number = $_POST['snumber'];
                $dob = $_POST['sdob'];
                $gender = $_POST['sgender'];
                $gnumber = $_POST['sgnumber'];
                $roll = $_POST['sroll'];
                $course = (int)$_POST['scourse'];
                $batch = (int)$_POST['sbatch'];
                $ssc = $_POST['sssc'];
                $hsc = $_POST['shsc'];
                $college = $_POST['scollege'];
                $deposit = (string)$_POST['deposit'];
                $due = (string)$_POST['due'];
                $duedate = $_POST['duedate'];
                $issued_by = $_POST['issued_by'];
                if(!isphone($number)){
                    $errmsg = "Student phone number invalid";
                }
                elseif(!isphone($gnumber)){
                    $errmsg = "Guardian phone number invalid";
                }
                else{
                    try{
                        $crtSTable = $conn ->  prepare("CREATE TABLE IF NOT EXISTS student (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            sname VARCHAR(30),
                            snumber VARCHAR(30),
                            sdob VARCHAR(30),
                            sgender VARCHAR(30),
                            gnumber VARCHAR(30),
                            sroll VARCHAR(30),
                            sssc VARCHAR(30),
                            shsc VARCHAR(30),
                            scollege VARCHAR(30),
                            sdeposit VARCHAR(30),
                            sdue VARCHAR(30),
                            sduedate VARCHAR(30),
                            sissue_by VARCHAR(30),
                            course_id INT,
                            batch_id INT,
                            admit_time DATETIME DEFAULT CURRENT_TIMESTAMP,
                            FOREIGN KEY (course_id) REFERENCES course(course_id),
                            FOREIGN KEY (batch_id) REFERENCES batch(batch_id));"
                        );
    
                        $crtSTable ->execute();
                        
                        $addStudent = $conn -> prepare(
                            "INSERT INTO `student` (`sname`,`snumber`,`sdob`,`sgender`,`gnumber`,`sroll`,`sssc`,`shsc`,`scollege`,`sdeposit`,`sdue`,`sduedate`,`sissue_by`,`course_id`,`batch_id` )
                            VALUES (:sname , :snumber , :sdob , :sgender , :gnumber , :sroll , :sssc , :shsc , :scollege , :sdeposit , :sdue, :sduedate , :sissue_by, :course_id, :batch_id );"
                        );
    
                        $addStudent ->bindParam(':sname',$name);
                        $addStudent ->bindParam(':snumber',$number);
                        $addStudent ->bindParam(':sdob',$dob);
                        $addStudent ->bindParam(':sgender',$gender);
                        $addStudent ->bindParam(':gnumber',$gnumber);
                        $addStudent ->bindParam(':sroll',$roll);
                        $addStudent ->bindParam(':sssc',$ssc);
                        $addStudent ->bindParam(':shsc',$hsc);
                        $addStudent ->bindParam(':scollege',$college);
                        $addStudent ->bindParam(':sdeposit',$deposit);
                        $addStudent ->bindParam(':sdue',$due);
                        $addStudent ->bindParam(':sduedate',$duedate);
                        $addStudent ->bindParam(':sissue_by',$issued_by);
                        $addStudent ->bindParam(':course_id',$course);
                        $addStudent ->bindParam(':batch_id',$batch);
                        $addStudent ->execute();
                        $row = $addStudent ->rowCount();
                        if($row == 1){
                            $errmsg ="student_added";
                        }
                        else{
                            $errmsg  = "Operation failed.Try again";
                        }
                    }
                    catch(PDOException $eee){
                        $errmsg ="Operation Failed.Contact Administrator";
                    }
                }
                echo $errmsg;
            }
            else{
                $errmsg="provide all necessary data";
                echo $errmsg;
            }
        }

        //adding new student ends here


        //update admission starts here

        else if(isset($_POST['action']) && $_POST['action']=="update_admit"){
            $id = (int)$_POST['id'];
            $batch = (int)$_POST['batch'];
            $roll = $_POST['roll'];
            $stmt = $conn->prepare("UPDATE student SET batch_id = ?, sroll = ? WHERE id = ?");
            $stmt->bindParam(1, $batch, PDO::PARAM_INT);
            $stmt->bindParam(2, $roll, PDO::PARAM_STR);
            $stmt->bindParam(3, $id, PDO::PARAM_INT);
            $stmt ->execute();
            if($stmt->execute() === TRUE){
                echo "updated";
            }
            else{
                echo "can't update student data";
            }
        }



        else if(isset($_POST['action']) && $_POST['action']=="up_student_info"){
            $id = (int)$_POST['id'];
            $name = $_POST['name'];
            $num = $_POST['num'];
            $dob = $_POST['dob'];
            $gnum = $_POST['gn'];
            $clg = $_POST['clg'];
            $ssc = $_POST['ssc'];
            $hsc = $_POST['hsc'];
            if (!isphone($num)){
                echo "Invalid student Phone number";
            }
            elseif(!isphone($gnum)){
                echo "Guardian phone num invalid";
            }
            else{
                $stmt = $conn->prepare("UPDATE student SET sname = ?, snumber = ?, sdob= ? , gnumber = ?, scollege =? , sssc = ?, shsc = ? WHERE id = ?");
                $stmt->bindParam(1, $name, PDO::PARAM_STR);
                $stmt->bindParam(2, $num, PDO::PARAM_STR);
                $stmt->bindParam(3, $dob, PDO::PARAM_STR);
                $stmt->bindParam(4, $gnum, PDO::PARAM_STR);
                $stmt->bindParam(5, $clg, PDO::PARAM_STR);
                $stmt->bindParam(6, $ssc, PDO::PARAM_STR);
                $stmt->bindParam(7, $hsc, PDO::PARAM_STR);
                $stmt->bindParam(8, $id, PDO::PARAM_INT);
                $stmt ->execute();
                if($stmt->execute() === TRUE){
                    echo "updated_info";
                }
                else{
                    echo "can't update student data";
                }
            }
            
        }

        //update admission ends here


        //update ex payment starts here
            else if(isset($_POST['action']) && $_POST['action']=='ex_pay'){
                if(isset($_POST['id'])){
                    $e_id = (int)$_POST['id'];
                    $setp = $conn->prepare("UPDATE expense SET is_paid = 1 WHERE expense_id = ?;");
                    $setp->bindParam(1, $e_id, PDO::PARAM_INT);
                    $setp->execute();
                    if($setp->execute() === TRUE){
                        echo "done";
                    }
                    else{
                        echo "update failed";
                    }
                }
            }
        //update ex payment ends here


        #deleting expense starts here
        else if(isset($_POST['action']) && $_POST['action']=='del_expense'){
            if(isset($_POST['id'])){
                $del_id = (int)$_POST['id'];
                $stmt = $conn->prepare("DELETE FROM t_expense WHERE expense_id = :expense_id");
                $stmt->bindParam(':expense_id', $del_id);
                $stmt->execute();
                $stmt2 = $conn->prepare("DELETE FROM e_expense WHERE expense_id = :expense_id");
                $stmt2->bindParam(':expense_id', $del_id);
                $stmt2->execute();

                $stmt3 = $conn->prepare("DELETE FROM o_expense WHERE expense_id = :expense_id");
                $stmt3->bindParam(':expense_id', $del_id);
                $stmt3->execute();

                $delx = $conn->prepare("DELETE FROM expense  WHERE expense_id = ?;");
                $delx->bindParam(1, $del_id, PDO::PARAM_INT);
                $delx->execute();
                if($delx->execute() === TRUE){
                    echo "deleted";
                }
                else{
                    echo "Failed";
                }
            }
        }
        #deleting expense ends here

    }


    //POST method calls ends here


