<!DOCTYPE html>
<html>

<?php
session_start();
require "candyConnect.php";
$db = get_db();
$items = array();
$_SESSION['orderItem'] = $items;
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
	<div class="row">
		<div class="col-lg-12">
		  <h1  class="display-1 text-center">Candy Shoppe</h1>
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
		<form action="reviewOrder.php" id="orderSubmit" method="post">

<?php
$statement = $db->prepare("SELECT candy_item_id, candy_item_name, candy_item_price, candy_item_description,
                             candy_item_image FROM candy_item");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
	echo "<div class='row'>";
	echo "<div class='col-lg-3'>";
	echo "<img src='$row[candy_item_image]' alt='Missing Candy Photo'>";
	echo "</div>";
  echo "<div class='col-lg-6'>";
	echo "<label for'$row[candy_item_id]'>Order $row[candy_item_name]
           <input type='text' name='$row[candy_item_id]' size='3'>
           </label>";
	echo "<p>Cost - $$row[candy_item_price]</p>";
	echo "<p>Description - $row[candy_item_description]</p>";
	echo "</div>";
	echo "<div class='col-lg-3'>";
	echo "</div>";
	echo "</div>";
	echo "<br/>";
}
?>

<input type="submit" value="Review Order">
</form>

</body>
</html>
