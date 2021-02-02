class ligneCommande {
  constructor(quantite, idClient, reference, livraison) {
    this.quantite = quantite;
    this.idClient = idClient;
    this.reference = reference;
    this.livraison = livraison;
  }
}
let promoTable = [];
let articleTable = [];
let carts = JSON.parse(localStorage.getItem("cartItems"));
let listeCommande = [];
let cartItems = new Array();
let total = 0;
// if session if open or not ----------------------------

if (sessionEmail != "none") {
  $(".buyIt").append(
    "<a  class='btn btn-warning   pull-right commade'>Buy Articles</a>"
  );
  $("#login").html("Profile");
  $("#UserLastName").html(sessionNom);
  if (carts != null) {
    for (i = 0; i < carts.length; i++) {
      var cmd1 = new ligneCommande(1, idClient, carts[i], "Amana");
      listeCommande.push(cmd1);
    }
  }
} else {
  $(".buyIt").append(
    "<a href='./login.php'  class='btn btn-warning  languagebuyIt  pull-right '>Buy Articles</a>"
  );
}

//ready function ----------------------------------------
$(function () {
  try {
    if (carts != null) {
      $.ajax({
        type: "post",
        url: "AdminLogin/cartItems.php",
        data: { carts: carts },
        success: function (response) {
          response = JSON.parse(response);
          articleTable.push(response[0]);
          promoTable.push(response[1]);

          setTimeout(() => {
            tablePromoArticle();
          }, 300);
        }
      });
    }
  } catch {}
});

function tablePromoArticle() {
  for (j = 0; j < articleTable[0].length; j++) {
    var exist=0;
    console.log(articleTable[0][j].reference);
    for (i = 0; i < promoTable[0].length; i++) {
      console.log(articleTable[0][j].reference);

      if (articleTable[0][j].reference == promoTable[0][i].reference) {
        console.log(promoTable[0][i].reference);

        $(".product").append(
          "<tr id='" +
            articleTable[0][j].reference +
            "'><td> <img width='60' src='AdminLogin/images/" +
            articleTable[0][j].imageArt +
            "' alt='" +
            articleTable[0][j].imageArt +
            "' /></td>" +
            "<td>" +
            articleTable[0][j].designation +
            "<br>" +
            articleTable[0][j].descriptions +
            "</td><td><div class='input-append'> " +
            " <input type='number'  class='span1 quantity' oninput='input(this)' style='max-width:34px'  value='1'  min='1' max='" +
            articleTable[0][j].seul +
            "' " +
            " id='appendedInputButtons' size='16' type='text'> <button id='" +
            articleTable[0][j].reference +
            "' onclick='remove(this)'  class='btn remove btn-danger '  " +
            " title='remove' type='button'><i class='icon-remove icon-white'></i></button> </div>" +
            "</td><td>" +
            promoTable[0][i].Nouveauxprix +
            "</td><td>" +
            promoTable[0][i].Nouveauxprix +
            "</td></tr> "
        );
        total = total + parseFloat(promoTable[0][i].Nouveauxprix);
        exist=1;
      } 
    }
    if (exist==0)
       {
        $(".product").append(
          "<tr id='" +
            articleTable[0][j].reference +
            "'><td> <img width='60' src='AdminLogin/images/" +
            articleTable[0][j].imageArt +
            "' alt='" +
            articleTable[0][j].imageArt +
            "' /></td>" +
            "<td>" +
            articleTable[0][j].designation +
            "<br>" +
            articleTable[0][j].descriptions +
            "</td><td><div class='input-append'> " +
            " <input type='number'  class='span1 quantity' oninput='input(this)' style='max-width:34px'  value='1'  min='1' max='" +
            articleTable[0][j].seul +
            "' " +
            " id='appendedInputButtons' size='16' type='text'> <button id='" +
            articleTable[0][j].reference +
            "' onclick='remove(this)'  class='btn remove btn-danger '  " +
            " title='remove' type='button'><i class='icon-remove icon-white'></i></button> </div>" +
            "</td><td>" +
            articleTable[0][j].prix1 +
            "</td><td>" +
            articleTable[0][j].prix1 +
            "</td></tr> "
        );
        total = total + parseFloat(articleTable[0][j].prix1);
      }
  }
  $(".product").append(
    "<tr><td colspan='6' style='text-align:right'><strong>TOTAL =</strong></td>" +
      "<td class='label  label-important' style='display:block'> <strong class='total'>" +
      total +
      " </strong></td></tr>"
  );
  $(".cartPrice").html(total);
  $(".numberInCart").html(carts.length);
  $("#count").html(carts.length);
}

//quantity input change --------------------------------
function input(object) {
  if (object.parentElement.parentElement.parentElement.childNodes[4]) {
    if (
      $.isNumeric(object.value) &&
      parseInt(object.value) < parseInt(object.max)
    ) {
      var thisTotal =
        object.parentElement.parentElement.parentElement.childNodes[4]
          .innerText;
      var price =
        object.parentElement.parentElement.parentElement.childNodes[3]
          .innerText;
      var quantity = object.value;
      var summ = parseFloat(quantity) * parseFloat(price);
      object.parentElement.parentElement.parentElement.childNodes[4].innerText = summ;
      total = total + (summ - parseFloat(thisTotal));
      $(".cartPrice").html(total);
      $(".total").html(total);
      for (i = 0; i < listeCommande.length; i++) {
        if (
          listeCommande[i].reference ==
          object.parentElement.parentElement.parentElement.id
        ) {
          listeCommande[i].quantite = quantity;
        }
      }
    } else {
      object.value = "1";
      input(object);
    }
  }
}
//remove item button -----------------------------------
function remove(object) {
  if (object.parentElement.parentElement.parentElement.childNodes[4]) {
    var minus =
      object.parentElement.parentElement.parentElement.childNodes[4].innerText;
    total = total - minus;
    object.parentElement.parentElement.parentElement.remove();
    $(".total").html(total);
  } else {
    object.parentElement.parentElement.parentElement.remove();
  }
  console.log(listeCommande);
  for (i = 0; i < carts.length; i++) {
    if (object.id == carts[i]) {
      carts.splice(i, 1);
      listeCommande.splice(i, 1);
      localStorage.setItem("cartItems", JSON.stringify(carts));
      localStorage.setItem("cartItemCount", carts.length);
      $("#count").html(carts.length);
      $(".numberInCart").html(carts.length);
    }
  }
  console.log(listeCommande);
}
//buy button -------------------------------------------
$("#verifyBuy").on("click", function () {
  if (carts != null) {
    if (carts.length > 0) {
      $.ajax({
        type: "Post",
        url: "AdminLogin/commande.php",
        data: { commande: listeCommande },
        success: function (response) {
          console.log(response);
          if (response == "not inserted") {
            alert("An error occurred !");
          } else {
            carts.splice(0, carts.length - 1);
            localStorage.removeItem("cartItems");
            localStorage.removeItem("cartItemCount");
            localStorage.setItem("IdlisteCommande", response);
            window.location.href = "login.php";
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
});
$(".commade").on("click", function (e) {
  e.preventDefault();
  $.ajax({
    type: "post",
    url: "AdminLogin/ClientLogin.php",
    data: {infos:"",
    email:sessionEmail
  },
    success: function (response) {
      response=JSON.parse(response);
      response=response[0];
      $("#buyInfosVerified").html(`
      <tr>
      <td>`+response.adresseClient+`</td>
      <td>`+response.telephone+`</td>
      </tr>
      `);
    }
  });
  setTimeout(() => {
  $("#triggerModal").trigger("click");
    
  }, 300);

});
$("#livraison").change( function (e) {
  for (var i = 0; i < listeCommande.length; i++) {
    console.log(listeCommande);
    listeCommande[i].livraison = $("#livraison option:selected").text();
  }
});
