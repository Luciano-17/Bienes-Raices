<main class="contenedor">
    <h2>Registrar vendedor/a</h2>

    <a href="/public/admin" class="boton-verde">Volver</a>

    <!-- ALERTAR Y ERRORES -->
    <?php foreach($errores as $error): ?>

    <div class="contenedor alerta error">
        <?php echo $error; ?>
    </div>    
    
    <?php endforeach; ?>
    <!-- END ALERTAR Y ERRORES -->

    <!-- FORMULARIO CREAR -->
    <form class="formulario" method="POST" action="/public/crearVendedor">
        <?php include 'formulario.php'; ?>

        <input type="submit" class="submit boton-verde" value="Registrar">
    </form>
    <!-- END FORMULARIO CREAR -->
</main>