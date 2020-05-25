<?php
session_start();
require_once('../lib/connect.inc.php');
require_once('../lib/lib.inc.php');



# Учет времени
if (isset($_POST['AddTab'])) {

  
  $IdTarif = $_POST['IdTarif'];

  $IDR = $_POST['IDR'];
  $item = $_POST['item'];
 $Mark = $_POST['Mark'];
 $DateRep = $_POST['DateRep'];
$koment = $_POST['koment'];
//$mountt = $_POST['mountt'];

  if ($IDR == ""){

 $sqlAddReport = "INSERT INTO reportusers (IdUsers,DateRep,Mark,idTarif,koment) VALUES ('$item','$DateRep','$Mark','$IdTarif','$koment')";

  } else{

 $sqlAddReport = "UPDATE reportusers SET Mark = '".$Mark."' WHERE id = '".$IDR."'";

  }



$resultAddReport = $connectionPDO -> exec($sqlAddReport) or die('Ошибка при выполнении запроса');

  include('../tabele.php');
}



# Ввод Тарифа
if (isset($_POST['AddTarif'])) {

 $TarifDatNach = $_POST['TarifDatNach'];
 $TarifDatCon = $_POST['TarifDatCon'];
 $IdDlj = $_POST['IdDlj'];
  $tarif = $_POST['tarif_summ'];
  /* $textPlanesEdit = $_POST['textPlanesEdit'];*/


$sqlAddTarif = "INSERT INTO tarif (TarifDatNach,TarifDatCon,IdDlj,tarif) VALUES ('$TarifDatNach','$TarifDatCon',' $IdDlj',' $tarif')";

$resultAddTarif = $connectionPDO -> exec($sqlAddTarif) or die('Ошибка при выполнении запроса');

include('../tarif.php');
  
}


# Изменение Тарифа
if (isset($_POST['ETarif'])) {

 $EditTarifDatCon = $_POST['EditTarifDatCon'];
 $idtarrif = $_POST['idtarrif'];
  /* $textPlanesEdit = $_POST['textPlanesEdit'];*/


$sqlEditTarif = "UPDATE tarif SET TarifDatCon='".$EditTarifDatCon."' WHERE id = '".$idtarrif."' ";

$resultEditTarif = $connectionPDO -> exec($sqlEditTarif) or die('Ошибка при выполнении запроса');

include('../tarif.php');

}