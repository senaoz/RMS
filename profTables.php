<html>
<head>
    <title>Courses</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 5% 8%;">

<?php if ($_SESSION['role'] == 'Student') header("Location: courses.php");

include("menu.php"); include("db.php"); $p_mail = $_SESSION["u_mail"];
?>

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
    </thead><?php
    $MyCourses = $db -> query("SELECT * FROM `courses` WHERE c_professor_mail='$p_mail'");

    while($row = $MyCourses->fetch_row()) {
        $c_id = $row[0];
        $c_name = $row[1];
        $final_date = $row[4];
        ?>
        <tr>
            <td><?php echo $c_id;  ?></td>
            <td><?php echo $c_name;  ?></td>
            <td><?php echo $final_date;  ?></td>
            <td><button class="button" href="submitGrades.php?course=<?php echo $c_id ?>">Enter Grades</button></td>
        </tr> <?php
    } ?>
</table>
</body>
<script>
    var kutu = document.getElementById("acilirKutu");
    var buton = document.getElementById("buton");
    var span = document.getElementsByClassName("close")[0];

    buton.onclick = function() {
        kutu.style.display = "block"; }

    span.onclick = function() {
        kutu.style.display = "none"; }

    window.onclick = function(event) {
        if (event.target == kutu) {
            kutu.style.display = "none";
        }
    }
</script>
</html>