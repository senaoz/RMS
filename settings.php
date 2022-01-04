<?php include("menu.php");
$u_mail = $_SESSION["u_mail"];
include("db.php");

$query = "SELECT * FROM `parameters`";
$result = $db->query($query);
$row = $result->fetch_row();

if (isset($_POST["save"])) {
    $MinPwd = $_POST["MinPwd"];
    $MaxPwd = $_POST["MaxPwd"];
    $MaxCourse = $_POST["MaxCourse"];
    $MaxStuCourse = $_POST["MaxStuCourse"];
    $MaxProfCourse = $_POST["MaxProfCourse"];

    include("db.php");
    $query = "UPDATE `parameters` SET `MinPwd`='$MinPwd',`MaxPwd`='$MaxPwd',`MaxCourse`='$MaxCourse',`MaxStuCourse`='$MaxStuCourse',`MaxProfCourse`='$MaxProfCourse' WHERE `Index`='1'";
    $result = $db->query($query);

    if ($result) {
        $message = "Settings are updated.";
    } else {
        $message = "Something wrong. Please try again.";
    }
} ?>

<html>
<head>
    <title>Settings</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 7%">
<br>
<h2 class="gradientText">Settings</h2>
<form action="settings.php" method="post">
    <div class="inlineBlock" style="padding-right: 1%;">
    <label>Minimum Password Length</label>
    <input type="number" name="MinPwd">
    <label>Maximum Password Length</label>
    <input type="number" name="MaxPwd">
    </div><div class="inlineBlock" style="padding-left: 1%;">
    <label>Maximum Course Number for Students</label>
    <input type="number" name="MaxStuCourse">
    <label>Maximum Course Number for Professors</label>
    <input type="number" name="MaxProfCourse">
    </div>
    <label>Maximum Course Number</label>
    <input type="number" name="MaxCourse">
    <input type="submit" name="save" value="save">
    <p align="center"><?php if(isset($message)) { echo $message; } ?></p>
</form>
</body>
</html>