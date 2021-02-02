let data = [];
let cities = [];
let password = false;
let x = true;
let inte;

$(function () {
  //id the user is logged in _______________________________________________________________________________________
 try{
  if (sessionEmail != "none") {
    //hide login and sign up first page and show disconnect button ------
    $(".register").hide();
    $(".disconnect").fadeIn();
    $(
      " .alertChangePaasword , .alertChangeAdress , .alertChangeTelephone , .btnChangeTelephone , .btnChangeAdress"
    ).hide();
    //append disconnect and bell --------------------------
    $(".liDisconnect").append(
      "<a href='#'' role='button' style='padding-right:0'><span onclick='disconnect()' class='btn disconnect btn-danger languageDisconnect'>Disconnect</span></a>"
    );
    $(".liBell").append(
      "<a href='#' role='button' style='padding-right:0'><span class='btn notificationBell '><img width='16px' src='themes/images/ico/bell.png'></span></a>"
    );
    //notification bell work -----------------------------
    inte = setInterval(function () {
      let num = 0;
      if (x == false) {
        $(".notificationBell").css("scale", "0.8");
        $(".notificationBell").css("transition", "1s");
        x = true;
        num = 1;
      }
      if (x == true && num == 0) {
        x = false;
        $(".notificationBell").css("scale", "1.2");
      }
    }, 600);
    //set retrieved personnal data into inputs -----------
    $.ajax({
      type: "post",
      url: "AdminLogin/ClientLogin.php",
      data: {
        infos: "infos",
        email: sessionEmail
      },
      success: function (response) {
        response = JSON.parse(response);
        localStorage.setItem("nom", response[0].nomClient);
        $("#lastName").val(response[0].nomClient);
        $("#firstName").val(response[0].prenomCLient);
        $(".InputChangeAdress").val(response[0].adresseClient);
        $("#telephoneClient").val(response[0].telephone);
      }
    });
  }
  else{
    NotLoggedIn();
  }
}
  //if is not login___________________________________________________________________________________
  catch
  {
    NotLoggedIn();
  }
});
//functions and behavior _________________________________________________________________________________________
  //signIn function -----------------------------
function signIn() {
  var n = 0;
  //session variables to send to php ------------
  var idClient1, email1, nom1,points;
  // sign in ajax request -----------------------
  $.ajax({
    type: "post",
    url: "AdminLogin/ClientLogin.php",
    data: {
      login: "click",
      email: $("#inputEmail1").val(),
      password: $("#inputPassword1").val()
    },
    success: function (response) {
      try {
        response = JSON.parse(response);
        console.log(response);
        if (response.emailClient == $("#inputEmail1").val()) {
          email1 =response.emailClient;
          idClient1 =response.idClient;
          nom1 = response.nomClient;
          points=response.points;
          n = 1;
        }
      } catch {
        console.log(response);
        $(".incorrect").html(
          "<div class='alert alert-danger' role='alert'>'" +
            response +
            "'</div>"
        );
      }
      // if the sign in infos are correct send session data to php
      if (n == 1) {
        $.ajax({
          type: "post",
          url: "AdminLogin/session.php",
          data: {
            idClient: idClient1,
            email: email1,
            nom: nom1,
            point:points
          },
          success: function (response1) {
           
            location.href = "login.php";
          }
        });
      }
    }
  });
}
function NotLoggedIn()
{
  // hide empty profile page---------------
  //$(".profilePage").hide();
  // fetch countries api ------------------
  
      $("#countryCreate").append(
        "<option value='Morocco'>Morocco</option>"
      );
  

  $.getJSON("json/countries.json", function (key) {
    $.each(key, function (key, val) {
      cities.push(val);
      console.log(val);
      $("#cityCreate").append(
        "<option value='"+val+"'>"+val+"</option>"
      );
    });
  });
}
//change adress behavior-------------------------
$(".ShowChangeAdress").on("click", function (e) {
  e.preventDefault();
  $(" .btnChangeAdress").fadeIn();
  $(".InputChangeAdress").attr("disabled", false);
  $(".ShowChangeAdress").fadeOut(1000);
});
// showchange behavior phone number--------------
$(".ShowChangeTelephone").on("click", function (e) {
  e.preventDefault();
  $(" .btnChangeTelephone").fadeIn();
  $("#telephoneClient").attr("disabled", false);
  $(".ShowChangeTelephone").fadeOut(1000);
});
//change adresse --------------------------------
$("#changeAdresse").on("click", function () {
  $.ajax({
    type: "post",
    url: "AdminLogin/ClientLogin.php",
    data: {
      changeAdresse: "chageAdresse",
      email: sessionEmail,
      Adresse: $(".InputChangeAdress").val()
    },
    success: function (response) {
      if (response == "changed") {
        $(".changeAdr").html(
          "<span class='alert alert-success'> Adresse Changed Succesfully  !</span>"
        );
        $(".alertChangeAdress").fadeIn("1000");
        $("#changeAdresse").fadeOut();
        $(".InputChangeAdress").attr("disabled", true);
        $(".ShowChangeAdress").fadeIn(1000);
      } else {
        $(".changeAdr").html(
          "<span class='alert alert-danger'> Error  !</span>"
        );
        $(".alertChangeAdress").fadeIn("1000");
      }
    }
  });
});
//change phone number ---------------------------
$("#changeNumber").on("click", function () {
  $.ajax({
    type: "post",
    url: "AdminLogin/ClientLogin.php",
    data: {
      changeTel: "chageTel",
      email: sessionEmail,
      telephone: $("#telephoneClient").val()
    },
    success: function (response) {
      if (response == "changed") {
        $(".chagetel").html(
          "<span class='alert alert-success'> Tel changed Succesfully !</span>"
        );
        $(".alertChangeTelephone").fadeIn("1000");
        $(" .btnChangeTelephone").fadeOut();
        $("#telephoneClient").attr("disabled", true);
        $(".ShowChangeTelephone").fadeIn(1000);
      } else {
        $(".chagetel").html(
          "<span class='alert alert-danger'> Error  !</span>"
        );
        $(".alertChangePaasword").fadeIn("1000");
      }
    }
  });
});
//change Paasword -------------------------------
$("#changePassword").on("click", function () {
  $.ajax({
    type: "post",
    url: "AdminLogin/ClientLogin.php",
    data: {
      changePass: "chagePass",
      email: sessionEmail,
      password: $("#ExistingPassword").val(),
      password2: $("#newPassword").val()
    },
    success: function (response) {
      if (response == "inserted") {
        $(".alertPass").html(
          "<span class='alert alert-success'> Password Changed succesfully !</span>"
        );
        $(".alertChangePaasword").fadeIn("1000");
        $("#ExistingPassword").val("");
        $("#newPassword").val("");
      } else {
        $(".alertPass").html(
          "<span class='alert alert-danger'> Password Incorrect  !</span>"
        );
        $(".alertChangePaasword").fadeIn("1000");
      }
    }
  });
});
//show country img and city ---------------------
$("#countryCreate").change(function (e) {
  e.preventDefault();
  let country = this.value;
  for (i = 0; i < data.length; i++) {
    if (this.value == data[i].name) {
      $("#countryImg").attr("src", data[i].flag);
    }
  }
  $("#cityCreate").html("");
  for (i = 0; i < cities.length; i++) {
    if (this.value == cities[i]) {
      for (j = 0; j < cities[i + 1].val.length; j++) {
        $("#cityCreate").append(
          "<option value='" +
            cities[i + 1].val[j] +
            "'>" +
            cities[i + 1].val[j] +
            "</option>"
        );
      }
    }
  }
});
//check if password is identical ----------------
$("#rePasswordCreate").on("input", function () {
  if (this.value == $("#passwordCreate").val()) {
    $(".rePassword").html("<span class='alert alert-success'>&#x2714;</span>");
    password = true;
  } else {
    $(".rePassword").html("<span class='alert alert-danger'>&#10008;</span>");
    password = false;
  }
});
// sign  Up -------------------------------------
$(".SignUp").on("click", function (e) {
  e.preventDefault();
  $.ajax({
    type: "post",
    url: "AdminLogin/ClientLogin.php",
    data: {
      signUp: "signUp",
      fname: $("#firstNameCreate").val(),
      lname: $("#lastNameCreate").val(),
      telephone: $("#teleCreate").val(),
      email: $("#emailCreate").val(),
      password: $("#rePasswordCreate").val(),
      Adresses: $("#adresseCreate").val(),
      country: $("#countryCreate option:selected").html(),
      city: $("#cityCreate option:selected").html()
    },
    success: function (response) {

        
        //clear inputs and text area
     
          $(".SignUp")
          .closest("form")
          .find("input[type=text], input[type=password], textarea")
          .val("");
          $(".signUpAlert").html(
            "<span class='alert alert-success'>"+response+"</span>"
          );  
    }
  });
});
//stop interval ---------------------------------
$(".notificationBell").on("click", function () {
  clearInterval(inte);
});
//disconnect function ---------------------------
function disconnect() {
  window.location.href = "AdminLogin/disconnect.php";
}
/*********************** /
/     notification       /
//***********************/
//intervals
if (localStorage.getItem("IdlisteCommande") != null) {
  setInterval(function () {
    let num = 0;
    if (x == false) {
      $("#idlistecommande").css("scale", "1");
      $("#idlistecommande").css("transition", "1s");
      x = true;
      num = 1;
    }
    if (x == true && num == 0) {
      x = false;
      $("#idlistecommande").css("scale", "0.8");
    }
  }, 400);
  function notif() {
    shown = false;
    if (Notification.permission !== "granted") {
      Notification.requestPermission();
    } else {
      var notifikasi = new Notification("Bought Articles", {
        icon: "themes/images/ico/Transaction_Tracker-512.png",
        body: "You Bought New Items they will appear once the seller send them"
      });
      notifikasi.onclick = function () {
        notifikasi.close();
      };
      setTimeout(function () {
        notifikasi.close();
      }, 9000);
      shown = true;
    }
  }
  notif();
}
