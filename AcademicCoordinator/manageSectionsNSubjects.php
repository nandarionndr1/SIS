<?php

include 'academic_coordinator_funcs.php';

$faculties = get_unassigned_faculty();
$rooms = get_unassigned_rooms();

if(isset($_POST['sumbit'])){

    if($_POST['type']== 'section'){
        if($_POST['section-name'] != ""){

            $section= array(
                'section_name'  => $_POST['section-name'],
                'grade_level'  => $_POST['grade_level'],
                'staff_id' => $_POST['adviser'],
                'school_year' => $_POST['school_year'],
                'room_id' => $_POST['classroom']);

            if (validate("section",$section) == false){

                add_section($section);

                echo"<script>alert('success')</script>";
                echo"<script>window.location.replace(manageSectionsNSubjects.php);</script>";

            }
            else{

                echo"<script>alert('Already exists!')</script>";
            }

        }
        else{
            echo"<script>alert('please fill up section!')</script>";
        }
    }
    else{
        if($_POST['subject-name'] != ""){
            $subjects= array(
                'subject_name'  => $_POST['subject-name'],
                'subject_description'  => $_POST['subject-description']);

            if (!(validate("subject",$subjects))){

                add_subjects($subjects);

                echo"<script>alert('successedd heheh!".$subjects['subject_name'].$subjects['subject_description']."');
                             
                     window.location.href = 'http://localhost/Montessory/AcademicCoordinator/index.php';
                     </script>
                    ";
            }
            else{

                echo"<script>alert('Already exists!')</script>";
            }

        }
        else{
            echo"<script>alert('please fill up subject!')</script>";
        }
    }
    //header("Location: manageSectionsNSubjects.php");
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
            <div class="row">

                <div class = "row">
                    <div class="col-md-6">
                        <form action="" method="POST">
                            <h2 class="page-header">Add New Section</h2>
                            <label>Section Name</label>
                            <input name="section-name" class="form-control"/>

                            <input name="type" type="hidden" value="section" class="form-control"/>
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

                            <br/>
                            <label for="disabledSelect">School Year</label>
                            <select id="disabledSelect" name="school_year" class="form-control">
                                <option value="2018-2019">2018 - 2019</option>
                                <option value="2019-2020">2019 - 2020</option>
                                <option value="2020-2021">2020 - 2021</option>
                                <option value="2021-2022">2021 - 2022</option>
                            </select>

                            <br/>
                            <label for="disabledSelect">Homeroom</label>
                            <select id="disabledSelect" name="classroom" class="form-control">
                            <?php foreach ($rooms as $room){ ?>
                                <option value="<?php echo $room['roomid']?>"><?php echo $room['room_number'];?> </option>
                            <?php } ?>
                            </select>
                            <br/>
                        <?php if($faculties != null){ ?>
                            <label for="disabledSelect">Faculty Adviser</label>
                            <select id="disabledSelect" name="adviser" class="form-control">
                                <option value="null"> None </option>
                                <?php foreach ($faculties as $faculty) {?>
                                    <option value="<?php echo $faculty['staffid']?>"> <?php  echo $faculty['fname']." ".$faculty['lname'];?> </option>
                                <?php }?>
                            </select>
                        <?php } else {?>
                            <h3>No Faculty advisers are currently available</h3>
                            <input name="adviser" type="hidden" value="null" class="form-control"/>
                            <?php } ?>
                            <br>
                            <button type="submit" name="sumbit" class="btn-success form-control"> A D D  S E C T I O N </button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form action="" method="POST">

                            <h2 class="page-header">Add New Subject</h2>
                            <label>Subject Name</label>
                            <input name="subject-name" value="" class="form-control"/>

                            <input name="type" type="hidden" value="subject" class="form-control"/>
                            <br>
                            <label>Description</label>
                                <textarea class="form-control" id="others" name="subject-description" rows="3" ></textarea>
                             <br>
                            <button type="submit" name="sumbit" class="btn-success form-control"> A D D  S U B J E C T </button>
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
