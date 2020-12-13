<?php
$con = mysqli_connect("localhost","root","","tuitionwebsite");
if (!$con){
    die('Could not connect: ' . mysqli_connect_errno());
}

$coursename = $_POST["coursename"];
$query= $con->prepare("Delete from courses where coursename = ?");
$query->bind_param('s', $coursename);

if ($query->execute()){  //execute query
    echo "Query executed. Database updated. ";
    header("location:http://localhost/tuitionwebsite/viewcourses.php");
}else{
    echo $query->error;
    echo "Error executing query.";
    header("location:http://localhost/tuitionwebsite/viewcourses.php");
}

?>