<?php

class usuarioVista{ 
    public function mostrarLogin($error, $usuario){
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_login.phtml';
    }

    public function error($error, $usuario){
        require_once 'templates/layout/header.phtml';
        require_once 'templates/error.phtml';
    }
}