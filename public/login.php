<?php
require('header.php');

$user = new User();
$update = false;
$firstName = null;
$lastName = null;
$email = null;
$password = null;

if (isset($_POST['login'])) {
    $check = $user->loginFunction($_POST['email_login'], $_POST['password_login']);
}
?>

<form action="login.php" method="post">
    <div class="checklog">
        <div class="loginbox">
            <div class="loginbox-back">
                <h1>Login</h1>
            </div>
            <div class="login-lbl_boxes">
                <label>Username or email adress:</label><span>*</span><br>
                <input type="text" name="email_login" id=""><br>
                <label>Password:</label></label><span>*</span><br>
                <input type="password" name="password_login" id=""><br>
                <input type="submit" name="login" value="Login" class="login_btn">
            </div>
            <div class="forgot_pass">
                <a href="#">Forgot your password?</a>
            </div>
        </div>
    </div>
</form>
<?php
require('footer.php');
?>