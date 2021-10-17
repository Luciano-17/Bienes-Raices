<main class="contenedor">
    <h2>Administrador de Bienes Raices</h2>

    <?php 
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo sanitizar($mensaje); ?></p>
        <?php }
    } ?>
    
    <a href="/public/crear" class="boton-verde">Nueva propiedad</a>
    <a href="/public/crearVendedor" class="boton-verde">Nuevo/a vendedor/a</a>

    <h2>Propiedades</h2>

    <!-- TABLA DE PROPIEDADES -->
    <table class="contenedor tabla-propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los datos de las propiedades desde la DB -->
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td> <?php echo $propiedad->id; ?> </td>
                    <td> <?php echo $propiedad->titulo; ?> </td>
                    <td class="imagen-tabla"> 
                        <img src="imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen de la propiedad"> 
                    </td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/public/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                        
                        <a href="/public/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-azul">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- END TABLA DE PROPIEDADES -->

    <h2>Vendedores</h2>

    <!-- TABLA DE VENDEDORES -->
    <table class="contenedor tabla-propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los datos de las propiedades desde la DB -->
            <?php foreach ($vendedores as $vendedor): ?>
                <tr>
                    <td> <?php echo $vendedor->id; ?> </td>
                    <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>
                    <td> <?php echo $vendedor->telefono; ?> </td>
                    <td>
                        <form method="POST" class="w-100" action="/public/eliminarVendedor">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                        
                        <a href="/public/actualizarVendedor?id=<?php echo $vendedor->id; ?>" class="boton-azul">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- END TABLA DE VENDEDORES -->
</main>