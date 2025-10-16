<?php

class gruposVista{

    public function listarGrupos($grupos, $usuario){
        require_once 'templates/layout/header.phtml';
        require_once 'templates/listar_grupos.phtml';
    }

    public function listarItemPorGrupo($alimentos, $nombre_grupo, $usuario){
        require_once 'templates/layout/header.phtml';
        require_once 'templates/listar_items.phtml';
    }

    public function formEditarGrupo($grupo, $usuario){
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_editar_grupo.phtml';
    }

    public function adminGrupos($grupos_alimentos, $usuario){
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_agregar_grupo.phtml';
    }

    public function mostrarExito($exito, $request){
        $usuario = $request->usuario;
        require_once 'templates/layout/header.phtml';
        require_once 'templates/exito.phtml';
    }

    public function mostrarError($error, $request){
        $usuario = $request->usuario; 
        require_once 'templates/layout/header.phtml';
        require_once 'templates/error.phtml';
    }

}