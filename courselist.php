<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['studentloggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tuitionwebsite';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
else {
    $query= $con->prepare("Select coursename, coursedesc, tutorinfo, price, numberoflectures, myFile from courses");
    $query->execute();
    $query->store_result();
    $query->bind_result($coursename, $coursedesc, $tutorinfo, $price, $numberoflectures, $myFile);
    if($query->num_rows === 0) exit('No rows');
    echo '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
      .featured-courses > .row {
          display: block;
          overflow-x: auto;
          white-space: nowrap;
        }
        .featured-courses > .row > .col-4 {
          display: inline-block;
        }
        </style>
</head>
<body>

    <header>
        <!-- Start your project here-->
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand" href="index.html">EzeTuition</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/tuitionwebsite/tutorlogin.html">Login as Tutor<span
                      class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/tuitionwebsite/tutorregister.html">Tutor Registration</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    
      </header>
  <!-- Start your project here-->  

  <div class="input-group md-form form-sm form-2 pl-0" style="top: 20px; margin: auto; width: 20%; ">
    <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
      <span class="input-group-text amber lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
          aria-hidden="true"></i></span>
    </div>
  </div>

<style>
    .row{
        display: inline-flex;
        width: 100%;
    }
</style>
    <div class="row">
    ';
    while($query->fetch()){
      echo'
      <div class="column" style="width: 60%; margin: 2%;">
      <div class="card mb-3" style="height: 230px; padding: 1%; margin: 6%;">
              <div class="row no-gutters" style="padding-bottom:30px;">
                <div class="col-md-4" style="max-width: 200px; max-height: 200px;">
                  <img src="https://codetea.com/content/images/2017/03/0170303162038.jpg" class="card-img" alt="..." style="height: 210px;">
                </div>
                <div class="col-md-8">
  
                  <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold; font-size: larger;">'.$coursename.'</h5>
  
                  <p class="card-text" style="font-size: small;">'.$coursedesc.'</p>
  
                  <p class="card-text" style="font-size: x-large; color: red;">$'.$price.'</p>
   
                  
                  
                  <div class="row">
                      <div class="column"></div>
                      <form action="payment.php" method="POST">
                      <input type="hidden" name="coursename" value="'.$coursename.'">
                      
                      </form>
                      <input type="submit" name="addtocart" value="Add to Cart" class="btn btn-warning" style="position: relative; bottom: 10px;">
                      <div class="column"></div>
                      <form action="coursedetails.php" method="POST">
                      <input type="hidden" name="coursename" value="'.$coursename.'">
                      <input type="submit" name="viewdetails" value="View Details" class="btn btn-amber" style="position: relative; bottom: 10px;">
                    </form>
                      </div>
                  </div>
                </div>
              </div>
              </div>
              </div>';
    }    
}
$con->close();

?>


  

</div> 
</div>
   

  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

</body>


</html>