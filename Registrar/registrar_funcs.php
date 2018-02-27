<?php
session_start();
$db = new PDO('mysql:host=127.0.0.1;dbname=wmcdb', 'root', 'root');


function get_students(){

    global $db;

    $do = $db->prepare("select s.*,r.* from student s JOIN requirements r on r.requirementid = s.requirementid ");
    $do->execute();

    return $do;
}
function checkRequirement($student){
    $requirements = "";

    if ($student['form137_path'] == null){$requirements.= "No Form 137, ";}
    if ($student['form138_path'] == null){$requirements.= "No Form 138, ";}
    if ($student['birth_cert_path'] == null){$requirements.= "No Birth Certificate, ";}
    if ($student['goodm_cert_path'] == null){$requirements.= "No Good Moral Certificate,";}

    if ($requirements == ""){return "Completed";}

    return $requirements;
}
function get_student_by_id($id){
    global $db;

    $do = $db->prepare("select s.*,r.* from student s JOIN requirements r on r.requirementid = s.requirementid where :id = s.studentid");
    $do->bindParam(':id',$id);
    $do->execute();

    $count = $do->rowCount();

    if ($count>0){
        foreach($do as $d){
            return $d;
        }
    }

    return $do;
}
function get_parent_by_student_id($id){
    global $db;

    $do = $db->prepare("select * from student s JOIN guardian_info r on r.student_studentid = s.studentid where :id = s.studentid");
    $do->bindParam(':id',$id);
    $do->execute();

    $count = $do->rowCount();

    if ($count>0){
        foreach($do as $d){
            return $d;
        }
    }

    return null;
}
function get_siblings_by_student_id($id){
    global $db;

    $do = $db->prepare("select * from student s JOIN sibling r on r.studentid = s.studentid where :id = s.studentid");
    $do->bindParam(':id',$id);
    $do->execute();

    $count = $do->rowCount();

    if ($count<0){
        return false;
    }
    return $do;
}
function concludeAdmission($decision,$id){
    global $db;
    $do = null;

    if($decision){
        echo "im in!";
        $do = $db->prepare("UPDATE requirements r JOIN student s on r.requirementid = s.requirementid  set r.date_concluded = NOW()  WHERE  s.studentid = :id");
        $do->bindParam(':id',$id);
        $do->execute();
        $do = $db->prepare("UPDATE requirements r JOIN student s on r.requirementid = s.requirementid  set r.admission_status = 1  WHERE  s.studentid = :id;");
        $do->bindParam(':id',$id);
        $do->execute();

    }else{
        $do = $db->prepare("UPDATE requirements r INNER JOIN student s on r.requirementid = s.requirementid  set r.admission_status = -1 and r.date_concluded = NOW() WHERE  s.studentid = :id");
        $do->bindParam(':id',$id);

        $do->execute();
    }
    $count = $do->rowCount();
    if ($count<0){
        echo "unsuccess";
        return false;
    }
    echo "what";
    return true;
}
function setReqs($req_type, $id,$path){
    global $db;
    $do = null;
    switch ($req_type){
        case 'f137':
            $do = $db->prepare("UPDATE requirements r INNER JOIN student s on r.requirementid = s.requirementid  set r.form137_path = :path  WHERE  s.studentid = :id");
            $do->bindParam(':id',$id);
            $do->bindParam(':path',$path);
            echo "<script>alert('f137')</script>";
            break;
        case 'f138':
            $do = $db->prepare("UPDATE requirements r INNER JOIN student s on r.requirementid = s.requirementid  set r.form138_path = :path  WHERE s.studentid = :id");
            $do->bindParam(':id',$id);
            $do->bindParam(':path',$path);
            echo "<script>alert('f138')</script>";
            break;
        case 'bc':
            $do = $db->prepare("UPDATE requirements r INNER JOIN student s on r.requirementid = s.requirementid  set r.birth_cert_path = :path  WHERE s.studentid = :id");
            $do->bindParam(':id',$id);
            $do->bindParam(':path',$path);
            echo "<script>alert('bc')</script>";
            break;
        case 'gm':
            $do = $db->prepare("UPDATE requirements r INNER JOIN student s on r.requirementid = s.requirementid  set r.goodm_cert_path = :path  WHERE  s.studentid = :id");
            $do->bindParam(':id',$id);
            $do->bindParam(':path',$path);
            echo "<script>alert('gm')</script>";
            break;
        case 'photo':
            $do = $db->prepare("UPDATE student set img_directory = :path where studentid = :id");
            $do->bindParam(':id',$id);
            $do->bindParam(':path',$path);
            //echo "<script>alert('photo')</script>";
            break;
    }
    $do->execute();
    $count = $do->rowCount();

    if ($count<0){
        return false;
    }
    return true;
}

