<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>CheckOut</title>
  <link rel="stylesheet" type="text/css" href="week03.css">
</head>
<body class="page">
  <div class="heading">
    <h3>Checkout</h3>
    <h5>Please take this time to verify that your order is correct and enter your
      shipping information</h5>
  </div>
  <div class="selections">
    <a href="index.php">Return to Shopping</a><br/>
  </div>
  <div class="body">
    <form action="placeOrder.php" id="placeOrder" method="post">
    <label for"userName">Name:
      <input type="text" name="name" size="30">
    </label>
    <br/>
    <label for"streetAddress">Street Address:
      <input type="text" name="streetAddress" size="30">
    </label>
    <br/>
    <label for"city">City:
      <input type="text" name="city" size="30">
    </label>
    <br/>
    <label for"state">State:
      <input type="text" name="state" size="2">
    </label>
    <br/>
    <label for"zip">Zip:
      <input type="text" name="zip" size="5">
    </label>
    <br/>
    <input type="submit" value="Place Order">
  </form>
  </div>
