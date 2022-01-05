<?php include("db.php"); $mail = $_GET['d'];
$sql = "UPDATE `users` SET `u_activate` = '0' WHERE `users`.`u_mail` = '$mail'";
$result = $db->query($sql);
unset($_SESSION["$mail"]);
header("Location: adminTables.php"); ?>