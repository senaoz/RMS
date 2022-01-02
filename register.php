<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.cs">
</head>
<body style="padding: 5% 8%;">
<?php include("menu.php"); include("parameters.php");

$u_mail = $_SESSION["u_mail"];

if ($_SESSION['role'] == 'Admin') {
      $m = "Administrators can register new users to the system with this page. Please fill out the form for each new user.";
      echo "<script type='text/javascript'>alert('$m');</script>";
  }
else {
    header("Location: index.php"); } ?>

<?php
if (isset($_POST["submit"])) {
    $u_mail = $_POST["u_mail"];
    $u_name = $_POST["u_name"];
    $u_surname = $_POST["u_surname"];
    $u_phone = $_POST["u_phone"];
    $u_country = $_POST["u_country"];
    $u_city = $_POST["u_city"];
    $u_uni = $_POST["u_uni"];
    $u_password = $_POST["u_password"];
    $role = $_POST["role"];

    $query = "INSERT INTO `users` (`u_mail`, `u_name`, `u_surname`, `u_phone`, `u_country`, `u_city`, `u_uni`, `u_password`, `role`) VALUES ('$u_mail', '$u_name', '$u_surname', '$u_phone', '$u_country', '$u_city', '$u_uni', '$u_password', '$role')";
    $result = $db -> query($query);
    if ($result) {
        $message = "Your account is created. You can login right now.";
    } else {
        $message = "Something wrong. Please try again.";
    }
} ?>

<div>
    <span class="gradientText">New User Registration</span>
    <h3>Administrators can register new users to the system with this page. Please fill out the form for each new user.</h3>
    <p align="center"><?php if(isset($message)) { echo $message; } ?></p>
    <form action="register.php" method="post">
        <label>Select The Role Of User</label>
        <select id="role" name="role">
            <option id='Admin'>Admin</option>
            <option id='Professor'>Professor</option>
            <option id='Student'>Student</option>
        </select>
        <div class="inlineBlock" style="padding-right: 1%;">
            <label>Name</label>
            <input type="text" name="u_name" required>
            <label>Country</label>
            <input type="text" name="u_country">
        </div><div class="inlineBlock" style="padding-left: 1%;">
            <label>Surname</label>
            <input type="text" name="u_surname" required>
            <label>City</label>
            <input type="text" name="u_city">
        </div>
        <label>E-mail</label>
        <input type="email" name="u_mail" placeholder="test@gmail.com" required>
        <label>Phone Number</label>
        <input type="text" name="u_phone" placeholder="+90 505 123 45 67">
        <label>Password</label>
        <input type="password" name="u_password" minlength="<?php $MinPwd?>" maxlength="<?php $MaxPwd?>" required>
    <input type="submit" name="submit" value="Register">
</form>
</div>
</body>
</html>