
//show hide logo on click on the i three lines
$(".showHide").click(function (e) {
    e.preventDefault();
    $(".logo1").toggle();
  });


  var url=window.location.href;
  
  if(url.indexOf("promo")>-1)
  {
    $(".navigatepromo").attr("class", "active");
  }
  else if(url.indexOf("products")>-1)
  {
    $(".navigateProducts").attr("class", "active");
  }
  else if(url.indexOf("points")>-1 && url.indexOf("pointscommande")==-1 )
  {
    $(".navigatePoints").attr("class", "active");
  }
  else if(url.indexOf("pointscommande")>-1)
  {
    $(".navigatePointscommande").attr("class", "active");
  }
  else if(url.indexOf("listecommande")>-1)
  {
    $(".navigatecommande").attr("class", "active");
  }
  else if(url.indexOf("country")>-1 || url.indexOf("departement")>-1 || url.indexOf("location")>-1){
    $(".navigateGeneral").css("background", "#009879");
  }


