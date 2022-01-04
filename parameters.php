<?php
include("db.php");
$query = "SELECT * FROM `parameters` WHERE `Index` = 1";
$parameters = $db -> query($query);

$row = $parameters->fetch_row();
$MinPwd = (int) $row[1];
$MaxPwd = (int) $row[2];
$MaxCourse = (int) $row[3];
$MaxStuCourse = (int) $row[4];
$MaxProfCourse = (int) $row[5];
?>