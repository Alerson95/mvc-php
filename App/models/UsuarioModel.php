<?php
 
 namespace App\models;

 use App\core\Conexao;

 class UsuarioModel
 {
     private $conn;
     

    public function __construct()
    {
        $this->conn = Conexao::getConection();
    }

    public function getNome(){
        return 'seu nome vindo do model';
    }
     
 }
 


?>