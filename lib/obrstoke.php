<?php
require_once('../lib/connect.inc.php');
require_once('../lib/lib.inc.php');
session_start();
# Добавление проекта

if (isset($_POST['AddStock'])) {


  $NameStockAdd = $_POST['NameStockAdd'];
    $CompanyStockAdd = $_POST['CompanyStockAdd'];

 $SearchCompany = "SELECT * FROM company WHERE nameCompany LIKE('".$CompanyStockAdd."')";
$result_search_company = $connectionPDO -> query($SearchCompany) or die("Ошибка при поиске компании");  

  if ($result_search_company -> fetch()['nameCompany'] != $CompanyStockAdd ) {
      $Company_add = "INSERT INTO company (nameCompany) VALUES ('$CompanyStockAdd')";
     $resultAdd_company = $connectionPDO -> exec($Company_add) or die('Ошибка при выполнении запроса добавления компании');
   }


$SearchCompanyID = "SELECT id FROM company WHERE nameCompany LIKE('".$CompanyStockAdd."')";
$result_search_company_id = $connectionPDO -> query($SearchCompanyID) or die("Ошибка при поиске ID компании");  
   //$Hel =  "INSERT INTO Stock (name,companyId, status) VALUES ('$NameStockAdd', '$CompanyStockAdd ', '1')";

 $project_add = "INSERT INTO stock (name,companyId, dataNach, status) 
VALUES ('$NameStockAdd', '".$result_search_company_id ->fetch()['id']."', '".date('Y-m-d')."','1')";


	//$AddTextDlj = $_POST['AddTextDlj'];
	//$sqlAddDlj = "INSERT INTO dlj (dljName) VALUES ('$AddTextDlj')";
	$resultAdd_project = $connectionPDO -> exec($project_add) or die('Ошибка при выполнении запроса добавлении');
	//echo "$AddTextDlj Должность добавлена";
	include('../addstock.php');

}


if (isset($_POST['select_state'])) {

$select_state = $_POST['select_state'];
 //$EditTextDlj = $_POST['EditTextDlj'];



	include('../inst.php');

}

if (isset($_POST['select_stok'])) {

$select_stok = $_POST['select_stok'];
 //$EditTextDlj = $_POST['EditTextDlj'];



	include('../addstock.php');

}


if (isset($_POST['CloseStock'])) {

   $IdStok = $_POST['IdStok'];
 $sql_close_stock = "UPDATE stock SET status = 2 WHERE id = ".$IdStok."";
 $result_close_stock = $connectionPDO -> exec($sql_close_stock) or die('Ошибка при выполнении закрытия проекта');

  include('../addstock.php');

}


if (isset($_POST['EditStock'])) {

    
   $IdStok = $_POST['IdStok'];
   $NameRecStok = $_POST['NameRecStok'];
   $EdIzmStockRec = $_POST['EdIzmStockRec'];
   $KolVoStockRec = $_POST['KolVoStockRec'];


   $sql_add_recstok = "INSERT INTO recstok (idStok,nameStok,edIzm,kolvo) VALUES ('$IdStok','$NameRecStok','$EdIzmStockRec','$KolVoStockRec')";

 $result_add_recstok = $connectionPDO -> exec($sql_add_recstok) or die('Ошибка при выполнении закрытия проекта');
  include('../addstock.php');

}


if (isset($_POST['EditInstVz'])) {

 // $DatV = date('Y-m-d');
  // $ModelInstAdd = $_POST['ModelInstAdd'];
 // $IdUserInstEdit = $_POST['IdUserInstEdit'];
      $StateInstEditVz = $_POST['StateInstEditVz'];
   $IdInstr = $_POST['IdInstr'];
  // $idRI = $_POST['idRI'];
  
   
 //$sql_insrt =  ("UPDATE instrument SET IdState = '".$StateInstEditVz."' WHERE id = '".$IdInstr."'");
 $sql_reinsrt = ("UPDATE instrument SET IdState = '".$StateInstEditVz."' WHERE id = '".$IdInstr."'");
//$result_insrt = $connectionPDO -> exec($sql_insrt) or die('Ошибка при возврате инструмента');
$result_reinsrt = $connectionPDO -> exec($sql_reinsrt) or die('Ошибка при возврате инструмента отчет');
  //SQLResultAdd("INSERT INTO recinstrument (IdUser,IdInstrument,DatV) VALUES ('$IdUserInstEdit','$IdInstr','$DatV')");

  include('../inst.php');
}


if (isset($_POST['EditInstSpis'])) {

   $IdInstr = $_POST['IdInstr'];
 
   
   SQLResultAdd("UPDATE instrument SET IdState = 4, DataS = '".date("Y-m-d")."' WHERE id = '".$IdInstr."'");
  // SQLResultAdd("UPDATE recinstrument SET DatRem = '".date('Y-m-d')."', txt = '".$txt."', summ = '".$SummInstEdit."'  WHERE id = '".$idRI."'");
  //SQLResultAdd("INSERT INTO recinstrument (IdUser,IdInstrument,DatV) VALUES ('$IdUserInstEdit','$IdInstr','$DatV')");
include('../inst.php');
  
}


if (isset($_POST['EditInstRem'])) {

 // $DatV = date('Y-m-d');
  // $ModelInstAdd = $_POST['ModelInstAdd'];
 // $IdUserInstEdit = $_POST['IdUserInstEdit'];
      $StateInstEditVz = $_POST['StateInstEditVz'];
   $IdInstr = $_POST['IdInstr'];
   $idRI = $_POST['idRI'];
   $txt = $_POST['txt'];
   $SummInstEdit = $_POST['SummInstEdit'];
  
   
   SQLResultAdd("UPDATE instrument SET IdState = 1 WHERE id = '".$IdInstr."'");
   SQLResultAdd("UPDATE recinstrument SET DatRem = '".date('Y-m-d')."', txt = '".$txt."', summ = '".$SummInstEdit."'  WHERE id = '".$idRI."'");
 include('../inst.php');
  
}

if (isset($_POST['EditInst'])) {

  $IdInstr = $_POST['IdInstr'];
  $datInst = $_POST['datInst'];

  $polomInst = $_POST['polomInst'];
  $prichInst = $_POST['prichInst'];
  $summremInst = $_POST['summremInst'];
  $comentInst = $_POST['comentInst'];

$item = 0;
foreach ($datInst as $key => $value) {

$sql_add_mater = "INSERT INTO recinstrument (IdInstrument,summ,txt,DatV,polom,prich) 
   VALUES ('".$IdInstr."','".$summremInst[$item]."','".$comentInst[$item]."','".$value."','".$polomInst[$item]."','".$prichInst[$item]."')";
   $result_add_mater = $connectionPDO -> query($sql_add_mater) or die('Ошибка при добавлении проекта');
$item++;
}


//SQLResultAdd("UPDATE instrument SET IdState = '".$StateId."' WHERE id = '".$IdInstr."'");

  
  //SQLResultAdd("UPDATE instrument SET IdState = '".$StateId."' WHERE id = '".$IdInstr."'");
  //SQLResultAdd("INSERT INTO recinstrument (IdUser,IdInstrument,DatV) VALUES ('$IdUserInstEdit','$IdInstr','$DatV')");
   include('../inst.php');
}

if (isset($_POST['search_project'])) {

  $search_project = $_POST['search_project'];
 //$sql_close_stock = "UPDATE stock SET status = 2 WHERE id = ".$IdStok."";
 //$result_close_stock = $connectionPDO -> exec($sql_close_stock) or die('Ошибка при выполнении закрытия проекта');

  include('../addstock.php');

}



if (isset($_POST['newwork'])) {

/* $add_work_norm = $_POST['addnameproject'];
 $add_users_work = $_POST['add_users_work'];
 $add_mesto_work = $_POST['add_mesto_work'];
 $add_timeK_work = $_POST['add_timeK_work'];
 $add_timeN_work = $_POST['add_timeN_work'];
 $add_dat_work = $_POST['ddd_dat_work'];*/

 $add_dat_work = $_POST['add_dat_work'];
 $add_timeN_work = $_POST['add_timeN_work'];
 $add_timeK_work = $_POST['add_timeK_work'];
 $add_mesto_work = $_POST['add_mesto_work'];
 $addnamework = $_POST['addnamework'];
 $addobjectwork = $_POST['addobjectwork'];
 $add_name_work = $_POST['add_name_work'];
 $add_work_norm = $_POST['add_work_norm'];
$add_works_comment = $_POST['add_works_comment'];


 $idusers = explode(",", $_POST['idusers']);
 $idinstr = explode(",", $_POST['idinstr']);
  
 

 $sql_add_works = "INSERT INTO works (idproject,mesto,dat,timeN,timeK,namework,norma,workscoment) VALUES ('".$addobjectwork."','".$add_mesto_work."','".$add_dat_work."','".$add_timeN_work."','".$add_timeK_work."','".$add_name_work."','".$add_work_norm."','".$add_works_comment."')";
$result_add_works = $connectionPDO -> query($sql_add_works) or die('Ошибка при добавлении проекта');

$last_works_id = $connectionPDO -> LastInsertId();

 foreach ($idusers as $keyusers => $valueusers) {
  if ($valueusers != 0){
   $sql_add_work_user = "INSERT INTO worksuser (idworks,iduser) VALUES ('".$last_works_id."','".$valueusers."')";
   $result_add_work_user = $connectionPDO -> query($sql_add_work_user) or die('Ошибка при добавлении проекта');
  }
  
  }

   foreach ($idinstr as $keyinstr => $valueinstr) {
  if ($valueinstr != 0){
   $sql_add_work_instr = "INSERT INTO worksinstr (idobj,idinstr) VALUES ('".$last_works_id."','".$valueinstr."')";
   $result_add_work_instr = $connectionPDO -> query($sql_add_work_instr) or die('Ошибка при добавлении проекта');
  }

  
  }
  

  include('../work.php');

}

if (isset($_POST['beditwork'])) {

  $beditwork = $_POST['beditwork'];
  $idworkedit = $_POST['idworkedit']; 
  $edit_timeN_work = $_POST['edit_timeN_work'];
  $edit_timeK_work = $_POST['edit_timeK_work'];
  $edit_works_fakt = $_POST['edit_works_fakt'];
  $edit_works_comment = $_POST['edit_works_comment'];

  $edit_name_work = $_POST['edit_name_work'];
  $edit_mesto_work = $_POST['edit_mesto_work'];


  if ($edit_works_fakt != NULL AND $edit_works_fakt != " ") {
    $status = 1;
  } else {
    $status = 0;
  }

  // $status = 1;

  $sql_work_edit = "UPDATE works SET namework = '".$edit_name_work."', mesto = '".$edit_mesto_work."', timeN = '".$edit_timeN_work."', timeK = '".$edit_timeK_work."',workscoment = '".$edit_works_comment."', worksfakt = '".$edit_works_fakt."' , status = '".$status."' WHERE id = '".$idworkedit."'";

   $result_work_edit = $connectionPDO -> query($sql_work_edit) or die('Ошибка при добавлении проекта');


 include('../work.php');
}

if (isset($_POST['delwork'])) {

  $iddelworkedit = $_POST['iddelworkedit'];
 

    $sql_work_del = "DELETE FROM works WHERE id= '".$iddelworkedit."'";

   $result_work_del = $connectionPDO -> query($sql_work_del) or die('Ошибка при добавлении проекта');


 include('../work.php');
}


if (isset($_POST['newstock'])) {

$worksstock = $_POST['worksstock'];

$adddatstock = $_POST['adddatstock'];
$addstockwork = $_POST['addstockwork'];



  $sql_select_stock = "SELECT COUNT(*) AS record, id FROM recstok WHERE idStok = '".$addstockwork."' AND datN = '".$adddatstock."'";
   $result_select_stock = $connectionPDO -> query($sql_select_stock) or die('Ошибка при добавлении проекта');
    $rest = $result_select_stock->fetch();
    
    if ($rest['record'] == 0){

      $sql_add_stock = "INSERT INTO recstok (idStok,datN) VALUES ('".$addstockwork."','".$adddatstock."')";
   $result_add_stock = $connectionPDO -> query($sql_add_stock) or die('Ошибка при добавлении проекта');

    $last_works_id = $connectionPDO -> LastInsertId();
    $sql_add_stock = "INSERT INTO namestok (idrecstok,name) VALUES ('".$last_works_id."','".$worksstock."')";
   $result_add_stock = $connectionPDO -> query($sql_add_stock) or die('Ошибка при добавлении проекта');

    } else {

    $sql_add_stock = "INSERT INTO namestok (idrecstok,name) VALUES ('".$rest['id']."','".$worksstock."')";
   $result_add_stock = $connectionPDO -> query($sql_add_stock) or die('Ошибка при добавлении проекта');
    }
   



   



  //}
  
  //}


 include('../addstock.php');
}

if (isset($_POST['newmater'])) {

$IdMat = $_POST['IdMat']; 
$datMat = $_POST['datMat'];
$nameMat = $_POST['nameMat'];
$edizm = $_POST['edizm'];
$kolvo = $_POST['kolvo'];
$summ = $_POST['summ'];
$coment = $_POST['coment'];

//$item = count($datMat);
$item = 0;
foreach ($datMat as $key => $value) {

$sql_add_mater = "INSERT INTO recstokmater (idrecstok,name,edizm,kolvo,summ,koment,dat) 
   VALUES ('".$IdMat."','".$nameMat[$item]."','".$edizm[$item]."','".$kolvo[$item]."','".$summ[$item]."','".$coment[$item]."','".$value."')";
   $result_add_mater = $connectionPDO -> query($sql_add_mater) or die('Ошибка при добавлении проекта');
$item++;
}






//$file_data = $_FILES['file_data'];
//$fileTmpName = $_FILES['file_data']['tmp_name'];


   /*$sql_add_mater = "INSERT INTO recstokmater (idrecstok,name,edizm,kolvo,summ,koment,dat) 
   VALUES ('".$id_add_mater."','".$name_add_mater."','".$edizm_add_mater."','".$kolvo_add_mater."','".$summ_add_mater."','".$komen_add_mater."','".$dat_add_mater."')";
   $result_add_mater = $connectionPDO -> query($sql_add_mater) or die('Ошибка при добавлении проекта');*/
/*
$put = "../stockfiles/";
$idfolder = $connectionPDO -> LastInsertId();
$fileZ = $put.$idfolder;
mkdir($fileZ);*/

    //if ( 0 < $_FILES['file']['error'] ) {
      //  echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    //}
    //else {
        //move_uploaded_file($_FILES['file']['tmp_name'], $fileZ.'/'.$_FILES['file']['name']);
    //}
 
 //$extFileName = $_FILES['file']['name'];
//  move_uploaded_file($_FILES['file']['tmp_name'], $fileZ.'/'.strreplace($extFileName));


//move_uploaded_file($_FILES['file_data']['tmp_name'], $fileZ. $_FILES['file_data']['name']);
//move_uploaded_file($fileTmpName, $fileZ);

//move_uploaded_file($_FILES['file_add_mater']['tmp_name'], $fileZ.'/'.strreplace($_FILES['file_add_mater']['name']));

 include('../addstock.php');

}



if (isset($_POST['select_mount_stock'])) {

$mount_stock = $_POST['select_mount_stock'];
 //$EditTextDlj = $_POST['EditTextDlj'];

 $mount_stock;

  include('../addstock.php');

}

if (isset($_POST['select_year_stock'])) {

$year_stock = $_POST['select_year_stock'];
//$mount_stock = $_POST['select_mount_stock'];
 //$EditTextDlj = $_POST['EditTextDlj'];
$mount_stock = $_POST['select_mount_stock_year'];
$mount_stock;
 $year_stock;


  include('../addstock.php');

}

if (isset($_POST['edit_coment_works'])) {

  $edit_coment_text = $_POST['edit_coment_text'];
  $idworkcomentm = $_POST['idworkcomentm'];
  $idworkcomenty = $_POST['idworkcomenty'];

  $select_works_coment = "SELECT * FROM workscoment WHERE datM = '".$idworkcomentm."' AND datY = '".$idworkcomenty."'";
      $result_works_coment = $connectionPDO -> query($select_works_coment);
        $comments_works = $result_works_coment->fetch();

        if ($comments_works['id'] == 0){
          $sql_works_coment_add = "INSERT INTO workscoment (datM,datY,coment) 
          VALUES ('".$idworkcomentm."','".$idworkcomenty."','".$edit_coment_text."')";
          $result_works_coment_add = $connectionPDO -> query($sql_works_coment_add) or die('Ошибка при добавлении coment');
       } else {

         $sql_work_edit = "UPDATE workscoment SET coment = '".$edit_coment_text."' WHERE id = '".$comments_works['id']."'";
         $result_work_edit = $connectionPDO -> query($sql_work_edit) or die('Ошибка при добавлении проекта');
       }
  
  /*$sql_work_edit = "UPDATE works SET workscoment = '".$edit_coment_text."' WHERE id = '".$idworkedit."'";

   $result_work_edit = $connectionPDO -> query($sql_work_edit) or die('Ошибка при добавлении проекта');*/


include('../workMobjtable.php');
 //include('../work.php');
}



if (isset($_POST['AddInst'])) {

     $NameInstAdd = $_POST['NameInstAdd'];
   $ModelInstAdd = $_POST['ModelInstAdd'];
   $DatInstAdd = $_POST['DatInstAdd'];
   $SNInstAdd = $_POST['SNInstAdd'];
   $SummInstAdd = $_POST['SummInstAdd'];

  SQLResultAdd("INSERT INTO instrument (Name, Model, SN, DatP,summ,IdState) 
VALUES ('".$NameInstAdd."', '".$ModelInstAdd ."', '".$SNInstAdd."','".$DatInstAdd."','".$SummInstAdd."','1')");

include('../inst.php');

  
}

if (isset($_POST['dcch']) OR isset($_POST['dnch']) ) {

     $dcch = $_POST['dcch'];
     $dnch = $_POST['dnch'];

include('../work.php');

}


  if (isset($_POST['SearchInst']) AND isset($_POST['SearchInst']) != "" ) {
$Search = $_POST['SearchInst'];

if (!$Search == " ") {
    $sql_instrument = "SELECT inst.id AS INSTID, inst.Name, inst.Model, inst.DatP, inst.SN, inst.IdState, inst.summ, state.id, state.name FROM instrument AS inst
  INNER JOIN state 
  ON  inst.IdState = state.id
  ";
}else{

  $sql_instrument = "SELECT inst.id AS IDNST, inst.Name, inst.Model, inst.DatP, inst.SN, inst.IdState, inst.summ, state.id, state.name FROM instrument AS inst
  INNER JOIN state 
  ON  inst.IdState = state.id
  WHERE inst.Name LIKE('%".$_POST['SearchInst']."%')
  ";


}
include('../inst.php');
}


