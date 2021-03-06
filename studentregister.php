<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tuitionwebsite';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}

if(isset($_POST['g-recaptcha-response'])){
	$captcha=$_POST['g-recaptcha-response'];
  }
  if(!$captcha){
	echo '<h2>Please check the the captcha form.</h2>';
	exit;
  }
  $secretKey = "6LfOowQaAAAAABoT1fDzW49bgvjrQJHZPnP48yjE";
  $ip = $_SERVER['REMOTE_ADDR'];
  // post request to server
  $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
  $response = file_get_contents($url);
  $responseKeys = json_decode($response,true);
  // should return JSON with success as true
  if($responseKeys["success"]) {
		  echo '<h2>Thanks for being human</h2>';
  } else {
		  echo '<h2>You are spammer ! Get out</h2>';
  }

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}

if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
    exit('Username is not valid!');
}

if (preg_match('/[A-Za-z]+/', $_POST['firstname']) == 0) {
    exit('Name should only contain letters!');
}

if (preg_match('/[A-Za-z]+/', $_POST['lastname']) == 0) {
    exit('Name should only contain letters!');
}

if (preg_match('/[0-9]+/', $_POST['phonenumber']) == 0) {
    exit('Phone number is invalid!');
}

if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Password must be between 5 and 20 characters long!');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		// Username doesnt exists, insert new account
		if ($stmt = $con->prepare('INSERT INTO accounts (firstname, lastname, username, password, phonenumber, email, role) VALUES (?, ?, ?, ?, ?, ?, ?)')) {
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$password = password_hash(htmlspecialchars($_POST['password'], ENT_QUOTES), PASSWORD_DEFAULT);
			$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
			$firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
			$lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
			$phonenumber = htmlspecialchars($_POST['phonenumber'], ENT_QUOTES);
			$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
			$role = htmlspecialchars($_POST['role'], ENT_QUOTES);
			$stmt->bind_param('ssssiss', $firstname, $lastname, $username, $password, $phonenumber, $email, $role);
			$stmt->execute();
			echo 'You have successfully registered, you can now login!';
			header("refresh:2;url=studentlogin.html");
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>

