<?php 
include_once('../query/dbConnection.php');

//login admun
if(!isset($_SESSION)){
    session_start();
}

//session admin
if(!isset($_SESSION['isLoginAdm'])){
    echo '<script>location.href = "../home.php"</script>';
}else{
    $adminEmail = $_SESSION['admLogEmail'];
}

include('./staticDashboard/sidebar.php');

$sql = "SELECT std_ID, std_name, std_email FROM students";
$result = $conn->query($sql);

//jika tombol delete dipencet
if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM students WHERE std_ID = {$_REQUEST['id']}";

    if($conn->query($sql) == true){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    }else{
        echo "Unable to delete";
    }
}
?>
    <div class="container mt-5">

        <div class="contentdashAdmin">
            <h2>Students List</h2>
            <hr>

                <!-- Tabel -->
                <div class="middlestudent">
                    <h3 class="text-light" style="margin-left: 10px;">List Of Student : </h3>
                </div>
    
                <?php if($result->num_rows > 0){ ?>
                <table class="table">
                    <thead>
                        <tr >
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row = $result->fetch_assoc()){ ?>
                        <tr>
                            <td><?= $row['std_ID']; ?></td>
                            <td><?= $row['std_name']; ?></td>
                            <td><?= $row['std_email']; ?></td>
                            <td>
                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $row['std_ID']; ?>">
                                    <button name="delete"><i class="fa-solid fa-trash" style="color: #ff0019;"></i></button> 
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } ?>
                <!-- Akhir Tabel -->

        </div>
    </div>

    <!-- footer  -->
    <?php include('./staticDashboard/footer.php') ?>
