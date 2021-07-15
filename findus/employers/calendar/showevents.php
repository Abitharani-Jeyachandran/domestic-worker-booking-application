<?php
session_start();
	$date = $_GET["date"];
	$month = $_GET["month"];
	$year = $_GET["year"];

	$serverName = "localhost";
	$userName = "root";
	$passWord = "";
	$dbName = "findus";

	$conn = mysqli_connect($serverName, $userName, $passWord, $dbName);

	if(strlen($_SESSION['emplogin'])==0)
		{
	header('location:../emp-login.php');
	}  //connect to database
?>

<html>
	<head>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/showEventsStyleSheet.css">
	</head>
	<body>
		<div id="myDiv">
			<div class="form">
				<div class="login-form">
				<i class='' onclick="backClicked()"></i>
					<h2>Add Event</h2><br>
				  <input id="ename" name='ename' type="text" placeholder="Address"/>
				  <input id="edate" name='edate' type="text" placeholder="Date"/>
				  <input id="etime" name='etime' type="text" placeholder="Time"/>
				  <button id="submitButton" name="submitButton" onclick="myFunction()">Save</button>
				</div>
			</div>
			<div class="header" >
					<div class="dayEvents" >
					<table class="table">
					<thead>
					<tr>
						<th>Address</th>
						<th>Date</th>
						<th>Time</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$ename = ""; $edate = ""; $etime = "";
						 $sql = "SELECT * FROM `calendar` WHERE date='".$date."/".$month."/".$year."' ORDER BY time ASC"; 
																														//and show them in table format
						 $result = $conn->query($sql);

						 if ($result->num_rows > 0) {                //check if given date has stored any events, if yes then show them
							 // output data of each row
							 while($row = $result->fetch_assoc()) {
								$ename = $row["name"];
								$edate = $row["date"];
								$etime = $row["time"];
								echo"
									<tr>
										<td>".$ename."</td>
										<td>".$edate."</td>
										<td>".$etime."</td>
									</tr>
								";
							 }
						}
					?>
					</tbody>
					</table>
					</div>
			</div>
		</div>

		<script>
			var months = [                           //create array of months
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ]

			<?php echo "document.getElementById('edate').value = '".$date."/".$month."/".$year."';";                         //assign date to edate and header
				echo "document.getElementById('eventHeader').innerHTML = '".$date." '+months[".($month-1)."]+' ".$year."';";
			?>

			function backClicked(){
				window.location.href="index.php";                          //go back to main page
			}

			function myFunction(){
				var ename =  document.getElementById("ename").value;
				var edate =  document.getElementById("edate").value;
				var etime =  document.getElementById("etime").value;

				var myUrl ="addtoevent.php?ename="+ename+"&edate="+edate+"&etime="+etime;

				var xhr = new XMLHttpRequest();								//send request only to addtoevent.php, do not redirect i.e. database work needed to be done at background
				xhr.open("GET", myUrl, true);
				xhr.setRequestHeader('Content-Type', 'application/json');
				xhr.send(JSON.stringify({
					ename : ename,
					edate : edate,
					etime : etime
				}));

				window.alert("Event Added Successfully");

				location.reload();											//refresh to see events added
			}
		</script>
	</body>
</html>
