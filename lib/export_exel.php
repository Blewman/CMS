<?php
include ('config.php');
function My_foo_exe(){
$host = $GLOBALS['host'];
  $db = $GLOBALS['db'];
  $login = $GLOBALS['login'];
  $psw = $GLOBALS['psw'];
$connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");
$sql_select_object = "SELECT s.id AS sid, s.name AS sname, s.companyId, s.address, s.dataNach , s.dataCon, s.koment FROM stock AS s";
$result_select_object = $connectionPDO -> query($sql_select_object);
$count_num = $result_select_object->fetchAll();
//echo count($count_num); 
  /**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt  LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
  die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
/*$objPHPExcel->getProperties()->setCreator($name)
               ->setLastModifiedBy($name)
               ->setTitle("Office 2007 XLSX Test Document")
               ->setSubject("Office 2007 XLSX Test Document")
               ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
               ->setKeywords("office 2007 openxml php")
               ->setCategory("Test result file");*/
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A1", '№')
            ->setCellValue("B1", 'Наименование и адрес объекта')
            ->setCellValue("C1", 'Наименование организации Заказчика')
            ->setCellValue("D1", 'Наименование работ, выполняемых на объекте')
            ->setCellValue("E1", 'Срок выполнения работ')
            ->setCellValue("F1", 'Контактные данные руководителей')
            ->setCellValue("G1", 'Примечание');
$i = 2;            
foreach ($count_num as $key => $value) {

  $sql_works = "SELECT GROUP_CONCAT(w.name SEPARATOR ', ' ) AS wname  FROM stock AS s INNER JOIN work AS w ON s.id = w.idobj WHERE s.id = '".$value['sid']."'";
  $result_works = $connectionPDO -> query($sql_works);
  $work = $result_works->fetch()['wname'];

    $sql_contact = "SELECT GROUP_CONCAT(c.name SEPARATOR ', ' ) AS cname  FROM stock AS s INNER JOIN contact AS c ON s.id = c.idobj WHERE s.id = '".$value['sid']."'";
  $result_contact = $connectionPDO -> query($sql_contact);
  $contact = $result_contact->fetch()['cname'];

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$i, $value['sid'])
            ->setCellValue("B".$i, $value['sname'].' '.$value['address'])
            ->setCellValue("C".$i, $value['companyId'])
            ->setCellValue("D".$i, $work)
            ->setCellValue("E".$i, 'C '.$value['dataNach'].'по'.$value['dataCon'])
            ->setCellValue("F".$i, $contact)
            ->setCellValue("G".$i++, $value['koment']);
 } 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("B1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("D1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("F1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("G1")->getFont()->setBold(true);
//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('C')->setWidth('10');                 
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Лист1');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Данные по объектам.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
}


function exp_exe_mater($sql,$name,$exp_dat){
$host = $GLOBALS['host'];
  $db = $GLOBALS['db'];
  $login = $GLOBALS['login'];
  $psw = $GLOBALS['psw'];
$connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");
//$sql_select_object = "SELECT s.id AS sid, s.name AS sname, s.companyId, s.address, s.dataNach , s.dataCon, s.koment FROM stock AS s";
$result_select_object = $connectionPDO -> query($sql);
//$count_num = $result_select_object->fetchAll();
//echo count($count_num); 
  /**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt  LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
  die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
/*$objPHPExcel->getProperties()->setCreator($name)
               ->setLastModifiedBy($name)
               ->setTitle("Office 2007 XLSX Test Document")
               ->setSubject("Office 2007 XLSX Test Document")
               ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
               ->setKeywords("office 2007 openxml php")
               ->setCategory("Test result file");*/
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A1", '№')
            ->setCellValue("B1", 'Дата поступления')
            ->setCellValue("C1", 'Наименование')
            ->setCellValue("D1", 'Е.Изм.')
            ->setCellValue("E1", 'Кол-во')
            ->setCellValue("F1", 'Стоимость')
            ->setCellValue("G1", 'Примечание');
$i = 2;            
foreach ($result_select_object as $key => $value) {

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$i, $i-1)
            ->setCellValue("B".$i, $value['dat'])
            ->setCellValue("C".$i, $value['name'])
            ->setCellValue("D".$i, $value['edizm'])
            ->setCellValue("E".$i, $value['kolvo'])
            ->setCellValue("F".$i, $value['summ'])
            ->setCellValue("G".$i, $value['koment']);
            $i++;
 } 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("B1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("D1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("E1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("F1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("G1")->getFont()->setBold(true);
//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('C')->setWidth('10');                 
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Лист1');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Материалы '.$name.' за '.$exp_dat.'.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
}



if (isset($_POST['export'])) {
My_foo_exe();
}

if (isset($_POST['exp_exe_mat'])) {
exp_exe_mater($_POST['sql_exp_mat'],$_POST['name_exp_mat'],$_POST['dat_exp_mat']);
}