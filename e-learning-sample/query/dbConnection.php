<?php
//ganti sesuai host, username, password, nama_database, port
$conn = new mysqli("localhost", "root", "password", "lms2_db", "3307");
if($conn->connect_error){
    die("connection failed!");
}

?>