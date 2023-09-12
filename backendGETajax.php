<?php
include 'dbconnect.php' ;
include 'myfunc.php' ;

if ($_SERVER["REQUEST_METHOD"] == "GET"){

    #geting course price
    if(isset($_GET['action']) && $_GET['action'] === 'get_course_price' ){
        if(isset($_GET['course_id'])){
            $senddata=0;
            $course_id = (string)$_GET['course_id'];
            $courseprice = $conn -> prepare("SELECT price FROM course WHERE `course_id` = ?;");
            $courseprice->bindParam(1, $course_id, PDO::PARAM_STR);
            $courseprice->execute();
            $res=$courseprice->fetchAll(PDO::FETCH_ASSOC);
            if(count($res)==1){
                foreach($res as $row ){
                    $senddata = $senddata + (int)$row['price'];
                }
                echo $senddata;
            }
            else{
                echo "Course price wasn't found.";
            }
        }
    }
    #geting course price ends here


    #getting batches on student admit form based on selected course
    else if (isset($_GET['action']) && $_GET['action'] === 'get_batches' ){
        if(isset($_GET['course_id'])){
            $senddata = "<option disabled value >(--select batch--)</option>";
            $course_id = (string)$_GET['course_id'];
            $batches = $conn -> prepare("SELECT * FROM batch WHERE `course_id` = ?;");
            $batches->bindParam(1, $course_id, PDO::PARAM_STR);
            $batches->execute();
            $res=$batches->fetchAll(PDO::FETCH_ASSOC);
            if(count($res)>0){
                foreach($res as $row ){
                    $senddata = $senddata.'<option value="'.$row['batch_id'].'">'.$row['weekdays'].'('.$row['startTime'].' to '.$row['endTime'].')</option>';
                }
                echo $senddata;
            }
            else{
                $senddata = '<option disabled value >(no batch available)</option>';
                echo $senddata;
            }


        }
    }
    #getting batches on student admit form based on selected course ends here


    #get all students starts here

    else if (isset($_GET['action']) && $_GET['action'] === 'get_all_student' ){
        try{
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 2;
            $offset = ($page - 1) * $limit;

            $studentsquery = $conn-> prepare("SELECT * FROM student ORDER BY id DESC LIMIT $limit OFFSET $offset ;");
            $studentsquery ->execute();
            $rows = $studentsquery -> fetchAll(PDO::FETCH_ASSOC);
            if ($rows > 0) {
                $students = array();
                foreach($rows as $row){
                    try{
                        $crid = (string)$row['course_id'];
                        $btid = (string)$row['batch_id'];
                        $gcourse = $conn ->prepare("SELECT * FROM course WHERE course_id = ?;");
                        $gcourse -> bindParam(1, $crid, PDO::PARAM_STR);
                        $gcourse ->execute();
                        $crinfo = $gcourse ->fetch(PDO::FETCH_ASSOC);
                        $gbatch = $conn ->prepare("SELECT * FROM batch WHERE batch_id = ?;");
                        $gbatch -> bindParam(1, $btid, PDO::PARAM_STR);
                        $gbatch ->execute();
                        $btinfo = $gbatch ->fetch(PDO::FETCH_ASSOC);
                        $row['course'] = $crinfo['title'] ? $crinfo['title'] :'not set';
                        $row['batch_start'] = $btinfo['startTime'] ? date("h:i A", strtotime($btinfo['startTime'])) : 'not set';
                        $row['batch_end'] = $btinfo['endTime'] ? date("h:i A", strtotime($btinfo['endTime'])) : 'not set';
                        $row['weekdays'] = $btinfo['weekdays'] ? $btinfo['weekdays']   : 'not set';
                        $row=array_map("trim",$row);
                        $row = array_map('stripslashes', $row);
                        $row = array_map('htmlspecialchars', $row);

                        $students[] = $row;
                        }
                        catch(PDOException $ww){
                            echo $ww;
                        }
                    }
                    
                echo json_encode($students);
            } else {
                echo "0 results";
            }
        }
        catch(PDOException $emsg){
            echo $emsg;
        }
           



    }

    #get all student ends here


    #delete student

    else if(isset($_GET['action']) && $_GET['action'] == "del_student" ){
        try{
            $id = (int)$_GET['id'];
            $del = $conn ->prepare("DELETE FROM student WHERE id =?;");
            $del -> bindParam(1,$id,PDO::PARAM_INT);
            $del->execute();
            if($del->execute() === TRUE ){
                echo "deleted";
            }
            else{
                echo "opps..can not delete now..";
            }
        }
        catch(PDOException $r){
            echo $r;
        }
        
    }

    #delete student ends


}

    



?>