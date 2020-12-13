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

$name= $_POST["name"];

$query=$con->prepare("DELETE FROM payment_detail where name=?");
$query->bind_param('s' ,$name);
if ($query->execute()){
    echo "Query executed. column deleted. ";
    
}else{
    echo $query->error;
    echo "Error executing query.";
}
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
    padding: 5px 20px 15px 20px;
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
    padding: 12px;
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

<h2> Checkout </h2>

<div class="row">
<div class="col-75">
<div class="container">
<form action="confirm_payment.php" method="post">

<div class="row">

<div class="col-50">
<h3>Payment</h3>
<label for="fname">Accepted Cards</label>
<div class="icon-container">
<i class="fa fa-cc-visa" style="color:navy;"></i>
<i class="fa fa-cc-amex" style="color:blue;"></i>
<i class="fa fa-cc-mastercard" style="color:red;"></i>
<i class="fa fa-cc-discover" style="color:orange;"></i>
</div>
<input type="hidden" name="id">
<label for="cname">Name on Card</label>
<input type="text" id="cname"  placeholder="Name on card" name="name">
<label for="ccnum">Credit card number</label>
<input type="text" id="ccnum"  placeholder="Credit/Debit card number" name="number">

<div class="row">
<div class="col-50">
<label for="expdate">Expiry</label>
<input type="text" id="expdate"  placeholder="Expiry date(MM/YY)" name="expiry">
</div>
<div class="col-50">
<label for="cvv">CVV</label>
<input type="text" id="cvv"  placeholder="CVV" name="cvv">
</div>
</div>
</div>

</div>




<input type="submit" value="Continue to checkout" class="btn">

</form>
</div>
</div>
<div class="col-25">
<div class="container">
<h4>product summary <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
<br>
<p>tution fee <span class="price">$50</span></p>


<hr>
<p>Total <span class="price" style="color:black"><b>$50</b></span></p>
</div>
</div>
</div>

</body>
</html>




