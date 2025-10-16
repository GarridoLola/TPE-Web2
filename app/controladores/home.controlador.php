<?php

class homeControlador{

    public function mostrarHome($request){        
         $usuario = $request->usuario;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/home.php';
    }
}