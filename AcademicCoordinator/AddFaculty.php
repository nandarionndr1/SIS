<?php
include 'academic_coordinator_funcs.php';
if(isset($_POST['sumbit'])){
    if($_POST['password'] == $_POST['repeat-password']){
        $faculty = array(
                'mname'  => $_POST['mname'],
                'lname'  => $_POST['lname'],
                'fname'  => $_POST['fname'],
                'username' => $_POST['username'],
                'password'  => $_POST['password']);

        add_faculty($faculty,$_POST['faculty_type']);

        echo"<script>alert('success!')</script>";
    }
    else{
        echo"<script>alert('password_not_match!')</script>";
    }
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

    <?php include 'ac_navbar.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- /.row -->

            <div class="row">
               <h1 class="page-header">Add an account</h1>

                <div class = "row">
                    <div class="col-md-6">
                        <form action="" method="POST">


                            <label>Name</label>
                            <div class="row">


                                <div class = "col-lg-6">

                                        <div class ="form-group">

                                            <input name="lname" class = "form-control" placeholder = "Surname"/>

                                        </div>

                                </div>
                                <div class = "col-lg-4">

                                        <div class ="form-group">

                                            <input name="fname" class = "form-control" placeholder = "Firstname"/>

                                        </div>

                                </div>
                                <div class = "col-lg-2">

                                        <div class ="form-group">

                                            <input name="mname" class = "form-control" placeholder = "M.I"/>
                                        </div>

                                </div>
                            </div>

                            <label>Username</label>
                            <input name="username" class="form-control"/>
                            <label>Password</label>
                            <input name="password" type="password" class="form-control"/>
                            <label>Repeat Password</label>
                            <input name="repeat-password" type="password" class="form-control"/>
                            <br>
                            <label for="disabledSelect">Account Type</label>
                            <select id="disabledSelect" name="faculty_type" class="form-control">
                                <option value="academic_coordinator">Academic Coordinator</option>
                                <option value="registrar">Registrar</option>
                                <option value="teacher">Teacher</option>
                            </select>
                            <br>
                            <button type="submit" name="sumbit" class="btn-success form-control"> R E G I S T E R </button>
                        </form>
                    </div>
                </div>
                </br>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


    </div>
    <!-- /.container-fluid -->

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
