<?php

namespace App\Controllers;

use App\models\usuarioModel;
use App\core\controller;

class UsuarioController extends controller
{

    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new usuarioModel();
    }

    public function index(){

        $data = [

            "nome" => $this->usuarioModel->getNome(),

        ];

        $this->loadTemplate('usuario', $data);
    }

    
}


?>