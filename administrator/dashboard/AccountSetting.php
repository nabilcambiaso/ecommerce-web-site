<?php
include '../crud/dashboardTemplate.php';
if($_SESSION["adminState"]!='0'){
    // redirect them to your desired location
    header('location:./index');
    exit;
}
?>
<?php nav(); ?>
<style>
@font-face {
 
  src: url('https://css-tricks.com/examples/RoundButtons/fonts/fontello.eot');
  src: url('https://css-tricks.com/examples/RoundButtons/fonts/fontello.eot?#iefix') format('embedded-opentype'),
       url('https://css-tricks.com/examples/RoundButtons/fonts/fontello.woff') format('woff'),
       url('https://css-tricks.com/examples/RoundButtons/fonts/fontello.ttf') format('truetype'),
       url('https://css-tricks.com/examples/RoundButtons/fonts/fontello.svg#fontello') format('svg');

}

[class*="icon-home"],[class*="icon-cog"],[class*="icon-cw"],[class*="icon-location1"],[class*="icon-Histor"] {
  font-family: 'fontello';
  font-style: normal;
  font-size: 3em;
  speak: none;
}
li{
    font-weight: 700;
}
.icon-home:after { content: "\1F4AC"; } 
.icon-cog:after { content:  "\1F465"; } 
.icon-cw:after { content: "\1F527"; } 
.icon-location1:after { content:"\2B05"; } 
.icon-Histor:after { content:"\1F4D5"; } 
* { 
  -webkit-box-sizing: border-box; 
  -moz-box-sizing:    border-box; 
  box-sizing:         border-box; 
  margin: 0;
  padding: 0;
}
a {
  text-decoration: none;
  color: #DD6C4F;
}

a:hover {
  text-decoration:underline;
}

a:focus { 
  outline: none;
}
.na1 {
  list-style: none;
  text-align: center;
}
.na1 li {
  position: relative;
  display: inline-block;
  margin-right: -4px;
  transition: all .4s ease-in-out;
}

.na1 li:before {
  content: "";
  display: block;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #fff;
  width: 100%;
  height: 1px;
  position: absolute;
  top: 50%;
  z-index: -1;
}

.na1 a {
  transition: all .4s ease-in-out;
}

.na1 a:link, .na1 a:visited {
  display: block;
  background-color: #C4C8CB;
  color: #009879;
  margin: 36px;
  width: 144px;
  height: 144px;
  position: relative;
  text-align: center;
  line-height: 144px;
  border-radius: 50%;
  box-shadow: 0px 10px 22px #aaa, inset 0px 8px 22px #ddd;
  border: solid 1px transparent;
}

.na1 a:before {
  content: "";
  display: block;
  background: #fff;
  border-top: 2px solid #ddd;
  position: absolute;
  top: -18px;
  left: -18px;
  bottom: -18px;
  right: -18px;
  z-index: -1;
  border-radius: 50%;
  box-shadow: inset 0px 8px 48px #ddd;
}

.na1 a:active {
  box-shadow: inset 0px 32px 64px #ddd;
}

.na1 a:hover {
  text-decoration: none;
  color: #555;
  background: #009879;
}<

.na1 a.current {
  box-shadow: inset 0px 32px 64px #ddd;
}


</style>

<style>
 #btnDel {
    display:none;
    position:absolute;
    right:5px
 }
  .tdS,
  .thS {
    font-size: smaller;
    text-align: center;
    justify-content: space-between;
    display:flex;
  }
  #myIcon, input[type='checkbox']  {
     cursor:pointer;
  }
  input[type='checkbox'] {
  border: 1px solid blue;
   }  
</style>
<script>

$(document).ready(function(){
    $("#a1").click(function(){
      $('#table1').hide();
      $('#Settings').hide();
      $('#History').hide();
        $('#table').show();
    });
    $("#a2").click(function(){
      $('#table').hide();
      $('#Settings').hide();
      $('#History').hide();
        $('#table1').show();
    });
    $("#a3").click(function(){
      $('#table').hide();
        $('#table1').hide();
        $('#History').hide();
        $('#Settings').show();

    });

    $("#a4").click(function(){
      $('#table').hide();
        $('#table1').hide();
        $('#Settings').hide();
        $('#History').show();

    });

    $("#Close").click(function(){
      $('#table').hide();
        $('#table1').hide();
        $('#Settings').hide();

    });
 
    
});
function check(input) {
        if (input.value != document.getElementById('PasswordSubscribe').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
<div class="main">
  <!--main here -->
  <div class="row" id="tableid">
      
      <div class="sub-main">
      <ul class="na1">
        <li>Detail Clients<a href="#" id="a1" class="icon-Histor current"></a></li>
        <li>Create Account<a href="#" id="a2" class="icon-cog"></a></li>
        <li>Settings<a href="#" id="a3" class="icon-cw"></a></li>
        <li>Chat<a href="#" id="a4" class="icon-home"></a></li>
        <li>Close<a href="index" class="icon-location1 "></a></li>

    </ul>


<!-- table admins -->
<div style="display:none;" id="table1">
    <button
      type="Button"
      class="btn btn-success btn-small mb-4 "
      data-toggle="modal"
      data-target="#exampleModal"
    >
    <i class="icon-user"></i>
       Add New Account
    </button>
 
    <br><br>
    <table class="table-success" id="example1" style="text-align:center;" >
    <thead>
      <tr>
        <th>Email</th>
        <th>Full Name</th>
        <th>Telephone</th>
        <th>Details</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
  
</div>


<!--chat ---------------------->
<div class="container" id="History">
  <div class="row">
    <div class="col-md-4 clientsNameChat"></div>
    <div class="col-md-1 "></div>
    <div class="col-md-6">
    <div class="row"> 
       <input type="text" class="sendMessage form-control" style="width:100%;">
        <button class="btn btn-info" style="width:100%;" onclick="send()">Send Message</button></div>
      <div class="row chatPlace">
        
      </div>

    </div>
  </div>
</div>


<!-- table admins -->
<div style="display:none;" id="table">

    <br><br>
    <table class="table-success" id="example2" style="text-align:center;" >
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Adresse</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>City</th>
        <th>Delete *</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
  
    </div>




</div>
</div>
</div>

<!-- modals add account -->
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
          <h5 class="modal-title" id="exampleModalLabel">Add New Account *</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- add new Modal *********************-->
        <div class="modal-body">
          <!-- form-->
          <div class="container">
            <form id="contactForm">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1"
                    >First Name <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="UserFNameSubscribe"
                    aria-describedby="emailHelp"
                    required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1"
                    >Last Name <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="UserLNameSubscribe"
                    aria-describedby="emailHelp"
                    required
                  />
                </div>
                </div>
               
                <div class="form-group">
                  <label for="exampleInputEmail1"
                    >Email Adress <span class="verified"> *</span></label
                  >
                  <input
                    type="Email"
                    class="form-control"
                    id="EmailSubscribe"
                    aria-describedby="emailHelp"
                    required
                  />
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword"
                    >Password <span class="verified"> *</span></label
                  >
                  <input
                    type="Password"
                    class="form-control"
                    id="PasswordSubscribe"
                    aria-describedby="emailHelp"
                    required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword"
                    >Confirm Password <span class="verified"> *</span></label
                  >
                  <input
                    type="Password"
                    class="form-control"
                    id="ConfirmPasswordSubscribe"
                    aria-describedby="emailHelp"
                    oninput="check(this)"
                    required
                  />
                </div>
                </div>
            <div class="form-group">
                  <label for="exampleInputhint"
                    >Telephone <span class="verified"> *</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="telephoneSubscribe"
                    aria-describedby="emailHelp"
                    required
                  />
                </div>
                <div class="form-group">
                <input  type="checkbox"  id="livreur">
                <label for="livreur">Livreur</label>

                </div>
              <div class="row">
                <div class="alertAddModal"></div>
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
                  onclick="AddAccount()"  
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
  <!--modal2 User details -->
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
          <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
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
  <!-- modals delete admin -->
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
          <h3 class="modal-title red" id="deleteModalLabel"><i class="icon-bin2"></i> Delete Admin</h3>
        </div>
        <div class="modal-body">
          <div class="container">
            <h3><i class="icon-question"></i> Are You sure You Want To Delete This Admin ?</h3>
            <div class="row">
              <div class="col-md-3"><input type="text" id="deletedUserCode" hidden></div>
              <div class="col-md-6">
                <hr>
                 <h3 id="deletedUserName" ></h3>
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
          <input type="button" class="btn btn-danger" data-dismiss="modal" value="Delete" onclick="DeleteAdmin()">
        </div>
      </div>
    
    </div>
</div>
<!-- end modals -->


  <!-- modals delete user -->
  <div
    class="modal fade"
    id="deleteModalClient"
    tabindex="-1"
    role="dialog"
    aria-labelledby="deleteModalLabel"
    aria-hidden="true"
   >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title red" id="deleteModalLabel"><i class="icon-bin2"></i> Delete Client</h3>
        </div>
        <div class="modal-body">
          <div class="container">
            <h3><i class="icon-question"></i> Are You sure You Want To Delete This Client ?</h3>
            <div class="row">
              <div class="col-md-3"><input type="text" id="deletedUserCodeClient" hidden></div>
              <div class="col-md-6">
                <hr>
                 <h3 id="deletedUserNameClient" ></h3>
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
          <input type="button" class="btn btn-danger" data-dismiss="modal" value="Delete" onclick="DeleteClient()">
        </div>
      </div>
    
    </div>
</div>
<!-- end modals -->


<!-- Settings Admin -->
<div  class="container"id="Settings" style="display:none;">
<h3>Settings*</h3>
<br>

<form >

<div class="form-row">
  
  <div class="form-row">
    <div class="col-md-6 mb-3">
       <label for="">First Name:</label>
      <input type="text" class="form-control" id="FNameAdmin" placeholder="First name">
    </div>
    <div class="col-md-6 mb-3">
    <label for="">Last Name:</label>

      <input type="text" class="form-control"  id="LNameAdmin" placeholder="Last name">
    </div>
  </div>
  <div class="form-row">
  <div class="col-md-12 mb-3">
  <label for="">Email:</label>
      <input type="Email" class="form-control"id="EmailAdmin" placeholder="Email">
  </div>
  <div class="form-row">
  <div class="col-md-6 mb-3">
  <label for="">Old Password:</label>
      <input type="Password" class="form-control" id="PasswordAdmin" placeholder="Old Password" >
 
      <label id="alertForPass"></label>
  </div> 
  <div class="col-md-6 mb-3">
  <label for="">New Password:</label>

  <input type="Password" class="form-control" id="NewPasswordAdmin" minlength="3" placeholder=" New Password">
      
  </div> 
 
 <div style="text-align:center;">
 <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                 id="Close"
                >
                  Close
                </button>
                &nbsp;
                <button
                  type="button"
                  class="btn btn-primary"
                 onclick="ModifyAdmin()"
                >
                  Send
                </button>
 
                
 </div>
 <br>
 <div class="alertAddModal1"></div>

</form>
</div>
</div>
</div>
</div>
<br>

<!-- end Settings--------------------------------------------------- -->
<script src="js/AccountSetting.js"></script>
<script src="js/SettingsAdmin.js"></script>

<?php footer();?>