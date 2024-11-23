<?php

use Application\core\Controller;

class Home extends Controller
{ 
    public function index()
    {
        $this->verification();
        if($this->permission){
            $this->view('home/index');
        }
    }
}

?>