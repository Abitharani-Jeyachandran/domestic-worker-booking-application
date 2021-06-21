<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['comment']))
{
$jobid=intval($_GET['jobid']);
$userid=$_SESSION['jsid'];
$content=$_POST['content'];

$sql="INSERT INTO comment (user_id,Jobid,content) VALUES(:userid,:jobid,:content)";
$query = $dbh->prepare($sql);
$query->bindParam(':jobid',$jobid,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':content',$content,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Successfully Commented";
}
else
{
$error="Something went wrong. Please try again";
}
}
if(isset($_POST['book']))
{
$jobid=intval($_GET['jobid']);
$userid=$_SESSION['jsid'];
$edate=$_POST['edate'];
$est=$_POST['est'];
$address=$_POST['address'];

$sql="INSERT INTO tblapplyjob(JobId,UserId,EDate,ETime,Address) VALUES(:jobid,:userid,:edate,:est,:address)";
$query = $dbh->prepare($sql);
$query->bindParam(':jobid',$jobid,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':edate',$edate,PDO::PARAM_STR);
$query->bindParam(':est',$est,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Booked Successfully";
}
else
{
$error="Something went wrong. Please try again";
}
}
?>
<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>FIND US-Job Details</title>

<!--CUSTOM CSS-->

<link href="css/custom.css" rel="stylesheet" type="text/css">

<!--BOOTSTRAP CSS-->

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

<!--COLOR CSS-->

<link href="css/color.css" rel="stylesheet" type="text/css">

<!--RESPONSIVE CSS-->

<link href="css/responsive.css" rel="stylesheet" type="text/css">

<!--OWL CAROUSEL CSS-->

<link href="css/owl.carousel.css" rel="stylesheet" type="text/css">

<!--FONTAWESOME CSS-->

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!--SCROLL FOR SIDEBAR NAVIGATION-->

<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">


<!--GOOGLE FONTS-->

<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,700,900' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>



<body class="theme-style-1">

<!--WRAPPER START-->

<div id="wrapper">

  <!--HEADER START-->

  <?php include_once('includes/header.php');?>

  <!--HEADER END-->



  <!--INNER BANNER START-->

  <section id="inner-banner">

    <div class="container">

      <h1>Domestic Worker Job Details</h1>

    </div>

  </section>

  <!--INNER BANNER END-->



  <!--MAIN START-->

  <div id="main">

    <!--RECENT JOB SECTION START-->

    <section class="recent-row padd-tb job-detail">

      <div class="container">

        <div class="row">

          <div class="col-md-12 col-sm-8">

            <div id="content-area">

              <div class="box">
<?php
$jobid=$_GET['jobid'];
$sql="SELECT tbljobs.*,tblemployers.* from tbljobs join tblemployers on tblemployers.id=tbljobs.employerId where tbljobs.jobId=:jobid";
$query = $dbh -> prepare($sql);
$query->bindParam(':jobid',$jobid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
  <form name="book" method="post">
                <div class="thumb"><img src="employers/employerslogo/<?php echo $row->CompnayLogo;?>" width="100" height="100" alt="img"></div>

                <div class="text-col">

                  <h2><a href="#"><?php  echo htmlentities($row->jobCategory);?></a></h2>

                  <p><?php  echo htmlentities($row->ConcernPerson);?> <em><a href="index.php">(View All Jobs)</a></em></p>

                  <a href="#" class="text">Address : <?php  echo htmlentities($row->jobLocation);?></a> </br> <a href="#" class="text">Registered Date : <?php  echo htmlentities($row->postinDate);?> </a> <strong class="price">Amount : LKR <?php  echo htmlentities($row->salaryPackage);?></strong>
</br></br></br></br></br>
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

<div class="col-md-6 col-sm-6">
<label>Address:<span style="color:red">*</span></label>
<input type="text" class="form-control" name="address" required autocomplete="off" />
</div>

<?php if($_SESSION['jsid'])
					{?>
						<li class="spe" align="center">
					<button type="submit" name="book" class="btn-primary btn">Book</button>
						</li>
						<?php } else {?>
							<li class="sigi" align="center" style="margin-top: 1%">
							<a href="#" class="btn-primary btn" > Book</a></li>
							<?php } ?>

                </div>
              </form>
                <div class="clearfix">

                  <h4>About</h4>

                  <p><?php  echo ($row->jobDescription);?>.</p>

                  <h4>Experience</h4>

                  <p><?php  echo ($row->experience);?> yrs</p>

<h4>Location</h4>

                  <p> <?php  echo ($row->jobLocation);?></p>
                  <h4>Payment</h4>

                  <p>LKR <?php  echo ($row->salaryPackage);?></p>


                </div>

              </div>
<?php $cnt=$cnt+1;}} ?>
            </div>

          </div>

        </div>


        <form name="comment" method="post">
                <div class="input-group">
                  <textarea class="form-control" placeholder="comment" type="text" name="content"></textarea>
                  <?php if($_SESSION['jsid'])
                  					{?>
                  <button type="submit" value ="comment" name="comment" class="btn btn-primary btn-hover-green" >Post Your Comment</button>
                  <?php } else {?>
                  <a href="sign-in.php" class="btn-primary btn" >Comment</a>
                  <?php } ?>
                </div>
        </form>

<h4>Comments:</h4>
        <?php
        $jobid=$_GET['jobid'];
        $sql="SELECT comment.*,tbljobseekers.* from tbljobseekers join comment on tbljobseekers.id=comment.user_id where comment.Jobid=:jobid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':jobid',$jobid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);

        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $row)
        {               ?>
        <div class="clearfix">



          <p>Comment: <?php  echo ($row->content);?></br>Comment by: <?php  echo ($row->FullName);?></p>

        </div>

<?php $cnt=$cnt+1;}} ?>
      </div>

    </section>

    <!--RECENT JOB SECTION END-->



  <!--MAIN END-->



  <!--FOOTER START-->

 <?php include_once('includes/footer.php');?>

</div>

<!--WRAPPER END-->



<!--jQuery START-->

<!--JQUERY MIN JS-->

<script src="js/jquery-1.11.3.min.js"></script>

<!--BOOTSTRAP JS-->

<script src="js/bootstrap.min.js"></script>

<!--OWL CAROUSEL JS-->

<script src="js/owl.carousel.min.js"></script>

<!--BANNER ZOOM OUT IN-->

<script src="js/jquery.velocity.min.js"></script>

<script src="js/jquery.kenburnsy.js"></script>

<!--SCROLL FOR SIDEBAR NAVIGATION-->

<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

<!--FOR CHECKBOX-->

<script src="js/form.js"></script>

<!--CUSTOM JS-->

<script src="js/custom.js"></script>

</body>

</html>