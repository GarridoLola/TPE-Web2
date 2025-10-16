<?php

class gruposModelo{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_nutri;charset=utf8', 'root', '');
    }

    public function obtenerGrupos(){
        $query = $this->db->prepare(
            'SELECT * FROM grupos_alimentos');
        $query->execute();

        $grupos_alimentos = $query->fetchAll(PDO::FETCH_OBJ);
        return $grupos_alimentos;
    }

    public function obtenerItemPorGrupo($id_grupo){ //trae alimentos con ese ID.
        $query = $this->db->prepare('SELECT * FROM alimentos WHERE id_grupo = ?');
        $query->execute([$id_grupo]);

        $alimentos = $query->fetchAll(PDO::FETCH_OBJ);
        return $alimentos;
    }

    public function obtenerIdGrupo($id_grupo){ //datos del grupo según ID.
        $query = $this->db->prepare('SELECT * FROM grupos_alimentos WHERE id_grupo = ?');
        $query->execute([$id_grupo]);

        $grupos_alimentos = $query->fetch(PDO::FETCH_OBJ);
        return $grupos_alimentos;
    }

    //funciones admin.
    public function insertarGrupo($nombre_grupo, $descripcion_grupo, $imagen_grupo){
        $query = $this->db->prepare('INSERT INTO grupos_alimentos(nombre_grupo, descripcion_grupo, imagen_grupo) VALUES (?, ?, ?)');
        $query->execute([$nombre_grupo, $descripcion_grupo, $imagen_grupo]);

        $id_grupo = $this->db->lastInsertId();
        return $id_grupo;
    }

    public function eliminarGrupo($id_grupo){
        $query = $this->db->prepare('DELETE FROM grupos_alimentos WHERE id_grupo = ?');
        $query->execute([$id_grupo]);
    }

    public function actualizarGrupo($id_grupo, $nombre_grupo, $descripcion_grupo, $imagen_grupo){
        $query = $this->db->prepare('UPDATE grupos_alimentos SET nombre_grupo = ?, descripcion_grupo = ?, imagen_grupo = ? WHERE id_grupo = ?');
        $query->execute([$nombre_grupo, $descripcion_grupo, $imagen_grupo, $id_grupo]);
    }
}