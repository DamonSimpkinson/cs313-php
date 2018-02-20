<!DOCTYPE html>
<html>

<?php
session_start();
require "candyConnect.php";

if($_SESSION["loginFail"] != true){
  $_SESSION["loginFail"] = false;
}

?>

<head>
  <title>Candy Store Login</title>
  <link rel="stylesheet" type="text/css" href="week06.css">
</head>
<body>
<div class="heading">
  <h1>Welcome to Damon's</h1>
  <h1>Candy Shoppe</h1>
</div>

<?php
if($_SESSION["loginFail"] == true){
  echo "<p class='login'>User Name or Password Invalid</p>";
}
?>

<form action="verifyLogin.php" id="login" method="post">
<div class="login">
  <h4>
    <label for"userName">User Name:
      <input type="text" name="userName" size="20">
    </label>
    <br/>
    <label for"userPassword">Password:
      <input type="password" name="userPassword" size="20">
    </label>
    <br/>
    <input type="submit" value="submit">
</div>
</form>
</html>
