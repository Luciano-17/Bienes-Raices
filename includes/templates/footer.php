    <!-- FOOTER -->
    <footer class="footer">
        <div class="contenedor contenido-footer">
            <nav class="navegacion-footer navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>

            <p class="copyright">
                Todos los derechos reservados &copy; <?php echo date('Y'); ?>
            </p>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- ARCHIVOS JAVASCRIPT -->
    <script src="<?php echo $admin ? '../../build/js/bundle.min.js' : 'build/js/bundle.min.js' ?>"></script>
    <!-- END ARCHIVOS JAVASCRIPT -->
</body>
</html>