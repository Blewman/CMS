<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');
$IdUser = $_SESSION['id'];

?>
<!DOCTYPE html>
  <head>
    <title>Polygon CSS Website Template</title>
    <meta name="keywords" content="" />
  <meta name="description" content="" />
    <!-- 
    Polygon Template
    https://templatemo.com/tm-400-polygon
    -->
    <meta charset="UTF-8">
    
    <!-- Bootstrap -->            
 <script src="js/main.lib.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/main.js"></script>

    <script>
  /*  var checked = [];
$('input:checkbox:checked').each(function() {
  checked.push($(this).val());
});*/
$('input:checkbox:checked').each(function(){
  alert($(this).val());
});

function fun_che_cli($check) {

  var checkBox = document.getElementById($check);
  var text = document.getElementById('NamePlanesEditispall')
  var text2 = document.getElementById('PlanesISPALL')
  
  var Mytext = text.value;
  var $in = $check;
  if (checkBox.checked == true){
   // alert("Yes");
   text.value = Mytext+' №'+$in;
   text2.value = Mytext+' №'+$in;

  } 
  if (checkBox.checked == false) {
       str = text.value;

       text.value = str.replace('№'+$in, "").trim();
       text2.value = str.replace('№'+$in, "").trim();
  }
  }
    

checked=false;

function checkedAll (frm1) {
  
  var text = document.getElementById('NamePlanesEditispall')
  var text2 = document.getElementById('PlanesISPALL')
  var Mytext = text.value;
  var aa= document.getElementById('frm1');
  
   if (checked == false){
           checked = true
          }
        else{
          checked = false
          }
  for (var i =0; i < aa.elements.length; i++){
   aa.elements[i].checked = checked;

   if (aa.elements[i].type == 'checkbox'){
    if (aa.elements[i].value != "on"){
    text.value = text.value+' №'+aa.elements[i].value;
  text2.value = text2.value+' №'+aa.elements[i].value;
    //alert(aa.elements[i].value);
  }
   }
   
  }
}


    $(function(){
     $('#form').validator();
    });


$('.pole').keyup(function() {
  var val = $('.pole').val();//Получаем данные из input
  $('.txt').html(val);//Вставляем значение в тег с классом txt
});

 
    </script>

        <style type="text/css">
      .custom {
    width: 150px !important;
    }

    .custom2 {
    width: 150px !important;
    }
    </style>

  </head>
  <body>

<div class="col-md-12 col-sm-12 col-lg-12" id="organizer">
                
 <?php
 


 include('organizer.form.add.php');

$dat = date('Y-m-d');

if (isset($_POST['1'])){
 
  $sql_planeS = "SELECT * FROM planes WHERE IdUser = $IdUser AND Execute != 1 AND  dataNach = CAST(CURRENT_TIMESTAMP AS DATE)";

}

elseif (isset($_POST['2'])){
  
  $sql_planeS = "SELECT * FROM planes WHERE IdUser = $IdUser AND Execute != 1 AND dataNach < CAST(CURRENT_TIMESTAMP AS DATE)";
}

elseif (isset($_POST['3'])){
 
  $sql_planeS = "SELECT * FROM planes WHERE IdUser = $IdUser AND Execute != 1 AND  dataNach > CAST(CURRENT_TIMESTAMP AS DATE)";
}
 else {
  $sql_planeS = "SELECT * FROM planes WHERE IdUser = $IdUser AND Execute != 1 AND  dataNach = CAST(CURRENT_TIMESTAMP AS DATE)";

}
 ?>   
             <div class="col-md-9 col-sm-12 col-lg-12">
              <form role="form" method="POST" id="form">
                                       <div class="col-md-3 col-sm-5 col-lg-3">
                       <div class="templatemo_form">
                      <div class="templatemo_form"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackFormModalLog">Создать</button></div>
                      </div>
                    </div>
                      <?php
                      $sql_plane = "SELECT id,namePlane FROM plane";
                      $result_plane = $connectionPDO -> query($sql_plane) or die('Ошибка при выполнении запроса');

                      foreach ($result_plane as $key => $value) {
                       
                       ?>
                       
                       <div class="col-md-3 col-sm-5 col-lg-3">
                       <div class="templatemo_form">
                        <?php
                              if ($value['id'] == 1){
                               
                                $sql_planeSB = "SELECT * FROM planes WHERE IdUser = $IdUser AND Execute != 1 AND  dataNach = CAST(CURRENT_TIMESTAMP AS DATE)";
                               

                              }

                              elseif ($value['id'] == 2){
                                
                                $sql_planeSB = "SELECT * FROM planes WHERE IdUser = $IdUser AND Execute != 1 AND dataNach < CAST(CURRENT_TIMESTAMP AS DATE)";
                               // $NRow = $connectionPDO -> query($sql_planeSB) ->fetchColumn();
                              }

                              elseif ($value['id'] == 3){
                               
                                $sql_planeSB = "SELECT * FROM planes WHERE IdUser = $IdUser AND Execute != 1 AND  dataNach > CAST(CURRENT_TIMESTAMP AS DATE)";
                               // $NRow = $connectionPDO -> query($sql_planeSB) ->fetchColumn();
                              }

                               $NRow = $connectionPDO -> query($sql_planeSB) ->fetchAll();

                        ?>
                      <div class="templatemo_form"><button class="btn btn-primary" type="submit" name="<?=$value['id']?>" ><?=$value['namePlane']." ".count($NRow)?></button></div>
                      </div>
                    </div>
                        <?php

                      }


                    ?>
                
            </form>
            </div>
            <div class="row"></div>
            <br>
<div class="row">
	<div class="col-md-12 col-sm-12 col-lg-12">
		<div class="col-md-12 col-sm-12 col-lg-12" id="organizerFormTable">
<form id="frm1">
             <table class="display" border="1" id='tableorg'>
              <thead>
              <tr><th width="180"><div class="dropdown">  <input type="checkbox" name="checkAll" onclick="checkedAll();">
                  
                  <i class="btn btn-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true" aria-hidden="true">С отмеченными  </i> 
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a data-toggle="modal" data-target="#FormModalAdd_porall">Поручить</a></li>
                    <li><a data-toggle="modal" data-target="#FormModalAdd_ispall">Исполнить</a></li>
                  </ul>
                </div>

              </th><!--<th>№</th>--><th>Тема</th><th>Описание</th><th>Дата начала</th></tr>
            </thead>
            <tbody>

<?php



$result_planeS = $connectionPDO -> query($sql_planeS) or die('Ошибка при выполнении запроса выборки');
$i = 1;
foreach ($result_planeS as $key_planeS => $value_planeS) {
?>
<tr>
  <th><input type="checkbox" name="<?=$value_planeS['id']?>" value="<?=$value_planeS['id']?>" id="<?=$value_planeS['id']?>" 
    onclick="fun_che_cli('<?=$value_planeS['id']?>')" > <?=$value_planeS['id']?></th>
  <input type="hidden" name="<?=$value_planeS['id']?>" value="<?=$value_planeS['id']?>" >
 <!-- <th data-toggle="modal" data-target="#feedbackFormModalIsp<?=$value['id']?>"></th>-->
  <th data-toggle="modal" data-target="#feedbackFormModalIsp<?=$value_planeS['id']?>"><?=$value_planeS['namePlanes']?></th>
  <th data-toggle="modal" data-target="#feedbackFormModalIsp<?=$value_planeS['id']?>"><?=$value_planeS['textPlanes']?></th>
  <th data-toggle="modal" data-target="#feedbackFormModalIsp<?=$value_planeS['id']?>"><?=$value_planeS['dataNach']?></th>
  <!--<th><button name="isp<?=$i?>" type="button" class="btn btn-warning" data-toggle="modal" data-target="#feedbackFormModalIsp<?=$key?>" >Исполнить</button></th>-->

</tr>
<!--Исполнение \ поручение-->

    <div class="modal" id='feedbackFormModalIsp<?=$value_planeS['id']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

             <div class="modal-body">
          
            <div class="col-md-5 col-lg-12">
              <form role="forms" method="POST">
                <div class="templatemo_form">
                  <input name="NamePlanesEdit" type="text" class="form-control" id="NamePlanesEdit<?=$value_planeS['id']?>" placeholder="Наименование" maxlength="40" value="<?=$value_planeS['namePlanes']?>">
                  <input type="hidden" name="item" id="item<?=$value_planeS['id']?>" value="<?=$value_planeS['id']?>">
                </div>
                 <div class="templatemo_form">
                    <select name="IdUserEdit" class="form-control" id="IdUserEdit<?=$value_planeS['id']?>">
                      <?php
                      $sql_IdUser = "SELECT * FROM users WHERE role = 1";
                      $result_IdUser = $connectionPDO -> query($sql_IdUser) or die('Ошибка при выполнении запроса');

                      foreach ($result_IdUser as $key => $val) {

                        if ($value['IdUser'] == $val['id']) {
                          $select = 'selected';}
                          else{

                              $select = ''; }

                      ?>
                      <option value="<?=$val['id']?>"<?=$select?>><?=$val['fio']?></option>
                      <?php
                      
                          }
                      ?>
                    </select>
                   <!-- <input name="IdUserEdit" type="text" class="form-control" id="fullname" placeholder="<?=$value['IdUser']?>" maxlength="40">-->
                </div>
              <div class="templatemo_form">
                   <input name="dataNachEdit" type="date" class="form-control" id="dataNachEdit<?=$value_planeS['id']?>" value="<?=$value_planeS['dataNach']?>">
                </div>
                  <div class="templatemo_form">
                <textarea name="textPlanesEdit" id="textPlanesEdit<?=$value_planeS['id']?>" rows="10" class="form-control" id="message" placeholder="Описание" ><?=$value_planeS['textPlanes']?></textarea>
                </div>
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary custom2" id="EditPlane<?=$value_planeS['id']?>" name="EditPlane">Поручение</button>
                  <button type="button" class="btn btn-primary custom2" id="IspPlane<?=$value_planeS['id']?>" name="IspPlane">Исполнить</button>
                </div>
            </form>

            <script>

$("#EditPlane<?=$value_planeS['id']?>").click(function(){

  var EditPlane = $("#EditPlane<?=$value_planeS['id']?>").val();
  var item = $("#item<?=$value_planeS['id']?>").val();

    var NamePlanesEdit = $("#NamePlanesEdit<?=$value_planeS['id']?>").val();
  var IdUserEdit = $("#IdUserEdit<?=$value_planeS['id']?>").val();
    var textPlanesEdit = $("#textPlanesEdit<?=$value_planeS['id']?>").val();
  var dataNachEdit = $("#dataNachEdit<?=$value_planeS['id']?>").val();

  

  
    
   /*  var dataNach = $("#dataNach").val();
    var textPlanes = $("#textPlanes").val();*/

  $.ajax({
        url: 'lib/obr.php',
        type: 'POST',
        cache: false,
        data:{ 'EditPlane':EditPlane, 'item':item,'NamePlanesEdit':NamePlanesEdit, 'IdUserEdit':IdUserEdit,'textPlanesEdit':textPlanesEdit, 'dataNachEdit':dataNachEdit},
        dataType: 'html',
        success:
      function(data){
            location.reload();
            alert("Поручено");
        }
    });

   $('#feedbackFormModalIsp<?=$value_planeS['id']?>').modal('hide');
  
});

$("#IspPlane<?=$value_planeS['id']?>").click(function(){

  var IspPlane = $("#IspPlane<?=$value_planeS['id']?>").val();
  var item = $("#item<?=$value_planeS['id']?>").val();

  


    $.ajax({
        url: 'lib/obr.php',
        type: 'POST',
        cache: false,
        data:{ 'IspPlane':IspPlane, 'item':item},
        dataType: 'html',
        success:
      function(data){
            location.reload();
            alert("Исполнено");
        }
    });

   $('#feedbackFormModalIsp<?=$value_planeS['id']?>').modal('hide');
  
});



   </script> 

            </div>

        </div>
      </div>
     </div>

<?php

}


?>
</tbody>
</table>



</form>
</div>
</div>
</div>

<!-- Поручение для избранных -->

<div class="modal" id='FormModalAdd_porall' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

             <div class="modal-body">
          
            <div class="col-md-5 col-lg-12">
              <form role="forms" method="POST">
                <div class="templatemo_form">
                  <input name="NamePlanesEditispall" value="" type="text" class="form-control" id="NamePlanesEditispall" placeholder="Выбранные задания" maxlength="40" value="">
                  <input type="hidden" name="itemispall" value="<?=$value['id']?>">
                </div>
                 <div class="templatemo_form">
                    <select name="IdUserEditispall" class="form-control" id="fullname">
                      <?php
                      $sql_IdUser = "SELECT * FROM users WHERE role = 1 AND login != '".$_SESSION['username']."'";
                      $result_IdUser = $connectionPDO -> query($sql_IdUser) or die('Ошибка при выполнении запроса');

                      foreach ($result_IdUser as $key => $val) {

                        if ($value['IdUser'] == $val['id']) {
                          $select = 'selected';}
                          else{

                              $select = ''; }

                      ?>
                      <option value="<?=$val['id']?>"<?=$select?>><?=$val['fio']?></option>
                      <?php
                      
                          }
                      ?>
                    </select>
                   <!-- <input name="IdUserEdit" type="text" class="form-control" id="fullname" placeholder="<?=$value['IdUser']?>" maxlength="40">-->
                </div>
              <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" name="EditPlaneAll">Поручение</button>
                </div>
            </form>
            </div>
        </div>
      </div>
     </div>
     </div>
<?php


# Поручение группы зажаний
if (isset($_POST['EditPlaneAll'])) {

  $NamePlanesEditispall = $_POST['NamePlanesEditispall'];
  $IdUserEditispall = $_POST['IdUserEditispall'];
  
$str = preg_split("/[\s,]+/", $NamePlanesEditispall);
array_shift($str);
  /*$item = $_POST['item'];
  $NamePlanesEdit = $_POST['NamePlanesEdit'];
  $IdUserEdit = $_POST['IdUserEdit'];
  $textPlanesEdit = $_POST['textPlanesEdit'];
   $dataNachEdit = $_POST['dataNachEdit'];*/
echo count($str);
//print_r($str);
foreach ($str as $keystr => $valuestr) {

$sqlEditPlaneisp_all = "UPDATE planes SET IdUser='".$IdUserEditispall."' WHERE id = '".str_replace('№',"",$valuestr)."'";
$resultEditPlaneisp_all = $connectionPDO -> exec($sqlEditPlaneisp_all) or die('Ошибка при выполнении запроса редактирования');
}
//

//

?>
<script type="text/javascript">
  alert("Все задания поручены");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

}


?>

<!-- Исполнения для избранных -->

<div class="modal" id='FormModalAdd_ispall' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

             <div class="modal-body">
          
            <div class="col-md-5 col-lg-12">
              <form role="forms" method="POST">
                <div class="templatemo_form">
                  <input name="PlanesISPALL" value="" type="text" class="form-control" id="PlanesISPALL" placeholder="Выбранные задания" maxlength="40" value="">
                  <input type="hidden" name="itemispall" value="<?=$value['id']?>">
                </div>
              <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" name="IspPlaneAll">Исполнить</button>
                </div>
            </form>
            </div>
        </div>
      </div>
     </div>
     </div>     

<?php
# Исполнение группы заданий
if (isset($_POST['IspPlaneAll'])) {

  $NamePlanesEditispall = $_POST['NamePlanesEditispall'];
  $PlanesISPALL = $_POST['PlanesISPALL'];
  
$str = preg_split("/[\s,]+/", $PlanesISPALL);
array_shift($str);
  /*$item = $_POST['item'];
  $NamePlanesEdit = $_POST['NamePlanesEdit'];
  $IdUserEdit = $_POST['IdUserEdit'];
  $textPlanesEdit = $_POST['textPlanesEdit'];
   $dataNachEdit = $_POST['dataNachEdit'];*/
echo count($str);
//print_r($str);
foreach ($str as $keystr => $valuestr) {

$sqlEditPlaneisp_all = "UPDATE planes SET Execute='1', dataCon = '".date('Y-m-d')."' WHERE id = '".str_replace('№',"",$valuestr)."'";
$resultEditPlaneisp_all = $connectionPDO -> exec($sqlEditPlaneisp_all) or die('Ошибка при выполнении запроса редактирования');
}

?>
<script type="text/javascript">
  alert("Все задания исполнены");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

}
?>

       
  

    <script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>

    
    $(document).ready(function(){
        $("#myModalBox").modal('show');
    });

</script>
  <!-- templatemo 400 polygon fun_che_cli -->
  </body>
</html>