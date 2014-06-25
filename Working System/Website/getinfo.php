<?php

session_start();

	

		$con=mysqli_connect("alice480.cs.mercer.edu","ContestDBUser","ContestUser","ContestDB");
		// Check connection
		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else {
			echo "Connection successful.<br />";
		}


		$value = mysqli_query($con, "SELECT * FROM GroupTable" );

		
		while($row = mysqli_fetch_row($value))
		{
		
			$value10[] = $row;
			//echo $row['User_IdentCode'];
			//$value2 = $row['Group_ID'];
			//$value3 = $row['Group_Description'];
			//$value4 = $row['Perm_Create_Group'];
			//echo "<br>";
			//echo $value2;
			//echo $value3;
			//echo $value10;
		}

			echo $value10[0][0];

			echo $value10[1];
			echo $value10[2];
			echo $value10[10];			
			echo "</br>";
			echo $value10[3];
		
		
	
	$_SESSION['permissions'] = $value10;
	echo sizeof($_SESSION['permissions'][0]);
	header('Location: GroupsPerm2.php');















?>