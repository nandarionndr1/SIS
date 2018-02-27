<!DOCTYPE html>
<html lang="en">

<?php


$sql=mysqli_connect("127.0.0.1","root","root","wmcdb");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

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
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href=../Homepage/index.html>WMC</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- start of form -->
<form action="" method="POST">
    <!-- Page Content -->
    <div class="container">

        <div class="row">


            <div class="container-fluid">


                    <h1 class="page-header">Fill out enrollment form</h1>


                    <h3>Student</h3>
                    <label>Name</label>
                    <div class="row">


                        <div class = "col-lg-6">

                                <div class ="form-group">

                                    <input name="surnameInput" type="text" class = "form-control" placeholder = "Surname" required/>

                                </div>

                        </div>
                        <div class = "col-lg-4">

                                <div class ="form-group">
                                    <input  type="text" class = "form-control" name="firstnameInput" placeholder = "Firstname"/>

                                </div>

                        </div>
                        <div class = "col-lg-2">

                                <div class ="form-group">

                                    <input  class = "form-control" placeholder = "Middle Name"  name="middlenameInput" required/>

                                </div>

                        </div>
                    </div>


                    <label for="meeting">Address</label>
                    <div class = "row">
                        <div class="col-lg-4">
                            <input name="streetInput" class="form-control" placeholder = "Street" required/>
                        </div>
                        <div class="col-lg-2">
                            <input name="barangayInput" class="form-control" placeholder = "Barangay" required/>
                        </div>
                        <div class="col-lg-3">
                            <input name="cityInput" class="form-control" placeholder = "Municipality/City" required/>
                        </div>
                        <div class="col-lg-3">
                            <input name="provinceInput" class="form-control" placeholder = "Province" required/>
                        </div>

                    </div>
                    </br>
                    <div class = "row">
                        <div class="col-lg-4">
                            <label for="meeting">Birthday</label>
                            </br>
                            <input name="birthdateInput" class = "form-control" id="meeting" type="date" value="2016-01-13" required/>
                        </div>
                        <div class="col-lg-7">
                            <label>Birthplace</label>
                            <input name="birthplaceInput" class="form-control" placeholder = "Birthplace" required/>
                        </div>
                    </div>

                    <h3>Last school attended</h3>

                    <div class="row">

                        <div class = "col-lg-12">

                                <div class ="form-group">
                                    <label>Name of school</label>
                                    <input name="prevschoolInput" class = "form-control" placeholder = "e.g Westside Montessori Centrum" required/>

                                </div>

                        </div>
                        <div class = "col-lg-12">

                                <div class ="form-group">
                                    <label>School address</label>
                                    <input name="prevschooladdressInput" class = "form-control" placeholder = "Address" required/>

                                </div>

                        </div>

                    </div>



                    <h3>Others</h3>
                    <label>Is there any limitation on physical activity of your child/ special attention?</label>
                    <label class="radio-inline">
                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" onclick="othersYes()">Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2"  onclick="othersNo()">No
                    </label>
                    <label>If your child has experienced previous difficulties in school, please indicate the source and nature of difficulty: </label>
                    <textarea class="form-control" id="others" name="others" rows="3" disabled></textarea>

                    <div class = "row">
                        <div class ="col-lg-6">
                            <h3>Father</h3>
                            <label>Name</label>
                            <div class="row">

                                <div class = "col-lg-4">

                                        <div class ="form-group">

                                            <input name="fathersurnameInput" class = "form-control" placeholder = "Surname"/>

                                        </div>

                                </div>
                                <div class = "col-lg-4">

                                        <div class ="form-group">

                                            <input name="fatherfirstnameInput" class = "form-control" placeholder = "Firstname"/>

                                        </div>

                                </div>
                                <div class = "col-lg-3">

                                        <div class ="form-group">

                                            <input name="fathermiddlenameInput" class = "form-control" placeholder = "Middle"/>

                                        </div>

                                </div>
                            </div>

                            <div class = "row">

                                <div class="col-lg-10">
                                    <label>Occupation</label>
                                    <input name="fatheroccupationInput" class="form-control" placeholder = "Occupation"/>
                                </div>


                            </div>
                            </br>

                            <div class = "row">

                                <div class="col-lg-5">
                                    <label>Office number</label>
                                    <input name="fatherofficenumberInput" class="form-control" placeholder = "Office number"/>
                                </div>
                                <div class="col-lg-5">
                                    <label>Mobile number</label>
                                    <input name="fathermobilenumberInput" class="form-control" placeholder = "Mobile number"/>
                                </div>
                            </div>
                        </div>
                        <div class ="col-lg-6">
                            <h3>Mother</h3>
                            <label>Name</label>
                            <div class="row">

                                <div class = "col-lg-4">
                                        <div class ="form-group">

                                            <input name="mothersurnameInput" class = "form-control" placeholder = "Surname"/>

                                        </div>
                                </div>
                                <div class = "col-lg-4">
                                        <div class ="form-group">

                                            <input name="motherfirstnameInput" class = "form-control" placeholder = "Firstname"/>

                                        </div>
                                </div>
                                <div class = "col-lg-3">
                                        <div class ="form-group">

                                            <input name="mothermiddlenameInput" class = "form-control" placeholder = "Middle"/>

                                        </div>
                                </div>
                            </div>
                            <div class = "row">

                                <div class="col-lg-10">
                                    <label>Occupation</label>
                                    <input name="motheroccupationInput" class="form-control" placeholder = "Occupation"/>
                                </div>
                            </div>
                            </br>
                            <div class = "row">

                                <div class="col-lg-5">
                                    <label>Office number</label>
                                    <input name="motherofficenumberInput" class="form-control" placeholder = "Office number"/>
                                </div>
                                <div class="col-lg-5">
                                    <label>Mobile number</label>
                                    <input name="mothermobilenumberInput" class="form-control" placeholder = "Mobile number"/>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-md-12">
                                <br>
                                <hr>

                                <div class = "row">

                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">

                                        <h3>Register a student account</h3>
                                        <br>
                                        <label>Email </label>
                                        <input class="form-control" name="username" type="email" placeholder = "e.g: montesorry@gmail.com" required/>
                                        <label>Password </label>
                                        <input class="form-control" type="password" name="password" placeholder = "password " required/>

                                    </div>
                                    <div class="col-lg-4">

                                    </div>



                                </div>
                            </div>
<br>
                            <hr>
                            <button class = "center-block btn btn-default btn-lg" data-toggle = "modal" data-target = "#myModal">
                                Submit
                            </button>


                        </div>
                    </div>

            </div>

        </div>
    </div>

    </div>
    <hr>

<!-- end of form -->


</div>

</form>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    mysqli_query($sql,"INSERT INTO requirements () VALUES();");
    $last_id = mysqli_insert_id($sql);

    $concataddress = $_POST['streetInput']. " " .$_POST['barangayInput']."".$_POST['cityInput']." ". $_POST['provinceInput'];
    $str_student = "VALUES ('".$_POST['firstnameInput']."','".$_POST['middlenameInput']."','".$_POST['surnameInput']."',
                        0,'".$concataddress."','". $_POST['birthdateInput']."','".$_POST['birthplaceInput']."',
                        '".$_POST['prevschoolInput']."','".$_POST['prevschooladdressInput']."','".$_POST['others']."',".$last_id." , NULL,'def.png',NULL);";

    mysqli_query($sql,
        "INSERT INTO wmcdb.student (fname,mname,lname,active,address,birthday,birthplace,LastSchool,LastSchoolAddress,Others,requirementid,grade_level_id,img_directory,lrn)
                        ".$str_student
    );

    echo $last_id;
    $last_id = mysqli_insert_id($sql);

    echo $last_id;

    mysqli_query($sql,"
                        INSERT INTO wmcdb.guardian_info (student_studentid,father_fname,father_lname,father_mname,father_occu,father_office,father_mobile,
                        mother_fname,mother_lname,mother_mname,mother_occu,mother_office,mother_mobile
                        ) VALUES (
                        ".$last_id.", 
                        '{$_POST['fatherfirstnameInput']}' ,'{$_POST['fathersurnameInput']}','{$_POST['fathermiddlenameInput']}',
                        '{$_POST['fatheroccupationInput']}','{$_POST['fatherofficenumberInput']}','{$_POST['fathermobilenumberInput']}',
                        '{$_POST['motherfirstnameInput']}','{$_POST['mothersurnameInput']}','{$_POST['mothermiddlenameInput']}',
                        '{$_POST['motheroccupationInput']}','{$_POST['motherofficenumberInput']}','{$_POST['mothermobilenumberInput']}'
                        );
                        ");

    mysqli_query($sql,"INSERT INTO wmcdb.users (userid, usertype,username,password,active)
                        VALUES (".$last_id.",'student','{$_POST['username']}','{$_POST['password']}',0);
                        ");

    mkdir("../Registrar/uploads/".$last_id,0777);
    chmod("../Registrar/uploads/".$last_id,0777);
}
?>
<script>
    function othersYes() {
        document.getElementById('others').disabled = false;
    }
    function othersNo() {
        document.getElementById('others').disabled = true;
    }
</script>