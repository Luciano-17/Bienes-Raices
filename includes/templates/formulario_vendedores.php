<fieldset class="fieldset">
    <legend> Información General</legend>

    <div class="contenido-contacto">
        <input type="text" 
            placeholder="Nombre" 
            name="vendedor[nombre]" 
            value="<?php echo sanitizar($vendedor->nombre); ?>"> <!-- el name permite leer lo que el usuario ingresa. -->

        <input type="text" 
        placeholder="Apellido" 
        name="vendedor[apellido]" 
        value="<?php echo sanitizar($vendedor->apellido); ?>"> <!-- el name permite leer lo que el usuario ingresa. -->

        <input type="tel" 
            placeholder="Teléfono" 
            name="vendedor[telefono]" 
            value="<?php echo sanitizar($vendedor->telefono); ?>"> <!-- el name permite leer lo que el usuario ingresa. -->
    </div>
</fieldset>