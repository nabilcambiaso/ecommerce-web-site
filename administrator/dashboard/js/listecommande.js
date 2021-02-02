//url
var phpUrl = "PhpFiles/listecommande.service.php";

$("#example").dataTable();
var t = $("#example").DataTable();
var deleteCommandeId="";
var validateRef="";
var pointstotal=0;
//call load function
setInterval(() => {
loads();
},20000);
loads();

//function loads *
function loads()
{
    //load table
    t.clear().draw();
    $.ajax({
      type: "post",
      url: phpUrl,
      data: { load: "load" },
      success: function (response) {
        $.each(JSON.parse(response), function (key, val) {
            if(val.validerAdmin=='0')
            {
                t.row
                .add([
                    val.statut,
                    val.reference,
                    val.nomClient +" "+ val.prenomClient,
                    val.livraison,
                    val.dateCommande,
                  "<a data-toggle='modal' data-target='#detailModal' onclick=detailsProduct('" +
                    val.idlistecom+
                    "')><i class=' icon-server font-large-1 '></i></a>",
                  "<a data-toggle='modal' data-target='#deleteModal' onclick=deleteCommande('" +
                    val.idlistecom +
                    "')><i class='icon-bin font-large-1 red' ></i></a>",""
                ])
                .draw(false);
            }
            else{  
              if(val.recu=='1')
              {
                if(val.livrer=="1")
                {
                  t.row
                .add([
                    "<span class='grey disabledVerified'>"+val.statut+"</span>",
                    "<span class='grey disabledVerified'>"+val.reference+"</span>",
                    "<span class='grey disabledVerified'>"+val.nomClient +" "+ val.prenomClient+"</span>",
                    "<span class='grey disabledVerified'>"+val.livraison+"</span>",
                    "<span class='grey disabledVerified'>"+val.dateCommande+"</span>",
                  "<a  data-toggle='modal' data-target='#detailModal' onclick=detailsProduct('" +
                    val.idlistecom+
                    "')><i class='grey disabledVerified icon-server font-large-1 '></i></a>","",
                    "<i class='icon-check green'></i>"
                ])
                .draw(false);
                }else{
                  t.row
                  .add([
                      "<span class='grey disabledVerified'>"+val.statut+"</span>",
                      "<span class='grey disabledVerified'>"+val.reference+"</span>",
                      "<span class='grey disabledVerified'>"+val.nomClient +" "+ val.prenomClient+"</span>",
                      "<span class='grey disabledVerified'>"+val.livraison+"</span>",
                      "<span class='grey disabledVerified'>"+val.dateCommande+"</span>",
                    "<a  data-toggle='modal' data-target='#detailModal' onclick=detailsProduct('" +
                      val.idlistecom+
                      "')><i class='grey disabledVerified icon-server font-large-1 '></i></a>","",
                      "<i class='icon-check red'></i>"
                  ])
                  .draw(false);
                }
              }  
              else{
                t.row
                .add([
                    "<span class='grey disabledVerified'>"+val.statut+"</span>",
                    "<span class='grey disabledVerified'>"+val.reference+"</span>",
                    "<span class='grey disabledVerified'>"+val.nomClient +" "+ val.prenomClient+"</span>",
                    "<span class='grey disabledVerified'>"+val.livraison+"</span>",
                    "<span class='grey disabledVerified'>"+val.dateCommande+"</span>",
                  "<a  data-toggle='modal' data-target='#detailModal' onclick=detailsProduct('" +
                    val.idlistecom+
                    "')><i class='grey disabledVerified icon-server font-large-1 '></i></a>","",""
                ])
                .draw(false);
              }
            }
        });
      }
    });
  
}

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
              if(val.idpromotion!=null)
              {
                $("#tableModalDetails").append(`
                <tr>
                <td><img src="../../AdminLogin/images/`+val.imageArt+`" style="width:80px"></td>
                <td>`+val.designation+`</td>
                <td>`+val.Nouveauxprix+`</td>
                <td>`+val.quantite+`</td>
                <td>`+parseFloat(val.Nouveauxprix)*parseFloat(val.quantite)+`</td>
                </tr>
                `);
                total=total+parseFloat(val.Nouveauxprix)*parseFloat(val.quantite);
                pointstotal=total;
              }else{
                $("#tableModalDetails").append(`
                <tr>
                <td><img src="../../AdminLogin/images/`+val.imageArt+`" style="width:80px"></td>
                <td>`+val.designation+`</td>
                <td>`+val.prix1+`</td>
                <td>`+val.quantite+`</td>
                <td>`+parseFloat(val.prix1)*parseFloat(val.quantite)+`</td>
                </tr>
                `);
                total=total+parseFloat(val.prix1)*parseFloat(val.quantite);
                pointstotal=total;
              }
          });
          $("#tableModalDetails").append("<tr><td></td><td></td><td></td><td class='red'><i><h4><b>Total :</b></h4></i></td><td class='bg-grey'><i>"+total+"</i></td></tr>");
           if(response[0].nom!=null)
           {
          $("#validateCommande").hide();
            $("#tableModalDetails").append("<tr><td colspan='2'>Admin Validated commande At :</td><td colspan='3'><b>"+response[0].dateValidateAdmin+"</b></td></tr>");
            $("#tableModalDetails").append("<tr><td colspan='2'>Validated By: <b>"+response[0].nom+" "+response[0].prenom+"</b></td><td colspan='3'>AT: <b>"+response[0].dateValidate+"</b></td></tr>");
            $("#tableModalDetails").append("<tr><td colspan='2'>Livred At:</td><td colspan='3'> <b>"+response[0].dateValidateLivreur+"</b></td></tr>");
          }
          else{
          $("#validateCommande").show();
          }
        }
        
      });
}


//delete
function deleteCommande(id) { 
    deleteCommandeId=id;
 }
 function deleteTheCommande() {
     $.ajax({
         type: "post",
         url: phpUrl,
         data: {deleteCommande:deleteCommandeId},
         success: function (response) {
             window.location.href="./listecommande";
         }
     });
   }


  //validate commande
  function validateCommande(){
     $.ajax({
       type: "post",
       url: phpUrl,
       data: {validateCommande:validateRef,
      point:pointstotal},
       success: function (response) {
         window.location.href="./listecommande";
       }
     });
  }