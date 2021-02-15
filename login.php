<?php
session_start();
include 'DATA/database-connection.php';
include 'PHP/PHPFUNCTIONS.php';
require_once "DATA/database-connection.php";
$LoginError = "";
if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $uid = login_pass($username, $password);
    if ($uid != "") {

        $LoginError = $uid;
    } else {
        
    }
}
#calling logo method for displaying car_logo with text
createPageHeader('Sports Car Login', '');
?>

<div>
    <h2>Login</h2>
    <p>Please fill in your credentials to login.</p>
    <form action="#" method="post">
        <div class="form-group"> 
            Username:<br>
            <input name="username" type="text"/><br/>
        </div>

        <div class="form-group"> 
            Password:<br><input name="password" type="password"/><br/>
        </div> 
        <div class="form-group">
            <input name="submit" type="submit" value="login"/><br/>
        </div>
        <strong><font color=#CC0000>*<?php echo $LoginError; ?></font></strong>           
        <p>Don't have an account? <a href="Register.php">Sign up now</a>.</p>
    </form>
</div>    

<?php
createPageFooter();
?>