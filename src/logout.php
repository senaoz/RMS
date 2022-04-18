<?php
session_start();
unset($_SESSION["u_mail"]);
session_destroy();
header("Location: index.php");
?>