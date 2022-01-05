<html>
<head>
    <title>Courses</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 5% 8%;">

<?php
include("menu.php"); include("db.php"); $mail = $_SESSION["u_mail"];
if ($_SESSION['role'] !== 'Professor') header("Location: courses.php"); ?>
<h1 class="gradientText">Courses</h1>
<table id="tables">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quota</th>
        <th>Final Date</th>
        <th>View Student List & Enter Grades</th>
    </tr>
    </thead><?php
    $MyCourses = $db -> query("SELECT * FROM `courses` WHERE c_professor_mail='$mail'");

    while($row = $MyCourses->fetch_row()) {
        $c_id = $row[0];
        $c_name = $row[1];
        $c_quota = $row[3];
        $final_date = $row[4];
        ?>
        <tr>
            <td><?php echo $c_id;  ?></td>
            <td><?php echo $c_name;  ?></td>
            <td><?php echo $c_quota;  ?></td>
            <td><?php echo $final_date;  ?></td>
            <td><a id="edit" href="submitGrades.php?course=<?php echo $c_id ?>">View Details</a></td>
        </tr> <?php
    }?>
</table>

<?php if ($MyCourses->num_rows == 0) { ?>
    <style>
        #tables {
            display:none !important;
        }
    </style>
<?php echo "You do not have any classes this semester.";
    } ?>
</body>
</html>