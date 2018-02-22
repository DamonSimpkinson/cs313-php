<!DOCTYPE html>
<html>

<?php
session_start();
require_once "candyConnect.php";
require_once "verifyData.php";
//$db = get_db();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $candyName = test_input($_POST["candyName"]);
  $candyCost = test_input($_POST["candyCost"]);
  $candyDesc = test_input($_POST["candyDesc"]);
  $candyImage = test_input($_POST["candyImage"]);
}

$newCandy = 'INSERT INTO candy_item(candy_item_name, candy_item_price, candy_item_description, candy_item_image)
                        VALUES (:name, :cost, :desc, :image)';
$candyDB = get_db();
$stmt = $candyDB->prepare($newCandy);
$stmt->bindValue(':name', $candyName);
$stmt->bindValue(':cost', $candyCost);
$stmt->bindValue(':desc', $candyDesc);
$stmt->bindValue(':image', $candyImage);
$stmt->execute();

header('location: candyShoppe.php');
?>
