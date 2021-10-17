<main class="contenedor">
    <h2>Actualizar propiedad</h2>

    <a href="/public/admin" class="boton-verde">Volver</a>

    <!-- ALERTAR Y ERRORES -->
    <?php foreach($errores as $error): ?>

    <div class="contenedor alerta error">
        <?php echo $error; ?>
    </div>    

    <?php endforeach; ?>
    <!-- END ALERTAR Y ERRORES -->

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" class="submit boton-verde" value="Actualizar">
    </form>
</main>