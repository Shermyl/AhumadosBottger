<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>

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
                    <p>Escrito el: <span>20/11/2025</span> por: <span>Admin</span> </p>

                    <p>
                        Descubre cómo transformamos cortes selectos en auténticas obras maestras ahumadas. Usamos solo maderas naturales, tiempos de curación precisos y el saber hacer de generaciones para ofrecerte el sabor más intenso y natural. ¡Ahumar no es solo una técnica, es nuestra pasión!
                    </p>
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
                    <p>Escrito el: <span>20/12/2025</span> por: <span>Admin</span> </p>

                    <p>
                        Desde el desayuno hasta la cena, nuestros productos pueden ser el protagonista. Aprende cómo convertir unos simples Tocitos en el toque crujiente de tu ensalada, o cómo nuestra Cecina puede elevar una pizza sencilla a un manjar gourmet. Te damos tips fáciles para sacarles todo el partido. 
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog3.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Enfocado en la Innovación y Versatilidad</h4>
                    <p>Escrito el: <span>06/01/2025</span> por: <span>Admin</span> </p>

                    <p>
                        ¿Cansado de lo mismo? Te demostramos cómo nuestros ahumados pueden ser el ingrediente secreto que transforma tus platos cotidianos. Desde un risotto con sabor ahumado hasta una salsa para pasta con un toque único, descubre recetas fáciles y creativas que sorprenderán a todos en la mesa.
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog4.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Enfocado en la Historia y el Origen</h4>
                    <p>Escrito el: <span>30/12/2025</span> por: <span>Admin</span> </p>

                    <p>
                        Descubre la rica historia y el proceso de elaboración de nuestros ahumados. Desde la selección de las mejores maderas hasta las técnicas tradicionales de ahumado, te llevamos en un viaje a través del tiempo y el sabor.
                    </p>
                </a>
            </div>
        </article>
    </main>

<?php 
    incluirTemplate('footer');
?>