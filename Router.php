<?php
namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); 
        }

        // Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        }
        else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        $auth = $_SESSION['login'] ?? null;

        if (in_array($urlActual, $rutas_protegidas)) {
            if (!$auth) {
                header('Location: /');
            }
        }

        if($fn){
            // La ruta existe y tiene una función asociada
            call_user_func($fn, $this); 
        } else {
            echo 'Página no encontrada';
        }


    }
    //muestra una vista
    public function render($view, $datos = []){
        foreach($datos as $key => $value){
            $$key = $value; // $$key es una variable de variable
        }

        ob_start();
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}