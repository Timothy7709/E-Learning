//untuk mengecheck apakah email sudah terdaftar didatabase atau blm
//
$(document).ready(function () {
  //ini menunggu folder untuk dirender, baru dieksekusi
  $("#SignUpEmail").on("keypress blur", function () {
    let stdRegEmail = $("#SignUpEmail").val();

    //AJAX DISINI YAAA, jgn lupa diganti
    $.ajax({
      url: "query/student/checkStudent.php",
      method: "POST",
      data: {
        checkmail: "checkmail",
        stdEmail: stdRegEmail,
      },
      success: function (data) {
        console.log(data);
        if (data != 0) {
          $("#btnRegis").attr("disabled", true);
          $("#regisStatus2").html("<small class='text-danger'> email used</small>");
        } else if (data == 0) {
          $("#btnRegis").attr("disabled", false);
          $("#regisStatus2").html("<small class='text-success'> good!</small>");
        }
      },
    });
  });
});

//login
function stdLogin() {
  event.preventDefault();
  let stdLogEmail = $("#loginEmail").val();
  let stdLogPass = $("#loginPass").val();

  //GANTI JADI AJAX
  $.ajax({
    url: "query/student/checkStudent.php",
    method: "POST",
    data: {
      checklogin: "checklogin",
      stdLogEmail: stdLogEmail,
      stdLogPass: stdLogPass,
    },
    success: function (data) {
      console.log(data);
      if (data == 1) {
        $(".loadingLogin").html("<span class='spinner-border text-success'></span>");
        setTimeout(() => {
          window.location.href = "home.php";
        }, 900);
      } else if (data == 0) {
        $(".loadingLogin").html("<span class='text-danger'>Wrong</span>");
      }
    },
  });
}
