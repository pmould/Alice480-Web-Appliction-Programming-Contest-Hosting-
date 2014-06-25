<?php

session_start();

		$_SESSION['Perm_Create_Group'] = 0;
		$_SESSION['Perm_Read_Group'] = 0;
		$_SESSION['Perm_Update_Group'] = 0;
		$_SESSION['Perm_Delete_Group'] = 0;
		
		$_SESSION['Perm_Create_Contest'] = 0;
		$_SESSION['Perm_Read_Contest'] = 0;
		$_SESSION['Perm_Update_Contest'] = 0;
		$_SESSION['Perm_Delete_Contest'] = 0;
		$_SESSION['Perm_Approve_Contest'] = 0;
		
		$_SESSION['Perm_Create_Entry'] = 0;
		$_SESSION['Perm_Read_Entry'] = 0;
		$_SESSION['Perm_Update_Entry'] = 0;
		$_SESSION['Perm_Delete_Entry'] = 0;
		
		$_SESSION['Perm_Create_Grade'] = 0;
		$_SESSION['Perm_Read_Grade'] = 0;
		$_SESSION['Perm_Update_Grade'] = 0;
		$_SESSION['Perm_Delete_Grade'] = 0;
		




if (isset($_POST['user']) && isset($_POST['password']))
{

	//if the user has just tried to log in
	$userid = strtolower($_POST['user']);
	$password = $_POST['password'];
	
	$con=mysqli_connect("alice480.cs.mercer.edu","ContestDBUser","ContestUser","ContestDB");
		// Check connection
		if (mysqli_connect_errno($con))
		{
			//echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else {
			//echo "Connection successful.<br />";
		}
		
	
	
	
		$value200 = mysqli_query($con, "SELECT * FROM UserTable WHERE User_ID='$userid' " );
		if (!$value200) {
			die('Invalid query: ' . mysql_error());
		
		}
	
		else {
		
			while($row200 = mysqli_fetch_array($value200))
			{
				$User_ID_DB=$row200['User_ID'];
			//	echo '<br />';
				$User_PW_DB=$row200['User_PW'];
			}
		}
		
		if ($User_ID_DB != $userid)
		{
		
			header("Location: register.php");
			echo $User_ID_DB;
			echo 'Username does not exist.  Retry.';
		}
		
		else if ($User_PW_DB != $password)
		{
		
			header("Location: login.php");
			echo $User_PW_DB;
			echo 'Username and Password do not match.  Retry.';
		}
		
	else{
		
	
	
	
	
		$value = mysqli_query($con, "SELECT * FROM UserPerm WHERE User_ID='$userid' " );
	
	
			if (!$value) {
					die('Invalid query: ' . mysql_error());
			}
	
		while($row = mysqli_fetch_array($value))  {
				//echo $row['Perm_Create_Contest'];
		
			
				if ($row['Perm_Create_Group'] == 1) {
					$_SESSION['Perm_Create_Group'] = $row['Perm_Create_Group'];
				}
		
				if ($row['Perm_Read_Group'] == 1) {
					$_SESSION['Perm_Read_Group'] = $row['Perm_Read_Group'];
				}
		
				if ($row['Perm_Delete_Group'] == 1) {
					$_SESSION['Perm_Delete_Group'] = $row['Perm_Delete_Group'];
				}
		
				if ($row['Perm_Update_Group'] == 1) {
					$_SESSION['Perm_Update_Group'] = $row['Perm_Update_Group'];
				}
		
				if ($row['Perm_Create_Contest'] == 1) {
					$_SESSION['Perm_Create_Contest'] = $row['Perm_Create_Contest'];
				}
		
				if ($row['Perm_Read_Contest'] == 1) {
					echo "In read contest";
					$_SESSION['Perm_Read_Contest'] = $row['Perm_Read_Contest'];
				}
		
				if ($row['Perm_Delete_Contest'] == 1) {
					$_SESSION['Perm_Delete_Contest'] = $row['Perm_Delete_Contest'];
				}
		
				if ($row['Perm_Update_Contest'] == 1) {
					$_SESSION['Perm_Update_Contest'] = $row['Perm_Update_Contest'];
				}	
		
				if ($row['Perm_Approve_Contest'] == 1) {
					$_SESSION['Perm_Approve_Contest'] = $row['Perm_Approve_Contest'];
				}
		
				if ($row['Perm_Read_Entry'] == 1) {
					$_SESSION['Perm_Read_Entry'] = $row['Perm_Read_Entry'];
				}
		
				if ($row['Perm_Delete_Entry'] == 1) {
					$_SESSION['Perm_Delete_Entry'] = $row['Perm_Delete_Entry'];
				}
		
				if ($row['Perm_Update_Entry'] == 1) {
					$_SESSION['Perm_Update_Entry'] = $row['Perm_Update_Entry'];
				}
		
				if ($row['Perm_Create_Entry'] == 1) {
					$_SESSION['Perm_Create_Entry'] = $row['Perm_Create_Entry'];
				}
		
				if ($row['Perm_Read_Grade'] == 1) {
					$_SESSION['Perm_Read_Grade'] = $row['Perm_Read_Grade'];
				}
		
				if ($row['Perm_Delete_Grade'] == 1) {
					$_SESSION['Perm_Delete_Grade'] = $row['Perm_Delete_Grade'];
				}
		
				if ($row['Perm_Update_Grade'] == 1) {
					$_SESSION['Perm_Update_Grade'] = $row['Perm_Update_Grade'];
				}

				if ($row['Perm_Update_Grade'] == 1) {
					$_SESSION['Perm_Update_Grade'] = $row['Perm_Update_Grade'];
				}	
		} // end while loop
		
		
		
				
		
			//if they are in the database register the user id
			$_SESSION['valid_user'] = $userid;
			$_SESSION['password'] = $password;
	
	
			echo $_SESSION['password'];
	
	
	
	
			header("Location: index.php");
	
	}
	
}

?>