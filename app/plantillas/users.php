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

<div class="users">

  <h1>Lista De Usuarios</h1>

  <table class="tabla-users desktop">
    <thead>
      <tr>

        <th>Id Usuario </th>
        <th>Nombre Usuarios</th>
        <th>Fecha De Creacion </th>
        <th>Email</th>
        <th>Rol</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($listadoUsers as $key => $user) : ?>

        <tr>
          <td><?= $user['id_usuario'] ?></td>
          <td><?= $user['nombre_usuario'] ?></td>
          <td><?= substr($user['fecha_creacion'], 0, 11) ?></td>
          <td><?= $user['email'] ?></td>
          <td><?= $user['rol'] ?></td>
          <td>
            <form method="POST" action="">
              <input type="hidden" name="id_usuario" value="<?= $user['id_usuario'] ?>">
              <input type="submit" value="Eliminar Usuario" name="ok"></button>
            </form>

          </td>
        </tr>

      <?php endforeach ?>
    </tbody>
  </table>


  <ul class="mobile">

    <?php foreach ($listadoUsers as $key => $user) : ?>
      <li>Id usuario: <?= $user['id_usuario'] ?></li>
      <li>Nombre usuario: <?= $user['nombre_usuario'] ?></li>
      <li>Fecha de creacion:<?= substr($user['fecha_creacion'], 0, 11) ?></li>
      <li>Email: <?= $user['email'] ?></li>
      <li>Rol:<?= $user['rol'] ?></li>
      <li class="last">
        <form method="POST" action="">
          <input type="hidden" name="id_usuario" value="<?= $user['id_usuario'] ?>">
          <input type="submit" value="Eliminar Usuario" name="ok"></button>
        </form>

      </li>


    <?php endforeach ?>

  </ul>


</div>





<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>