<html>
<head>
    <title>Admin Tables</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 5% 8%;">
<?php include("menu.php"); include("db.php"); $course = $_GET['course']; ?>
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
    $query="????";
    $students = $db -> query($query);

    if (isset($_POST["save"])) {
        $new_grade = $_POST["grade"];
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
                if ($grade !== 'Not Submitted') echo $grade;
                else { ?>
                        <form method="post">
                            <select name="grade">
                                <option>Failed</option>
                                <option>Passed</option>
                                <option>Not Submitted</option>
                            </select>
                            <input type="submit" name="save" value="SAVE">
                        </form>
               <?php } ?></td>
        </tr>
        <?php
    } ?>
</table>
</body>
</html>