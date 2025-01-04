<?php

namespace Controller;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

    class PaginasController {
        public static function index(Router $router){

            $propiedades = Propiedad::get(3);
            $inicio = true;
            $router->render('paginas/index',
            [
                'propiedades' => $propiedades,
                'inicio' => $inicio
            ]
            );
        }
        public static function nosotros(Router $router){
            $router->render('paginas/nosotros');
        }
        public static function propiedades(Router $router){

            $propiedades = Propiedad::all();
            $router->render('paginas/propiedades',
            [
                'propiedades' => $propiedades
            ]
            );
        }
        public static function propiedad(Router $router){
            $id = validarORedireccionar('/propiedades');
            $propiedad = Propiedad::find($id);

            $router->render('paginas/propiedad',
            [
                'propiedad' => $propiedad
            ]
            );
        }
        public static function blog(Router $router){
            $router->render('paginas/blog');
        }
        public static function entrada(Router $router){
            $router->render('paginas/entrada');
        }
        public static function contacto(Router $router){
            $mensaje = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $respuesta = $_POST['contacto'];
                //crear una nueva instancia de phpmailer
                $mail = new PHPMailer();

                //configurar SMTP
                $mail->isSMTP();
                $mail->Host = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Username = 'ba067f1cc349e8';
                $mail->Password = 'd7cc313a521ad7';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 465;

                //configurar el contenido del email
                $mail->setFrom('yonier202@gmail.com');
                $mail->addAddress('yonier202@gmail.com', 'Jhonier Rojas');  
                $mail->Subject = 'Tienes un nuevo mensaje';
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';

                $contenido = '<html>';
                $contenido .= '<p>Tienes un nuevo mensaje</p>';
                $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . '</p>';

                if ($respuesta['contacto'] === 'telefono') {
                    $contenido  .= '<p>Eligió ser contactado por telefono:</p>';
                    $contenido .= '<p>Telefono: ' . $respuesta['telefono'] . '</p>';
                    $contenido .= '<p>Fecha: ' . $respuesta['fecha'] . '</p>';
                    $contenido .= '<p>Hora: ' . $respuesta['hora'] . '</p>';
                }else{
                    $contenido  .= '<p>Eligió ser contactado por Email:</p>';
                    $contenido .= '<p>Email: ' . $respuesta['email'] . '</p>';
                }
                $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>';
                $contenido .= '<p>Vende o Compra: ' . $respuesta['tipo'] . '</p>';
                $contenido .= '<p>Cantidad: ' . $respuesta['cantidad'] . '</p>';
                $contenido .= '<p>Contactar por: ' . $respuesta['contacto'] . '</p>';
                
                $contenido .= '</html>';

                $mail->Body = $contenido;
                $mail->AltBody = 'Esto es texto alternativo sin HTML';
                

                //enviar el email
                $mail->send();
                if ($mail->send()) {
                    $mensaje = 'Mensaje enviado';
                }else{
                    $mensaje = 'Error al enviar el mensaje';
                }
            
            }
            $router->render('paginas/contacto', [
                'mensaje' => $mensaje
            ]);
        }

    }