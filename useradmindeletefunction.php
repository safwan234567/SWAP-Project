<?php
$con = mysqli_connect("localhost","root","","tuitionwebsite");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

$id = $_POST["id"];
$query= $con->prepare("Delete from accounts where id = ?");
$query->bind_param('i', $id);

if ($query->execute()){  //execute query
    echo "Query executed. Database updated. ";
    header("location:http://localhost/tuitionwebsite/useradminpage.php");
}else{
    echo $query->error;
    echo "Error executing query.";
    header("location:http://localhost/tuitionwebsite/useradminpage.php");
}

?>