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




<form method="post" action="" class="register-form" onsubmit="return validarFormulario()">
  <div class="form-group">
    <label for="nombre">Nombre completo:</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo">
    <span id="nombre-error" class="error-message"></span>
  </div>
  <div class="form-group">
    <label for="user">Nombre de usuario:</label>
    <input type="text" id="user" name="user" placeholder="Username">
    <span id="user-error" class="error-message"></span>
  </div>
  <div class="form-group">
    <label for="emailRegister">Correo electrónico:</label>
    <input type="email" id="emailRegister" name="emailRegister" placeholder="email">
    <span id="email-error" class="error-message"></span>
  </div>
  <div class="form-group">
    <label for="passRegister">Contraseña:</label>
    <input type="password" id="passRegister" name="passRegister" placeholder="pass">
    <span id="pass-error" class="error-message"></span>
  </div>
  <input type="submit" value="Registrarse" name="register">
</form>

<script>
  function validarFormulario() {
    const nombre = document.getElementById('nombre').value;
    const usuario = document.getElementById('user').value;
    const email = document.getElementById('emailRegister').value;
    const pass = document.getElementById('passRegister').value;

    if (nombre === '') {
      document.getElementById('nombre-error').textContent = 'Debe ingresar su nombre completo.';
      document.getElementById('nombre-error').style.display = 'block';
      return false;
    } else {
      document.getElementById('nombre-error').style.display = 'none';
    }

    if (usuario === '') {
      document.getElementById('user-error').textContent = 'Debe ingresar un nombre de usuario.';
      document.getElementById('user-error').style.display = 'block';
      return false;
    } else {
      document.getElementById('user-error').style.display = 'none';
    }

    if (email === '') {
      document.getElementById('email-error').textContent = 'Debe ingresar una dirección de correo electrónico.';
      document.getElementById('email-error').style.display = 'block';
      return false;
    } else {
      document.getElementById('email-error').style.display = 'none';
    }

    if (pass === '') {
      document.getElementById('pass-error').textContent = 'Debe ingresar una contraseña.';
      document.getElementById('pass-error').style.display = 'block';
      return false;
    } else {
      document.getElementById('pass-error').style.display = 'none';
    }

    return true;
  }
</script>




<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>