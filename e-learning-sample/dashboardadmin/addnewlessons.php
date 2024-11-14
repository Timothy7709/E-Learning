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

if(isset($_REQUEST['lessonSubmit'])){
    if(($_REQUEST['lessonName'] == "") || ($_REQUEST['lessonDesc'] == "")){ //part 11 25.00
        $msg = '<span class="text-danger">Fill all forms</span>';
    }else{
        $lessonName = $_REQUEST['lessonName'];
        $lessonDesc = $_REQUEST['lessonDesc'];
        $course_ID = $_REQUEST['course_ID'];
        $courseName = $_REQUEST['courseName'];
        $lessonLink = $_FILES['lessonLink']['name'];
        $lessonLinkTemp = $_FILES['lessonLink']['tmp_name'];
        $linkFolder = '../lessonLink/'.$lessonLink;
        move_uploaded_file($lessonLinkTemp, $linkFolder);

        $sql = "INSERT INTO lesson (lesson_name, lesson_desc, lesson_link, course_ID, course_name)
                VALUES ('$lessonName', '$lessonDesc', '$linkFolder', '$course_ID', '$courseName')";

        if($conn->query($sql) == true){
            $msg = '<span class="text-success"> Lesson added</span>';
        }else{
            $msg = '<span class="text-danger"> Query Error!</span>';
        }
    }
}
?>

    <div class="container mt-5">
        <div class="contentdashAdmin">
        <h2>Add Lesson</h2>
        <hr>


            <form action="" class="formprofile" style="margin-bottom: 20px;" method="post" enctype="multipart/form-data">
                <div class="formgroup" >
                    <div>Course ID</div>
                    <input type="number" class="formSize" name="course_ID" value="<?php if(isset($_SESSION['course_ID'])){echo $_SESSION['course_ID'];} ?>" readonly>
                </div>

                <div class="formgroup">
                    <div>Course Name</div>
                    <input type="text" class="formSize" name="courseName" value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];} ?>" readonly>
                </div>
                
                <div class="formgroup">
                    <div>Lessons Name</div>
                    <input type="text" placeholder="Lessons Name" class="formSize" name="lessonName" id="lessonName">
                </div>

                <div class="formgroup">
                    <div>Description</div>
                    <textarea placeholder="Your Message" required class="formSize" name="lessonDesc" id="lessonDesc">
                    </textarea>
                </div>


                <div class="formgroup">
                    <div>Lessons Video Link</div>
                    <input type="file" accept="video/*" class="formSize" name="lessonLink" id="lessonLink">

                </div>

                <div class="formgroup" style="display: flex; flex-direction: row; gap: 10px;">
                    <button class="update-profile" href="" type="submit" name="lessonSubmit" id="lessonSubmit">Submit</button>
                    <a class="update-profile" href="./lessonsadmin.php">Close</a>
                    <?php if(isset($msg)){echo $msg;} ?>
                </div>
            </form>
        
        <!-- Akhir Tabel -->

        </div>
    </div>
    
    <!-- <div class="container">

        <div class="profilecontent">

            <form action="" class="formprofile" style="margin-bottom: 20px;" >
                <div class="formgroup" >
                    <p>Course ID</p>
                    <input type="number" placeholder="Course ID">
                </div>
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
                    <p>Lessons Name</p>
                    <input type="text" placeholder="Lessons Name">
                </div>
                <div class="formgroup">
                    <p>Lessons Video Link</p>
                    <input type="file" accept="video/*">

                </div>
                <div class="formgroup" style="display: flex; flex-direction: row; gap: 10px;">
                    <a class="update-profile" href="">Submit</a>
                    <a class="update-profile" href="./lessonsadmin.php">Close</a>
                </div>
                

            </form>

            
        </div>
        

        
    </div> -->

    <!-- footer  -->
    <?php include('./staticDashboard/footer.php') ?>