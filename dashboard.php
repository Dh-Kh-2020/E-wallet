<?php

// session_start();
include("auth_session.php");
require_once('crud.php');
require_once('wallet.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Your Wallet</title>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-between">
        <h5 class="m-3"> Welcome <?php echo $_SESSION["username"]; ?></h5>
        <!-- <h3 class="mb-3"> Welcome <?php //echo $_SESSION['email']; ?></h3> -->
        <div>
            <button class="btn btn-outline-light border-danger text-danger m-3" data-bs-toggle="modal" data-bs-target="#setBalance">Set Balance</button>
            <a href='logout.php'><button class="btn btn-outline-light border-danger text-danger m-3">Logout</button></a>
        </div>
    </div>

    <div class="container">
        <table  width="100%" border="1" style="margin:auto;font-size: 20px;" class="table table-striped">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>balance</td>
                    <td>curency</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $_SESSION["username"]; ?></td>
                    <td><?php echo $_SESSION["wallet"]['balance']; ?></td>
                    <td><?php echo $_SESSION["wallet"]['currency']; ?></td>
                </tr>
            </tbody>

        </table>
    </div>

    <!-- Set Balance Modal -->
<div class="modal fade" id="setBalance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set Your Balance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" mathod="POST">
                    <div style="width: 80%" class="m-auto">
                        <input type="number" name="mybalance" placeholder="Set your balance">
                    </div>
                    <div class="mt-2 m-auto" style="width: 80%">
                        <input type="text" name="myCurrency" placeholder="set currency">
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="setBalance" class="btn btn-primary">Save balance</button>
                    </div>
                </form>

                <?php
                    if(isset($_POST['setBalance'])){
                        $wall->setbalance($_POST);
                    }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- /Set Balance Modal -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>