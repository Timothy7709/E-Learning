<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISchool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./cssHome/App.css">
    <link rel="stylesheet" href="./cssHome/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- navbar -->
    <section id="nav">
        <nav class="navbar navbar-expand-lg bg-body-transparent">
            <div class="container-fluid">
            <a class="navbar-brand text-light  animated  fadeInLeft delay-2s" href="#"><img style="height: 80px; width: 120px;" src="./assets/LogoRooMath.png" alt=""> <span>Learning Path Management</span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active text-light" id="homenav" aria-current="page" href="#">Home</a>
                  <a class="nav-link text-light" href="#content3">Courses</a>
                  <a class="nav-link text-light" href="#">About</a>
                  <?php if (isset($_SESSION['isLogin'])) { ?>
                  <a class="nav-link text-light" href="./Elearning/profile.php">My Profile</a>
                  <a class="nav-link text-light" id="showLogin" href="./query/logout.php">Logout</a>
                  <?php }else{ ?>
                  <a class="nav-link text-light" id="showLogin" onclick="on()">Login</a>
                  <?php } ?>
                  <a class="nav-link text-light" id="showCreateAccount" onclick="on()">Sign Up</a>

                </div>
              </div>
            </div>
          </nav>
    </section>
    
    <div class="overlay form--hidden" id="overlay"></div>
        <div class="body-login form--hidden" id="showBody">
        <div class="container3">
          <!-- LOGIN -->
            <form class="form " id="login" action="">
                <div class="upper-login">
                  <!-- <h2 class="close" id="Closeform">X</h2> -->
                  <h1 class="form__title">Student Login</h1>
                  <a class="close" id="CloseLoginForm" onclick="off()">X</a>
                </div>
                
                <div class="form__message form__message--error"></div>
                <div class="form__input-group">
                  <h5>Email</h5>
                  <input type="email" class="form__input" id="loginEmail" autofocus required placeholder="loginEmail">
                <div class="form__input--error-message"></div>
          </div>

                <div class="form__input-group">
                    <h5>Password</h5>
                  <input type="password" class="form__input" id="loginPass" autofocus required placeholder="loginPassword">
                  <div class="form__input--error-message"><span class="loadingLogin"></span></div>
                </div>
                <button class="form__button" type="submit" onclick="stdLogin()">Submit</button>
                <p class="form__text">
                  Don’t have an account? <a class="form__link" id="linkCreateAccount">Register now</a>
                </p>
            </form>
            <!-- REGISTER -->
            <form class="form form--hidden text-dark" id="createAccount" action="">
              <div class="upper-login">
                <!-- <h2 class="close" id="Closeformregister">X</h2> -->
                <h1 class="form__title">Student Register</h1>
                <a class="close" id="CloseCreateAccountForm" onclick="off()">X</a>
              </div>
              <div class="form__input-group">
                <h5>Name</h5><small id="regisStatus1"></small>
                <input type="text" class="form__input" id="Name" autofocus placeholder="Name">
                <div class="form__input--error-message"></div>
              </div>
              <div class="form__input-group">
                <h5>Email</h5><small id="regisStatus2"></small>
                <input type="email" class="form__input" id="SignUpEmail" autofocus placeholder="Email">
                <div class="form__input--error-message"></div>
              </div>
              <div class="form__input-group">
                <h5>Password</h5><small id="regisStatus3"></small>
                <input type="password" class="form__input" id="SignUpPassword" autofocus placeholder="Password">
                <div class="form__input--error-message"></div>
              </div>
              <h6 id="errormessage"></h6>
              <button class="form__button" onclick="addStudent()" id="btnRegis">Submit</button>
              <p class="form__text">
                Already have an account? <a class="form__link" id="linkLogin">Sign in</a>
              </p>
            </form>
            <!-- Login Admin -->
        <form class="form form--hidden" id="loginadminform" action="">
          <div class="upper-login">
            <a class="close" id="CloseLoginAdmin" onclick="off()">X</a>
              <h1 class="form__title">Admin Login</h1>
          </div>
          <div class="form__input-group">
              <h5>Email</h5>
              <input type="email" class="form__input" id="adminEmail" autofocus placeholder="Email">
              <div class="form__input--error-message"></div>
          </div>
          <div class="form__input-group">
              <h5>Password</h5>
              <input type="password" class="form__input" id="adminPassword" autofocus placeholder="Password">
              <div class="form__input--error-message"></div>
          </div>
          <h6 id="errormessageAdm"></h6>
          <button class="form__button" id="admLoginForm" type="button" onclick="admLogin()">Submit</button>
        </form>
        </div>
    </div>
