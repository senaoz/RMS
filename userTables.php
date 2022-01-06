<html>
<head>
    <title>My Information</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 5% 8%;">
<?php include("menu.php"); include("parameters.php");

//We check the role as the page contents are user role specific
if ($_SESSION['role'] == 'Professor') {
    header("Location: profTables.php"); }

if (!isset($_SESSION["u_mail"])){
    header("Location: index.php"); }

$role = $_SESSION["role"]; $u_mail = $_SESSION["u_mail"]; ?>
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
<br><br>
<h1 class="gradientText">My Courses</h1>
<table id="tables">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Course Description</th>
        <th>Final Date</th>
        <th>Professor Name</th>
        <th>Professor Mail</th>
        <th>Credits</th>
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
        $c_credits = $rowC[7];
        $c_description = $rowC[8];
        ?>
        <tr>
            <td><?php echo $c_id;  ?></td>
            <td><?php echo $c_name;  ?></td>
            <td><a id="edit" onclick="alert('<?php echo $c_description ?>')">Click to see</a></td>
            <td><?php echo $final_date;  ?></td>
            <td><?php echo $prof_name." ".$prof_surname;  ?></td>
            <td><?php echo $c_professor_mail;  ?></td>
            <td><?php echo $c_credits;  ?></td>
            <td>      </td>
        </tr> <?php
    } ?>
</table>
</body>
</html>