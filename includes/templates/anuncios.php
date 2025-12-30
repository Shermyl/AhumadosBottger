<?php 
    // Importar la conexión
    require __DIR__ . '/../../includes/config/database.php';
    $db = conectarDB();


    // consultar
    $query = "SELECT * FROM productos LIMIT $limite";

    // obtener resultado
    $resultado = mysqli_query($db, $query);


?>

<div class="contenedor-anuncios">
        <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">

            <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['nombreProducto']; ?></h3>
                <p><?php echo $propiedad['descripcion']; ?></p>
                <p class="precio">$<?php echo $propiedad['precio']; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono cantidad">
                        <p><?php echo $propiedad['cantidad']; ?> unidades</p>
                    </li>
                    <!-- Opcional: Muestra el nombre del delivery    icono_delivery-->
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_delivery.svg" alt="icono delivery">
                        <p><?php echo $propiedad['delivery_id']; ?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->
        <?php endwhile; ?>
    </div> <!--.contenedor-anuncios-->

<?php 

    // Cerrar la conexión
    mysqli_close($db);
?>