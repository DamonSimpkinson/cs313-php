<!DOCTYPE html>
<html>

<?php
session_start();
require_once "candyConnect.php";
//require "verifyData.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION["usrNm"] = test_input($_POST["userName"]);
  $_SESSION["usrPss"] = test_input($_POST["userPassword"]);
  verifyLogin();
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function verifyLogin() {
  $db = get_db();
  $statement = $db->prepare("SELECT customer_id, user_name, password FROM customer");
  $statement->execute();
  $validResult = false;

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    if ($_SESSION['usrNm'] == $row['user_name'] &&
        $_SESSION['usrPss'] == $row['password']) {
          $_SESSION["loginFail"] = false;
          $_SESSION["usrID"] = $row["customer_id"];
          $validResult = true;
          header('location: candyShoppe.php');
    }
  }
  $_SESSION["loginFail"] = true;
  if ($validResult == true) {
    header('location: candyShoppe.php');
  }
  else {
    header('location: index.php');
  }
}
?>

</html>
