<!DOCTYPE html>
<html>

<?php
session_start();
require "candyConnect.php";
insertOrder();
header('location: candyShoppe.php');

function insertOrder() {
  for ($i = 0; $i < count($_SESSION['orderItem']); $i++) {
    if($_SESSION['orderItem'][$i] > 0) {
      $order = 'INSERT INTO order_item (customer_id , candy_item_id, number_ordered)
                     VALUES (:cust, :candy, :num)';
      $db = get_db();
      $stmt = $db->prepare($order);
      $stmt->bindValue(':cust', $_SESSION["usrID"]);
      $stmt->bindValue(':candy', $i + 1);
      $stmt->bindValue(':num', $_SESSION['orderItem'][$i]);
      $stmt->execute();
    }
  }
}

?>
</html>
