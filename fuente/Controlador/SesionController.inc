<?php

namespace app\tenis\controlador;

use app\tenis\repositorio\SesionRepositorio;

class SesionController
{
    public function iniSes()
    {
        if (isset($_POST['ok'])) {
            $login = (new SesionRepositorio())->iniSes($_POST['email']);
            if (!empty($login)  && password_verify($_POST['pass'], $login[0]['pass'])) {
                $_SESSION['usuario'] = 'cliente';
                $_SESSION['nombre_usuario'] = $login[0]['nombre_usuario'];
                $_SESSION['id_usuario'] = $login[0]['id_usuario'];
                $_SESSION['rol'] = $login[0]['rol'];
           
                header('Location: http://localhost/TFG/index.php?ctl=inicio');
            }
        }
        require __DIR__ . '/../../app/plantillas/iniSes.php';
    }
}
