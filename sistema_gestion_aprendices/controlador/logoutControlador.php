<?php
session_start();

class LogoutControlador
{
    public function ctrLogout()
    {
        // Destroy the session
        session_destroy();
        
        // Return a success message
        echo json_encode(array("codigo" => "200", "mensaje" => "Sesión cerrada exitosamente"));
    }
}

if (isset($_POST['accion']) && $_POST['accion'] == 'logout') {
    $logout = new LogoutControlador();
    $logout->ctrLogout();
}

