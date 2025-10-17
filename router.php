<?php 
require_once 'app/controladores/alimentos.controlador.php';
require_once 'app/controladores/grupos.controlador.php';
require_once 'app/controladores/home.controlador.php';
require_once 'app/controladores/usuario.controlador.php';

require_once 'app/middlewares/guard.middleware.php';
require_once 'app/middlewares/session.middleware.php';

session_start();

define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; //por defecto si no se envía ninguna.
if (!empty($_GET['action'])){
    $action = $_GET['action'];
}


$params = explode('/', $action);

$request = new stdClass();
$request = (new SessionMiddleware())->run($request);

switch ($params[0]){

    //home
    case 'home':
        $controlador = new homeControlador();
        $controlador->mostrarHome($request);
    break;

    //administrar
    case 'admin_agregar_alimentos':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new alimentosControlador();
        $controlador->administrarAlimentos($request);
    break;

    case 'admin_agregar_grupos':
        $request = (new GuardMiddleware())->run($request);
        $controladorG = new gruposControlador();
        $controladorG->administrarGrupos($request);
    break;

    //grupos 
    case 'listar_grupos':
        $controlador = new gruposControlador();
        $controlador->mostrarGrupos($request);
    break;
    case 'mostrar_items':
        $controlador = new gruposControlador();
        $controlador->mostrarItemsPorGrupo($params[1], $request);
    break;

    //alimentos
    case 'listar_alimentos':
        $controlador = new alimentosControlador();
        $controlador->mostrarAlimentos($request);
    break;
    case 'alimentos':
        $controlador = new alimentosControlador();
        $controlador->alimentoDetalles($params[1], $request);
    break;

    //autenticación
    
    case 'mostrarLogin': //muestra el login
        $controlador = new usuarioControlador();
        $controlador->mostrarLogin($request);
    break;
    case 'login': //procesa el login
        $controlador = new usuarioControlador();
        $controlador->login($request);
    break;
    case 'logOut':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new usuarioControlador();
        $controlador->logOut($request);
    break;

    //administrador

    //alimentosAdmin
    case 'admin_alimentos':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new alimentosControlador();
        $controlador->mostrarAlimentos($request);
    break;
    case 'agregar_alimento':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new alimentosControlador();
        $controlador->agregarAlimento($request);
    break;
    case 'eliminar_alimento':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new alimentosControlador();
        $request->id_alimento = $params[1];
        $controlador->borrarAlimento($params[1], $request);
    break;
    case 'form_editar_alimento':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new alimentosControlador();
        $request->id_alimento = $params[1];
        $controlador->formEditarAlimento($params[1], $request);
    break;
    case 'actualizar_alimento':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new alimentosControlador();
        $controlador->editarAlimento($request);
    break;

   //grupos Admin.
    case 'admin_grupos':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new gruposControlador();
        $controlador->mostrarGrupos($request);
    break;
    case 'agregar_grupo':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new gruposControlador();
        $controlador->agregarGrupo($request);
    break;
    case 'eliminar_grupo':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new gruposControlador();
        $request->id_grupo = $params[1];
        $controlador->eliminarGrupo($params[1], $request);
    break;
    case 'form_editar_grupo':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new gruposControlador();
        $controlador->formEditarGrupo($params[1], $request); //vista con los datos.
    break;
    case 'actualizar_grupo':
        $request = (new GuardMiddleware())->run($request);
        $controlador = new gruposControlador();
        $controlador->editarGrupo($request);
    break;

    default: 
        $controlador = new alimentosControlador();
        $controlador->default($request);
    break;

}