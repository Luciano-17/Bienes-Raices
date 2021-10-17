<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices_inicio');

    if (!$db) {
        echo 'Error al conectar la base de datos';
        exit;
    }

    return $db;
}