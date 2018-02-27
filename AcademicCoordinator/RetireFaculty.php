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
<?php
global $dbc;
	if (isset($_GET['bid'])){

        $dbc=mysqli_connect("127.0.0.1","root","root","wmcdb");
		$query = "UPDATE faculties SET active='0' WHERE staffid='{$_GET['bid']}'";
		$result = mysqli_query($dbc,$query);

	}
?>
<style>
table, th, td {
    border: 1px solid black;
	
}
#vs{
	visibility: hidden;
}
</style>
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


             
        

  
      
          <h1 class="page-header">Retire Faculty</h1>
      <div id="page-wrapper">

            <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"><label for="disabledSelect">Faculties</label>
			<form>
                    <table style="width:100%">
						<tr>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Action</th>
						</tr>
					<?php

                    $dbc=mysqli_connect("127.0.0.1","root","root","wmcdb");

                    $query = "select * from faculties f JOIN users u on f.staffid = u.userid where u.userType = 'teacher' AND f.active = 1";

					$result = mysqli_query($dbc,$query);
					$size = mysqli_num_rows($result);
					for ($i = 1; $i <= $size; $i++){
						echo "<tr>";
						$faculties = mysqli_fetch_array($result,MYSQLI_ASSOC);
						echo "<td>{$faculties['lname']}</td>";
						echo "<td>{$faculties['fname']}</td>";
						echo "<td><a href='RetireFaculty.php?&bid=".$faculties['staffid']."'>Retire</a></td>";
						echo "</tr>";
					}
					?>
					</table>
			</form>
            </div>
        </div>
        <br>
                
        <hr></hr>
                
                <div class = "row">
          <div class = "col-sm-6">
          
         
         
                     <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
                       aria-labelledby = "myModalLabel" aria-hidden = "true">
                       
                       <div class = "modal-dialog">
                          <div class = "modal-content">
                             
                             <div class = "modal-header">
                                <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                                   ×
                                </button>
                                
                                <h4 class = "modal-title" id = "myModalLabel">
                                   Class List<br>
                                   
                                </h4>
                             </div>
                              <div class = "modal-body">
                                Generate Class List?
                             </div>
                             
                            
                             
                             <div class = "modal-footer">
                                
                                   <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                                   No, but save
                                </button>
                                
                              <a href = "ViewClassList.html" class = "btn btn-default">Proceed</a>


                             </div>
                             
                          </div>
                       </div>
          
        </div>


        
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
      
      

      
      
                          
    </div>
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
