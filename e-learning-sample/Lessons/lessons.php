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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISchool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./lessons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
</head>
<body>
    <section id="nav">
        <nav class="navbar navbar-expand-lg bg-body-transparent" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand text-light" href="#">Lessons</a>  
            </div>
          </nav>
    </section>




    <div class="container">

        <!-- Sidebar  -->
        <nav id="sidebar">
            <ul class="list-unstyled components mt-3">
                <li>
                    <a href=""><i class="fa-solid fa-book" style="color: #ffffff;"></i>Lessons 1</a>
                </li>

                <li>
                    <a href=""><i class="fa-solid fa-book" style="color: #ffffff;"></i>Lessons 2</a>
                </li>
                <li>
                    <a href=""><i class="fa-solid fa-book" style="color: #ffffff;"></i>Lessons 3</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-book" style="color: #ffffff;"></i>Lessons 4</a>
                </li>
            </ul>
        </nav>

        <div class="contentlessons">
            <div class="insider">
            <?php if(isset($_GET['course_ID'])){
                    $getCourseID = $_GET['course_ID'];
                    $sql = "SELECT * FROM lesson WHERE course_ID = $getCourseID";
                    $result = $conn->query($sql);

                    // while($row = $result->fetch_assoc()){
                        
                    // }

                    while($row = $result->fetch_assoc()){
                        ?>
                    <h2><?= $row['lesson_name']; ?></h2><hr>    

            <?php            
                    }
                } ?>
                <video src="/assets/contohvideo.mp4" width="700" controls type="video/mp4" class="mt-3"></video>
            </div>
        </div>


    </div>


</body>
<script src="/js/Elearning.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

</html>