<html>
<head>
    <title>Admin Tables</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 5% 8%;">
<?php include("menu.php"); include("db.php"); include("parameters.php");

if ($_SESSION['role'] !== 'Admin') header("Location: index.php"); } ?>

<h2 class="gradientText">Courses</h2>
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
        <th>Professor Mail</th>
    </tr>
    </thead>

    <?php
    $query="SELECT * FROM courses";
    $courses = $db -> query($query);

    while($rowC = $courses->fetch_row()) {
        $c_id = $rowC[0];
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
    } ?>
</table>
<br><br>
<h2 class="gradientText">Students</h2>
<table id="tables">
    <thead>
    <tr>
        <th>User E-mail</th>
        <th>User Name</th>
        <th>User Surname</th>
        <th>User Phone</th>
        <th>Edit</th>
        <th>Deactivate</th>
    </tr>
    </thead>

    <?php
    $query="select * from users where role='Student'";
    $users = $db -> query($query);

    while($row = $users->fetch_row()) {
        $u_mail = $row[0];
        $u_name = $row[1];
        $u_surname = $row[2];
        $u_phone = $row[3];
        $u_activate = $row[9];
        ?>
        <tr>
            <td id="mail"><?php echo $u_mail;  ?></td>
            <td><?php echo $u_name;  ?></td>
            <td><?php echo $u_surname;  ?></td>
            <td><?php echo $u_phone;  ?></td>
            <td><button class="button" href="#acilirKutu">Reset The Password</button>
                <div id="acilirKutu" class="acilirKutu">
                    <div class="KutuInside">
                        <span class="close">&times;</span>
                        <?php include("passwordUpdate.php"); ?>
                    </div>
                </div>
            </td>
            <td><?php if ($u_activate == 0) { ?><a id="edit" href="activate.php?a=<?php echo $u_mail ?>">Activate</a><?php }
                else { ?> <a id="edit" href="deactivate.php?d=<?php echo $u_mail ?>">&times;</a> <?php }?></td>
        </tr> <?php
    } ?>
</table>
<br><br>
<h2 class="gradientText">Professors</h2>
<table id="tables">
    <thead>
    <tr>
        <th>User E-mail</th>
        <th>User Name</th>
        <th>User Surname</th>
        <th>User Phone</th>
        <th>Edit</th>
        <th>Deactivate</th>
    </tr>
    </thead>

    <?php
    $query="select * from users where role='Professor'";
    $users = $db -> query($query);

    while($row = $users->fetch_row()) {
        $u_mail = $row[0];
        $u_name = $row[1];
        $u_surname = $row[2];
        $u_phone = $row[3];
        $u_activate = $row[9];
        ?>
        <tr>
            <td id="mail"><?php echo $u_mail;  ?></td>
            <td><?php echo $u_name;  ?></td>
            <td><?php echo $u_surname;  ?></td>
            <td><?php echo $u_phone;  ?></td>
            <td><button class="button" href="#acilirKutu">Reset The Password</button>
                <div id="acilirKutu" class="acilirKutu">
                    <div class="KutuInside">
                        <span class="close">&times;</span>
                        <?php include("passwordUpdate.php"); ?>
                    </div>
                </div>
            </td>
            <td><?php if ($u_activate == 0) { ?><a id="edit" href="activate.php?a=<?php echo $u_mail ?>">Activate</a><?php }
                else { ?> <a id="edit" href="deactivate.php?d=<?php echo $u_mail ?>">&times;</a> <?php } ?>
            </td>
        </tr>
        <?php
    } ?>
</table>
<br><br>
<h2 class="gradientText">Admins</h2>
<table id="tables">
    <thead>
    <tr>
        <th>Admin E-mail</th>
        <th>Admin Name</th>
        <th>Admin Surname</th>
        <th>Admin Phone</th>
        <th>Edit</th>
    </tr>
    </thead>

    <?php
    $query="select * from users where role='Admin'";
    $users = $db -> query($query);

    while($row = $users->fetch_row()) {
        $u_mail = $row[0];
        $u_name = $row[1];
        $u_surname = $row[2];
        $u_phone = $row[3];
        ?>
        <tr>
            <td id="mail"><?php echo $u_mail;  ?></td>
            <td><?php echo $u_name;  ?></td>
            <td><?php echo $u_surname;  ?></td>
            <td><?php echo $u_phone;  ?></td>
            <td><button class="button" href="#acilirKutu">Reset The Password</button>
                <div id="acilirKutu" class="acilirKutu">
                    <div class="KutuInside">
                        <span class="close">&times;</span>
                        <?php include("passwordUpdate.php"); ?>
                    </div>
                </div>
            </td>
        </tr> <?php
    } ?>
</table>
<br><br>
<a id="submit" href="exportReport.php" style="width: 100%; display: block; text-align: center; padding: 10px;">Get User Statistics Report</a>
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