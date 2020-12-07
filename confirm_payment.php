<?php 
session_regenerate_id();
$con = mysqli_connect("localhost","root","","tuitionwebsite");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}
else{
    echo "connection success". "<br>";
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

//add
$query= $con->prepare("INSERT INTO payment_detail VALUES (?,?,?,?,?)");
$query->bind_param('issss', $id, $name, $number, $expiry, $cvv); //bind the parameters

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

function functionName() {
 

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
<form action="index.php" method="post">
<input type="submit" class="w3-button w3-black" value="confirm">



</div></div>
</body>
</html>