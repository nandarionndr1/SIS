<?php

include 'academic_coordinator_funcs.php';
$staffs = get_unassigned_faculty();
$sections = get_unassigned_sections();
if(isset($_POST['sumbit'])){
    $data = array(
        'sectionid'  => $_POST['sectionid'],
        'staffid' => $_POST['staffid']);

    assign_adviser_to_section($data);
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

        <?php include 'ac_navbar.php'?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
              
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">


             
        

  
      
          <h1 class="page-header">Assign adviser</h1>
      <div id="page-wrapper">

            <div class="container-fluid">

        <div class="row">
            <form action=""  method="POST">
            <div class="col-md-4"><label for="disabledSelect">Section and Year Level</label>
                <select id="disabledSelect" name="sectionid" class="form-control">
                    <?php foreach ($sections as $section){?>
                    <option value = "<?php echo $section['sectionid'];?>">Grade <?php echo $section['grade_level']." - ".$section['section_name'];?> </option>
                    <?php } ?>
                </select>
            </div>
              <div class="col-md-4"><label for="disabledSelect">Teachers</label>
                <select id="disabledSelect" name= "staffid" class="form-control">
                    <?php foreach ($staffs as $staff){?>
                    <option value = "<?php echo $staff['staffid']?>"><?php echo $staff['fname']." ".$staff['lname']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br>
        <hr>
        <div class = "row">
            <button type="submit" name="sumbit" class="btn btn-lg btn-success pull-right"> Assign </button>
            <a href="index.php" class="btn btn-lg btn-default pull-left">  Cancel</a>
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
