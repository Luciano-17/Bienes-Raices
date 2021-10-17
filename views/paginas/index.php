    <!-- NOSOTROS -->
    <main class="contenedor">
        <?php include 'iconos.php'; ?>
    </main>
    <!-- END NOSOTROS -->

    <!-- PROPIEDADES -->
    <section class="contenedor">
        <h2>Casas y departamentos en venta</h2>

        <?php
            include 'listado.php'; 
        ?>

        <div class="contenedor boton-ver-todos">
            <a href="/public/propiedades" class="boton-verde todas">Ver todas</a>
        </div>
    </section>
    <!-- END PROPIEDADES -->

    <!-- HERO -->
    <section class="hero">
        <div class="contenedor contenido-hero">
            <h2 class="titulo-hero no-margin-top">Encuentra la casa de tus sueños</h2>

            <p class="texto-hero">
                Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad
            </p>

            <a href="/public/contacto" class="boton-amarillo hover-blanco">Contáctanos</a>
        </div>
    </section>
    <!-- END HERO -->

    <!-- BLOG Y TESTIMONIAL -->
    <section class="contenedor">
        <div class="blog-testimonial">
            <!-- blog -->
            <div class="contenido-blog">
                <h2>Nuestro blog</h2>

                <!-- Primer blog -->
                <div class="blog">
                    <picture class="imagen-blog">
                        <source srcset="build/img/blog1.webp" type="type/webp">
                        <source srcset="build/img/blog1.jpg" type="type/jpeg"">
                        <img src="build/img/blog1.jpg" alt="blog 1" loading="lazy">
                    </picture>

                    <div class="texto-blog">
                        <a href="/public/entrada">
                            <h3 class="titulo-blog">Terraza en el techo de tu casa</h3>

                            <p>
                                Escrito el: <span>20/10/2021</span> Por: <span>Admin</span>
                            </p>

                            <p>
                                Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.
                            </p>
                        </a>
                    </div>
                </div>

                <!-- Segundo blog -->
                <div class="blog">
                    <picture class="imagen-blog2">
                        <source srcset="build/img/blog2.webp" type="type/webp">
                        <source srcset="build/img/blog2.jpg" type="type/jpeg"">
                        <img src="build/img/blog2.jpg" alt="blog 2" loading="lazy">
                    </picture>

                    <div class="texto-blog">
                        <a href="/public/entrada">
                            <h3 class="titulo-blog">Terraza en el techo de tu casa</h3>

                            <p>
                                Escrito el: <span>20/10/2021</span> Por: <span>Admin</span>
                            </p>

                            <p>
                                Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.
                            </p>
                        </a>
                    </div>
                </div>
            </div>

            <!-- testimonial -->
            <div class="testimonial">
                <h2>Testimonial</h2>

                <div class="contenido-testimonial">
                    <blockquote>
                        El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                    </blockquote>

                    <p>
                        - Luciano Martin Villarreal
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- END BLOG Y TESTIMONIAL -->