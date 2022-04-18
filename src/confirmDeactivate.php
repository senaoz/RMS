<?php include("db.php"); $mail = $_GET['d'];
$result = $db->query("UPDATE `users` SET `u_activate` = '0' WHERE `users`.`u_mail` = '$mail'");
unset($_SESSION["$mail"]); header("Location: adminTables.php"); ?>