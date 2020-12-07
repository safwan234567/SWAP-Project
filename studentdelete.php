<?php 
$con = mysqli_connect("localhost","root","","tuitionwebsite");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

session_start();

if (!isset($_SESSION['studentloggedin'])) {
	header('Location: index.html');
	exit;
}

$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();



$username = $_SESSION["name"];
$query= $con->prepare("DELETE FROM accounts where username = ?");
$query->bind_param('s', $username); 

if ($query->execute()){  //execute query
    echo "Query executed. Database updated. ";
    session_destroy();
    header("location:http://localhost/tuitionwebsite/index.html");
}else{
    echo $query->error;
    echo "Error executing query.";
}

?>