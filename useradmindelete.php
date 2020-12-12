<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tuitionwebsite';
include 'useradminpage.php';
$username=$_POST['username'];
       
        echo "<form action='useradmindeletefunction.php' method='post'><br>";
        echo "Are you sure you want to delete account " .$username. "? <br>";
        echo "<input type='hidden' name='username' value='" .$username."'>";
        echo "<input type='submit' value='Delete'>";
        echo"</form>";
?>