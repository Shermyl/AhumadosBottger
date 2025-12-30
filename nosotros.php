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

                <p>Ahumados Bottger es un emprendimiento familiar de Puerto Maldonado, Madre de Dios, especializado en carnes ahumadas artesanales de alta calidad, selladas al vacío para conservar todo su sabor y frescura.
                Ofrecemos costilla, lomo, chorizo ahumado y más, elaborados con recetas tradicionales y un cuidadoso proceso de ahumado que resalta los auténticos sabores de la Amazonía.
                Trabajamos con ingredientes frescos y pasión por el detalle, para llevar a tu mesa un producto único y delicioso.</p>

                <p>Actualmente recibimos pedidos por WhatsApp y realizamos entregas a domicilio en toda la ciudad.
                Sabemos que la calidad no basta: por eso estamos dando un gran paso hacia la modernización con nuestra nueva tienda en línea.</p>

                <p>Pronto podrás explorar el catálogo completo, armar tu pedido en minutos, seguir el estado de tu envío y disfrutar de una experiencia de compra mucho más cómoda y confiable.
                En Ahumados Bottger combinamos la tradición del ahumado artesanal con la comodidad que mereces.
                Porque un buen sabor merece llegar perfecto y sin complicaciones.
                ¡Prepárate para descubrir el verdadero sabor ahumado de Puerto Maldonado!
                Bienvenidos a la nueva forma de disfrutar Ahumados Bottger.</p>
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