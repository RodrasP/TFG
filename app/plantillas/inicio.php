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

<div class="inicio">
  <div class="catching">
    <img src="web\imagenes\mitad_tenis.png" alt="mitad tenis" class="logo">
    <!-- <img src="web\imagenes\jugador.jpg" alt="Jugador de tenis"> -->
    <h1>
      <div class="texto">
        <span class="pregunta"> ¿Te encanta jugar al tenis?</span> <br>
        ¡Hazlo más fácil con Vecinos en Red!
      </div>
    </h1>
    <img src="web\imagenes\mitad_red.png" alt="mitad red" class="logo">
  </div>


  <div class="cuerpo">

    <div class="pista-tipo-dura"></div>
    <div class="pista-tipo-hierba"></div>
    <div class="pista-tipo-arcilla"></div>

  </div>








</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>