<?php
$con = mysqli_connect("localhost","root","","tuitionwebsite");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

$reviewID = $_POST["reviewID"];

$query= $con->prepare("Delete from product_review where reviewID = ?");
$query->bind_param('i', $reviewID);

if ($query->execute()){  //execute query
    echo "Query executed. Database updated. ";
    header("http://localhost/SWAPProjectmaster2/SWAP-Project-master/addreview.php");
}else{
    echo $query->error;
    echo "Error executing query.";
    header("location:http://localhost/SWAPProjectmaster2/SWAP-Project-master/addreview.php");
}

?>