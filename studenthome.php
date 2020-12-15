<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['studentloggedin'])) {
	header('Location: index.html');
	exit;
}
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
</head>

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
	

	<main class="text-center my-5">
	<div>
		<h2 style="text-align: center;">Home Page</h2>
		<p style="text-align: center;">Welcome back, <?= $_SESSION['name'] ?>!</p>
	</div>
	<hr>
    <!--Main Layout-->
  <main class="text-center my-5">
      <!-- Jumbotron -->
  <div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/forest2.jpg);">
    <div class="text-white text-center rgba-stylish-strong py-5 px-4">
      <div class="py-5">

        <!-- Content -->
        <h1 class="card-title h2 my-4 py-2">EzeTuition</h2>
        <h2 class="mb-4 pb-2 px-md-5 mx-md-5">Learn new skills or share your skills</h2>
        <div class="col-sm">
			
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
      <br>

    <h1>View all the courses you can enroll in</h1>
    <br>
    <a href="courselist.php" class="btn btn-warning">View courses</a>
  </main>
  <!--Main Layout-->
	
	
</body>

</html>