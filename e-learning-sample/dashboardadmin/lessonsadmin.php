<?php 

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

include('../query/dbConnection.php');

include('./staticDashboard/sidebar.php');

//query
$sql = "SELECT course_ID FROM course";
$result = $conn->query($sql);

//jika tombol delete dipencet
if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM lesson WHERE lesson_ID = {$_REQUEST['id']}";

    if($conn->query($sql) == true){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    }else{
        echo "Unable to delete";
    }
}

?>

<div class="container mt-5">
            <div class="contentdashAdmin">
                <h2>Lessons</h2>
                <hr>

                <form action="" method="post">
                    <h5>Enter Course ID: </h5>
                    <input name="checkid" id="checkid" type="number">
                    <button style="background-color: #464444;color: #ffffff;" type="submit">Search</button>
                </form>
    
                <!-- Middle Section -->
                <!-- ketika search dipencet maka hanya tampilkan ini! -->
                <?php while($row = $result->fetch_assoc()){
                    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_ID']){
                        $sql = "SELECT * FROM course WHERE course_ID = {$_REQUEST['checkid']}";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        if(($row['course_ID'] == $_REQUEST['checkid'])){
                            $_SESSION['course_ID'] = $row['course_ID'];                        
                            $_SESSION['course_name'] = $row['course_name'];
                            ?>
                <div class="middlelessons">
                <p>
                    <div class="judulcardtable">
                        Course ID: <?php if(isset($row['course_ID'])){echo $row['course_ID'];} ?> || 
                        Course Name: <span><?php if(isset($row['course_name'])){echo $row['course_name'];} ?></span>
                    </div> 
                    <a href="./addnewlessons.php" id="addnew">+</a>
                </p>
                </div>

                <?php
                        }
                    }
                } ?>
    
                <?php 
                    if(!isset($_REQUEST['checkid'])){
                        echo "<div class='alert alert-dark mt-3' role='alert'>Search course</div>";
                    }else{
                    $sql = "SELECT * FROM lesson WHERE course_ID = {$_REQUEST['checkid']}";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                ?>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr >
                            <th>Lessons ID</th>
                            <th>Lessons Name</th>
                            <th>Lessons Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php while($row = $result->fetch_assoc()){  ?>
                    <tbody>
                        <tr>
                            <td><?= $row['lesson_ID']; ?></td>
                            <td><?= $row['lesson_name']; ?></td>
                            <td><?= $row['lesson_link']; ?></td>
                            <td>
                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" value="<?= $row['lesson_ID']; ?>" name="id">
                                    <button name="delete"><i class="fa-solid fa-trash" style="color: #ff0019;"></i></button> 
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
    
                    </tbody>
                </table>
            <?php }else{echo "<div class='alert alert-dark mt-3' role='alert'>Lesson not found or created yet</div>";} } ?>
            </div>
        </div>





    <!-- footer  -->
    <?php include('./staticDashboard/footer.php') ?>