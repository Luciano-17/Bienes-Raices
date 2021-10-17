<?php

namespace MVC;

class Router {
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url,  $fn) {
        $this->rutasGET[$url] = $fn;
    }
    public function post($url,  $fn) {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {
        session_start();

        $auth = $_SESSION['login'] ?? null;

        // Arreglo de rutas protegidas
        $rutasProtegidas = ['/admin', '/crear', '/actualizar', '/eliminar', '/crearVendedor', '/actualizarVendedor', '/eliminarVendedor'];

        $urlActual = $_SERVER['PATH_INFO'] ?? "/";
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        // Proteger las rutas
        if (in_array($urlActual, $rutasProtegidas) && !$auth) {
            header('Location: /public/');
        }

        if ($fn) {
            //La URL existe y hya una funcion asociada
            call_user_func($fn, $this);
            // Nos permite llamar una funcion cuando no sabemos el nombre de dicha funcion
        } else {
            echo "Página no encontrada";
        }
    }

    // Mustra una vista
    public function render($view, $datos = []) {

        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start(); // Inicia un almacenamiento en memoria
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia la memoria
        include __DIR__ . "/views/layout.php";
    }
}