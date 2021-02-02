<?php include '../crud/dashboardTemplate.php'?>
<?php 
if(!isset($_SESSION["emailAdmin"]) || $_SESSION["adminState"]!="0")
{
    header("Location:.././");
}
?>
<?php nav() ?>
<div class="container">
  <div class="row">
    <div class="alerts"></div>
  </div>
<div class="row">
<div class="col-md-6">
  <br><br>
 

<label for="Filiere">Select Categorie</label>
<select  class="form-control" id="categorieSelect"></select>
<label for="Filiere">Add Sous Categorie</label>
<input  class="form-control" type="text" name="categorieName" id="idthemesouscategorie">
<button
    type="button"
    class="btn btn-success mt-2 mb-2"
    onclick="AddNewSousCategorie()"
  >
    Validate
</div>


<div class="col-md-6 ">
  <br><br>
  <table class="table table-striped">
    <tbody class="categorieAppend">
     
    </tbody>
  </table>
</div>
</div>

</div>
</div>

 <!--end Main Content ____-->
 <!--scripts here -->
 <script src="js/souscategorie.js"></script>
<?php footer() ?>