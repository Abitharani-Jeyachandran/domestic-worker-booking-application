  <header id="header">

    <!--BURGER NAVIGATION SECTION START-->

    <!--BURGER NAVIGATION SECTION END-->

    <div class="container">

      <!--NAVIGATION START-->

      <div class="navigation-col">

        <nav class="navbar navbar-inverse">

          <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

            <h2><strong class="logo" style="color: purple; padding-top:8%">FIND US</strong></h2> </div>

          <div id="navbar" class="collapse navbar-collapse">

            <ul class="nav navbar-nav" id="nav">

              <li><a href="index.php">Home</a>



              </li>
<?php if (strlen($_SESSION['jsid']==0)) {?>
              <li><a href="sign-up.php">Jobseekers</a>
              </li>

              <li><a href="employers/emp-login.php">Domestic Workers</a></li>
<li><a href="admin/index.php">Admin</a></li><?php } ?>


<?php if (strlen($_SESSION['jsid']!=0)) {?>
                  <li><a href="applied-jobs.php">History of Applied Jobs</a></li>
<?php } ?>
              </li>
            <li><a href="Chat/index.php" target="_blank">Chat</a></li>
            </ul>

          </div>

        </nav>

      </div>

      <!--NAVIGATION END-->

    </div>


    </div>

    <!--USER OPTION COLUMN END-->
  </header>
