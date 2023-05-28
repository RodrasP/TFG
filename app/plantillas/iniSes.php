<?php
/* Ejemplo de plantilla que se mostrará dentro de la plantilla principal
  ob_start() activa el almacenamiento en buffer de la página. Mientras se
             almacena en el buffer no se produce salida alguna hacia el
             navegador del cliente
  luego viene el código html y/o php que especifica lo que debe aparecer en
     el cliente web
  ob_get_clean() obtiene el contenido del buffer (que se pasa a la variable
             $contenido) y elimina el contenido del buffer
  Por último se incluye la página que muestra la imagen común de la aplicación
    (en este caso base.php) la cual contiene una referencia a la variable
    $contenido que provocará que se muestre la salida del buffer dentro dicha
    página "base.php"
*/
?>
<?php ob_start() ?>

<form class="login-form" method="post" action="" onsubmit="return validarFormulario()">
  <h2>Iniciar sesión</h2>
  <div class="form-group">
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" placeholder="Email">
    <span id="email-error" class="error-message"><!-- Aquí se mostraría el mensaje de error --></span>
  </div>
  <div class="form-group">
    <label for="pass">Contraseña:</label>
    <input type="password" name="pass" id="pass" placeholder="Contraseña">
    <span id="pass-error" class="error-message"><!-- Aquí se mostraría el mensaje de error --></span>
  </div>
  <span><a href="http://localhost/TFG/index.php?ctl=register">¿Aun no tienes cuenta?</a></span>
  <input type="submit" value="Iniciar Sesion" name="ok">
</form>

<script>
  function validarFormulario() {
    // Obtener los campos del formulario
    const email = document.getElementById('email').value;
    const pass = document.getElementById('pass').value;

    // Validar los campos
    if (email === '') {
      document.getElementById('email-error').textContent = 'Debe ingresar una dirección de correo electrónico.';
      document.getElementById('email-error').style.display = 'block'; // Mostrar el mensaje de error
      return false;
    } else {
      document.getElementById('email-error').style.display = 'none'; // Oculta el mensaje de error
    }
    if (pass === '') {
      document.getElementById('pass-error').textContent = 'Debe ingresar una contraseña.';
      document.getElementById('pass-error').style.display = 'block'; // Mostrar el mensaje de error
      return false;
    } else {
      document.getElementById('pass-error').style.display = 'none'; // Oculta el mensaje de error

    }

    // Si se completaron todos los campos correctamente, permitir el envío del formulario
    return true;
  }
</script>





<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>