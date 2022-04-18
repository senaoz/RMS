<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="padding: 5% 10%">
<?php include("menu.php"); include("db.php");
// Eğer giriş yapmış ise uyarı veriyor.
if (isset($_SESSION["u_mail"])){
    echo "<script type='text/javascript'>alert('You have already logged in.');</script>"; }

if(isset($_POST["submit"])) {
    $u_mail = $_POST["u_mail"];
    $u_password = $_POST["u_password"];
    $result = $db->query("SELECT * FROM `users` WHERE u_mail='$u_mail' and u_password='$u_password'");

    if ($result->num_rows == 0) {
        $message = "<br>Your e-mail or password is wrong.";
    } else {
        $row = $result->fetch_row();
        $_SESSION["u_mail"] = $row[0];
        $_SESSION["u_name"] = $row[1];
        $_SESSION["u_uni"] = $row[6];
        $_SESSION["role"] = $row[8];
        $_SESSION["u_password"] = $row[7];
        $_SESSION["u_activate"] = $row[9];
        if ($_SESSION["u_activate"] == 0){
            $message = "<br>Your account is deactivated by the admin. If you think there is a problem, please contact us through <b>contact@mis233.com</b>.";
            session_destroy();
        }
        else header("Location: userindex.php");
    }
}
?>
<div id="form">
    <h1 class="gradientText" align="center">Welcome Back!</h1>
    <form action="login.php" method="post">
        <label>Email</label>
        <input type="email" name="u_mail">
        <label>Password</label>
        <input type="password" name="u_password">
        <input type="submit" name="submit">
        <p align="center"><?php if(isset($message)) { echo $message; } ?></p>
    </form>
</div>
</body>
</html>