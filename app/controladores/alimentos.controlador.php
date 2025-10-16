<?php

require_once 'app/modelos/alimentos.modelo.php';
require_once 'app/modelos/grupos.modelo.php';
require_once 'app/vistas/alimentos.vista.php';

class alimentosControlador{
    private $modelo;
    private $vista;
    private $adminGruposModelo;


    public function __construct(){
        $this->modelo = new alimentosModelo();
        $this->vista = new alimentosVista();

        $this->adminGruposModelo = new gruposModelo;
    }
    
    public function mostrarAlimentos($request){
        $alimentos = $this->modelo->obtenerAlimentos();
        $grupos = $this->adminGruposModelo->obtenerGrupos();

        return $this->vista->listarAlimentos($alimentos, $grupos, $request->usuario);
        
    }

    public function alimentoDetalles($id_alimento, $request){
        $alimento = $this->modelo->obtenerAlimentoDetalle($id_alimento);

        if ($alimento){
            $this->vista->mostrarDetalles($alimento, $request->usuario);
        } else {
            $this->vista->alertaError('Alimento no encontrado.', $request);
        }
    }

    //métodos admin.
        //administrar
        public function administrarAlimentos($request){
            $alimento = $this->modelo->obtenerAlimentos();
            $grupo = $this->adminGruposModelo->obtenerGrupos();

            $this->vista->adminAlimentos($alimento, $grupo, $request->usuario);
        }

        public function agregarAlimento($request){
            if (!isset($_POST['nombre_alimento']) || empty($_POST['nombre_alimento'])){
               return $this->vista->alertaError('Completa con el nombre del alimento.', $request);
            }
            if (!isset($_POST['descripcion_alimento']) || empty($_POST['descripcion_alimento'])){
               return $this->vista->alertaError('Completa con la descripcion del alimento.', $request);
            }
            if (!isset($_POST['calorias']) || trim($_POST['calorias']) === ''){ //sino no acepta los 0.
                return $this->vista->alertaError('Completa con las calorías del alimento.', $request);
            } 
            if (!isset($_POST['proteinas']) || trim($_POST['proteinas']) === ''){
                return $this->vista->alertaError('Completa con las proteínas del alimento.', $request);
            }
            if (!isset($_POST['carbohidratos']) || trim($_POST['carbohidratos']) === ''){
                return $this->vista->alertaError('Completa con los carbohidratos del alimento.', $request);
            }
            if (!isset($_POST['grasas']) || trim($_POST['grasas']) === ''){
                return $this->vista->alertaError('Completa con las grasas del alimento.', $request);
            }
            if (!isset($_POST['fibras']) || trim($_POST['fibras']) === ''){
                return $this->vista->alertaError('Completa con las fibras del alimento.', $request);
            }
            if (!isset($_POST['imagen_alimento']) || empty($_POST['imagen_alimento'])){
                return $this->vista->alertaError('Agregue una imagen (URL) del alimento.', $request);
            }

            $nombre_alimento = $_POST['nombre_alimento'];
            $grupo = $_POST['grupo'];
            $descripcion_alimento = $_POST['descripcion_alimento'];
            $calorias = $_POST['calorias'];
            $proteinas = $_POST['proteinas'];
            $carbohidratos = $_POST['carbohidratos'];
            $fibras = $_POST['fibras'];
            $grasas = $_POST['grasas'];
            
            $imagen_alimento = $_POST['imagen_alimento'] ?? null; //si no existe, le asigna null.

            $id_alimento = $this->modelo->insertarAlimento($nombre_alimento, $grupo, $descripcion_alimento, $calorias, $proteinas, $carbohidratos, $fibras, $grasas, $imagen_alimento);
            $this->vista->alertaExito('El alimento ha sido agregado correctamente.', $request);

            header('Refresh: 2; url=' . BASE_URL . 'admin_alimentos'); //muestra el mensaje de éxito.
        }

        public function borrarAlimento($id_alimento, $request){
            $alimento = $this->modelo->obtenerALimentoDetalle($id_alimento);

            if (!$alimento){
                return $this->vista->alertaError('El alimento no existe.', $request);
            }

            $this->modelo->eliminarAlimento($id_alimento);
            $this->vista->alertaExito('El alimento a sido eliminado correctamente.', $request);

            header('Refresh: 2; url=' . BASE_URL . 'admin_alimentos');
        }

        public function formEditarAlimento($id_alimento, $request){
            $alimento = $this->modelo->obtenerALimentoDetalle($id_alimento);
            $grupos = $this->adminGruposModelo->obtenerGrupos();

            if (!$alimento){
                return $this->vista->alertaError('El alimento no existe.', $request);
            }

            $this->vista->formEditarAlimento($alimento, $grupos, $request->usuario);
        }

        public function editarAlimento($request){
            if (!isset($_POST['id_alimento']) || empty($_POST['id_alimento'])){
                return $this->vista->alertaError('Falta el ID del elemento.', $request);
            }
            if (!isset($_POST['id_grupo']) || empty($_POST['id_grupo'])){
                return $this->vista->alertaError('Complete con el grupo.', $request);
            }
             if (!isset($_POST['E_nombre_alimento']) || empty($_POST['E_nombre_alimento'])){
                return $this->vista->alertaError('Complete con el nombre del alimento.', $request);
            } 
            if (!isset($_POST['E_descripcion_alimento']) || empty($_POST['E_descripcion_alimento'])){
                return $this->vista->alertaError('Complete con la descripción del alimento.', $request);
            }  
            if (!isset($_POST['E_calorias']) || trim($_POST['E_calorias']) === ''){ //sino no acepta los 0.
                return $this->vista->alertaError('Complete con las calorías del alimento.', $request);
            }  
            if (!isset($_POST['E_proteinas']) || trim($_POST['E_proteinas']) === ''){ 
                return $this->vista->alertaError('Complete con las proteinas del alimento.', $request);
            }
            if (!isset($_POST['E_carbohidratos']) || trim($_POST['E_carbohidratos']) === ''){ 
                return $this->vista->alertaError('Complete con los carbohidratos del alimento.', $request);
            }
             if (!isset($_POST['E_grasas']) || trim($_POST['E_grasas']) === ''){ 
                return $this->vista->alertaError('Complete con las grasas del alimento.', $request);
            }
            if (!isset($_POST['E_fibras']) || trim($_POST['E_fibras']) === ''){ 
                return $this->vista->alertaError('Complete con las fibras del alimento.', $request);
            }
             if (!isset($_POST['E_imagen_alimento']) || empty($_POST['E_imagen_alimento'])){ 
                return $this->vista->alertaError('Agregue una imagen (URL) del alimento.', $request);
            }

            $id_alimento = $_POST['id_alimento'];
            $E_nombre_alimento = $_POST['E_nombre_alimento'];
            $E_grupo = $_POST['id_grupo'];
            $E_descripción_alimento = $_POST['E_descripcion_alimento'];
            $E_calorias = $_POST['E_calorias'];
            $E_proteinas = $_POST['E_proteinas'];
            $E_carbohidratos = $_POST['E_carbohidratos'];
            $E_grasas = $_POST['E_grasas'];
            $E_fibras = $_POST['E_fibras'];
            $E_imagen_alimento = $_POST['E_imagen_alimento'];

            $this->modelo->actualizarAlimento($id_alimento, $E_nombre_alimento, $E_grupo, $E_descripción_alimento, $E_calorias, $E_proteinas, $E_carbohidratos, $E_grasas, $E_fibras, $E_imagen_alimento);
            $this->vista->alertaExito('El alimento ha sido actualizado correctamente.', $request);

            header('Refresh: 2; url=' . BASE_URL . 'admin_alimentos');
        }

        public function default($request){
            $this->vista->alertaError('Ocurrió un error.', $request);
        }
}
