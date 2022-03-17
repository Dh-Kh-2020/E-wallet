<?php

require_once('connectDB.php');
include_once('crud.php');

class Wallets extends DBConnection{
    private $wid;
    private $uid;
    private $balance;
    private $currency;

    function __construct($uid){
        parent::__construct();
        
        // echo "add to wallet succeed";
        $this->uid = $uid;
        // $this->wid = bin2hex(random_bytes(4));
        $this->balance = 0;
        $this->currency = 'YR';

        $this->createWallet();
    }

    function createWallet(){
        // if(){
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
        $bl = $this->conn->real_escape_string($_POST['mybalance']);
        $cr = $this->conn->real_escape_string($_POST['myCurrency']);
        
        
        $uQuery = mysqli_query($this->conn, "SELECT uid FROM wallet WHERE balance='".$bl."', currency='".$cr."'");

        $uid =  mysqli_fetch_assoc($uQuery);
        $query = mysqli_query($this->conn, "UPDATE wallet SET balance = '".$bl."', currency = '".$cr."' WHERE uid = '".$uid['uid']."'");
    }
}