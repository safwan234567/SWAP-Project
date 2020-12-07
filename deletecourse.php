<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tuitionwebsite';
include 'viewcourses.php';
$coursename=$_POST['coursename'];
        echo "<form action='todelete.php' method='post'><br>";
        echo "Are you sure you want to delete item " .$coursename. "? <br>";
        echo "<input type='hidden' name='productname' value='" .$coursename."'>";
        echo "<input type='submit' value='Delete'>";
        echo"</form>";
?>