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

    function store_name($spreadCheck, $hashCodes)
    {
    	 $this->obj->db->storeInDB("insert into SHEET VALUES(DEFAULT, '$spreadCheck', '[hello]')");
         $sheet_id = $this->obj->db->get_sheet_id("select sheet_id from SHEET where sheet_name = '$spreadCheck'");

    	 if(isset($sheet_id)){
    	     $hashr = $hashCodes['r'];
             $this->obj->db->storeInDB("insert into SHEET_CODES VALUES('$sheet_id','$hashr', 'r')");
             $hashe = $hashCodes['e'];
             $this->obj->db->storeInDB("insert into SHEET_CODES VALUES('$sheet_id','$hashe', 'e')");
             $hashf = $hashCodes['f'];
             $this->obj->db->storeInDB("insert into SHEET_CODES VALUES('$sheet_id','$hashf', 'f')");
         }
    }

}