    <!-- CONTACTO -->
    <main class="contenedor padding">
        <h2>Contacto</h2>

        <?php
            if ($mensaje) {
                echo "<p class='alerta exito'>" . $mensaje . "</p>";
            }
        
        ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Imagen descatacada" loading="lazy">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario" action="/public/contacto" method="POST">
            <fieldset class="fieldset">
                <legend>Información personal</legend>

                <div class="contenido-contacto">
                    <input type="text" placeholder="Nombre" name="contacto[nombre]" required>
                    <textarea type="text" placeholder="Mensaje" name="contacto[mensaje]" required></textarea>
                </div>
            </fieldset>

            <fieldset class="fieldset">
                <legend>Información sobre la propiedad</legend>

                <div class="contenido-contacto">
                    <label for="opciones">Vende o Compra:</label>
                    <select id="opciones" name="contacto[tipo]" required>
                        <option value="" selected disabled>-- Seleccione --</option>
                        <option value="Vende">Vende</option>
                        <option value="Compra">Compra</option>
                    </select>

                    <input type="number" placeholder="Precio o Presupuesto" name="contacto[precio]" required>
                </div>
            </fieldset>

            <fieldset class="fieldset">
                <legend>Contacto</legend>

                <div class="informacion-contacto">
                    <p class="texto-contacto">¿Como desea ser contactado?</p>

                    <div class="forma-contacto">
                        <div class="forma">
                            <label for="contactar-telefono">Teléfono</label>
                            <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>
                        </div>

                        <div class="forma">
                            <label for="contactar-email">E-mail</label>
                            <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                        </div>
                    </div>

                    <div id="contacto"></div>
                </div>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde submit">
        </form>
    </main>
    <!-- END CONTACTO -->