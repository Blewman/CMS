<?php
require_once('../lib/connect.inc.php');
require_once('../lib/lib.inc.php');
# Создание задания

if (isset($_POST['AddPlane'])) {


  $idPlane = $_POST['idPlane'];
  $namePlanes = $_POST['namePlanes'];
  $textPlanes = $_POST['textPlanes'];
  $dataNach = $_POST['dataNach'];
  $IdUser = $_POST['idPlaneUser'];
 
 echo $sqlAdd_Pnames = "INSERT INTO planes (idPlane, IdUser,namePlanes, textPlanes, dataNach) 
VALUES ('$idPlane', '$IdUser ', '$namePlanes','$textPlanes','$dataNach')";
$resultPnames = $connectionPDO -> exec($sqlAdd_Pnames) or die('Ошибка при выполнении запроса');

?>
<script type="text/javascript">
  alert("Запись успешно добавленна");
</script>

<?php 
//echo "<meta http-equiv='refresh' content='0'>";

}



# Добавление новго пользователя


if (isset($_POST['AddUser'])) {

 //$item = $_POST['item'];
  $AddUserDatT = $_POST['AddUserDatT'];
  $AddUserRole = $_POST['AddUserRole'];
  $AddUserLogin = $_POST['AddUserLogin'];
  $AddUserPass = $_POST['AddUserPass'];
  $AddUserFio = $_POST['AddUserFio'];
  $AddUserDlj = $_POST['AddUserDlj'];
  $AddfilesUser = $_FILES['AddfilesUser'];

  //$file_put = "userfiles/";

$sqlAddUser = "INSERT INTO users (role, login, password, fio, dlj, DatT) VALUES ('$AddUserRole','$AddUserLogin','$AddUserPass','$AddUserFio',' $AddUserDlj',' $AddUserDatT')";

$resultAddUser = $connectionPDO -> exec($sqlAddUser) or die('Ошибка при выполнении запроса добавлении');
$fIdf = $connectionPDO -> LastInsertId();
$fileZ = '../userfiles/'.$fIdf;
mkdir($fileZ);
/*for ($i=0; $i < count($_FILES['AddfilesUser']['name']) ; $i++) { 

  $extFile = getExtension1($_FILES['AddfilesUser']['name'][$i]);

  //$fileName = substr($_FILES['AddfilesUser']['name'][$i], strpos($_FILES['AddfilesUser']['name'][$i],'.'));
 
   move_uploaded_file($_FILES['AddfilesUser']['tmp_name'][$i], $fileZ.'/'.'UserFile'.$i.'.'.$extFile);
}*/


 

?>

<?php 
//echo "<meta http-equiv='refresh' content='0'>";

}


# Исполнение задания
if (isset($_POST['IspPlane'])) {

 $item = $_POST['item'];
 /* $NamePlanesEdit = $_POST['NamePlanesEdit'];
  $IdUserEdit = $_POST['IdUserEdit'];
  $textPlanesEdit = $_POST['textPlanesEdit'];*/


$sqlIspPlane = "UPDATE planes SET Execute = 1, dataCon = CAST(CURRENT_TIMESTAMP AS DATE) WHERE id = '".$item."'";

$resultIspPlane = $connectionPDO -> exec($sqlIspPlane) or die('Ошибка при выполнении запроса редактирования');


}

# Поручение задания
if (isset($_POST['EditPlane'])) {

  $item = $_POST['item'];
  $NamePlanesEdit = $_POST['NamePlanesEdit'];
  $IdUserEdit = $_POST['IdUserEdit'];
  $textPlanesEdit = $_POST['textPlanesEdit'];
   $dataNachEdit = $_POST['dataNachEdit'];


$sqlEditPlane = "UPDATE planes SET namePlanes ='".$NamePlanesEdit."', IdUser='".$IdUserEdit."', dataNach='".$dataNachEdit."', textPlanes='".$textPlanesEdit."' WHERE id = '".$item."'";

$resultEditPlane = $connectionPDO -> exec($sqlEditPlane) or die('Ошибка при выполнении запроса редактирования');


}