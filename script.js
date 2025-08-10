// funcion en javascript para buscar el proveedor
function buscarProveedor() {
  const rut = document.getElementById('rut').value;
  const nombreCampo = document.getElementById('nombre_proveedor');

  if (rut) {
    // Usamos el objeto XMLHttpRequest para enviar una solicitud al servidor
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'buscar_proveedor.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (this.status === 200) {
        const respuesta = JSON.parse(this.responseText);
        if (respuesta.existe) {
          // Si el proveedor existe, llenamos el campo nombre y lo deshabilitamos
          nombreCampo.value = respuesta.nombre;
          nombreCampo.readonly = true;
          nombreCampo.placeholder = '';
        } else {
          // Si no existe, habilitamos el campo nombre para que el usuario lo ingrese
          nombreCampo.value = '';
          nombreCampo.readonly = false;
          nombreCampo.placeholder = 'Ingrese el nombre del nuevo proveedor';
        }
      }
    };
    xhr.send('rut=' + rut);
  }
}