<?php
session_start();

if(isset($_SESSION['id_user']) || isset($_SESSION['id_worker'])) {
  header("Location: index.php");
  exit();
}

require_once("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Domestic Worker Registration</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
</br>
</br>
</br>
</br>
</br>
  <!-- Header -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">FindUs</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="">Register</a></li>
          <li><a href="">Login</a></li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <div class="form-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-container">
                        <h3 class="title">Domestic Worker Register</h3>
                        <form class="form-horizontal" id="registerWorker">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" id="worker_fullname" name="worker_fullname" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" id="worker_username" name="worker_username" placeholder="User Name" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                            </div>
                            <div id="passwordError" class="btn btn-flat btn-danger hide-me" >
                            Password Mismatch!!
                            </div>
                            <h4 class="sub-title">Personal Information</h4>
                            <div class="form-group">
                                <label>NIC No</label>
                                <input type="text" class="form-control" id="nicno" name="nicno" placeholder="NIC Number" required>
                            </div>
                            <div class="form-group">
                                <label>Phone No</label>
                                <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label>District</label>
                                <select class="form-control" id="district" name="district">
                                  <option selected="" value="">Select District</option>
                                    <option value="Jaffna">Jaffna</option>
                                    <option value="Batticaloa">Batticaloa</option>
                                    <option value="Kilinochi">Kilinochi</option>
                                    <option value="Mannar">Mannar</option>
                                    <option value="Mullaitivu">Trincomalee</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Work</label>
                                <select class="form-control" id="worktype" name="worktype" required>
                                  <option selected="" value="">Select Worktype</option>
                                  <?php
                                  $sql="SELECT * FROM worktype";
                                  $result=$conn->query($sql);

                                  if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                      echo "<option value='".$row['workname']."' data-id='".$row['id_worktype']."'>".$row['workname']."</option>";
                                    }
                                  }
                                  ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Experience</label>
                                <select class="form-control" id="experience" name="experience">
                                  <option selected="" value="">Select Experience</option>
                                    <option value="experience">1 Year</option>
                                    <option value="experience">2 Year</option>
                                    <option value="experience">3 Year</option>
                                    <option value="experience">4 Year</option>
                                    <option value="experience">5 or above Year</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label>Attach Profile</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                            <span class="signin-link">Already have an account? Click here to <a href="login-worker.php">Login</a></span>
                            <button type="submit" class="btn signup">Create Account</button>
                        </form>
                        <?php
              //If Company already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                <div>
                  <p class="text-center" style="color: red;">Email Already Exists! Choose A Different Email!</p>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?>
              <?php
              if(isset($_SESSION['uploadError'])) {
                ?>
                <div>
                  <p class="text-center" style="color: red;"><?php echo $_SESSION['uploadError']; ?></p>
                </div>
              <?php
               unset($_SESSION['uploadError']); }
              ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script type="text/javascript">
    function validatePhone(event) {

      //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
      //event.which will return key for mouse events and other events like ctrl alt etc.
      var key = window.event ? event.keyCode : event.which;

      if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
        // 8 means Backspace
        //46 means Delete
        // 37 means left arrow
        // 39 means right arrow
        return true;
      } else if( key < 48 || key > 57 ) {
        // 48-57 is 0-9 numbers on your keyboard.
        return false;
      } else return true;
    }
  </script>

  <script>
    $("#registerWorker").on("submit", function(e) {
      e.preventDefault();
      if( $('#password').val() != $('#cpassword').val() ) {
        $('#passwordError').show();
      } else {
        $(this).unbind('submit').submit();
      }
    });
  </script>

  </body>

</html>
