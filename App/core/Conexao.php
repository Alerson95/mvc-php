<?php

namespace App\core;

use PDO;

class Conexao {

    static $con;    

    private function __construct(){

    }

    static function getConection(){

        $dsn = "mysql:dbname=bd_mvc;host=localhost";
        $dbuser = "root";
        $dbpass= "";

        if(self::$con == null){
            try {

                self::$con = new PDO($dsn,$dbuser,$dbpass);  

            }catch (\PDOException $e){

                die($e->getMessage());

            }
        }


        return self::$con;
    }

}



?>