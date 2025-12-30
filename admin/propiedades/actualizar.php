<?php 

    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth) {
        header('Location: /');
    }

    // Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Obtener los datos de la producto, mejor dicho productos delivery
    $consulta = "SELECT * FROM productos WHERE id = {$id}";
    $resultado = mysqli_query($db, $consulta);
    $producto = mysqli_fetch_assoc($resultado);


    // Consultar para obtener los delivery
    $consulta = "SELECT * FROM delivery";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $nombreProducto = $producto['nombreProducto'];
    $precio = $producto['precio'];
    $descripcion = $producto['descripcion'];
    $cantidad = $producto['cantidad'];
    $delivery_id = $producto['delivery_id'];
    $imagenProducto = $producto['imagen'];

    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";


        $nombreProducto = mysqli_real_escape_string( $db,  $_POST['nombreProducto'] );
        $precio = mysqli_real_escape_string( $db,  $_POST['precio'] );

        $descripcion = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
        $cantidad = mysqli_real_escape_string( $db,  $_POST['cantidad'] );
        $delivery_id = mysqli_real_escape_string( $db,  $_POST['delivery'] );
        
        $creado = date('Y/m/d');

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if(!$nombreProducto) {
            $errores[] = "Debes añadir un nombre de producto";
        }

        if(!$precio) {
            $errores[] = 'El Precio es Obligatorio';
        }

        if( strlen( $descripcion ) < 10 ) {
            $errores[] = 'La descripción es obligatoria y debe tener al menos 10 caracteres';
        }

        if(!$cantidad) {
            $errores[] = 'El Número de productos es obligatorio';
        }

        if(!$imagen) {
            $errores[] = 'La imagen es obligatoria';
        }

        // Validar por tamaño (1mb máximo)
        $medida = 1000 * 1000;
        if($imagen['size'] > $medida ) {
            $errores[] = 'La Imagen es muy pesada';
        }


        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";


        // Revisar que el array de errores este vacio

        if(empty($errores)) {

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            /** SUBIDA DE ARCHIVOS */

            if($imagen['name']) {
                // Eliminar la imagen previa

                unlink($carpetaImagenes . $producto['imagen']);

                // // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                // // Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
            } else {
                $nombreImagen = $producto['imagen'];
            }

            // Insertar en la base de datos
            $query = "UPDATE productos SET 
                nombreProducto = '{$nombreProducto}', 
                precio = '{$precio}', 
                imagen = '{$nombreImagen}', 
                descripcion = '{$descripcion}', 
                cantidad = {$cantidad}, 
                delivery_id = {$delivery_id} 
            WHERE id = {$id}";

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                // Redireccionar al usuario.
                header('Location: /admin?resultado=2');
            }
        }



    }



    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Producto</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información del Producto</legend>

                <label for="nombreProducto">Nombre del Producto:</label>
                <input type="text" id="nombreProducto" name="nombreProducto" placeholder="Nombre del Producto" value="<?php echo $nombreProducto; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio del Producto" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/imagenes/<?php echo $imagenProducto; ?>" class="imagen-small">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Cantidad</legend>

                <label for="cantidad">Cantidad disponible:</label>
                <input 
                    type="number" 
                    id="cantidad" 
                    name="cantidad" 
                    placeholder="Ej: 10" 
                    min="1" 
                    value="<?php echo $cantidad; ?>">

            </fieldset>

            <fieldset>
                <legend>delivery</legend>

                <select name="delivery">
                    <option value="">-- Seleccione --</option>
                    <?php while($delivery =  mysqli_fetch_assoc($resultado) ) : ?>
                        <option <?php echo $delivery_id == $delivery['id'] ? 'selected' : ''; ?> value="<?php echo $delivery['id']; ?>">
                            <?php echo $delivery['nombre'] . " " . $delivery['apellido']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Actualizar Producto" class="boton boton-verde">
        </form>
        
    </main>

<?php 
    incluirTemplate('footer');
?> 