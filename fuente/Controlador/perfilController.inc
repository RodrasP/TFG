<?php

namespace app\tenis\controlador;

use app\tenis\repositorio\PerfilRepositorio;
use app\tenis\repositorio\DeleteReservaRepositorio;

class PerfilController
{
  public function perfil()
  {

    $listaReservas =  (new PerfilRepositorio())->perfil($_SESSION['id_usuario']);
   


    if (isset($_POST['ok'])) {
      $id_reserva = $_POST['id_reserva'];

      (new DeleteReservaRepositorio())->delete($id_reserva);

      header("Location: index.php?ctl=perfil");
    }



    require __DIR__ . '/../../app/plantillas/perfil.php';
  }
}
