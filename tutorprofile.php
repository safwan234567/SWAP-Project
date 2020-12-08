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
$stmt = $con->prepare('SELECT password, email, role FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $role);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
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
		<style>.center {
  margin-left: auto;
  margin-right: auto;
}</style>
	</head>
	<body class="tutorloggedin">
	<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="tutorhome.php">EzeTuition</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
		<a href="tutorprofile.php"><i class="fas fa-user-circle"></i>Profile</a>
        </li>
        <li class="nav-item">
		<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </li>
        </li>
      </ul>
    </div>
  </nav>
  <main class="text-center my-5 center">
	<div class="card" style="width: 40%; height: 50%; margin: auto;">
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table class="center">
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<br>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
					<tr>
						<td>Account type:</td>
						<td><?=$role?></td>
					</tr>
				</table>
				<br>
				<form action="modifyaccount.php" method ="POST">
				<table class="center">

					<tr>
						<td>Update email : </td>
						<td><input type="email" name="email" id="email"/></td> 
					</tr>
					<tr>
					<td></td>
					<td><input type="submit" name="update" value="Update"/></td>
					</tr>
				</table>
				</form>
				<br>
			</div>
		</div>
		<form action="modifyaccount.php" method ="POST">
		<a type="submit" name="update" value="Update" class="btn btn-danger">Edit account details</a>
		</form>
	</div>
	<div class="card" style="width: 40%; height: 50%; margin: auto; margin-top:2%;">
	<h2>Courses you are teaching(1)</h2>
				<a href="editcourse.html" class="btn">Introduction to Web Design</a>
				<a href="addcourse.php" class="btn btn-warning">Add Course</a>
	</div>
	<div class="card" style="width: 40%; height: 50%; margin: auto; margin-top:2%;">
	<h2>Delete your account</h2>
	<form action="tutordelete.php" method ="POST">
				<input type="submit" name="action" value="Delete" class="btn btn-danger">DELETE ACCOUNT PERMANENTLY</input>
	</form>
	</div>
  </main>
	</body>
</html>