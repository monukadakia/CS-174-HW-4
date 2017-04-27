<?php

namespace coolname\Hw4\src\models;

class readModel extends mainModel
{
    public $obj;

    function __construct()
    {
        $this->obj = new mainModel();
    }

    function fetch_name($spreadCheck){
        return $this->obj->db->fetch_spread_name("Select sheet_name from SHEET where sheet_name = '$spreadCheck'");
    }

    function fetch_data($spreadCheck){
        return $this->obj->db->fetch_spread_data("Select sheet_data from SHEET where sheet_name = '$spreadCheck'");
    }

    function fetch_hash($spreadCheck){
        return $this->obj->db->fetch_spread_hash("Select code_type from SHEET_CODES where hash_code = '$spreadCheck'");
    }

    function fetch_id($spreadCheck){
        return $this->obj->db->fetch_spread_name("select sheet_name from SHEET where sheet_id = (select sheet_id from SHEET_CODES where hash_code = '$spreadCheck')");
    }
}