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

	
	<script type="text/javascript">
	function SetData(){
		var select = document.getElementById('Group_ID_Set');
		var group_id = select.options[select.selectedIndex].value;
		document.form_filter.action = "groupmanagement.php?choice="+group_id ; 
		form_filter.submit();
	}
	</script>
	
	
	
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
		  
        </div>
        
	  
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
			
		}
		
		//Not logged in
		
		else {
			echo '	</ul>';	
			echo '<ul class="nav navbar-nav navbar-right">';
			  echo '<li><a href="register.php">Create Account</a></li>';
			  echo '<li><a href="login.php">Login</a></li>';
		}
					
	
		
		//echo '<ul class="nav navbar-nav navbar-right">';
		//echo '	<li><a href="logout.php">Log Out</a></li>';
            
        echo '</ul>';
		echo '</div>';		
		echo '</div>';
				
		
?>	  

	  
	  
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Alice Programming Contest</h1>
        <p>Welcome to Mercer University's Alice Programming Competition! This competition is hosted by the <a href="http://www.cs.mercer.edu/">Department of Computer Science</a> 
		at <a href="http://www.mercer.edu/">Mercer University</a>. We hold this competition to promote programming logic in high and middle schools. 
		</p>
	</div>	
		<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            
              <h1 id="tables">Manage Group Permissions</h1>
			  
			  
          
            <div class="bs-example table-responsive"> 
			
			<!-------------------------------------------------------------------------------------------------------------SECURITY RISK Exposes DB PW----->
				<form method='post' name='form_filter' onsubmit="SetData()" >			
				<?php
						$con=mysql_connect("alice480.cs.mercer.edu","ContestDBUser", "ContestUser");
						mysql_select_db("ContestDB");
	
						$sql = "SELECT `Group_ID` FROM `GroupTable`";
						$result = mysql_query($sql);
						echo "Select a Group:   ";
						echo "<select name=\"Group_ID_Set\" id=\"Group_ID_Set\" onchange=\"SetData();\">";
						while ($row = mysql_fetch_array($result)) {
							echo "<option value='" . $row['Group_ID'] . "'>" . $row['Group_ID'] . "</option>";
						}
						echo "</select>";
						echo "</br>";
					mysql_close($con);
					?>
				</form>
				

				<form action="manageGroups.php" method='post' name='Form_User_Delete' >
				<?php
				
					$con=mysql_connect("alice480.cs.mercer.edu","ContestDBUser", "ContestUser");
					mysql_select_db("ContestDB");						
						$token = isset($_GET['choice'])? $_GET['choice'] : null;
						$sql2 = "SELECT `User_ID` FROM `UGTable` WHERE `Group_ID` = '$token'";
						$result2 = mysql_query($sql2);
						$i=0;
						echo "</br>";
						echo "Showing Users For ".$token;
						echo "</br>";
						echo "</br>";
						while ($row2 = mysql_fetch_array($result2)) {
							echo "<input type=\"checkbox\" name= \"user[".$i."]\" id= \"user[".$i."]\" value=".$row2[User_ID].">". "  ".$row2[User_ID];							
							echo "</br>";
							$i=$i+1;
						}
						echo "<input type=\"hidden\" name=\"Group_ID\" value=".$token.">";
					mysql_close($con);
					
				?>
				</br>
				<button class="btn btn-lg btn-primary btn-block btn-warning" type="submit" name='DEL'>Delete Users</button>
				</br>
				</br>
				</br>
				</form>

				<form action="manageGroups.php" method='post' name='Form_User_Add' >
				<?php
				
					$con=mysql_connect("alice480.cs.mercer.edu","ContestDBUser", "ContestUser");
					mysql_select_db("ContestDB");						
						$sql3 = "SELECT `User_ID` FROM `UGTable` WHERE `Group_ID` = '$token'";
						$result3 = mysql_query($sql3);
						$i=0;
						echo "</br>";
						echo "Add User To ".$token;
						echo "</br>";
						echo "</br>";
						
						echo "<input type=\"text\" class=\"form-control\" name=\"UserId1\" placeholder=\"User ID 1\" required>";
						echo "<input type=\"text\" class=\"form-control\" name=\"UserId2\" placeholder=\"User ID 2\">";						
						echo "<input type=\"text\" class=\"form-control\" name=\"UserId3\" placeholder=\"User ID 3\">";
						echo "<input type=\"hidden\" name=\"Group_ID\" value=".$token.">";				
					mysql_close($con);
					
				?>
				</br>
				<button class="btn btn-lg btn-primary btn-block btn-warning" type="submit" name='ADD'>Add Users</button>
				
				</form>


				
			
				
			<!-------------------------------------------------------------------------------------------------------------SECURITY RISK Exposes DB PW----->			
			
			
            </div><!-- /example -->
          </div>
        </div>
      </div>

      </div>

     <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
