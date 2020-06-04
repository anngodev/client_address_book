<?php

$server     =   "localhost";
$username   =   "root";
$password   =   "root";
$db         =   "db_clientaddressbook";

// Create connection
$conn = mysqli_connect( $server, $username, $password, $db );

// Connection check
if( !$conn ) {
    die( "Connection failed: " . mysqli_connect_error() );
    
}

?>