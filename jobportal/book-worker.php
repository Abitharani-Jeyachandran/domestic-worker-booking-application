<?php
session_start();
error_reporting(0);
include('includes/config.php');

    if(isset($_POST['submit']))
  {
 $edate=$_POST['edate'];
 $est=$_POST['est'];
$sql="INSERT INTO tblapplyjob(ID,EDate,ETime)VALUES(:bookingid,:edate,:est)";
$query=$dbh->prepare($sql);
$query->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
$query->bindParam(':edate',$edate,PDO::PARAM_STR);
$query->bindParam(':est',$est,PDO::PARAM_STR);

 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your Booking Request Has Been Send. Will Contact You Soon")</script>';
echo "<script>window.location.href ='services.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

}

?>
<!DOCTYPE html>
<html>
<head>
<title>Find Us || Booking</title>
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/color.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/editor.css" type="text/css" rel="stylesheet"/>
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,700,900' rel='stylesheet' type='text/css'>
<!---//End-css-style-switecher----->
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
	   <script type="text/javascript">
			$(document).ready(function() {
				/*
				 *  Simple image gallery. Uses default settings
				 */

				$('.fancybox').fancybox();

			});
		</script>

</head>
<body class="theme-style-1">
<div id="wrapper">
  <?php include_once('includes/header.php');?>

	  <section id="inner-banner">

             <div class="container">

               <h1>Book</h1>

             </div>

           </section>

           <div id="main">
					 <form name="book" method="post">
           <section class="resum-form padd-tb">
             <div class="container">

                   <div class="col-md-6 col-sm-6">
                   <label>Date:<span style="color:red">*</span></label>
                   <input type="date" class="form-control" name="edate" required autocomplete="off" />
                   </div>

						   <div class="col-md-6 col-sm-6">
							 <label>Time:<span style="color:red">*</span></label>
               <Select type="text" class="form-control" name="est" required autocomplete="off" />
               <option value="">Select Time</option>
							 	<option value="7 a.m">7 a.m</option>
							 	<option value="8 a.m">8 a.m</option>
							 	<option value="9 a.m">9 a.m</option>
							 	<option value="10 a.m">10 a.m</option>
							 	<option value="11 a.m">11 a.m</option>
							 	<option value="12 p.m">12 a.m</option>
							 	<option value="1 p.m">1 p.m</option>
							 	<option value="2 p.m">2 p.m</option>
							 	<option value="3 p.m">3 p.m</option>
							 	<option value="4 p.m">4 p.m</option>
							 	<option value="5 p.m">5 p.m</option>
							 	<option value="6 p.m">6 p.m</option>
							 	<option value="7 p.m">7 p.m</option>
							 </select></li>
						 </div>

						 <input type="submit" name="submit" value="Book">
           </div>
           </section>
					 </form>
			 </div>
</div>
<!---->

<!---->
</body>
</html>
