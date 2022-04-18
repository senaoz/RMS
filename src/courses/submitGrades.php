<html>
<head>
    <title>Grades</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="grades.css">
</head>
<body style="padding: 5% 8%;">
<?php include("menu.php"); include("db.php"); $course = $_GET['course'];
if ($_SESSION['role'] !== 'Professor') header("Location: index.php");?>
<h2 class="gradientText">Students in <?php echo $course ?></h2>
<table id="tables">
    <thead>
    <tr>
        <th>E-mail</th>
        <th>Name</th>
        <th>Surname</th>
        <th style="min-with: 100px">Grade</th>
    </tr>
    </thead>
    <?php
    $students = $db -> query("SELECT s_mail, s_name, s_surname, s_grade FROM `ParticipantList` WHERE ID='$course'");
    if (isset($_POST["save"])) {
        $new_grade = $_POST["grade"];
        $s_mail = $_POST["mail"];
        $result = $db -> query("UPDATE `courseDetails` SET `s_grade`='$new_grade' WHERE `c_ID`='$course' AND `s_mail`='$s_mail'");
    }

    while($row = $students->fetch_row()) {
        $mail = $row[0];
        $name = $row[1];
        $surname = $row[2];
        $grade = $row[3];
        ?>
        <tr>
            <td><?php echo $mail;  ?></td>
            <td><?php echo $name;  ?></td>
            <td><?php echo $surname;  ?></td>
            <td><?php
                if (($grade !== 'Not Submitted') && ($grade !== '')) echo $grade;
                else { ?>
                        <form method="post">
                            <input type="hidden" name="mail" value="<?php echo $mail; ?>">
                            <select name="grade">
                                <option>Failed</option>
                                <option>Passed</option>
                                <option>Not Submitted</option>
                            </select>
                            <input type="submit" name="save" value="SAVE">
                        </form><?php
                } ?></td>
        </tr><?php
    } ?>
</table>
<?php if ($students->num_rows == 0) { ?>
    <style>
        #tables {
            display:none !important;
        }
        #returnBack {
            background: -webkit-linear-gradient(45deg, #ffe770, #ff210e);
            padding: 1em;
            border-radius: 10px;
            color: #000;
            text-decoration: none;
            float: right;
            margin-top: 10em;
            font-weight: bold;
        }
    </style>
    <?php echo "There are no students registered for this course."; ?>
    <a id="returnBack" href="profTables.php">Return My Courses</a><?php
} ?>
</body>
</html>