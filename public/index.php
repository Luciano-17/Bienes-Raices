<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router = new Router();

// ZONA PRIVADA
// Propiedades
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/crear', [PropiedadController::class, 'crear']);
$router->post('/crear', [PropiedadController::class, 'crear']);
$router->get('/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/eliminar', [PropiedadController::class, 'eliminar']);

// Vendedores
$router->get('/crearVendedor', [VendedorController::class, 'crear']);
$router->POST('/crearVendedor', [VendedorController::class, 'crear']);
$router->get('/actualizarVendedor', [VendedorController::class, 'actualizar']);
$router->post('/actualizarVendedor', [VendedorController::class, 'actualizar']);
$router->get('/eliminarVendedor', [VendedorController::class, 'eliminar']);

// ZONA PUBLICA
// Paginas
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

// Login y autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();