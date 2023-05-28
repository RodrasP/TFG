<?php

namespace app\tenis\controlador;


use app\tenis\repositorio\UsersRepositorio;

class AdminController
{

    public function verUsers()
    {

        $listadoUsers = (new UsersRepositorio())->usuarios();


        if (isset($_POST['ok'])) {
            $id_usuario = $_POST['id_usuario'];
      
            (new UsersRepositorio())->delete($id_usuario);
      
            header("Location: index.php?ctl=users");
          }

        require __DIR__ . '/../../app/plantillas/users.php';
    }
}
