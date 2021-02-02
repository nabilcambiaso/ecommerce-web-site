var ProductComments=Array();
var url = window.location.href;
var id = url.substring(url.lastIndexOf('=') + 1);
var prix=0;
var obj={id:id};
var i=0;

$(function () {
    // get product infos
    $.ajax({
        type: "post",
        url: "./AdminLogin/products_details.php",
        data: { id: id },
        success: function (response) {
                response=JSON.parse(response);
                $("#a1").attr("href", './AdminLogin/images/'+response[0].imageArt);
                $("#a1").attr("title", response[0].designation);
                $("#img1").attr("src", './AdminLogin/images/'+response[0].imageArt);
                $("#a2").attr("href", './AdminLogin/images/'+response[0].image2);
                $("#a3").attr("href", './AdminLogin/images/'+response[0].image3);
                $("#a4").attr("href", './AdminLogin/images/'+response[0].image4);
                $("#img2").attr("src", './AdminLogin/images/'+response[0].image2);
                $("#img3").attr("src", './AdminLogin/images/'+response[0].image3);
                $("#img4").attr("src", './AdminLogin/images/'+response[0].image4);
                $("#img1").attr("alt", response[0].designation);
                $("#img2").attr("alt", response[0].designation);
                $("#img3").attr("alt", response[0].designation);
                $("#img4").attr("alt", response[0].designation);
                $("#designation").append(response[0].designation);
                $("#price").append(response[0].prix1);
                prix=response[0].prix1;
                $("#quantite").append(response[0].seul);
                $("#description").append(response[0].descriptions);
        }
    });
    //get comments 
    $.ajax({
        type: "post",
        url: "./AdminLogin/products_details.php",
        data: { comments: id },
        success: function (response) {
                response=JSON.parse(response);
                response.forEach(element => {
                    if(i<3)
                    {
                        $(".ShowComments").append("<div style='border-radius:5px;  border:1px lightgray solid; opacity:0.8; padding-left:5px; padding-top:10px;padding-right:5px; border-bottom:none;' class='span8'><p>"+element.comments+"</p></div><hr class='soft'>");
                    }
                    if(i==3)
                    {
                        $(".ShowAllComments").append("<div class='span1'></div><div class='span6'><h4 class='btn btn-small' onclick='showAllComments()'>Show All Comments ?</h4></div>");
                    }
                    ProductComments.push(element);
                    i=i+1;
                });
        }
    });

})
function showAllComments() {
    $(".ShowComments").html("");
    $.ajax({
        type: "post",
        url: "./AdminLogin/products_details.php",
        data: { comments: id },
        success: function (response) {
                response=JSON.parse(response);
                response.forEach(element => {
                        $(".ShowComments").append("<div style='border-radius:5px;  border:1px lightgray solid; opacity:0.8; padding-left:5px; padding-top:10px;padding-right:5px; border-bottom:none;' class='span8'><p>"+element.comments+"</p></div><hr class='soft'>");
                });
        }
    });
  };
  //add comment 
  $("#commentButton").on('click',function()
     {
         addComment();
    });
  function addComment() {
      if($("#commenter").val()!="")
      {
        $.ajax({
            type: "post",
            url: "./AdminLogin/products_details.php",
            data: { reference: id,
                    commenter :$("#commenter").val()       
             },
            success: function (response) {
                try{
                    response=JSON.parse(response);
                    response.forEach(element => {
                        $(".ShowComments").append("<div style='border-radius:5px;  border:1px lightgray solid; opacity:0.8; padding-left:5px; padding-top:10px;padding-right:5px; border-bottom:none;' class='span8'><p>"+element.comments+"</p></div><hr class='soft'>");
                                    });
                                    $("#commenter").val("");
                }
                catch{}       
            }
        });
    
      }
    }
    
    // add to cart _-------------
   $("#AddToCartButton").on('click',function()
   {
       addTocart(obj,prix);
  });

