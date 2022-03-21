<?php

require_once('connectDB.php');
include_once('crud.php');

class Wallets extends DBConnection{
    private $uid;
    private $balance;
    private $currency;

    function __construct(){
        parent::__construct();
        
        $this->balance = 0;
        $this->currency = 'YR';
    }

    function createWallet($uid){
            $this->uid = $uid;
            $query = "INSERT INTO wallet VALUES (null, '".$this->uid."', '".$this->balance."', '".$this->currency."')";
            if (mysqli_query($this->conn, $query)){
                $_SESSION['wallet'] = [
                    'uid' => $this->uid,
                    'balance' => $this->balance,
                    'currency' => $this->currency
                ];
            }
        // }
    }

    function getWallet($uid){
        $query = "SELECT * FROM wallet where uid = '".$uid."'";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    function setbalance($post){
        $user = $_POST['userid'];
        $wQuery = mysqli_query($this->conn, "SELECT * FROM wallet WHERE uid = '".$user."'");
        
        $rows= mysqli_fetch_assoc($wQuery);
        $wid = $rows['wid'];
    
        $query = mysqli_query($this->conn, "UPDATE wallet SET balance = '".$_POST['mybalance']."', currency = '".$_POST['myCurrency']."' WHERE wid = '".$wid."'");
    }

    function depositbalance($post){
        $user = $_POST['depuid'];
        $wQuery = mysqli_query($this->conn, "SELECT * FROM wallet WHERE uid = '".$user."'");
        
        $rows= mysqli_fetch_assoc($wQuery);
        $wid = $rows['wid'];
        $totalbl = intval($rows['balance']) + intval($_POST['depbalance']);
    
        $query = mysqli_query($this->conn, "UPDATE wallet SET balance = '".$totalbl."' WHERE wid = '".$wid."'");
    }

    function withdrawbalance($post){
        $user = $_POST['withuid'];
        $wQuery = mysqli_query($this->conn, "SELECT * FROM wallet WHERE uid = '".$user."'");
        
        $rows= mysqli_fetch_assoc($wQuery);
        $wid = $rows['wid'];
        $totalbl = intval($rows['balance']) - intval($_POST['withbalance']);
        if($totalbl < 0){
            echo "
                <div class='container m-auto mt-5 border shadow' style='width: 50%'>
                    <p class='m-auto p-5 text-danger'>You don't have enough balance in your wallet</p>
                </div>
            ";
        }
    
        $query = mysqli_query($this->conn, "UPDATE wallet SET balance = '".$totalbl."' WHERE wid = '".$wid."'");
    }
}