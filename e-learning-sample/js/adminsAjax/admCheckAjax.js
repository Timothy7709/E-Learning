//untuk admin login
//karena page untuk login admin blm dibuat, jadi isi ini cuma kerangka doang

// $(document).ready(function () {
//   $("#admLoginForm").on("click", function () {
//     event.preventDefault();
//     alert("ini pindah ke admcheckajax.js");
//   });
// });

function admLogin() {
  let admLogEmail = $("#adminEmail").val();
  let admLogPass = $("#adminPassword").val();
  console.log(admLogEmail);

  //ajxx AJAX
  //nanti ketika sukses login, masuk ke dashboard admin
  $.ajax({
    url: "query/admin/checkAdmin.php",
    method: "POST",
    data: {
      checklogin: "checklogin",
      admLogEmail: admLogEmail,
      admLogPass: admLogPass,
    },
    success: function (data) {
      console.log(data);
      if (data == 1) {
        $("#errormessageAdm").html("<span class='spinner-border text-success'></span>");
        setTimeout(() => {
          window.location.href = "./dashboardadmin/dashboardadmin.php";
        }, 900);
      } else if (data == 0) {
        $("#errormessageAdm").html("<span class='text-danger'>Wrong</span>");
      }
    },
  });
}
