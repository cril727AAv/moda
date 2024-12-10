<?php

include_once "conexion.php";

class ReporteModelo {

    public static function mdlListarDetalles($id){
        try{
            $objRespuesta = Conexion::conectar()->prepare("SELECT reportes.id AS reporte_id,
                                                                  aprendices.numero_ficha AS ficha,
                                                                  aprendices.jornada AS jornada,
                                                                  equipos.numero_serial AS serial,
                                                                  equipos.id AS idequipo,
                                                                  equipos.tipo AS tipo,
                                                                  usuarios.nombre_usuario AS instructor_nombre,
                                                                  instructores.id AS idins
                                                           FROM  reportes
                                                           INNER JOIN aprendices ON reportes.aprendiz_id = aprendices.id
                                                           INNER JOIN equipos ON reportes.equipo_id = equipos.id
                                                           INNER JOIN instructores ON aprendices.instructor_id = instructores.id
                                                           INNER JOIN usuarios ON instructores.usuario_id = usuarios.id
                                                           WHERE aprendices.id = :id;
                                                          ");
            $objRespuesta->bindParam(":id", $id);
            $objRespuesta->execute();
            $listaDetalles = $objRespuesta->fetchAll();
            $objRespuesta = null;

            $mensaje = array("codigo"=>"200", "listaDetalles" => $listaDetalles);
        } catch (Exception $e){
            $mensaje = array("codigo"=>"400", "mensaje"=>$e->getMessage());
        }
        return $mensaje;
    }  

    public static function mdlCheckEquipoExists($idequipo) {
        try {
            $objConexion = Conexion::conectar();
            $objRespuesta = $objConexion->prepare("SELECT COUNT(*) FROM equipos WHERE id = :idequipo");
            $objRespuesta->bindParam(":idequipo", $idequipo);
            $objRespuesta->execute();
            return $objRespuesta->fetchColumn() > 0;
        } catch (Exception $e) {
            error_log("Error checking equipo existence: " . $e->getMessage());
            return false;
        }
    }

    public static function mdlCheckInstructorExists($idins) {
        try {
            $objConexion = Conexion::conectar();
            $objRespuesta = $objConexion->prepare("SELECT COUNT(*) FROM instructores WHERE id = :idins");
            $objRespuesta->bindParam(":idins", $idins);
            $objRespuesta->execute();
            return $objRespuesta->fetchColumn() > 0;
        } catch (Exception $e) {
            error_log("Error checking instructor existence: " . $e->getMessage());
            return false;
        }
    }

    public static function mdlAgregarReporte($idaprendiz, $idequipo, $idins, $observacion, $fecha) {
        try {
            $objConexion = Conexion::conectar();
            $objRespuesta = $objConexion->prepare(
                "INSERT INTO reportes (aprendiz_id, equipo_id, instructor_id, observaciones, fecha)
                VALUES (:idaprendiz, :idequipo, :idins, :observaciones, :fecha)"
            );
            
            $objRespuesta->bindParam(":idaprendiz", $idaprendiz);
            $objRespuesta->bindParam(":idequipo", $idequipo);
            $objRespuesta->bindParam(":idins", $idins);
            $objRespuesta->bindParam(":observaciones", $observacion);
            $objRespuesta->bindParam(":fecha", $fecha);
            
            if ($objRespuesta->execute()) {
                return array("codigo" => "200", "mensaje" => "Reporte agregado exitosamente.");
            } else {
                $errorInfo = $objRespuesta->errorInfo();
                error_log("SQL Error: " . print_r($errorInfo, true));
                return array("codigo" => "400", "mensaje" => "Error en la inserción: " . $errorInfo[2]);
            }
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
            return array("codigo" => "400", "mensaje" => "Excepción: " . $e->getMessage());
        }
    }

    public static function mdlListarReportes($filtros = []) {
        try {
            $conexion = Conexion::conectar();
            
            $sql = "SELECT r.id, a.numero_ficha, a.nombre AS nombre_aprendiz, a.jornada, 
                           e.numero_serial, e.tipo, u.nombre_usuario AS instructor, r.observaciones
                    FROM reportes r
                    JOIN aprendices a ON r.aprendiz_id = a.id
                    JOIN equipos e ON r.equipo_id = e.id
                    JOIN usuarios u ON r.instructor_id = u.id
                    WHERE 1=1";

            if (!empty($filtros['jornada'])) {
                $sql .= " AND a.jornada = :jornada";
            }
            if (!empty($filtros['instructor'])) {
                $sql .= " AND u.nombre_usuario = :instructor";
            }
            if (!empty($filtros['serial'])) {
                $sql .= " AND e.numero_serial = :serial";
            }

            $stmt = $conexion->prepare($sql);

            if (!empty($filtros['jornada'])) {
                $stmt->bindParam(':jornada', $filtros['jornada'], PDO::PARAM_STR);
            }
            if (!empty($filtros['instructor'])) {
                $stmt->bindParam(':instructor', $filtros['instructor'], PDO::PARAM_STR);
            }
            if (!empty($filtros['serial'])) {
                $stmt->bindParam(':serial', $filtros['serial'], PDO::PARAM_STR);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function mdlObtenerJornadas() {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->query("SELECT DISTINCT jornada FROM aprendices");
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function mdlObtenerInstructores() {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->query("SELECT DISTINCT nombre_usuario FROM usuarios WHERE rol_id = 1");
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}


