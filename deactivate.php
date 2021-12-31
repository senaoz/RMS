<?php
include("db.php");
$mail = $_GET['d'];  That professor is teaching courses, are you sure you want to deactivate?

$users = $db->query("SELECT * FROM `users` WHERE `u_mail` = '$mail'");
$row = $users->fetch_row();
$role = $row[8];

if ($role == 'Admin')
$sql = "UPDATE `users` SET `u_activate` = '0' WHERE `users`.`u_mail` = '$mail'";
$result = $db->query($sql);
unset($_SESSION["$mail"]);
header("Location: tables.php");

?>