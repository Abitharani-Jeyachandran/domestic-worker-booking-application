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
		  $empid=$_SESSION['emplogin'];

			$eventName = $_GET['ename'];
			$eventDate = $_GET['edate'];
			$eventTime = $_GET['etime'];

			$sql= "INSERT INTO `calendar`(`name`, `date`, `time`, `empid`) VALUES ('".$eventName."','".$eventDate."','".$eventTime."','".$empid."')";

			$conn->query($sql);
}

?>
