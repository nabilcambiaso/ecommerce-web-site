<?php include '../crud/dashboardTemplate.php'?>
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
<style>
   .tbodyProducts td, .tbodyProducts th{
        text-align:center;
    }
</style>

 <!-- main content _____-->
 <div class="main">

   <!--filters -->
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
       <form method="Post" action="PhpFiles/Products.service.php">
        <div class="form-group col-md-3">
           <label for="startDate">Start Date</label>
           <input type="date" name="dateS" class="form-control">
        </div>
        <div class="form-group col-md-3">
           <label for="startDate">End Date</label>
           <input type="date" name="dateE" class="form-control">
        </div>

        <div class="form-group col-md-3">
           <hr>
           
           <a href="" ><button type="submit" name="EmployeeExport" class="btn btn-success"><i class="icon-file-excel font-large-1"> </i> <span id="spanExport">Export</span> </button></a>
           <hr>
        </div>
        </form>
     </div>
    </div>
  <div class="row"><div class="container"><hr></div></div>

  <!--add button -->
  <div class="row">
    <button
      id="addProductModalButton"
      class="btn btn-info btn-small mb-4 "
      data-toggle="modal"
      data-target="#exampleModal"
    >
     <i class="icon-desktop" ></i> Add New Product
    </button>
    <br /><br />
  </div>
  <!--table product-->
  <table  class="table table-striped table-active tbodyProducts" id="example">
    <thead>
      <tr>
        <th>image</th>
        <th>Designation</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Points *</th>
        <th>Promo *</th>
        <th>Details *</th>
        <th>Edit *</th>
        <th>Delete *</th>
      </tr>
    </thead>
    <tbody id="tbodyInfos" >


    </tbody>
  </table>

</div>
 <!--end Main Content ____-->



<!-- add new product -->
<div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
   >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"><i class="icon-desktop"></i> Add New Product *</h3>
        </div>
        <!-- add new Modal *********************-->
        <div class="modal-body">
          <!-- form-->
          <div class="container">
            <form method="post" action="phpFiles/Products.service.php" enctype="multipart/form-data">
                <div class="form-group col-md-4">
                <label for="exampleInputEmail1"
                  >Reference <span class="verified"> *</span></label
                >
                <input
                  type="text"
                  name="idreferenceAdd"
                  class="form-control"
                  id="idreferenceAdd"
                  aria-describedby="emailHelp"
                  required
                />
              </div>
                <div class="container">
                <div class="row">
              <div class="form-group col-md-4">
                  <label for="exampleInputEmail1"
                    > designation <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    name="designation"
                    class="form-control"
                    id="iddesignationAdd"
                    aria-describedby="emailHelp"
                    
                  />
                </div>

                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1"
                    > Quantity <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    name="quantite"
                    class="form-control"
                    id="idquantityAdd"
                    aria-describedby="emailHelp"
                  />
                </div>
                
                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1"
                    > Price <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="idpriceAdd"
                    name="price1"
                    aria-describedby="emailHelp"
                  />
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1"
                    > categorie <span class="verified"> *</span></label
                  >
                  <select name="categorie" class="form-control" id="productCategoryAdd">
                  <!--categorie here -->
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1"
                    > sous categorie <span class="verified"> *</span></label
                  >
                  <select name="souscategorie" class="form-control" id="productSousCategoryAdd">
                  <!--sous categorie here -->
                  
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1"
                    > description <span class="verified"> *</span></label
                  >
                  <textarea name="description" id="iddescriptionAdd" style="width:100%" rows="6"></textarea>
                 
                </div>
                <div class="form-group col-md-12">
                <label style="cursor:pointer;" class="form-control" for="fileimagesAdd"> Add Pictures <sup>*</sup>&nbsp; <i class="icon-image"></i></label>
                                <div class="controls">
                                    <input type="file" hidden id="fileimagesAdd" name="image[]"   value="select 4 images"  multiple>
                                </div>
                </div>
                <div class="form-group col-md-12">
                <div class="controls">          
                                        <div class="col-md-3"><img class="form-control" src="" alt="" id="image1" 
                                        style="width: 100px; border: 1px dotted gray; padding-right: 10px;"></div>
                                        <div class="col-md-3"><img class="form-control" src="" alt="" id="image2" 
                                        style="width: 100px; border: 1px dotted gray; padding-right: 10px;"></div>
                                        <div class="col-md-3"><img class="form-control" src="" alt="" id="image3" 
                                        style="width: 100px; border: 1px dotted gray; padding-right: 10px;"></div>
                                        <div class="col-md-3"><img class="form-control" src="" alt="" id="image4" 
                                        style="width: 100px; border: 1px dotted gray; padding-right: 10px;"></div>
    
                                </div>
                </div>
              </div>
                
              </div>

            </div>
            </div> 

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button
                  type="submit"
                  class="btn btn-primary"
                >
                  Validate
                </button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>  
<!-- end add new material -->



 <!--modal2 material details -->
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
  <!--end modal 2 material details -->




<!-- Modal Edit Selected product _____________________________________________________________________________-->
<div
    class="modal fade"
    id="EditModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="EditModalLabel"
    aria-hidden="true"
    >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditModalLabel"><i class='icon-edit font-large-0 blue '></i> Edit Products *</h5>

        </div>
        <!--model edit-->
        <div class="modal-body">
          <!-- form-->
          <div class="container">
            <form method="post" action="phpFiles/Products.service.php" enctype="multipart/form-data">
                <div class="form-group col-md-4">
                <label for="exampleInputEmail1"
                  >Reference <span class="verified"> *</span></label
                >
                <input
                  type="text"
                  name="idreferenceAdd"
                  class="form-control"
                  id="idreferenceEdit"
                  disabled
                  aria-describedby="emailHelp"
                  required
                />
              </div>
                <div class="container">
                <div class="row">
              <div class="form-group col-md-4">
                  <label for="exampleInputEmail1"
                    > designation <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    name="designation"
                    class="form-control"
                    id="iddesignationEdit"
                    aria-describedby="emailHelp"
                    
                  />
                </div>

                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1"
                    > Quantity <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    name="quantite"
                    class="form-control"
                    id="idquantityEdit"
                    aria-describedby="emailHelp"
                  />
                </div>
                
                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1"
                    > Price <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="idpriceEdit"
                    name="price1"
                    aria-describedby="emailHelp"
                  />
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1"
                    > categorie <span class="verified"> *</span></label
                  >
                  <select name="categorie" class="form-control" id="productCategoryEdit">
                  <!--categorie here -->
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1"
                    > sous categorie <span class="verified"> *</span></label
                  >
                  <select name="souscategorie" class="form-control" id="productSousCategoryEdit">
                  <!--sous categorie here -->
                  
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1"
                    > description <span class="verified"> *</span></label
                  >
                  <textarea name="description" id="iddescriptionEdit" style="width:100%" rows="6"></textarea>
                 
                </div>
              
               
              </div>
                
              </div>

            </div>
            </div> 

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button
                  type="button"
                  class="btn btn-primary"
                  onclick="EditproductValidate()"
                >
                  Validate
                </button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<!--end Modal Edit Selected product ___________________________________________________________________________-->



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
          <h3 class="modal-title red" id="deleteModalLabel"><i class="icon-bin2"></i> Delete Product</h3>
        </div>
        <div class="modal-body">
          <div class="container">
            <h3><i class="icon-question"></i> Are You sure You Want To Delete This Product ?</h3>
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
          <input type="button" class="btn btn-danger" value="Delete" onclick="deleteTheProduct()">
        </div>
      </div>
    </div>
</div>
  <!--end modal delete material  -->


 <!--modal promo product -->
 <div
    class="modal fade"
    id="PromoModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="PromoModal"
    aria-hidden="true"
   >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title red" ><i class="icon-bin2"></i> Promo Product</h3>
        </div>
        <div class="modal-body">
          <div class="container">
            <h3><i class="icon-question"></i> make This Product in promo ?</h3>
            <div class="row">
               <div class="col-md-4">
                 <label for="ancienPrice"
                    > Ancien  Price <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="idancienprice"
                    name="price1"
                    disabled
                    aria-describedby="emailHelp"
                  />
               </div>

               <div class="col-md-4">
                 <label for="newPrice"
                    > New  Price <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="idnewprice"
                    name="price1"
                    aria-describedby="emailHelp"
                  />
               </div>

               <div class="col-md-4">
                 <label for="dure"
                    > Duration <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="idduration"
                    name="price1"
                    aria-describedby="emailHelp"
                  />
               </div>
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
          <input type="button" class="btn btn-danger" value="valider" onclick="PromoProduct()">
        </div>
      </div>
    </div>
</div>
 <!--end modal promo product -->



  <!--modal promo product -->
  <div
    class="modal fade"
    id="pointsModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="pointsModal"
    aria-hidden="true"
   >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title red" ><i class="icon-bin2"></i> Points Product</h3>
        </div>
        <div class="modal-body">
          <div class="container">
            <h3><i class="icon-question"></i> make This Product in points ?</h3>
            <div class="row">
               <div class="col-md-4">
                 <label for="ancienPrice"
                    > Designation <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="designation"
                    name="price1"
                    disabled
                    aria-describedby="emailHelp"
                  />
               </div>

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
          <input type="button" class="btn btn-danger" value="valider" onclick="pointsProduct()">
        </div>
      </div>
    </div>
</div>
 <!--end modal points product -->


 <!--scripts here -->
 <script src="js/products.js"></script>
<?php footer() ?>