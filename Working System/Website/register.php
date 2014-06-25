
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
	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(
		function(){
	  
		$('#hideShip').click(function() {
			$('#admin2').toggle();
				
		});
	});
	  

	</script>
	
	
	

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/css/formsubmit.css" rel="stylesheet">

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
		  
        </div>
	
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

    <div class="container">

      <form class="form-submit" role="form" method="post" action="insert.php">
        <h2 class="form-submit-heading">Create an Account</h2>
        <input type="text" class="form-control" name="user"placeholder="Email address" required autofocus>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
		<input type="password" class="form-control" name="password2" placeholder="Re-enter Password" required>
		<input type="text" class="form-control" name="firstname" placeholder="First Name" required>
		<input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
		<input type="text" class="form-control" name="sponsor" placeholder="Sponsor Code">
		
        <label class="checkbox">
          <input type="checkbox" name="hideShip" id="hideShip"value="Yes"> I would like to be a Sponsor
        </label>
		
		
		<div id="admin2" style="display:none">
			<input class= "form-control"id="affiliation" type="text" name="affiliation" placeholder="Institution Affliation">
			<input class= "form-control"id="city" type="text" name="city" placeholder="City">
			<input class= "form-control"id="state" type="text" name="state" placeholder="State">
		</div>
	
        <button class="btn btn-lg btn-primary btn-block btn-warning" type="submit">Create Account</button>
      </form>

	  

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
