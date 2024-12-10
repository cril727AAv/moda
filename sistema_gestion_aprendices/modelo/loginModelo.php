<?php
include_once "conexion.php";
class LoginModelo
{
    public static function mdlLogin($nombre_usuario, $contrasena)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT u.id, u.nombre_usuario, u.contrasena, r.nombre as rol 
                                                   FROM usuarios u 
                                                   JOIN roles r ON u.rol_id = r.id 
                                                   WHERE u.nombre_usuario = :nombre_usuario");
            $stmt->bindParam(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
            $stmt->execute();
            $usuario = $stmt->fetch();


            if ($usuario && $usuario['contrasena'] === $contrasena) {
                
                return array("codigo" => "200", "usuario" => $usuario);
            } else {
                return array("codigo" => "401", "mensaje" => "Nombre de usuario o contraseña incorrectos");
            }
        } catch (Exception $e) {
            return array("codigo" => "500", "mensaje" => $e->getMessage());
        }
    }
}

