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
 
 $sqlAdd_Pnames = "INSERT INTO planes (idPlane, IdUser,namePlanes, textPlanes, dataNach) 
VALUES ('$idPlane', '$IdUser ', '$namePlanes','$textPlanes','$dataNach')";
$resultPnames = $connectionPDO -> exec($sqlAdd_Pnames) or die('Ошибка при выполнении запроса');

}
