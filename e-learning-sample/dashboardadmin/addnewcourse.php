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

include('./staticDashboard/sidebar.php'); 
include('../query/dbConnection.php');

if(isset($_REQUEST['submitCourse'])){
    if(($_REQUEST['courseName'] == "") || ($_REQUEST['courseDesc'] == "") || ($_REQUEST['courseAuthor'] == "")){
        $msg = '<span class="text-danger">Fill all forms</span>';
    }else{
        $courseName = $_REQUEST['courseName'];
        $courseDesc = $_REQUEST['courseDesc'];
        $courseAuthor = $_REQUEST['courseAuthor'];
        $courseImage = $_FILES['courseImg']['name'];
        $courseImageTemp = $_FILES['courseImg']['tmp_name'];
        $imgFolder = '../image/courseImg/'.$courseImage;
        move_uploaded_file($courseImageTemp, $imgFolder);

        $sql = "INSERT INTO course (course_name, course_desc, course_author, course_img)
                VALUES ('$courseName', '$courseDesc', '$courseAuthor', '$imgFolder')";

        if($conn->query($sql) == true){
            $msg = '<span class="text-success"> Course added</span>';
        }else{
            $msg = '<span class="text-danger">Query Error!</span>';
        }
    }
}


?>

<div class="container mt-5">
    <div class="contentdashAdmin">
    <h2>Add Course</h2>
    <hr>


        <form action="" class="formprofile mt-4" method="post" enctype="multipart/form-data">
                <div class="formgroup">
                    <p>Course Name</p>
                    <input type="text" placeholder="Course Name" class="formSize" name="courseName">
                </div>

                <div class="formgroup">
                    <p>Description</p>
                    <textarea placeholder="Your Message" required class="formSize" name="courseDesc">

                    </textarea>
                </div>

                <div class="formgroup">
                    <p>Author</p>
                    <input type="text" placeholder="Author" class="formSize" name="courseAuthor">
                </div>

                <div class="formgroup">
                    <p>Upload Image</p>
                    <input type="file" accept="image/jpeg, image/png, image/jpg, video/mp4" name="courseImg">
                </div>

                <div class="formgroup" style="display: flex; flex-direction: row; gap: 10px;">
                    <button class="update-profile" href="" name="submitCourse">Submit</button>
                    <a class="update-profile" href="./lessonsadmin.php">Close</a>
                    <?php if(isset($msg)){echo $msg;} ?>
                </div>
            </form>
        
        <!-- Akhir Tabel -->

    </div>
</div>


<!-- footer  -->
<?php include('./staticDashboard/footer.php') ?>


    <!-- <div class="container mt-5">
        <div class="profilecontent">
            <h2>Add Course</h2>
            <hr>

            <form action="" class="formprofile">
                <div class="formgroup">
                    <p>Course Name</p>
                    <input type="text" placeholder="Course Name">
                </div>

                <div class="formgroup">
                    <p>Description</p>
                    <textarea name="Message" placeholder="Your Message" required>

                    </textarea>
                </div>

                <div class="formgroup">
                    <p>Author</p>
                    <input type="text" placeholder="Author">
                </div>

                <div class="formgroup">
                    <p>Upload Image</p>
                    <input type="file" accept="image/jpeg, image/png, image/jpg, video/mp4">
                </div>

                <div class="formgroup" style="display: flex; flex-direction: row; gap: 10px;">
                    <a class="update-profile" href="">Submit</a>
                    <a class="update-profile" href="./courses.php">Close</a>
                </div>
            </form>

        </div>
        
    </div> -->
