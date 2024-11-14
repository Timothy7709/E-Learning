<!-- sidebar  -->
<?php 

if(!isset($_SESSION)){
    session_start();
}

//session student
if(!isset($_SESSION['isLogin'])){
    echo '<script>location.href = "../home.php"</script>';
}else{
    $stdEmail = $_SESSION['stdLogEmail'];
}

include('./staticElearning/sidebar.php');
include_once('../query/dbConnection.php');

$sql = "SELECT * FROM students WHERE std_email = '$stdEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $std_ID = $row['std_ID'];
    $stdEmail = $row['std_email'];
    $stdName = $row['std_name'];
    $stdPass = $row['std_pass']; //ini dari database
}

//jika update dipencet
if(isset($_REQUEST['updateBtn'])){
    if(($_REQUEST['stdPass']) == ""){
        $msg = '<div class="alert alert-warning" role="alert">New password required!</div>';
    }else{
        $stdPass = $_REQUEST['stdPass']; //inii dari input
        $stdName = $_REQUEST['stdName']; //inii dari input
        $sql = "UPDATE students SET std_name = '$stdName', std_pass = '$stdPass'";
        if($conn->query($sql) == true){
            $msg = '<div class="alert alert-success" role="alert">Profile Updated</div>';
        }else{
            $msg = '<div class="alert alert-danger" role="alert">Query failed!</div>';
        }
    }

}
?>

        <!-- Profile Content -->
        <div class="container mt-5">
            <div class="profilecontent">
                <h2>My Profile</h2><hr>
    
                <form action="" class="formprofile" method="post">
                    <div class="formgroup">
                        <p>Student ID</p>
                        <input type="text" value="<?php if(isset($row['std_ID'])){echo $row['std_ID'];} ?>" readonly>
                    </div>
                    <div class="formgroup">
                        <p>Email</p>
                        <input type="email" value="<?php if(isset($row['std_email'])){echo $row['std_email'];} ?>" readonly>
                    </div>
                    <div class="formgroup">
                        <p>Name</p>
                        <input type="text" placeholder="<?php if(isset($row['std_name'])){echo $row['std_name'];} ?>" name="stdName">
                    </div>
                    <div class="formgroup">
                        <p>Password</p>
                        <input type="text" placeholder="<?php if(isset($row['std_pass'])){echo $row['std_pass'];} ?>" name="stdPass">
                    </div>
                    <div class="formgroup">
                        <button class="btn btn-dark my-3" href="" name="updateBtn">Update profile</button>
                        <?php if(isset($msg)){echo $msg;} ?>
                    </div>
                    
                </form>
    
                
            </div>
        </div>


    <!-- footer  -->
    <?php include('./staticElearning/footer.php') ?>



