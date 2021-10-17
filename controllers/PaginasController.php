<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router) {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros', []);
    }

    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router) {
        $id = redireccionar('/public/propiedades');
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router) {
        $router->render('paginas/blog', []);
    }

    public static function entrada(Router $router) {
        $router->render('paginas/entrada', []);
    }

    public static function contacto(Router $router) {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuesta = $_POST['contacto'];

            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP - Protocolo para el envio de emials, como el HTTP para la visita de paginas -
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '35036dbb71799f';
            $mail->Password = '297178d5b74466';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com'); // Le damos una direccion predefinida porque si nos envian mail persnas que no conocemos vana parar a la casilla de no deseados, por lo que no queremos eso
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . '</p>';
            $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>';

            // Enviar de forma condicional algunos campos de email o telefono
            if ($respuesta['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió ser contactado por teléfono</p>';
                $contenido .= '<p>Teléfono: ' . $respuesta['telefono'] . '</p>';
                $contenido .= '<p>Fecha contacto: ' . $respuesta['fecha'] . '</p>';
                $contenido .= '<p>Hora contacto: ' . $respuesta['hora'] . '</p>';
            } else {
                $contenido .= '<p>Eligió ser contactado por email</p>';
                $contenido .= '<p>Email: ' . $respuesta['email'] . '</p>';
            }

            $contenido .= '<p>Vende o compra: ' . $respuesta['tipo'] . '</p>';
            $contenido .= '<p>Precio o presupuesto: $' . $respuesta['precio'] . '</p>';
            
            $contenido .= '</html>';
            
            $mail->Body = $contenido;
            $mail->AltBody = "Texto alternativo sin HTML";

            // Enviar el email
            if ($mail->send()) {
                $mensaje = 'Mensaje enviado correctamente';
            } else {
                $mensaje = 'El mensaje no se pudo enviar';
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}