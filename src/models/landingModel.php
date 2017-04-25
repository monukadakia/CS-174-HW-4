<?php

namespace coolname\Hw4\src\models;
use coolname\Hw4\src\configs\CreateDB;

require_once "mainModel.php";

class landingModel extends mainModel
{
    public $obj;
    function __construct()
    {
        $this->obj = new mainModel();
    }
}