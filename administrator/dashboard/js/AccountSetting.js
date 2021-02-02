var phpUrl = "PhpFiles/AccountSettings.service.php";
// datatables------
$("#example").dataTable();
$("#example1").dataTable();
$("#example2").dataTable();
$("#History").hide();

//on load ------------------------------------
var tDelete = $("#example").DataTable();
var t = $("#example1").DataTable();
var t2 = $("#example2").DataTable();
  
  //loads admins accounts
  function loadsAccount()
{

 t.clear().draw();
 $.ajax({
  type: "post",
  url: phpUrl,
  data: { load:"load" },
  success: function (response) {
   
    $.each(JSON.parse(response), function (key, val) {
      t.row
        .add([
          val.adresseEmail,
          val.nom + " " + val.prenom,
          val.telephone,
          "<a data-toggle='modal' data-target='#detailModal' onclick=detailsAdmin('" +
          val.adresseEmail +
          "')><i class=' icon-server font-large-1 '></i></a>",
          "<a data-toggle='modal' data-target='#deleteModal' onclick=deleteAdminVerification('" +
            val.adresseEmail +
            "')><i class='icon-bin font-large-1 red' ></i></a>"
              
        ])
        .draw(false);
    });
  }
});
}
loadsAccount();

function loadClients()
{
  t2.clear().draw();
 $.ajax({
  type: "post",
  url: phpUrl,
  data: { loadClient:"load" },
  success: function (response) {
   
    $.each(JSON.parse(response), function (key, val) {
      t2.row
        .add([
          val.nomClient + " " + val.prenomClient,
          val.adresseClient,
          val.telephone,
          val.emailClient,
          val.city,
          "<a data-toggle='modal' data-target='#deleteModalClient' onclick=deleteClientVerification('" +
            val.idClient +
            "')><i class='icon-bin font-large-1 red' ></i></a>"
              
        ])
        .draw(false);
    });
  }
});
}
loadClients();

//Add admin
function AddAccount() {
  if($("#EmailSubscribe").val()!="")
  {
  var FirstName = $("#UserFNameSubscribe").val();
  var LastName = $("#UserLNameSubscribe").val();
  var adresseEmail = $("#EmailSubscribe").val();
  var Password = $("#PasswordSubscribe").val();
  var ConfirmPasswords=$("#ConfirmPasswordSubscribe").val();
  var telephone = $("#telephoneSubscribe").val();
  
if ($('#livreur').is(':checked')) {
  var livreur=2;
}
else{var livreur=1;}
if(Password==ConfirmPasswords)
{
  $.ajax({
    type: "post",
    url: phpUrl,
    data: {
      AddAdmin: "AddUser",
      nom: FirstName,
      prenom: LastName,
      adresseEmail: adresseEmail,
      Password:Password,
      telephone: telephone,
      livreur:livreur  
    },
    success: function (response) {
      window.location.href="./AccountSetting?Validate";
    }
    
  });
 }else{
  $(".alertAddModal").html("<span class='alert alert-danger>passwords not identical ! *</alert>'");
 }
}
 
 else{
   $(".alertAddModal").html("<span class='alert alert-danger>all fields must be filled ! *</alert>'");
 }

}
//details User *
function detailsAdmin(id) {
  $.ajax({
    type: "post",
    url: phpUrl,
    data: { idModalUser: id },
    success: function (response) {
      $("#tableModalDetails").html("");
      response = JSON.parse(response);
      response = response[0];
      $("#tableModalDetails").append(
        "<tr><td>Email Adresse </td><td>" + response.adresseEmail+ "</td></tr>"
      );
      $("#tableModalDetails").append(
        "<tr><td>Full Name</td><td>" +
          response.nom +
          " " +
          response.prenom +
          "</td></tr>"
      );
      $("#tableModalDetails").append(
        "<tr><td>Email</td><td>" + response.telephone + "</td></tr>"
      );
 
    }
  });

}
 //verification delete user *
 function deleteAdminVerification(id)
 {
   $.ajax({
     type: "post",
     url: phpUrl,
     data: {idModalUser:id},
     success: function (response) {
       
       response=JSON.parse(response);
       $("#deletedUserName").html(response[0].nom+" "+response[0].prenom);
       $("#deletedUserCode").val(response[0].adresseEmail);
     }
   });

 }
  //verification delete user *
  function deleteClientVerification(id)
  {
    $.ajax({
      type: "post",
      url: phpUrl,
      data: {loadClientID:id},
      success: function (response) {
        
        response=JSON.parse(response);
        $("#deletedUserNameClient").html(response[0].nomClient+" "+response[0].prenomClient);
        $("#deletedUserCodeClient").val(response[0].idClient);
      }
    });
 
  }

//delete User *
function DeleteAdmin(){
  deleteUserNumber=$("#deletedUserCode").val();
 $.ajax({
   type: "post",
   url: phpUrl,
   data: {
    deleteSelectedUser: "User",
    UserId:deleteUserNumber
     },
   success: function (response) {
   loadsAccount();     
   }
 });
}

//modify User *
function ModifyAdmin() {
  var FirstName = $("#FNameAdmin").val();
  var LastName = $("#LNameAdmin").val();
  var Email = $("#EmailAdmin").val();
  var OldPassword=$("#PasswordAdmin").val();
  var NewPassword = $("#NewPasswordAdmin").val();
if(NewPassword!="" && OldPassword!="")
{
  $.ajax({
    type: "post",
    url: phpUrl,
    data: {
      EditAdmin: "Edit",
      FirstName: FirstName,
      LastName: LastName,
      Email: Email,
      OldPassword:OldPassword,
      Password: NewPassword
    },
    success: function (response) {
      if(response == 'success') {
        window.location.href="./AccountSetting?Send";  
      } else {
        $("#alertForPass").html("<div style='color:red'>please enter correct old password*</div>");
      }
    }
  });
}
else{
  $(".alertAddModal1").html("<div class='alert alert-danger'>Please enter password*</div>");
}
 
}

$(document).ready(function () {
  if(window.location.href.indexOf("Validate")>-1)
{
  $("#a2").trigger('click');
}
});
$(document).ready(function () {
  if(window.location.href.indexOf("Send")>-1)
{
  $("#a3").trigger('click');
}
});


//delete client
function DeleteClient() {
  var id=$("#deletedUserCodeClient").val();
  $.ajax({
    type: "post",
    url: phpUrl,
    data: {
       deleteClient:id
    },
    success: function (response) {
      window.location.href="./AccountSetting.php";
    }
  });
  }


  //Chat ----------------------------------------------------

  var inter;
  var id;
  work = false;
  function inte(object) {
      id = object.id;
      if (work == true) {
          clearInterval(inter);
      }
      setInterval(function () {
          $.ajax({
              type: "post",
              url: phpUrl,
              data: {
                  Getchat: "getChat",
                  idClien: id
              },
              success: function (response) {
                  response = JSON.parse(response);
                  $(".chatPlace").html("");
                  $.each(response, function (key, val) {
                      if (val.fromm == "ecommerce@gmail.com") {
                          $(".chatPlace").append("<div class='row'><div class='col-md-3'><span  style=' color:grey; font-size: xx-small;'>"+val.date+" &nbsp;</span></div><div class='col-md-3'></div><div class='col-md-6' style='color:green; font-size:large;'>" + val.message + "</div></div>"+
                      "<div class='span6'><hr></div>");
                      }
                      else if (val.fromm == id) {
                      $(".chatPlace").append("<div class='row'><div class='col-md-6' style='font-size:large; color:red;'>" + val.message + "</div><div class='col-md-3'></div><div class='col-md-3' ><span  style=' color:grey; font-size: xx-small;'>"+val.date+" &nbsp;</span></div></div>");
                      }
                  });
              }
          });
          work = true;
      }, 1000)

  }
  $(function () {
      $.ajax({
          type: "post",
          url: phpUrl,
          data: {
              getClient: "clients"
          },
          success: function (response) {
              response = JSON.parse(response);
              $.each(response, function (key, val) {
                  $(".clientsNameChat").append("<a href='#' onclick='inte(this)' id='" + val.idClient + "'  class=' form-control'>" + val.nomClient + " " + val.prenomClient + "</a><br>");
              });
          }
      });

  })
  function send() {
      $.ajax({
          type: "post",
          url: phpUrl,
          data: {
              sendChat: "send",
              idClien: id,
              message: $(".sendMessage").val(),
              fromm: "ecommerce@gmail.com"
          },
          success: function (response) {
              $(".sendMessage").val("");
          }
      });
  }
