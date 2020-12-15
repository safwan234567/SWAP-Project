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
    $coursename=$_POST['coursename'];

    $query= $con->prepare("Select coursename, coursedesc, tutorinfo, price, numberoflectures from courses WHERE coursename=?");
    $query->bind_param('s', $coursename);
    $query->execute();
    $query->store_result();
    $query->bind_result($coursename, $coursedesc, $tutorinfo, $price, $numberoflectures);
    if($query->num_rows === 0) exit('No rows');

    echo '
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design for Bootstrap</title>
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
</head>
<body>

  <!-- Start your project here-->  

  <body class="studentloggedin">
	<nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand" href="studenthome.php">EzeTuition</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="studentprofile.php"><i class="fas fa-user-circle"></i>Profile</a>
				</li>
				<li class="nav-item">
					<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				</li>
				</li>
			</ul>
		</div>
	</nav>
    <!-- Navbar end -->';

    
    
if ($query->fetch()){
    echo'
    <!-- Card -->
    <div class="card" style="width: 40%; height: 50%; margin: 5%; float: left;">
    
        <!-- Card image -->
        <div class="view overlay">
          <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg"
            alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
      
        <!-- Card content -->
        <div class="card-body">
      
          <!-- Title -->
          <h4 class="card-title" id="coursename"> '.$coursename.' </h4>
          <!-- Text -->
          <p class="card-text"> '.$coursedesc.' </p>
          <p class="card-text" style="font-weight: bold; font-size: medium;">Read more</p>
          <p class="card-text" style="font-size: x-large; color: red;"> '.$price.' </p>
          <!-- Button -->
          <a href="payment.php" class="btn btn-primary">purchase now</a>
          <a href="#" class="btn btn-primary">Add to Cart</a>
      
        </div>
      
      </div>
      <!-- Card -->
    
    
      <!-- Card -->
    <div class="card" style="width: 40%; margin: 5%;">
      
        <!-- Card content -->
        <div class="card-body">
      
          <!-- Title -->
          <h4 class="card-title"><a>Course reviews (2)</a></h4>
          <!-- Text -->
          <p class="card-text">
          Some quick example text to build on the card title and make up the bulk of the cards content.</p>
          <!-- Button -->
          <a href="addReview.php" class="btn btn-primary">Add a review</a>
          <a href="review.php" class="btn btn-primary">All reviews</a>
        </div>
      
      </div>
      <!-- Card -->
    
    
      
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
    
    
    </html>';

}
}
$con->close();

?>
