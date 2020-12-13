<?php
// We need to use sessions, so you should always start sessions using the below code.

// If the user is not logged in redirect to the login page...

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tuitionwebsite';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} 
else {
    $password = password_hash(htmlspecialchars($_POST['password'], ENT_QUOTES), PASSWORD_DEFAULT);
	$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
	$firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
	$lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
	$phonenumber = htmlspecialchars($_POST['phonenumber'], ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
	$role = htmlspecialchars($_POST['role'], ENT_QUOTES);
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $query= $con->prepare("Update accounts SET firstname=?, lastname=?, username=?, password=?, phonenumber=?, email=?, role=? where id =?");
    $query->bind_param('ssssissi', $firstname, $lastname, $username, $password, $phonenumber, $email, $role, $id); //bind the parameters

    if ($query->execute()){  //execute query
        echo "Successfully updated course! Redirecting you in a bit!";
        header("refresh:1;url=useradminpage.php");

    }else{
        echo $query->error;
        echo "Error executing query.";
    }
}}
$con->close();
?>