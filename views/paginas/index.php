<section class="contenedor seccion">
    <h2 class="fw-300 centrar-texto">Más Sobre Nosotros</h2>

    <?php 
        include 'iconos.php'; 
    ?>
</section>

<main class="seccion contenedor">
    <h2 class="fw-300 centrar-texto">Casas y Depas en Venta</h2>

    <?php 
        include 'listado.php';
    ?>
    

    <div class="ver-todas">
        <a href="/propiedades" class="boton boton-verde">Ver Todas</a>
    </div>
</main>

<section class="imagen-contacto">
    <div class="contenedor contenido-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton boton-amarillo">Contactános</a>
    </div>
</section>

<div class="seccion-inferior contenedor seccion">
    <section class="blog">
        <h3 class="centrar-texto fw-300">Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <img src="/build/img/blog1.jpg" alt="Entrada de blog">
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                </a>
                <p>Escrito el: <span> 20/10/2019 </span> por: <span> Admin </span> </p>
                <p>Consejos para construir una terraza en el techo de tu casa, con los mejores materiales y ahorrando dinero</p>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <img src="/build/img/blog2.jpg" alt="Entrada de blog">
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                </a>
                <p>Escrito el: <span> 20/10/2019 </span> por: <span> Admin </span> </p>
                <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3 class="centrar-texto fw-300">Testimoniales</h3>
        <div class="testimonial">

            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>- Juan De la torre</p>
        </div>
    </section>

</div>