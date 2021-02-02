class Categorie {
  constructor(id, theme) {
    this.id = id;
    this.theme = theme;
  }
}
class Article {
  constructor(
    reference,
    designation,
    descriptions,
    prix1,
    Nouveauxprix,
    imageArt,
    seul,
    idcategorie,
    datePublication
  ) {
    this.reference = reference;
    this.designation = designation;
    this.descriptions = descriptions;
    this.prix1 = prix1;
    this.Nouveauxprix=Nouveauxprix;
    this.imageArt = imageArt;
    this.seul = seul;
    this.idcategorie = idcategorie;
    this.datePublication = datePublication;
  }
}

//sessions---------------------
var sessionEmail = document.getElementById("email").innerHTML;
			 var idClient = document.getElementById("idClient").innerHTML;
			 var sessionNom = document.getElementById("nomClient").innerHTML;
			 var points = document.getElementById("pointsClient").innerHTML; 
//********************************************global variables ****************************************************** */
// stors categories
let categories = [];
// stors articles
let latestArticle = [];
//stors articles in promotion
let promoArticle = [];
// store items in cart
let cart = [];
let pointcartArray = [];
let promoCount = 0,
  next = 0,
  cartItemsCount = 0,
  pointArticleLength = 0,
  price = 0,
  cartpointsCount=0,
  language = 0;

//local storage------------------------------
if (localStorage.getItem("cartItemCount") != null) {
  cartItemsCount = parseInt(localStorage.getItem("cartItemCount"));
  $(".numberInCart").html(cartItemsCount);
  cart = JSON.parse(localStorage.getItem("cartItems"));
}
if (localStorage.getItem("cartpointsCount") != null) {
  cartpointsCount = parseInt(localStorage.getItem("cartpointsCount"));
  $(".numberInPointsCart").html(cartpointsCount);
  pointcartArray =JSON.parse(localStorage.getItem("pointscartArray"));
}
try {
  if (sessionEmail!="none") {
    $("#login").html("Profile");
    $("#UserLastName").html(sessionNom);
    $("#UserPoints").html(points);
  }
  else{
    $("#UserPoints").html("0");
  }
} catch {}

// call get latest and promo articles   ----------------
getArticles();
//***************************************************ready********************************************************* */
//---ready----------------------------------------------------------------------------------------------------------
$(function () {

  //get categories-----------------------------
  $.getJSON("AdminLogin/getCategorie.php", function (data) {

    $.each(data, function (key, val) {
      var cc = new Categorie(val.idcategorie, val.theme);
      categories.push(cc);
      $("#sideManu").append(
        "<li  onmouseover='myOverFunction(this)'   ><a onclick='showCategorie(this)' style='border-radius:20px; margin-bottom:4px;' class='sideCategorie btn btn-small' id='" +
          val.idcategorie +
          "'>" +
          val.theme +
          " </a></li><ul class='sousCategorie leave' id='v"+val.idcategorie+"' hidden  style='display:flex; flex-direction:column; justify-content:center; align-items:center;'></ul>"
      );//sous categorie here top
      $("#searchCategorie").append(
        "<option class='categorieOption'  value="+val.idcategorie+">"+val.theme+"</option>"
      );
      $("#sideManu2").append(
        "<li onmouseover='myOverFunction(this)'  ><a onclick='showCategorie2(this)' style='border-radius:20px; margin-bottom:4px;' class='sideCategorie' id='" +
          val.idcategorie +
          "'>" +
          val.theme +
          " </a></li><ul class='sousCategorie leave' id='v"+val.idcategorie+"' hidden  style='display:flex; flex-direction:column; justify-content:center; align-items:center;'></ul>"
      );
    });
  });
  //change language if url contains fr , else it is in english in default
  changeLanguage();

});
//sous categorie

function myOverFunction(objet)
{
  $(".leave").hide();
  var id=objet.firstChild.id;
  $("#v"+id).html("");
  SousCategorie(id);
  $("#v"+id).show();


}

function SousCategorie(id){
  $("#v"+id).html("");
  $.ajax({
    type: "post",
    url: "AdminLogin/getsouscategorie.php",
    data: {souscategorie:id},
    success: function (response) {
      $("#v"+id).html("");
      response=JSON.parse(response);
      $.each(response, function (indexInArray, val) { 
      $("#v"+id).append(`
      <li style='text-align:center; padding-top:5px; padding-bottom:5px; cursor:pointer; width:80%; border-radius:25px; margin-bottom:4px; background:#D3D3D3;'  class="formSousCategorie" ><a onclick='showSousCategorie(this)' style="background:transparent;"  class=' sideCategorie ' id='` +
          val.idSousCategorie +`'>` +val.theme +` </a></li>`);
      });
    }
  });
}
//******************************************functions **************************************************************** */
// get latest and promo articles   ----------------------
function getArticles() {
  if (
    window.location.href.indexOf("index.php") > -1 || window.location.href.indexOf("/") > -1 ||
    window.location.href.indexOf("promo_articles.php") > -1
  ) {
    $.getJSON("AdminLogin/indexPhp.php", function (data) {
      // append latest articles --------------------------------
      if (data[0].length > 0) {
        $.each(data[0], function (key, val) {
          var article = new Article(
            val.reference,
            val.designation,
            val.descriptions,
            val.prix1,
            val.prix1,
            val.imageArt,
            val.seul,
            val.idcategorie,
            val.datePublication
          );
          latestArticle.push(article);
          $(".latestProductsThumbnail").append(
            "<li class='span3 articles '>" +
              " <div class='thumbnail'>" +
              " <a href='product_details.php?id=" +
              val.reference +
              "'><img style='height:100px' src='AdminLogin/images/" +
              val.imageArt +
              "' alt='' /></a>" +
              " <div class='caption'><h5>" +
              val.designation +
              "</h5> " +
              " <h4 style='text-align:center'><a class='btn btn-Light zoom'  href='product_details.php?id=" +
              val.reference +
              "'> <i" +
              " class='icon-zoom-in'></i></a> <button class='btn btn-Light' onclick='addTocart(this," +
              val.prix1 +
              ")'  id='" +
              val.reference +
              "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></button>" +
              " <br> <button class='btn btn-danger price' disabled id='" +
              val.reference +
              "' >DH " +
              val.prix1 +
              "</button></h4></div></div></li>"
          );
          $("#languages").append("<option>" + val.designation + "</option>");
        });
      } else {
        $(".latestProductsThumbnail").append(
          "<div class='alert alert-danger languageNoItemToDisplay' role='alert'>" +
            "No Items To Display! </div>"
        );
        changeLanguage();
      }
      //-- if the cart is localy stored . check if prices changed
      for (var i = 0; i < latestArticle.length; i++) {
        for (var j = 0; j < cart.length; j++) {
          if (latestArticle[i].reference == cart[j]) {
            price = price + parseFloat(latestArticle[i].prix1);
            $(".cartPrice").html(price);
          }
        }
      }

      // append promo articles --------------------------------

      $.each(data[1], function (key, val) {
        var article = new Article(
          val.reference,
          val.designation,
          val.descriptions,
          val.prix1,
          val.Nouveauxprix,
          val.imageArt,
          val.seul,
          val.idcategorie,
          val.datePublication
        );
        promoArticle.push(article);
        if (promoCount == 0) {
          if (next == 0) {
            $(".carouselPromo").append(
              "<div class='item active'><ul class='thumbnails promo" +
                promoCount +
                " '></ul></div>"
            );
          }
          $(".promo" + promoCount + "").append(
            "<li class='span3'><div class='thumbnail t1'><i class='tag'></i>" +
              "<a href='product_details.php?id=" +
              val.reference +
              "'><img width='100px' height='100px' src='AdminLogin/images/" +
              val.imageArt +
              "' alt='" +
              val.designation +
              "'></a>" +
              "<div class='caption'><h5>" +
              val.designation +
              "</h5>" +
              "<h4><a class='btn' href='product_details.php?id=" +
              val.reference +
              "'>VIEW</a> <span " +
              "class='pull-right'>" +
              val.Nouveauxprix +
              " " +
              "Dh </span></h4></div></div></li> "
          );
          next = next + 1;
          if (next == promoCount + 4) {
            promoCount = 4;
          }
        } else {
          if (promoCount % next == 0) {
            $(".carouselPromo").append(
              "<div class='item '><ul class='thumbnails promo" +
                promoCount +
                " '></ul></div>"
            );
          } else {
            $(".promo" + promoCount + "").append(
              "<li class='span3'><div class='thumbnail t1'><i class='tag'></i>" +
                "<a href='product_details.php?id=" +
                val.reference +
                "'><img width='100px' height='100px' src='AdminLogin/images/" +
                val.imageArt +
                "' alt='" +
                val.designation +
                "'></a>" +
                "<div class='caption'><h5>" +
                val.designation +
                "</h5>" +
                "<h4><a class='btn' href='product_details.php?id=" +
                val.reference +
                "'>VIEW</a> <span " +
                "class='pull-right'>" +
                val.Nouveauxprix +
                " " +
                "Dh </span></h4></div></div></li> "
            );
          }
          next = next + 1;
          if (next == promoCount + 4) {
            promoCount = promoCount + 4;
          }
        }
      });
      //---------page promo articles --------
      $.each(data[1], function (key, val) {
        $(".promohtml").append(
          "<li class='span3'>" +
            " <div class='thumbnail'>" +
            " <a href='product_details.php?id=" +
            val.reference +
            "'><img style='height:100px' src='AdminLogin/images/" +
            val.imageArt +
            "' alt='' /></a>" +
            " <div class='caption'><h5>" +
            val.designation +
            "</h5>" +
            " <h4 style='text-align:center'><a class='btn zoom'  href='product_details.php?id=" +
            val.reference +
            "'> <i" +
            " class='icon-zoom-in'></i></a> <button class='btn' onclick='addTocart(this," +
            val.Nouveauxprix +
            ")'  id='" +
            val.reference +
            "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></button>" +
            " <br> <button class='btn btn-warning price' disabled id='" +
            val.reference +
            "' >DH " +
            val.Nouveauxprix +
            "</button></h4></div></div></li>"
        );
        $("#languages").append("<option>" + val.designation + "</option>");
      });
      //nombre article en promotion page promo article
      $("#count").html(promoArticle.length);
    });
  }
  //points article------------------------------------
  if (window.location.href.indexOf("points.php") > -1) {
    try {
      if (sessionEmail != "none") {
        
        $.getJSON("AdminLogin/pointsPhp.php", function(data) {
          // append points articles --------------------------------
          
          if (data.length > 0) {
            $.each(data, function (key, val) {
              if (parseInt(val.nombrePoints) <= parseInt(points)) {
                $(".pointshtml").append(
                  "<li  class='span3 articles'>" +
                    " <div class='thumbnail'>" +
                    " <a href='product_details.php?id=" +
                    val.reference +
                    "'><img style='height:100px' src='AdminLogin/images/" +
                    val.imageArt +
                    "' alt='' /></a>" +
                    " <div class='caption'><h5>" +
                    val.designation +
                    "</h5> " +
                    " <h4 style='text-align:center'><a class='btn btn-Light zoom'  href='product_details.php?id=" +
                    val.reference +
                    "'> <i"+
                    " class='icon-zoom-in'></i></a> <button class='btn'  onclick='addToPointsCart(this," +
                    val.nombrePoints +
                    ")'  id='" +
                    val.reference +
                    "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></button>" +
                    " <br> <button class='btn btn-danger points' disabled > " +
                    val.nombrePoints +
                    " Points </button></h4></div></div></li>"
                );
              } else {
                $(".pointshtml").append(
                  "<li class='span3 articles '>" +
                    " <div class='thumbnail'>" +
                    " <a href='product_details.php?id=" +
                    val.reference +
                    "'><img style='height:100px' src='AdminLogin/images/" +
                    val.imageArt +
                    "' alt='' /></a>" +
                    " <div class='caption'><h5>" +
                    val.designation +
                    "</h5> " +
                    " <h4 style='text-align:center'><a class='btn btn-Light zoom'  href='product_details.php?id=" +
                    val.reference +
                    "'> <i" +
                    " class='icon-zoom-in'></i></a> <button style='opacity:0.4;' class='btn btn-Light' id='" +
                    val.reference +
                    "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></button>" +
                    " <br> <button class='btn btn-danger points' disabled > " +
                    val.nombrePoints +
                    " Points </button></h4></div></div></li>"
                );
              }
              pointArticleLength += 1;
            });
            $("#countPoint").html(pointArticleLength);
          }
        });
      }
      else{
        $.getJSON("AdminLogin/pointsPhp.php", function (data) {
          //------------page point articles ---------------
              if (data.length > 0) {
                $.each(data, function (key, val) {
                  $(".pointshtml").append(
                    "<li class='span3 articles '>" +
                      " <div class='thumbnail'>" +
                      " <a href='product_details.php?id=" +
                      val.reference +
                      "'><img style='height:100px' src='AdminLogin/images/" +
                      val.imageArt +
                      "' alt='' /></a>" +
                      " <div class='caption'><h5>" +
                      val.designation +
                      "</h5> " +
                      " <h4 style='text-align:center'><a class='btn btn-Light zoom'  href='product_details.php?id=" +
                      val.reference +
                      "'> <i" +
                      " class='icon-zoom-in'></i></a> <button style='opacity:0.4;' class='btn btn-Light' id='" +
                      val.reference +
                      "'><span class='languageAddTo' >Add to</span> <i class='icon-shopping-cart'></i></button>" +
                      " <br> <button class='btn btn-danger points' disabled > " +
                      val.nombrePoints +
                      " Points </button></h4></div></div></li>"
                  );
                });
              }
            });
      }
    } catch {
      $.getJSON("AdminLogin/pointsPhp.php", function (data) {
    //------------page point articles ---------------
        if (data.length > 0) {
          $.each(data, function (key, val) {
            $(".pointshtml").append(
              "<li class='span3 articles '>" +
                " <div class='thumbnail'>" +
                " <a href='product_details.php?id=" +
                val.reference +
                "'><img style='height:100px' src='AdminLogin/images/" +
                val.imageArt +
                "' alt='' /></a>" +
                " <div class='caption'><h5>" +
                val.designation +
                "</h5> " +
                " <h4 style='text-align:center'><a class='btn btn-Light zoom'  href='product_details.php?id=" +
                val.reference +
                "'> <i" +
                " class='icon-zoom-in'></i></a> <button style='opacity:0.4;' class='btn btn-Light' id='" +
                val.reference +
                "'><span class='languageAddTo' >Add to</span> <i class='icon-shopping-cart'></i></button>" +
                " <br> <button class='btn btn-danger points' disabled > " +
                val.nombrePoints +
                " Points </button></h4></div></div></li>"
            );
          });
        }
      });
    }
  }
}
//function sous categorie ----------------------------
function showSousCategorie(obj)
{
  
   $.ajax({
     type: "post",
     url: "AdminLogin/getsouscategorie.php",
     data: {showSousCategorie:obj.id},
     success: function (response) {
      $(".latestProductsThumbnail").html("");
       response=JSON.parse(response);
       $.each(response, function (indexInArray, val) { 
        $(".latestProductsThumbnail").append(
          "<li class='span3'>" +
            " <div class='thumbnail'>" +
            " <a href='product_details.php?id=" +
            val.reference +
            "'><img style='height:100px' src='AdminLogin/images/" +
            val.imageArt +
            "' alt='' /></a>" +
            " <div class='caption'><h5>" +
            val.designation +
            "</h5> " +
            " <h4 style='text-align:center'><a class='btn zoom' id='" +
            val.reference +
            "' href='product_details.php?id=" +
            val.reference +
            "'> <i" +
            " class='icon-zoom-in'></i></a> <a class='btn' onclick='addTocart(this," +
            val.prix1 +
            ")' id='" +
            val.reference +
            "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></a>" +
            " <br> <button class='btn btn-danger' disabled id='" +
            val.reference +
            "' >DH " +
            val.prix1 +
            "</button></h4></div></div></li>"
        );
       });
      }
   });
   //sous categorie promo
   $.ajax({
    type: "post",
    url: "AdminLogin/getsouscategorie.php",
    data: {showSousCategoriePromo:obj.id},
    success: function (response) {
     $(".promohtml").html("");
      response=JSON.parse(response);
      $.each(response, function (indexInArray, val) { 
       $(".promohtml").append(
         "<li class='span3'>" +
           " <div class='thumbnail'>" +
           " <a href='product_details.php?id=" +
           val.reference +
           "'><img style='height:100px' src='AdminLogin/images/" +
           val.imageArt +
           "' alt='' /></a>" +
           " <div class='caption'><h5>" +
           val.designation +
           "</h5> " +
           " <h4 style='text-align:center'><a class='btn zoom' id='" +
           val.reference +
           "' href='product_details.php?id=" +
           val.reference +
           "'> <i" +
           " class='icon-zoom-in'></i></a> <a class='btn' onclick='addTocart(this," +
           val.Nouveauxprix +
           ")' id='" +
           val.reference +
           "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></a>" +
           " <br> <button class='btn btn-danger' disabled id='" +
           val.reference +
           "' >DH " +
           val.Nouveauxprix +
           "</button></h4></div></div></li>"
       );
      });
     }
  });

}
//clicked side categorie function  ----------------------
function showCategorie(dd) {
  var i = 0;
  $(".latestProductsThumbnail").html("");
  //append the articles by categories
  for (index = 0; index < latestArticle.length; index++) {
    
    if (latestArticle[index].idcategorie == dd.id) {
      $(".latestProductsThumbnail").append(
        "<li class='span3'>" +
          " <div class='thumbnail'>" +
          " <a href='product_details.php?id=" +
          latestArticle[index].reference +
          "'><img style='height:100px' src='AdminLogin/images/" +
          latestArticle[index].imageArt +
          "' alt='' /></a>" +
          " <div class='caption'><h5>" +
          latestArticle[index].designation +
          "</h5> " +
          " <h4 style='text-align:center'><a class='btn zoom' id='" +
          latestArticle[index].reference +
          "' href='product_details.php?id=" +
          latestArticle[index].reference +
          "'> <i" +
          " class='icon-zoom-in'></i></a> <a class='btn' onclick='addTocart(this," +
          latestArticle[index].prix1 +
          ")' id='" +
          latestArticle[index].reference +
          "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></a>" +
          " <br> <button class='btn btn-danger' disabled id='" +
          latestArticle[index].reference +
          "' >DH " +
          latestArticle[index].prix1 +
          "</button></h4></div></div></li>"
      );
      i = i + 1;
    }
  }
  //message if there's no article in the selected categorie
  setTimeout(() => {
    if (i == 0) {
      $(".latestProductsThumbnail").append(
        "<div class='alert alert-danger languageNoItemToDisplay' role='alert'>" +
          "No Items To Display! </div>");}}
      , 1000);

  
  changeLanguage();
}

//clicked side cateforie in promo articels page ---------
function showCategorie2(dd) {
  var i = 0;
  $(".promohtml").html("");
  //append the articles by categories
  for (index = 0; index < promoArticle.length; index++) {
    if (promoArticle[index].idcategorie == dd.id) {
      $(".promohtml").append(
        "<li class='span3'>" +
          " <div class='thumbnail'>" +
          " <a href='product_details.php?id=" +
          promoArticle[index].reference +
          "'><img style='height:100px' src='AdminLogin/images/" +
          promoArticle[index].imageArt +
          "' alt='' /></a>" +
          " <div class='caption'><h5>" +
          promoArticle[index].designation +
          "</h5>" +
          " <h4 style='text-align:center'><a class='btn zoom' id='" +
          promoArticle[index].reference +
          "' href='product_details.php?id=" +
          promoArticle[index].reference +
          "'> <i" +
          " class='icon-zoom-in'></i></a> <a class='btn' onclick='addTocart(this," +
          promoArticle[index].Nouveauxprix +
          ")' id='" +
          promoArticle[index].reference +
          "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></a>" +
          "<br><button class='btn btn-warning' disabled id='" +
          promoArticle[index].reference +
          "' >DH " +
          promoArticle[index].Nouveauxprix +
          "</button></h4></div></div></li>"
      );
      i = i + 1;
    }
  }
  //message if there's no article in the selected categorie
  if (i == 0) {
    $(".promohtml").append(
      "<div class='alert alert-danger languageNoItemToDisplay' role='alert'>" +
        "No Items To Display! </div>"
    );
  }
  changeLanguage();
}
//function search ---------------------------------------
$("#srchFld").on("input", function () {
  $(".latestProductsThumbnail").html("");
  $(".promohtml").html("");
  var search = this.value;
  
  if( $("#searchCategorie option:selected").val()=="All" )
  {
  $.ajax({
    type: "post",
    url: "AdminLogin/indexFunctions.php",
    data: { search: search },
    success: function (response) {
      if (response.length > 0) {
        $.each(JSON.parse(response), function (key, val) {
          $(".latestProductsThumbnail").append(
            "<li class='span3'>" +
              " <div class='thumbnail'>" +
              " <a href='product_details.php?id=" +
              val.reference +
              "'><img style='height:100px' src='AdminLogin/images/" +
              val.imageArt +
              "' alt='' /></a>" +
              " <div class='caption'><h5>" +
              val.designation +
              "</h5>" +
              " <h4 style='text-align:center'><a class='btn' href='product_details.php?id=" +
              val.reference +
              "'> <i" +
              " class='icon-zoom-in'></i></a> <a class='btn'  id='" +
              val.reference +
              "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></a>" +
              "<a class='btn btn-danger' disabled id='" +
              val.reference +
              "' >DH " +
              val.prix1 +
              "</a></h4></div></div></li>"
          );
          changeLanguage();
        });
      } else {
        $(".latestProductsThumbnail").append(
          "<div class='alert alert-danger languageNoItemToDisplay' role='alert'>" +
            "No Items To Display! </div>"
        );
        changeLanguage();
      }
    }
  });}
  else{
    $.ajax({
      type: "post",
      url: "AdminLogin/indexFunctions.php",
      data: { searc: search,
        categorie:$("#searchCategorie option:selected").val()
       },
      success: function (response) {
        if (response.length > 0) {
          $.each(JSON.parse(response), function (key, val) {
            $(".latestProductsThumbnail").append(
              "<li class='span3'>" +
                " <div class='thumbnail'>" +
                " <a href='product_details.php?id=" +
                val.reference +
                "'><img style='height:100px' src='AdminLogin/images/" +
                val.imageArt +
                "' alt='' /></a>" +
                " <div class='caption'><h5>" +
                val.designation +
                "</h5>" +
                " <h4 style='text-align:center'><a class='btn' href='product_details.php?id=" +
                val.reference +
                "'> <i" +
                " class='icon-zoom-in'></i></a> <a class='btn'  id='" +
                val.reference +
                "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></a>" +
                "<a class='btn btn-danger' disabled id='" +
                val.reference +
                "' >DH " +
                val.prix1 +
                "</a></h4></div></div></li>"
            );
            changeLanguage();
          });
        } else {
          $(".latestProductsThumbnail").append(
            "<div class='alert alert-danger languageNoItemToDisplay' role='alert'>" +
              "No Items To Display! </div>"
          );
          changeLanguage();
        }
      }
    });
  }
  for (var i = 0; i < promoArticle.length; i++) {
    if (promoArticle[i].designation.includes(search)) {
      $(".promohtml").append(
        "<li class='span3'>" +
          " <div class='thumbnail'>" +
          " <a href='product_details.php?id=" +
          promoArticle[i].reference +
          "'><img style='height:100px' src='AdminLogin/images/" +
          promoArticle[i].imageArt +
          "' alt='' /></a>" +
          " <div class='caption'><h5>" +
          promoArticle[i].designation +
          "</h5>" +
          " <h4 style='text-align:center'><a class='btn zoom' id='" +
          promoArticle[i].reference +
          "' href='product_details.php?id=" +
          promoArticle[i].reference +
          "'> <i" +
          " class='icon-zoom-in'></i></a> <a class='btn' onclick='addTocart(this," +
          promoArticle[i].Nouveauxprix +
          ")' id='" +
          promoArticle[i].reference +
          "'><span class='languageAddTo'>Add to</span> <i class='icon-shopping-cart'></i></a>" +
          "<br><button class='btn btn-warning' disabled id='" +
          promoArticle[i].reference +
          "' >DH " +
          promoArticle[i].Nouveauxprix +
          "</button></h4></div></div></li>"
      );




      changeLanguage();
    }
  }
});
//add To Cart--------------------------------------------
function addTocart(reference, prix) {
  var exist = false;

  for (let i = 0; i < cart.length; i++) {
    if (cart[i] == reference.id) {
      exist = true;
    }
  }
  if (exist == false) {
    cartItemsCount = cartItemsCount + 1;
    $(".numberInCart").html(cartItemsCount);
    localStorage.setItem("cartItemCount", cartItemsCount);
    price = price + parseFloat(prix);
    $(".cartPrice").html(price);
    cart.push(reference.id);
    localStorage.setItem("cartItems", JSON.stringify(cart));
  }
}
//add To points Cart--------------------------------------------
function addToPointsCart(reference, prix) {
  var exist = false;

  for (let i = 0; i < pointcartArray.length; i++) {
    if (pointcartArray[i] == reference.id) {
      exist = true;
    }
  }

  if (exist == false) {
    cartpointsCount = cartpointsCount + 1;
    $(".numberInPointsCart").html(cartpointsCount);
    localStorage.setItem("cartpointsCount", cartpointsCount);
    pointcartArray.push(reference.id);
    localStorage.setItem("pointscartArray", JSON.stringify(pointcartArray));
    console.log(pointcartArray);
  }
}
// promo article page list view--------------------------
function listView() {
  $.each(promoArticle, function (key, val) {
    $(".listViewArticle").append(
      "<div class='row'><div class='span2'><img  src='AdminLogin/images/" +
        val.imageArt +
        "' alt='" +
        val.designation +
        "' />" +
        "</div><div class='span4'><h3 class='languageAvailable'>New | Available</h3><hr class='soft' /><h5>" +
        val.designation +
        " </h5>" +
        "<p>" +
        val.descriptions +
        "</p><a class='btn btn-small pull-right' href='product_details.php?id=" +
        val.reference +
        "'><span class='languageView'>View Details</span></a>" +
        "<br class='clr'/></div><div class='span3 alignR'><form class='form-horizontal qtyFrm'><h3><span> " +
        val.prix1 +
        " </span> Dh</h3>" +
        "<br /><a  class='btn btn-large btn-warning' onclick='addTocart(this," +
        val.prix1 +
        ")' id='" +
        val.reference +
        "' > <span class='languageAddTo'> Add to </span> <i class=' icon-shopping-cart'></i></a>" +
        "<a href='product_details.php?id=" +
        val.reference +
        "' class='btn btn-large'><i class='icon-zoom-in'></i></a> </form> </div></div><hr class='soft' />"
    );
    changeLanguage();
  });
}
// change language --------------------------------------
//language button ---
function languageButton(lang) {
  if (lang == 1) {
    language = 1;
    sessionStorage.setItem("language", "fr");
    changeLanguage();
  } else {
    location.href = location.href;
    sessionStorage.setItem("language", "eng");
  }
}
//rename elements ---
function changeLanguage() {
  if (sessionStorage.getItem("language") == "fr") {
    $(".languagePromoArticles").html("Articles En Promotion");
    $(".languageLogin").html("S'identifier");
    $(".languageWelcome").html("Bienvenue");
    $(".languageCart").html("Articles dans votre panier");
    $(".languagePromoCarousel").html("Produits en promotion");
    $(".languageLatestArticle").html("Nouveau produits");
    $(".languageAddTo").html("Ajouter au");
    $(".languageView").html("Voir");
    $(".languageAvailable").html("Nouveau | Disponible");
    $(".languageSpecialOffer").html("Remise Offre spéciale");
    $(".languageProductsAvailable").html("Produits sont disponibles");
    $(".languageHome").html("Acceuil");
    $(".languageCreateAccount").html("Créez votre compte !");
    $(".languagePersonalInfos").html("Vos informations personnelles");
    $(".languageFirstName").html("Prénom");
    $(".languageLastName").html("Nom");
    $(".languagePassword").html(" Mot de Passe");
    $(".languagePays").html("Pays");
    $(".languageCity").html("Ville");
    $(".languageSignUp").html("S'inscrire");
    $(".languageAlreadyRegistred").html("DÉJÀ ENREGISTRÉ ?");
    $(".languageForgotPassword").html("Mot de passe oublié?");
    $(".languageMyProfileInfos").html("Mon profil !");
    $(".languageChangeTelNumber").html("Changer le numéro de téléphone ?");
    $(".languageChangeAdress").html("Changer mon adresse ?");
    $(".languageChangeMyPass").html("Chaanger nom mot de passe ");
    $(".languageEnterExistingPass").html("Entrez le mot de passe existant :");
    $(".languageEnterNewPass").html("Entrez le nouveau mot de passe :");
    $(".languageDisconnect").html("Déconnecter");
    $(".languageChangeTelNumberButton").val("Changer le numéro de téléphone");
    $(".languageChangeAdressButton").val("Changer mon adresse");
    $(".languageYourAdresse").html(" Votre Adresse ");
    $(".languageProduct").html("Produits");
    $(".languageQuantityUpdate").html("Quantité/Modifer");
    $(".languageprice").html("Prix (Dh)");
    $(".languagedelivery").html("Livraison");
    $(".continueShopping").html(" Continuer vos achats");
    $(".languageView").html("Panier");
    $(".languagebuyIt").html("Finaliser l'achat");
    $(".languageShoppongCart").html("Mon Panier");
    $(".languagebuyIt").html("Finaliser l'achat");
    $(".languagebuyIt").html("Finaliser l'achat");
    $(".languagebuyIt").html("Finaliser l'achat");
  }
}
//sous categorie ---------------
$("a#1.sideCategorie.btn.btn-small").hover(function () {
    alert("");
    
  }, function () {
    // out
  }
);

$("#developers").hide();
          function showDevelopers(){$("#developers").show();}

