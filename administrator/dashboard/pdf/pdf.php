<?php
use setasign\Fpdi\Fpdi;

require_once('fpdf/fpdf.php');
require_once('src/autoload.php');
require_once('../../crud/dbConnexion.php');

// user agreement
if(isset($_POST["employeeId"]))
{
    $tab=array();
    $Id=$_POST["employeeId"];
    $date=date("y-m-d");
    $req1=$mysqli->query("select * from  employee_info e join location l on e.location=l.location_id join country c on e.country
    =c.country_code join departement d on d.departement_id=e.department join authentification a on a.UserId=e.line_manager  join assign_material am on e.employee_id=am.employee_id join material m on m.serial_number=am.serial_number
    join assettype ast on m.asset_type=ast.asset_code where e.employee_id='$Id' and e.Archived='0'")
    or die(mysqli_error()) ;
    $ligne=mysqli_fetch_row($req1);

    $name=$ligne[1]." ".$ligne[2];
    $employeeId=$ligne[0];
    $departement=$ligne[24];

  // initiate FPDI
  $pdf = new Fpdi();
  // add a page

  // set the source file
  $pdf->setSourceFile('userAgreement.pdf');

  // import page 1
  $pdf->AddPage();
  $tplIdx = $pdf->importPage(1);
  $pdf->useTemplate($tplIdx, 0, 0, 200);

  // Add 2 page
  $pdf->AddPage();
  $tplIdx2 = $pdf->importPage(2);
  $pdf->useTemplate($tplIdx2 ,0,0,200);
  $pdf->SetAutoPageBreak(true, 5);

  

  // now write employee name above the imported page
   $pdf->SetFont('Helvetica');
   $pdf->SetFontSize(15);
   $pdf->SetTextColor(21,57,68);
   $pdf->SetXY(30, 207);
   $pdf->Write(0, $name);

   // now write employee department above the imported page
   $pdf->SetFont('Helvetica');
   $pdf->SetFontSize(15);
   $pdf->SetTextColor(21,57,68);
   $pdf->SetXY(130, 207);
   $pdf->Write(0, $departement);

      // now write employee number above the imported page
   $pdf->SetFont('Helvetica');
   $pdf->SetFontSize(15);
   $pdf->SetTextColor(21,57,68);
   $pdf->SetXY(98, 207);
   $pdf->Write(0, $employeeId);
   $date=date("y-m-d");

     // now write date above the imported page
     $pdf->SetFont('Helvetica');
     $pdf->SetFontSize(15);
     $pdf->SetTextColor(21,57,68);
     $pdf->SetXY(124, 223.5);
     $pdf->Write(0, $date);
     $date=date("y-m-d");



   $name="UserAgrement ".$name.".pdf";
   $pdf->Output('',$name,'');

}




//undertaking note
if(isset($_POST["id"]))
{
    $tab=array();
    $Id=$_POST["id"];
    $req1=$mysqli->query("select * from  employee_info e join location l on e.location=l.location_id join country c on e.country
    =c.country_code join departement d on d.departement_id=e.department join authentification a on a.UserId=e.line_manager  join assign_material am on e.employee_id=am.employee_id join material m on m.serial_number=am.serial_number
    join assettype ast on m.asset_type=ast.asset_code where am.assign_id='$Id' and e.Archived='0'")
    or die(mysqli_error())
    ;
    $ligne=mysqli_fetch_row($req1);
    

   // var_dump($ligne);

    $employeeId=$ligne[0];
    $name=$ligne[1]." ".$ligne[2];
    $assettype=$ligne[66];
    $modelName=$ligne[36];
    $condition1=$ligne[37];
    $serial=$ligne[35];
    $opSystem=$ligne[42];
    $antivirus=$ligne[43];
    $adobeReader=$ligne[44];
    $domainLocal=$ligne[45];
    $zip=$ligne[46];
    $firewall=$ligne[47];
    $sap=$ligne[48];
    $printers=$ligne[49];
    $encryption=$ligne[50];
    $vpn=$ligne[51];
    $unauthorizedSoftware=$ligne[52];
    $adminRights=$ligne[53];
    $assetTag=$ligne[54];
    $date=$ligne[38];
    $departement=$ligne[24];
    $installedBy=$ligne[39];




// initiate FPDI
$pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('undertakinNote.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 200 mm
$pdf->useTemplate($tplIdx, 0, 0, 200);



// now write employee name above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(60, 28);
$pdf->Write(0, $name);

// now write employee department above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(120, 28);
$pdf->Write(0, $departement);



// now write asset type above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 40.5);
$pdf->Write(0, $assettype);

// now write serial number above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 44.8);
$pdf->Write(0, $serial);

// now write model name  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 49.1);
$pdf->Write(0, $modelName);

// now write asset condition  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 53);
$pdf->Write(0, $condition1);

// now write operating system  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 57.4);
$pdf->Write(0, $opSystem);

// now write Antivirus  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 60.8);
$pdf->Write(0, $antivirus);


// now write adobe reader  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 64.6);
$pdf->Write(0, $adobeReader);

// now write domain local  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 68.7);
$pdf->Write(0, $domainLocal);

// now write 7zip  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 72.8);
$pdf->Write(0, $zip);

// now write firewall  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 77);
$pdf->Write(0, $firewall);

// now write sap gui  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 81.2);
$pdf->Write(0, $sap);

// now write printers  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 85.4);
$pdf->Write(0, $printers);


// now write encryption  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 89.8);
$pdf->Write(0, $encryption);


// now write vpn  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 94);
$pdf->Write(0, $vpn);


// now write removed all software  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 98.2);
$pdf->Write(0, $unauthorizedSoftware);


// now write admin rights  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 102.4);
$pdf->Write(0, $adminRights);

// now write asset tag  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 106.3);
$pdf->Write(0, $assetTag);

// now write handover istall date  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 114.3);
$pdf->Write(0, $date);

// now write istalled by   above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 118.5);
$pdf->Write(0, $installedBy);

// now write employee name  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 122.7);
$pdf->Write(0, $name);

// now write employee id  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 126.9);
$pdf->Write(0, $employeeId);

// now write employee department  above the imported page
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(7);
$pdf->SetTextColor(21,57,68);
$pdf->SetXY(140, 130.5);
$pdf->Write(0, $departement);









$pdf->Output('',$name.' Undertaking Note.pdf','');
}