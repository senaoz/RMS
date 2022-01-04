<?php
include("db.php"); include ("parameters.php");
$mail = $_GET['drop'];
$c_id = $_GET['c_id'];

$CourseCountByStudent = $db->query("SELECT * FROM `CourseCountByStudent`");

while ($row = $CourseCountByStudent->fetch_row()) {
    $s_mail = $row[0];
    $c_count = $row[1];
    if (($s_mail == $mail) && ($c_count < $MaxStuCourse)) {
            $control = $db->query("SELECT * FROM `courseDetails` WHERE `c_ID`= '$c_id' AND `s_mail`='$mail'");
            if ($control->num_rows == 0) header("Location: courses.php?m=The%20course%20has%20not%20been%20added%20to%20your%20list");
            else {
                $drop = $db->query("DELETE FROM `courseDetails` WHERE `s_mail`='$mail' AND `c_ID`='$c_id'");
                header("Location: courses.php?m=You%20have%20dropped%20the%20course");
            }
        }
    }
?>