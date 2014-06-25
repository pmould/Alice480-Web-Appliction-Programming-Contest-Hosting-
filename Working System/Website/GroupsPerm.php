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
	
		function changePermShowing()
		{
			
			var mylist=document.getElementById("drop");
			var mylist2=document.getElementById("Group_ID");
			var mylist3=document.getElementById("Group_Description");
			
			
			
			//var php_var = "<?php echo $_SESSION['permissions']; ?>";
			var array = <?php echo json_encode($_SESSION['permissions'])?>;
			
			
			var myvar = mylist.options[mylist.selectedIndex].value.toString();
			
		  for (var i = 0; i < array.length; i++)
		  {
			if ( myvar == array[i][0].toString() )
			{
					document.getElementById("Group_ID").value=myvar;
					document.getElementById("Group_Description").value=array[i][1].toString();
					//document.getElementById("favorite").value=mylist.options[mylist.selectedIndex].text;
			  
					if (array[i][2] == 1)
					{
						document.getElementById("Perm_Create_Group").checked = true;
					}
					
					else {
						document.getElementById("Perm_Create_Group").checked = false;
					}
					
					/////////////////////////////////////////////////////////////////
					if (array[i][4] == 1)
					{
						document.getElementById("Perm_Read_Group").checked = true;
					}
					
					else {
						document.getElementById("Perm_Read_Group").checked = false;
					}
					///////////////////////////////////////////////////////////////////
					if (array[i][3]== 1)
					{
						document.getElementById("Perm_Update_Group").checked = true;
					
					}
					
					else {
						document.getElementById("Perm_Update_Group").checked = false;
					}
					//////////////////////////////////////////////////////////////////
					if (array[i][5] == 1)
					{
						document.getElementById("Perm_Delete_Group").checked = true;
					}
					
					else {
					
						document.getElementById("Perm_Delete_Group").checked = false;
					}
					
					//////////////////////////////////////////////////////////////////
					if (array[i][6] == 1)
					{
						document.getElementById("Perm_Create_Contest").checked = true;
						
					}
					
					else {
					
						document.getElementById("Perm_Create_Contest").checked = false;
						
					
					}
					/////////////////////////////////////////////////////////////////////
					if (array[i][7] == 1)
					{
						document.getElementById("Perm_Read_Contest").checked = true;
						
					}
					
					else {
						document.getElementById("Perm_Read_Contest").checked = false;
					}
					/////////////////////////////////////////////////////////////////////
					
					if (array[i][8] == 1)
					{
						document.getElementById("Perm_Update_Contest").checked = true;
					}
					
					else {
						document.getElementById("Perm_Update_Contest").checked = false;
					}
					/////////////////////////////////////////////////////////////////////
					
					if (array[i][9] == 1)
					{
						document.getElementById("Perm_Delete_Contest").checked = true;
					}
					
					else {
						document.getElementById("Perm_Delete_Contest").checked = false;
					}
					////////////////////////////////////////////////////////////////////
					
					if (array[i][10] == 1)
					{
						document.getElementById("Perm_Approve_Contest").checked = true;
					}
					
					else {
						document.getElementById("Perm_Approve_Contest").checked = false;
					}
					///////////////////////////////////////////////////////////////////
					if (array[i][11] == 1)
					{
						document.getElementById("Perm_Create_Entry").checked = true;
					}
					
					else {
						document.getElementById("Perm_Create_Entry").checked = false;
					}
					
					////////////////////////////////////////////////////////////////////
					if (array[i][12] == 1)
					{
						document.getElementById("Perm_Read_Entry").checked = true;
					}
					
					else {
						document.getElementById("Perm_Read_Entry").checked = false;
					}
					////////////////////////////////////////////////////////////////////
					if (array[i][13] == 1)
					{
						document.getElementById("Perm_Update_Entry").checked = true;
					}
					else {
						document.getElementById("Perm_Update_Entry").checked = false;
					}
					
					////////////////////////////////////////////////////////////////////
					if (array[i][14] == 1)
					{
						document.getElementById("Perm_Delete_Entry").checked = true;
					}
					
					else {
						document.getElementById("Perm_Delete_Entry").checked = false;
					}
					
					//////////////////////////////////////////////////////////////////////
					if (array[i][15] == 1)
					{
						document.getElementById("Perm_Create_Grade").checked = true;
					}
					
					else {
						document.getElementById("Perm_Create_Grade").checked = false;
					}
					//////////////////////////////////////////////////////////////////////
					if (array[i][16] == 1)
					{
						document.getElementById("Perm_Read_Grade").checked = true;
					}
					
					else {
						document.getElementById("Perm_Read_Grade").checked = false;
					}
					
					///////////////////////////////////////////////////////////////////////
					if (array[i][17] == 1)
					{
						document.getElementById("Perm_Update_Grade").checked = true;
					}
					else {
						document.getElementById("Perm_Update_Grade").checked = false;
					}
					
					////////////////////////////////////////////////////////////////////////
					
					if (array[i][18] == 1)
					{
						document.getElementById("Perm_Delete_Grade").checked = true;
					}
					else {
						document.getElementById("Perm_Delete_Grade").checked = false;
					}
					
					
			}
		 }			
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
            
              <h1 id="tables">Permissions Group Creation</h1>
          
				<?php
				
					
					
				
				
				if ($_SESSION['valid_user'] == 'zeus')
				{
					
					echo "<select id=\"drop\" onchange=\"changePermShowing()\">";
						for($i = 0; $i < sizeof($_SESSION['permissions']); $i++)
							{
								
								if ($_SESSION['permissions'][$i][0] != 'GodPermSet') {
								
									echo "<option>".$_SESSION['permissions'][$i][0]."</option>";
								}				
							}
					echo "</select>";
				}
				else if ($_SESSION['Perm_Update_Group'] == 1)
				{
					echo "<form>";
					echo "<select id=\"drop\" onchange=\"changePermShowing()\">";
					
						for($i = 0; $i < sizeof($_SESSION['permissions']); $i++)
							{
								if ($_SESSION['permissions'][$i][0] != 'GodPermSet' && $_SESSION['permissions'][$i][0] != 'Administrator')  
								{
									echo "<option>".$_SESSION['permissions'][$i][0]."</option>";
								}
								
							}
							
					echo "</select>";
					echo "</form>";
				
				}
				
				else {
				
					header('Location: index.php');
					
				}
				
				
				?>
				<br />
				<br />
            <div class="bs-example table-responsive"> 
			  <form name="perm_group_form" action="PermGroupInsert.php" method="post">
				<?php
					if ($_SESSION['valid_user'] == 'zeus')
					{
						echo "<label>Group Name:</br><input name=\"Group_ID\" type=\"text\" id=\"Group_ID\" maxlength=\"30\" value=";
						
						//echo $_SESSION['permissions'][1][0];
						
						
						echo " ></label></br>";
					}
					
					else if ($_SESSION['Perm_Update_Group'] == 1)
					{
					
						echo "<label>Group Name:</br><input name=\"Group_ID\" type=\"text\" id=\"Group_ID\" maxlength=\"30\" value=";
						//echo $_SESSION['permissions'][2][0];
						echo " ></label></br>";
					
					}					
					else {
					
					echo "<label>Group Name:</br><input name=\"Group_ID\" type=\"text\" id=\"Group_ID\" maxlength=\"30\" value=";
					//echo $_SESSION['permissions'][2][0];
					echo " ></label></br>";
												
					}
				?>
				<!-- <label>Group Name:</br><input name="Group_ID" type="text" id="Group_ID" maxlength="30" value="<?php echo $_SESSION['permissions'][0][0];?>" ></label></br>-->
                <!--<label>Group Description:</br><textarea class="permDesc" name="Group_Description" cols="150" rows="10" id="Group_Description" label="Description" maxlength="2500"><?php echo $_SESSION['permissions'][0][1];?></textarea></label> 
                &nbsp;</br>-->
				
				
				<?php
					if ($_SESSION['valid_user'] == 'zeus')
					{
					
						echo "<label>Group Description:</br><textarea class=\"permDesc\" name=\"Group_Description\" cols=\"150\" rows=\"10\" id=\"Group_Description\" label=\"Description\" maxlength=\"2500\">";
						echo $_SESSION['permissions'][1][1];
						echo " </textarea></label>";
					}
					
					else if ($_SESSION['Perm_Update_Group'] == 1)
					{
					
						echo "<label>Group Description:</br><textarea class=\"permDesc\" name=\"Group_Description\" cols=\"150\" rows=\"10\" id=\"Group_Description\" label=\"Description\" maxlength=\"2500\">";
						echo $_SESSION['permissions'][2][1];
						echo " </textarea></label>";
					
					}					
					else {
					
					header('Location: index.php');
												
					}
				
				?>
				
			
			
				

			  
              <table class="table table-bordered" style="table-layout: fixed; width: 100%">
                <thead>
                  <tr class="warning">
                    <th>Set</th>
                    <th>Permission Name</th>
                    <th>Permission Description</th>					
                  </tr>
                </thead>
				
                <tbody>
                  <tr>
                    <td><input type="checkbox" name="Perm_Create_Group" id="Perm_Create_Group" value="Yes"></td>
                    <td style="word-wrap: break-word">Create Group</td>
                    <td style="word-wrap: break-word">This permission allows the user to create new sets of permissions.</td>
                  </tr>

				  <tr>
                    <td><input type="checkbox" name="Perm_Read_Group" id="Perm_Read_Group" value="Yes"></td>
                    <td style="word-wrap: break-word">Read Group</td>
                    <td style="word-wrap: break-word">This permission allows the user to read sets of permissions.</td>
                  </tr>
				  
                  <tr>
                    <td><input type="checkbox" name="Perm_Update_Group" id="Perm_Update_Group" value="Yes"></td>
                    <td style="word-wrap: break-word">Update Group</td>
                    <td style="word-wrap: break-word">This permission allows the user to update existing sets of permissions.</td>
                  </tr>				  
				  
                  <tr>
                    <td><input type="checkbox" name="Perm_Delete_Group" id="Perm_Delete_Group" value="Yes"></td>
                    <td style="word-wrap: break-word">Delete Group</td>
                    <td style="word-wrap: break-word">This permission allows the user to delete sets of permissions.</td>
                  </tr>	
<!------------------------------------------------------------------------------------------------------------------------------->				  
                   <tr class="warning"><th></th><th></th><th></th></tr>
                 <tr>
                    <td><input type="checkbox" name="Perm_Create_Contest" id="Perm_Create_Contest" value="Yes"></td>
                    <td style="word-wrap: break-word">Create Contest</td>
                    <td style="word-wrap: break-word">This permission allows the user to create new contests.</td>
                  </tr>

				  <tr>
                    <td><input type="checkbox" name="Perm_Read_Contest" id="Perm_Read_Contest" value="Yes"></td>
                    <td style="word-wrap: break-word">Read Contest</td>
                    <td style="word-wrap: break-word">This permission allows the user to view existing contests.</td>
                  </tr>
				  
                  <tr>
                    <td><input type="checkbox" name="Perm_Update_Contest" id="Perm_Update_Contest" value="Yes"></td>
                    <td style="word-wrap: break-word">Update Contest</td>
                    <td style="word-wrap: break-word">This permission allows the user to update existing contests.</td>
                  </tr>				  
				  
                  <tr>
                    <td><input type="checkbox" name="Perm_Delete_Contest" id="Perm_Delete_Contest" value="Yes"></td>
                    <td style="word-wrap: break-word">Delete Contest</td>
                    <td style="word-wrap: break-word">This permission allows the user to delete existing contests.</td>
                  </tr>	
				  
                  <tr>
                    <td><input type="checkbox" name="Perm_Approve_Contest" id="Perm_Approve_Contest" value="Yes"></td>
                    <td style="word-wrap: break-word">Approve Contest</td>
                    <td style="word-wrap: break-word">This permission allows the user to approve new contests.</td>
                  </tr>					 
<!------------------------------------------------------------------------------------------------------------------------------->				  
                    <tr class="warning"><th></th><th></th><th></th></tr>
				  <tr>
                    <td><input type="checkbox" name="Perm_Create_Entry" id="Perm_Create_Entry" value="Yes"></td>
                    <td style="word-wrap: break-word">Create Entry</td>
                    <td style="word-wrap: break-word">This permission allows the user to create a new contest entry.</td>
                  </tr>

				  <tr>
                    <td><input type="checkbox" name="Perm_Read_Entry" id="Perm_Read_Entry" value="Yes"></td>
                    <td style="word-wrap: break-word">Read Entry</td>
                    <td style="word-wrap: break-word">This permission allows the user to view a contest entry.</td>
                  </tr>
				  
                  <tr>
                    <td><input type="checkbox" name="Perm_Update_Entry" id="Perm_Update_Entry" value="Yes"></td>
                    <td style="word-wrap: break-word">Update Entry</td>
                    <td style="word-wrap: break-word">This permission allows the user to update an existing contest entry.</td>
                  </tr>				  
				  
                  <tr>
                    <td><input type="checkbox" name="Perm_Delete_Entry" id="Perm_Delete_Entry" value="Yes"></td>
                    <td style="word-wrap: break-word">Delete Entry</td>
                    <td style="word-wrap: break-word">This permission allows the user to delete an existing contest entry.</td>
                  </tr>	
<!------------------------------------------------------------------------------------------------------------------------------->		
                   <tr class="warning"><th></th><th></th><th></th></tr>		  
                  <tr>
                    <td><input type="checkbox" name="Perm_Create_Grade" id="Perm_Create_Grade" value="Yes"></td>
                    <td style="word-wrap: break-word">Create Grade</td>
                    <td style="word-wrap: break-word">This permission allows the user to create a new contest entry grade.</td>
                  </tr>

				  <tr>
                    <td><input type="checkbox" name="Perm_Read_Grade" id="Perm_Read_Grade" value="Yes"></td>
                    <td style="word-wrap: break-word">Read Grade</td>
                    <td style="word-wrap: break-word">This permission allows the user to view an existing contest entry grade.</td>
                  </tr>
				  
                  <tr>
                    <td><input type="checkbox" name="Perm_Update_Grade" id="Perm_Update_Grade" value="Yes"></td>
                    <td style="word-wrap: break-word">Update Grade</td>
                    <td style="word-wrap: break-word">This permission allows the user to update an existing contest entry grade.</td>
                  </tr>				  
				  
                  <tr>
                    <td><input type="checkbox" name="Perm_Delete_Grade" id="Perm_Delete_Grade" value="Yes"></td>
                    <td style="word-wrap: break-word">Delete Grade</td>
                    <td style="word-wrap: break-word">This permission allows the user to delete an existing contest entry grade.</td>
                  </tr>	
<!------------------------------------------------------------------------------------------------------------------------------->
                </tbody>
              </table>
			  
			  <button class="btn btn-lg btn-primary btn-block btn-warning" type="submit">Next</button>	
			  </form>

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
