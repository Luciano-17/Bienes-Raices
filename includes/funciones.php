<?php

use Model\Propiedad;

define('TEMPLATES_URL', __DIR__ . '/templates'); //DIR toma la direccion del archivo actual, para despues poder ir a buscar lo demás.
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplates (string $nombre, bool $inicio = false, bool $admin = false) {
    include TEMPLATES_URL . "/${nombre}.php";
}

function autenticacion() {
    session_start();
    
    if (!$_SESSION['login']) {
        header('Location: ../../index.php');
    }
}

function debugear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa-sanitizar el HTML
function sanitizar($html) : string {
    $sanitizado = htmlspecialchars($html);
    return $sanitizado;
}

// Validar tipo de contenido
function validarTipoContenido($tipo) {
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos); // in_array busca un string o valor dentro de un arreglo.
    // Primer parametro es lo que se va a buscar. El segundo parametro en donde se va a buscar.
}

// Muestra los mensajes
function mostrarNotificacion($codigo) {
    $mensaje = '';

    switch($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

function redireccionar(string $url) {
    // Validar la URL con el id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: ${url}");
    }

    return $id;
}