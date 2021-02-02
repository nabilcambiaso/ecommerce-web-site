var phpurl="PhpFiles/statistic.php";
function load() {
    $.ajax({
        type:"post",
        url:phpurl,
        data:{promo:"promo"},
        success:function (response){
            $("#allproductpromo").append("<h3 class='info text-bold-700'>"+JSON.parse(response)+"</h3>");
        }
        });
        $.ajax({
            type:"post",
            url:phpurl,
            data:{products:"products"},
            success:function (response){
                $("#allproduct").append("<h3 class='success text-bold-700'>"+JSON.parse(response)+"</h3>");
            }
            });
            $.ajax({
                type:"post",
                url:phpurl,
                data:{commande:"commande"},
                success:function (response){
                    $("#allcommande").append("<h3 class='warning text-bold-700'>"+JSON.parse(response)+"</h3>");
                }
                });

                $.ajax({
                    type:"post",
                    url:phpurl,
                    data:{client:"client"},
                    success:function (response){
                        $("#allclient").append("<h3 class='warning text-bold-700'>"+JSON.parse(response)+"</h3>");
                    }
                    });
                
                    $.ajax({
                        type:"post",
                        url:phpurl,
                        data:{articlesGone:"d"},
                        success:function (response){
                            response=JSON.parse(response);
                            
                            $.each(response, function (indexInArray, val) {
                            $("#rupture").append("<tr><td>"+val.reference+"</td><td>"+val.designation+"</td><td>"+val.seul+"</td></tr>");  
                             
                        });
                        }
                        });     
                        
                        
                        $.ajax({
                            type: "post",
                            url: phpurl,
                            data: {uploadId:""},
                            success: function (response) {
                                response=JSON.parse(response);
                       $.each(response, function (indexInArray, val) { 
                        $("#tableUploaded").append(`
                        <tr>
                        <td>`+val.fileName+`</td>
                        <td style='text-align:center;'><a href="../../AdminLogin/uploaded_files/`+val.fileName+`" target="_blank"><i class="icon-folder-open font-large-1"></i></a></td>
                        <td>`+val.dateFiles+`</td>
                        <td><a data-toggle='modal' data-target='#detailModal' onclick="details(`+val.filesId+`)"><i class="icon-server  font-large-1"></i><a></td>
                        <td><a onclick="deletes(`+val.filesId+`)"><i class="icon-trash red font-large-1"></i><a></td>
                        </tr>
                        `);  
                       });
                            }
                        });
                    
                 

}

load();


function deletes(id)
{
    $.ajax({
        type: "post",
        url: phpurl,
        data: {deletes:id},
        success: function (response) {
            window.location.href="./";
        }
    });
}

function details(id)
{
    $("#tableModalDetails").html("");
    $.ajax({
        type: "post",
        url: phpurl,
        data: {detailsId:id},
        success: function (response) {
            //window.location.href="./";
            response=JSON.parse(response);
            response=response[0];
            $("#tableModalDetails").append(`
            <tr><td>Client Name</td><td>`+response.nomClient+" "+response.prenomClient+`</td></tr>`);
            $("#tableModalDetails").append(`
            <tr><td>Client Adresse</td><td>`+response.adresseClient+`</td></tr>`);
            $("#tableModalDetails").append(`
            <tr><td>Client telephone</td><td>`+response.telephone+`</td></tr>`);
            $("#tableModalDetails").append(`
            <tr><td>Client City</td><td>`+response.city+`</td></tr>`);
        }
    });
}

