<?php


namespace coolname\Hw4\src\controllers;

use coolname\Hw4\src\views as Main;
use coolname\Hw4\src\models as Model;


class readController{

    function __construct()
    {
        $obj = new Model\readModel();
        $spreadName = $_REQUEST['webSheetName'];
        $hashf = substr(\hash("md5", $spreadName.'f'), 0, 8);
        $hashCodes['f'] = substr(hexdec($hashf), 0, 8);
        $data = $obj->fetch_data($spreadName);
        if($data==""){
            $data = "[['']]";
        }
        $this->displayReadLayout($hashCodes, $data);
    }

    function displayReadLayout($hashCodes, $data){
        new Main\layouts\readLayout($hashCodes, $data);
    }
}

?>
