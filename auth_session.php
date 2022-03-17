<?php

session_start();

require_once('wallet.php');

if(!isset($_SESSION["loggedin"])) {
    header("Location: login.php");
    exit();
} else {
    $wall = new Wallets($_SESSION["user_id"]);
    
}