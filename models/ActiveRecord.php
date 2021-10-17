<?php 

namespace Model;

class ActiveRecord {
    // BASE DE DATOS
    protected static $db; // Le ponemos static porque si llegamos a crear 100 propiedades todos deben utilizar la misma conexion. Es mejor tener una que utilizen todos a una por cada propiedad.
    protected static $columnasDB = [];
    protected static $tabla = '';

    // Validaciones
    protected static $errores = [];

    // Definir la conexion a la DB
    public static function setDB ($database) {
        self::$db = $database; // self hace referencia a los atributos static de la misma clase.
    }

    // Guardar propiedad en la DB
    public function guardar() {
        if (!is_null($this->id)) {
            // Actualizar
            $this->actualizar();
        } else {
            // Crear nuevo registro
            $this->crear();
        }
    }

    // Actualizar propiedad
    public function actualizar() {
        // Sanitizar la entrada de los datos
        $datos = $this->sanitizarDatos();

        $valores = [];
        foreach ($datos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            // Redireccionar al usuario
            header('location: C:\laragon\www\bienesraices_inicioPHPPOO\admin\propiedades\index.php?resultado=2');
        }
    }

    // Crear propiedades
    public function crear() {
        // Sanitizar la entrada de los datos
        $datos = $this->sanitizarDatos();

        // $string = join(', ', array_keys($datos)); Join crea un nuevo string a partir de un arreglo. Toma dos parametros: el primero es el separador para cada string (en este caso una coma y un espacio), el segundo es el arreglo sobre donde operar.

        // Insertar en la DB
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($datos)); 
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($datos));
        $query .= " ')";

        $resultado = self::$db->query($query);

        // Mensaje de exito o error
        if ($resultado) {
            // Redireccionar al usuario
            header('location: C:\laragon\www\bienesraices_inicioPHPPOO\admin\propiedades\index.php?resultado=1');
        }
    }

    // Se encargara de iterar sobre "columnasDB" para tomar cada atributo
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->columna;
        }
        return $atributos;
    }

    // Se encarga de sanitizar cada atributo
    public function sanitizarDatos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        
        foreach ($atributos as $key => $value) { // key tendra el nombre de las columnas de la DB y value lo que ingreso el usuario
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    // Eliminar una propiedad
    public function eliminar() {
        // Eliminar la propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->espace_string($this->id) . " LIMIT 1";
        debugear($query);
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();

            header('Location: index.php?resultado=3');
        }
    }

    // Eliminar un archivo
    public function borrarImagen() {
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen); // Borra la imagen anterior
        }
    }

    // Subida de archivos
    public function setImagen($imagen) {
        // Eliminar una imagen previa
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        // Asignar al atributo de imagen el de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }
    
    // Validacion
    public static function getErrores() {
        return static::$errores;
    }

    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    // Lista todas las propiedades
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla; // static es otro metodo de acceso que va a buscar la variable desde la clase de donde se este mandando a llamar. self solo hace referencia a la clase presente.
        
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Obtiene determinado numero de registros
    public static function get($cantidad) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Buscar un elemento por el id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado); // array_shift retorna el primer elemento de un arreglo.
    }

    public static function consultarSQL($query) {
        // Consultar la DB
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
    }
    
    protected static function crearObjeto($registro) {
        $objeto = new static; // new self quiere decir la clase padre, en este caso Propiedad

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) { // property_exists verifica que una propiedad exista
                $objeto->$key = $value;
            } 
        }
        
        return $objeto;
    }

    // Sincroniza el objeto en memoria con los cmabios que realiza el usuario
    public function sincronizar($args = []) {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}