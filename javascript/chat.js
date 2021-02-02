//variables -------------------------------------
var started = false;
var n = 0;
var num2 = 0;
var j = 0;
var idSession = idClient;
$(function () {
  //first page load messages ----------------------------------------
  $.ajax({
    type: "post",
    url: "AdminLogin/ClientLogin.php",
    data: {
      Getchat: "getChat",
      idClien: idClient
    },
    success: function (response) {
      response = JSON.parse(response);
      $(".me").html("");
      $.each(response, function (key, val) {
        if (val.fromm == idClient) {
          $(".me").append(
            "<div class='span3 pull-left' style='color:gray;'>.</div><div class='span3 pull-right' style='color:green;'>" +
              val.message +
              "</div><div class='span6'><hr></div>"
          );
        } else if (val.fromm == "ecommerce@gmail.com") {
          $(".me").append(
            "<div class='span3 pull-left' style='color:red;'> " +
              val.message +
              "</div><div class='span3 pull-right' style='color:red;'></div><div class='span6'><hr></div>"
          );
        }
      });
    }
  });

  ///refresh messages ---------------------------
  setInterval(function () {
    $.ajax({
      type: "post",
      url: "AdminLogin/ClientLogin.php",
      data: {
        Getchat: "getChat",
        idClien: idClient
      },
      success: function (response) {
        response = JSON.parse(response);
        $(".me").html("");
        $.each(response, function (key, val) {
          if (val.fromm == idSession) {
            $(".me").append(
              "<div class='span2 pull-left' '><span  style=' color:grey; font-size: xx-small;'>" +
                val.date +
                " &nbsp;</span></div><div class='span2 pull-left'></div><div class='span2 pull-right' style='color:green;'>" +
                val.message +
                "</div>" +
                "<div class='span6'><hr></div>"
            );
          } else if (val.fromm == "ecommerce@gmail.com") {
            $(".me").append(
              "<div class='span2 pull-left' style='color:red;'>" +
                val.message +
                "</div><div class='span2 pull-left' style='color:red;'></div><div class='span2 pull-right' ><span  style=' color:grey; font-size: xx-small;'>" +
                val.date +
                " &nbsp;</span></div><div class='span6'><hr></div>"
            );
          }
        });
        /*else if(started==true )
                {
                    num2=response.length;
                    if(num1!=num2){
                        console.log(num1);
                        console.log(response.length);
                    }
                   // var starting=num1-1;
                    
                    for(i=num1;i<response.length;i++)
                    {
                        if(response[i].fromm==localStorage.getItem("idClient"))
                        {
                            $(".me").append("<div class='span3 pull-right' style='color:green;'>"+response[i].message+"</div><br>");
                        }
                        else{
                            $(".me").append("<div class='span3 pull-left' style='color:red;'>"+response[i].message+"</div><br>");
                        }
                    }*/
      }
    });
  }, 1000);
});
//send message ----------------------------------
function send() {
  $.ajax({
    type: "post",
    url: "AdminLogin/ClientLogin.php",
    data: {
      sendChat: "send",
      idClien: idClient,
      message: $(".sendMessage").val()
    },
    success: function (response) {
      $(".sendMessage").val("");
    }
  });
}

// Get the input field
var input = document.getElementById("chatInput");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode == 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("btnSendChat").click();
  }

});
