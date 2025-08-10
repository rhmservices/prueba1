<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    






<form method="post" action="procesar_datos.php">
  <label for="rut">RUT del Proveedor:</label>
  <input type="text" id="rut" name="rut" onblur="buscarProveedor()" required>
  
  <label for="nombre_proveedor">Nombre del Proveedor:</label>
  <input type="text" id="nombre_proveedor" name="nombre_proveedor" readonly required>
  
  <button type="submit">Guardar</button>
<script src="script.js"></script>


</form>
</body>
</html>