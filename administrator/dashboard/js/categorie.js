// Employee js
//variables-----------------------------------
var phpUrl = "PhpFiles/categorie.service.php";




 //Add New categorie to *
function AddNewCategorie() {
   var theme=$("#idthemecategorie").val();
   $.ajax({
      type: "post",
      url: phpUrl,
      data: { 
      categorieName: theme},
      success: function (response) {
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
            $(".categorieAppend").append(`
            <tr><td>`+val.theme+`</td><td><a onclick="deleteCategorie(`+val.idcategorie+`)"><i class="icon-trash font-large-1 red"></i></a></td></tr>
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
         window.location.href="./categorie";
      }
   });
}



