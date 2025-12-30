<?php 

    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth) {
        header('Location: /');
    }

    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM delivery";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $producto = '';
    $precio = '';
    $descripcion = '';
    $cantidad = '';
    $delivery_id = '';

    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";


        //echo "<pre>";
        //var_dump($_FILES);
        //echo "</pre>";


        $producto = mysqli_real_escape_string( $db,  $_POST['producto'] );
        $precio = mysqli_real_escape_string( $db,  $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
        $cantidad = mysqli_real_escape_string( $db,  $_POST['cantidad'] );
        $delivery_id = mysqli_real_escape_string( $db,  $_POST['repartidor'] );
        $creado = date('Y-m-d');

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];



        if(!$producto) {
            $errores[] = "Debes añadir un producto";
        }

        if(!$precio) {
            $errores[] = 'El Precio es Obligatorio';
        }

        if( strlen( $descripcion ) < 50 ) {
            $errores[] = 'La descripción es obligatoria y debe tener al menos 10 caracteres';
        }

        if(!$cantidad || !is_numeric($cantidad) || (int)$cantidad < 1) {
            $errores[] = 'La cantidad es obligatoria y debe ser un número mayor a 0';
        }
        
        if(!$delivery_id) {
            $errores[] = 'Elige un repartidor';
        }

        if(!$imagen['name'] || $imagen['error'] ) {
            $errores[] = 'La Imagen es Obligatoria';
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

            /** SUBIDA DE ARCHIVOS */

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";


            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );


            // Insertar en la base de datos
            $query = " INSERT INTO productos (nombreProducto, precio, imagen, descripcion, cantidad, creado, delivery_id) VALUES ('$producto', '$precio', '$nombreImagen', '$descripcion', '$cantidad', '$creado', '$delivery_id') ";
                
            // echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                // Redireccionar al usuario.
                header('Location: /admin?resultado=1');
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="producto">Producto:</label>
                <input type="text" id="producto" name="producto" placeholder="Nombre del Producto" value="<?php echo $producto; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Producto" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Información del Producto</legend>

                <label for="cantidad">Cantidad:</label>
                <input 
                    type="number" 
                    id="cantidad" 
                    name="cantidad" 
                    placeholder="Ej: 10" 
                    min="1" 
                    value="<?php echo htmlspecialchars($cantidad); ?>">

            </fieldset>

            <fieldset>
                <legend>Repartidor</legend>

                <select name="repartidor">
                    <option value="">-- Seleccione --</option>
                    <?php while($repartidor =  mysqli_fetch_assoc($resultado) ) : ?>
                        <option  <?php echo $delivery_id === $repartidor['id'] ? 'selected' : ''; ?>   value="<?php echo $repartidor['id']; ?>"> <?php echo $repartidor['nombre'] . " " . $repartidor['apellido']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Producto" class="boton boton-verde">
        </form>
        
    </main>

<?php 
    incluirTemplate('footer');
?> 