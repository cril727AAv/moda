<?php
session_start();

include_once "../modelo/loginModelo.php";

class LoginControlador
{
    public function ctrLogin()
    {
        if (isset($_POST['nombre_usuario']) && isset($_POST['contrasena'])) {
            $nombre_usuario = $_POST['nombre_usuario'];
            $contrasena = $_POST['contrasena'];
            $respuesta = LoginModelo::mdlLogin($nombre_usuario, $contrasena);

            if ($respuesta['codigo'] === "200") {
                $_SESSION['iniciarSesion'] = "ok";
                $_SESSION['id'] = $respuesta['usuario']['id'];
                $_SESSION['nombre_usuario'] = $respuesta['usuario']['nombre_usuario'];
                $_SESSION['rol'] = $respuesta['usuario']['rol'];
            }

            echo json_encode($respuesta);
        }
    }

    public function ctrLogout()
    {
        session_destroy();
        echo json_encode(array("codigo" => "200", "mensaje" => "Sesión cerrada exitosamente"));
    }
}

if (isset($_POST['accion'])) {
    $login = new LoginControlador();
    if ($_POST['accion'] == 'login') {
        $login->ctrLogin();
    } elseif ($_POST['accion'] == 'logout') {
        $login->ctrLogout();
    }
}

