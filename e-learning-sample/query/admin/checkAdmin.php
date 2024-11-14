<?php
session_start();

include_once('../dbConnection.php');
//admin login
if (isset($_POST['checklogin']) && isset($_POST['admLogEmail']) && isset($_POST['admLogPass'])) {
    $admLogEmail = $_POST['admLogEmail'];
    $admLogPass = $_POST['admLogPass'];
    $sql = "SELECT adm_email, adm_password FROM admins WHERE adm_email = '".$admLogEmail."' AND adm_password = '".$admLogPass."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if ($row === 1) {
        $_SESSION['isLoginAdm'] = true;
        $_SESSION['admLogEmail'] = $admLogEmail;
    }elseif($row === 0){
        $_SESSION['isLogin'] = false;
    }
    echo json_encode($row);
}

?>