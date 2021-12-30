<?php
include("db.php");
$query = "SELECT * FROM `parameters` WHERE `Index` = 1";
$parameters = $db -> query($query);

$row = $parameters->fetch_row();
$MinPwd = $row[1];
$MaxPwd = $row[2];
$MaxCourse = $row[3];
$MaxStuCourse = $row[4];
$MaxProfCourse = $row[5];
?>