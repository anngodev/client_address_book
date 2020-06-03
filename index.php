<?php
session_start();

include("includes/functions.php");

// check to see if form was submitted; name atr from submit button
if ( isset( $_POST["login"] ) ) {
    // if form was submitted
    // create variables
    // wrap data with validate function
    $formEmail = validateFormData( $_POST["email"] );
    $formPass = validateFormData( $_POST["password"] );
    
    // Connect to database
    include("includes/connection.php");
    
    // Create query
    $query = "SELECT name, password FROM users WHERE email='$formEmail'";
    
    // Store the result
    $result = mysqli_query( $conn, $query );
    
    // Verify if result has returned
    // if anything has been returned
    if( mysqli_num_rows( $result ) > 0 ) {
        
        // store some basic user data in variables
        while( $row = mysqli_fetch_assoc( $result ) ) {
            $name       =   $row["name"];
            $hashedPass =   $row["password"];
        }
        
        // Verify hashed password with submitted password
        if( password_verify( $formPass, $hashedPass ) ) {
            
            // If correct login credentials
            // Store data in SESSION variable
            $_SESSION["loggedInUser"] = $name;
            
            // Redirect user to clients page
            header( "Location: clients.php" );
        } else { // hashed password didn't verify
            
            // Error message
            $loginError = "<div class='alert alert-danger'>Wrong Username / Password combination. Please Try Again.</div>";
        }
        
    } else { // INITIAL IF STATEMENT/ if there are no results in database
        
            // Error message
          $loginError = "<div class='alert alert-danger'>No such user in database. Please Try Again.<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
}
// If the $_POST["login"] was submitted
// Close connetion
mysqli_close($conn);

include('includes/header.php');

//$password = password_hash("abc123", PASSWORD_DEFAULT);
//echo $password;

?>

<h1>Client Address Book</h1>
<p class="lead">Log in to your account.</p>

<?php echo $loginError; ?>

<form class="form-inline" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
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