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
    $query= $con->prepare("Update courses SET coursedesc=?, tutorinfo=?, price=?, numberoflectures=?, myFile=? where coursename =?");
    $query->bind_param('ssiiss', $coursedesc, $tutorinfo, $price, $numberoflectures, $myFile, $coursename); //bind the parameters
    
    if ($query->execute()){  //execute query
        echo "Successfully updated course! Redirecting you in a bit!";
        header("refresh:1;url=viewcourses.php");

    }else{
        echo $query->error;
        echo "Error executing query.";
    }
}
$con->close();
?>