<html>
<head>
    <title>My Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="banner">
    <?php include("menu.php");
    if (!isset($_SESSION["u_mail"])){
        header("Location: index.php");
    } ?>
    <h1>Hello <?php
        echo $_SESSION['u_name']; $_SESSION["u_uni"]
        ?>!</h1>
    <h3 style="font-weight: normal"><?php
        echo $_SESSION["role"]." at ".$_SESSION["u_uni"];
        ?></h3>
</div>
<p style="padding: 10% 10% 0% 10%">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor tellus finibus lectus faucibus, eu vestibulum ex rutrum. Nam convallis laoreet mi, quis tempus sapien tincidunt tempus. Sed lectus libero, dignissim efficitur arcu sed, condimentum iaculis nulla. Sed nec augue in tortor pretium sollicitudin a eu velit. Etiam vulputate libero non purus sollicitudin, et dapibus felis aliquet. Praesent non diam ultrices, dictum ligula at, congue est. Nulla sagittis leo dui, vel aliquam est vulputate quis. Quisque malesuada tortor ipsum. Nulla in lacinia leo, vitae dapibus libero. Pellentesque mauris mauris, ornare ac sodales a, efficitur id arcu. Duis eget nulla volutpat, dapibus purus in, efficitur ligula. Nam ultricies, mauris id rutrum mollis, elit eros rutrum dolor, a mattis dui nibh eu dolor. Pellentesque eu egestas tortor. Mauris eget nibh vitae arcu lobortis dapibus. Nam at metus pretium, eleifend neque at, fermentum ex. Integer ipsum lorem, porttitor vel turpis vitae, fermentum dignissim nisi.
</p>
<section>
    <?php include("db.php"); include("parameters.php");
    if(isset($_POST["submit"])){
        $u_mail = $_SESSION["u_mail"];
        $u_password = $_SESSION["u_password"];
        $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];
        $confirmPassword = $_POST["confirmPassword"];

        if ($currentPassword == $u_password) {
            if ($confirmPassword == $newPassword){
                $sql = "UPDATE `users` SET `u_password`='$newPassword' WHERE `u_mail`='$u_mail'";
                $result = $db->query($sql);
                if ($result) $message = "Passwords updated.";
                else $message = "Error while updating the password.";
            }
            else $message = "Passwords don't match.";
        }
        else $message = "Current password is not true.";
    }
    ?>
    <form method="post" class="box" id="box1">
        <h3>You can update your password with this form.</h3>
        <label>Current Password:</label>
        <input type="password" name="currentPassword" required>
        <label>New Password:</label>
        <input type="password" name="newPassword" minlength="<?php $MinPwd?>" maxlength="<?php $MaxPwd?>" required>
        <label>Confirm Password:</label>
        <input type="password" name="confirmPassword" minlength="<?php $MinPwd?>" maxlength="<?php $MaxPwd?>" required>
        <input type="submit" name="submit">
        <p><?php if(isset($message)) { echo $message; } ?></p>
    </form>
    <div class="box" id="box2">
        <span>Your Courses</span>
    </div>
</section>
</body>
</html>