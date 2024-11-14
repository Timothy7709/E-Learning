<?php 
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
include('../query/dbConnection.php');


$sql = "SELECT * FROM course"; //part9 58.30
$result = $conn->query($sql);//tapi gw kerjainnya disini

//jika tombol delete dipencet
if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM course WHERE course_ID = {$_REQUEST['id']}";

    if($conn->query($sql) == true){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    }else{
        echo "Unable to delete";
    }
}
?>

    <div class="container mt-5">
        <div class="contentdashAdmin">
        <h2>Courses List</h2>
        <hr>
            <!-- Tabel -->
            <div class="middlelessons">
                <p>
                    <div class="judulcardtable">List Of Courses  </div> 
                    <a href="./addnewcourse.php" id="addnew">+</a>
                </p>
            </div>
    
            <?php if($result->num_rows > 0){ ?>
            <table class="table">
                <thead>
                    <tr >
                        <th>Course Id</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($row = $result->fetch_assoc()){ ?>
                    <tr>
                        <td><?= $row['course_ID']; ?></td>
                        <td><?= $row['course_name']; ?></td>
                        <td><?= $row['course_author']; ?></td>
                        <td>
                            <form action="" method="post" class="d-inline" >
                                <input type="hidden" value="<?= $row['course_ID']; ?>" name="id">
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
