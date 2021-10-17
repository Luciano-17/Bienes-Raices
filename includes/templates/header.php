<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>

    <link rel="preload" href="<?php echo $admin ? '../../build/css/app.css' : 'build/css/app.css' ?>" as="style">
    <link rel="stylesheet" href="<?php echo $admin ? '../../build/css/app.css' : 'build/css/app.css' ?>">
</head>
<body id="body">
    <!-- HEADER -->
    <header class="<?php echo $inicio ? 'inicio contenedor-header' : 'base'; ?>">
        <div class="contenedor contenido-header">
            <div class="header">
                <a href="index.php">
                    <img src="<?php echo $admin ? '../../build/img/logo.svg' : 'build/img/logo.svg' ?>" alt="logotipo" class="logo">
                </a>

                <div class="contenedor-navegacion">
                    <div class="utilidades-navegacion">
                        <img src="<?php echo $admin ? '../../build/img/barras.svg' : 'build/img/barras.svg' ?>" alt="barras navegacion" class="utilidad menu-mobile" id="mobile-menu">
                        <img src="<?php echo $admin ? '../../build/img/dark-mode.svg' : 'build/img/dark-mode.svg' ?>" alt="dark mode" class="dark-mode utilidad" id="darkMode">
                    </div>

                    <nav class="navegacion-principal navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/laragon/www/bienesraices_inicio/cerrar-sesion.php">Cerrar sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>

            <?php echo $inicio ? '<h1>Venta de casas y departamentos <br> exclusivos de lujo</h1>' : ''; ?>
        </div>
    </header>
    <!-- END HEADER -->