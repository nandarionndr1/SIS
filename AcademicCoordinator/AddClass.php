<?php

include 'academic_coordinator_funcs.php';


$subjects = get_subjects();
$faculties = get_faculties();
$sections = get_all_sections();

$first_subj = null;

if(isset($_POST['sumbit'])){


    if($_POST['start_time'] != "" && $_POST['start_time'] != "" ) {
        echo $_POST['start_time'] . "<br>";
        echo $_POST['end_time'] . "<br>";

        $class = array(
            'sectionid' => $_POST['section'],
            'subjectid' => $_POST['subject'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'staffid' => $_POST['faculty']);

        $result = add_class($class);
        echo "<script>alert('success')</script>";
    }
    else{
        echo"<script>alert('times are empty!')</script>";
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
            <div class="row">

                <div class = "row">
                    <div class="col-md-6">
                        <form action="" method="POST">



                            <h2 class="page-header">Add Class</h2>


                            <label for="disabledSelect">Subject</label>
                            <select id="subjects" onchange="subject_change(this)" name="subject" class="form-control">
                                <?php foreach ($subjects as $subject){ ?>
                                    <option value="<?php echo $subject['subjectid']?>" desc="<?php echo $subject['subject_desc']?>"><?php echo $subject['subject_name'];?> </option>
                                <?php } ?>
                            </select>
                            <br>
                            <label>Description</label>
                            <textarea class="form-control" id="others" name="subject-description" rows="3" disabled>
                                <?php echo $first_subj['subject_desc']?>
                            </textarea>

                            <br>
                            <label for="disabledSelect">Section</label>
                            <select id="disabledSelect" name="section" class="form-control">
                                <?php foreach ($sections as $section){ ?>
                                    <option value="<?php echo $section['sectionid']?>"><?php echo "G".$section['grade_level']." - ".$section['section_name'];?></option>
                                <?php } ?>
                            </select>
                            <br/>

                            <label for="disabledSelect">Start Time</label>
                            <input name="start_time" type="time" class="form-control" placeholder="00:00:00 - military time"/>

                            <label for="disabledSelect">End Time</label>
                            <input name="end_time" type="time" class="form-control" placeholder="00:00:00 - military time"/>

                            <br/>

                        <?php if($faculties != null){ ?>
                            <label for="disabledSelect">Faculty Adviser</label>
                            <select id="disabledSelect" name="faculty" class="form-control">
                                <?php foreach ($faculties as $faculty) {?>
                                    <option value="<?php echo $faculty['staffid']?>"> <?php  echo $faculty['fname']." ".$faculty['lname'];?> </option>
                                <?php }?>
                            </select>
                        <?php } else { ?>
                            <h3>No Faculty advisers are currently available</h3>
                            <?php } ?>
                            <br>
                            <button type="submit" name="sumbit" class="btn-success form-control"> Add New Class </button>
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
<script>

window.onload = function() {
    var object = document.getElementById('subjects');

    document.getElementById('others').innerHTML = object.options[0].getAttribute('desc');
};

function subject_change(object) {
    document.getElementById('others').innerHTML = object.options[object.selectedIndex].getAttribute('desc');
}

</script>