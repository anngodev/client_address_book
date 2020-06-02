<?php
session_start();

// check to see if form was submitted; name atr from submit button
if ( isset( $_POST["login"] ) ) {
    // if form was submitted
    // create variables
    // wrap data with validate function
    $formEmail = $_POST["email"];
    $formPass = $_POST["password"];
}

include('includes/header.php');

//$password = password_hash("abc123", PASSWORD_DEFAULT);
//echo $password;

?>

<h1>Client Address Book</h1>
<p class="lead">Log in to your account.</p>

<form class="form-inline" action="clients.php" method="post">
    <div class="form-group">
        <label for="login-email" class="sr-only">Email</label>
        <input type="text" class="form-control" id="login-email" placeholder="email" name="email">
    </div>
    <div class="form-group">
        <label for="login-password" class="sr-only">Password</label>
        <input type="password" class="form-control" id="login-password" placeholder="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>

<?php
include('includes/footer.php');
?>