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

<div class="perfil">

  <h1>Historial de reservas</h1>

  <table class="tabla-reservas desktop">
    <thead>
      <tr>

        <th>Tipo de pista </th>
        <th>Fecha de reserva</th>
        <th>Hora </th>
        <th>Cancelar Reserva</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($listaReservas as $key => $reservas) : ?>

        <tr>
          <?php if ($reservas['id_pista'] == 1 || $reservas['id_pista'] == 2) : ?>
            <td>Dura</td>
          <?php elseif ($reservas['id_pista'] == 3) : ?>
            <td>Hierba</td>
          <?php else : ?>
            <td>Arcilla</td>
          <?php endif ?>
          <td><?= $reservas['fecha_reserva'] ?></td>
          <td><?= substr($reservas['hora_inicio'], 0, 5) ?></td>

          <td>
            <?php if ($reservas['fecha_reserva'] >= date("Y-m-d")) : ?>
              <form method="POST" action="">
                <input type="hidden" name="id_reserva" value="<?= $reservas['id_reserva'] ?>">
                <input type="submit" value="Cancelar Reserva" name="ok"></button>
              </form>
            <?php else : ?>
              <button disabled>Cancelar Reserva</button>

            <?php endif ?>
          </td>
        </tr>

      <?php endforeach ?>
    </tbody>
  </table>

  <ul class="tabla-reservas mobile">


    <?php foreach ($listaReservas as $key => $reservas) : ?>
      <?php if ($reservas['id_pista'] == 1 || $reservas['id_pista'] == 2) : ?>
        <li>Tipo de pista: Dura</li>
      <?php elseif ($reservas['id_pista'] == 3) : ?>
        <li>Tipo de pista: Hierba</li>
      <?php else : ?>
        <li>Tipo de pista: Arcilla</li>
      <?php endif ?>
      <li>Fecha de reserva<?= $reservas['fecha_reserva'] ?></li>
      <li>Hora <?= substr($reservas['hora_inicio'], 0, 5) ?></li>

      <li class="last">
        <?php if ($reservas['fecha_reserva'] >= date("Y-m-d")) : ?>
          <form method="POST" action="">
            <input type="hidden" name="id_reserva" value="<?= $reservas['id_reserva'] ?>">
            <input type="submit" value="Cancelar Reserva" name="ok"></button>
          </form>
        <?php else : ?>
          <button disabled>Cancelar Reserva</button>

        <?php endif ?>
      </li>


    <?php endforeach ?>

  </ul>



</div>





<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>