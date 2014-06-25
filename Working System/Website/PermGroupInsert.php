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

 
 
$sql="INSERT INTO GroupTable (Group_ID, Group_Description, 
								Perm_Create_Group, Perm_Update_Group, Perm_Read_Group, Perm_Delete_Group, 
								Perm_Create_Contest, Perm_Update_Contest, Perm_Read_Contest, Perm_Delete_Contest, Perm_Approve_Contest,
								Perm_Create_Entry, Perm_Update_Entry, Perm_Read_Entry, Perm_Delete_Entry,
								Perm_Create_Grade, Perm_Update_Grade, Perm_Read_Grade, Perm_Delete_Grade)
VALUES
	('$_POST[Group_ID]', '$_POST[Group_Description]', 
	 '$_POST[Perm_Create_Group]', '$_POST[Perm_Update_Group]', '$_POST[Perm_Read_Group]', '$_POST[Perm_Delete_Group]',
	 '$_POST[Perm_Create_Contest]', '$_POST[Perm_Update_Contest]', '$_POST[Perm_Read_Contest]', '$_POST[Perm_Delete_Contest]', '$_POST[Perm_Delete_Contest]',
	 '$_POST[Perm_Create_Entry]', '$_POST[Perm_Update_Entry]', '$_POST[Perm_Read_Entry]', '$_POST[Perm_Delete_Entry]',
	 '$_POST[Perm_Create_Grade]', '$_POST[Perm_Update_Grade]', '$_POST[Perm_Read_Grade]', '$_POST[Perm_Delete_Grade]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con);

header("Location: index.php");
?> 