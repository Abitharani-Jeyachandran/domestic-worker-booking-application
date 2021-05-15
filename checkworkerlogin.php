<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user Actually clicked login button
if(isset($_POST)) {

	//Escape Special Characters in String
	$worker_username = mysqli_real_escape_string($conn, $_POST['worker_username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	//sql query to check company login
	$sql = "SELECT id_worker, worker_fullname, worker_username, active FROM worker WHERE worker_username='$worker_username' AND password='$password'";
	$result = $conn->query($sql);

	//if company table has this this login details
	if($result->num_rows > 0) {
		//output data
		while($row = $result->fetch_assoc()) {

			if($row['active'] == '2') {
				$_SESSION['workerLoginError'] = "Your Account Is Still Pending Approval.";
				header("Location: login-worker.php");
				exit();
			} else if($row['active'] == '0') {
				$_SESSION['workerLoginError'] = "Your Account Is Rejected. Please Contact For More Info.";
				header("Location: login-worker.php");
				exit();
			} else if($row['active'] == '1') {
				// active 1 means admin has approved account.
				//Set some session variables for easy reference
				$_SESSION['worker_fullname'] = $row['worker_fullname'];
				$_SESSION['id_worker'] = $row['id_worker'];

				//Redirect them to company dashboard once logged in successfully
				header("Location: domestic-worker/index.php");
				exit();
			} else if($row['active'] == '3') {
				$_SESSION['workerLoginError'] = "Your Account Is Deactivated. Contact Admin For Reactivation.";
				header("Location: login-worker.php");
				exit();
			}
		}
 	} else {
 		//if no matching record found in user table then redirect them back to login page
 		$_SESSION['loginError'] = $conn->error;
 		header("Location: login-worker.php");
		exit();
 	}

 	//Close database connection. Not compulsory but good practice.
 	$conn->close();

} else {
	//redirect them back to login page if they didn't click login button
	header("Location: login-worker.php");
	exit();
}
