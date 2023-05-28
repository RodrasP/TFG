<?php

namespace app\tenis\controlador;

use app\tenis\repositorio\RegisterRepositorio;

class RegisterController
{


    public function register()
    {

        if (isset($_POST['register'])) {
            (new RegisterRepositorio())->register($_POST['user'], $_POST['emailRegister'], $_POST['passRegister']);
            header('Location: http://localhost/TFG/index.php?ctl=iniSes');
        }
        require __DIR__ . '/../../app/plantillas/register.php';
    }
}
