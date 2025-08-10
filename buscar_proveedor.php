<?php
header('Content-Type: application/json');

// 1. Conexión a la base de datos (reemplaza con tus credenciales)
$conexion = new mysqli("localhost", "usuario", "contraseña", "base_de_datos");

if ($conexion->connect_error) {
    die(json_encode(['error' => 'Error de conexión: ' . $conexion->connect_error]));
}

// 2. Obtener el RUT enviado por AJAX
$rut = $_POST['rut'];

// 3. Preparar y ejecutar la consulta
$sql = "SELECT nombre FROM proveedor WHERE rut = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $rut);
$stmt->execute();
$resultado = $stmt->get_result();

$respuesta = ['existe' => false];

if ($fila = $resultado->fetch_assoc()) {
    // Si se encontró el proveedor
    $respuesta['existe'] = true;
    $respuesta['nombre'] = $fila['nombre'];
}

$stmt->close();
$conexion->close();

echo json_encode($respuesta);
?>
