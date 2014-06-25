<?php

$con=mysqli_connect("alice480.cs.mercer.edu","ContestDBUser","ContestUser","ContestDB");
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else {
	echo "Connection successful.";
}
$tipper=$_POST[Group_ID];



if(isset($_POST[DEL])){
	foreach($_POST[user] as $value) {
		echo $value;
		$sql = "DELETE FROM `ContestDB`.`UGTable` WHERE `UGTable`.`User_ID` = '$value' AND `UGTable`.`Group_ID` = '$tipper'";
		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		echo "record deleted";
	}
	
	header("Location: groupmanagement.php?choice=$tipper");
}



if(isset($_POST[ADD])) {
	if($_POST[UserId1]!=""){
		$sql="INSERT INTO UGTable (User_ID, Group_ID)
		VALUES
		('$_POST[UserId1]','$tipper' )";

		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		echo "record added";
	}
	
	if($_POST[UserId2]!=""){
		$sql="INSERT INTO UGTable (User_ID, Group_ID)
		VALUES
		('$_POST[UserId2]','$tipper' )";

		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		echo "record added";
	}
	
	if($_POST[UserId3]!=""){
		$sql="INSERT INTO UGTable (User_ID, Group_ID)
		VALUES
		('$_POST[UserId3]','$tipper' )";

		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		echo "1 record added";
	}
	
	header("Location: groupmanagement.php?choice=$tipper");
}

mysqli_close($con);

?> 