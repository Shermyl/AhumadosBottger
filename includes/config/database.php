<?php
if (!function_exists('conectarDB')) {
    function conectarDB() {
        $db = mysqli_connect('localhost', 'root', '123456', 'ahumadosbottger_crud');

        if (!$db) {
            echo "Error: No se pudo conectar a la base de datos.";
            exit;
        }

        return $db;
    }
}
?>