<?php
/**
 * Created by PhpStorm.
 * User: yashparikh
 * Date: 4/23/17
 * Time: 6:22 PM
 */

namespace coolname\Hw4\src\controllers;

use coolname\Hw4\src\views as Main;

require_once __DIR__."/../views/mainView.php";
require_once __DIR__."/../views/layouts/editLayout.php";

class editController{

    function __construct()
    {
        $this->displayEditLayout();
    }

    function displayEditLayout(){
        new Main\layouts\editLayout();
    }
}

?>
