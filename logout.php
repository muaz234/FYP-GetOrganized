<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
header("location:index.html");
 
// Destroy the session.
session_destroy();



?>