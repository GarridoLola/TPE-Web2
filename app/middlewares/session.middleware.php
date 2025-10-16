<?php

    class SessionMiddleware {

        public function run($request){
            if(isset($_SESSION['id_usuario'])){
                $request->usuario = new StdClass();
                $request->usuario->id_usuario = $_SESSION['id_usuario'];
                $request->usuario->nombre_usuario= $_SESSION['nombre_usuario'];   
            } else {
                $request->usuario = null;
            }
            return $request;
        }

    }
