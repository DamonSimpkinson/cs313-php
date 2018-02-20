<?php
//session_unset($_SESSION["loginFail"]);
session_destroy();
header('location: index.php');
?>
