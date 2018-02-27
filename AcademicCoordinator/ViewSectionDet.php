<?php
include 'academic_coordinator_funcs.php';
$section = null;
echo $_GET['sectionid'];

$students = get_section_students($_GET['sectionid']);
$section = get_section_by_id($_GET['sectionid']);

if(isset($_GET['sectionid'])){
    $students = get_section_students($_GET['sectionid']);
    $section = get_section_by_id($_GET['sectionid']);
}

if(isset($_POST['sumbit'])){

    unassign_faculty($_POST['sectionid']);
    header("Location: ViewSectionDet.php?sectionid=".$_POST['sectionid']);
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

            <!-- Page Heading -->

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">







                    <h1 class="page-header">View Class list</h1>
                    <div id="page-wrapper" style="min-height: 600px">

                        <div class="container">

                            <div class = "row">

                                <div class = "col-sm-6">
                                    <p><b>School Year: <?php echo $section['school_year'];?></p></b>
                                    <form action="" method="POST">

                                         <?php if($section['staffid'] != null){?>
                                             <label>Adviser: <?php echo get_faculty_by_id($section['staffid'])['fname']
                                                     . " ".get_faculty_by_id($section['staffid'])['lname'];?>
                                             </label>
                                            <input name="sectionid" value="<?php echo $section['sectionid'];?>" type="hidden">
                                            <button type="submit" name="sumbit"><b style="color: red; display: inline-block">X</b></button>
                                        <?php }else{?>
                                             <h5 style="color: #1b6d85">No Faculty Adviser Assigned yet</h5>
                                        <?php }?>
                                    </form>
                                        <p><b>Total number of students for this section: </b> <?php echo get_current_section_capacity($section['sectionid']);?></p>
                                    <p><b>Classroom: <?php echo get_room_by_id($section['rooms_id'])['room_number'];?></p></b>

                                    <table class = "table table-bordered">
                                        <thead>
                                        <tr>
                                            <td>ID Number</td>
                                            <td>Surname</td>
                                            <td>First Name</td>
                                            <td>Middle Name</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($students != false){?>
                                            <?php foreach($students as $student){?>
                                            <tr>
                                                <td><?php echo "ID-".($student['studentid']+1000);?></td>
                                                <td><a href = "ViewGrades2.html"><?php echo $student['lname'];?></a></td>
                                                <td><?php echo $student['fname'];?></td>
                                                <td><?php echo $student['mname'];?></td>
                                            </tr>
                                            <?php }}else{?>
                                                    <h3>No students yet.</h3>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
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
