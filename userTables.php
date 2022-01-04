<html>
<head>
    <title>My Information</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 5% 8%;">
<?php
if ($_SESSION['role'] == 'Professor') {
    header("Location: profTables.php"); }

include("menu.php"); include("db.php"); include("parameters.php");
?>
<h2 class="gradientText">My Courses</h2>
<table id="tables">
    <thead >
    <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Course Description</th>
        <th>Course Quota</th>
        <th>Course Final Date</th>
        <th>Credits</th>
        <th>Consent</th>
        <th>Course Professor</th>
    </tr>
    </thead>

    <?php
    $u_mail = $_SESSION["u_mail"];
    $courses = $db -> query("SELECT `c_ID` FROM `courseDetails` WHERE `s_mail`='$u_mail'");

    while ($row = $courses->fetch_row()) {
        $c_id = $row[0];
        $courseDetails = $db -> query("SELECT * FROM courses WHERE c_id='$c_id'");

        while($rowC = $courseDetails->fetch_row()) {
            $c_name = $rowC[1];
            $c_description = $rowC[2];
            $c_quota = $rowC[3];
            $c_final_date = $rowC[4];
            $c_credits = $rowC[5];
            $c_consent = $rowC[6];
            $c_professor = $rowC[7];
            ?>
            <tr>
                <td><?php echo $c_id;  ?></td>
                <td><?php echo $c_name;  ?></td>
                <td><a id="edit" onclick="alert('<?php echo $c_description ?>')">Click to see</a></td>
                <td><?php echo $c_quota;  ?></td>
                <td><?php echo $c_final_date;  ?></td>
                <td><?php echo $c_credits;  ?></td>
                <td><?php echo $c_consent;  ?></td>
                <td><?php echo $c_professor;  ?></td>
            </tr> <?php
        }
    } ?>
</table>
<br><br>
<h2 class="gradientText">My Information</h2>
<table id="tables">
    <thead>
    <tr>
        <th>E-mail</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Phone</th>
        <th>University</th>
    </tr>
    </thead>

    <?php
    $query="select * from users where u_mail='$u_mail'";
    $users = $db -> query($query);

    while($row = $users->fetch_row()) {
        $u_name = $row[1];
        $u_surname = $row[2];
        $u_phone = $row[3];
        $u_uni = $row[6];
        ?>
        <tr>
            <td><?php echo $u_mail;  ?></td>
            <td><?php echo $u_name;  ?></td>
            <td><?php echo $u_surname;  ?></td>
            <td><?php echo $u_phone;  ?></td>
            <td><?php echo $u_uni;  ?></td>
        </tr> <?php
    } ?>
</table>
</body>
</html>