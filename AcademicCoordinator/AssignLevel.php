<?php
include 'academic_coordinator_funcs.php';

$students = get_unassigned_students();
if(isset($_POST['sumbit'])){

            $student_data= array(
                'studentid'  => $_POST['student'],
                'grade_level'  => $_POST['grade_level']);

            assign_student_level($student_data);
            header("Location: AssignLevel.php");

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


    <?php include 'ac_navbar.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">

                <div class = "row">

                    <div class="col-md-5">
                        <form action="" method="POST">

                            <?php if($students){?>
                                <h2 class="page-header">Manage Grade Assignments</h2>
                                <label>Student Name</label>
                                <select id="disabledSelect" name="student" class="form-control">
                                    <?php foreach ($students as $student){ ?>
                                        <option value="<?php echo $student['studentid'];?>"><?echo $student['fname']." ".$student['lname']; ?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <label for="disabledSelect">Grade Level</label>
                                <select id="disabledSelect" name="grade_level" class="form-control">
                                    <option value="1">Grade 1</option>
                                    <option value="2">Grade 2</option>
                                    <option value="3">Grade 3</option>
                                    <option value="4">Grade 4</option>
                                    <option value="5">Grade 5</option>
                                    <option value="6">Grade 6</option>
                                    <option value="7">Grade 7</option>
                                </select>
                                <br>
                                <button type="submit" name="sumbit" class="btn-success form-control"> A S S I G N </button>
                            <?php }
                                else{
                            ?>

                                    <h1>There are no current students needed an assignment! </h1>
                            <?php }?>
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
