<!DOCTYPE html>
<html>

<?php
require "candyConnect.php";
$db = get_db();
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
	echo "<p>Candy Name - $display[candy_item_name]</p>";
	echo "<p>Cost - $$display[candy_item_price]</p>";
	echo "<p>Description - $display[candy_item_description]</p>";
	echo "<img src='$display[candy_item_image]' alt='Missing Candy Photo'>";
}
?>

</body>
</html>
