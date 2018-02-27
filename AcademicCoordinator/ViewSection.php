<?php
    include 'academic_coordinator_funcs.php';
    $sections = get_all_sections();

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
            <a class="navbar-brand" href="index.php">WMC-Academic Coordinator</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li><a href="C:\Users\Lance\Desktop\PROTOTYPE\Homepage\index.html">Logout</a></li>
            </ul>

        </div>

        <!-- Top Menu Items -->

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <?php include 'ac_navbar.php'; ?>
        <!-- /.navbar-collapse -->

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h1 class="page-header">Choose Section Grade Level</h1>
                        <div id="page-wrapper" style="min-height: 600px">
                            <div class="container">
                                <div class="row">
                                    <form method="GET" action="ViewSectionDet.php">
                                        <label for="disabledSelect">Grade Level and Section</label>
                                        <select id="disabledSelect"  name="sectionid" style="width: 25%" class="form-control">
                                            <?php foreach ($sections as $section) {?>
                                            <option value = "<?php echo $section['sectionid'];?>">Grade <?php echo $section['grade_level']." - ".$section['section_name'];?></option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                        <button type = "submit" class = "btn btn-info btn-lg">Proceed to List</button>
                                    </form>
                                </div>
                                <br>


                            </div>
                        </div>
                    </center>
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
