<div class="propiedades">
    <?php foreach ($propiedades as $propiedad): ?>
        <div class="propiedad">
            <img src="imagenes/<?php echo $propiedad->imagen; ?>" alt="Vivienda" loading="lazy">

            <div class="datos-propiedad">
                <h3 class="no-margin-top"><?php echo $propiedad->titulo; ?></h3>

                <p class="texto-propiedad">
                    <?php echo $propiedad->descripcion; ?>
                </p>
                
                <p class="precio-propiedad">$ <?php echo $propiedad->precio; ?></p>

                <div class="caracteristicas">
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

                <a href="/public/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo">Ver propiedad</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>