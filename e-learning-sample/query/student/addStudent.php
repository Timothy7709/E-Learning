<?php
session_start();

include_once('../dbConnection.php');

if (isset($_POST['stdsignup']) && isset($_POST['stdRegName']) && isset($_POST['stdRegEmail']) && isset($_POST['stdRegPassword'])) {
    $stdName = $_POST['stdRegName'];
    $stdEmail = $_POST['stdRegEmail'];
    $stdPassword = $_POST['stdRegPassword'];

    $sql = "INSERT INTO students(std_name, std_email, std_pass) VALUES ('$stdName', '$stdEmail', '$stdPassword')";

    if ($conn->query($sql) == true) {
        echo json_encode("yes");
        $_SESSION['isLogin'] = true;
    }else{
        echo json_encode("no");
    }
}


?>