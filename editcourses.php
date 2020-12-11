<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['tutorloggedin'])) {
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

    $query->fetch();
}
$con->close();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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

<body class="tutorloggedin">
    <!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand" href="tutorhome.php">EzeTuition</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="tutorprofile.php"><i class="fas fa-user-circle"></i>Profile</a>
				</li>
				<li class="nav-item">
					<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				</li>
				</li>
			</ul>
		</div>
    </nav>
    <!-- Navbar end -->
	<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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

<body class="tutorloggedin">
<br>
    <div class="container">
        <h1>Edit course</h1>
        <p>Fill in the options below</p>
      </div>
<br>
<div class="card">
    <br>
    <style type="text/css">
    body {
    text-align: center;
}
form {	
    display: inline-block;
    
}</style>
<form action="editcourse.php" method="post" autocomplete="off">
  <div class="editcourse">
      
      <label for="coursename">
        <i class="fas fa-user"></i>
      </label>
      <input type="text" name="coursename" placeholder="Course Name:" id="coursename" value= <?php echo $coursename ?> required>
      <br>
      
      <label for="coursedesc">
        <i class="fas fa-book"></i>
      </label>
      <input type="coursedesc" name="coursedesc" placeholder="Course Description:" id="coursedesc" value= <?php echo $coursedesc ?>  required>
      <br>

      <label for="tutorinfo">
        <i class="fas fa-address-book"></i>
      </label>
      <input type="text" name="tutorinfo" placeholder="Tutor information:" id="tutorinfo" value= <?php echo $tutorinfo ?>  required>
      <br>

      <label for="price">
        <i class="fas fa-dollar-sign"></i>
      </label>
      <input type="text" name="price" placeholder="Price:" id="price" value= <?php echo $price ?>  required>
      <br>

      <label for="numberoflectures">
        <i class="fas fa-book-open"></i>
      </label>
      <input type="text" name="numberoflectures" placeholder="Number of lectures:" id="numberoflectures" value= <?php echo $numberoflectures ?>  required>
      <br>
      <br>  
      
      <input type="file" id="myFile" name="filename">

      <br>
      <br>

      <input type="submit" value="Edit course">
      <br>
    </form>

<br>
</div>



</body>
</html>
      



</body>
</html>