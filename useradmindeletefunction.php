<?php
$con = mysqli_connect("localhost","root","","tuitionwebsite");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

$username = $_POST["username"];
$query= $con->prepare("Delete from accounts where username = ?");
$query->bind_param('s', $username);

if ($query->execute()){  //execute query
    echo "Query executed. Database updated. ";
    header("location:http://localhost/tuitionwebsite/useradminpage.php");
}else{
    echo $query->error;
    echo "Error executing query.";
    header("location:http://localhost/tuitionwebsite/useradminpage.php");
}

?>