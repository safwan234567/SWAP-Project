<?php
// We need to use sessions, so you should always start sessions using the below code.

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tuitionwebsite';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
else {
    $id=$_POST['id'];

    $query= $con->prepare("Select firstname, lastname, username, password, phonenumber, email, role from accounts WHERE id=?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->store_result();
    $query->bind_result( $firstname, $lastname, $username, $password, $phonenumber, $email, $role);
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

<body>
    
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
<form action="useradminedit.php" method="post" autocomplete="off">
  <div class="edituser">
        <input type="hidden" name="id" id="id" value="<?php echo $id?>">
      <label for="coursename">
        <i class="fas fa-user"></i>
      </label>
      <input type="text" name="firstname" placeholder="firstname:" id="firstname" value= <?php echo $firstname ?> required>
      <br>
      
      <label for="coursedesc">
        <i class="fas fa-book"></i>
      </label>
      <input type="coursedesc" name="lastname" placeholder="lastname:" id="lastname" value= <?php echo $lastname ?>  required>
      <br>

      <label for="tutorinfo">
        <i class="fas fa-address-book"></i>
      </label>
      <input type="text" name="username" placeholder="username:" id="username" value= <?php echo $username ?>  required>
      <br>

      <label for="price">
        <i class="fas fa-dollar-sign"></i>
      </label>
      <input type="text" name="password" placeholder="password:" id="password" value= <?php echo $password ?>  required>
      <br>

      <label for="numberoflectures">
        <i class="fas fa-book-open"></i>
      </label>
      <input type="text" name="phonenumber" placeholder="phonenumber:" id="phonenumber" value= <?php echo $phonenumber ?>  required>
      <br>
      <label for="numberoflectures">
        <i class="fas fa-book-open"></i>
      </label>
      <input type="text" name="email" placeholder="email:" id="email" value= <?php echo $email ?>  required>
      <br>  
      <input type="text" name="role" placeholder="role:" id="role" value= <?php echo $role ?>  required>

      <br>
  
      

      <br>
      <br>

      <input type="submit" value="Edit account">
      <br>
    </form>

<br>
</div>



</body>
</html>
      



</body>
</html>