// Funcion para enviar los datos del formulario al servidor
function enviarDatos() {
    // Obtener los valores del formulario
    var cantidad = document.getElementById("cantidad").value;
  
    // Crear un objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();
  
    // Configurar la solicitud
    xhr.open("POST", "guardar_datos.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
    // Definir la funcion de callback para manejar la respuesta del servidor
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Actualizar la interfaz de usuario con la respuesta del servidor
        document.getElementById("resultado").innerHTML = xhr.responseText;
      }
    };
  
    // Enviar la solicitud al servidor
    xhr.send("cantidad=" + cantidad);
  }
  