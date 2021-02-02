<?php include '../crud/dashboardTemplate.php'?>
<?php 
if(!isset($_SESSION["emailAdmin"]) || $_SESSION["adminState"]!='0')
{
    header("Location:.././");
}
?>
<?php
   nav();
?>
<div class="container">
  <div class="row">
    <div class="alerts"></div>
  </div>
<div class="row">
<div class="col-md-6">
  <br><br>
  <form action="PhpFiles/categorie.service.php" method="post">

<label for="Filiere">Add Categorie</label>
<input  class="form-control" type="text" name="categorieName" id="idthemecategorie">
<button
    type="submit"
    name=""
    class="btn btn-success mt-2 mb-2"
  >
    Validate
</div>
</form>

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
 <script src="js/categorie.js"></script>
<?php footer() ?>