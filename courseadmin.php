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

<body>
    <br>
    <div class="container">
        <h1>Courses</h1>
        <p>ADMIN COURSE PAGE</p>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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

        


  
  
  
  </body>
  </html>
        
  
  
  
  </body>
  </html>
  <?php 
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['useradminloggedin'])) {
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
    echo "<table border=1>";
    echo "<tr><td>Course name</td><td>Course Description</td><td>Tutor Information</td><td>Price</td><td>Number of Lectures</td><td>Lecture files</td><td></td>"; 
    while($query->fetch()){
        echo "<tr><td>". $coursename."</td><td>". $coursedesc."</td><td>". $tutorinfo. "</td><td>". $price. "</td><td>". $numberoflectures."</td><td>". $myFile."</td><td>";
        //edit course button
        echo "</td><td><form action=\"editcourses.php\" method =\"post\">";
        echo '<input type=hidden name="coursename" value="'.$coursename.'">';
        echo "<input type=\"submit\" name=\"edit\" value=\"Edit\"></form></td><td>";
    
        //delete course button
        echo "</td><td><form action=\"deletecourse.php\" method =\"post\">";
        echo '<input type=hidden name="coursename" value="'.$coursename.'">';
        echo "<input type=\"submit\" name=\"delete\" value=\"Delete\"></form></td></tr>";
    }

    echo "</table>";
    
}
$con->close();

?>
<html>
<br>
<form action="addcourse.html" method="post">
<div class="addcourse">
<input type="submit" value="Add course" name="submit">
</form>
</div>
<br>
</html>