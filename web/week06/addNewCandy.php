<!DOCTYPE html>
<html>

<?php
session_start();
?>

<head>
	<title>Candy Store</title>
<!--	<link rel="stylesheet" type="text/css" href="week06.css"> -->
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
    <div class ="row">
      <div class="col-lg-12">
        <h1 class="text-center">Enter a new candy item</h1>
      </div>
    </div>
    <nav class="navbar navbar-default">
 		 <div class="navbar-header">
 			  <a class="navbar-brand" href="#">Damon's Candy Shoppe</a>
 		 </div>
 		 <ul class="nav navbar-nav">
 			  <li class="active"><a href="candyShoppe.php">Return Home</a></li>
 				<li class="active"><a href="logout.php">Log Out</a></li>
 			</ul>
 		</nav>
    <div class="row">
      <div class="col-lg-3">
      </div>
      <div class="col-lg-6">
        <form action="addCandy.php" id="addCandy" method="post">
          <label for"candyName">Candy Name:
            <br/>
            <input type="text" name="candyName" size="20">
          </label>
          <br/>
          <lable for"candyCost">Candy Cost:
            <br/>
            <input type="text" name="candyCost" size="10">
          </label>
          <br/>
          <label for"candyImage">Image Filename:
            <br/>
            <input type="text" name="candyImage" size="20">
          </label>
          <br/>
          <label for"candyDesc">Candy Description:
            <br/>
            <textarea name="candyDesc" rows="4" cols="40"></textarea>
          </label>
          <br/>
          <input type="submit" value="Add Candy">
        </form>
      </div>
      <div class="col-lg-3">
      </div>
    </div>
  </div>
</body>
</html>
