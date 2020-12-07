<?php 
session_regenerate_id();
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
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
    font-family: Arial;
    font-size: 17px;
    padding: 8px;
}

* {
    box-sizing: border-box;
}

.row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
    margin: 0 -16px;
}

.col-25 {
    -ms-flex: 25%; /* IE10 */
    flex: 25%;
}

.col-50 {
    -ms-flex: 50%; /* IE10 */
    flex: 50%;
}

.col-75 {
    -ms-flex: 75%; /* IE10 */
    flex: 75%;
}

.col-25,
.col-50,
.col-75 {
    padding: 0 16px;
}

.container {
    background-color: #f2f2f2;
    padding: 5px 400px 15px 20px;
    border: 1px solid lightgrey;
    border-radius: 3px;
    
}

input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

label {
    margin-bottom: 10px;
    display: block;
}

.icon-container {
    margin-bottom: 20px;
    padding: 7px 0;
    font-size: 24px;
}

.btn {
    background-color: #4CAF50;
    color: white;
    padding: 5px 400px 15px 20px;
    margin: 10px 0;
    border: none;
    width: 100%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
}

.btn:hover {
    background-color: #45a049;
}

a {
    color: #2196F3;
}

hr {
    border: 1px solid lightgrey;
}

span.price {
    float: right;
    color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
    .row {
        flex-direction: column-reverse;
    }
    .col-25 {
        margin-bottom: 20px;
    }
}
</style>
</head>
<body>

<h2> Edit payment details </h2>

<div class="row">
<div class="col-75">
<div class="container">
<form action="edit_payment.php" method="post">

<div class="row">


<input type="hidden" name="id">
<label for="cname">Name on Card</label>
<input type="text" id="cname"  value="<?php echo $name?>" name="name">
<label for="ccnum">Credit card number</label>
<input type="text" id="ccnum"  value="<?php echo $number?>" name="number">

<div class="row">
<div class="col-50">
<label for="expdate">Expiry</label>
<input type="text" id="expdate"  value="<?php echo $expiry?>" name="expiry">
</div>
<div class="col-50">
<label for="cvv">CVV</label>
<input type="text" id="cvv"  value="<?php echo $cvv?>" name="cvv">
</div>
</div>
</div>
</div>
<input type="submit" value="confirm payment" class="btn">
</form>
</div>
</div>
</body>
</html>
<?php 
$name=$_POST["name"];
$number=$_POST["number"];
$expiry=$_POST["expiry"];
$cvv=$_POST["cvv"];

$query=$con->prepare("UPDATE payment_detail SET name=?, number=?, expiry=?, cvv=? WHERE name=?");
$query->bind_param('sssss' , $name, $number, $expiry, $cvv, $name);
if ($query->execute()){  //execute query
    echo "Query executed. Database updated. ";
}else{
    echo $query->error;
    echo "Error executing query.";
}?>
