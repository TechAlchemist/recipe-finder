// $('#loginBtn').on('click', login);

// function login() {
//   let email = $("#username").val();
//   let pass = $("#password").val();

//   if (email != "" && pass != "") {
//     $.ajax({
//       type: "post",
//       url: "./php-scripts/login.php",
//       data: {
//         login: "login",
//         email: email,
//         password: pass,
//       },
//       success: function (response) {
//         if (response == "success") {
//           window.location.href = "index.php";
//           alert('That worked :D');
//         } 
//         else { 
//           alert("Wrong Details");
//         }
//       },
//     });
//   } else {
//     alert("Please Fill All The Details");
//   }

//   return false;
// }
