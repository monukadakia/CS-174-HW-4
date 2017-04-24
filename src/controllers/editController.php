<?php
/**
 * Created by PhpStorm.
 * User: yashparikh
 * Date: 4/23/17
 * Time: 6:22 PM
 */

namespace coolname\Hw4\src\controllers;

use coolname\Hw4\src\views as Main;
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
