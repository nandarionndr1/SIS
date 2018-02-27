<?php

include 'registrar_funcs.php';


if(isset($_POST['approve'])){
    concludeAdmission(true,$_SESSION['cur_user_id']);
    header('Location: ManageRequirements.php');
    echo "DONES!";
}
if(isset($_POST['reject'])){
    concludeAdmission(false,$_SESSION['cur_user_id']);
    header('Location: ManageRequirements.php');
}

if(isset($_GET['id'])){

    $_SESSION['cur_user_id'] = $_GET['id'];
    $student = get_student_by_id($_GET['id']);
    $parents = get_parent_by_student_id($_GET['id']);

}
else{
    //echo $_SESSION['cur_user_id']." - is user ID <br>";
    $student = get_student_by_id($_SESSION['cur_user_id']);
    $parents = get_parent_by_student_id($_SESSION['cur_user_id']);

}


$form137_set = false;
$form138_set = false;
$goodm_cert = false;
$birth_cert_set = false;
$photo = false;

if(isset($_POST['req_submit'])){
    include 'upload.php';

    if($form137_set){
        echo setReqs('f137',$_SESSION['cur_user_id'],"uploads/"  .$_SESSION['cur_user_id']."/" . $_FILES["req_form137"]["name"]);
    }
    if($form138_set){

        echo setReqs('f138',$_SESSION['cur_user_id'],"uploads/"  .$_SESSION['cur_user_id']."/" . $_FILES["req_form138"]["name"]);
    }
    if($goodm_cert){
        echo  setReqs('gm',$_SESSION['cur_user_id'],  "uploads/"  .$_SESSION['cur_user_id']."/" . $_FILES["req_goodm_cert"]["name"]);
    }
    if($birth_cert_set){
        echo setReqs('bc',$_SESSION['cur_user_id'],  "uploads/" .$_SESSION['cur_user_id']."/"  . $_FILES["req_birth_cert"]["name"]);
    }
    if($photo){
        echo  setReqs('photo',$_SESSION['cur_user_id'],  "uploads/"  .$_SESSION['cur_user_id']."/" . $_FILES["photo"]["name"]);
    }

    header("Location: ManageRequirements2.php?id=".$_SESSION['cur_user_id']);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WMC</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <a class="navbar-brand" href="index.php">WMC-Registrar</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="C:\Users\Lance\Desktop\PROTOTYPE\Homepage\index.html">Logout</a></li>
          </ul>
        </div>
            <!-- Top Menu Items -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="ManageForms.html"></i> Manage Student Admission Forms</a>
                    </li>
                     <li class = "active">
                        <a href= "ManageRequirements.php"> Manage Requirements</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                   <div class="col-lg-12">
                    <div class="row">
                       <div class="col-lg-3">
                           <form action="" method="post" enctype="multipart/form-data">
                               <img src="<?php echo $student['img_directory']?>" id="photo" alt="Smiley face" height="225" width="225"><br>
                               <small>Change student picture</small>
                               <input type="file" name="photo" onchange="showArtImage(this);" ><br>
                               </br>
                               <hr>
                                   <label>Form 137</label>
                                   <?php if($student['form137_path'] == null){?>
                                       <input type="file" name="req_form137" ><br>
                                   <?php }else{ ?>
                                       <h3 style="color: green"> Requirement Fulfilled </h3>
                                   <?php }?>

                                   <label>Form 138</label>
                                   <?php if($student['form138_path'] == null){?>
                                       <input type="file" name="req_form138"><br>
                                   <?php }else{ ?>
                                       <h3 style="color: green"> Requirement Fulfilled </h3>
                                   <?php }?>

                                   <label>NSO Birth Certificate</label>
                                   <?php if($student['birth_cert_path'] == null){?>
                                       <input type="file" name="req_birth_cert" ><br>
                                   <?php }else{?>
                                       <h3 style="color: green"> Requirement Fulfilled </h3>
                                   <?php }?>

                                   <label>Certificate of Good Moral</label>
                                   <?php if($student['goodm_cert_path'] == null){?>
                                       <input type="file" name="req_goodm_cert"><br>
                                   <?php }else{?>
                                       <h3 style="color: green"> Requirement Fulfilled </h3>
                                   <?php }?>

                                   <br>
                                   <button type="submit" name="req_submit" class="btn btn-default">Update/Submit</button>
                           </form>
                       </div>
                       <div class="col-lg-9">
                           <label>Name</label>
                           <div class="row">
                               <div class = "col-lg-3">
                                   <h3><?php echo $student['lname']?></h3>
                               </div>
                               <div class = "col-lg-4">
                                   <h3><?php echo $student['fname']?></h3>
                               </div>
                               <div class = "col-lg-4">
                                   <h3><?php echo $student['mname']?></h3>
                               </div>
                           </div>
                           <label>Address</label>
                           <div class = "row">
                               <div class="col-lg-5">
                                   <h4><?php echo $student['address']?></h4>
                               </div>
                           </div>
                           </br>
                           <div class = "row">
                               <div class="col-lg-4">
                                   <label for="meeting">Birthday</label>
                                   </br>
                                   <h4><?php echo $student['birthday']?></h4>
                               </div>
                               <div class="col-lg-4">
                                   <label>Birthplace</label>
                                   <h4><?php echo $student['birthplace']?></h4>
                               </div>
                           </div>

                       </div>
                        <div class ="col-lg-6">
                            <h3>Father</h3>
                            <label>Name</label>
                            <div class="row">

                                <div class = "col-lg-4">
                                    <p><?php echo $parents['father_lname']?></p>
                                </div>
                                <div class = "col-lg-4">
                                    <p><?php echo $parents['father_fname']?></p>
                                </div>
                                <div class = "col-lg-3">
                                    <p><?php echo $parents['father_mname']?></p>
                                </div>
                            </div>

                            <div class = "row">
                                <div class="col-lg-10">
                                    <label>Occupation</label>
                                    <p><?php echo $parents['father_occu']?></p>
                                </div>
                            </div>
                            </br>
                            <div class = "row">
                                <div class="col-lg-5">
                                    <label>Office number</label>
                                    <p><?php echo $parents['father_office']?></p>
                                </div>
                                <div class="col-lg-5">
                                    <label>Mobile number</label>
                                    <p><?php echo $parents['father_mobile']?></p>

                                </div>
                            </div>
                        </div>

                        <div class ="col-lg-6">
                            <h3>Mother</h3>
                            <label>Name</label>
                            <div class="row">
                                <div class = "col-lg-4">
                                    <p><?php echo $parents['mother_lname']?></p>
                                </div>
                                <div class = "col-lg-4">
                                    <p><?php echo $parents['mother_fname']?></p>
                                </div>
                                <div class = "col-lg-3">
                                    <p><?php echo $parents['mother_mname']?><p>
                                </div>
                            </div>

                            <div class = "row">
                                <div class="col-lg-10">
                                    <label>Occupation</label>
                                    <p><?php echo $parents['mother_occu']?></p>
                                </div>
                            </div>
                            </br>
                            <div class = "row">
                                <div class="col-lg-5">
                                    <label>Office number</label>
                                    <p><?php echo $parents['mother_office']?></p>
                                </div>
                                <div class="col-lg-5">
                                    <label>Mobile number</label>
                                    <p><?php echo $parents['mother_mobile']?></p>
                                </div>
                            </div>
                        <div class="row">

                        <div class ="col-lg-6">
                            <h3>Last school attended</h3>
                            <div class="row">
                                <div class = "col-lg-12">
                                    <div class ="form-group">
                                        <label>Name of school</label>
                                        <p><?php echo $student['LastSchool']?></p>
                                    </div>
                                </div>
                                <div class = "col-lg-12">
                                    <div class ="form-group">
                                        <label>School address</label>
                                        <p><?php echo $student['LastSchoolAddress']?></p>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class ="col-lg-12">
                            <h3>Others</h3>
                            <div class = "col-lg-6">
                                <div class="form-group">
                                    <p><?php echo $student['Others']?></p>
                                </div>

                                <center>
                                    <?php if($student['admission_status'] == 1 || $student['admission_status'] == -1 ){ ?>
                                    <?php }
                                     else{?>
                                        <form action="" method="POST" style="display: inline-block;">
                                            <button type="submit" name="approve" class="btn btn-lg btn-success">Approve</button>
                                        </form>
                                        <form action="" method="POST" style="display: inline-block;">
                                            <button type="submit" name="reject" class="btn  btn-lg btn-danger">Reject</button>
                                        </form>
                                    <?php }?>
                                </center>
                            </div>

                        </div>
                    </div>
                    </div>

                    </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
<script>
    function showArtImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo')
                    .attr('src', e.target.result).style="display: inline;"
                ;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
