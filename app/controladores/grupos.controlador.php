<?php

require_once 'app/modelos/grupos.modelo.php';
require_once 'app/vistas/grupos.vistas.php';

class gruposControlador{
    private $modelo;
    private $vista;

    public function __construct(){
        $this->modelo = new gruposModelo();
        $this->vista = new gruposVista();
    }

    public function mostrarGrupos($request){
        $grupos_alimentos = $this->modelo->obtenerGrupos();
        return $this->vista->listarGrupos($grupos_alimentos, $request->usuario);
    }

    public function mostrarItemsPorGrupo($id_grupo, $request){
        $alimento = $this->modelo->obtenerItemPorGrupo($id_grupo);
        $grupos_alimentos = $this->modelo->obtenerIdGrupo($id_grupo);

        $this->vista->listarItemPorGrupo($alimento, $grupos_alimentos->nombre_grupo, $request->usuario);
    }

    //funciones admin.

   //administrar 
    public function administrarGrupos($request){
        $grupos = $this->modelo->obtenerGrupos();

        $this->vista->adminGrupos($grupos, $request->usuario);
    }

    public function agregarGrupo($request){
        if (!isset($_POST['nombre_grupo']) || empty($_POST['nombre_grupo'])){
            return $this->vista->mostrarError('Falta completar el nombre del grupo.', $request);
        }
        if (!isset($_POST['descripcion_grupo']) || empty($_POST['descripcion_grupo'])){
            return $this->vista->mostrarError('Falta completar la descripción del grupo.', $request);
        }
        if (!isset($_POST['imagen_grupo']) || empty($_POST['imagen_grupo'])){
            return $this->vista->mostrarError('Agregue una imagen del grupo.', $request);
        }

        $nombre_grupo = $_POST['nombre_grupo'];
        $descripcion_grupo = $_POST['descripcion_grupo'];
        $imagen_grupo = $_POST['imagen_grupo'] ?? null; //si no es null, asigna valor. Si es null, asigna null.
        
        $id_grupo = $this->modelo->insertarGrupo($nombre_grupo, $descripcion_grupo, $imagen_grupo);
        $this->vista->mostrarExito('EL grupo ha sido agregado correctamente.', $request);

       header('Refresh: 2; url=' . BASE_URL . 'admin_grupos'); //para que muestre el mensaje de éxito.
    }

    public function eliminarGrupo($id_grupo, $request){
        $grupo = $this->modelo->obtenerGrupos($id_grupo);

        if(!$grupo){
            return $this->vista->mostrarError('El grupo alimenticio no existe.', $request);
        }

        //verifico si tiene alimentos antes de eliminar.
        $alimentos = $this->modelo->obtenerItemPorGrupo($id_grupo);
        if (!empty($alimentos)){
            return $this->vista->mostrarError('El grupo alimenticio seleccionado contiene alimentos. Es necesario que esté vacío para eliminarlo.', $request);
        } else {
            $this->modelo->eliminarGrupo($id_grupo);
        }

        $this->vista->mostrarExito('El grupo alimenticio ha sido eliminado correctamente.', $request);

        header('Refresh: 2; url=' . BASE_URL . 'admin_grupos'); //para que muestre el mensaje de éxito.
    }

    public function formEditarGrupo($id_grupo, $request){
        $grupo = $this->modelo->obtenerIdGrupo($id_grupo);

        if (!$grupo){
            return $this->vista->mostrarError('El grupo que desea actualizar no existe.',$request);
        }
        
        $this->vista->formEditarGrupo($grupo, $request->usuario);
    }

    public function editarGrupo($request){
        if (!isset($_POST['id_grupo']) || empty($_POST['id_grupo'])){
            return $this->vista->mostrarError('Falta el ID del grupo alimenticio.', $request);
        }
        if (!isset($_POST['E_nombre_grupo']) || empty($_POST['E_nombre_grupo'])){
            return $this->vista->mostrarError('Falta el nombre del grupo alimenticio.', $request);
        }
        if (!isset($_POST['E_descripcion_grupo']) || empty($_POST['E_descripcion_grupo'])){
            return $this->vista->mostrarError('Falta la descripción del grupo alimenticio.', $request);
        }
        if (!isset($_POST['E_imagen_grupo']) || empty($_POST['E_imagen_grupo'])){
            return $this->vista->mostrarError('Falta la imagen (URL) del grupo alimenticio.', $request);
        }

        $id_grupo = $_POST['id_grupo'];
        $E_nombre_grupo = $_POST['E_nombre_grupo'];
        $E_descripcion_grupo = $_POST['E_descripcion_grupo'];
        $E_imagen_grupo = $_POST['E_imagen_grupo'] ?? null;

        $this->modelo->actualizarGrupo($id_grupo, $E_nombre_grupo, $E_descripcion_grupo, $E_imagen_grupo);
        $this->vista->mostrarExito('El grupo alimenticio ha sido actualizado correctamente.', $request);

        header('Refresh: 2; url=' . BASE_URL . 'admin_grupos'); //para que muestre el mensaje de éxito.
    }

    public function default($request){
        $this->vista->mostrarError('Ocurrió un error.', $request);
    }
}