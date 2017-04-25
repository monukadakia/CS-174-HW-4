<?php

namespace coolname\Hw4\src\models;
use coolname\Hw4\src\configs\CreateDB;

class editModel extends mainModel
{
    public $obj;

    function __construct()
    {
        $this->obj = new mainModel();
    }

    function fetch_name($spreadCheck){
    	return $this->obj->db->fetch_spread_name("Select sheet_name from SHEET where sheet_name = '$spreadCheck'");
    }

    function fetch_data(){
    	return $this->obj->db->fetch_spread_data("");
    }

    function store_name($spreadCheck)
    {
    	 $this->obj->db->storeInDB("insert into SHEET VALUES(DEFAULT, '$spreadCheck', '[hello]')");
    }

}