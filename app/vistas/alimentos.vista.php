<?php

class alimentosVista{

    public function listarAlimentos($alimentos, $grupos_alimentos, $usuario){
        $grupos = $grupos_alimentos;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/listar_alimentos.phtml';
    }

    public function mostrarDetalles($alimento, $usuario){
        require_once 'templates/layout/header.phtml';
        require_once 'templates/alimento_detalle.phtml';
    }

    public function formEditarAlimento($alimento, $grupos_alimentos, $usuario){
        $grupos = $grupos_alimentos;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_editar_alimento.phtml';
    }

    public function adminAlimentos($alimentos, $grupos_alimentos, $usuario){
        $grupos = $grupos_alimentos;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_agregar_alimento.phtml';
    }

    public function alertaError($error,$request){
        $usuario = $request->usuario; 
        require_once 'templates/layout/header.phtml';
        require_once 'templates/error.phtml';
    }

    public function alertaExito($exito, $request){
        $usuario = $request->usuario; 
        require_once 'templates/layout/header.phtml';
        require_once 'templates/exito.phtml';
    }
}