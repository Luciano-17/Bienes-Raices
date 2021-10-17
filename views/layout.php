<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false;

    if (!isset($inicio)) {
        $inicio = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body id="body">
    <!-- HEADER -->
    <header class="<?php echo $inicio ? 'inicio contenedor-header' : 'base'; ?>">
        <div class="contenedor contenido-header">
            <div class="header">
                <a href="/public/">
                    <img src="build/img/logo.svg" alt="logotipo" class="logo">
                </a>

                <div class="contenedor-navegacion">
                    <div class="utilidades-navegacion">
                        <img src="build/img/barras.svg" alt="barras navegacion" class="utilidad menu-mobile" id="mobile-menu">
                        <img src="build/img/dark-mode.svg" alt="dark mode" class="dark-mode utilidad" id="darkMode">
                    </div>

                    <nav class="navegacion-principal navegacion">
                        <a href="/public/nosotros">Nosotros</a>
                        <a href="/public/propiedades">Anuncios</a>
                        <a href="/public/blog">Blog</a>
                        <a href="/public/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/public/logout">Cerrar sesión</a>
                        <?php else: ?>
                            <a href="/public/login">Iniciar sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>

            <?php echo $inicio ? '<h1 data-cy="heading-sitio">Venta de casas y departamentos <br> exclusivos de lujo</h1>' : ''; ?>
        </div>
    </header>
    <!-- END HEADER -->

    <?php echo $contenido; ?>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="contenedor contenido-footer">
            <nav class="navegacion-footer navegacion">
                <a href="/public/nosotros">Nosotros</a>
                <a href="/public/propiedades">Anuncios</a>
                <a href="/public/blog">Blog</a>
                <a href="/public/contacto">Contacto</a>
            </nav>

            <p class="copyright">
                Todos los derechos reservados &copy; <?php echo date('Y'); ?>
            </p>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- ARCHIVOS JAVASCRIPT -->
    <script src="build/js/bundle.min.js"></script>
    <!-- END ARCHIVOS JAVASCRIPT -->
</body>
</html>