<?php

    require_once('crud.php');
    require('validator.php');
    require('wallet.php');

    $crud = new CRUD();

    if (isset($_POST['register'])){
        $validForm = new UserValidator($_POST); 
        $err = $validForm->validation();
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

    <title>Register</title>
</head>
<body>
<form action=""  method="POST" enctype="multipart/form-data">
    <div class="__container m-auto my-5 border shadow">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="username"><b>User Name</b></label>
        <input type="text" placeholder=" * Enter Name" name="username" id="username">
            <div class="errors">
                <?php 
                    if(isset($_POST['username'])) {
                        echo $err['username'] ?? '';
                    }
                ?>
            </div>

        <label for="uid"><b>User Identification Number</b></label>
        <input type="text" placeholder=" * Enter Identification Number" name="uid" id="uid">
            <div class="errors">
                <?php 
                    if(isset($_POST['uid'])) {
                        echo $err['uid'] ?? '';
                    }
                ?>
            </div>
        
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder=" * Enter Email" name="email" id="email">
            <div class="errors">
                <?php 
                    if(isset($_POST['email'])){
                        echo $err['email'] ?? '';
                    }
                ?>
            </div>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder=" * Enter Password" name="password" id="psw">
            <div class="errors">
                <?php 
                    if(isset($_POST['password'])){
                        echo $err['password'] ?? '';
                    }
                ?>
            </div>

        <label for="psw_conf"><b>Confirm Password</b></label>
        <input type="password" placeholder=" * Confirm Password" name="psw_conf" id="psw_conf">
            <div class="errors">
            <?php
                if (isset($_POST['psw_conf']) && !empty($_POST['psw_conf'])){
                    if($_POST['psw_conf'] !== $_POST['password']){
                        echo "Does not match password !";
                    }
                }
            ?>
            </div>

        <label for="mobile"><b>Mobile</b></label>
        <input type="tel" placeholder=" * mobile" name="mobile" id="mobile">
            <div class="errors">
                <?php 
                    if(isset($_POST['mobile'])){
                        echo $err['mobile'] ?? '';
                    }
                ?>
            </div>
        <hr>

        <p>By creating an account you agree to our <a href="">Terms & Privacy</a>.</p>
        <input type="submit" name="register" class="registerbtn" value="Register">
        
        <div class="signin">
            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
    </div>
</form>

</body>
</html>

<?php

    if($_POST){
        if ($_POST['password'] === $_POST['psw_conf']){
            $crud->insert($_POST);
            $wallet = new Wallets();
            $wallet->createWallet($_POST['uid']);

            header("Location: login.php"); 
            exit();
        }
    }

    $crud->closeDB();
?>