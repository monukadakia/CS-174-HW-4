<?php

namespace coolname\Hw4;
require_once "vendor/autoload.php";

use coolname\Hw4\src\controllers as Control;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$logSetup = false;
$logger = null;


$activity = (isset($_REQUEST['c']) && in_array($_REQUEST['c'], [
		"landing", "edit", "read", "file", "api"])) ? $_REQUEST['c'] . "Controller":"landingController";

while(!$logSetup){
    $logger = new Logger('general');
    $logger->pushHandler(new StreamHandler(__DIR__."/app_data/spread.log", Logger::DEBUG));
    $logSetup = true;
}

if ($activity == 'landingController') {
    $logger->info('User has visited the Landing Page.');
    $_REQUEST['m'] = "landingLayout";
    new Control\landingController($_REQUEST['m'], $_REQUEST['m']);
}
else if ($activity == 'editController' || $activity == 'apiController'){
    $logger->info('User has visited the Edit Page to edit the spreadsheet - '.$_REQUEST['webSheetName']);
    new Control\editController($_REQUEST['m']);
}
else if($activity == 'readController') {
    $logger->info('User has visited the Read Page to read the spreadsheet - '.$_REQUEST['webSheetName']);
    new Control\readController($_REQUEST['m']);
}
else if($activity == 'fileController'){
    $logger->info('User has visited the File Page to view the XML version of spreadsheet - '.$_REQUEST['webSheetName']);
    new Control\fileController($_REQUEST['m']);
}
