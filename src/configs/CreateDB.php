<?php
namespace coolname\Hw4\src\configs;


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

    function storeInDB($query)
    {
        $this->mySql->query($query);
    }

    function fetch_spread_name($query)
    {
        if($spread_name = $this->mySql->$query($query))
        {
            $name = $spread_name->fetch_assoc();
            return $name;
        }
    }

    function fetch_spread_data($query)
    {
        if($spread_data = $this->mySql->$query($query))
        {
            $data = $spread_data->fetch_assoc();
            return $data;
        }
    }
}
new CreateDB();