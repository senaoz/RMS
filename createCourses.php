<html>
<head>
    <title>Create New Course</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 5% 8%;">
<?php include("menu.php"); include("parameters.php"); include("db.php");

$u_mail = $_SESSION["u_mail"];

if ($_SESSION['role'] !== 'Admin') {
    header("Location: index.php"); } ?>

<?php
if (isset($_POST["submit"])) {
    $ID = $_POST["ID"];
    $c_name = $_POST["c_name"];
    $c_description = $_POST["c_description"];
    $c_quota = $_POST["c_quota"];
    $c_final_date = $_POST["c_final_date"];
    $c_credits = $_POST["c_credits"];
    $c_consent = $_POST["c_consent"];
    $c_professor = $_POST["c_professor"];
    $theProfessor = $db -> query("SELECT `u_mail` FROM `users` WHERE concat(`u_name`, ' ', `u_surname`)='$c_professor';");
    $row = $theProfessor->fetch_row();
    $c_professor_mail = $row[0];

    $query = "INSERT INTO `courses` (`ID`, `c_name`, `c_description`, `c_quota`, `c_final_date`, `c_credits`, `c_consent`, `c_professor_mail`) VALUES ('$ID', '$c_name', '$c_description', '$c_quota', '$c_final_date', '$c_credits', '$c_consent', '$c_professor_mail')";
    $result = $db -> query($query);
    if ($result) {
        $message = "<br><br>Course is created.";
    } else {
        $message = "<br><br>Something wrong. Please try again.";
    }
} ?>

<div><span class="gradientText">Create New Course</span>
    <h3>Only administrators can create new courses to the system with this page. Please fill out the form for each new course.</h3>
    <form action="createCourses.php" method="post">
        <div class="inlineBlock" style="padding-right: 1%;">
        <label>Course ID</label>
        <input type="text" name="ID" required>
        </div><div class="inlineBlock" style="padding-left: 1%;">
        <label>Course Name</label>
        <input type="text" name="c_name" required>
        </div>
        <label>Course Description</label>
        <input type="text" name="c_description">
        <label>Quota</label>
        <input type="number" name="c_quota" required>
        <label>Final Date</label>
        <input type="date" name="c_final_date">
        <label>Credits</label>
        <input type="number" name="c_credits" required>
        <label>Consent (*Please just write "YES" or "NO".)</label>
        <input type="text" name="c_consent" maxlength="3" required>
        <label>Course Professor</label>
        <select name="c_professor" required>
        <?php include("db.php");
        $query="SELECT * FROM `users` WHERE `role`='Professor'";
        $professors = $db -> query($query);

        while($row = $professors->fetch_row()) {
            $mail = $row[0];
            $name = $row[1];
            $surname = $row[2];
            ?><option><?php echo $name." ".$surname;  ?></option><?php } ?>
        <input type="submit" name="submit" value="CREATE">
            <p align="center"><?php if(isset($message)) { echo $message; } ?></p>
    </form>
</div>
</body>
</html>