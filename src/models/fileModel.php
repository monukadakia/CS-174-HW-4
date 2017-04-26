<?php
/**
 * Created by PhpStorm.
 * User: yashparikh
 * Date: 4/26/17
 * Time: 1:20 AM
 */

namespace coolname\Hw4\src\models;


class fileModel extends mainModel
{
    public $obj;

    function __construct()
    {
        $this->obj = new mainModel();
    }

    function fetch_name($spreadCheck)
    {
        return $this->obj->db->fetch_spread_name("Select sheet_name from SHEET where sheet_name = '$spreadCheck'");
    }

    function fetch_data($spreadCheck){
        return $this->obj->db->fetch_spread_data("Select sheet_data from SHEET where sheet_name = '$spreadCheck'");
    }

}