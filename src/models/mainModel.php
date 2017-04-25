<?php
namespace coolname\Hw4\src\models;
use coolname\Hw4\src\configs as Config;

class mainModel
{
    protected $db;
    function __construct()
    {
       $this->db = new Config\CreateDB();
    }
}