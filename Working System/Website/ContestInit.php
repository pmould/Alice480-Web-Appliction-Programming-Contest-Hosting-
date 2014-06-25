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

<script language="JavaScript" src="dist/js/ts_picker.js">
</script>

<script type="text/javascript">
$(function() {
    // Get all textareas that have a "maxlength" property.
    $("textarea[maxlength]").each(function() {

        // Store the jQuery object to be more efficient...
        var $textarea = $(this);

        // Store the maxlength and value of the field
        var maxlength = $textarea.attr("maxlength");

        // Add a DIV to display remaining characters to user
        $textarea.after($("<div>").addClass("charsRemaining"));

        // Bind the trimming behavior to the "keyup" & "blur" events (to handle mouse-based paste)
        $textarea.on("keyup blur", function(event) {
            // Fix OS-specific line-returns to do an accurate count
            var val = $textarea.val().replace(/\r\n|\r|\n/g, "\r\n").slice(0, maxlength);
            $textarea.val(val);
            // Display updated count to user
            $textarea.next(".charsRemaining").html(maxlength - val.length + " characters remaining");
        }).trigger("blur");

    });
});
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
            
              <h1 id="tables">Contest Creation</h1>
          
            <div class="bs-example table-responsive"> 
<!---------------------------------------------------------------->
<form name="contest_form_Cont" class="contest_form" action="ContestCPInsert.php" method="post">
            	<label class="contest_label">Contest Title:<input class="contest_input" name="ContestTitle" type="text" id="ContestTitle" maxlength="45"></label></br>
                <label class="contest_label">Contest Description:<textarea name="ContestDescription" cols="48" rows="4" id="ContestDesc" label="Contest Description" maxlength="2500"></textarea></label> 
                &nbsp;</br>
                
                <label class="contest_label">Start Date: <input class="contest_input" name="StartDate" type="text" id="StartDate" value=""><a href="javascript:show_calendar('document.contest_form_Cont.StartDate', document.contest_form_Cont.StartDate.value);"><img src="Images/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"> </a></label></br>
         		<label class="contest_label">End Date: <input class="contest_input" name="EndDate" type="text" id="EndDate" value=""><a href="javascript:show_calendar('document.contest_form_Cont.EndDate', document.contest_form_Cont.EndDate.value);"><img src="Images/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a></label>  </br>
         		 





			<label class="contest_label">Max Number of Teams:    
              <select class="contest_select" name="MaxTeams">
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				
			  </select>  
            </label>     
</br>
			<label class="contest_label">Max Number of Teammates:    
              <select class="contest_select" name="MaxTeammates">
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				
			  </select>  
            </label>     
</br>			
			
			<label class="contest_label">Minimum Number of Teammates:    
              <select class="contest_select" name="MinTeammates">
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			  </select>  
            </label>     
</br>			
			
			<label class="contest_label">Max Number of Problems:    
              <select class="contest_select" name="MaxProblems">
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				
			  </select>  
            </label>     
</br>
    
                
            <label class="contest_label">Max Number of Final Submissions:    
                <select class="contest_select" name="MaxSubmissions">
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
            
				</select>  
            </label>  			
                
 </br>               
                    
			<button class="btn btn-lg btn-primary btn-block btn-warning" type="submit">Next</button>		  
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
