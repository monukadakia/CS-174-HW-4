<?php
namespace coolname\hw3;
use coolname\hw3\src\configs as con;

$files = glob(__DIR__."/src/controllers/". "*.php");

foreach ($files as $file) {
    require_once($file);
}

$files = glob(__DIR__."/src/configs/". "*.php");

foreach ($files as $file) {
    require_once($file);
}

use coolname\hw3\src\controllers as Control;
use coolname\hw3\src\configs as Config;


$activity = (isset($_REQUEST['c']) && in_array($_REQUEST['c'], [
		"landing", "sublist", "newNote", "newList", "displayNote"])) ? $_REQUEST['c'] . "Controller":"landingController";


if ($activity == 'landingController') {
    new con\CreateDB();
    $_REQUEST['title'] = "Note-A-List";
    $_REQUEST['m'] = 'displayLandingLayout';
    new Control\landingController($_REQUEST['m']);
}
else if ($activity == 'sublistController'){
    new Control\sublistController($_REQUEST['title'], $_REQUEST['m']);
}
else if($activity == 'newNoteController') {
    new Control\newNoteController($_REQUEST['m']);
}
else if ($activity == 'newListController') {
    new Control\newListController($_REQUEST['m']);
}
else if ($activity == 'displayNoteController') {
    new Control\displayNoteController($_REQUEST['m']);
}

