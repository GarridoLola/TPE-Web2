<?php

require_once 'app/modelos/usuario.modelo.php';
require_once 'app/vistas/usuario.vista.php';

class usuarioControlador {
    private $modelo;
    private $vista;

    public function __construct(){
        $this->modelo = new usuarioModelo;
        $this->vista = new usuarioVista;
    }

    public function mostrarLogin($request) {
        return $this->vista->mostrarLogin("", $request->usuario);
    }

    public function login($request){
        if (empty($_POST['nombre_usuario']) || empty($_POST['contraseña'])) { 
            return $this->vista->mostrarLogin("Faltan completar datos.", $request->usuario);
        }

        $nombre_usuario = $_POST['nombre_usuario'];
        $contraseña = $_POST['contraseña'];

        //verifico que esté en la db

        $usuarioDB = $this->modelo->obtenerUsuario($nombre_usuario);

        if($usuarioDB && password_verify($contraseña, $usuarioDB->contraseña)){
            $_SESSION['id_usuario'] = $usuarioDB->id_usuario;
            $_SESSION['nombre_usuario'] = $usuarioDB->nombre_usuario;
            header("Location: " . BASE_URL . "listar_alimentos");
            return;
        } else {
            return $this->vista->mostrarLogin('Usuario NO encontrado o contraseña incorrecta.', $request->usuario);
        }
    }    
    public function logOut($request){
        session_destroy();
        header("Location: " . BASE_URL . "mostrarLogin"); //muestra el formulario, no lo procesa.
        return;
    }
}