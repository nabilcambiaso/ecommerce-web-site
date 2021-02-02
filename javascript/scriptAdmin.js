//======== class categorie =================================================================
class Categorie {
  constructor(id, theme) {
    this.id = id;
    this.theme = theme;
  }
}
//=========end classes========================================================================
// global variables ==========================================================================
let categories = [];
let products = [];
let Deleteselected = 1;
let modifySelected = 0;

//end  global variables ======================================================================

//global Functions ===========================================================================
//input file to images
function readURL(input) {}
$("#fileimages").change(function () {

   var i=0;
   var file1 = document.getElementById("fileimages").files;
   console.log(file1);
var stinterval= setInterval(function () { 
   var reader = new FileReader();
      reader.onload = function () {
         
           $("#image" + i).attr("src", reader.result);
         }

        reader.readAsDataURL(file1[i]);
        i=i+1;
        if(i==4)
        {
           clearInterval(stinterval);
        }
 },100)
      

     

});

//-----------search product to delete ----------

$("#DeleteProduct").on("click", function () {
  var deleteName = $("#inputDeleteName").val();

  $.ajax({
    type: "post",
    url: "AdminLogin/addArticle.php",
    data: {
      delete: "yes",
      name: deleteName,
      idcategorie: Deleteselected,
    },
    success: function (data) {
      $("#imgs").html("");
      $.each(JSON.parse(data), function (key, val) {
        $("#imgs").append(
          "<div >" +
            "<br><button type='button'   class='picsDelete'  data-toggle='modal' data-target='#exampleModal'>" +
            "<img  id='" +
            val.reference +
            "' onclick='dd(this)' src='AdminLogin/images/" +
            val.imageArt +
            "'" +
            "style='width: 100px; border: 1px dotted gray; padding-right: 10px;'>" +
            "</button></div>"
        );
      });
    },
  });
});
//--------get the value of the selected categorie -----------
$("#selectCategorie2").change(function () {
  Deleteselected = $("#selectCategorie2 option:selected").val();
});
$("#selectCategorie-modify").change(function () {
  modifySelected = $("#ModifyCategorie option:selected").val();
});
$("#btnCommande").on("click", function () {
  $.ajax({
    type: "post",
    url: "AdminLogin/addArticle.php",
    data: {
      listeCommande:"vfdf"
    },
    success: function (response) {
      console.log(JSON.parse( response));
      response=JSON.parse(response);
      for(var i=0; i<response.length-1 ;i++)
      {
        for(var j=i+1; j<response.length ;j++)
        {
          if(response[i].idlistecom==response[j].idlistecom)
          {
          $("#CommandeListTable").append("<tr><td>"+response[i].nomClient+" "+response[i].prenomClient+"</td></tr>");

           // $("#CommandeListTable").append( "<tr><td></td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>");
          }
        }
       /* if(i>0 && )
        {
        }
        else{
          $("#CommandeListTable").append( "<tr><td>"+response[i].designation+"</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>");
        }  */      
      }
    
    }
  });
});
//delete the selected product-------------------------------
function dd(der) {
  $("#deleteReference , #modal-description , .modal-footer-delete ").html("");

  $.ajax({
    type: "post",
    url: "AdminLogin/addArticle.php",
    data: {
      id: der.id,
    },
    success: function (data) {
      $.each(JSON.parse(data), function (key, val) {
        $("#deleteReference").append(val.reference);
        $("#modal-description").append(val.descriptions);
        $(".modal-footer-delete").append(
          " <button type='button' onclick='deletes(this)'  id='" +
            val.reference +
            "' class='btn btn-primary'>Delete</button>"
        );
        $("#modal-image").attr("src", "AdminLogin/images/" + val.imageArt + "");
      });
    },
    error: function (data) {
      console.log(data);
    },
  });
}
function deletes(id) {
  $.ajax({
    type: "post",
    url: "AdminLogin/addArticle.php",
    data: {
      deletes: id.id,
    },
    success: function (data) {
      alert("Product deleted");
    },
    error: function (data) {
      console.log(data);
    },
  });
}
// modify ======================================================================================
//search refe to modify ----------
$("#search-modify").on("click", function () {
  var ref = $("#reference-modify").val();
  alert(ref);
  $.ajax({
    type: "post",
    url: "AdminLogin/addArticle.php",
    data: {
      modify: ref,
    },
    success: function (data) {
      $("#search-modify").hide();
      //$("#reference-modify").attr("disabled",true);
      $(".reference-modify").hide();
      $("#show-modify").show();
      $("#selectCategorie-modify").html("");
      var idSelected;
      console.log(data);

      $.each(JSON.parse(data), function (key, val) {
        $("#designation-modify").val(val.designation);
        $("#Price1-modify").val(val.prix1);
        $("#Price2-modify").val(val.prix2);
        $("#Price3-modify").val(val.prix3);
        $("#Quantity-modify").val(val.seul);
        $("#Description-modify").val(val.descriptions);
        $("#image1-modify").attr(
          "src",
          "AdminLogin/images/" + val.imageArt + ""
        );
        $.each(categories, function (key1, val1) {
          if (val.idcategorie == val1.id) {
            $("#selectCategorie-modify").append(
              "<option name='selectedCategorieModify' value='" +
                val1.id +
                "'>" +
                val1.theme +
                "</option>"
            );
            idSelected = val1.id;
          }
        });
        $.each(categories, function (key1, val1) {
          if (val1.id != idSelected) {
            $("#selectCategorie-modify").append(
              "<option value='" + val1.id + "'>" + val1.theme + "</option>"
            );
          }
        });
      });
    },
  });
});

//infos ========================================================================================
$("#infosProduct").click(function (e) {
  var t = $("#example").DataTable();
  var designation = $("#infosLabel").val();
  e.preventDefault();
  $.ajax({
    type: "post",
    url: "AdminLogin/addArticle.php",
    data: {
      infosDesignation: designation,
    },
    success: function (response) {
      products = response;
      console.log(designation);
      $.each(JSON.parse(products), function (key, val) {
        t.row
          .add([
            val.designation,
            val.descriptions,
            val.prix1,
            val.prix2,
            val.prix3,
            val.seul,
            "<img src='AdminLogin/images/" + val.imageArt + "'></img>",
          ])
          .draw(false);
        // $("#tbodyInfos").html("<tr><td>"+val.designation+"</td><td>"+val.descriptions+"</td><td>"+val.prix1+"</td><td>"+val.prix2+"</td><td>"+val.prix3+"</td><td>"+val.seul+"</td><td><img style='width:50px;' src='AdminLogin/images/"+val.imageArt+"'></img></td></tr>");
      });
    },
  });
});

//------------------------------------------------------------------------------------------------
//******************************Function Jquery Ready*********************************************** */
//=========================== ready ===============================================================
$(function () {
  // datatables------
  $("#example").dataTable();

  //get categories-----------------------------
  $.getJSON("AdminLogin/getCategorie.php", function (data) {
    $.each(data, function (key, val) {
      var cc = new Categorie(val.idcategorie, val.theme);
      categories.push(cc);
      $("#selectCategorie").append(
        "<option value='" + val.idcategorie + "'>" + val.theme + "</option>"
      );
    });
  });

  //css styles----------
  $("a").on("click", function () {
    $("a").css("color", "Black");
    $(this).css("color", "Red");
  });
  //hide well------------
  $(".well").hide();
  $("#divAdd").show();
  //delete-------------
  $("#btnDelete").on("click", function () {
    $("#selectCategorie2").html("");
    $(".well").hide();
    $("#divDelete").show();
    $.each(categories, function (key, val) {
      $("#selectCategorie2").append(
        "<option value='" + val.id + "'>" + val.theme + "</option>"
      );
    });
  });

  //Modify-------------
  $("#btnModify").on("click", function () {
    $(".well").hide();
    $("#divModify").show();
    $("#show-modify").hide();
  });
  //Add-------------
  $("#btnAdd").on("click", function () {
    $(".well").hide();
    $("#divAdd").show();
  });
  //Infos-------------
  $("#btnInfos").on("click", function () {
    $(".well").hide();
    $("#divInfos").show();
  });
  //Commande List-------------
  $("#btnCommande").on("click", function () {
    $(".well").hide();
    $("#divCommande").show();
  });
  //Employe-------------
  $("#btnEmploye").on("click", function () {
    $(".well").hide();
    $("#divEmploye").show();
  });

  //-----------------------------------------------------------------
  /* $("#addProduct").on("click", function () {
       let reference = $("#inputreference").val();
       let designation = $("#inputdesignation").val();
       let price1 = $("#inputPrice1").val();
       let price2 = $("#inputPrice2").val();
       let price3 = $("#inputPrice3").val();
       let quantite = $("#inputQuantity").val();
       let description = $("#inputDescription").val();
       $.ajax({
          type: "post",
          url: "AdminLogin/addArticle.php",
          data:
          {
             reference: reference,
             designation: designation,
             price1: price1,
             price2: price2,
             price3: price3,
             quantite: quantite,
             description: description,
             categorie: selected,
             imgPath: imgPath,
             imgName : imgName
          }, 
          success:function(data){
             alert(data);
          }
 
       });
    })
 */
  //-----------------------------------------------------------------
});
//=============== end ready ========================================================================
