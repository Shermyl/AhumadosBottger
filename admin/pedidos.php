<?php
session_start();
require '../includes/funciones.php';
$auth = estaAutenticado();

if (!$auth) {
    header('Location: /');
    exit;
}

// Conexión a la base de datos
require '../includes/config/database.php';
$db = conectarDB();

// Procesar actualización de estado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['estado'])) {
    $id = (int)$_POST['id'];
    $estado = mysqli_real_escape_string($db, $_POST['estado']);
    
    $query = "UPDATE pedidos SET estado = '{$estado}' WHERE id = {$id}";
    mysqli_query($db, $query);
    
    header('Location: /admin/pedidos.php?actualizado=1');
    exit;
}

// Obtener todos los pedidos con el nombre del producto
$query = "
    SELECT 
        p.id,
        p.cantidad,
        p.nombre_cliente,
        p.email,
        p.telefono,
        p.fecha_pedido,
        p.estado,
        prod.nombreProducto AS producto
    FROM pedidos p
    LEFT JOIN productos prod ON p.producto_id = prod.id
    ORDER BY p.fecha_pedido DESC
";
$resultado = mysqli_query($db, $query);

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Gestión de Pedidos</h1>

    <?php if (isset($_GET['actualizado'])): ?>
        <div class="alerta exito">Estado del pedido actualizado correctamente.</div>
    <?php endif; ?>

    <?php if (mysqli_num_rows($resultado) > 0): ?>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Cliente</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($pedido = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?php echo $pedido['id']; ?></td>
                    <td><?php echo $pedido['producto'] ?? 'Producto eliminado'; ?></td>
                    <td><?php echo $pedido['cantidad']; ?></td>
                    <td><?php echo $pedido['nombre_cliente']; ?></td>
                    <td><?php echo $pedido['telefono']; ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($pedido['fecha_pedido'])); ?></td>
                    <td>
                        <span class="estado <?php echo $pedido['estado']; ?>">
                            <?php echo ucfirst($pedido['estado']); ?>
                        </span>
                    </td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $pedido['id']; ?>">
                            <select name="estado" onchange="this.form.submit()">
                                <option value="pendiente" <?php echo $pedido['estado'] === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                                <option value="procesado" <?php echo $pedido['estado'] === 'procesado' ? 'selected' : ''; ?>>Procesado</option>
                                <option value="entregado" <?php echo $pedido['estado'] === 'entregado' ? 'selected' : ''; ?>>Entregado</option>
                            </select>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="alerta">No hay pedidos registrados.</p>
    <?php endif; ?>

    <a href="/admin" class="boton boton-verde">Volver al Panel</a>
</main>

<style>
.estado {
    padding: 4px 8px;
    border-radius: 4px;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 0.85rem;
}
.estado.pendiente { background-color: #fff3cd; color: #856404; }
.estado.procesado { background-color: #cce7ff; color: #004085; }
.estado.entregado { background-color: #d4edda; color: #155724; }
</style>

<?php
mysqli_close($db);
incluirTemplate('footer');
?>