<?php
session_start();
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
    
}</style>
<form action="addcourse1.php" method="post" autocomplete="off">
  <div class="addcourse">
      
      <label for="coursename">
        <i class="fas fa-user"></i>
      </label>
      <input type="text" name="coursename" placeholder="Course Name:" id="coursename" required>
      <br>
      
      <label for="coursedesc">
        <i class="fas fa-book"></i>
      </label>
      <input type="coursedesc" name="coursedesc" placeholder="Course Description:" id="coursedesc" required>
      <br>

      <label for="tutorinfo">
        <i class="fas fa-address-book"></i>
      </label>
      <input type="text" name="tutorinfo" placeholder="Tutor information:" id="tutorinfo" required>
      <br>

      <label for="price">
        <i class="fas fa-dollar-sign"></i>
      </label>
      <input type="text" name="price" placeholder="Price:" id="price" required>
      <br>

      <label for="numberoflectures">
        <i class="fas fa-book-open"></i>
      </label>
      <input type="text" name="numberoflectures" placeholder="Number of lectures:" id="numberoflectures" required>
      <br>
      <br>  
      
        <input type="submit" value="Add course" name="submit">
      </form>
      <br>
	</form>
<br>
</div>



</body>
</html>
      



</body>
</html>