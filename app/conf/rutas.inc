<?php

// Vector multidimensional con rutas a controlador y método que debe
// atender cada enlace
/* formato:
    Primera dimensaión: nombre del enlace pasado mediante variable GET 'ctl'
     'nombreEnlace' => array() segunda dimesion con información del controlador
                       que atiende esa petición, clave 'controller', y del
                       método concreto que está especializado en su tratamiento,
                       clave 'action'
  Se debe agregar una ruta por cada valor diferente que tome la variable 'ctl'.
  La clave 'inicio' referencia la página home de la aplicación y especifica
    el controlador que debe decidir cuál es la vista que se debe mostrar
*/
$mapeoRutas =
  [
    //nombre plantilla                                    controlador                      funcion del controlador 
    'inicio' => ['controller' => 'app\tenis\controlador\DefaultController', 'action' => 'inicio'],
    'iniSes' => ['controller' => 'app\tenis\controlador\SesionController', 'action' => 'iniSes'],
    'register' => ['controller' => 'app\tenis\controlador\RegisterController', 'action' => 'register'],
    'contacto' => ['controller' => 'app\tenis\controlador\DefaultController', 'action' => 'contacto'],
    'reservar' => ['controller' => 'app\tenis\controlador\ReservarController', 'action' => 'listadoPistas'],
    'eleccion' => ['controller' => 'app\tenis\controlador\ReservarController', 'action' => 'listadoPistasByURL'],
    'perfil' => ['controller' => 'app\tenis\controlador\PerfilController', 'action' => 'perfil'],
    'users' => ['controller' => 'app\tenis\controlador\AdminController', 'action' => 'verUsers']
  ];
