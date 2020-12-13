<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tuitionwebsite';
include 'useradminpage.php';
$id=$_POST['id'];

        echo "<form action='useradmindeletefunction.php' method='post'><br>";
        echo "Are you sure you want to delete account " .$id. "? <br>";
        echo "<input type='hidden' name='id' value='" .$id."'>";
        echo "<input type='submit' value='Delete'>";
        echo"</form>";
?>