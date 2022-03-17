<?php

require_once('connectDB.php');
// include('wallet.php');
// $db = new DBConnection();

class CRUD extends DBConnection{

    public $wallet;
    
    function insert($post){
        $us     = $this->conn->real_escape_string($_POST['username']);
        $uid    = $this->conn->real_escape_string($_POST['uid']);
        $em     = $this->conn->real_escape_string($_POST['email']);
        $psw    = $this->conn->real_escape_string($_POST['password']);
        $mb     = $this->conn->real_escape_string($_POST['mobile']);

        $eQuery = mysqli_query($this->conn, "SELECT email FROM users WHERE email='".$em."'");
        $mQuery = mysqli_query($this->conn, "SELECT mobile FROM users WHERE mobile='".$mb."'");

        if (mysqli_num_rows($eQuery) > 0) {
            echo "email is already exists";
        } elseif (mysqli_num_rows($mQuery) > 0) {
            echo "Mobile No. is already exists";
        } else {

            $query = "INSERT INTO users VALUES ('".$uid."', '".$us."', '".$em."', '".md5($psw)."', '".$mb."')";
            if (!mysqli_query($this->conn, $query)) {
                echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
            } 
        }
    }

    function select($post){
        $un     = $this->conn->real_escape_string($_POST['username']);
        // $em     = $this->conn->real_escape_string($_POST['email']);
        $psw    = $this->conn->real_escape_string($_POST['password']);
        // $md5 = md5($psw);
    
        $query = "SELECT * FROM users WHERE username = '".$un."' AND password = '".md5($psw)."'";
        $result = mysqli_query($this->conn, $query);
        $rows = mysqli_fetch_assoc($result);

    //     if ($result) {
    //         $this->wallet = mysqli_fetch_assoc($result);

    //         $_SESSION['wallet'] = [
    //             "loggedin"  => true,
    //             "uid"       => $wallet['uid'],
    //             "wid"       => $wallet['wind'],
    //             "email"     => stripslashes($_POST['email']),
    //             "password"  => stripslashes($_POST['password']),

    //         ];
            
    //         header("location: dashboard.php");
    //         exit;
    //     // }
    //     } else {
    //     echo "<div class='errors'>
    //             <p>Incorrect email/password.</p>
    //             <p>".$rows."</p>
    //         </div>";
    // }
        
        return $rows;
    }
}