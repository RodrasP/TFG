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



<div class="eleccion">
  <h1>Vas a reservar la pista de tipo <?= $pistas[0]['tipo_de_pista'] ?> </h1>
  <div class="container">
    <div class="foto">
      <img src="<?= $pistas[0]['url_foto'] ?><?= $pistas[0]['tipo_de_pista'] ?>.jpg" alt="Foto de la pista de tenis seleccionada">
    </div>
    <div class="formularios">

      <form method="post" action="">
        <label for="fecha" class="label-fecha">Fecha:</label>
        <?php
        $today = date('Y-m-d');
        $maxDate = date('Y-m-d', strtotime('+7 days'));
        echo '<input type="date" name="fecha" id="fecha" class="input-fecha" min="' . $today . '" max="' . $maxDate . '">'; ?>
        <div id="hora-wrapper" style="display:none;">
          <label class="label-horas">Horas:</label>
          <div id="hora-buttons"></div>
          <input type="hidden" name="hora-input" id="hora-input">
          <span>(*Recordar que las pistas se reservan por horas)</span>
        </div>
        <div id="submit-wrapper" style="display:none;">
          <input type="submit" value="Reservar" name="ok" class="reservas">
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  document.getElementById("fecha").addEventListener("change", function() {
    let fecha = this.value;
    document.getElementById("hora-wrapper").style.display = "block";
    var arrayFechas = <?= json_encode($listadoHoras); ?>;

    let arrayHoras = [];
    for (let j = 0; j < arrayFechas.length; j++) {
      element = arrayFechas[j];
      let nuevaFecha = element['fecha_reserva'];
      if (nuevaFecha == fecha) {
        arrayHoras.push(element['hora_inicio'].substring(0, 5));
      }
    }

    var horaButtons = document.getElementById("hora-buttons");
    horaButtons.innerHTML = ""; // Vaciar el contenido actual antes de generar los nuevos botones

    for (var i = 10; i <= 21; i++) {
      var hora = i + ":00";
      if (!arrayHoras.includes(hora)) {
        if (i >= 10 && i <= 21) {
          var checkbox = document.createElement("input");
          checkbox.type = "checkbox";
          checkbox.name = "hora-checkbox";
          checkbox.value = hora;
          checkbox.id = "hora-" + i;
          checkbox.className = "hora-checkbox";
          checkbox.addEventListener("click", function() {
            document.getElementById("hora-input").value = this.value;
            document.getElementById("submit-wrapper").style.display = "block";
          });

          var label = document.createElement("label");
          label.setAttribute("for", "hora-" + i);
          label.className = "hora-label";
          label.innerHTML = hora;

          horaButtons.appendChild(checkbox);
          horaButtons.appendChild(label);
        }
      }
    }

    var horaInputs = document.querySelectorAll(".hora-checkbox");
    for (var i = 0; i < horaInputs.length; i++) {
      horaInputs[i].addEventListener("click", function() {
        // Desmarcar todas las casillas excepto la seleccionada
        for (var j = 0; j < horaInputs.length; j++) {
          if (horaInputs[j] !== this) {
            horaInputs[j].checked = false;
          }
        }
        // Asignar el valor de la casilla seleccionada al campo oculto
        if (this.checked) {
          document.getElementById("hora-input").value = this.value;
          document.getElementById("submit-wrapper").style.display = "block";
        } else {
          document.getElementById("hora-input").value = "";
          document.getElementById("submit-wrapper").style.display = "none";
        }
      });
    }
  });
</script>




<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>