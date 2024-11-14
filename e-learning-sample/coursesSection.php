<?php 
include_once('./query/dbConnection.php');

$sql = "SELECT * FROM course LIMIT 3";
$result = $conn->query($sql);

//location.href='./Elearning/mycourses.php?courseID=$course_ID;'
?> 
    <!-- courses section -->
    <section id="content3">
        <div class="content3">
            <?php if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $course_ID = $row['course_ID'];
                    ?>
                    <div class="cardcontent">
                        <div class="card" style="width: 18rem;">
                            <!-- format harus pake './file' -->
                            <img src="<?= str_replace('..', '.', $row['course_img']); ?>" class="card-img-top" alt="..."> 
                            <div class="card-body">
                                <h3 class="CourseTitle"><?= $row['course_name'] ?></h3>
                                <p class="card-text"><?= $row['course_desc'] ?></p>
                                <a href="./Elearning/mycourses.php?course_ID=<?= $row['course_ID']; ?>" class="text-decoration-none">
                                    <button type="button" name="enroll" class="btn enrollBtn" style="display: flex; margin-left: auto; background-color: rgb(255, 94, 0); color: #eaeaea;">
                                        Enroll
                                    </button>
                                </a>
                            </div>
                        </div>
                      </div>     
            <?php

            }
                } ?>
    </section>