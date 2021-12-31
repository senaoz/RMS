<html>
<head>
    <title>Courses</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 5% 8%;">
<?php
$role=$_SESSION["role"];
if ($role == 'Professor') header("Location: profTables.php");

include("menu.php"); include("db.php"); include("parameters.php"); $u_mail = $_SESSION["u_mail"];
if(isset($_GET['m'])) $message = $_GET['m'];
?>
<h1 class="gradientText">My Courses</h1>
<table id="tables">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Final Date</th>
        <th>Professor Name</th>
        <th>Professor Surname</th>
        <th>Professor Mail</th>
        <th style="width: 80px;">Drop</th>
        <th>Grades</th>
    </tr>
    </thead>
    <?php
    $MyCourses = $db -> query("SELECT * FROM `ParticipantList` WHERE s_mail='$u_mail'");

    while($rowC = $MyCourses->fetch_row()) {
        $c_id = $rowC[1];
        $c_name = $rowC[2];
        $final_date = $rowC[3];
        $prof_name = $rowC[5];
        $prof_surname = $rowC[6];
        $c_professor_mail = $rowC[4];
        ?>
        <tr>
            <td><?php echo $c_id;  ?></td>
            <td><?php echo $c_name;  ?></td>
            <td><?php echo $final_date;  ?></td>
            <td><?php echo $prof_name;  ?></td>
            <td><?php echo $prof_surname;  ?></td>
            <td><?php echo $c_professor_mail;  ?></td>
            <td><a id="edit" href="dropCourse.php?drop=<?php echo $u_mail ?>&c_id=<?php echo $c_id ?>">Drop</a></td>
            <td>      </td>
        </tr> <?php
    } ?>
</table>
<br><br>
<h3 align="center"><?php if(isset($message)) { echo $message; } ?></h3>
<h1 class="gradientText">All Courses</h1>
<table id="tables">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quota</th>
        <th>Current Participants</th>
        <th>Consent</th>
        <th>Professor Mail</th>
        <th style="width: 80px;">Add</th>
    </tr>
    </thead>
    <?php
    $QuotaStudents = $db -> query("SELECT * FROM `CurrentParticipants` WHERE `Current Participant` < `Quota`");
    $QuotaFull  =  $db -> query("SELECT * FROM `CurrentParticipants` WHERE `Current Participant` >= `Quota`");

    while($rowC = $QuotaStudents->fetch_row()) {
        $c_id = $rowC[0];
        $c_name = $rowC[1];
        $c_quota = $rowC[2];
        $c_current = $rowC[3];
        $c_consent = $rowC[4];
        $c_professor_mail = $rowC[5];
        ?>
        <tr>
            <td><?php echo $c_id;  ?></td>
            <td><?php echo $c_name;  ?></td>
            <td><?php echo $c_quota;  ?></td>
            <td><?php echo $c_current;  ?></td>
            <td><?php echo $c_consent;  ?></td>
            <td><?php echo $c_professor_mail;  ?></td>
            <td><a id="edit" href="addCourse.php?add=<?php echo $u_mail ?>&c_id=<?php echo $c_id ?>">Add</a></td>
        </tr> <?php
    }

    while($rowC = $QuotaFull->fetch_row()) {
        $c_id = $rowC[0];
        $c_name = $rowC[1];
        $c_quota = $rowC[2];
        $c_current = $rowC[3];
        $c_consent = $rowC[4];
        $c_professor_mail = $rowC[5];
        ?>
        <tr>
            <td><?php echo $c_id;  ?></td>
            <td><?php echo $c_name;  ?></td>
            <td><?php echo $c_quota;  ?></td>
            <td><?php echo $c_current;  ?></td>
            <td><?php echo $c_consent;  ?></td>
            <td><?php echo $c_professor_mail;  ?></td>
            <td><div class="hoverMessage" id="edit">&times;<p class="Message">The student quota for this course has been reached.</p></div></td>
        </tr> <?php
    } ?>
</table>
</body>