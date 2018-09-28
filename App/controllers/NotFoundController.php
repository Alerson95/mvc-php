<?php 

namespace App\Controllers;

use App\core\Controller;

class NotFoundController extends Controller {

    public function index () {

        $this->loadView('notFound');
    }
}



?>