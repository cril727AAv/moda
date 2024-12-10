<?php
include_once "conexion.php";

class InstructorModelo {
    public static function mdlListarAprendices() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("
            SELECT a.*, u.nombre_usuario, u.rol_id 
            FROM aprendices a 
            LEFT JOIN usuarios u ON a.id = u.id
        ");
            $objRespuesta->execute();
            $listarAprendices = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
            $objRespuesta = null;
            
            $mensaje = array("codigo" => "200", "listarAprendices" => $listarAprendices);
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlListarInstructores() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("
                SELECT i.id, u.nombre_usuario as nombre 
                FROM instructores i 
                JOIN usuarios u ON i.usuario_id = u.id
            ");
            $objRespuesta->execute();
            $listarInstructores = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
            $objRespuesta = null;
        
            $mensaje = array("codigo" => "200", "listarInstructores" => $listarInstructores);
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlRegistrarAprendiz($nombre, $documento, $correo, $telefono, $jornada, $numeroFicha, $instructor_id, $usuario, $password, $rol_id) {
        try {
            $conexion = Conexion::conectar();
            $conexion->beginTransaction();

            // Insert into usuarios table
            $objRespuesta = $conexion->prepare("INSERT INTO usuarios(nombre_usuario, contrasena, rol_id) VALUES (:usuario, :password, :rol_id)");
            $objRespuesta->bindParam(":usuario", $usuario);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $objRespuesta->bindParam(":password", $hashedPassword);
            $objRespuesta->bindParam(":rol_id", $rol_id);
            $objRespuesta->execute();

            $usuario_id = $conexion->lastInsertId();

            // Insert into aprendices table
            $objRespuesta = $conexion->prepare("INSERT INTO aprendices(nombre, documento, correo, telefono, jornada, numero_ficha, instructor_id) 
            VALUES (:nombre, :documento, :correo, :telefono, :jornada, :numeroFicha, :instructor_id)");

            $objRespuesta->bindParam(":nombre", $nombre);
            $objRespuesta->bindParam(":documento", $documento);
            $objRespuesta->bindParam(":correo", $correo);
            $objRespuesta->bindParam(":telefono", $telefono);
            $objRespuesta->bindParam(":jornada", $jornada);
            $objRespuesta->bindParam(":numeroFicha", $numeroFicha);
            $objRespuesta->bindParam(":instructor_id", $instructor_id);

            $objRespuesta->execute();

            $conexion->commit();
            $mensaje = array("codigo" => "200", "mensaje" => "Aprendiz registrado correctamente");
        } catch (Exception $e) {
            $conexion->rollBack();
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlEditarAprendiz($id, $nombre, $documento, $correo, $telefono, $jornada, $numeroFicha, $instructor_id, $usuario, $password, $rol_id) {
        $mensaje = array();
        try {
            $conexion = Conexion::conectar();
            $conexion->beginTransaction();
    
            // Update aprendices table
            $objRespuesta = $conexion->prepare("UPDATE aprendices SET nombre=:nombre, documento=:documento, correo=:correo, telefono=:telefono, jornada=:jornada, numero_ficha=:numeroFicha, instructor_id=:instructor_id WHERE id=:id");
            $objRespuesta->bindParam(":id", $id);
            $objRespuesta->bindParam(":nombre", $nombre);
            $objRespuesta->bindParam(":documento", $documento);
            $objRespuesta->bindParam(":correo", $correo);
            $objRespuesta->bindParam(":telefono", $telefono);
            $objRespuesta->bindParam(":jornada", $jornada);
            $objRespuesta->bindParam(":numeroFicha", $numeroFicha);
            $objRespuesta->bindParam(":instructor_id", $instructor_id);
            $objRespuesta->execute();
    
            // Update usuarios table
            $objRespuesta = $conexion->prepare("UPDATE usuarios SET nombre_usuario=:usuario, rol_id=:rol_id WHERE id=(SELECT usuario_id FROM aprendices WHERE id=:id)");
            $objRespuesta->bindParam(":id", $id);
            $objRespuesta->bindParam(":usuario", $usuario);
            $objRespuesta->bindParam(":rol_id", $rol_id);
            $objRespuesta->execute();
    
            // Update password if provided
            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $objRespuesta = $conexion->prepare("UPDATE usuarios SET contrasena=:password WHERE id=(SELECT usuario_id FROM aprendices WHERE id=:id)");
                $objRespuesta->bindParam(":id", $id);
                $objRespuesta->bindParam(":password", $hashedPassword);
                $objRespuesta->execute();
            }
    
            $conexion->commit();
            $mensaje = array("codigo" => "200", "mensaje" => "Se editó correctamente");
        } catch (Exception $e) {
            $conexion->rollBack();
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
    
    

    public static function mdlEliminarAprendiz($id) {
        $mensaje = array();
        try {
            $conexion = Conexion::conectar();
            $conexion->beginTransaction();

            // Get the usuario_id before deleting the aprendiz
            $objRespuesta = $conexion->prepare("SELECT usuario_id FROM aprendices WHERE id = :id");
            $objRespuesta->bindParam(":id", $id);
            $objRespuesta->execute();
            $usuario_id = $objRespuesta->fetchColumn();

            // Delete from aprendices table
            $objRespuesta = $conexion->prepare("DELETE FROM aprendices WHERE id = :id");
            $objRespuesta->bindParam(":id", $id);
            $objRespuesta->execute();

            // Delete from usuarios table
            $objRespuesta = $conexion->prepare("DELETE FROM usuarios WHERE id = :usuario_id");
            $objRespuesta->bindParam(":usuario_id", $usuario_id);
            $objRespuesta->execute();

            $conexion->commit();
            $mensaje = array("codigo" => "200", "mensaje" => "Aprendiz eliminado correctamente");
        } catch (Exception $e) {
            $conexion->rollBack();
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
}

