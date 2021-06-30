<?php
session_start();
	$serverName = "localhost";
	$userName = "root";
	$passWord = "";
	$dbName = "findus";

	function my_substr_function($str, $start, $end)    //function to return substring from start index upto end index
	{
	  return substr($str, $start, $end - $start);
	}

	$conn = mysqli_connect($serverName, $userName, $passWord, $dbName);

	if(strlen($_SESSION['emplogin'])==0)
	  {
	header('location:../emp-login.php');
	}
	else{
			$eventName = $_GET['ename'];
			$eventDate = $_GET['edate'];
			$eventTime = $_GET['etime'];

			$timeFormator = strtolower(my_substr_function($eventTime, strlen($eventTime)-2, strlen($eventTime)));  //get last 2 characters from string i.r am/pm, convert to lowercase
			$newTime = my_substr_function($eventTime, 0, strlen($eventTime)-3);									   //get time from string i.e (string - last 2 characters)

			if($timeFormator=="pm"){
				//i.e PM - add +12 to get in 24 hr format
				$newTime += 12;
			}

			$sql= "INSERT INTO `calendar`(`name`, `date`, `time`) VALUES ('".$eventName."','".$eventDate."','".$newTime."')";

			$conn->query($sql);
}

?>
