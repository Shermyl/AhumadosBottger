<?php  
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>GARANTÍA</h3>
                <p>Confiamos tanto en nuestros productos que te garantizamos su sabor, frescura y calidad. Si algo no cumple tus expectativas, nosotros nos hacemos responsables. Tu satisfacción es nuestra prioridad.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Ofrecemos los mejores ahumados al precio más justo. Invertimos en ingredientes de primera y un proceso artesanal para que cada bocado sea una experiencia, sin sorpresas en tu bolsillo.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Valoramos tu antojo. Trabajamos con entregas rápidas y confiables para que disfrutes de la frescura y calidad de nuestros ahumados en la puerta de tu casa, justo cuando lo esperas.</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Productos en venta</h2>

        <?php 

            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra los mejores productos</h2>
        <p>Llena el formulario para su delivery</p>
        <a href="contacto.php" class="boton-amarillo">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>El Secreto Detrás del Sabor Inigualable de Nuestros Ahumados</h4>
                        <p class="informacion-meta">Escrito el: <span>20/11/2025</span> por: <span>Admin</span> </p>

                        <p>
                            Descubre cómo transformamos cortes selectos en auténticas obras maestras ahumadas. Usamos solo maderas naturales, tiempos de curación precisos y el saber hacer de generaciones para ofrecerte el sabor más intenso y natural. ¡Ahumar no es solo una técnica, es nuestra pasión!
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Más que un Acompañante: Ideas para Disfrutar al Máximo Nuestros Ahumados</h4>
                        <p class="informacion-meta">Escrito el: <span>20/12/2025</span> por: <span>Admin</span> </p>

                        <p>
                            Desde el desayuno hasta la cena, nuestros productos pueden ser el protagonista. Aprende cómo convertir unos simples Tocitos en el toque crujiente de tu ensalada, o cómo nuestra Cecina puede elevar una pizza sencilla a un manjar gourmet. Te damos tips fáciles para sacarles todo el partido.
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    ¡Simplemente los mejores ahumados de la zona! Calidad, sabor y atención de 10. Mi favorito: los Tocitos. ¡Altamente recomendados!
                </blockquote>
                <p>- Anonimo</p>
            </div>
        </section>
    </div>
<?php 
    incluirTemplate('footer');
?>