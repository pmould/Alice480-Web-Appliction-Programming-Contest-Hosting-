<?php

session_start();

?>


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

 $tipper=$_POST[ContestTitle];
 echo $tipper;
 
$sql="INSERT INTO ContestTable (Contest_Title,Contest_Description,Contest_Start,Contest_End,Contest_Team_Max,Contest_Teammates_Max,Contest_Teammates_Min,Contest_QuestionCount,Contest_SubmissionCount_Max)
VALUES
(\"$_POST[ContestTitle]\", \"$_POST[ContestDescription]\", '$_POST[StartDate]', '$_POST[EndDate]', '$_POST[MaxTeams]', '$_POST[MaxTeammates]', '$_POST[MinTeammates]', '$_POST[MaxProblems]', '$_POST[MaxSubmissions]')";


if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_free_result($sql);


$sql = mysqli_query($con, "SELECT Contest_ID FROM ContestTable WHERE Contest_Title='$tipper' " );
echo 'past the query';

while($conId = mysqli_fetch_array($sql)) {
	echo 'In the while loop';
	$_SESSION['contestID'] = $conId['Contest_ID'];
}

echo $_SESSION['contestID'];

//$sql = mysqli_query($con, "SELECT Contest_ID FROM ContestTable WHERE Contest_Title='$tipper' " );

mysqli_free_result($sql);

$sql = "INSERT INTO `ContestDB`.`COTable` (`User_ID`, `Contest_ID`) VALUES (\"".$_SESSION['valid_user']."\",".$_SESSION['contestID'].")" ;
echo $sql;	


if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con);


header("Location: ContestProb.php");
//header("Location: ContestProb.php? ContestTitle=$tipper");
?> 