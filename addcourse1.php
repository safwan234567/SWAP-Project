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
include('inputValidation.php');
// echo $_POST['coursename'].'<br>'.$_POST['coursedesc'].'<br>'.$_POST['tutorinfo'].'<br>'.$_POST['price'].'<br>'.$_POST['numberoflectures'].'<br>';
if (isset($_POST['coursename'], $_POST['coursedesc'], $_POST['tutorinfo'], $_POST['price'], $_POST['numberoflectures'])) {
// Now we check if the data was submitted, isset() function will check if the data exists.
	if (!empty($_POST['coursename']) || !empty($_POST['coursedesc']) || !empty($_POST['tutorinfo']) || !empty($_POST['price']) || !empty($_POST['numberoflectures'])) {
	// One or more values are empty.
					$coursename=$_POST['coursename'];
					$coursedesc=$_POST['coursedesc'];
					$tutorinfo=$_POST['tutorinfo'];
					$price=$_POST['price'];
					$NoL=$_POST['numberoflectures'];
					if(inputValidation($coursename,$coursedesc,$tutorinfo,$price,$NoL) == 1){
						// We need to check if the account with that username exists.
					if ($stmt = $con->prepare('SELECT id FROM courses WHERE coursename = ?')) {
						// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
						$stmt->bind_param('s', $coursename);
						$stmt->execute();
						$stmt->store_result();
						// Store the result so we can check if the account exists in the database.
						if ($stmt->num_rows > 0) {
							// Username already exists
							echo 'coursename exists, please choose another!';
						} else {
							// Username doesnt exists, insert new account

					if ($stmt = $con->prepare('INSERT INTO courses (teacherID, coursename, coursedesc, tutorinfo, price, numberoflectures) VALUES (?,?,?,?,?,?)')) {
						// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
						echo $_SESSION['teacherID'];
						$stmt->bind_param('ssssii', $_SESSION['id'], $coursename, $coursedesc, $tutorinfo, $price, $NoL);
						if($stmt->execute()){
						echo 'You have successfully created a course! Redirecting you in a bit!';
						header("refresh:1;url=viewcourses.php");
						}
						else{
							echo 'fix your code pls';
						}
					} else {
						// Something is wrong with the sql statement, check to make sure students table exists with all 3 fields.
						echo 'Could not prepare statement!';
					}
						}
						$stmt->close();
					} else {
						// Something is wrong with the sql statement, check to make sure students table exists with all 3 fields.
						echo 'Could not prepare statement!';
					}
					$con->close();
					}
					else{
						echo 'fuck off';
					}
	}
	else{
		exit('Please complete the form');
	}
	// Could not get the data that should have been sent.
	
}
else{
	exit('Please complete the form!');
}
// Make sure the submitted registration values are not empty.






?>