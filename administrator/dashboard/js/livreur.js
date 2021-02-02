var phpUrl = "PhpFiles/livreur.service.php";


function loads()
{
    $.ajax({
        type: "post",
        url: phpUrl,
        data: {loads:""},
        success: function (response) {
            console.log(response);
            response=JSON.parse(response);
            $.each(response, function (indexInArray, val) { 
                   if(val.recu=="0")
                   {
                    $("#tbodyInfos").append(`
                    <tr>
                    <td>`+val.nomClient+" "+val.prenomClient+`</td>
                    <td>`+val.adresseClient+`</td>
                    <td>`+val.telephone+`</td>
                    <td>`+val.prixtotal+`</td>
                    <td><a onclick="recu(`+val.idlistecom+`)"><i class="icon-radio-checked2 font-large-1 red"></i></a></td>
                    </tr>
                    `);
                   }
                   else{
                       if(val.livrer=="0")
                       {
                        $("#tbodyInfos").append(`
                        <tr>
                        <td>`+val.nomClient+" "+val.prenomClient+`</td>
                        <td>`+val.adresseClient+`</td>
                        <td>`+val.telephone+`</td>
                        <td>`+val.prixtotal+`</td>
                        <td><a onclick="recu(`+val.idlistecom+`)"><i class="icon-radio-checked2 font-large-1 green"></i></a></td>
                        <td><a onclick="livrer(`+val.idlistecom+`)"><i class="icon-checkmark font-large-1 red "></i></a></td>
                        </tr>
                        `);
                       }
                       else{
                        $("#tbodyInfos").append(`
                        <tr>
                        <td>`+val.nomClient+" "+val.prenomClient+`</td>
                        <td>`+val.adresseClient+`</td>
                        <td>`+val.telephone+`</td>
                        <td>`+val.prixtotal+`</td>
                        <td><a ><i class="icon-radio-checked2 font-large-1 green"></i></a></td>
                        <td><a ><i class="icon-checkmark font-large-1 green "></i></a></td>
                        </tr>
                        `);
                       }

                   }

                
                

            });
        }
    });
}

loads();


function recu(id)
{
    $.ajax({
        type: "post",
        url: phpUrl,
        data: {recu:id},
        success: function (response) {
            window.location.href="./livreur";
        }
    });
}

function livrer(id)
{
    $.ajax({
        type: "post",
        url: phpUrl,
        data: {livrer:id},
        success: function (response) {
            window.location.href="./livreur";
        }
    });
}