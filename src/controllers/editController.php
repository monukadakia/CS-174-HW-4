<?php
/**
 * Created by PhpStorm.
 * User: yashparikh
 * Date: 4/23/17
 * Time: 6:22 PM
 */

namespace coolname\Hw4\src\controllers;

use coolname\Hw4\src\views as Main;
use coolname\Hw4\src\models as Model;

class editController{

    function __construct()
    {
        $hashCodes = [];
        $obj = new Model\editModel();

        $spreadName = $_REQUEST['webSheetName'];

        $hashr = substr(\hash("md5", $spreadName.'r'), 0, 8);
        $hashe = substr(\hash("md5", $spreadName.'e'), 0, 8);
        $hashf = substr(\hash("md5", $spreadName.'f'), 0, 8);
        $hashCodes['r'] = substr(hexdec($hashr), 0, 8);
        $hashCodes['e'] = substr(hexdec($hashe), 0, 8);
        $hashCodes['f'] = substr(hexdec($hashf), 0, 8);

        $name = $obj->fetch_name($spreadName);


        if(!isset($name))
        {
            $obj->store_name($spreadName, $hashCodes);
        }


        $this->displayEditLayout($hashCodes);
    }

    function displayEditLayout($hashCodes){
        new Main\layouts\editLayout($hashCodes);
    }
}

?>
