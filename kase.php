<?php

$acat = $_POST['acat'];


//========================================

 $mysqli = mysqli_connect("mysql370.cp.idhost.kz", "u1161418_ad", "xsmrt23K", "db1161418_too");
if (!$mysqli->set_charset("utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
    exit();
} 

$sql_store_details = "SELECT * FROM users WHERE fio LIKE ('%$acat%')";
$result_us = mysqli_query($mysqli,$sql_store_details);
foreach ($result_us as $kase => $dd) {
       
		$kid = $dd['id'];         
		$kfio = $dd['fio'];        
		//$kd = $dd['dlj'];         
		$kdate = $dd['DatT'];         
		$kdu = $dd['DatU'];       
} 


$sql_store_details = "SELECT * FROM dlj WHERE id = ".$dd['dlj']."";
$result_us = mysqli_query($mysqli,$sql_store_details);
foreach ($result_us as $kase => $dd1) {
		$kd = $dd1['dljName'];         
		
} 

$sql_store_details = "SELECT * FROM role WHERE id = ".$dd['role']."";
$result_us = mysqli_query($mysqli,$sql_store_details);
foreach ($result_us as $kase => $dd1) {
		$kr = $dd1['NameRole'];         
		
} 
$i = 0;
$sql_store_details = "SELECT * FROM reportusers WHERE Mark LIKE ('%Оп%') AND IdUsers = ".$dd['id'].""; 
$result_us = mysqli_query($mysqli,$sql_store_details);
foreach ($result_us as $kase => $dd3) {
if($dd3['id'] != 0 ) {
$i++;
 }
}
//echo 'Опоздал: ' . $i . '<br>';
$k = $i;
$i = 0;
$sql_store_details = "SELECT * FROM reportusers WHERE Mark LIKE ('%Пр%') AND IdUsers = ".$dd['id'].""; 
$result_us = mysqli_query($mysqli,$sql_store_details);
foreach ($result_us as $kase => $dd3) {
if($dd3['id'] != 0 ) {
$i++;
 }
}
//echo 'Прогулял: ' . $i . '<br>';
$s1 = "0";
if ( $kdu != "0000-00-00" ) {
$s1 = "1";}
$s = "$kid|$kfio|$kd|$kdate|$kr|$i|$k|$s1|";

echo "$s";
    
		


mysqli_close($mysqli);

?>


