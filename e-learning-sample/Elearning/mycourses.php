        <!-- sidebar  -->
<?php 

if(!isset($_SESSION)){
    session_start();
}

include_once('../query/dbConnection.php');

//session student
if(!isset($_SESSION['isLogin'])){
    echo '<script>location.href = "../home.php"</script>';
}else{
    $stdEmail = $_SESSION['stdLogEmail'];
}   

include('./staticElearning/sidebar.php');

$getCourseID = "";

if(!isset($_GET['course_ID'])){
    $msg = "<div class='alert alert-dark mt-3' role='alert'>No courses</div>";
}else{
    $getCourseID = $_GET['course_ID'];
}


$sql = "SELECT * FROM course WHERE course_ID = '$getCourseID'";
$result = $conn->query($sql);



?>

        <!-- mycourses content -->
        
        <div class="container mt-5">
            <div class="courses">
             <h1 class="Course-title">My Courses</h1><br>
             <div class="card">
                <div class="card-header" style="background-color: #E8E8E8;">
                    <?php if($result->num_rows > 0){
                     while($row = $result->fetch_assoc()){ 
                        ?>
                    <h5><?= $row['course_name']; ?></h5>
                </div>
                <div class="card-body d-flex" style="background-color: #F7F7F7;">
                    <img src="<?= $row['course_img']; ?>" alt="" srcset="" class="img-course">
                    <div class="card-text text-dark ms-3 course-detail">
                        <?= $row['course_desc']; ?>
                        <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis cupiditate veritatis accusamus facilis ea dignissimos eligendi dolor eos voluptatem voluptatum minima, doloribus, ratione culpa tempora illo tenetur officia sint porro? -->
                        <div class="mt-2">
                            <a href="../Lessons/lessons.php?course_ID=<?= $row['course_ID']; ?>" class="btn btn-dark">Learn now</a>
                        </div>
                    </div>
                    <?php }
                    } else{echo $msg;} ?>
                </div>
            </div>
            </div>
        </div>
       
        
       
        


    </div>


    <!-- footer  -->
    <?php include('./staticElearning/footer.php') ?>