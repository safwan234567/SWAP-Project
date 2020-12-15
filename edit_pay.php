<?php
session_start();
if(!isset($_SESSION['studentloggedin'])) {
    header('Location: index.html');
    exit;
}
$con = mysqli_connect("localhost","root","","tuitionwebsite");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}
else{
    echo "connection success". "<br>";
}
$name=$_POST["name"];
$number=$_POST["number"];
$expiry=$_POST["expiry"];
$cvv=$_POST["cvv"];

if (empty($_POST['name']) || empty($_POST['number']) || empty($_POST['expiry']) || empty($_POST['cvv'])) {
    exit('Uhoh! form seems empty.');
}

if (preg_match('/[A-Za-z]+/', $_POST['name']) == 0) {
    exit('Enter a valid name.');
}

if (preg_match('/[0-9]{16}/', $_POST['number']) == 0) {
    exit('Enter a 16 digit card number.');
}

if (preg_match('#^(0[1-9]|1[0-2])/(2[0-9])$#', $_POST['expiry']) == 0) {
    exit('Enter a valid date in MM/YY format');
}
if (preg_match('/^[0-9]{3}$/', $_POST['cvv']) == 0) {
    exit('Enter a 3 digit number');
}

$hash_number= hash('md5', $number);
$query=$con->prepare("UPDATE payment_detail SET name=?, number=?, expiry=?, cvv=? WHERE name=?");
$query->bind_param('sssss' , $name, $hash_number, $expiry, $cvv, $name);
if ($query->execute()){  //execute query
    
    echo 'You have successfully edited your details! Redirecting you in a bit!';
    header("refresh:1;url=courselist.php");
}else{
    echo $query->error;
    echo "Error executing query.";
}?>
