<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user Actually clicked login button
if(isset($_POST)) {

	$sql = "SELECT * FROM worktype WHERE state_id='$_POST[id_worktype]'";
	$result = $conn->query($sql);

	//if user table has this this login details
	if($result->num_rows > 0) {
		//output data
		while($row = $result->fetch_assoc()) {

			echo '<option value="'.$row["workname"].'" data-id="'.$row["id_worktype"].'">'.$row["workname"].'</option>';

			}

	}
 	//Close database connection. Not compulsory but good practice.
 	$conn->close();

}
