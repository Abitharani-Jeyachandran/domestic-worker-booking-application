<?php
session_start();
//Database Configuration File
include('includes/config.php');
//error_reporting(0);
//verifying Session
if(strlen($_SESSION['emplogin'])==0)
  {
header('location:emp-login.php');
}
else{

//Genrating CSRF Token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{

//Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {

$empid=$_SESSION['emplogin'];
//Getting Post Values
$category=$_POST['category'];
$salpackg=$_POST['salarypackage'];
$exprnce=$_POST['experience'];
$joblocation=$_POST['joblocation'];
$jobdesc=$_POST['description'];
$jed=$_POST['jed'];
$isactive=1;



$sql="INSERT INTO tbljobs(employerId,jobCategory,salaryPackage,experience,jobLocation,jobDescription,JobExpdate,isActive) VALUES(:empid,:category,:salpackg,:exprnce,:joblocation,:jobdesc,:jed,:isactive)";
$query = $dbh->prepare($sql);
// Binding Post Values
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':salpackg',$salpackg,PDO::PARAM_STR);
$query->bindParam(':exprnce',$exprnce,PDO::PARAM_STR);
$query->bindParam(':joblocation',$joblocation,PDO::PARAM_STR);
$query->bindParam(':jobdesc',$jobdesc,PDO::PARAM_STR);
$query->bindParam(':jed',$jed,PDO::PARAM_STR);
$query->bindParam(':isactive',$isactive,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your job posted Successfully";
unset( $_SESSION['token']);
}
else
{
$error="Something went wrong.Please try again";
}


}}}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Domestic Worker | Job Posting</title>
<link href="../css/custom.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/color.css" rel="stylesheet" type="text/css">
<link href="../css/responsive.css" rel="stylesheet" type="text/css">
<link href="../css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../css/editor.css" type="text/css" rel="stylesheet"/>
<link href="../css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,700,900' rel='stylesheet' type='text/css'>


<body class="theme-style-1">
<div id="wrapper">
<!--HEADER START-->
 <?php include('includes/header.php');?>
<!--HEADER END-->


  <!--INNER BANNER START-->
  <section id="inner-banner">

    <div class="container">

      <h1>Domestic Worker | Post a Job</h1>

    </div>

  </section>

  <!--INNER BANNER END-->



  <!--MAIN START-->

  <div id="main">
    <!--Signup FORM START-->
    <form name="empsignup" enctype="multipart/form-data" method="post">
<input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />


    <section class="resum-form padd-tb">

      <div class="container">
    <!--Success and error message -->
     <?php if(@$error){ ?><div class="errorWrap">
        <strong>ERROR</strong> : <?php echo htmlentities($error);?></div><?php } ?>

        <?php if(@$msg){ ?><div class="succMsg">
        <strong>Success</strong> : <?php echo htmlentities($msg);?></div><?php } ?>

<div class="row">
<div class="col-md-6 col-sm-6" >
<label>Category</label>
  <div class="selector">
       <select name='category' class="full-width">
  <?php
$sqlt = "SELECT CategoryName FROM tblcategory order by CategoryName asc";
$queryt = $dbh -> prepare($sqlt);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($queryt -> rowCount() > 0)
{
foreach($results as $result)
{?>
<option value="<?php echo htmlentities($result->CategoryName);?>"><?php echo htmlentities($result->CategoryName);?></option>
 <?php  }} ?>

</select>
</div>
</div>


          <div class="col-md-6 col-sm-6">

              <label>Salary Package</label>
<input type="text" placeholder="Minimum Salary" name="salarypackage" required>

            </div>
            </div>


<div class="row">

<div class="col-md-6 col-sm-6">
<label>Experience</label>
<input type="text" placeholder="Experience in years" name="experience" required>
</div>

<div class="col-md-6 col-sm-6">
<label>Address</label>
<input type="text" placeholder="Address" name="joblocation" required>
</div>

<div class="col-md-6 col-sm-6">
<label>Registered Date</label>
<input type="date" placeholder="e.g. 0-5" name="jed" required class="form-control">
</div>
</div>


<div class="row">
 <div class="col-md-12">
<h4>Job Description</h4>
<div class="text-editor-box">
<textarea  name="description"></textarea>
</div>
</div>
</div>

            <div class="col-md-12">

              <div class="btn-col">

                <input type="submit" name="submit" value="Submit">

              </div>

            </div>

          </div>



      </div>

    </section>
    </form>
    <!--RESUME FORM END-->

  </div>

  <!--MAIN END-->






<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.velocity.min.js"></script>
<script src="../js/jquery.kenburnsy.js"></script>
<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../js/editor.js"></script>
<script src="../js/jquery.accordion.js"></script>
<script src="../js/jquery.noconflict.js"></script>
<script src="../js/theme-scripts.js"></script>
<script src="../js/custom.js"></script>

</body>

</html>
<?php } ?>
