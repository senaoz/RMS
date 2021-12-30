<html>
<head>
    <title>Courses</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 5% 8%;">
<?php include("menu.php"); include("db.php"); include("parameters.php");
if(isset($_GET['m'])) $message = $_GET['m'];
?>
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
        <th>Add My List</th>
    </tr>
    </thead>
    <?php $u_mail = $_SESSION["u_mail"];

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