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

$stmt = $con->prepare('SELECT email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

$_POST['update'] === 'update';
$username = htmlspecialchars($_SESSION["name"], ENT_QUOTES);
$email = htmlspecialchars($_POST["email"], ENT_QUOTES);
$firstname = htmlspecialchars($_POST["firstname"], ENT_QUOTES);
$lastname = htmlspecialchars($_POST["lastname"], ENT_QUOTES);
$phonenumber = htmlspecialchars($_POST["phonenumber"], ENT_QUOTES);

$id = $_SESSION['id'];
echo $email;
		$query= $con->prepare('UPDATE accounts SET email=?, firstname=?, lastname=?, phonenumber=? WHERE id =?');
		$query->bind_param('ssssi', $email, $firstname, $lastname, $phonenumber, $id); //bind the parameters
		
		if ($query->execute()){  //execute query
			echo "Query executed. Database updated. ";
			header("refresh:1;url=studentprofile.php");
		}else{
		    echo $query->error;
		    echo "Error executing query.";
		}
		

	
$con->close();
	
?>