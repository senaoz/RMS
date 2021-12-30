<?php
include("db.php");
$mail = $_GET['d'];
unset($_SESSION["$mail"]);
$sql = "UPDATE `users` SET `u_activate` = '0' WHERE `users`.`u_mail` = '$mail'";
$result = $db->query($sql);
header("Location: tables.php");
?>