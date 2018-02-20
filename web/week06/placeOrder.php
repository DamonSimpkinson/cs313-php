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
	<link rel="stylesheet" type="text/css" href="week06.css">
</head>
<body>
<div class="heading">
  <h1>Candy Shoppe</h1>
</div>
<div class="navBar">
  <a href="candyShoppe.php">Return Home</a>
	<a href="logout.php">Log Out</a>
  <hr>
</div>
<form action="reviewOrder.php" id="orderSubmit" method="post">
<?php
$statement = $db->prepare("SELECT candy_item_id, candy_item_name, candy_item_price, candy_item_description,
                             candy_item_image FROM candy_item");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  //array_push($_SESSION["orderItem"], $row["candy_item_id"]);
  echo "<label for'$row[candy_item_id]'>Order $row[candy_item_name]
           <input type='text' name='$row[candy_item_id]' size='3'>
           </label>";
	echo "<p>Cost - $$row[candy_item_price]</p>";
	echo "<p>Description - $row[candy_item_description]</p>";
	echo "<img src='$row[candy_item_image]' alt='Missing Candy Photo'>";
  echo "<br/><br/>";
}
?>

<input type="submit" value="Review Order">
</form>

</body>
</html>
