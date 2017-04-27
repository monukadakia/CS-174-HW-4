<?php 
namespace coolname\Hw4\src\models;
use coolname\Hw4\src\configs as Configs;

require_once __DIR__."/../configs/CreateDB.php";


#echo __DIR__."/../configs/CreateDB.php";
$data = $_POST['data'];
$webSheetName = $_POST['webSheetName'];
echo "data is $data";

updateSheet($data, $webSheetName);
header("Location:/../../index.php?c=api&m=editLayout&webSheetName=$webSheetName");

function updateSheet($data, $webSheetName){
	$db = new Configs\CreateDB();
	$db->storeInDB("update SHEET set sheet_data = '$data' where sheet_name = '$webSheetName'");
}
?>