<?php
//header('Content-type: text/html; charset=utf-8');
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');
$IdUser = $_SESSION['id'];
$dat = date('Y-m-d');
setlocale(LC_ALL, 'ru_RU.UTF8');


            #Удаление файла
if (isset($_POST['delfiles'])) {
  $deldatfiles = $_POST['deldatfiles'];
  unlink($deldatfiles);
  ?>
  <script type="text/javascript">
    alert("Файл удален");
  </script>
  <?php
}





?>
<!DOCTYPE html>
  <head>
    <title>Сотрудники</title>
    <meta name="keywords" content="" />
  <meta name="description" content="" />
    <!-- 
    Polygon Template
    https://templatemo.com/tm-400-polygon
    -->
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link href="css/templatemo_style.css" rel="stylesheet">
    <!--<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>-->
    <!--<link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css">-->
    <!--<script src="js/validator.min.js"></script>-->
      
    <script src="js/jquery-1.10.2.min.js"></script> 
  <script src="js/jquery.lightbox.js"></script>


  <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap-theme.min.css">
    <script>
    function showhide()
    {
      var div = document.getElementById("newpost");
    if (div.style.display !== "none")
    {
      div.style.display = "none";
    }
    else {
      div.style.display = "block";
    }
    }

        $(document).ready(function() {
            $('#uvl').on('change', function() {
                this.formuvl.submit();
            });
        });



    </script>

        <style type="text/css">
      .custom {
    width: 150px !important;
    }

    .custom2 {
    width: 150px !important;
    }

    .selectpicker{
  float: left; 
  width: 100%;
  text-align: center;
  color: #ffffff;
  border-radius: 0px;
  background: #3D365E;
  border: none;
  text-transform: uppercase;
  font-size: 14px;
  margin-top: 10px;
padding: 13px;}


    .hiddenRow {
    padding: 0 !important;
}

    </style>

  </head>
  <body>

  <!-- Nav tabs -->
<ul class="nav nav-tabs">
  <div class="col-sm-3 col-md-3 col-lg-3">
    <li class="nav-item">
      <div class="templatemo_form">
      <button class="btn btn-primary nav-link" type="button" data-toggle="tab" href="#home">Сотрудники</button>
    </div>
    </li>
  </div>
  <div class="col-sm-3 col-md-3 col-lg-3">
    <li class="nav-item">
      <div class="templatemo_form">
      <button class="btn btn-primary nav-link" type="button" data-toggle="tab" href="#menu1">Должности</button>
  </div>
    </li>
  </div>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="tab-pane active">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-3">
           <form role="form" method="POST" id="form">
              <div class="templatemo_form">
                <div class="templatemo_form"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackFormModalAddUser">Добавить</button></div>
                      </div>
                      </div>
                
            </form>
            <div class="col-sm-3">
            <form method="POST" id="formuvl">
              <div class="templatemo_form">
                <div class="templatemo_form"><select name="uvl" id="uvl" class="selectpicker" onchange="this.form.submit('#formuvl');return true;">
                  <option value="1">Действующие</option>
                  <option value="2">Уволенные</option>
                </select></div>
                      </div>
                
            </form>
          </div>
        </div>
          <div class="row">
            <div class="col-sm-12">

<?php


            switch ($_POST['uvl']) {
              case 1:
                ?>
     <script type="text/javascript">
       $("#uvl :contains('Действующие')").attr("selected", "selected");
      
     </script>
     <?php
      $UVL = 2;
                break;
              case 2:
                ?>
     <script type="text/javascript">
       $("#uvl :contains('Уволенные')").attr("selected", "selected");
       
     </script>

     <?php
     $UVL = 1;
                break;  
              
              default:
                ?>
     <script type="text/javascript">
       $("#uvl :contains('Действующие')").attr("selected", "selected");
     </script>
     <?php
     $UVL = 2;
                break;
            }
?>              
                        <table class="display" border="1" style="border-collapse:collapse;">
               <thead>
              <tr><th width="30">№</th><th width="300">ФИО</th><th width="150">Должность</th><th>Роль</th>
                <?php 
                if($UVL == 1) {
                    ?>
                    <th width="100">Дата увольнения</th><th width="400">Причина увольнения</th>
                    <?php 
                  } else {?> <th>Дата трудоустройства</th> <?}
                  ?><th>Файлы</th>
                </tr>
            </thead>

            <?php
         

$put = 'userfiles/';
/*if (isset($_POST['uvl'])) {
     $UVL = $_POST['uvl'];
     ?>
     <script type="text/javascript">
       $("#uvl :contains('Уволенные')").attr("selected", "selected");
       alert("<?=$UVL?>");
     </script>
     <?php
                   ?>
              <?php
            }  else{
              $UVL = $_POST['uvl'];
             ?>
     <script type="text/javascript">
       $("#uvl :contains('Действующие')").attr("selected", "selected");
     </script>
     <?php      

            } */


$i = 1;
foreach (ResultUserData() as $key => $value) {
   
  if ($value['UVL'] == $UVL) {
    # code...
  
?>
<tr>
  <th data-toggle="collapse" data-target="#<?=$value['UID']?>" class="accordion-toggle"><?=$i++?></th>
 <!-- <th data-toggle="modal" data-target="#feedbackFormModalUserEdit<?=$key?>"><?=$value['fio']?>-->
  
    <th>


      <div class="dropdown"><span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"><?=$value['fio']?></span> 
              <?php
      if($UVL == 2) {
      ?>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a data-toggle="modal" data-target="#feedbackFormModalUserEdit<?=$key?>">Изменить</a></li>
        <li><a data-toggle="modal" data-target="#feedbackFormModalUserUVL<?=$value['UID']?>">Уволить</a></li>
        <!--<li><a data-toggle="modal" data-target="#edit_file_user<?=$value['UID']?>">Добавить файлы</a></li>-->
      </ul>
    <?php
  }
    ?>

</div>
  </th>
  
  <th><?=$value['dljName']?></th>
  <th><?=$value['NameRole']?></th>
  <?php 
  if($UVL == 1){
    ?>
    <th><?=$value['DatU'];?></th>
    <th><?=$value['koment'];?></th>

    <?php }else {?>
    <th><?=$value['DatT'];
    ?>
    </th>
    <?php
  }
    ?>
  <th><?php $Nfiles = @scandir('userfiles/'.$value['UID']);

    foreach ($Nfiles as $keyNfiles => $valueNfiles) {
      $itemImg = $keyNfiles.$value['UID'];
      if ($valueNfiles != '..' AND $valueNfiles != '.' ) {
      //echo $put.$value['UID'].'/'.$valueNfiles;
      //echo mb_detect_encoding(iconv("UTF-8", "ASCII", $valueNfiles));
     // echo 
      //pathinfo($file, PATHINFO_FILENAME);
      ?>
      <!--<a href="<?=$put.$value['UID'].'/'.$valueNfiles?>"><?=$put.$value['UID'].'/'.$valueNfiles?></a>-->
      <div>
          <div class="dropdown col-xs-3">
      <i class="<?=fa_icon_typefile(getExtension1($valueNfiles))?> fa-2x btn btn-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="true" aria-hidden="true" title="<?=pathinfo($valueNfiles,PATHINFO_FILENAME);?>"></i><?=substr(pathinfo($valueNfiles,PATHINFO_FILENAME), 0, 7);?>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1"> 
        <li><button class="btn btn-link" ><a href="<?=$put.$value['UID'].'/'.$valueNfiles?>" download>Скачать</a></button></li>
        <li>
            <form method="POST">
            <button class="btn btn-link" name="delfiles">Удаляем</button>
            <input type="hidden" name="deldatfiles" value="<?=$put.$value['UID'].'/'.$valueNfiles?>">
          </form>

          
        
        </li>
        <!--<li><a data-toggle="modal" data-target="#edit_file_user<?=$value['UID']?>">Добавить файлы</a></li>-->
      </ul>
    </div>



      <?php
         //echo $valueNfiles;
        }
        if ($keyNfiles == 1){
        ?>
        <div class="dropdown col-xs-2">
       <i class="dropdown-toggle fa fa-plus-square fa-2x btn btn-link" id="dropdownMenu1" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="true" aria-hidden="true"></i>Добавить
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a data-toggle="modal" data-target="#edit_file_user<?=$value['UID']?>">Добавить файлы</a></li>
      </ul>
    </div>
        <?php
      }
      }


    
  ?>

<!--Добавление файлов-->

         <div class="modal" id='edit_file_user<?=$value['UID']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                  <input name="EditFiles[]" type="file" class="form-control" id="fullname" placeholder="Должность" maxlength="40" multiple>
               
               <input type="hidden" name="item" value="<?=$value['UID']?>">  </div>
                <div class="templatemo_form"><button type="submit" class="btn btn-primary" name="EditFileUser" >Добавить</button></div>
            </form>        

 
            </div>
        </div>
      </div>
     </div>
</th>
  <!--<th><button name="isp<?=$i?>" type="button" class="btn btn-warning" data-toggle="modal" data-target="#feedbackFormModalUserEdit<?=$key?>" >Редактировать</button></th> <img src="userfiles/<?=$value['UID'].'/'.@scandir('userfiles/'.$value['UID'])?>">-->
  <?php
include('user.form.edit.php');
  ?>

</tr>
<tr>
<?php
if ($UVL == 1) {
 

?>
   <td colspan ="7" class="hiddenRow"><div class="accordian-body collapse" id="<?=$value['UID']?>">
      Дата трудоустройства <?=$value['DatT']?> Дата увольнения <?=$value['DatU']?> Всего отработано дней ... Прогулов <?=all_work_mark($value['UID']);?> Опоздания ... По болезни ...
      Выплачено работнику всего ... 



   </div>
<?php
}
?>   
 </td>



</tr>


<?php
}
}

?>
</table>


 

          </div>
        </div>
           
      </div>      





    </div>
    <div id="menu1" class="tab-pane fade">
    	<?php
    	include('user.dlj.php');
      ?>
</div>


            

<?php



# Добавление новго пользователя
if (isset($_POST['AddUser'])) {

 //$item = $_POST['item'];
  $AddUserDatT = $_POST['AddUserDatT'];
  $AddUserRole = $_POST['AddUserRole'];
  $AddUserLogin = $_POST['AddUserLogin'];
  $AddUserPass = $_POST['AddUserPass'];
  $AddUserFio = $_POST['AddUserFio'];
  $AddUserDlj = $_POST['AddUserDlj'];
  $file_put = "userfiles/";




$sqlAddUser = "INSERT INTO users (role, login, password, fio, dlj, DatT) VALUES ('$AddUserRole','$AddUserLogin','$AddUserPass','$AddUserFio',' $AddUserDlj',' $AddUserDatT')";

$resultAddUser = $connectionPDO -> exec($sqlAddUser) or die('Ошибка при выполнении запроса добавлении');
$fIdf = $connectionPDO -> LastInsertId();
$fileZ = $file_put.$fIdf;
mkdir($fileZ);
for ($i=0; $i < count($_FILES['AddfilesUser']['name']) ; $i++) { 

  $extFile = getExtension1($_FILES['AddfilesUser']['name'][$i]);

  $extFileName = $_FILES['AddfilesUser']['name'][$i];

  //$fileName = substr($_FILES['AddfilesUser']['name'][$i], strpos($_FILES['AddfilesUser']['name'][$i],'.'));
 
   move_uploaded_file($_FILES['AddfilesUser']['tmp_name'][$i], $fileZ.'/'.strreplace($extFileName));
}


 

?>
<script type="text/javascript">
  alert("Пользователь добавлен");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

}


# Изменение пользователя
if (isset($_POST['EditUser'])) {

 $item = $_POST['item'];


 
 $EditUserLogin = $_POST['EditUserLogin'];
  $EditUserPass = $_POST['EditUserPass'];
  $EditUserRole = $_POST['EditUserRole'];
    $EditUserFio = $_POST['EditUserFio'];
  $EditUserDlj = $_POST['EditUserDlj'];


$sqlEditUser = "UPDATE users SET login = '".$EditUserLogin."', password = '".$EditUserPass."', fio = '".$EditUserFio."', dlj = '".$EditUserDlj."',DatU = '".$EditUserDatU."' WHERE id = '".$item."'";

$resultEditUser = $connectionPDO -> exec($sqlEditUser) or die('Ошибка при выполнении запроса редактирования');

  

?>
<script type="text/javascript">
  alert("Данные пользователя изменены");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

}

# Добавление файлов пользователя
if (isset($_POST['EditFileUser'])) {

 $item = $_POST['item'];
 
 $EditFiles = $_FILES['EditFiles'];
 $file_put = "userfiles/";
 $fileZ = $file_put.$item;

 for ($i=0; $i < count($_FILES['EditFiles']['name']) ; $i++) { 

  $extFilesEdit = getExtension1($_FILES['EditFiles']['name'][$i]);

 $extFileName = $_FILES['EditFiles']['name'][$i];

  //$fileName = substr($_FILES['AddfilesUser']['name'][$i], strpos($_FILES['AddfilesUser']['name'][$i],'.'));
 
   move_uploaded_file($_FILES['EditFiles']['tmp_name'][$i], $fileZ.'/'.strreplace($extFileName));
}

  

?>
<script type="text/javascript">
  alert("Файлы добавленны");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

}

# увольнение пользователя
if (isset($_POST['UvlUser'])) {

 $item = $_POST['item'];
 
 $EditUserDatU = $_POST['EditUserDatU'];
 $prich_uvl = $_POST['prich_uvl'];

 $sql_prov_instr = "SELECT Sost FROM recinstrument WHERE IdUser =  $item AND Sost = 0";
 $result_prov_instr = $connectionPDO -> query($sql_prov_instr) or die("Ошибка при выборке задолжности");

$row_instr = $result_prov_instr->rowCount();
 if ($row_instr != 0) {
   ?>
<script type="text/javascript">
  alert("У сотрудника имеются задолжности");
</script>

<?php
 } else {

  $sqlUvlUser = "UPDATE users SET DatU = '".$EditUserDatU."', koment ='".$prich_uvl."'  WHERE id = '".$item."'";

$resultUvlUser = $connectionPDO -> exec($sqlUvlUser) or die('Ошибка при выполнении запроса редактирования');

?>
<script type="text/javascript">
  alert("Сотрудник уволен");
</script>

<?php 
 }



  


echo "<meta http-equiv='refresh' content='0'>";

}




?>

<!--Создание нового Пользователя-->

         <div class="modal" id='feedbackFormModalAddUser' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>



    
           <div class="modal-body">
           
            <div class="col-md-5 col-lg-12">
              <form enctype="multipart/form-data" role="form" method="POST" id="form-reg">
                
                                   <div class="templatemo_form">
                  <select name="AddUserRole" class="form-control" id="AddUserRole">
                      <?php
                      $sql_IdRole = "SELECT * FROM role";
                      $result_IdRole = $connectionPDO -> query($sql_IdRole) or die('Ошибка при выполнении запроса');

                      foreach ($result_IdRole as $key => $val) {
                        if ($val['id'] == 3){
                          $select = "selected";
                        }
                      ?>
                      <option value="<?=$val['id']?>"<?=$select?>><?=$val['NameRole']?></option>
                      <?php
                      
                          }
                      ?>
                    </select>
                </div>
                <div class="templatemo_form">
                  <input name="AddUserLogin" type="hidden" class="form-control" id="fullname" placeholder="Логин" maxlength="40" required="required">
                </div>
                <div class="templatemo_form">
                  <input name="AddUserPass" type="hidden" class="form-control" id="fullname" placeholder="Пароль" maxlength="40" required="required">
                </div>
                <div class="templatemo_form">
                  <input name="AddUserFio" type="text" class="form-control" id="fullname" placeholder="ФИО" maxlength="40" required="required">
                </div>
                <div class="templatemo_form">
                  <input name="AddUserDatT" type="date" class="form-control" id="fullname" value="<?=date('Y-m-d')?>" maxlength="40">
                </div>
                <div class="templatemo_form">
                 <select name="AddUserDlj" class="form-control">
                    <?php
                      $sqlSelectDlg = "SELECT * FROM dlj";
                      $resultSelectDlg = $connectionPDO->query($sqlSelectDlg);
                      foreach ($resultSelectDlg as $key => $value) {
                       ?>
                       <option value="<?=$value['id']?>"><?=$value['dljName']?></option>
                       <?php
                      }
                    ?>
                    
                  </select>
                  </div>
                 <div class="templatemo_form">
                  <input multiple name="AddfilesUser[]" type="file" id="files" placeholder="Файлы" maxlength="40">
                </div>

           <!--   <div class="templatemo_form">
                   <input name="dataNach" type="date" class="form-control" id="fullname" value="<?=date('Y-m-d')?>">
                </div>
                  <div class="templatemo_form">
                <textarea name="textPlanes" rows="10" class="form-control" id="message" placeholder="Описание"></textarea>
                </div>-->
                <div class="templatemo_form"><button type="submit" class="btn btn-primary" name="AddUser">Добавить</button></div>
            </form>



 <script type="text/javascript">

  var form = document.querySelector('#form-reg');
 
  form.AddUserRole.addEventListener('change', function(e) {
    form.AddUserLogin.type = this.value === '1' ? 'text' : 'hidden';
    form.AddUserPass.type = this.value === '1' ? 'text' : 'hidden';
  });
 
</script>   
            </div>
        </div>
      </div>
     </div>





<!--Создание новой должности-->

         <div class="modal" id='feedbackFormModalAddDlj' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
   
           <div class="modal-body">
           
            <div class="col-md-5 col-lg-12">
              <form role="form" method="POST" id="form-reg">
                <div class="templatemo_form">
                  <input name="AddTextDlj" type="text" class="form-control" id="AddTextDlj" placeholder="Должность" maxlength="40">
                </div>
                <div class="templatemo_form"><button type="button" id="AddDlj" class="btn btn-primary" name="AddDlj">Добавить</button></div>
            </form>        
 
 
            </div>
        </div>
      </div>
     </div>





              <div class="row">

        </div>


<?php
# Добавление новой должности
/*if (isset($_POST['AddDlj'])) {

 //$item = $_POST['item'];
  $AddTextDlj = $_POST['AddTextDlj'];



$sqlAddDlj = "INSERT INTO dlj (dljName) VALUES ('$AddTextDlj')";

$resultAddDlj = $connectionPDO -> exec($sqlAddDlj) or die('Ошибка при выполнении запроса добавлении');

  

?>
<script type="text/javascript">
  alert("Должность добавлена");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

}
*/

# Изменение пользователя
/*if (isset($_POST['EditDlj'])) {

   

?>
<script type="text/javascript">
  alert("Должность добавлена");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

}*/?>        
      
    <!-- contact end -->
    

    <script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

 <script>

$("#AddDlj").click(function(){

  var AddTextDlj = $("#AddTextDlj").val();
     var AddDlj = $("#AddDlj").val();
   /*  var dataNach = $("#dataNach").val();
    var textPlanes = $("#textPlanes").val();*/
   $.ajax({
        url: 'lib/obruser.php',
        type: 'POST',
        cache: false,
        data:{ 'AddDlj':AddDlj, 'AddTextDlj':AddTextDlj},
        dataType: 'html',
        success:
      function(html){
            $("#menu1").html(html);
        }
    });

   $('#feedbackFormModalAddDlj').modal('hide');
  
});




   </script> 
 

<script>
    
    $(document).ready(function(){
        $("#myModalBox").modal('show');
    });

</script>
  <!-- templatemo 400 polygon -->
  </body>
</html>