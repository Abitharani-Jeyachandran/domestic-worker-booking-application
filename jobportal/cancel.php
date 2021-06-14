<?php
session_start();
//Database Configuration File
include('includes/config.php');
error_reporting(0);

if(isset($_POST['submit']))
  {


    $jobid=intval($_GET['jobid']);
    $jsid=$_SESSION['jsid'];
    $status=$_POST['status'];

    $sql="INSERT INTO tblmessage(JobID,UserID,Status) VALUES (:jobid,:jsid,:status)";

    $query=$dbh->prepare($sql);
$query->bindParam(':jobid',$jobid,PDO::PARAM_STR);
$query->bindParam(':jsid',$jsid,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
       $query->execute();
      $sql1= "update tblapplyjob set Status=:status where JobId=:jobid";

    $query1=$dbh->prepare($sql1);
     $query1->bindParam(':jobid',$jobid,PDO::PARAM_STR);
$query1->bindParam(':status',$status,PDO::PARAM_STR);

 $query1->execute();
 echo '<script>alert("Status has been updated")</script>';
 echo "<script>window.location.href ='applied-jobs.php'</script>";
}


  ?>
<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Jobseekers |  Profile </title>
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/color.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,700,900' rel='stylesheet' type='text/css'>

</head>



<body class="theme-style-1">

<!--WRAPPER START-->

<div id="wrapper">

  <!--HEADER START-->

 <?php include('includes/header.php');?>

  <!--HEADER END-->



  <!--INNER BANNER START-->

  <section id="inner-banner">

    <div class="container">

      <h1>Cancel</h1>

    </div>

  </section>

  <!--INNER BANNER END-->



  <!--MAIN START-->

  <div id="main">

    <!--RECENT JOB SECTION START-->

    <section class="resumes-section padd-tb">

      <div class="container">

        <div class="row">

          <div class="col-md-12 col-sm-8">


            <div class="resumes-content">
              <div class="summary-box">

                <?php
               //Getting User Id
               $jobid=$_GET['jobid'];
               $name=$_GET['name'];
               // Fetching User Details
               $sql = "SELECT tbljobs.*,tblapplyjob.*  from tblapplyjob join tbljobs on tblapplyjob.JobId=tbljobs.jobId  where tbljobs.jobId=:jobid";
               $query = $dbh -> prepare($sql);
               $query-> bindParam(':jobid', $jobid, PDO::PARAM_STR);
               $query->execute();
               $results=$query->fetchAll(PDO::FETCH_OBJ);
               foreach($results as $result)
               {
                ?>
                <?php } ?>

<p align="center">
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
</button>
</div>
<div class="modal-body">
<table class="table table-bordered table-hover data-tables">

 <form method="post" name="submit">
  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Cancelled" selected="true">Cancelled</option>
   </select></td>
  </tr>
</table>
</div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="submit" class="btn btn-primary">Update</button>

  </form>
              </div>



            </div>

          </div>



        </div>

      </div>

    </section>

    <!--RECENT JOB SECTION END-->

  </div>


</div>

<!--WRAPPER END-->




<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.velocity.min.js"></script>
<script src="js/jquery.kenburnsy.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/form.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
