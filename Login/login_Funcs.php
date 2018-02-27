<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=wmcdb', 'root', 'root');

function getAccount($username, $password){

    global $db;

    $do = $db->prepare("select * from users where username = :username AND password = :password");
    $do->bindParam(':username',$username);
    $do->bindParam(':password',$password);
    $do->execute();

    $count = $do->rowCount();

    if ($count>0){
        foreach($do as $d){
            return $d;
        }
    }
    return $do;
}
function authenticate($username, $password){

    global $db;

    $do = $db->prepare("select * from users where username = :username AND password = :password");
    $do->bindParam(':username',$username);
    $do->bindParam(':password',$password);
    $do->execute();

    $count = $do->rowCount();

    if ($count>0){
        foreach($do as $d){
            return true;
        }
    }
    return false;
}
function login($username, $password){

    global $db;

    $do = $db->prepare("select * from users where username = :username AND password = :password");
    $do->bindParam(':username',$username);
    $do->bindParam(':password',$password);
    $do->execute();

    $count = $do->rowCount();

    if ($count>0){
        foreach($do as $d){
            $_SESSION['userType'] = $d['userType'];
            redirectAccount($_SESSION['userType']);

        }
    }
    return false;
}
function redirectAccount($usertype){
    switch($usertype){
        case 'student':
            header('Location:../Student/Profile.html');
            //student - normie
            break;
        case 'teacher':

           // header('Location:Admin/HomepageAdmin.php');
            //teacher - student manager

            header('Location:../Teacher/ViewClass.html');
            break;
        case 'registrar':

           // header('Location:Admin/HomepageAdmin.php');
            //registrar - payment manager and admission amanger

            header('Location:../Registrar/index.php');
            break;
        case 'academic_coordinator':

            header('Location:../AcademicCoordinator/index.php');
           // header('Location:Admin/HomepageAdmin.php');
            //academic coordinator - admin
            break;
    }
}
?>