<?php

namespace coolname\Hw4\src\models;

class landingModel extends mainModel
{
    public $obj;
    function __construct()
    {
        $this->obj = new mainModel();
    }
}