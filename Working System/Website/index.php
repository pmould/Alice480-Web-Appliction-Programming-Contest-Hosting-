<?php
	session_start();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Alice Contest</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap2.css" rel="stylesheet">



    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	
  </head>

  <body>
      <div class="container">

			<!-- Static navbar -->
			<div class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="http://www.mercer.edu"><img src="../Images/MUBear.png" height="50"/></a>		  
				</div> <!--end "navbar-header div> -->
		
		
		
				<!-- This is for the permission -->
<?php	
					echo '<div class="navbar-collapse collapse">';
						echo '<ul class="nav navbar-nav">';
						echo '<a class="navbar-brand" href="index.php">Home</a>';
						echo '<li><a href="about.php">About Us</a></li>';

							if (($_SESSION['valid_user'] != "") && ($_SESSION['password'] != ""))
							{
			
								// Create Contest
								if ($_SESSION['Perm_Read_Contest'] == 1 && ($_SESSION['Perm_Create_Contest'] == 1 || $_SESSION['Perm_Update_Contest'] == 1 || $_SESSION['Perm_Delete_Contest'] == 1))
								{
									echo '		<li><a href="contests.php">Manage Contest</a></li>';
								}
			
								// Standard User Login - Default Login
								if ($_SESSION['Perm_Read_Contest'] == 1 )
								{
									echo '		<li><a href="">My Contest</a></li>';

								}
			
								if ($_SESSION['Perm_Read_Group'] == 1) {
			
									echo '		<li><a href="groups.php">Manage Groups</a></li>';
			
								}
							
			
								echo '	</ul>';	
						
								echo '<ul class="nav navbar-nav navbar-right">';
								echo '	<li><a href="logout.php">Log Out</a></li>';	
								echo '</ul>';
							}
		
		
							//Not logged in
		
							else {
								echo '	</ul>';	
								echo '<ul class="nav navbar-nav navbar-right">';
								echo '<li><a href="register.php">Create Account</a></li>';
								echo '<li><a href="login.php">Login</a></li>';
							}
		
						//echo '</ul>';  // end the ul nav nav-bar-right
						echo '</div>';  // end navbar navbar-default		
						echo '</div>';  // 
				
		
?>	
		
		


	  
	  
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Alice Programming Contest</h1>
        <p>Welcome to Mercer University's Alice Programming Competition! This competition is hosted by the <a href="http://www.cs.mercer.edu/">Department of Computer Science</a> 
		at <a href="http://www.mercer.edu/">Mercer University</a>. We hold this competition to promote programming logic in high and middle schools. 
		</p>
	  </div>	
	
<?php
                   
	
		$con=mysqli_connect("alice480.cs.mercer.edu","ContestDBUser","ContestUser","ContestDB");
		// Check connection
			if (mysqli_connect_errno($con))
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			else {
				//echo "Connection successful.<br />";
			}
	
	
	
		
	$NewDate=date('Y-m-d h:m:s', strtotime("+7 days"));
	$NewDate2=date('Y-m-d h:m:s', strtotime("-7 days"));
	$NewDate3=date('Y-m-d h:m:s');	
		
		
	
	$result = mysqli_query($con,"SELECT Contest_Title, Contest_Start, Contest_End FROM ContestTable WHERE Contest_Start > '$NewDate'");	
		
		echo "<div class=\"bs-docs-section\">
				<div class=\"row\">
					<div class=\"col-lg-12\">
            
						<h1 id=\"tables\">Upcoming Contests</h1>
          		
						<div class=\"bs-example table-responsive\"> 
							<table class=\"table table-bordered\">
								<thead>
									<tr class=\"warning\">
                    					<th>Contest Name</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Scoreboard</th>
									</tr>
								</thead>
		
								<tbody>";  

										if(mysqli_num_rows($result) > 0) {
											
										  while($row = mysqli_fetch_array($result))
										  {
											echo "<tr>";
											echo "<td>" . $row['Contest_Title'] . "</td>";
											echo "<td>" . $row['Contest_Start'] . "</td>";
											echo "<td>" . $row['Contest_End'] . "</td>";
											echo "<td><a href=\"\">Scoreboard</a></td>";
											echo "</tr>";
										  }
										}
										else {
											echo "<tr>";
												echo "<td></td>";
												echo "<td><h4>No Upcoming Contests</h4></td>";
												echo "<td></td>";
												echo "<td></td>";
											echo "</tr>";
										}
									
								echo "</tbody>";
							echo "</table>";
						echo "</div>"; // Close the bs-example table responsive div
						
				
$result2 = mysqli_query($con,"SELECT Contest_Title, Contest_Start, Contest_End FROM ContestTable WHERE Contest_Start BETWEEN '$NewDate2' AND '$NewDate'");
						/////////////////////////////////////////////////////////////////////////
							
						echo "<h1 id=\"tables\">Current Contests</h1>";
						
						echo "<div class=\"bs-example table-responsive\"> 
							<table class=\"table table-bordered\">
								<thead>
									<tr class=\"warning\">
										<th>Contest Name</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Scoreboard</th>
									</tr>
								</thead>
								
								<tbody>";    
								if(mysqli_num_rows($result2) > 0) {
											
									while($row2 = mysqli_fetch_array($result2))
									{
										echo "<tr>";
										echo "<td>" . $row2['Contest_Title'] . "</td>";
										echo "<td>" . $row2['Contest_Start'] . "</td>";
										echo "<td>" . $row2['Contest_End'] . "</td>";
										echo "<td><a href=\"\">Scoreboard</a></td>";
										echo "</tr>";
									}
								}
								
								else {
											echo "<tr>";
											echo "<td></td>";
												echo "<td><h4>No Upcoming Contests</h4></td>";
												echo "<td></td>";
												echo "<td></td>";
											echo "</tr>";
								}
								
							echo "</tbody>";
						echo "</table>";
					echo "</div>";  //closes bs-example table-responsive
						

$result3 = mysqli_query($con,"SELECT Contest_Title, Contest_Start, Contest_End FROM ContestTable WHERE Contest_Start < '$NewDate2'");
						
						echo "<h1 id=\"tables\">Previous Contests</h1>
          		
						<div class=\"bs-example table-responsive\"> 
							<table class=\"table table-bordered\">
								<thead>
									<tr class=\"warning\">
                    					<th>Contest Name</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Scoreboard</th>
									</tr>
								</thead>
		
								<tbody>";   
								
								if(mysqli_num_rows($result3) > 0) {
											
										while($row3 = mysqli_fetch_array($result3))
										{
											echo "<tr>";
											echo "<td>" . $row3['Contest_Title'] . "</td>";
											echo "<td>" . $row3['Contest_Start'] . "</td>";
											echo "<td>" . $row3['Contest_End'] . "</td>";
											echo "<td><a href=\"\">Scoreboard</a></td>";
											echo "</tr>";
										}
										
								}
								
								else {
											echo "<tr>";
												echo "<td></td>";
												echo "<td><h4>No Upcoming Contests</h4></td>";
												echo "<td></td>";
												echo "<td></td>";
											echo "</tr>";
								}
									
								echo "</tbody>";
							echo "</table>";
						echo "</div>"; // Close the bs-example table responsive div
						
						
					echo "</div>";  // Close the class col-lg-12 div
					
				echo "</div>"; // Close row div
			  echo "</div>";  // close bs-docs section div
			//echo "</div>";
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////	
	
	
?>

    </div>     <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>