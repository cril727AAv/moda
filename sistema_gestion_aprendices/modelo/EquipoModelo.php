<?php
include_once "conexion.php";

class EquipoModelo {

    public static function mdlListarEquipos() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM equipos");
            $objRespuesta->execute();
            $listarEquipos = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
            $objRespuesta = null;
            
            $mensaje = array("codigo" => "200", "listarEquipos" => $listarEquipos);
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlRegistrarEquipo($marca, $tipo, $numero_serial, $memoria, $almacenamiento) {
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO equipos(marca, tipo, numero_serial, memoria, almacenamiento) 
            VALUES (:marca, :tipo, :numero_serial, :memoria, :almacenamiento)");

            $objRespuesta->bindParam(":marca", $marca);
            $objRespuesta->bindParam(":tipo", $tipo);
            $objRespuesta->bindParam(":numero_serial", $numero_serial);
            $objRespuesta->bindParam(":memoria", $memoria);
            $objRespuesta->bindParam(":almacenamiento", $almacenamiento);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Equipo registrado correctamente");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "No se pudo registrar el equipo");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlEliminarEquipo($id){
        $mensaje = array();
    
        try {
            $objRespuesta = Conexion::conectar()->prepare("DELETE FROM equipos WHERE id = :id");
            $objRespuesta->bindParam(":id", $id);
    
            if($objRespuesta->execute()){
                $mensaje = array("codigo" => "200", "mensaje" => "Equipo eliminado correctamente");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al eliminar el Equipo");
            }
    
            $objRespuesta = null;
    
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlEditarEquipo($id, $marca, $tipo, $numero_serial, $memoria, $almacenamiento) {
        $mensaje = array();
    
        try {
            $objRespuesta = Conexion::conectar()->prepare("UPDATE equipos SET marca=:marca, tipo=:tipo, numero_serial=:numero_serial, memoria=:memoria, almacenamiento=:almacenamiento WHERE id=:id");
            $objRespuesta->bindParam(":id", $id);
            $objRespuesta->bindParam(":marca", $marca);
            $objRespuesta->bindParam(":tipo", $tipo);
            $objRespuesta->bindParam(":numero_serial", $numero_serial);
            $objRespuesta->bindParam(":memoria", $memoria);
            $objRespuesta->bindParam(":almacenamiento", $almacenamiento);
    
            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Se editó correctamente");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al editar");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
}

