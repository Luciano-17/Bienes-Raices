<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    // Pagina principal del admin
    public static function index(Router $router) {
        $propiedades = Propiedad::all();

        $vendedores = Vendedores::all();

        // Muestra un mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('/propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    // Pagina para crear una propiedad
    public static function crear(Router $router) {
        $propiedad = new Propiedad;
        $vendedores = Vendedores::all();
        
        // Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vamos a instanciar la clase recien cuando mandemos el formulario por metodo POST
            $propiedad = new Propiedad($_POST['propiedad']);

            // ** SUBIDA DE ARCHIVOS A LA BASE DE DATOS **
            // Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg"; // "md5" forma un id o hash aleatorio, "uniqid" hace que no se repita.
            
            // Realiza un resize a la imagen con intervation
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            // Leemos los errores
            $errores = $propiedad->validar();

            if (empty($errores)) {
                // Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guardar la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guardar en la DB
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores'=> $errores
        ]);
    }

    // Pagina para actualizar una propiedad
    public static function actualizar(Router $router) {
        $id = redireccionar('/public/admin');
        $propiedad = Propiedad::find($id);

        $errores = Propiedad::getErrores();

        $vendedores = Vendedores::all();

        // Metodo POST para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $args = $_POST['propiedad'];
    
            $propiedad->sincronizar($args);
    
            // Validacion
            $errores = $propiedad->validar();
    
            // Subida de archivos
            // Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg"; // "md5" forma un id o hash aleatorio, "uniqid" hace que no se repita.
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }
    
            if (empty($errores)) {
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    // Almacenar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
    
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar() {
        // Eliminar propiedad por el ID
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}