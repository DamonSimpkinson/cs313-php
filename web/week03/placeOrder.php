<?php
session_start();
$name = validateInput($_POST['name']);
$address = validateInput($_POST['streetAddress']);
$city = validateInput($_POST['city']);
$state = validateInput($_POST['state']);
$zip = validateInput($_POST['zip']);

function validateInput($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Submission</title>
  <link rel="stylesheet" type="text/css" href="week03.css">
</head>
<body>
  <h1>Your order has been placed</h1>
  <p>Your order will be sent to:</p>
  <?php
  echo "$name <br/>";
  echo "$address <br/>";
  echo "$city, $state, $zip <br/>";
   ?>
   <br/>
   <p>Your order includes the following:</p>
   <?php
   $totalCost = 0;
   foreach ($_SESSION['duck_Count'] as $key => $value) {
     if($value > 0) {
       $price = $value * $_SESSION['duck_Cost'][$key];
       $cost = number_format($value * $_SESSION['duck_Cost'][$key], 2, ".", ",");
       echo "$value $key Ducks = $$cost<br/>";
       $totalCost += $price;
     }
   }
   $totalCost = number_format($totalCost, 2, ".", ",");
   echo "Total Cost = $$totalCost";
   ?>
 </body>
 </html>
