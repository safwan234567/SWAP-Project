<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['studentloggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Add Review</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">

<body class="studentloggedin">
	<nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand" href="studenthome.php">EzeTuition</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="studentprofile.php"><i class="fas fa-user-circle"></i>Profile</a>
				</li>
				<li class="nav-item">
					<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				</li>
				</li>
			</ul>
		</div>
	</nav>
    
      </header>
      <br>
<div class="card">
        <br>
        <style type="text/css">
        body {
        text-align: center;
    }
    form {
        display: inline-block;
        width: 40%;
        margin: auto;
    }</style>
	
			
</body>



<form action="review.php" method ="POST">

<input type="radio" name="action" value="Add">Add
<input type="radio" name="action" value="Update">Update
<input type="radio" name="action" value="Delete">Delete
<input type="radio" name="action" value="listAll">List All
<p>
<form action="/addreview.html">


<div style="padding-bottom: 18px;font-size : 24px;">Review ID</div>
            <div style="padding-bottom: 18px;">Review ID<span style="color: red;"> *</span><br/>
            <input type="text" id="data_2" name="reviewID" style="max-width : 1000px;" class="form-control"/>
            </div><br>
            
            <div style="padding-bottom: 18px;font-size : 24px;">Reviewer</div>
            <div style="padding-bottom: 18px;">Reviewer<span style="color: red;"> *</span><br/>
            <input type="text" id="data_2" name="userName" style="max-width : 1000px;" class="form-control"/>
            </div>
            
            <div style="padding-bottom: 18px;font-size : 24px;">Product Bought</div>
            <div style="padding-bottom: 18px;">Product<span style="color: red;"> *</span><br/>
            <input type="text" id="data_2" name="productName" style="max-width : 1000px;" class="form-control"/>
            </div>

            <div style="padding-bottom: 18px;">Product Rating<span style="color: red;"> *</span><br/>
            <select id="data_4" name="productRating" style="max-width : 1000px;" class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
            </div>

			<div style="padding-bottom: 18px;font-size : 24px;">Reviews</div>
            <div style="padding-bottom: 20px;">Review<span style="color: red;"> *</span><br/>
            <textarea id="text" name="productReview" style="width : 480px;" rows="13" class="form-control"></textarea>
            </div>
            
               <div style="padding-bottom: 18px;font-size : 24px;">Date Posted</div>
            <div style="padding-bottom: 18px;">Date<span style="color: red;"> *</span><br/>
            <input type="text" id="data_2" name="datePosted" style="max-width : 1000px;" class="form-control"/>
            
            <div style="padding-bottom: 18px;">Would you recommend this product?<br/>
            <span><input type="radio" id="data_9_0" name="productRecommendation" value="Yes"/> Yes</span><br/>
            <span><input type="radio" id="data_9_1" name="productRecommendation" value="No"/> No</span><br/>
            <span><input type="radio" id="data_9_2" name="productRecommendation" value="I am not sure"/> I am not sure</span><br/>
            </div>
            
            </div>
            
            <tr>
		<td></td>
		<td><input type="submit" value="action"/></td>
	</tr>



	
</div>
</form> 

</body>
</html>
