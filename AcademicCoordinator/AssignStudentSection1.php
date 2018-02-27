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





                <center>

                    <h1 class="page-header">Choose Grade Level For Assignment</h1>
                    <div id="page-wrapper" style="min-height: 600px">
                        <div class="container">
                            <div class="row">
                                <form method="GET" action="AssignStudentSection2.php">
                                    <label for="disabledSelect">Grade Level</label>
                                    <select id="disabledSelect"  name="grade_level" style="width: 25%" class="form-control">
                                        <option value = "1">Grade 1</option>
                                        <option value = "2">Grade 2</option>
                                        <option value = "3">Grade 3</option>
                                        <option value = "4">Grade 4</option>
                                        <option value = "5">Grade 5</option>
                                        <option value = "6">Grade 6</option>
                                        <option value = "7">Grade 7</option>
                                    </select>
                                    <br>
                                    <button type = "submit" class = "btn btn-info btn-lg">Proceed to Assignment</button>
                                </form>
                            </div>
                            <br>


                        </div>
                    </div>
                </center>
                </div>
            </div>
        </div>
        <script>
            function hideTable(){
                var wew = document.getElementById("disabledSelect").value;
                if(wew == 1){
                    document.getElementById("table").hidden = false;
                    document.getElementById("table2").hidden = true;
                    document.getElementById("recent").hidden = true;
                    document.getElementById("sec").hidden = false;
                    document.getElementById("hehe").hidden = false;

                }
                if(wew == 2){
                    document.getElementById("table").hidden = true;
                    document.getElementById("table2").hidden = false;
                    document.getElementById("recent").hidden = true;
                    document.getElementById("sec").hidden = false;
                    document.getElementById("hehe").hidden = false;
                }
                if(wew == 0){
                    document.getElementById("table").hidden = true;
                    document.getElementById("table2").hidden = true;
                    document.getElementById("recent").hidden = false;
                    document.getElementById("sec").hidden = true;
                    document.getElementById("hehe").hidden = true;
                }

            }
        </script>


        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

</body>

</html>
