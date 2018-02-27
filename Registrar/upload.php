<?php

$form137_set = false;
$form138_set = false;
$goodm_cert = false;
$birth_cert_set = false;
$photo = false;

$allowed = array("jpg" , "jpeg", "docx" , "pdf" , "png" );
        
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors

    if(isset($_FILES["req_form137"]) AND $_FILES["req_form137"]["error"] == 0){

        $filename1 = $_FILES["req_form137"]["name"];
        $array = explode('.', $_FILES['req_form137']['name']);
        $filetype1 = end($array);

        $filesize1 = $_FILES["req_form137"]["size"];
        if(in_array($filetype1, $allowed)){
            // Check whether file exists before uploading it
            if(!(file_exists("uploads/" . $_FILES["req_form137"]["name"]))){
                $image1 = addslashes(file_get_contents($_FILES['req_form137']['tmp_name']));
                $image_name1 = addslashes($_FILES['req_form137']['name']);

                move_uploaded_file($_FILES["req_form137"]["tmp_name"], "uploads/".$_SESSION['cur_user_id']."/". $_FILES["req_form137"]["name"]);
                $form137_set = true;
                return 1;

            }
        }
    }

    if(isset($_FILES["req_form138"]) && $_FILES["req_form138"]["error"] == 0){
        $filename2 = $_FILES["req_form138"]["name"];
        $filesize2 = $_FILES["req_form138"]["size"];

        $array = explode('.', $_FILES['req_form138']['name']);
        $filetype2 = end($array);


        $t = in_array($filetype2, $allowed);



        if(in_array($filetype2, $allowed)){
            // Check whether file exists before uploading it
            if(!(file_exists("uploads/" . $_FILES["req_form138"]["name"]))){
                $image1 = addslashes(file_get_contents($_FILES['req_form138']['tmp_name']));
                $image_name1 = addslashes($_FILES['req_form138']['name']);

                move_uploaded_file($_FILES["req_form138"]["tmp_name"], "uploads/" .$_SESSION['cur_user_id']."/" . $_FILES["req_form138"]["name"]);

                $form138_set = true;
                return 1;
            }
        }
    }
    if(isset($_FILES["req_birth_cert"]) AND $_FILES["req_birth_cert"]["error"] == 0){
        $filename3 = $_FILES["req_birth_cert"]["name"];

        $array = explode('.', $_FILES['req_birth_cert']['name']);
        $filetype3 = end($array);

        $filesize3 = $_FILES["req_birth_cert"]["size"];

        if(in_array($filetype3, $allowed)){
            // Check whether file exists before uploading it
            if(!(file_exists("uploads/" . $_FILES["req_birth_cert"]["name"]))){
                $image1 = addslashes(file_get_contents($_FILES['req_birth_cert']['tmp_name']));
                $image_name1 = addslashes($_FILES['req_birth_cert']['name']);

                move_uploaded_file($_FILES["req_birth_cert"]["tmp_name"], "uploads/" .$_SESSION['cur_user_id']."/" . $_FILES["req_birth_cert"]["name"]);

                $birth_cert_set = true;
                return 1;
            }
        }
    }
    if(isset($_FILES["req_goodm_cert"]) AND $_FILES["req_goodm_cert"]["error"] == 0 ){
        $filename4 = $_FILES["req_goodm_cert"]["name"];

        $array = explode('.', $_FILES['req_goodm_cert']['name']);
        $filetype4 = end($array);

        $filesize4 = $_FILES["req_goodm_cert"]["size"];
        if(in_array($filetype4, $allowed)){
            // Check whether file exists before uploading it
            if(!(file_exists("uploads/" . $_FILES["req_goodm_cert"]["name"]))){
                $image1 = addslashes(file_get_contents($_FILES['req_goodm_cert']['tmp_name']));
                $image_name1 = addslashes($_FILES['req_goodm_cert']['name']);
                move_uploaded_file($_FILES["req_goodm_cert"]["tmp_name"], "uploads/" .$_SESSION['cur_user_id']."/" . $_FILES["req_goodm_cert"]["name"]);
                $goodm_cert = true;
                return 1;
            }
        }
    }
    if(isset($_FILES["photo"]) AND $_FILES["photo"]["error"] == 0 ){
        $filename5 = $_FILES["photo"]["name"];

        //echo "<script>alert('inzidePhoto')</script>";
        $array = explode('.', $_FILES['photo']['name']);
        $filetype5 = end($array);

        $filesize5 = $_FILES["photo"]["size"];

        if(in_array($filetype5, $allowed)){
            // Check whether file exists before uploading it
            if(!(file_exists("uploads/" . $_FILES["photo"]["name"]))){
                $image1 = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
                $image_name1 = addslashes($_FILES['photo']['name']);

                move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" .$_SESSION['cur_user_id']."/" . $_FILES["photo"]["name"]);

                $photo = true;
                return 1;
            }
        }
    }
}
?>
