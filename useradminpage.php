<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<!-- MDB icon -->
	<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="css/style.css">
	<style>
    .featured-courses > .row {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
      }
      .featured-courses > .row > .col-4 {
        display: inline-block;
      }
      </style>
</head>

<body>
    
	<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<!-- MDB icon -->
	<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="css/style.css">
	<style>
    .featured-courses > .row {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
      }
      .featured-courses > .row > .col-4 {
        display: inline-block;
      }
      </style>
</head>

<body class="tutorloggedin">
    <br>
    <div class="container">
    <b><h1>User Admin</h1></b>
        <p>.</p>
      </div>
<br>
<div class="card">
    <br>
    <style type="text/css">
    body {
    text-align: center;
}
form {	
    display: inline-block;
    
}</style>
 
  
  </body>
  </html>
        
  
  </body>
  </html>

  <body>
<!-- html for the table and form-->

    <form action="useradminadduser.php" method="post">
        <table>
        <tr><td>First name:</td><td><input type="text" name="firstname"></td></tr>
        <tr><td>Last name: </td><td><input type="text" name="lastname"></td></tr>
        <tr><td>Username: </td><td><input type="text" name="username"></td></tr>
        <tr><td>Password: </td><td><input type="text" name="password"></td></tr>
        <tr><td>Phone number:</td><td><input type="text" name="phonenumber"></td></tr>
        <tr><td>Email: </td><td><input type="text" name="email"></td></tr>
        <tr><td>Role: </td><td><input type="text" name="role"></td></tr>
        <tr><td></td><td>
        <input type="submit" name="Submit" value="Register"></td></tr>
        </table>
</br>
    </form>
</body>
  <?php
// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tuitionwebsite';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
else {
    $query= $con->prepare("Select id, firstname, lastname, username, password, phonenumber, email, role from accounts");
    $query->execute();
    $query->store_result();
    $query->bind_result($id, $firstname, $lastname, $username, $password, $phonenumber, $email, $role);
    if($query->num_rows === 0) exit('No rows');
    echo "<table border=1>";
    echo "<tr><td>ID</td><td>First name</td><td>Last name</td><td>Username</td><td>Password</td><td>Phone Number</td><td>Email</td><td></td>"; 
    while($query->fetch()){
        echo "<tr><td>". $id."</td><td>". $firstname."</td><td>". $lastname."</td><td>". $username. "</td><td>". $password. "</td><td>". $phonenumber."</td><td>". $email."</td><td>". $role."</td><td>";
        //edit course button
        echo "</td><td><form action='useradmineditpage.php' method ='post'>";
        echo '<input type=hidden name="id" value="'.$id.'">';
        echo "<input type='submit' name='edit' value='Edit'></form></td><td>";

        //delete course button
        echo "</td><td><form action='useradmindelete.php' method ='post'>";
        echo '<input type=hidden name="id" value="'.$id.'">';
        echo "<input type='submit' name='delete' value='Delete'></form></td></tr>";
    }

    echo "</table>";

}
$con->close();

?>