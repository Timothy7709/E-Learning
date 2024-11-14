// function togglePasswordVisibility(inputId) {
//     var passwordInput = document.getElementById(inputId);
//     var togglePassword = document.getElementById('toggle' + inputId);

//     if (passwordInput.type === "password") {
//         passwordInput.type = "text";
//         togglePassword.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
//     } else {
//         passwordInput.type = "password";
//         togglePassword.innerHTML = '<i class="fa-solid fa-eye"></i>';
//     }
// }

// function updatePasswordVisibility(inputId, toggleId) {
//     var passwordInput = document.getElementById(inputId);
//     var togglePassword = document.getElementById(toggleId);

//     if (passwordInput.value.trim() !== '') {
//         togglePassword.style.visibility = 'visible';
//     } else {
//         togglePassword.style.visibility = 'hidden';
//     }
// }

//akan ada untuk student dan untuk admin
//std = student, adm = admin
//query HANYA untuk INSERT disini aja ya, yg lainnya di folder ajax
$(document).ready(function () {
  function addStudent() {
    event.preventDefault();
    //std = student, Reg = register
    let regex = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}/i; //untuk check email valid atau tidak
    let stdRegName = $("#Name").val();
    let stdRegEmail = $("#SignUpEmail").val();
    let stdRegPassword = $("#SignUpPassword").val();

    if (!regex.test(stdRegEmail) && stdRegEmail.trim() != "") {
      $("#regisStatus2").html("<small class='text-danger'> Invalid email</small>");
      $("#SignUpEmail").focus();
      return false;
    } else if (stdRegName.trim() == "") {
      $("#regisStatus1").html("<small class='text-danger'> Please put name</small>");
      $("#Name").focus();
      return false;
    } else if (stdRegEmail.trim() == "") {
      $("#regisStatus2").html("<small class='text-danger'> Please put email</small>");
      $("#SignUpEmail").focus();
      return false;
    } else if (stdRegPassword.trim() == "") {
      $("#regisStatus3").html("<small class='text-danger'> Please put password</small>");
      $("#SignUpPassword").focus();
      return false;
    } else {
      // AJAXNYA TOLONG GANTI YAA
      $.ajax({
        url: "query/student/addStudent.php",
        method: "POST",
        datatype: "JSON",
        data: {
          stdsignup: "stdsignup",
          stdRegName: stdRegName,
          stdRegEmail: stdRegEmail,
          stdRegPassword: stdRegPassword,
        },
        success: function (data) {
          console.log(data);
          if (data == "yes") {
            $("#Name").val("");
            $("#SignUpEmail").val("");
            $("#SignUpPassword").val("");
            $("#errormessage").html("<span class='spinner-border text-success'></span>");
            setTimeout(() => {
              window.location.href = "https://www.youtube.com/watch?v=TREPCbJQPI8";
            }, 900);
          } else if (data == "no") {
            $(".statusLogin").html("<span class='text-danger'>Failed</span>");
          }
        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText);
          // Handle the error and display an appropriate message to the user
          $("#errormessage").html("<span class='text-danger'>Error occurred. Please try again.</span>");
        },
      });
    }
  }
});

//show login dan register ketika link di klik
document.addEventListener("DOMContentLoaded", () => {
  event.preventDefault();
  const loginForm = document.querySelector("#login");
  const createAccountForm = document.querySelector("#createAccount");
  const loginadminform = document.querySelector("#loginadminform");
  const showBody = document.getElementById("showBody");
  const showLogin = document.querySelector("#showLogin");
  const showCreateAccount = document.querySelector("#showCreateAccount");
  const CloseAccountForm = document.querySelector("#CloseCreateAccountForm");
  const CloseLoginForm = document.querySelector("#CloseLoginForm");
  const loginAdmin = document.querySelector("#showloginadmin");
  const closeAdmin = document.querySelector("#closeLoginAdmin");

  document.querySelector("#linkCreateAccount").addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.classList.add("form--hidden");
    createAccountForm.classList.remove("form--hidden");
    showBody.classList.remove("form--hidden");
    loginadminform.classList.add("form--hidden");
  });

  document.querySelector("#linkLogin").addEventListener("click", (e) => {
    loginForm.classList.remove("form--hidden");
    createAccountForm.classList.add("form--hidden");
    showBody.classList.remove("form--hidden");
    loginadminform.classList.add("form--hidden");
  });

  document.querySelector("#showLogin").addEventListener("click", (e) => {
    loginForm.classList.remove("form--hidden");
    createAccountForm.classList.add("form--hidden");
    showBody.classList.remove("form--hidden");
    loginadminform.classList.add("form--hidden");
  });

  document.querySelector("#showCreateAccount").addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.classList.add("form--hidden");
    createAccountForm.classList.remove("form--hidden");
    showBody.classList.remove("form--hidden");
    loginadminform.classList.add("form--hidden");
  });

  document.querySelector("#CloseLoginForm").addEventListener("click", (e) => {
    loginForm.classList.add("form--hidden");
    createAccountForm.classList.add("form--hidden");
    showBody.classList.add("form--hidden");
    loginadminform.classList.add("form--hidden");
  });

  document.querySelector("#CloseCreateAccountForm").addEventListener("click", (e) => {
    loginForm.classList.add("form--hidden");
    createAccountForm.classList.add("form--hidden");
    showBody.classList.add("form--hidden");
    loginadminform.classList.add("form--hidden");
  });
  document.querySelector("#showloginadmin").addEventListener("click", (e) => {
    e.preventDefault();
    loginadminform.classList.remove("form--hidden");
    createAccountForm.classList.add("form--hidden");
    showBody.classList.remove("form--hidden");
    loginForm.classList.add("form--hidden"); // Fix this line
  });

  document.querySelector("#CloseLoginAdmin").addEventListener("click", (e) => {
    loginadminform.classList.add("form--hidden");
    createAccountForm.classList.add("form--hidden");
    showBody.classList.add("form--hidden");
    loginForm.classList.remove("form--hidden"); // Fix this line
  });
});

function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}

const nav = document.querySelector(".navbar");

// Add an event listener to the document
// so that a class is added to the nav
// element when the page is scrolled
document.addEventListener("scroll", () => {
  event.preventDefault();
  nav.classList.add("scrolled");

  // After 1s, check if the user has scrolled to
  // the top of the page and make the nav
  // element transparent again
  setTimeout(() => {
    if (window.pageYOffset === 0 && nav.classList.contains("scrolled")) {
      nav.classList.remove("scrolled");
    }
  }, 1000);
});
