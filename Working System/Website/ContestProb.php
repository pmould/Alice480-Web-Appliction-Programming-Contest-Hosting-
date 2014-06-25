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



<script type="text/javascript">
	function BuildFormFields($amount)
	{
		var	$container = document.getElementById('FormFields'),
			$item, $field, $i;
		    $container.innerHTML = '';
		for ($i = 0; $i < $amount; $i++) {
			$item = document.createElement('div');
			$item.style.marginLeft = "auto";
			$item.style.marginRight="auto";					
			$item.style.width="400px";	
			$item.style.position="relative";
			$item.style.textAlign="left";		
			$br = document.createElement("br");
						
		
			$field = document.createElement('label');
			$field.innerHTML = 'Problem Title:';

			$item.appendChild($field);

			$field = document.createElement('input');
			$field.name = 'ProbTitle[' + $i + ']';
			$field.type = 'text';
			$field.style.verticalAlign = "middle";
			$field.style.width="200px";
			$item.appendChild($field);
			$item.appendChild($br);
			
			$field = document.createElement('label');
			$field.innerHTML = 'Problem Description:';
			$field.style.marginRight = '76px';
			$item.appendChild($field);
			$item.appendChild($br);
			
			$field = document.createElement('textarea');
			$field.name = 'ProbDesc[' + $i + ']';
			$field.style.width="400px";
			$field.style.height="70px";
			$item.appendChild($field);
			$item.appendChild($br);
		
			$container.appendChild($item);
		}
	}

</script>


	
	
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

<body onload="BuildFormFields(parseInt(1, 10));">

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
            
              <h1 id="tables">Contest Creation</h1>
          
            <div class="bs-example table-responsive"> 
<!---------------------------------------------------------------->
<form name="contest_form_ContP" class="contest_form" action="ContestCPInsert2.php" method="post">
		<div class="ContestForm" >
			<h4>
			How Many Problems? <select class="contest_select" name= "noOfProbs" onchange="BuildFormFields(parseInt(this.value, 10));" ><br>
							<option value=1>1</option>
							<option value=2>2</option>
							<option value=3>3</option>
							<option value=4>4</option>
							<option value=5>5</option>
							<option value=6>6</option>
							<option value=7>7</option>
							<option value=8>8</option>
							<option value=9>9</option>
							<option value=10>10</option>
							<option value=11>11</option>
							<option value=12>12</option>
							<option value=13>13</option>
							<option value=14>14</option>
							<option value=15>15</option>
							<option value=16>16</option>
							<option value=17>17</option>
							<option value=18>18</option>
							<option value=19>19</option>
							<option value=20>20</option>								
						</select>
			<div id="FormFields" ></div>
			<p></p>
			<button class="btn btn-lg btn-primary btn-block btn-warning" type="submit">Next</button>		
			</h4>
        </form>
		
<!----------------------------------------------------------------------------->		
            
			
		
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
