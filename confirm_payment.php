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




// no data recieved
if (!isset($_POST['name'], $_POST['number'], $_POST['expiry'], $_POST['cvv'])) {
    exit('Uhoh! form seems empty.');
}
// make sure form not empty
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

?>

<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>confirm payment</title>
</head>
<style>
.center {
  margin: auto;
  width: 60%;
  border: 3px solid #c0e1c1;
  padding: 10px;
  background-color: #c0e1c1;
  font-size:20px
}
a {font-size:20px;}

</style>
<body>
<?php
$id=$_POST["id"];
$name=$_POST["name"];
$number=$_POST["number"];
$expiry=$_POST["expiry"];
$cvv=$_POST["cvv"];
$hash_number= hash('md5', $number);

//add
$query= $con->prepare("INSERT INTO payment_detail VALUES (?,?,?,?,?)");
$query->bind_param('issss', $id, $name, $hash_number, $expiry, $cvv); //bind the parameters

if ($query->execute()){  //execute query
    echo "Query executed. added to database. ";
    echo $id;
    
}else{
    echo $query->error;
    echo "Error executing query.";
}
?>
<div class="center">
<h1>confirm your details</h1><br>


 

<?php 
$query=$con->prepare("SELECT * FROM payment_detail WHERE name=?");
$query->bind_param('s' ,$name);
$res=$query->execute();
$query->store_result();
$query->bind_result($rid, $rname, $rnumber, $rexpiry, $rcvv);
$query->fetch();
?>
<a>Name:</a><br>
<a><?php echo  $rname?></a><br><br>
<a>Card number:</a><br>
<a><?php echo  $rnumber?></a><br><br>
<a>Expiry:</a><br>
<a><?php echo  $rexpiry?></a><br><br>
<a>CVV:</a><br>
<a><?php echo  $rcvv?></a><br><br>

<div class="w3-container">
<form action="edit_payment.php" method="post">
<input type='hidden' name='name' value='<?php echo $name?>'>
<input type='hidden' name='number' value='<?php echo $number?>'>
<input type='hidden' name='expiry' value='<?php echo $expiry?>'>
<input type='hidden' name='cvv' value='<?php echo $cvv?>'>
<input type="submit" class="w3-button w3-black" value="Edit Card details">
</form>
<form action="delete_payment.php" method="post">
<input type='hidden' name='name' value='<?php echo $name?>'>
<input type="submit" class="w3-button w3-black" value="Use another card">
</form>
<form action="courselist.php" method="post">
<input type="submit" class="w3-button w3-black" value="confirm">



</div></div>
</body>
</html>
