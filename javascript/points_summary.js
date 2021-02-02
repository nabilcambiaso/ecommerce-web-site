class ligneCommande {
  constructor(quantite, idClient, reference, livraison) {
    this.quantite = quantite;
    this.idClient = idClient;
    this.reference = reference;
    this.livraison = livraison;
  }
}

let total = 0;
let listePoints = [];

// if session if open or not ----------------------------


$(function(){

  if (sessionEmail != "none") {
    $(".buyIt").append(
      "<a  class='btn btn-warning pull-right ' onclick='commande()'>Buy Articles</a>"
    );
    if (pointcartArray != null) {
      for (i = 0; i < pointcartArray.length; i++) {
        var cmd1 = new ligneCommande(1, idClient, pointcartArray[i], "Amana");
        listePoints.push(cmd1);
      }
    }
  } else {
    $(".buyIt").append(
      "<a href='./login.php'  class='btn btn-warning  languagebuyIt  pull-right '>Buy Articles</a>"
    );
  }
  


})

$("#livraison").change( function (e) {
  for (var i = 0; i < listePoints.length; i++) {
    console.log(listePoints);
    listePoints[i].livraison = $("#livraison option:selected").text();
  }
});




$.ajax({
    type: "post",
    url: "AdminLogin/pointsSummary.php",
    data: {points:pointcartArray},
    success: function (response) {

        $.each(JSON.parse(response), function (key, val) {
            if (val.seul < 2) {
              $(".product").append(
                "<tr><td> <img width='60' src='AdminLogin/images/" +
                  val.imageArt +
                  "' alt='" +
                  val.imageArt +
                  "' /></td>" +
                  "<td>" +
                  val.designation +
                  "<br>" +
                  val.descriptions +
                  "</td><td><div class='input-append'> " +
                  " <input type='number' class='span1 quantity' oninput='input(this)' style='max-width:34px'  value='1'  min='1' max='" +
                  val.seul +
                  "' " +
                  " id='appendedInputButtons' size='16' type='text'> <button id='" +
                  val.reference +
                  "' onclick='remove(this)'  class='btn remove btn-danger '  " +
                  " title='remove' type='button'><i class='icon-remove icon-white'></i></button> </div>" +
                  "<div class='alert alert-warning' role='alert'>Not in Stock </div></tr>"
              );
            } else {
              $(".product").append(
                "<tr id='" +
                  val.reference +
                  "'><td> <img width='60' src='AdminLogin/images/" +
                  val.imageArt +
                  "' alt='" +
                  val.imageArt +
                  "' /></td>" +
                  "<td>" +
                  val.designation +
                  "<br>" +
                  val.descriptions +
                  "</td><td>" + val.nombrePoints + "</td> "+
                  "<td><div class='input-append'> " +
                  "<button id='" + val.reference +
                  "' onclick='remove(this)'  class='btn remove btn-danger '  " +
                  " title='remove' type='button'><i class='icon-remove icon-white'></i></button> </div>" +
                  "</td></tr>"
              );
              total = total + parseFloat(val.nombrePoints);
            }
          });
          $(".product").append(
            "<tr><td colspan='6' style='text-align:right'><strong>TOTAL =</strong></td>" +
              "<td class='label  label-important' style='display:block'> <strong class='total'>" +
             // total +
              " </strong></td></tr>"
          );
          $(".total").html(total);
          $(".numberInCart").html(pointcartArray.length);
          $("#count").html(pointcartArray.length);

    }
});
function remove(object) {

    object.parentElement.parentElement.parentElement.remove();

  for (i = 0; i < pointcartArray.length; i++) {
    console.log(pointcartArray[i]);
    if (object.id == pointcartArray[i]) {
      pointcartArray.splice(i, 1);
      localStorage.setItem("pointscartArray", JSON.stringify(pointcartArray));
      localStorage.setItem("cartpointsCount", pointcartArray.length);
      $("#count").html(pointcartArray.length);
      $(".numberInCart").html(pointcartArray.length);
    }
  }
}




//buy button -------------------------------------------
 function commande() {
  console.log(listePoints);
     console.log(pointcartArray);
  if (pointcartArray != null) {
    if (pointcartArray.length > 0) {
      $.ajax({
        type: "Post",
        url: "AdminLogin/pointsCommande.php",
        data: { commande: listePoints },
        success: function (response) {
          if (response == "not inserted") {
            alert("An error occurred !");
          } else {
            pointcartArray.splice(0, pointcartArray.length - 1);
            localStorage.removeItem("cartpointsCount");
            localStorage.removeItem("pointscartArray");
            //notification place 
            localStorage.setItem("IdlistePoints", response);

            window.location.href = "index.php";
          }
        },
        error: function () {
          alert("problème détecté!");
        }
      });
    }
  } else {
    $(".product").html(
      "<span class='alert alert-error'> veuillez selectionner quelques articles </span> "
    );
  }
}