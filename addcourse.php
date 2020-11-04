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
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM tutors WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
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
    <br>
    <div class="container">
        <h1>Add course</h1>
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
    width: 50%;
    margin: auto;
}</style>
<form action="/addcourse.php">
    <div class="form-group row">
        <label for="coursename" class="col-sm-2 col-form-label">Course name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="coursename" placeholder="Name of course">
        </div>
      </div>
      <div class="form-group row">
        <label for="coursedesc" class="col-sm-2 col-form-label">Course description:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="coursedesc" placeholder="Give a short descrition of the course">
        </div>
      </div>
      <div class="form-group row">
        <label for="tutorinfo" class="col-sm-2 col-form-label">Tutor information:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="tutorinfo" placeholder="Describe yourself!">
        </div>
      </div>
      <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="price" placeholder="Price">
        </div>
      </div>
      <div class="form-group row">
        <label for="numberoflectures" class="col-sm-2 col-form-label">Number of lectures:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="numberoflectures" placeholder="Number of lectures">
        </div>
      </div>
    
        <input type="file" id="myFile" name="filename">
      <br>
      <br>
    <input type="submit" value="Add course">
</form>
<br>
</div>



</body>
</html>