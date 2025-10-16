<?php

class alimentosModelo {
    private $db;

    public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_nutri;charset=utf8', 'root', '');
    }

    public function obtenerAlimentos(){
        $query = $this->db->prepare(
            'SELECT alimentos.*, grupos_alimentos.nombre_grupo
            FROM alimentos 
            JOIN grupos_alimentos ON alimentos.id_grupo = grupos_alimentos.id_grupo');
        $query->execute();

        $alimentos = $query->fetchAll(PDO::FETCH_OBJ);
        return $alimentos;
    }

    public function obtenerALimentoDetalle($id_alimento){
        $query = $this->db->prepare(
            'SELECT alimentos.*, grupos_alimentos.nombre_grupo
            FROM alimentos
            JOIN grupos_alimentos ON alimentos.id_grupo = grupos_alimentos.id_grupo
            WHERE alimentos.id_alimento = ?');

        $query->execute([$id_alimento]);

        $alimento = $query->fetch(PDO::FETCH_OBJ);
        return $alimento;
    }

    //funciones para admin.

    public function insertarAlimento($nombre_alimento, $id_grupo, $descripcion_alimento, $calorias, $proteinas, $carbohidratos, $fibras, $grasas, $imagen_alimento){
        $query = $this->db->prepare(
            'INSERT INTO alimentos(nombre_alimento, id_grupo, descripcion_alimento, calorias, proteinas, carbohidratos, fibras, grasas, imagen_alimento)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)' );
        $query->execute([$nombre_alimento, $id_grupo, $descripcion_alimento, $calorias, $proteinas, $carbohidratos, $fibras, $grasas, $imagen_alimento]);

        $id_alimento = $this->db->lastInsertId();
        return $id_alimento;
    }

    public function eliminarAlimento($id_alimento){
        $query = $this->db->prepare('DELETE FROM alimentos WHERE id_alimento = ?');
        $query->execute([$id_alimento]);
    }

    public function actualizarAlimento($id_alimento, $nombre_alimento, $id_grupo, $descripcion_alimento, $calorias, $proteinas, $carbohidratos, $grasas, $fibras, $imagen_alimento){
        $query = $this->db->prepare(
            'UPDATE alimentos 
            SET nombre_alimento = ?, id_grupo = ?, descripcion_alimento = ?, calorias = ?, proteinas = ?, carbohidratos = ?, grasas = ?, fibras = ?, imagen_alimento = ?
            WHERE id_alimento = ?');
        $query->execute([$nombre_alimento, $id_grupo, $descripcion_alimento, $calorias, $proteinas, $carbohidratos, $grasas, $fibras, $imagen_alimento, $id_alimento]);
    }

    
}

