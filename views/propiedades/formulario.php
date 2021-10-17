<fieldset class="fieldset">
    <legend>Información General</legend>

    <div class="contenido-contacto">
        <input type="text" 
            placeholder="Titulo de la propiedad" 
            name="propiedad[titulo]" 
            value="<?php echo sanitizar($propiedad->titulo); ?>"> <!-- el name permite leer lo que el usuario ingresa. -->

        <input type="number" 
            placeholder="Precio de la propiedad" 
            name="propiedad[precio]" 
            value="<?php echo sanitizar($propiedad->precio); ?>">

        <label for="imagen">Imagen de la propiedad:</label>
        <input type="file" 
            id="imagen" 
            name="propiedad[imagen]" 
            accept="image/jpeg, image/png">
        
        <?php if ($propiedad->imagen): ?>
            <img src="../../imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-small">
        <?php endif; ?>

        <textarea placeholder="Descripción" name="propiedad[descripcion]" value="<?php echo sanitizar($propiedad->descripcion); ?>">
        </textarea>
    </div>
</fieldset>

<fieldset class="fieldset">
    <legend>Información de la propiedad</legend>

    <div class="contenido-contacto">
        <label for="habitaciones">Habitaciones:</label>
        <input type="number" 
            id="habitaciones" 
            name="propiedad[habitaciones]" 
            placeholder="Ej: 3" 
            min="1" max="15" 
            value="<?php echo sanitizar($propiedad->habitaciones); ?>">

        <label for="wc">Baños:</label>
        <input type="number" 
            id="wc" name="propiedad[wc]" 
            placeholder="Ej: 3" 
            min="1" max="9" 
            value="<?php echo sanitizar($propiedad->wc); ?>">

        <label for="estacionamiento">Estacionamientos:</label>
        <input type="number" 
            id="estacionamiento" 
            name="propiedad[estacionamiento]" 
            placeholder="Ej: 3" 
            min="0" max="15" 
            value="<?php echo sanitizar($propiedad->estacionamiento); ?>">
    </div>
</fieldset>

<fieldset class="fieldset">
    <legend>Vendedor</legend>

    <div class="contenido-contacto">
        <label for="vendedor">Seleccione el vendedor:</label>
        <select name="propiedad[vendedorId]" id="vendedor">
            <option value="" selected>-- Seleccione --</option>
            <?php foreach ($vendedores as $vendedor): ?>
                <option 
                    <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?>
                    value="<?php echo sanitizar($vendedor->id); ?>">
                        <?php echo sanitizar($vendedor->nombre) . " " . sanitizar($vendedor->apellido); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</fieldset>