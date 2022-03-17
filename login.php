<?php

    session_start();
    
    require_once('crud.php');
    require_once('wallet.php');
    $crud = new CRUD();
    
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        header("location: dashboard.php");
        exit;
    }

    if (isset($_POST['login'])){

        // $crud->select($_POST);
        $rows = $crud->select($_POST);
        // $wallet;

        if ($rows) {
            $wallet = new Wallets($rows['user_id']);
            // $wallet->createWallet();
            $row = $wallet->getWallet($rows['user_id']);
            
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $rows['user_id'];
            $_SESSION["username"] = $rows['username'];
            // $_SESSION['email'] = stripslashes($_POST['email']);                            
            // $_SESSION['username'] = stripslashes($_POST['username']);                            
            $_SESSION["password"] = stripslashes($_POST['password']);
            $_SESSION['wallet'] = [
                "wid"       => $row['wind'],
                "balance"   => $row['balance'],
                "currency"  => $row['currency']
            ];
            
            // if($_SESSION['wallet']['wid'] === null){
            //     $wallet = new Wallets($rows['user_id']);
            //     $wallet->createWallet();
            //     $row = $wallet->getWallet($rows['user_id']);
            // }
            header("location: dashboard.php");
            exit;
            // }
        } else {
            echo "<div class='errors'>
                    <p>Incorrect email/password.</p>
                    <p>".$rows."</p>
                </div>";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>Login</title>
</head>
<body>
<form action=""  method="POST" enctype="multipart/form-data">
    <div class="__container m-auto my-5 border shadow">
        <h1>Login</h1>
        <p>Please fill in your credentials to login.</p>
        <hr>
        
        
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder=" * Enter Username" name="username" id="username">

        <!-- <label for="email"><b>Email</b></label>
        <input type="text" placeholder=" * Enter Email" name="email" id="email"> -->
        <!-- <div class="errors">
            <?php 
                    // if(isset($_POST['email'])){
                        //     echo $err['email'] ?? '';
                        // }
                ?>
            </div> -->

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder=" * Enter Password" name="password" id="psw">
            <!-- <div class="errors">
                <?php 
                    // if(isset($_POST['password'])){
                    //     echo $err['password'] ?? '';
                    // }
                    ?>
            </div> -->
            
        <input type="submit" name="login" class="registerbtn" value="Login">
        <div class="signin">
            <p>Don't have an account? <a href="register.php">Sign up</a>.</p>
        </div>
    </div>
</form>
</body>
</html>

<?php
    $crud->closeDB();
?>