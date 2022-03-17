<?php

class DBConnection {
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $DB = "E-store";
    protected $conn;

    function __construct(){

        // To let MySQL tell you what the actual problem
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->DB);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // echo "Connected successfully";
    }

    function __destruct(){}

    function closeDB(){
        $this->conn->close();
    }
}