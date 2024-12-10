<?php

// Incluye el modelo y la clase de conexión
include_once '../modelo/aprendicesModelo.php';

class AprendicesControlador {
    public function ctrListarUsuariosDisponibles(){
        $objRespuesta = AprendizModelo::obtenerAprendices();
        echo json_encode($objRespuesta);
    }
}

if (isset($_POST["listarAprendicesDisponibles"]) == "ok") {
    $objUsuariosArea = new AprendicesControlador();
    $objUsuariosArea->ctrListarUsuariosDisponibles();
}
?>
