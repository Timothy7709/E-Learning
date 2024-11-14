<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISchool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./Elearning.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section id="nav">
        <nav class="navbar navbar-expand-lg bg-body-transparent" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand text-light" href="#">E-Learning</a>  
            </div>
          </nav>
    </section>

        <!-- Sidebar  -->
        <nav id="sidebar">
            <ul class="list-unstyled components">
                <li class="imgprofile">
                    <img src="../assets/gambaruser.png" alt="">

                </li>
                <li>
                    <a href="./profile.php"><i class="fa-solid fa-user"></i>Profile</a>
                </li>

                <li>
                    <a href="./mycourses.php"><i class="fa-solid fa-book"></i>My Courses</a>
                </li>
                <li>
                    <a href="../home.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Home</a>
                </li>
                <li>
                    <a href="../query/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                </li>
            </ul>
        </nav>