<?php

namespace Controller;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router){
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);
            $errores = $auth->validar();
            if (empty($errores)) {
                //verificar si el usuario existe
                $resultado = $auth->existeUsuario();
                if (!$resultado) {
                    $errores = Admin::getErrores();
                }else{
                    //USUARIO VALIDO, VERIFICAR PASSWORD
                    $autenticado = $auth->comprobarPassword($resultado);
                    if ($autenticado) {
                        //autenticar al usuario
                        $auth->autenticar();
                    }else{
                        $errores = Admin::getErrores();
                    }
                }
            }

        }
        $router->render('login',
            [
                'errores' => $errores
            ]
        );
    }

    public static function logout(Router $router){
        session_start();
        $_SESSION = [];
        header('location: /');
    }
}
?>