<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tuitionwebsite';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
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

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
if ($stmt = $con->prepare('SELECT id, password, role FROM accounts WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    
	$stmt->bind_param('s', $username);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $role);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            
            if ($role=="tutor"){
                        session_regenerate_id();
                    
                        $_SESSION['tutorloggedin'] = TRUE;
                        $_SESSION['name'] = $_POST['username'];
                        $_SESSION['id'] = $id;
                        header('Location: tutorhome.php');
                        
                    } else {
                        // Incorrect password
                        echo 'Incorrect username and/or password!';
                    }
        } else {
            // Incorrect username
            echo 'Incorrect username and/or password!';
        }

	$stmt->close();
}

}
else{
    echo 'error';
}
?>
