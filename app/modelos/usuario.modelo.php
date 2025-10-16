<?php

class usuarioModelo {
    private $db;

    public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_nutri;charset=utf8', 'root', '');
    }

    public function obtenerUsuario($nombre_usuario){
        $query = $this->db->prepare(
            'SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $query->execute([$nombre_usuario]);

        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}