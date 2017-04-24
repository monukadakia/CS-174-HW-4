<?php
namespace coolname\Hw4\src\configs;

require_once "Config.php";


class CreateDB {

    private $mySql = null;

    function __construct() {
        $this->mySql = new \mysqli(Config::Host, Config::UserName, Config::Password);
        if($this->mySql->connect_error){
            die("Connection failed: " . $this->mySql->connect_error);
        }

        $query = "CREATE DATABASE ".Config::Database;
        $this->mySql->query($query);
        $this->mySql->query("USE ".Config::Database);
        $this->mySql->query("create table  SHEET(sheet_id int PRIMARY KEY AUTO_INCREMENT, sheet_name TEXT NOT NULL, sheet_data TEXT)");
        $this->mySql->query("create table  SHEET_CODES(sheet_id int PRIMARY KEY AUTO_INCREMENT, hash_code TEXT NOT NULL, code_type TEXT)");

    }

}
new CreateDB();