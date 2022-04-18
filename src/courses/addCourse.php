<?php
include("src/db.php"); include ("src/parameters.php");
$mail = $_GET['add'];
$c_id = $_GET['c_id'];

$CourseCountByStudent = $db->query("SELECT * FROM `CourseCountByStudent` WHERE `Student Mail`='$mail'");
$c_count = $row[0];

$control = $db->query("SELECT * FROM `courseDetails` WHERE `c_ID`= '$c_id' AND `s_mail`='$mail'");

$IsConsentRequired = $db->query("SELECT c_consent FROM `courses` WHERE ID='$c_id'");
$result = $IsConsentRequired->fetch_row(); $consent = $result[0];

if ($c_count < $MaxStuCourse) {
    if ($control->num_rows == 0) {
        if ($consent == 'YES') {
            $add = $db->query("INSERT INTO `courseDetails` (`c_ID`, `s_mail`, `consent_status`) VALUES ('$c_id', '$mail', 'Pending')");
            header("Location: src/courses/courses.php?m=The%20consent%20was%20send.");
        }
        if ($consent == 'NO') {
            $add = $db->query("INSERT INTO `courseDetails` (`c_ID`, `s_mail`, `consent_status`) VALUES ('$c_id', '$mail', 'Automatically Approved')");
            header("Location: src/courses/courses.php?m=The%20course%20has%20been%20added%20to%20your%20list.");
        }
    }
    else header("Location: src/courses/courses.php?m=This%20course%20is%20already%20on%20your%20list.");
}

else header("Location: src/courses/courses.php?m=You%20cannot%20take%20any%20more%20courses.%20Your%20course%20quota%20is%20full.");
?>
