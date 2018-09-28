<?php

namespace App\core;

class Core
{
    public function run() {


        /*
            url = /controller/action/parametros

            1 - primeiro valor depois da / referencia o controller
            2 - segundo valor despois da barra referencia a acao a ser tomada
            3 - os demais valores sao parametros
        
        
        */
        
        $url = '/';

        //verifica se foi passado algo na url
        if(isset($_GET['url']))
        {
            //Cria a url
            $url .= $_GET['url'];
        }        

        $params = array(); // contem os parametros passado via get
        $controller; // indentifica qual o controller que deve ser utilizado
        $action; // idenfica qual acao deve ser tomada


        //verifica se foi passado algum controller e action
        if(!empty($url) && $url != "/"){
            
            $url = explode('/', $url);//transforma a url em um array
            array_shift($url); // Remove o primeiro campo da url que esta vazio

            $controller = "App\controllers\\". $url[0]."Controller"; // identifica o controller
            array_shift($url); //remove o controller do array

            //verifica se ainda resta algum valor no array para definir a acao
            if(isset($url[0]) && !empty($url[0]) ){
                $action = $url[0];//define a acao
                array_shift($url);//remove a acao do array 
            }else {
                $action = 'index'; // caso nao tenha acao na url e setado uma padrao
            }

            //verifica se ainda existe algum dado no array e coloca como parametro get
            if(count($url)>0) {
                $params = $url;
            }
            

        }else {
            $controller = 'App\controllers\\HomeController'; //define um controller padrao
            $action = 'index'; //define uma acao padrao
            
        }        
        
        
        if(!file_exists($controller.'.php') || !method_exists($controller , $action)){
            $controller = 'App\controllers\notfoundController';
            $action = 'index';
        }


        $c = new $controller();       

        call_user_func_array(array($c , $action), $params);       


    }
}



?>