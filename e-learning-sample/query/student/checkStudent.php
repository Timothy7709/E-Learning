<?php

if(!isset($_SESSION)){
    session_start();
}

//untuk ngecek apakah email sudah terdaftar atau belum
include_once('../dbConnection.php');
if(isset($_POST['checkmail']) && isset($_POST['stdEmail'])){
    $stdEmail = $_POST['stdEmail'];
    $sql = "SELECT std_email FROM students WHERE std_email = '".$stdEmail."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

//student login
if (isset($_POST['checklogin']) && isset($_POST['stdLogEmail']) && isset($_POST['stdLogPass'])) {
    $stdLogEmail = $_POST['stdLogEmail'];
    $stdLogPass = $_POST['stdLogPass'];
    $sql = "SELECT std_email, std_pass FROM students WHERE std_email = '".$stdLogEmail."' AND std_pass = '".$stdLogPass."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if ($row === 1) {
        $_SESSION['isLogin'] = true;
        $_SESSION['stdLogEmail'] = $stdLogEmail;
    }elseif($row === 0){
        $_SESSION['isLogin'] = false;
    }
    echo json_encode($row);
}

?>