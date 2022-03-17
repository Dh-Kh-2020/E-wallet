<?php
session_start();

// Destroy session
// if(session_destroy()) {
    
//     header("Location: login.php");
// }
unset($_SESSION['loggedin']);
unset($_SESSION['email']);
unset($_SESSION['password']);

session_destroy();
header("Location: login.php");