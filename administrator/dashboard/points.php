<?php include '../crud/dashboardTemplate.php'
?>
<?php 
if(!isset($_SESSION["emailAdmin"]) || $_SESSION["adminState"]!="0")
{
    header("Location:.././");
}
?>
<!--css style -->
<style>
  td,
  th {
    font-size: smaller;
    text-align: center;
  }
  #tableModalDetails td {
    text-align: left;
  }
  #tableModalHeadDetails th {
    font-size: larger;
    color: #5a95d9;
  }
  #detailCloseButton {
    border: #da4453 1px solid;
    border-radius: 4px;
    color: #da4453;
  }
  #EditModalLabel{
    color: #5a95d9;
  }
  #spanExport{
    font-size:larger;
  }
  .labelLinkEmployee{
    text-align:center;
  }
  .filterToggle:hover{
    background-color: #E7E7E7;
  }


</style>
<?php nav(); ?>
 <!--modal delete material -->
 <div
    class="modal fade"
    id="deleteModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="deleteModalLabel"
    aria-hidden="true"
   >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title red" id="deleteModalLabel"><i class="icon-bin2"></i> Remove</h3>
        </div>
        <div class="modal-body">
          <div class="container">
            <h3><i class="icon-question"></i> Are You sure You Want To remove This Product from Points Articles ?</h3>
            <div class="row">
              <div class="col-md-3"><input type="text" id="deletedEmployeeCode" hidden></div>
              <div class="col-md-6">
                <hr>
                 <h3 id="deletedEmployeeName" ></h3>
                <hr>
              </div>
              <div class="col-md-3"></div>
            </div>
          </div> 
        </div>
        <div class="modal-footer">
          <button
            type="button"
            id="detailCloseButton"
            class="btn btn-secondary"
            data-dismiss="modal"
          >
            Close
          </button>
          <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Delete" onclick="DeletePromo()">
        </div>
      </div>
    
    </div>
</div>
  <!--end modal delete material  -->


 <!-- main content _____________________________-->
<div class="main">
  <!--main here -->
<!-- Button trigger modal -->
<button type="button" hidden class="btn btn-primary" data-toggle="modal" id="SuccesAssign" data-target="#successModal">
</button>
  <!--filters * -->
  <div class="row">
    <div class="container">
      <div class="row filterToggle">
      <a class=""><h2 class="success"> <i class="icon-menu2 success"></i> Export Excel</h2></a>
      </div>
    </div>
  </div>
  <div class="row filterForm">
     <div class="container">
       <hr>
       <form method="Post" action="PhpFiles/points.service.php">


        <div class="form-group col-md-6">
           <hr>
           
           <a href="" ><button type="submit" name="EmployeeExport" class="btn btn-success"><i class="icon-file-excel font-large-1"> </i> <span id="spanExport">Export</span> </button></a>
           <hr>
        </div>
        </form>
     </div>
    
  </div>
  <div class="row"><div class="container"><hr></div></div>



  <!--table EMployee *-->
  <table class="table table-striped" id="example">
    <thead>
      <tr>
        <th>Image</th>
        <th>Designation</th>
        <th>Number of Points</th>
        <th>Details *</th>
        <th>Remove *</th>
      </tr>
    </thead>
    <tbody id="tbodyInfos"></tbody>
  </table>
</div>
 <!--end Main Content ____________________________-->




  <!--modal2 Employee details -->
  <div
    class="modal fade"
    id="detailModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
   >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Promo Details</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead id="tableModalHeadDetails">
                  <tr>
                    <th colspan="2">Informations</th>
                  </tr>
                </thead>
                <tbody id="tableModalDetails"></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            id="detailCloseButton"
            class="btn btn-secondary"
            data-dismiss="modal"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--end modal 2 Employee details -->




<!-- Button trigger modal -->




   <!--scripts -->
   <script src="js/points.js"></script>
  <?php footer() ?>
 


