<?php

namespace coolname\Hw4;

//$files = glob(__DIR__."/src/controllers/". "*.php");
//
//foreach ($files as $file) {
//    require_once($file);
//}

require_once "vendor/autoload.php";

use coolname\Hw4\src\controllers as Control;


$activity = (isset($_REQUEST['c']) && in_array($_REQUEST['c'], [
		"landing", "edit", "read"])) ? $_REQUEST['c'] . "Controller":"landingController";


if ($activity == 'landingController') {
    new Control\landingController();
}
else if ($activity == 'editController'){
    new Control\editController();
}
else if($activity == 'readController') {
    new Control\readController();
}
