//url
var phpUrl = "PhpFiles/Products.service.php";
var deleteref="";
var promoref="";
var pointsref="";
//datatable
$("#example").dataTable();
var t = $("#example").DataTable();

//call load function
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
          t.row
            .add([
                "<img width='80' src='../../AdminLogin/images/"+val.imageArt+"'>",
                val.designation,
                val.seul,
                val.prix1,
                
                "<a data-toggle='modal' data-target='#pointsModal'  onclick=pointsModal('" +
                val.reference +
                "') ><i class=' icon-price-tag font-large-1 '></i></a>",
                "<a data-toggle='modal' data-target='#PromoModal'  onclick=promoModal('" +
                val.reference +
                "') ><i class=' icon-price-tag font-large-1 '></i></a>",
              "<a data-toggle='modal' data-target='#detailModal' onclick=detailsProduct('" +
                val.reference +
                "')><i class=' icon-server font-large-1 '></i></a>",
              "<a data-toggle='modal' data-target='#EditModal'  onclick=EditProducts('" +
              val.reference +
              "')><i   class='icon-edit font-large-1 blue '></i></a>",
              "<a data-toggle='modal' data-target='#deleteModal' onclick=deleteProduct('" +
                val.reference +
                "')><i class='icon-bin font-large-1 red' ></i></a>"
            ])
            .draw(false);
        });
      }
    });
  
}

// filledit add *
$("#addProductModalButton").click(function (e) { 
    e.preventDefault();
      //fill add category select
    filEdit();
});

//fill edit *
function filEdit(){
    $.ajax({
        type: "post",
        url: phpUrl,
        data: {categorySelect:"category"},
        success: function (response) {
            $("#productCategoryAdd").html("");
            $("#productCategoryEdit").html("");
            response=JSON.parse(response);
            $.each(response, function (key, val) { 
            $("#productCategoryAdd, #productCategoryEdit").append("<option value='"+val.idcategorie+"'>"+val.theme+"</option>");
            });
        }
    });
}
// onchange category , fill sous category ADD *
$("#productCategoryAdd").on("click , change",function (e) { 
    e.preventDefault();
    var idCategorie=$("#productCategoryAdd option:selected").val();
      //fill add category select
      $.ajax({
        type: "post",
        url: phpUrl,
        data: {SouscategorySelectAdd:idCategorie},
        success: function (response) {
            $("#productSousCategoryAdd").html("");
            response=JSON.parse(response);
            $.each(response, function (key, val) { 
            $("#productSousCategoryAdd").append("<option value='"+val.idSousCategorie+"'>"+val.theme+"</option>");
            });
        }
    });
    
});

//detail product *
function detailsProduct(ref)
{

    $.ajax({
        type: "post",
        url: phpUrl,
        data: { idModalProduct: ref },
        success: function (response) {

          $("#tableModalDetails").html("");
          response = JSON.parse(response);
          response=response[0];

          $("#tableModalDetails").append(
            "<tr><td>Reference</td><td>" + response.reference + "</td></tr>"
          );
          $("#tableModalDetails").append(
            "<tr><td> category</td><td>" + response.theme + "</td></tr>"
          );
          $("#tableModalDetails").append(
            "<tr><td>Model Name </td><td>" + response.designation + "</td></tr>"
          );
          $("#tableModalDetails").append(
            "<tr><td>description </td><td>" + response.descriptions + "</td></tr>"
          );
          $("#tableModalDetails").append(
            "<tr><td>Price</td><td>" + response.prix1 + "</td></tr>"
          );
          $("#tableModalDetails").append(
            "<tr><td>Quantity </td><td>" + response.seul + "</td></tr>"
          );
          $("#tableModalDetails").append(
            "<tr><td> Date Added</td><td>" + response.datePublication + "</td></tr>"
          );
        }
      });
}

// show images selected by input file *
$("#fileimagesAdd").change(function () {

    var i=0;
    var file1 = document.getElementById("fileimagesAdd").files;
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
  },100);
})

 //delete product *
 function deleteProduct(ref)
 {
    deleteref=ref;
    $.ajax({
        type: "post",
        url: phpUrl,
        data: {idModalProductDelete:ref},
        success: function (response) {
          response=JSON.parse(response);

          $("#deletedProductName").html(response[0].designation);
        }
      });
 }

 //delete product *
 function deleteTheProduct()
 {
  
  $.ajax({
    type: "post",
    url: phpUrl,
    data: {
       deleteTheProduct:deleteref
    },
    success: function (response) {
      setTimeout(() => {
        window.location.href="products";
      }, 200); }
  });     
 }

 // onchange category , fill sous category *
$("#productCategoryEdit").on("click , change",function (e) { 
    e.preventDefault();
    var idCategorie=$("#productCategoryEdit option:selected").val();
      //fill add category select
      $.ajax({
        type: "post",
        url: phpUrl,
        data: {SouscategorySelectAdd:idCategorie},
        success: function (response) {
            $("#productSousCategoryEdit").html("");
            response=JSON.parse(response);
            $.each(response, function (key, val) { 
            $("#productSousCategoryEdit").append("<option value='"+val.idSousCategorie+"'>"+val.theme+"</option>");
            });
        }
    });
    
});

 
//edit product *
function EditProducts(ref)
{
    filEdit();

     $.ajax({
        type: "post",
        url: phpUrl,
        
        data:{getEditValues:ref},
        success: function (response) {
            response=JSON.parse(response);
            response=response[0];
            
        $("#idreferenceEdit").val(response.reference),
        $("#iddesignationEdit").val(response.designation),
        $("#idquantityEdit").val(response.seul),
        $("#idpriceEdit").val(response.prix1),
        $("#iddescriptionEdit").val(response.descriptions)
        }
      });
  
}

//validate edit product *
function EditproductValidate() {
    $.ajax({
        type: "post",
        url: phpUrl,
        data: {
            EditProductSelected:"Edit",
        referenceEdit:$("#idreferenceEdit").val(),
        designation:$("#iddesignationEdit").val(),
        quantite:$("#idquantityEdit").val(),
        price1:$("#idpriceEdit").val(),
        description:$("#iddescriptionEdit").val(),
        Categories:$("#productCategoryEdit option:selected").val(),
        SousCategorie:$("#productSousCategoryEdit option:selected").val(),
        },
        success: function (response) {
            window.location.href="products";
        }
    });
            
  }

//add product *
 function AddProducts()
{
   var category = $("#productCategoryAdd option:selected").val();
   var sousCategory = $("#productSousCategoryAdd option:selected").val();
   var reference = $("#idreferenceAdd").val();
      var designation = $("#iddesignationAdd").val();
      var quantity = $("#idquantityAdd").val();
      var description = $("#iddescriptionAdd").val();
      var hdd = $("#productHddAdd").val();
      var cpu = $("#productCpuAdd").val();
      var size = $("#productSizeAdd").val();
      
    
      $.ajax({
        type: "post",
        url: phpUrl,
        data: {
          AddProduct: "Add",
          serialNumber:serialNumber,
          category:category,
          assetType:assetType,
          modelName:modelName,
          ram:ram,
          hdd:hdd,
          cpu:cpu,
          size:size
        },
        success: function (response) {
          Add_Event("Add Product",`Serial Number :${serialNumber}, Type: ${assetType} Category: ${category}`); 
          setTimeout(()=>{
            window.location.href="products";
          },200)
        }
      });
}

// promo modal *
function promoModal(ref){
    promoref=ref;
    $.ajax({
        type: "post",
        url: phpUrl,
        data: { idModalProduct: ref },
        success: function (response) {
            response=JSON.parse(response);
            response=response[0];
            $("#idancienprice").val(response.prix1);
        }
    })

}

// promo modal *
function pointsModal(ref){
  pointsref=ref;
  $.ajax({
      type: "post",
      url: phpUrl,
      data: { idModalProduct: ref },
      success: function (response) {
          response=JSON.parse(response);
          response=response[0];
          $("#designation").val(response.designation);
      }
  })

}

//make it points *
function pointsProduct()
{
    $.ajax({
        type: "post",
        url: phpUrl,
        data: {
            makeItpoints:pointsref
        },
        success: function (response) {
        window.location.href="points";
        }
    });


}

//make it promo *
function PromoProduct()
{
  let newprice=$("#idnewprice").val();
  let ancienprice=$("#idancienprice").val();
  let duration=$("#idduration").val();
    $.ajax({
        type: "post",
        url: phpUrl,
        data: {
            makeItPromo:promoref,
            nouveauPrice:newprice,
            ancienprix:ancienprice,
            duration:duration
        },
        success: function (response) {
            window.location.href="products";
        }
    });


}



   //**************************filter side ********************************************* */
//filter toggle
$(".filterToggle").click(function (e) { 
    e.preventDefault();
    $(".filterForm").slideToggle();
    
  });
  $(".filterForm").hide();
  
