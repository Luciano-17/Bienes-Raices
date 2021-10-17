    <!-- ANUNCIO -->
    <main class="contenedor padding">
        <h2><?php echo $propiedad->titulo; ?></h2>

        <div class="imagen-anuncio">
            <img src="imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad" loading="lazy" class="imagen-anuncio">
        </div>

        <p class="precio-propiedad">$ <?php echo $propiedad->precio; ?></p>

        <div class="caracteristicas caracteristica-anuncio">
            <div class="caracteristica">
                <img src="build/img/icono_wc.svg" alt="icono wc">
                <p><?php echo $propiedad->wc; ?></p>
            </div>

            <div class="caracteristica">
                <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </div>

            <div class="caracteristica">
                <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </div>
        </div>

        <p>
            <?php echo $propiedad->descripcion; ?>
        </p>
    </main>
    <!-- ANUNCIO -->