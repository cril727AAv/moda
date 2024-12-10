<?php
session_start();


include "vista/modulos/cabecera.php";


if (isset($_SESSION["iniciarSesion"]) == "ok"){

    $listaRutas = array("aprendices", "equipos", "reportes", "observaciones", "instructores");

    if (isset($_GET["ruta"]) && in_array($_GET["ruta"], $listaRutas)){
        include "vista/modulos/".$_GET["ruta"].".php";
    } else {
        include "vista/modulos/login.php";
    }

} else {
    include "vista/modulos/login.php";
}

include "vista/modulos/pie.php";