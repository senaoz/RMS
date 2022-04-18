<html>
<head>
    <title>Consents</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="stylesheet" type="text/css" href="./style/grades.css">
</head>
<body style="padding: 5% 8%;">
<?php include("menu.php"); include("db.php");
if ($_SESSION['role'] !== 'Professor') header("Location: index.php");

if (isset($_POST["approved"])) {
    $s_mail = $_POST["mail"];
    $result = $db -> query("UPDATE `courseDetails` SET `consent_status`='Approved' WHERE `s_mail`='$s_mail'");
}

if (isset($_POST["rejected"])) {
    $s_mail = $_POST["mail"];
    $result = $db -> query("UPDATE `courseDetails` SET `consent_status`='Rejected' WHERE `s_mail`='$s_mail'");
}

?>
<h2 class="gradientText">Consent Requests</h2>
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
    $p_mail = $_SESSION["u_mail"];
    $consentCourses = $db -> query("SELECT ID, c_consent FROM `courses` WHERE c_professor_mail='$p_mail' AND c_consent='YES'");
    while($row = $consentCourses->fetch_row()) {
        $course = $row[0];
        $students = $db -> query("SELECT s_mail, s_name, s_surname FROM `ParticipantList` WHERE ID='$course' AND consent_status='Pending'");
        while($rowS = $students->fetch_row()) {
            $mail = $rowS[0]; $name = $rowS[1]; $surname = $rowS[2]; $consent = $rowS[3]; ?>
            <tr>
            <td><?php echo $mail;  ?></td>
            <td><?php echo $name;  ?></td>
            <td><?php echo $surname;  ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="mail" value="<?php echo $mail; ?>">
                    <input type="submit" name="approved" value="Approve">
                </form>
                <form method="post">
                    <input type="hidden" name="mail" value="<?php echo $mail; ?>">
                    <input type="submit" name="rejected" value="Reject">
                </form>
            </td>
            </tr>
        <?php }
    } ?>
</table>

</body>
</html>
