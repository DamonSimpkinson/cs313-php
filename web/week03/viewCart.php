<?php
session_start();
$_SESSION['duck_Count']['Freud'] = validateInput($_POST["countFreudDuck"]);
$_SESSION['duck_Count']['Scarface'] = validateInput($_POST["countScarfaceDuck"]);
$_SESSION['duck_Count']['Super'] = validateInput($_POST["countSuperDuck"]);
$_SESSION['duck_Count']['1000'] = validateInput($_POST["count1000Duck"]);
$_SESSION['duck_Count']['Giant'] = validateInput($_POST["countGiantDuck"]);
$_SESSION['duck_Count']['Tech'] = validateInput($_POST["countTechDuck"]);
$_SESSION['duck_Count']['Workout'] = validateInput($_POST["countWorkoutDuck"]);
$_SESSION['duck_Count']['Spock'] = validateInput($_POST["countSpockDuck"]);
$_SESSION['duck_Count']['Ninja'] = validateInput($_POST["countNinjaDuck"]);

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
  <title>View Cart</title>
  <link rel="stylesheet" type="text/css" href="week03.css">
</head>
<body class="page">
  <div class="heading">
    <h3>Your Cart</h3>
  </div>
  <div class="selections">
    <a href="index.php">Return To Shopping</a><br/>
    <a href="checkout.php">Checkout</a>
  </div>
  <div class="body">
    <p>Your Order is for</p>
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
  </div>
</body>
</html>
