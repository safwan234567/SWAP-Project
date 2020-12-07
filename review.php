<html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Reviews</title>
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

$con = mysqli_connect("localhost","root","","tuitionwebsite");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}


$action = $_POST["action"];
$add = $action === "Add";
$update = $action === "Update";
$delete = $action === "Delete";

if($add || $update || $delete ){
}
    $reviewID = $_POST["reviewID"];
    $userName = $_POST["userName"];
    $productName = $_POST["productName"];
    $productRating = $_POST["productRating"];
    $productReview = $_POST["productReview"];
    $datePosted = $_POST["datePosted"];
    $productRecommendation = $_POST["productRecommendation"];
    //echo "<tr><td>". $reviewID . </td><td>" . $userName ."</td><td>". $productName ."</td><td>". $productRating . "</td><td>". $productReview. "</td><td>". $datePosted ."</td></td>" . $ProductRecomendation . "</td></tr>";
    //echo $add  ." ". $delete . " " . $update ;
    

    if($add){
        $query= $con->prepare("INSERT INTO product_review VALUES (?,?,?,?,?,?,?)");
        $query->bind_param('ississs', $reviewID, $userName, $productName, $productRating, $productReview, $datePosted, $productRecommendation); //bind the parameters
        
        if ($query->execute()){  //execute query
            echo "Query executed. Database has been updated. ";
        }else{
            echo $query->error;
            echo "Error executing query.";
        }
    }
    else if($update){
        $query= $con->prepare("Update product_review SET userName=?, productName=?, productRating=?, productReview=?, datePosted=?, productRecommendation=? where reviewID =?");
        $query->bind_param('ssisssi', $userName, $productName, $productRating, $productReview, $datePosted, $productRecommendation, $reviewID); //bind the parameters
        
        if ($query->execute()){  //execute query
            echo "Query executed. Database has been updated. ";
        }else{
            echo $query->error;
            echo "Error executing query.";
        }
        
        
    }else if($delete){
        echo "<form action='todelete.php' method='post'><br>";
        echo "Are you sure you want to delete item " .$reviewID. "? <br>";
        echo "<input type='hidden' name='reviewID' value='" .$reviewID."'>";
        echo "<input type='submit' value='Delete'>";
        echo"</form>";
        /*
         $query= $con->prepare("Delete from reviews where reviewID = ?");
         $query->bind_param('i', $reviewID); //bind the parameters
         */
    }
    
else {
    $query= $con->prepare("Select reviewID, userName, productName, productRating, productReview, datePosted, productRecommendation from product_review");
    $query->execute();
    $query->store_result();
    $query->bind_result($reviewID, $userName, $productName, $productRating, $productReview, $datePosted, $productRecommendation);
    if($query->num_rows === 0) exit('No rows');
    echo "<h2>Reviews</h2>";
    echo "<table border=1>";
    echo "<tr><td>Review ID</td><td>Username</td><td>Product Name</td><td>Product Rating</td><td>Product Review</td><td>Date Posted</td><td>Product Recommendation</td></tr>";
    while($query->fetch()){
        echo "<tr><td>". $reviewID. "</td><td>" . $userName ."</td><td>". $productName ."</td><td>". $productRating . "</td><td>". $productReview. "</td><td>". $datePosted . "</td><td>". $productRecommendation . "</td></tr>";
    }
    
    echo "</table>";
    
}





$con->close();

?>





</body>
</html>





