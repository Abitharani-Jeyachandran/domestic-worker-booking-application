<?php
session_start();
//Database Configuration File
include('includes/config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
//Getting Post Values
$conrnper=$_POST['concernperson'];
$emaill=$_POST['email'];
$nic=$_POST['nic'];
//Password hashing
$password=$_POST['empppassword'];
$options = ['cost' => 12];
$hashedpass=password_hash($password, PASSWORD_BCRYPT, $options);
//getting logo
$logo=$_FILES["logofile"]["name"];
// get the image extension
$extension = substr($logo,strlen($logo)-4,strlen($logo));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid logo format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$logoname=md5($logo).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["logofile"]["tmp_name"],"employerslogo/".$logoname);

// Query for validation of  email-id
$ret="SELECT * FROM  tblemployers where (NIC=:uemail || Email=:nic)";
$queryt = $dbh -> prepare($ret);
$queryt->bindParam(':uemail',$emaill,PDO::PARAM_STR);
$queryt->bindParam(':nic',$nic,PDO::PARAM_STR);

$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() == 0)
{
// Query for Insertion
$isactive=1;
$sql="INSERT INTO tblemployers(Name,NIC,Email,EmpPassword,Image,Is_Active) VALUES(:conrnper,:emaill,:nic,:hashedpass,:logoname,:isactive)";
$query = $dbh->prepare($sql);
// Binding Post Values
$query->bindParam(':conrnper',$conrnper,PDO::PARAM_STR);
$query->bindParam(':emaill',$emaill,PDO::PARAM_STR);
$query->bindParam(':nic',$nic,PDO::PARAM_STR);
$query->bindParam(':hashedpass',$hashedpass,PDO::PARAM_STR);
$query->bindParam(':logoname',$logoname,PDO::PARAM_STR);
$query->bindParam(':isactive',$isactive,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Signup Successfully');</script>";
echo "<script type='text/javascript'> document.location ='emp-login.php'; </script>";

}
else
{
$error="Something went wrong.Please try again";
}
}
 else
{
$error="Nic or Email Already Exist";
}
}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Service Providers | Signup</title>
<link href="../css/custom.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">

<link href="../css/responsive.css" rel="stylesheet" type="text/css">
<link href="../css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../css/editor.css" type="text/css" rel="stylesheet"/>
<link href="../css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,700,900' rel='stylesheet' type='text/css'>






</head>

<body class="index">
<div id="wrapper">
<!--HEADER START-->
 <?php include('includes/header.php');?>
<!--HEADER END-->


  <!--INNER BANNER START-->
  <section id="inner-banner">

    <div class="container">

      <h1>Service Providers</h1>

    </div>

  </section>

  <!--INNER BANNER END-->



  <!--MAIN START-->

  <div id="main">

    <!--Signup FORM START-->
    <form name="empsignup" enctype="multipart/form-data" method="post">
    <section class="resum-form padd-tb">

      <div class="container">
    <!--Success and error message -->
     <?php if(@$error){ ?><div class="errorWrap">
        <strong>ERROR</strong> : <?php echo htmlentities($error);?></div><?php } ?>

        <?php if(@$msg){ ?><div class="succMsg">
        <strong>Success</strong> : <?php echo htmlentities($msg);?></div><?php } ?>

          <div class="row">

<div class="col-md-6 col-sm-6">
<label>Name</label>
<input type="text" name="concernperson" placeholder="Name" required autocomplete="off" />
</div>

<div class="col-md-6 col-sm-6">
<label>Nic No</label>
<input type="text" name="email" id="email" placeholder="Nic Number Here..." autocomplete="off"  required>
 <span id="user-availability-status1" style="font-size:12px;"></span>
</div>

<div class="col-md-6 col-sm-6">
<label>Email</label>
<input type="email" name="nic" id="nic" onBlur="userAvailability()"  placeholder="Email Here..." autocomplete="off"  required>
 <span id="user-availability-status1" style="font-size:12px;"></span>
</div>

 <div class="col-md-6 col-sm-6">
 <label>Password</label>
<input type="password" name="empppassword" placeholder="Password Here..." autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters"  required>
</div>


<div class="col-md-6 col-sm-12">
<label>Image</label>
<div class="upload-box">
<div class="hold">
<input type="file" name="logofile"  required>
 </span> </div>
</div>

            </div>

            <div class="col-md-12">

              <div class="btn-col">

                <input type="submit" name="signup" id="submit" value="Sign up">

              </div>
              <div class="col-md-2">
                          <p>Already Have account?</p>
                          <button class="btn-row"><a href="emp-login.php">Sign in Now</a></button>
              </div>
            </div>

          </div>

      </div>

    </section>
    </form>
    <!--RESUME FORM END-->

  </div>

  <!--MAIN END-->



  <!--FOOTER START-->

  <?php include('includes/footer.php');?>
  <!--FOOTER END-->

</div>


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
      <script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_emailavailability.php",
data:'nic='+$("#nic").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</body>

</html>
