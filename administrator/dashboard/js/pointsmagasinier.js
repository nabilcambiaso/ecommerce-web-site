
var phpUrl = "PhpFiles/pointscommande.service.php";

$("#example").dataTable();
var t = $("#example").DataTable();
var deleteCommandeId="";
var validateRef="";


//load
$.ajax({
  type: "post",
  url: phpUrl,
  data: {loadthem:""},
  success: function (response) {
       response=JSON.parse(response);
       $.each(response, function (indexInArray, val) { 
          
    if(val.statut=='0')
    {
        t.row
        .add([
          val.statut,
            val.nomClient +" "+ val.prenomClient,
            val.livraisonpoint,
            val.date,
          "<a data-toggle='modal' data-target='#detailModal' onclick=detailsProduct('" +
            val.idlistepoints+
            "')><i class=' icon-server font-large-1 '></i></a>"
        ])
        .draw(false);
    }
    else{    
        t.row
        .add([
          "<span class='disabledValidated grey'>"+val.statut+"</span>",
          "<span class='disabledValidated grey'>"+val.nomClient +" "+ val.prenomClient+"</span>",
          "<span class='disabledValidated grey'>"+val.livraisonpoint+"</span>",
          "<span class='disabledValidated grey'>"+val.date+"</span>",
        "<a data-toggle='modal' class='disabledValidated grey' data-target='#detailModal' onclick=detailsProduct('" +
          val.idlistepoints+
          "')><i class=' icon-server font-large-1 '></i></a>",""
        ])
        .draw(false);
    }
  });


  }
});


//detail product *
function detailsProduct(ref)
{
  validateRef=ref;
var total=0;
    $.ajax({
        type: "post",
        url: phpUrl,
        data: { idModalProduct: ref },
        success: function (response) {

          $("#tableModalDetails").html("");
          response = JSON.parse(response);
          $.each(response, function (indexInArray, val) { 
              
                $("#tableModalDetails").append(`
                <tr>
                <td><img src="../../AdminLogin/images/`+val.imageArt+`" style="width:80px"></td>
                <td>`+val.designation+`</td>
                <td>`+val.nombrePoints+`</td>
                <td>`+val.quantite+`</td>
                </tr>
                `);
 
          });
          if(response[0].nom!=null)
          {
         $("#validateCommande").hide();
           $("#tableModalDetails").append("<tr><td colspan='2'>Validated By : <b>"+response[0].nom+" "+response[0].prenom+"</b></td><td colspan='3'>AT : <b>"+response[0].dateValidate+"</b></td></tr>");
         }
         else{
         $("#validateCommande").show();
         }

          }
        
      });
}


//delet points*
function deleteCommande(id) { 
  deleteCommandeId=id;
}
function deleteTheCommande() {
   $.ajax({
       type: "post",
       url: phpUrl,
       data: {deleteCommande:deleteCommandeId},
       success: function (response) {
           window.location.href="./pointscommande";
       }
   });
 }

 
  //validate commande
  function validateCommande(){
    $.ajax({
      type: "post",
      url: phpUrl,
      data: {validateCommande:validateRef},
      success: function (response) {
        window.location.href="./pointscommande";
      }
    });
 }