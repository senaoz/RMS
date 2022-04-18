<?php
include("db.php");
$mail = $_GET['a'];
$sql = "UPDATE `users` SET `u_activate` = '1' WHERE `users`.`u_mail` = '$mail'";
$result = $db->query($sql);
header("Location: src/pages/adminTables.php");
?>
