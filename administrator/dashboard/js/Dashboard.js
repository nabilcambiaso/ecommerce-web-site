$(function(){
    //--write names in their places
  $(".UserName").html(sessionStorage.getItem("Name"));
    //logout button 
    $(".Logout").click(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: ".././crud/authentication.php",
            data: {
                Logout:"Logout"
            },
            success: function (response) {
                sessionStorage.clear();
                window.location.href=".././";
            }
        });
        
    });








})