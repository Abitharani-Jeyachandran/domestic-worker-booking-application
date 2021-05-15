<?php

//Mysql Configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "findus";

//New Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);
}
