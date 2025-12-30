<?php 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
    }

    // Importar la conexión
    require 'includes/config/database.php';
    $db = conectarDB();


    // consultar
    $query = "SELECT * FROM productos WHERE id = {$id}";

    // obtener resultado
    $resultado = mysqli_query($db, $query);

    if(!$resultado->num_rows) {
        header('Location: /');
    } 
    
    $producto = mysqli_fetch_assoc($resultado);


    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $producto['nombreProducto']; ?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $producto['imagen']; ?>" alt="imagen del producto">

        <div class="resumen-producto">
            <p class="precio">$<?php echo $producto['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono delivery">
                    <p><?php echo $producto['cantidad']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $producto['delivery_id']; ?></p>
                </li>
            </ul>

            <?php echo $producto['descripcion']; ?>
        </div>
    </main>

<?php 
    mysqli_close($db);

    incluirTemplate('footer');
?>