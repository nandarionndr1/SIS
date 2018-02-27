<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=wmcdb', 'root', 'root');

function add_faculty($faculty, $type){
    global $db;

    $do = $db->prepare("INSERT INTO faculties (fname, mname, lname, active) VALUES (:fname, :mname, :lname,1);");
    $do->bindParam(':fname',$faculty['fname']);
    $do->bindParam(':lname',$faculty['lname']);
    $do->bindParam(':mname',$faculty['mname']);

    $do->execute();
    $id = $db->lastInsertId();

    $do = $db->prepare("insert into users(userid, userType, username, password, active) VALUE (:userid, :userType,:username,:password,1)");
    $do->bindParam(':userid',$id);
    $do->bindParam(':userType',$type);
    $do->bindParam(':username',$faculty['username']);
    $do->bindParam(':password',$faculty['password']);
    $do->execute();

}
function assign_adviser_to_section($data){
    global $db;

    $do = $db->prepare("UPDATE sections s set s.staffid =:sid WHERE s.sectionid =:secid");
    $do->bindParam(':sid',$data['staffid']);
    $do->bindParam(':secid',$data['sectionid']);

    $do->execute();
}
function assign_student_level($data){
    global $db;

    $do = $db->prepare("UPDATE requirements r INNER JOIN student s on r.requirementid = s.requirementid set s.grade_level_id = :gr_lvl WHERE s.studentid = :id AND r.admission_status = 1");
    $do->bindParam(':id',$data['studentid']);
    $do->bindParam(':gr_lvl',$data['grade_level']);

    $do->execute();

}
function add_section($data){
    global $db;

    if ($data['staff_id'] == "null"){
        $data['staff_id'] = null;
    }

    $do = $db->prepare("INSERT INTO sections (section_name, grade_level, staffid,school_year,rooms_id) VALUES (:sec_name, :gr_lvl,:stf_id,:sy,:ri);");
    $do->bindParam(':sec_name',$data['section_name']);
    $do->bindParam(':gr_lvl',$data['grade_level']);
    $do->bindParam(':stf_id',$data['staff_id']);
    $do->bindParam(':sy',$data['school_year']);
    $do->bindParam(':ri',$data['room_id']);

    $do->execute();
}
function add_subjects($data){
    global $db;

    $do = $db->prepare("INSERT INTO subjects (subject_name, subject_desc) VALUES (:sub_name, :sub_desc);");
    $do->bindParam(':sub_name',$data['subject_name']);
    $do->bindParam(':sub_desc',$data['subject_description']);
    $do->execute();
}
function add_class($data){
    global $db;

    $do = $db->prepare("INSERT INTO 
              class (sectionid, subjectid, class_start_time,class_end_time,staffid)
              VALUES (:sec_id, :sub_id, :st, :et, :sid);");
    $do->bindParam(':sec_id',$data['sectionid']);
    $do->bindParam(':sub_id',$data['subjectid']);
    $do->bindParam(':st',$data['start_time']);
    $do->bindParam(':et',$data['end_time']);
    $do->bindParam(':sid',$data['staffid']);
    $do->execute();
    return true;
}
function get_room_by_id($rid){
    global $db;
    $do = $db->prepare("select * from rooms WHERE roomid = :rid ");
    $do->bindParam(':rid',$rid);
    $do->execute();
    $count = $do->rowCount();

    if ($count>0){
        foreach ($do as $d){
            return $d;
        }
    }
    return null;
}

function get_faculty_by_id($fid){
    global $db;
    $do = $db->prepare("select * from faculties WHERE staffid = :sid ");
    $do->bindParam(':sid',$fid);
    $do->execute();
    $count = $do->rowCount();

    if ($count>0){
        foreach ($do as $d){
            return $d;
        }
    }
    return null;
}
function get_unassigned_sections(){
    global $db;
    $do = $db->prepare("select * from sections where staffid is NULL ORDER BY grade_level");
    $do->execute();

    $count = $do->rowCount();

    if ($count<=0){
        return false;
    }
    return $do;
}
function unassign_faculty($section){
    global $db;

    $do = $db->prepare("UPDATE sections s set s.staffid = NULL WHERE s.sectionid =:secid");

    $do->bindParam(':secid',$section);

    $do->execute();
}
function get_section_students($sectionid){
    global $db;
    $do = $db->prepare("select s.* from student s JOIN student_section ss on s.studentid = ss.studentid where ss.sectionid = :sid");
    $do->bindParam(":sid",$sectionid);
    $do->execute();

    $count = $do->rowCount();

    if ($count<=0){
        return false;
    }
    return $do;
}
function get_unassigned_rooms(){
    global $db;

    $do = $db->prepare("select r.* from rooms r WHERE r.roomid NOT IN (select sections.rooms_id FROM sections JOIN rooms on sections.rooms_id = rooms.roomid)");
    $do->execute();

    $count = $do->rowCount();

    if ($count<=0){
        return null;
    }
    return $do;

}
function get_section_by_id($sectionid){
    global $db;
    $do = $db->prepare("select * from sections WHERE sectionid = :sid ");
    $do->bindParam(':sid',$sectionid);
    $do->execute();
    $count = $do->rowCount();



    if ($count>0){
        foreach ($do as $d){
            return $d;
        }
    }
    return null;
}
function get_all_sections(){

    global $db;
    $do = $db->prepare("select * from sections ORDER BY grade_level ");
    $do->bindParam(':gr_lvl',$grade_level);
    $do->execute();

    $count = $do->rowCount();

    if ($count<0){
        return null;

    }
    return $do;
}
function get_unassigned_students(){

    global $db;
    $do = $db->prepare("select s.*,r.* from student s JOIN requirements r on r.requirementid = s.requirementid where s.grade_level_id is NULL");
    $do->execute();

    $count = $do->rowCount();

    if ($count<=0){
        return false;
    }
    return $do;
}
function get_subjects(){

    global $db;
    $do = $db->prepare("select * from subjects ");
    $do->execute();

    $count = $do->rowCount();

    if ($count<0){
        return null;

    }
    return $do;

}
function get_sections($grade_level){

    global $db;
    $do = $db->prepare("select * from sections where grade_level = :gr_lvl");
    $do->bindParam(':gr_lvl',$grade_level);
    $do->execute();

    $count = $do->rowCount();

    if ($count<0){
            return null;

    }
    return $do;

}
function get_unassigned_faculty(){
    global $db;

    $do = $db->prepare("select f.* from faculties f JOIN users u on u.userid = f.staffid WHERE 
                                  u.userType ='teacher'
                                  AND f.active = 1
                                  AND f.staffid NOT IN 
                                  (select sections.staffid FROM sections JOIN faculties on sections.staffid = faculties.staffid) 
                                  ");
    $do->execute();

    $count = $do->rowCount();

    if ($count<=0){
        return null;
    }
    return $do;
}
function get_faculties(){

    global $db;
    $do = $db->prepare("select * from faculties f JOIN users u on u.userid = f.staffid WHERE 
                                  u.userType ='teacher'
                                  AND f.active = 1");
    $do->execute();

    $count = $do->rowCount();

    if ($count<0){
        return null;

    }
    return $do;

}
function get_current_section_capacity($sectionid){
    global $db;
    $do = $db->prepare("select * from student_section where sectionid = :sec_id");
    $do->bindParam(':sec_id',$sectionid);
    $do->execute();

    $count = $do->rowCount();
    return $count;

}
function get_unassigned_student_sections($grade_level){
    global $db;

    $do = $db->prepare("select s.* from student s WHERE s.studentid NOT IN (select student.studentid FROM student JOIN student_section on student.studentid = student_section.studentid) AND s.grade_level_id = :gr_lvl");
    $do->bindParam(':gr_lvl',$grade_level);
    $do->execute();

    $count = $do->rowCount();

    if ($count<=0){
        return null;
    }
    return $do;
}

function add_student_to_section($stu_id, $sec_id){
    global $db;
    $do = $db->prepare("INSERT INTO student_section (studentid, sectionid) VALUES (:stu_id,:sec_id);");
    $do->bindParam(':stu_id',$stu_id);
    $do->bindParam(':sec_id',$sec_id);
    $do->execute();
}
function validate($type,$data){
    global $db;
    switch ($type){
        case 'section':
            $do = $db->prepare("select * from sections where section_name = :section_name");
            $do->bindParam(':section_name',$data['section_name']);
            $do->execute();

            $count = $do->rowCount();

            if ($count>0){
                foreach($do as $d){
                    return true;
                }
            }
            return false;

            break;
        case 'subject':
            $do = $db->prepare("select * from subjects where subject_name = :subject_name");
            $do->bindParam(':subject_name',$data['subject_name']);
            $do->execute();

            $count = $do->rowCount();

            if ($count>0){
                foreach($do as $d){
                    return true;
                }
            }
            return false;

            break;
    }
}