// Employee js
//variables-----------------------------------
var phpUrl = "PhpFiles/points.service.php";
$(".filterForm").hide();

// datatables---------------------------------
$("#example").dataTable();
var t = $("#example").DataTable();
var deleteEmployeeNumber="";

loads();

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
                val.nombrePoints,
              "<a data-toggle='modal' data-target='#detailModal' onclick=detailsPromo('" +
                val.referencePoints +
                "')><i class=' icon-server font-large-1 '></i></a>",
              "<a data-toggle='modal' data-target='#deleteModal' onclick=deletePromoVerification('" +
                val.referencePoints +
                "')><i class='icon-bin font-large-1 red' ></i></a>"
            ])
            .draw(false);
        });
      }
    });
  
}



//details employee *
function detailsPromo(id) {
  $.ajax({
    type: "post",
    url: phpUrl,
    data: { details: id },
    success: function (response) {
      $("#tableModalDetails").html("");
      response = JSON.parse(response);
      response = response[0];
      $("#tableModalDetails").append(
        "<tr><td>Designation</td><td>" + response.designation + "</td></tr>"
      );
      $("#tableModalDetails").append(
        "<tr><td>Description</td><td>" + response.descriptions + "</td></tr>"
      );
      $("#tableModalDetails").append(
        "<tr><td>Quantity</td><td>" + response.seul + "</td></tr>"
      );
      $("#tableModalDetails").append(
        "<tr><td>Number of Points</td><td>" + response.nombrePoints + "</td></tr>"
      );
      
    }
  });
}



//verification delete employee *
function deletePromoVerification(id)
  {
    $.ajax({
      type: "post",
      url: phpUrl,
      data: {details:id},
      success: function (response) {
        response=JSON.parse(response);
        $("#deletedEmployeeName").html(response[0].designation);
        $("#deletedEmployeeCode").val(response[0].referencePoints);
      }
    });

}



//delete employee *
function DeletePromo(){
  deleteEmployeeNumber=$("#deletedEmployeeCode").val();
  $.ajax({
    type: "post",
    url: phpUrl,
    data: {
       EmployeeIdDelete:deleteEmployeeNumber
      },
    success: function (response) {
      window.location.href="./points";
    }
  });
}












//**************************filter side ********************************************* 
//filter toggle
$(".filterToggle").click(function (e) { 
  e.preventDefault();
  $(".filterForm").slideToggle();
  
});




  //modal success assign if url containes assigned successfully
$("document").ready(function() {
      if(window.location.href.indexOf("assignSuccess") > -1)
      {
        $("#SuccesAssign").trigger('click');
      }
  });
