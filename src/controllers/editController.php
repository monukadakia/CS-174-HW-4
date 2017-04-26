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

        if(preg_match("/[a-z]/i", $spreadName)){
           $this->default_page($spreadName);
        }
        else
        {
            $codeType = $obj->fetch_hash($spreadName);
            switch ($codeType) {
                case 'r':
                    break;
                case 'e':
                    $spreadName = $obj->fetch_id($spreadName);
                    header("Location:index.php?c=edit&webSheetName=".$spreadName);
                    break;
                case 'f':
                    break;
                default:
                    $this->default_page($spreadName);
                    break;
            }
        }
    }

    function default_page($spreadName)
    {
        $obj = new Model\editModel();
        $hashr = substr(\hash("md5", $spreadName.'r'), 0, 8);
        $hashe = substr(\hash("md5", $spreadName.'e'), 0, 8);
        $hashf = substr(\hash("md5", $spreadName.'f'), 0, 8);
        $hashCodes['r'] = substr(hexdec($hashr), 0, 8);
        $hashCodes['e'] = substr(hexdec($hashe), 0, 8);
        $hashCodes['f'] = substr(hexdec($hashf), 0, 8);

        $name = $obj->fetch_name($spreadName);
        $data = null;
        if(!isset($name))
        {
            $obj->store_name($spreadName, $hashCodes);
            $data = "[['']]";
        }
        else{
            $data = $obj->fetch_data($spreadName);
            if($data==""){
                $data = "[['']]";
            }
        }
        $this->displayEditLayout($hashCodes, $data);
    }

    function displayEditLayout($hashCodes, $data){
        new Main\layouts\editLayout($hashCodes, $data);
    }
}

?>
