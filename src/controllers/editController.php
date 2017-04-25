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
        $obj = new Model\editModel();
        $this->displayEditLayout();

        $spreadName = $_REQUEST['webSheetName'];

        $name = $obj->fetch_name($spreadName);
        if(!isset($name))
        {
            $obj->store_name($spreadName);
        }
    }

    function displayEditLayout(){
        new Main\layouts\editLayout();
    }
}

?>
