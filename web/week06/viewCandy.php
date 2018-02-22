<!DOCTYPE html>
<html>

<?php
require_once "candyConnect.php";
$db = get_db();
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
			<div class="col-lg-12">
				<h1 class="text-center">Candy Shoppe</h1>
				<h3 class="text-center">Select a Candy to View from the drop down menu</h3>
			</div>
		</div>


<?php
$statement = $db->prepare("SELECT candy_item_id, candy_item_name FROM candy_item");
$statement->execute();
?>

<form action="viewCandy.php" method="POST">
	<select name="candy_select" id="candy_select" onchange="submit()">
		<option value="none">None</option>

<?php
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
	echo "<option value=$row[candy_item_id]>";
	echo "$row[candy_item_name]</option>";
}
?>
  </select>
</form>

<?php
if (isset($_POST['candy_select'])) {
	$candy = $_POST['candy_select'];
	$item = $db->prepare("SELECT candy_item_name, candy_item_price, candy_item_description,
		                           candy_item_image
		                    FROM candy_item
	                      WHERE candy_item_id = ?");
	$item->execute([$candy]);
	$display = $item->fetch();
	echo "<br/>";
	echo "<div class='row'>";
	echo "<div class='col-lg-3'>";
	echo "<img src='$display[candy_item_image]' alt='Missing Candy Photo'>";
	echo "</div>";
	echo "<div class='col-lg-6'>";
	echo "<p>Name - $display[candy_item_name]</p>";
	echo "<p>Cost - $$display[candy_item_price]</p>";
	echo "<p>Description - $display[candy_item_description]</p>";
	echo "</div>";
	echo "<div class='col-lg-3'>";
	echo "</div>";
	echo "</div>";
	echo "<br/>";
}
?>

</body>
</html>
