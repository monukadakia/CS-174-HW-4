<?php
/**
 * Created by PhpStorm.
 * User: yashparikh
 * Date: 4/26/17
 * Time: 12:48 AM
 */

namespace coolname\Hw4\src\controllers;

use coolname\Hw4\src\views as Main;
use coolname\Hw4\src\models as Model;

class fileController
{
    function __construct($layout)
    {
        $spreadName = $_REQUEST['webSheetName'];
        $this->default_page($spreadName, $layout);
    }

    function default_page($spreadName, $layout)
    {
        $obj = new Model\fileModel();
        $name = $obj->fetch_name($spreadName);
        $data = null;
        if(!isset($name))
        {
            $data = "[['']]";
        }
        else{
            $data = $obj->fetch_data($spreadName);
        }
        $this->$layout($data);
    }

    function fileLayout($data){
        new Main\layouts\fileLayout($data);
    }
}