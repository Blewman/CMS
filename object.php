<style type="text/css">
  .selectpicker{
    float: left; 
    width: 100%;
    text-align: center;
    color: #ffffff;
    border-radius: 0px;
    background: #b69e40;
    border: none;
    text-transform: uppercase;
    font-size: 14px;
    margin-top: 10px;
    padding: 13px;}
</style>

<script type="text/javascript">
  $(document).ready(function() {
    $('#selobj').on('change', function() {
      this.formselobjects.submit();
    });
  });
</script>



<div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
  <div class="templatemo_form">
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addproject">Новый объект</button>
  </div>
</div>

  
    
<div class="col-lg-3 col-sm-3 col-md-12 col-xs-12" style="padding-left: 40px;">
  <div class="templatemo_form" >
    <form action="" method="POST" id="formselobjects">
      <select class="selectpicker" name="selobj" id="selobj" onchange="this.form.submit('#formselobjects');return true;">
        <option value="0">Активные</option>
        <option value="1">Завершенные</option>
        <option value="2">Все</option>
      </select>
    </form>
  </div>
</div>
<?php

 # Выбор статуса объекта
switch ($_POST['selobj']) {
  case 2: $sql_select_object = "SELECT s.id AS sid, s.name AS sname, s.companyId, s.address, s.dataNach , s.dataCon, s.koment FROM stock AS s";
       ?>
        <script type="text/javascript">
          $("#selobj :contains('Все')").attr("selected", "selected");
        </script>
    <?php
          break;
  case 1: $sql_select_object = "SELECT s.id AS sid, s.name AS sname, s.companyId, s.address, s.dataNach , s.dataCon, s.koment FROM stock AS s WHERE status = '1' ";
    ?>  
        <script type="text/javascript">
           $("#selobj :contains('Завершенные')").attr("selected", "selected");
        </script>
    <?php
      break;
  case 2: 
      break;
  default:  $sql_select_object = "SELECT s.id AS sid, s.name AS sname, s.companyId, s.address, s.dataNach , s.dataCon, s.koment FROM stock AS s WHERE status = '0'";
    ?>
        <script type="text/javascript">
          $("#selobj :contains('Активные')").attr("selected", "selected");
        </script>
    <?php
  }

?>


<div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
  <div class="templatemo_form">
    <form method="POST" >
    <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#export" name="export">Выгрузить</button>
    <input type="hidden" name="sqlobject" value="<?=$sql_select_object?>">
  </form>
  </div>
</div>


<?php

            #Удаление файла
if (isset($_POST['delobjectfiles'])) {
  $delobjectfiles = $_POST['delobjectfiles'];
  unlink($delobjectfiles);
  ?>
  <script type="text/javascript">
    alert("Файл удален");
  </script>
  <?php
}

       

$result_select_object = $connectionPDO -> query($sql_select_object );
//$count_num = $result_select_object->fetchAll();
//var_dump($count_num); 
//echo $count_num[0]['sname'];


?>

<table class="table table-responsive">
    <thead>
    	 <th>№</th><th>Наименование и адрес объекта</th><th>Наименование организации Заказчика</th><th>Наименование работ, выполняемых на объекте</th><th>Срок выполнения работ </th><th>Контактные данные руководителей</th><th width="200">Файлы</th><th>Примечание</th>
    </thead>
   <tbody>

      <?php
        foreach ($result_select_object as $keyobject => $valueobject) {

      ?>
        <tr>
          <td data-toggle="modal" data-target="#editstatusbject<?=$valueobject['sid']?>"><?=$valueobject['sid']?></td>
          <td data-toggle="modal" data-target="#editnameobject<?=$valueobject['sid']?>"><?=$valueobject['sname']?>, <?=$valueobject['address']?></td>
          <td data-toggle="modal" data-target="#editcompanyobject<?=$valueobject['sid']?>"><?=$valueobject['companyId']?></td>
          <td data-toggle="modal" data-target="#editworksobject<?=$valueobject['sid']?>"><?php 
          
        $sql_select_work = "SELECT name FROM work WHERE idobj = '".$valueobject['sid']."'";
        $result_select_work = $connectionPDO -> query($sql_select_work);
        $count_field = $result_select_work->rowCount();
        $i = 1;
        foreach ($result_select_work as $keywork => $valuework) {
            echo $i++.'.';
            echo $valuework['name'];
            echo "<br>";
           
          }
          ?>
          </td>
          <td data-toggle="modal" data-target="#editdateobject<?=$valueobject['sid']?>">С <?=$valueobject['dataNach']?> по <?=$valueobject['dataCon']?> </td>
          <td data-toggle="modal" data-target="#editcontactobject<?=$valueobject['sid']?>"><?php 
          
        $sql_select_contact = "SELECT name FROM contact WHERE idobj = '".$valueobject['sid']."'";
        $result_select_contact = $connectionPDO -> query($sql_select_contact);
        $count_field = $result_select_contact->rowCount();
        $i = 1;
        foreach ($result_select_contact as $keycontact => $valuecontact) {
            echo $i++.'.';
            echo $valuecontact['name'];
            echo "<br>";
           
          }
        

          ?>  
          </td>
          <td>
     <?php 
        $put = 'objectfiles/';
        $NfilesObj = @scandir('objectfiles/'.$valueobject['sid']);
        foreach ($NfilesObj as $keyNfilesObj => $valueNfilesObj) {
          $itemImg = $keyNfilesObj.$valueobject['sid'];
          if ($valueNfilesObj != '..' AND $valueNfilesObj != '.' ) {
        ?>
   
          <div class="dropdown col-xs-3">
             <i class="<?=fa_icon_typefile(getExtension1($valueNfilesObj))?> fa-2x btn btn-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true" title="<?=pathinfo($valueNfilesObj,PATHINFO_FILENAME);?>"> </i><?=substr(pathinfo($valueNfilesObj,PATHINFO_FILENAME), 0, 7);?>
             <ul class="dropdown-menu" aria-labelledby="dropdownMenu1"> 
        <li><button class="btn btn-link" ><a href="<?=$put.$valueobject['sid'].'/'.$valueNfilesObj?>" download>Скачать</a></button></li>
        <li>
            <form method="POST">
            <button class="btn btn-link" name="delfilesobj">Удаляем</button>
            <input type="hidden" name="delobjectfiles" value="<?=$put.$valueobject['sid'].'/'.$valueNfilesObj?>">
          </form>

          
        
        </li>
       
      </ul>
    </div>

      <?php
        
        }
        if ($keyNfilesObj == 1){
        ?>
        <div class="dropdown col-xs-4">
       <i class="dropdown-toggle fa fa-plus-square fa-2x btn btn-link" id="dropdownMenu1" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="true" aria-hidden="true"></i>Добавить
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a data-toggle="modal" data-target="#edit_file_object<?=$valueobject['sid']?>">Добавить файлы</a></li>
      </ul>
    </div>
        <?php
      }
      }


    
  ?>

<!--Добавление файлов-->
  <div class="modal" id='edit_file_object<?=$valueobject['sid']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="col-md-5 col-lg-12">
            <form  enctype="multipart/form-data" role="form" method="POST">
             <div class="templatemo_form">
                <input name="FilesObject[]" type="file" class="form-control" id="fullname" placeholder="Должность" maxlength="40" multiple>
                <input type="hidden" name="item" value="<?=$valueobject['sid']?>">  </div>
              <div class="templatemo_form"><button type="submit" class="btn btn-primary" name="EditFileObject" >Добавить</button></div>
            </form>        
        </div>
      </div>
    </div>
  </div>
      </td>
    <td data-toggle="modal" data-target="#editcomentobject<?=$valueobject['sid']?>"><?=$valueobject['koment']?></td>
  </tr>  



<!-- Редактируем состояние проекта-->

<div class="modal" id="editstatusbject<?=$valueobject['sid']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">       
      <div class="modal-body">
          <div class="col-sx-12 col-md-12 col-lg-12">
              <form id="" method="POST" enctype="multipart/form-data">
                <div class="col-sx-12 col-md-12 col-lg-12">
                  <div class="templatemo_form">
                    <input type="text" name="" value="<?=$valueobject['sname']?>">
                    <input type="hidden" name="idobjectstatus" value="<?=$valueobject['sid']?>">
                  </div>
                </div>
                <div class="col-sx-12 col-md-12 col-lg-12">
                  <div class="templatemo_form">
                    <input type="text" name="" value="<?=$valueobject['address']?>">
                  </div>
                </div>
                <div class="col-sx-12 col-md-12 col-lg-12">
                  <div class="templatemo_form">
                    <input type="text" name="" value="<?=$valueobject['companyId']?>">
                  </div>
                </div>
                <div class="col-sx-12 col-md-12 col-lg-12">       
                    <div class="templatemo_form">
                      <button type="submit" class="btn btn-primary" id="bestatus" name="bestatus">Завершить</button>
                    </div>
                 </div>
               </form>  
          </div>
      </div>
    </div>
  </div>     

<!-- Редактируем наименование проекта-->

<div class="modal" id="editnameobject<?=$valueobject['sid']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
                
               <div class="modal-body">
          
            <div class="col-sx-12 col-md-12 col-lg-12">
              <form id="" method="POST" enctype="multipart/form-data">
                <div class="col-sx-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  <input type="text" name="iename" value="<?=$valueobject['sname']?>">
                  <input type="hidden" name="idobject" value="<?=$valueobject['sid']?>">
                </div>
            </div>
            <div class="col-sx-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  <input type="text" name="ieaddress" value="<?=$valueobject['address']?>">
                </div>
            </div>
            <div class="col-sx-12 col-md-12 col-lg-12">       
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" id="bename" name="bename">Изменить</button>
                </div>
   
            </div>
          </form>  

        </div>
      </div>
    </div>
  </div>
<!-- Редактируем наименование заказчика-->
<div class="modal" id='editcompanyobject<?=$valueobject['sid']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
                
            <!--<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->

             <div class="modal-body">
          
            <div class="col-sx-12 col-md-12 col-lg-12">
              <form id="forms" method="POST" enctype="multipart/form-data">
                <div class="col-sx-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  <input type="text" name="iecompany" value="<?=$valueobject['companyId']?>">
                  <input type="hidden" name="idobject" value="<?=$valueobject['sid']?>">
                </div>
            </div>
                        <div class="col-sx-12 col-md-12 col-lg-12">       
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" id="becompany" name="becompany">Изменить</button>
                </div>
   
            </div>
          </form>  
        </div>
      </div>
    </div>
  </div>
<!-- Редактируем наименование проводимых работ и производим их добавление-->
<div class="modal" id='editworksobject<?=$valueobject['sid']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
                
            <!--<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->

             <div class="modal-body">
          
            <div class="col-sx-12 col-md-12 col-lg-12">
              <form id="formworks" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="workssid" value="<?=$valueobject['sid']?>">
                <?php

                 $sql_select_work = "SELECT * FROM work WHERE idobj = '".$valueobject['sid']."'";
        $result_select_work = $connectionPDO -> query($sql_select_work);

                  foreach ($result_select_work as $keywork2 => $valuework2) {
                   // echo "$valuework2";
                  
                ?>
                <div class="col-sx-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  
                  <input type="hidden" name="ienameworkid[]" value="<?=$valuework2['id']?>">
                  <input type="text" name="ienamework[]" value="<?=$valuework2['name']?>">
                </div>
            </div>
            <?php
              }
            ?>
            <div class="col-sx-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  
                  <input type="text" name="ienameworkadd" placeholder="Новая работа">
                </div>
            </div>

              <div class="col-sx-12 col-md-12 col-lg-12">       
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" id="beworks" name="beworks">Изменить</button>
                </div>
              </div>
   
          </form>  
        </div>
      </div>
    </div>
  </div>
<!-- Редактируем срок выполнения работ-->
<div class="modal" id='editdateobject<?=$valueobject['sid']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
                
             <div class="modal-body">
          
            <div class="col-sx-12 col-md-12 col-lg-12">
              <form id="" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="workssid" value="<?=$valueobject['sid']?>">
                <div class="col-sx-6 col-md-6 col-lg-6">
                <div class="templatemo_form">
                  <input type="date" name="iedatN" value="<?=$valueobject['dataNach']?>">
                </div>
            </div>
            <div class="col-sx-6 col-md-6 col-lg-6">
                <div class="templatemo_form">
                  <input type="date" name="iedatC" value="<?=$valueobject['dataCon']?>">
                </div>
            </div>
              <div class="col-sx-12 col-md-12 col-lg-12">       
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" id="bedat" name="bedat">Изменить</button>
                </div>
              </div>
   
          </form>  
        </div>
      </div>
    </div>
  </div>
<!-- Редактируем контактные данные-->
<div class="modal" id='editcontactobject<?=$valueobject['sid']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">

             <div class="modal-body">
          
            <div class="col-sx-12 col-md-12 col-lg-12">
              <form id="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="contactsid" value="<?=$valueobject['sid']?>">
    <?php
                 $sql_select_contact = "SELECT * FROM contact WHERE idobj = '".$valueobject['sid']."'";
        $result_select_contact = $connectionPDO -> query($sql_select_contact);

                  foreach ($result_select_contact as $keycontact2 => $valuecontact2) {
                   // echo "$valuework2";
                  
                ?>
                <div class="col-sx-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  
                  <input type="hidden" name="ienamecontactid[]" value="<?=$valuecontact2['id']?>">
                  <input type="text" name="ienamecontact[]" value="<?=$valuecontact2['name']?>">
                </div>
            </div>
            <?php
              }
            ?>
            <div class="col-sx-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  
                  <input type="text" name="ienamecontactadd" placeholder="Новый контакт">
                </div>
            </div>

              <div class="col-sx-12 col-md-12 col-lg-12">       
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" id="becontact" name="becontact">Изменить</button>
                </div>
              </div>
   
          </form>  
        </div>
      </div>
    </div>
  </div>
<!-- Редактируем примечание-->
<div class="modal" id='editcomentobject<?=$valueobject['sid']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
              

             <div class="modal-body">
          
            <div class="col-sx-12 col-md-12 col-lg-12">
              <form id="" method="POST" enctype="multipart/form-data">
                          <div class="col-sx-12 col-md-12 col-lg-12">       
                <div class="templatemo_form">
                  <textarea col ="2" class="form-control" name="tekoment"><?=$valueobject['koment']?></textarea>
                  <input type="hidden" name="idobject" value="<?=$valueobject['sid']?>">
                </div>
              </div>
                <div class="col-sx-12 col-md-12 col-lg-12">       
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" id="bekoment" name="bekoment">Изменить</button>
                </div>
              </div>
   
          </form>  
        </div>
      </div>
    </div>
  </div>

      <?php

       }

?>

  </tbody>
</table>





<?php

include('form.object.add.php');

if (isset($_POST['newobject'])) {

          $newobject = $_POST['newobject'];
        $addnameproject = $_POST['addnameproject'];
        $addadresproject = $_POST['addadresproject'];
        $addcompanyproject = $_POST['addcompanyproject'];
        $adddatnproject = $_POST['adddatnproject'];
        $adddatcproject = $_POST['adddatcproject'];
        $contactdata = $_POST['contactdata'];
     $workdata = $_POST['workdata'];
        $addkomenproject = $_POST['addkomenproject'];
        $file_put = "objectfiles/";

$sql_add_newproject = "INSERT INTO stock (name,companyId,dataNach,dataCon,address,koment) VALUES ('".$addnameproject."','".$addcompanyproject."','".$adddatnproject."','".$adddatcproject."','".$addadresproject."','".$addkomenproject."')";

  $result_add_newproject = $connectionPDO -> query($sql_add_newproject) or die('Ошибка при добавлении проекта');
 $last_stock_id = $connectionPDO -> LastInsertId();

  foreach ($workdata as $keyworkdata => $valueworkdata) {
   $sql_add_work = "INSERT INTO work (idobj,name) VALUES ('". $last_stock_id."','".$valueworkdata."')";

  $result_add_work = $connectionPDO -> query($sql_add_work) or die('Ошибка при добавлении проекта');
  }

  foreach ($contactdata as $keycontact => $valuecontact) {
   $sql_add_contact = "INSERT INTO contact (idobj,name) VALUES ('". $last_stock_id."','".$valuecontact."')";

  $result_add_contact = $connectionPDO -> query($sql_add_contact) or die('Ошибка при добавлении проекта');
  }

$fileZ = $file_put.$last_stock_id;
mkdir($fileZ);
for ($i=0; $i < count($_FILES['addfilesproject']['name']) ; $i++) { 

  $extFile = getExtension1($_FILES['addfilesproject']['name'][$i]);

  $extFileName = $_FILES['addfilesproject']['name'][$i];

  //$fileName = substr($_FILES['AddfilesUser']['name'][$i], strpos($_FILES['AddfilesUser']['name'][$i],'.'));
 
   move_uploaded_file($_FILES['addfilesproject']['tmp_name'][$i], $fileZ.'/'.strreplace($extFileName));
}

 // $search_project = $_POST['search_project'];
 //$sql_close_stock = "UPDATE stock SET status = 2 WHERE id = ".$IdStok."";
 //$result_close_stock = $connectionPDO -> exec($sql_close_stock) or die('Ошибка при выполнении закрытия проекта');
echo "<meta http-equiv='refresh' content='0'>";
 
}


if (isset($_POST['bename'])){

	$id = $_POST['idobject'];
	$iename = $_POST['iename'];
	$ieaddress = $_POST['ieaddress'];

	$sqleditobject = "UPDATE stock SET name = '".$iename."', address = '".$ieaddress."' WHERE id = '".$id."'";
	$resultditobject = $connectionPDO -> exec($sqleditobject) or die('Ошибка при выполнении запроса редактирования'); 	
	echo "<meta http-equiv='refresh' content='0'>";
}
if (isset($_POST['becompany'])){
	$id = $_POST['idobject'];
	$iecompany = $_POST['iecompany'];

	$sqleditobject = "UPDATE stock SET companyId = '".$iecompany."' WHERE id = '".$id."'";
	$resultditobject = $connectionPDO -> exec($sqleditobject) or die('Ошибка при выполнении запроса редактирования'); 	
	echo "<meta http-equiv='refresh' content='0'>";

}
if (isset($_POST['beworks'])){
    
		$ienamework = $_POST['ienamework'];
    $ienameworkid = $_POST['ienameworkid'];
    $resultarrworks = array_combine($ienameworkid,$ienamework);

    $workssid = $_POST['workssid'];
		$ienameworkadd = $_POST['ienameworkadd'];

     

    if (isset($_POST['ienameworkadd']) AND $_POST['ienameworkadd'] != "" ){
        $sqleditworks = "INSERT INTO work (idobj,name) VALUES ('".$workssid."','".$ienameworkadd."')";
  $resulteditworks = $connectionPDO -> exec($sqleditworks) or die('Ошибка при выполнении запроса редактирования');  
  echo "<meta http-equiv='refresh' content='0'>";
    }

    foreach ($resultarrworks as $keyarrworks => $valuearrworks) {

        $sqlselectarrworks = "SELECT name FROM work WHERE id = $keyarrworks";
      $resultselectarrworks = $connectionPDO -> query($sqlselectarrworks) or die('Ошибка при выполнении запроса выборки в цикле');
      $nameWork = $resultselectarrworks->fetch();
      if ($nameWork['name'] != $valuearrworks){

      $sqleditarrworks = "UPDATE work SET name ='$valuearrworks' WHERE id = $keyarrworks";
      $resulteditarrworks = $connectionPDO -> exec($sqleditarrworks) or die('Ошибка при выполнении запроса редактирования в цикле');

      }
  

    }
 

echo "<meta http-equiv='refresh' content='0'>";

}
if (isset($_POST['bedat'])){
	$id = $_POST['workssid'];
	$iedatN = $_POST['iedatN'];
	$iedatC = $_POST['iedatC'];

	$sqleditobject = "UPDATE stock SET dataNach = '".$iedatN."', dataCon = '".$iedatC."' WHERE id = '".$id."'";
	$resultditobject = $connectionPDO -> exec($sqleditobject) or die('Ошибка при выполнении запроса редактирования'); 	
	echo "<meta http-equiv='refresh' content='0'>";

}

if (isset($_POST['becontact'])) {

  $ienamecontact = $_POST['ienamecontact'];
    $ienamecontactid = $_POST['ienamecontactid'];
    $resultarrcontact = array_combine($ienamecontactid,$ienamecontact);

    $contactsid = $_POST['contactsid'];
    $ienamecontactadd = $_POST['ienamecontactadd'];

     

    if (isset($_POST['ienamecontactadd']) AND $_POST['ienamecontactadd'] != "" ) {
        $sqleditcontact = "INSERT INTO contact (idobj,name) VALUES ('".$contactsid."','".$ienamecontactadd."')";
  $sqleditcontact = $connectionPDO -> exec($sqleditcontact) or die('Ошибка при выполнении запроса редактирования');  
  echo "<meta http-equiv='refresh' content='0'>";
    }

    foreach ($resultarrcontact as $keyarrcontact => $valuearrcontact) {

        $sqlselectarrcontact = "SELECT name FROM contact WHERE id = $keyarrcontact";
      $resultselectarrcontact = $connectionPDO -> query($sqlselectarrcontact) or die('Ошибка при выполнении запроса выборки в цикле');
      $namecontact = $resultselectarrcontact->fetch();
      if ($namecontact['name'] != $valuearrcontact) {

      $sqleditarrcontact = "UPDATE contact SET name ='$valuearrcontact' WHERE id = $keyarrcontact";
      $resulteditarcontact = $connectionPDO -> exec($sqleditarrcontact) or die('Ошибка при выполнении запроса редактирования в цикле');

      }
  

    }
 

echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_POST['bekoment'])){
	$id = $_POST['idobject'];
	$tekoment = $_POST['tekoment'];

	$sqleditobject = "UPDATE stock SET koment = '".$tekoment."' WHERE id = '".$id."'";
	$resultditobject = $connectionPDO -> exec($sqleditobject) or die('Ошибка при выполнении запроса редактирования'); 	
	echo "<meta http-equiv='refresh' content='0'>";

}

if (isset($_POST['bestatus'])){
  $id = $_POST['idobjectstatus'];
 
  $sqleditobject = "UPDATE stock SET status = '2' WHERE id = '".$id."'";
  $resultditobject = $connectionPDO -> exec($sqleditobject) or die('Ошибка при выполнении запроса редактирования');   
  echo "<meta http-equiv='refresh' content='0'>";

}


# Добавление файлов пользователя
if (isset($_POST['EditFileObject'])) {

 $item = $_POST['item'];
 
 $EditFilesObject = $_FILES['FilesObject'];
 $file_put = "objectfiles/";
 $fileZ = $file_put.$item;

 for ($i=0; $i < count($_FILES['FilesObject']['name']) ; $i++) { 

  $extFilesEdit = getExtension1($_FILES['FilesObject']['name'][$i]);

 $extFileName = $_FILES['FilesObject']['name'][$i];

  //$fileName = substr($_FILES['AddfilesUser']['name'][$i], strpos($_FILES['AddfilesUser']['name'][$i],'.'));
 
   move_uploaded_file($_FILES['FilesObject']['tmp_name'][$i], $fileZ.'/'.strreplace($extFileName));
}

  

?>
<script type="text/javascript">
  alert("Файлы добавленны");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

}





?>








