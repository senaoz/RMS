<head>
    <title>Deactivate</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        #return {
            background: -webkit-linear-gradient(45deg, #ffe770, #ff210e);
            padding: 1em;
            border-radius: 10px;
            color: #000;
            text-decoration: none;
            margin: auto;
            font-weight: bold;
            display: block;
            width: 35%;
            text-align: center;
        }
    </style>
</head>
<?php include("db.php"); $mail = $_GET['d'];
if (!isset($_SESSION["u_mail"])) header("Location: index.php");

$result = $db->query("SELECT * FROM `users` WHERE u_mail='$mail'"); $row = $result->fetch_row(); $role = $row[8];

if ($role == 'Professor') $courses = $db -> query("SELECT * FROM `courses` WHERE c_professor_mail='$u_mail'"); //for checking whether that professor is teaching any course and warning the user if that is the case.
if ($role == 'Student') $courses = $db -> query("SELECT * FROM `courseDetails` WHERE s_mail='$u_mail'"); //for checking whether that student is taking any course and warning the user if that is the case.

if ($courses->num_rows == 0) { ?>
    <div style="margin-top: 10em">
    <h3 style="text-align: center">This user has courses. Are you sure about the deactivation?</h3>
    <a id="return" href="confirmDeactivate.php?d=<?php echo $mail ?>" style="margin-top: 3em;">Confirm Deactivation</a>
    <a id="return" href="adminTables.php" style="margin-top: 2em;">Return Back</a>
    </div><?php
}
else {
    $result = $db->query("UPDATE `users` SET `u_activate` = '0' WHERE `users`.`u_mail` = '$mail'");
    unset($_SESSION["$mail"]); header("Location: adminTables.php");
}
?>
