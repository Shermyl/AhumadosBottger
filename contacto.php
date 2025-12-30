<?php 

    // Procesar el formulario si se envía
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'includes/config/database.php';
        $db = conectarDB();

        $producto_id = mysqli_real_escape_string($db, $_POST['producto_id']);
        $cantidad = mysqli_real_escape_string($db, $_POST['cantidad']);
        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $telefono = mysqli_real_escape_string($db, $_POST['telefono']);

        // Validaciones básicas
        if (!$producto_id || !$cantidad || !$nombre || !$email || !$telefono) {
            $error = "Todos los campos son obligatorios";
        } else {
            // Insertar en la base de datos
            $query = "INSERT INTO pedidos (producto_id, cantidad, nombre_cliente, email, telefono) VALUES ('$producto_id', '$cantidad', '$nombre', '$email', '$telefono')";
            
            if (mysqli_query($db, $query)) {
                $mensaje = "¡Pedido realizado con éxito! Nos contactaremos contigo pronto.";
            } else {
                $error = "Error al guardar el pedido: " . mysqli_error($db);
            }
        }
        mysqli_close($db);
    }




    require 'includes/funciones.php';
    
    // Obtener productos para el select
    require 'includes/config/database.php';
    $db = conectarDB();
    $resultado = mysqli_query($db, "SELECT id, nombreProducto, precio FROM productos");

    incluirTemplate('header', false);
?>

<main class="contenedor seccion">
    <h1>Hacer Pedido</h1>

    <picture>
        <source srcset="build/img/nosotros.webp" type="image/webp">
        <source srcset="build/img/nosotros.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/nosotros.avif" alt="Logo Ahumados Bottger">
    </picture>

    <h2>Complete su pedido</h2>
    <?php if (isset($mensaje)): ?>
            <div class="alerta exito"><?php echo $mensaje; ?></div>
        <?php elseif (isset($error)): ?>
            <div class="alerta error"><?php echo $error; ?></div>
        <?php endif; ?>

    <form class="formulario" method="POST" action="contacto.php">
        <fieldset>
            <legend>Información del Producto</legend>

            <label for="producto">Seleccione Producto:</label>
            <select name="producto_id" id="producto" required>
                <option value="">-- Seleccione --</option>
                <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
                    <option value="<?php echo $producto['id']; ?>">
                        <?php echo $producto['nombreProducto'] . " - $" . $producto['precio']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" min="1" value="1" required>
        </fieldset>

        <fieldset>
            <legend>Datos de Contacto</legend>

            <label for="nombre">Nombre Completo</label>
            <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre" required>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Tu Email" required>

            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" id="telefono" placeholder="Tu Teléfono" required>
        </fieldset>

        <fieldset>
            <legend>Entrega</legend>

            <label for="fecha">Fecha de entrega:</label>
            <input type="date" name="fecha" id="fecha" min="<?php echo date('Y-m-d'); ?>" required>

            <label for="hora">Hora de entrega:</label>
            <input type="time" name="hora" id="hora" min="09:00" max="18:00" required>
        </fieldset>

        <input type="submit" value="Enviar Pedido" class="boton-verde">
    </form>
</main>

<?php 
    mysqli_close($db);
    incluirTemplate('footer');
?>