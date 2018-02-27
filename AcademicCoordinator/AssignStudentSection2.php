<?php
include 'academic_coordinator_funcs.php';

if(isset($_GET['grade_level'])){
    $students = get_unassigned_student_sections($_GET['grade_level']);
    $sections = get_sections($_GET['grade_level']);
}

if(isset($_POST['sumbit'])){
    if($_POST['section'] == null){

        echo "<script>alert('did not select a section!')</script>";
    }
    if($_POST['students'] == null){

        echo "<script>alert('did not select a student!')</script>";
    }else {
        foreach ($_POST['students'] as $student) {
            add_student_to_section($student, $_POST['section']);
        }
    }

    header("Location: AssignStudentSection2.php?grade_level=".$_POST['grade_level']);
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
                <div class="col-lg-12">







                    <h2 class="page-header">Assign Grade <?php echo $_GET['grade_level'];?> Students</h2>
                    <div id="page-wrapper">

                        <div class="container-fluid">
                            <div class = "row">
                                <form method="post" action="">
                                    <div class = "col-sm-6">
                                        <input type="hidden" value="<?php echo $_GET['grade_level'];?> " name="grade_level"/>
                                        <label id = "sec" for ="hehe">Unassigned Grade <?php echo $_GET['grade_level'];?> Students</label>
                                    <?php if($students != NULL){ ?>
                                        <table id="table2" class = "table table-bordered">
                                            <thead>
                                            <tr>
                                                <th style="width: 10%;"></th>
                                                <th>Name</th>
                                                <th>ID</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($students as $student) { ?>
                                            <tr>
                                                <td style="text-align: center">
                                                    <input type="checkbox" name="students[]" value="<?php echo $student['studentid']; ?>">
                                                </td>
                                                <td><a href = ""><?php echo $student['fname']." ".$student['lname']; ?></a></td>
                                                <td><a href = "">ID-<?php echo $student['studentid'] + 1000; ?></a></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class = "col-sm-6">
                                        <label id = "sec" for ="hehe">Grade <?php echo $_GET['grade_level'];?> Sections</label>
                                        <table id = "hehe"  class = "table table-bordered">
                                            <thead>
                                            <tr>
                                                <th style="width: 10%;"></th>
                                                <th>Name</th>
                                                <th>Current Capacity</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($sections as $section) { ?>
                                            <tr>
                                                <td style="text-align: center"><input type="radio" name="section" value="<?php echo $section['sectionid'];?>"></td>
                                                <td><?php echo $section['section_name'];?></td>
                                                <td><?php echo get_current_section_capacity($section['sectionid']);?>/30</td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php }
                                    else{ ?>
                                        <center>
                                        <h3>All students have been assigned to a section, have a nice day! </h3>
                                        <hr>
                                        </center>
                                    <?php }?>
                                    </div>

                            </div>
                                    <center> <button type = "submit"  name="sumbit" class = "btn btn-success btn-lg">Save</button>
                                             <a href="AssignStudentSection1.php" class = "btn btn-default btn-lg">Go Back</a>
                                    </center>

                                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

</body>

</html>
