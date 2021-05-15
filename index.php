<?php

session_start();

//Database Connection
require_once("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FindUs</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!--CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- Header -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">FindUs</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_worker'])) { ?>
          <li>
            <a href="register.php">Register</a>
          </li>
          <li>
            <a href="login.php">Login</a>
          </li>
        <?php } else {

          if(isset($_SESSION['id_user'])) {
        ?>
        <li>
          <a href="help-seeker/index.php">Dashboard</a>
        </li>
        <?php
      } else if(isset($_SESSION['id_worker'])) {
        ?>
        <li>
          <a href="domestic-worker/index.php">Dashboard</a>
        </li>
        <?php } ?>
        <li>
          <a href="logout.php">Logout</a>
        </li>
        <?php } ?>

          <li><a href="#contact">Chat</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 justify-content-center">
          <h1>Platform To Connect Domestic Workers And Clients</h1>
          <p class="justify-content-center"><a class="btn btn-success btn-lg" href="jobs.php" role="button">Search Jobs</a></p>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <div class="site-section section">
          <div class="container">
            <div class="row">
          			<div class="col-lg-6 offset-lg-3 col-12">
      						<div class="section-title bg">
            					<h2>Workers Type</h2>
            			</div>
            		</div>
            	</div>
            <div class="row align-items-stretch">
              <div class="col-lg-3">
                <a href="#" class="service">
                  <span class="wrap-icon brand-adobeillustrator"></span>
                  <h3>Carpenter</h3>
                </a>
              </div>
              <div class="col-lg-3">
                <a href="#" class="service">
                  <span class="wrap-icon brand-adobephotoshop"></span>
                  <h3>Plumber</h3>
                </a>
              </div>

              <div class="col-lg-3">
                <a href="#" class="service">
                  <span class="wrap-icon brand-angular"></span>
                  <h3>Electrician</h3>
                </a>
              </div>

              <div class="col-lg-3">
                <a href="#" class="service">
                  <span class="wrap-icon brand-javascript"></span>
                  <h3>Painter</h3>
                </a>
              </div>
              <div class="col-lg-3">
                <a href="#" class="service">
                  <span class="wrap-icon brand-react"></span>
                  <h3>Mechanic</h3>
                </a>
              </div>
              <div class="col-lg-3">
                <a href="#" class="service">
                  <span class="wrap-icon brand-vue-dot-js"></span>
                  <h3>Mason</h3>
                </a>
              </div>
              <div class="col-lg-3">
                <a href="#" class="service">
                  <span class="wrap-icon brand-vue-dot-js"></span>
                  <h3>Cook</h3>
                </a>
              </div>
              <div class="col-lg-3">
                <a href="#" class="service">
                  <span class="wrap-icon brand-vue-dot-js"></span>
                  <h3>Beautician</h3>
                </a>
              </div>
            </div>
          </div>
        </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>To Know More About Our Services</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
