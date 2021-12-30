<?php if(isset($_POST["submit"])){
    $mail = $_POST["mail"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($confirmPassword == $newPassword){
        $sql = "UPDATE `users` SET `u_password`='$newPassword' WHERE `u_mail`='$mail'";
        $result = $db->query($sql);
        if ($result) $message = "Passwords updated.";
        else $message = "Error while updating the password.";
    }
    else $message = "Passwords don't match.";
}
?>
<form method="post" action="tables.php" style="padding: 5%">
    <br><br>
    <label>Confirm Email</label>
    <input type="email" name="mail" required>
    <label>New Password:</label>
    <input type="password" name="newPassword" minlength="<?php $MinPwd?>" maxlength="<?php $MaxPwd?>" required>
    <label>Confirm Password:</label>
    <input type="password" name="confirmPassword" minlength="<?php $MinPwd?>" maxlength="<?php $MaxPwd?>" required>
    <input type="submit" name="submit">
    <p><?php if(isset($message)) { echo $message; } ?></p>
</form>
<script>
    var btn = document.querySelectorAll("button.button");
    var modals = document.querySelectorAll('.acilirKutu');
    var spans = document.getElementsByClassName("close");

    for (var i = 0; i < btn.length; i++) {
        btn[i].onclick = function(e) {
            e.preventDefault();
            modal = document.querySelector(e.target.getAttribute("href"));
            modal.style.display = "block";
        }
    }

    for (var i = 0; i < spans.length; i++) {
        spans[i].onclick = function() {
            for (var index in modals) {
                if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
            }
        }
    }

    window.onclick = function(event) {
        if (event.target.classList.contains('acilirKutu')) {
            for (var index in modals) {
                if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
            }
        }
    }
</script>