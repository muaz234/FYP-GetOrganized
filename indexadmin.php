<?php
session_start();
if(!isset($_SESSION["empname"])  ) {
header("Location:login.php");
}
if($_SESSION["level"]!="manager"){
  header("Location:login.php");
}

?>





<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Get Organized</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

  </head>

  <body>
    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle">
      <i class="fa fa-bars"></i>
    </a>


    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle">
             <a href="logout.php" class="btn btn-dark btn-lg js-scroll-trigger">Logout</a>
          <i class="fa fa-times"></i>
        </a>
        <li class="sidebar-brand">

        <li>
          <a class="js-scroll-trigger" href="register.php">Register New Staff</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="viewallemployee.php">Employee Details</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="selectsalary.php">Salary</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="tgkreport.php">Branch report</a>
        </li>

         <li>
          <a class="js-scroll-trigger" href="inventoryadmin.php">Inventory</a>
        </li>
           <li>
          <a class="js-scroll-trigger" href="tgkcuti.php">Leave Management</a>
        </li>

      </ul>
    </nav>

    <!-- Header -->

     <header>
        <center>

    Welcome <?php echo $_SESSION['empname']; ?>


      </div>
    </header>

<!-- About
    <section id="about" class="about">
      <div class="container text-center">
        <h2>udah2 la tu</h2>
        <p class="lead">Balik tidoq
         <a target="_blank" href="http://join.deathtothestockphoto.com/">ayokkkkk</a>.</p>
      </div>
      <!-- /.container -->



           </section>

    <!-- Services -->
    <section id="services" class="services bg-primary text-white">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-12 mx-auto">


 <h2>Our Services</h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-4">
                <div class="service-item">
                  <span class="fa-stack fa-4x">
                   <i  class="fa fa-address-book-o" aria-hidden="true"></i>


                    <i class=""></i>
                  </span>
                  <h4>
                    <strong>Details</strong>
                  </h4>
                  <p>View all employees details</p>
                  <a href="viewallemployee.php" class="btn btn-light">View</a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="service-item">
                  <span class="fa-stack fa-4x">
                   <i class="fa fa-usd " ></i>

                    <i class=""></i>
                  </span>
                  <h4>
                    <strong>Salary</strong>
                  </h4>
                  <p>View/Approve  Employees Salary Details</p>
                  <a href="selectsalary.php" class="btn btn-light">View</a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="service-item">
                  <span class="fa-stack fa-4x">
                    <i class=""></i>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                  </span>
                      <h4>
                    <strong>Inventory</strong>
                  </h4>
                    <p>View company inventory</p>
                  <a href="inventoryadmin.php" class="btn btn-light">View</a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="service-item">
                  <span class="fa-stack fa-4x">
                    <i class=""></i>
                    <i class="fa fa-plane" aria-hidden="true"></i>

                  </span>

                  </span>

                       <h4>

                    <strong>Leave management</strong>
                  </h4>
                  <p>Manage/Approve employees leave</p>
                  <a href="tgkcuti.php" class="btn btn-light">Approve</a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="service-item">
                  <span class="fa-stack fa-4x">
                    <i class=""></i>
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>

                  </span>
                  <h4>
                    <strong>Branch report</strong>
                  </h4>
                  <p>View branch report</p>
                  <a href="tgkreport.php" class="btn btn-light">View</a>
                </div>


            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.js"></script>

  </body>

</html>
