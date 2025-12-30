<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    ¡Bienvenido a nuestra casa de humo, sabor y tradición!
                </blockquote>

                <p>En Ahumados Bottger, no solo vendemos carne ahumada, vivimos y respiramos el arte del ahumado. Hemos dedicado nuestra pasión y tradición familiar a seleccionar los mejores cortes y ahumarlos con maderas naturales, logrando un sabor profundo, auténtico e inconfundible que deleita a nuestros clientes en cada bocado.</p>

                <p>Creemos que un buen ahumado puede transformar cualquier momento: desde una reunión familiar hasta una tarde de antojo. Por eso, nos esforzamos cada día en mantener la calidad, el sabor artesanal y la calidez en cada producto que preparamos con dedicación.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>GARANTÍA</h3>
                <p>Confiamos tanto en nuestros productos que te garantizamos su sabor, frescura y calidad. Si algo no cumple tus expectativas, nosotros nos hacemos responsables. Tu satisfacción es nuestra prioridad.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>PRECIO</h3>
                <p>Ofrecemos los mejores precios del mercado, garantizando siempre la calidad de nuestros productos. Si encuentras un precio mejor, haremos lo posible por igualarlo.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A TIEMPO</h3>
                <p>Nos comprometemos a entregar tus pedidos en el plazo acordado. Si por alguna razón no podemos cumplir con este compromiso, te informaremos de inmediato y buscaremos una solución.</p>
            </div>
        </div>
    </section>

<?php 
    incluirTemplate('footer');
?>