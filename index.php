<?php 
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
        <h1>Conoce Nuestros Beneficios</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Ofrece seguridad a través de medidas de confidencialidad, profesionalismo y cumplimiento normativo. Que se gana ofreciendo seguridad a sus clientes, ademas de una variedad de promociones y oportunidades</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p> Los agentes de Century 21 pueden realizar un análisis detallado del mercado y evaluar tu propiedad de manera precisa, teniendo en cuenta factores como ubicación, tamaño, estado de la propiedad y características únicas.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Century 21 puede implementar estrategias de marketing efectivas para promocionar tu propiedad a un público más amplio, lo que puede atraer compradores calificados más rápidamente.</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Destacados</h2>
        
        <?php 
        $limite =3;
        include 'includes/templates/anuncios.php'
        
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Contactanos y Conoce tu Proximo Hogar</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                      
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Century Diamante Aniversario</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>

                        <p>
                            Diamante Festeja su Aniversario
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada2.php">
                        <h4>Feliz Dia de Dar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>

                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Reseñas</h3>

            <div class="testimonial">
                <blockquote>
                     Profesionales comprometidos, atención personalizada y una casa que superó todas mis expectativas. ¡Gracias por hacer realidad el sueño de tener la casa perfecta!"
                </blockquote>
                <p>- María G.</p>
            </div>
        </section>
    </div>
<?php 
    incluirTemplate('footer');
?>