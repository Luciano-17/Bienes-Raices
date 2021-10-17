    <main>
        <h2>Iniciar Sesión</h2>

        <?php foreach($errores as $error): ?>
            <div class="contenedor alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario contenedor" method="POST" action="/public/login">
            <fieldset class="fieldset">
                <legend>Email y password</legend>

                <div class="contenido-contacto">
                    <input type="email" name="email" placeholder="Email" required>

                    <input type="password" name="password" placeholder="Password" required>
                </div>
            </fieldset>

            <input type="submit" value="Iniciar sesión" class="boton-verde">
        </form>
    </main>