<?
include ('config.php');



try {
 $connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");
} catch (PDOException $e) {

	die("Отсутвует соеденение с базой данных");

}

