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


<div class="listado-pistas">
  <?php foreach ($pistas as $key => $value) : ?>
    <div class="pista-<?= $key ?> item">
      <?php if ($key == 0 || $key == 1) : ?>
        <div class="pista-tipo <?= $value['tipo_de_pista'] . $key ?>">
          <h2><?= $value['tipo_de_pista'] ?></h2>
        </div>
      <?php else : ?>
        <div class="pista-tipo <?= $value['tipo_de_pista'] ?>">
          <h2><?= $value['tipo_de_pista'] ?></h2>
        </div>
      <?php endif ?>

      <div class="pista-foto">
        <img class="imagen" src="<?= $value['url_foto'] ?><?= $value['tipo_de_pista'] ?>.jpg" alt="">
        <!-- <div class="texto">
          <p>Texto de ejemplo</p>
        </div> -->
      </div>
      <div class="boton-reserva">
        <!-- <img class="pelota-tenis" src="web\imagenes\pelota-tenis.png" alt="Pelota de tenis"> -->
        <button class="button">Reservar</button>
      </div>
    </div>
  <?php endforeach ?>
</div>


<script>
  const pistaFoto = document.querySelector('.pista-foto');
  const botonReserva = document.querySelector('.button');
  const pistas = document.querySelectorAll('.item');

  pistaFoto.addEventListener('click', () => {
    pistaFoto.classList.toggle('activado');
  });


  pistas.forEach(pista => {
    const pistaFoto = pista.querySelector('.pista-foto');
    const botonReserva = pista.querySelector('.button');

    pistaFoto.addEventListener('click', () => {
      pistaFoto.classList.toggle('activado');
    });

    botonReserva.addEventListener('click', () => {
      const nombreClase = pista.querySelector('.pista-tipo').className;
      const urlNuevaPagina = 'index.php?ctl=eleccion&clase=' + encodeURIComponent(nombreClase);
      window.location.href = urlNuevaPagina;
    });
  });
</script>


<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>