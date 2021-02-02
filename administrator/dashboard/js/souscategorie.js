// Employee js
//variables-----------------------------------
var phpUrl = "PhpFiles/souscategorie.service.php";




 //Add New categorie to *
function AddNewSousCategorie() {
   var categorie=$("#categorieSelect option:selected").val();
   var sousCategorie=$("#idthemesouscategorie").val();
   $.ajax({
      type: "post",
      url: phpUrl,
      data: { 
         souscategorieName:sousCategorie,
      categorieid: categorie
   },
      success: function (response) {
         window.location.href="./souscategorie";
      }
   });
}


function loads()
{

$.ajax({
      type: "post",
      url: phpUrl,
      data: {loadcategories:"load"},
      success: function (response) {
         response=JSON.parse(response);
         $.each(response, function (indexInArray, val) { 
            $("#categorieSelect").append(`<option value='`+val.idcategorie+`'>`+val.theme+`</option>
            `); 
         });
      }
   });
   $.ajax({
      type: "post",
      url: phpUrl,
      data: {loadSousCategories:"load"},
      success: function (response) {
         response=JSON.parse(response);
         $.each(response, function (indexInArray, val) { 
            $(".categorieAppend").append(`
            <tr><td>`+val.theme+`</td><td><a onclick="deleteCategorie(`+val.idSousCategorie+`)"><i class="icon-trash font-large-1 red"></i></a></td></tr>
            `); 
         });
      }
   });
}
loads();

function deleteCategorie(id)
{
   $.ajax({
      type: "post",
      url: phpUrl,
      data: {deleteId:id},
      success: function (response) {
         window.location.href="./souscategorie";
      }
   });
}



