<?php

namespace app\tenis\controlador;

use app\tenis\repositorio\ListadoPistasRepositorio;
use app\tenis\repositorio\BuscarFechasRepositorio;
use app\tenis\repositorio\ReservarRepositorio;

class ReservarController
{

    public function listadoPistas()
    {
        $pistas =  (new ListadoPistasRepositorio())->listadoPistas();
        require __DIR__ . '/../../app/plantillas/reservar.php';
    }


    public function listadoPistasByURL()
    {

        $clase = $_GET['clase'];
        $posicionEspacio = strpos($clase, " ");
        $tipo_pista = substr($clase, $posicionEspacio + 1);
        $idSQL = 0;

     


        if ($tipo_pista == 'dura0') {
            $idSQL = 1;
        } elseif ($tipo_pista == 'dura1') {
            $idSQL = 2;
        } elseif ($tipo_pista == 'hierba') {
            $idSQL = 3;
        } else {
            $idSQL = 4;
        }
        $pistas =  (new ListadoPistasRepositorio())->listadoPistasByURL($idSQL);
        //  var_dump($pistas);
        $listadoHoras = (new BuscarFechasRepositorio())->listadosHoras($idSQL);
      


        if (isset($_POST['ok'])) {

            $hora_arr = explode(':', $_POST['hora-input']);
            $hora_int = (int) $hora_arr[0];
            $hora_int++;
            $hora_fin = str_pad($hora_int, 2, "0", STR_PAD_LEFT) . ":" . $hora_arr[1];
            (new ReservarRepositorio())->reservar($idSQL, $_POST['fecha'], $_POST['hora-input'], $hora_fin,  $_SESSION['id_usuario'], $_SESSION['nombre_usuario']);


            header("Location: index.php?ctl=perfil");
        }




        require __DIR__ . '/../../app/plantillas/eleccion.php';
    }
}
