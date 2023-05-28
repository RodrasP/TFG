<?php

namespace app\tenis\controlador;

use app\tenis\repositorio\ListadoPistasRepositorio;

class DefaultController
{
  public function inicio()
  {

    if (isset($_POST['ok'])) {
      $_SESSION['usuario'] = 'anonimo';
      header('Location: http://localhost/TFG/index.php?ctl=inicio');
    }



    $pistas =  (new ListadoPistasRepositorio())->listadoPistas();

   
    require __DIR__ . '/../../app/plantillas/inicio.php';
  }





  public function contacto()
  {
    require __DIR__ . '/../../app/plantillas/contacto.php';
  }
}
