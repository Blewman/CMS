<?php
session_start();
require_once('../lib/connect.inc.php');
require_once('../lib/lib.inc.php');

if (isset($_POST['mount']) AND !isset($_POST['year']) ) {
	
	$mount = $_POST['mount'];
	$mount;
		include('../tabele.php');

} 

if (isset($_POST['year'])) {

	$year = $_POST['year'];
	$year;
 
		include('../tabele.php');

}




if (isset($_POST['left_mount'])) {

	$mount = $_POST['left']-1;

echo $mount;

	include('../tabele.php');

}

if (isset($_POST['right_mount'])) {

$mount = $_POST['right']+1;

echo $mount;

	include('../tabele.php');

}
