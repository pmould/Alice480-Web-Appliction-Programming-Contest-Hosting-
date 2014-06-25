<?php

$user= strtolower($_POST['user']);
$sponsor=$_POST['sponsor'];

//echo $_POST['hideShip'];

//echo $sponsor;

function valid_user($user) {

	
	//check an email address is possibly valid
	if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $user)) {
		return true;
	} 
	else {
		return false;
	}
}



function sponsor_check($sponsor)  {


		$con=mysqli_connect("alice480.cs.mercer.edu","ContestDBUser","ContestUser","ContestDB");
		// Check connection
		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else {
			echo "Connection successful.<br />";
		}

		//echo $sponsor;
	
		$value = mysqli_query($con, "SELECT User_IdentCode FROM UserTable WHERE User_IdentCode=$sponsor LIMIT 1" );
	
	
	while($row = mysqli_fetch_array($value))
	{
		//echo $row['User_IdentCode'];
		$value2 = $row['User_IdentCode'];
		//echo "<br>";
		//echo $value2;
	
	}

	if ($value2 != NULL)
	{
		return true;
	}

	else {
		return false;
	}
	
}


// End of functions



$con=mysqli_connect("alice480.cs.mercer.edu","ContestDBUser","ContestUser","ContestDB");
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else {
	echo "Connection successful.<br />";
}

//$value = mysql_query($con, "SELECT User_IdentCode FROM `UserTable` WHERE User_IdentCode=$sponsor LIMIT 1 ");
//$value = mysql_query($con,"SELECT User_IdentCode FROM UserTable WHERE User_IdentCode = $sponsor");
//$value = mysql_one_data("SELECT User_IdentCode FROM UserTable WHERE User_IdentCode='4531' LIMIT 1 ");





try {

	if (!valid_user($user)) {
		throw new Exception('That is not a valid email address.
				Please go back and try again.');
	}
	
	if ($_POST['password'] != $_POST['password2']) {
		throw new Exception('The passwords you entered do not match - 
				please go back and try again.');
	}
	
	if (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 15) {
		throw new Exception('The password you entered does not meet 
				the required length or is too long');
	}
	
	if (!sponsor_check($sponsor)) {
		throw new Exception('Sponsor is not found.  <br />Please check code and re-enter.
				<br />Please follow the link and try again.<br />');
	}
	
	
}

catch (Exception $e)  {
	echo 'Problem:'; 
	echo $e->getMessage();
	

	header("Location: register.php");
	
}
 
$sql="INSERT INTO UserTable (User_ID, User_PW, User_FN, User_LN, User_SponsorCode)
VALUES
(\"".$user."\", '$_POST[password]', '$_POST[firstname]', '$_POST[lastname]', '$_POST[sponsor]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con);

 
?> 