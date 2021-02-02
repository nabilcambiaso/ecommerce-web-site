<?php
include '../crud/dashboardTemplate.php';
?>
<?php 
if(!isset($_SESSION["emailAdmin"]) || $_SESSION["adminState"]!="0")
{
    header("Location:.././");
}
?>
<?php nav(); ?>
<style>
  .disabledVerified{
    text-decoration:line-through;
  }
  </style>
 <!--modal2 commande details -->
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
          <h5 class="modal-title" id="exampleModalLabel"><i class="icon-desktop"></i> Product Details</h5>
        </div>
        <div class="modal-body">
            <div class="row">
              <h1>informations</h1>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead id="tableModalHeadDetails">
                  <tr>
                    <th>Image</th>
                    <th>Designation</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody id="tableModalDetails"></tbody>
              </table>
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
          <button
            type="button"
            id="validateCommande"
            class="btn btn-primary"
            data-dismiss="modal"
            onclick="validateCommande()"
          >
            Validate Commande
          </button>
        </div>
      </div>
    </div>
</div>
  <!--end modal 2 commande details -->


   <!--modal delete commande -->
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
          <h3 class="modal-title red" id="deleteModalLabel"><i class="icon-bin2"></i> Cancel Commande</h3>
        </div>
        <div class="modal-body">
          <div class="container">
            <h3><i class="icon-question"></i> Are You sure You Want To cancel This Commande ?</h3>
            <div class="row">
            <div class="col-md-3"></div>
              <div class="col-md-6">
                <hr>
                 <h3 id="deletedProductName" ></h3>
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
          <input type="button" class="btn btn-danger" value="Delete" onclick="deleteTheCommande()">
        </div>
      </div>
    </div>
</div>
  <!--end modal delete commande  -->



<div class="container">
    <div class="row ">
        <div class="container">
        <br><br>
    
    <!--table liste commande-->
    <table  class="table table-striped table-active tbodyProducts" id="example">
    <thead>
      <tr>
        <th>statut</th>
        <th>reference</th>
        <th>nom client</th>
        <th>livraison</th>
        <th>datecommande</th>
        <th>Details *</th>
        <th>Delete *</th>
        <th>Livraison *</th>
      </tr>
    </thead>
    <tbody id="tbodyInfos" >
    </tbody>
  </table>
        </div>  
    </div>
</div>



<script src="js/listecommande.js"></script>

<?php footer();?>