<?php
namespace App\core;

class Controller 
{

    public function loadView($viewName , $viewData = array()){
        extract($viewData);
        require __DIR__ . '/../views/'. $viewName . '.php';
    }

    public function loadTemplate($viewName, $viewData = array()){
        require  __DIR__ . '/../views/template.php';

    }

    public function loadViewInTemplate($viewName, $viewData = array()){
        extract($viewData);
        require __DIR__ . '/../views/'.$viewName.'.php';

    }

}



?>