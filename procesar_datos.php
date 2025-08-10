<?php
// 1. Conexión a la base de datos
$conexion = new mysqli("localhost", "usuario", "contraseña", "base_de_datos");

// 2. Obtener los datos del formulario
$rut = $_POST['rut'];
$nombre_proveedor = $_POST['nombre_proveedor'];

// 3. Verificar si el proveedor ya existe en la tabla 'proveedor'
$sql_proveedor = "SELECT id FROM proveedor WHERE rut = ?";
$stmt_proveedor = $conexion->prepare($sql_proveedor);
$stmt_proveedor->bind_param("s", $rut);
$stmt_proveedor->execute();
$resultado_proveedor = $stmt_proveedor->get_result();

if ($resultado_proveedor->num_rows == 0) {
    // El proveedor no existe, así que lo insertamos
    $sql_insert = "INSERT INTO proveedor (rut, nombre) VALUES (?, ?)";
    $stmt_insert = $conexion->prepare($sql_insert);
    $stmt_insert->bind_param("ss", $rut, $nombre_proveedor);
    $stmt_insert->execute();
    $stmt_insert->close();
}

$stmt_proveedor->close();

// Ahora, inserta el resto de los datos del formulario en su tabla respectiva
// (por ejemplo, 'productos', 'facturas', etc.)
// ... Tu lógica de inserción para la tabla principal va aquí ...

$conexion->close();
?>