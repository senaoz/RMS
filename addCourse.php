<?php
include("db.php"); include ("parameters.php");
$mail = $_GET['add'];
$c_id = $_GET['c_id'];

$CourseCountByStudent = $db->query("SELECT * FROM `CourseCountByStudent`");

while ($row = $CourseCountByStudent->fetch_row()) {
    $s_mail = $row[0];
    $c_count = $row[1];
    if (($s_mail == $mail) && ($c_count < $MaxStuCourse)) {
        if ($c_count < $MaxStuCourse) {
            $control = $db->query("SELECT * FROM `courseDetails` WHERE `c_ID`= '$c_id' AND `s_mail`='$mail'");
            if ($control->num_rows == 0) {
                $IsConsentRequired = $db->query("SELECT c_consent FROM `courses` WHERE ID='$c_id'");
                $result = $IsConsentRequired->fetch_row(); $consent = $result[0];
                if ($consent == 'YES') {
                    $add = $db->query("INSERT INTO `courseDetails` (`c_ID`, `s_mail`, `consent_status`) VALUES ('$c_id', '$mail', 'Pending')");
                    header("Location: courses.php?m=The%20consent%20was%20send.");
                }
                else {
                    $add = $db->query("INSERT INTO `courseDetails` (`c_ID`, `s_mail`, `consent_status`) VALUES ('$c_id', '$mail', 'Automatically Approved')");
                    header("Location: courses.php?m=The%20course%20has%20been%20added%20to%20your%20list.");
                }
            }
            else header("Location: courses.php?m=This%20course%20is%20already%20on%20your%20list.");
        }
        else header("Location: courses.php?m=You%20cannot%20take%20any%20more%20courses.%20Your%20course%20quota%20is%20full.");
    }}
?>