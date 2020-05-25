<?php
require_once('../lib/connect.inc.php');
require_once('../lib/lib.inc.php');
session_start();
# Добавление должности
if (isset($_POST['AddDlj'])) {

	$AddTextDlj = $_POST['AddTextDlj'];

		$sql_select_dlj = "SELECT * FROM dlj WHERE dljName = '$AddTextDlj'";
		$result_select_dlj = $connectionPDO ->query($sql_select_dlj) or die("Ошибка при поиске должности");
		$count_dlj = $result_select_dlj->rowCount();
		if (!$count_dlj) {
			$sqlAddDlj = "INSERT INTO dlj (dljName) VALUES ('$AddTextDlj')";
	$resultAddDlj = $connectionPDO -> exec($sqlAddDlj) or die('Ошибка при выполнении запроса добавлении');
		} else {
		?>
		<script type="text/javascript">
			alert("Данная должность уже есть");
		</script>
		<?php
}
	
	//echo "$AddTextDlj Должность добавлена";
	include('../user.dlj.php');

}


if (isset($_POST['EditDlj'])) {

$itemdlj = $_POST['itemdlj'];
 $EditTextDlj = $_POST['EditTextDlj'];

$sql_edit_dlj = "UPDATE dlj SET dljName = '$EditTextDlj' WHERE id = '$itemdlj'";

$result_edit_dlj = $connectionPDO -> exec($sql_edit_dlj) or die('Ошибка при выполнении запроса редактирования');

	include('../user.dlj.php');

}