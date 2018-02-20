<!DOCTYPE html>
<html>

<?php
session_start();
require "candyConnect.php";
$db = get_db();

$statement = $db->prepare("SELECT candy_item_id, candy_item_name, candy_item_price, candy_item_description,
                             candy_item_image FROM candy_item");
$statement->execute();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  while($row =  $statement->fetch(PDO::FETCH_ASSOC)) {
    array_push($_SESSION['orderItem'], (int) test_input($_POST["$row[candy_item_id]"]));
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
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
  <hr>
</div>
<div class="body">
  <p>Your Order Is:</p>
<?php
$i = 0;
$totalCost = 0;
$statement = $db->prepare("SELECT candy_item_id, candy_item_name, candy_item_price, candy_item_description,
                             candy_item_image FROM candy_item");
$statement->execute();

while($row =  $statement->fetch(PDO::FETCH_ASSOC)) {
  if($_SESSION['orderItem'][$i] > 0) {
    $count = $_SESSION['orderItem'][$i];
    $cost = number_format($count * $row["candy_item_price"], 2, ".", ",");
    echo "<p>$count x $row[candy_item_name] x $row[candy_item_price] =
              $$cost<br/>";
    $totalCost += $cost;
    $i++;
  }
}
echo "<br/>";
$totalCost = number_format($totalCost, 2, ".", ",");
echo "Total Cost = $$totalCost";
var_dump($_SESSION['orderItem']);
?>
<form action="submitOrder.php" method="POST">
  <input type="submit" value="Submit Order">
</form>
</body>
</html>
