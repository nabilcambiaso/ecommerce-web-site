<?php
include '../crud/dashboardTemplate.php';?>
<?php 
if(!isset($_SESSION["emailAdmin"]) || $_SESSION["adminState"]=='2')
{
    header("Location:.././");
}
else if( $_SESSION["adminState"]=='0'){
  nav();
}
else if($_SESSION["adminState"]=='1')
{
  navMagasinier();
}
?>
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
          <h5 class="modal-title" id="exampleModalLabel"><i class="icon-desktop"></i> Client Details</h5>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead id="tableModalHeadDetails">
                  <tr>
                    <th>Informations</th>
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
        </div>
      </div>
    </div>
</div>
  <!--end modal 2 commande details -->

<div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body" style="">
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card shadow-card" style="border-right: solid 3px #2494be;border-radius: 4px;">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 text-xs-center bg-info media-left media-middle">
                                <i class="icon-desktop font-large-2 white"></i>
                            </div>
                            <div class="p-2 media-body">
                            <div id="allproduct"></div>
                                <span class="text-bold-500">Total Products</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card shadow-card" style="border-right: solid 3px #2b957a;border-radius: 4px;">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 text-xs-center bg-success media-left media-middle">
                                <i class="icon-price-tag font-large-2 white"></i>
                            </div>
                            <div class="p-2 media-body">
                            <div id="allproductpromo"></div>
                                 <span class="text-bold-500">Promo Products</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card shadow-card" style="border-right: solid 3px #f4a911;border-radius: 4px;">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 text-xs-center bg-warning media-left media-middle">
                            <i class="icon-cart font-large-2 white"></i>
                            
                            </div>
                            <div class="p-2 media-body">
                            <div id="allcommande"></div>
                                <span class="text-bold-500">Commande</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card shadow-card" style="border-right: solid 3px #f4a911;border-radius: 4px;">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 text-xs-center bg-warning media-left media-middle">
                            <i class="icon-user font-large-2 white"></i>
                            
                            </div>
                            <div class="p-2 media-body">
                            <div id="allclient"></div>
                                <span class="text-bold-500">Clients</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
          </div>
        </div>
        <div class="row">
        <div class="col-md-4" >
        <h3>out of stock item</h3>
        <table class="table table-striped" >
        <tr><th>Reference</th><th>Designation</th><th>Quantity</th></tr>
        <tbody id="rupture"></tbody>
        </table>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-7">
        <h3>Files to be Printed</h3>
        <table class="table table-success ">
                <tr><th>Files</th><th>Show</th><th>Date</th><td>Details *</td><td>Delete *</td></tr>
                <tbody id="tableUploaded"></tbody>
                </table>
        </div>

        </div>
      </div>
<?php footer();?>