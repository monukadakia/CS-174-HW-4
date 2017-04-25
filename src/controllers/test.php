<?php 
namespace coolname\Hw4\src\models;
use coolname\Hw4\src\configs as Config;

$data = $_POST['data'];
$webSheetName = $_POST['webSheetName'];
updateSheet($data, $webSheetName);

function updateSheet($data, $webSheetName){
	$db = new Config\CreateDB();
	$db->storeInDB("update SHEET set sheet_data = '$data' where sheet_name = '$webSheetName'");
}
?>