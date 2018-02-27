<?php
    include 'registrar_funcs.php';
    $students = get_students();

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


        <?php include 'registrar_navbar.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
              
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <form role="form">

             
          <h1 class="page-header">Manage Requirements</h1>
            
            
            <h3>Student</h3>
            <label>Name</label>
            <div class="row">
                <div class="col-md-8"><form class="">
                    <input type="text" class="form-control" placeholder="Name of the student..">
                        </form>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-md btn-info">Search</button>
                </div>
            </div>
            
            <table class= "table table-hover">
                <thead>
                    <tr>
              
                        <td><b>Name of Student</b></td>
                        <td><b>Admission Start</b></td>
                        <td><b>Admission Status</b></td>
                        <td><b>Requirement Status</b></td>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($students as $student){?>
                    <tr>
                        <form action="ManageRequirements2.php" method="GET">
                            <td>
                                <a href ="javascript:;" onclick="document.getElementById('button<?php echo $student['studentid'];?>').click()">
                                    <?php echo $student['fname']." ".$student['mname']." ".$student['lname'];?>
                                </a>
                                <input type="hidden" name="id" value="<?php echo $student['studentid'];?>">
                            </td>
                            <td>
                                <?php echo $student['date_admitted']?>
                            </td>

                            <td>
                                <?php
                                if($student['admission_status'] == 1){
                                    echo "<b style='color: forestgreen'>Approved</b> on ".$student['date_concluded'];
                                }
                                else if($student['admission_status'] == -1){

                                    echo "<b style='color: red'>Rejected</b> on ".$student['date_concluded'];
                                }
                                else{
                                    echo "<b style='color: dimgray'>Pending</b>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if (checkRequirement($student)!=""){ echo checkRequirement($student);}
                                else{ echo checkRequirement($student);}

                                ;?>
                            </td>
                            <button type="submit" id="button<?php echo $student['studentid'];?>" style="display: none;">
                        </form>
                    </tr>
                <?php }?>

                </tbody>
              </table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
        </div>

                    
                    

                    </div>

                        </form>

                      

                    </div>
                </div>
                <!-- /.row -->

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
