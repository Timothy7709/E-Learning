<!-- navbar -->
<?php 
include('./static/navbar.php');
include_once('./query/dbConnection.php');


?>

    <!-- starter page -->
    <section id="content1">
        <div class="content1">
            <h1>Welcome To Ischool</h1>
            <p>Learn and Implement</p>
            <a href="" id="btnstart">Get Started</a>
        </div>
    </section>

    <!-- switching content -->
    <section id="content2">
        <li class="content2">
            <div class="isi  animated  fadeInDown fast">
                <i class="fa-solid fa-book-open" style="color: #ffffff;"></i>
                <p><span>100+</span> Online Course</p>
            </div>
            <div class="isi  animated  fadeInDown slow">
                <i class="fa-solid fa-users" style="color: #ffffff;"></i></i>
                <p><span>Expert</span> Instructor</p>
            </div>
            <div class="isi  animated  fadeInDown faster">
                <i class="fa-solid fa-keyboard" style="color: #ffffff;"></i>
                <p><span>Lifetime</span> Access</p>
            </div>
        </li>
    </section>

    <!-- section setiap courses -->
    <?php include('./coursesSection.php') ?>

    <!-- footer  -->
    <?php include('./static/footer.php') ?>