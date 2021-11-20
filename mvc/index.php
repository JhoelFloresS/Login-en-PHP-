<?php
require_once "Controladores/rutasC.php";
require_once "Controladores/adminC.php";
require_once "Controladores/empleadosC.php";

require_once "Modelo/rutasM.php";
require_once "Modelo/adminM.php";
require_once "Modelo/empleadosM.php";
$rutas = new RutasControlador();
$rutas->Plantilla();


?>