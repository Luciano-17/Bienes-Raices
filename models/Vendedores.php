<?php

namespace Model;

class Vendedores extends ActiveRecord {
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    // Constructor
    public function __construct($args = []) // args es un arreglo por default
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    // Validar
    public function validar() {
        if (!$this->nombre) {
            self::$errores[] = 'Debes añadir un nombre.';
        }
        if (!$this->apellido) {
            self::$errores[] = 'Debes añadir un apellido.';
        }
        if (!$this->telefono) {
            self::$errores[] = 'Debes añadir un teléfono.';
        }
        if (!preg_match('/[0-9]{10}/', $this->telefono)) { // preg_match busca un patron dentro de un texto o string
            // Aqui le decimos que solo acepta digitos del 0 al 9 y que la cantidad de digitos seran 10.
            // Estos son expresiones regulares para validar todo tipo de cosas, como un email, telefono, numero de tarjeta, etc.
            self::$errores[] = 'Formato del teléfono no válido.';
        }

        return self::$errores;
    }
}