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
                        $phone=out($phone);
                        $phone=onlyD($phone);
                        $pass=out($pass);
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
                    $phone=out($phone);
                    $phone=onlyD($phone);
                    $pass=out($pass);
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
                
                $amount=out($amount);
                $amount=onlyD($amount);
                $tname=out($tname);
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
                
                $amount=out($amount);
                $amount=onlyD($amount);
                $ename=out($ename);
                $ename=onlyABC($ename);
                $edes=out($edes);
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
                
                $amount=out($amount);
                $amount=onlyD($amount);
                $exinfo=out($exinfo);
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
                $title=out($title);
                $title=onlyABC($title);
                $price=out($price);
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


    }