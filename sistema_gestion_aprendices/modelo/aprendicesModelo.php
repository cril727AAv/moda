<?php

include_once "conexion.php";

class AprendizModelo {
    public static function obtenerAprendices() {
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT id, nombre FROM aprendices");
            $objRespuesta->execute();
            $listaAprendices = $objRespuesta->fetchAll();
            $objRespuesta = null;

            $mensaje = array("codigo" => "200", "listaAprendices" => $listaAprendices);
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
}
?>
