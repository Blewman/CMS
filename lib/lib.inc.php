<?
include ('config.php');


function SQLResult ($sql){

	$host = $GLOBALS['host'];
	$db = $GLOBALS['db'];
	$login = $GLOBALS['login'];
	$psw = $GLOBALS['psw'];


	$connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");
	return $result = $connectionPDO -> query($sql);

}

function SQLResultAdd ($sql){
	$host = $GLOBALS['host'];
	$db = $GLOBALS['db'];
	$login = $GLOBALS['login'];
	$psw = $GLOBALS['psw'];


	$connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");
	return $result = $connectionPDO -> exec($sql) or die("Ошибка при добавлении ");

}

  function getExtension1($filename) {
    return end(explode(".", $filename));
  }

    function getExtension2($filename) {
    return end(explode($filename,"."));
  }



function ResultUserData (){

	$host = $GLOBALS['host'];
	$db = $GLOBALS['db'];
	$login = $GLOBALS['login'];
	$psw = $GLOBALS['psw'];

/*$sql = "SELECT 
us.id AS UID, 
us.login, 
us.password, 
us.fio, 
us.dlj, 
us.role,
r.id, 
r.NameRole,
d.id AS DLJID,
d.dljName 
FROM users AS us
INNER JOIN dlj AS d 
ON  us.dlj = d.id
INNER JOIN role AS r 
ON  us.role = r.id";*/

$sql = "SELECT 
us.id AS UID,
us.DatU,
us.DatT,
IF ((MONTH(us.DatU) != '0000-00-00') AND (MONTH(us.DatU) != '11') ,1 , 2 )  AS UVL,
us.login, 
us.password, 
us.fio, 
us.dlj, 
us.role,
us.koment,
r.id, 
r.NameRole,
d.id AS DLJID,
d.dljName 
FROM users AS us
INNER JOIN dlj AS d 
ON  us.dlj = d.id
INNER JOIN role AS r 
ON  us.role = r.id";	


	$connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");
	return $result = $connectionPDO -> query($sql);

}  

function Result_dlj_data (){

	$host = $GLOBALS['host'];
	$db = $GLOBALS['db'];
	$login = $GLOBALS['login'];
	$psw = $GLOBALS['psw'];

	$sql = "SELECT id,dljName 
	FROM dlj AS dlj";


	$connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");
	return $result = $connectionPDO -> query($sql);

}

function fa_icon_typefile($type){

	switch ($type) {
		case 'pdf':
			echo "fa fa-file-pdf-o";
			break;
		case 'PDF':
			echo "fa fa-file-pdf-o";
			break;	
		case 'doc':
			echo "fa fa-file-word-o";
			break;
		case 'docx':
			echo "fa fa-file-word-o";
			break;	
		case 'DOC':
			echo "fa fa-file-word-o";
			break;
		case 'DOCX':
			echo "fa fa-file-word-o";
			break;
		case 'jpg':
			echo "fa fa-file-image-o";
			break;
		case 'JPG':
			echo "fa fa-file-image-o";
			break;	
		case 'png':
			echo "fa fa-file-image-o";
			break;
		case 'bmp':
			echo "fa fa-file-image-o";
			break;
		case 'tif':
			echo "fa fa-file-image-o";
			break;
		case 'xls':
			echo "fa fa-file-excel-o";
			break;
		case 'zip':
			echo "fa-file-archive-o";
			break;
		case 'rar':
			echo "fa fa-file-archive-o";
			break;									


	
		
	}

}

function strreplace ($str)
{

				$converter = array(
				'а' => 'a',   'б' => 'b',   'в' => 'v',    'г' => 'g',   'д' => 'd',   'е' => 'e',
				'ё' => 'e',   'ж' => 'zh',  'з' => 'z',    'и' => 'i',   'й' => 'y',   'к' => 'k',
				'л' => 'l',   'м' => 'm',   'н' => 'n',    'о' => 'o',   'п' => 'p',   'р' => 'r',
				'с' => 's',   'т' => 't',   'у' => 'u',    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
				'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',  'ь' => '',    'ы' => 'y',   'ъ' => '',
				'э' => 'e',   'ю' => 'yu',  'я' => 'ya', 
			
				'А' => 'A',   'Б' => 'B',   'В' => 'V',    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
				'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
				'Л' => 'L',   'М' => 'M',   'Н' => 'N',    'О' => 'O',   'П' => 'P',   'Р' => 'R',
				'С' => 'S',   'Т' => 'T',   'У' => 'U',    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
				'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',  'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
				'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
			);
 
			$str = strtr($str, $converter);

			return $str;



}

function strreplaceR ($str)
{

				$converter = array(
				'а' => 'а',   'б' => 'б',   'в' => 'в',    'г' => 'г',   'д' => 'д',   'е' => 'е',
				'ё' => 'е',   'ж' => 'ж',  'з' => 'з',    'и' => 'и',   'й' => 'й',   'к' => 'к',
				'л' => 'л',   'м' => 'м',   'н' => 'н',    'о' => 'о',   'п' => 'п',   'р' => 'р',
				'с' => 'с',   'т' => 'т',   'у' => 'у',    'ф' => 'ф',   'х' => 'х',   'ц' => 'ц',
				'ч' => 'ч',  'ш' => 'ш',  'щ' => 'щ',  'ь' => '',    'ы' => 'ы',   'ъ' => '',
				'э' => 'э',   'ю' => 'ю',  'я' => 'я', 
			);
 
			$str = strtr($str, $converter);

			return $str;



}


# SQL для Табеля

function report_user_itog_mark($year,$mount,$marker,$IdDay,$uid){

$host = $GLOBALS['host'];
	$db = $GLOBALS['db'];
	$login = $GLOBALS['login'];
	$psw = $GLOBALS['psw'];
$connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");

$sql = "SELECT COUNT(*) FROM reportusers WHERE mark LIKE ('%$marker%') AND IdUsers = ".$uid." AND DateRep between '".$year.'-'.$mount."-01' and '".$year.'-'.$mount."-".$IdDay."'";

	
	$result = $connectionPDO -> query($sql) or die('Ошибка при выполнении запроса выборки');
	$RepItog = $result->fetch();
	return $RepItog[0];


}

function report_user_itog_mark_mount($year,$mount,$marker,$IdDay){

$host = $GLOBALS['host'];
	$db = $GLOBALS['db'];
	$login = $GLOBALS['login'];
	$psw = $GLOBALS['psw'];
$connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");

$sql = "SELECT COUNT(*) FROM reportusers WHERE mark LIKE ('%$marker%') AND DateRep between '".$year.'-'.$mount."-01' and '".$year.'-'.$mount."-".$IdDay."'";

	
	$result = $connectionPDO -> query($sql) or die('Ошибка при выполнении запроса выборки');
	$RepItog = $result->fetch();
	return $RepItog[0];


}





function sql_result_rep_itog(){

}


function all_work_mark ($userid,$mark){

	$host = $GLOBALS['host'];
	$db = $GLOBALS['db'];
	$login = $GLOBALS['login'];
	$psw = $GLOBALS['psw'];

	$sql = "SELECT COUNT(*) FROM reportusers WHERE IdUsers = ".$userid."";

	$result = $connectionPDO -> query($sql) or die('Ошибка при выполнении запроса выборки');
	$RepItog = $result->fetch();
	echo $RepItog[0];


}


function count_span(){

	$host = $GLOBALS['host'];
	$db = $GLOBALS['db'];
	$login = $GLOBALS['login'];
	$psw = $GLOBALS['psw'];

	$sql = "SELECT COUNT(idrecstok) AS cid FROM namestok GROUP BY idrecstok";
$connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");
	$result = $connectionPDO -> query($sql) or die('Ошибка при выполнении запроса выборки');
	foreach ($result as $key => $value) {
		$Itog[] = $value['cid'];
	}
	//$Itog = $result;

	return max($Itog);

	//echo "привет";


}





