<?php

include_once "../modelo/InstructorModelo.php";

class InstructorControlador {
    public $id;
    public $nombre;
    public $documento;
    public $correo;
    public $telefono;
    public $jornada;
    public $numeroFicha;
    public $instructor_id;
    public $usuario;
    public $password;
    public $rol_id;

    public function ctrListarAprendices(){
        $objRespuesta = InstructorModelo::mdlListarAprendices();
        echo json_encode($objRespuesta);
    }

    public function ctrListarInstructores(){
        $objRespuesta = InstructorModelo::mdlListarInstructores();
        echo json_encode($objRespuesta);
    }

    public function ctrRegistrarAprendiz(){
        $objRespuesta = InstructorModelo::mdlRegistrarAprendiz(
            $this->nombre, 
            $this->documento, 
            $this->correo, 
            $this->telefono, 
            $this->jornada, 
            $this->numeroFicha, 
            $this->instructor_id, 
            $this->usuario, 
            $this->password, 
            $this->rol_id
        );
        echo json_encode($objRespuesta);
    }

    public function ctrEditarAprendiz(){
        $objRespuesta = InstructorModelo::mdlEditarAprendiz(
            $this->id,
            $this->nombre, 
            $this->documento, 
            $this->correo, 
            $this->telefono, 
            $this->jornada, 
            $this->numeroFicha, 
            $this->instructor_id, 
            $this->usuario, 
            $this->password, 
            $this->rol_id
        );
        echo json_encode($objRespuesta);
    }

    public function ctrEliminarAprendiz(){
        $objRespuesta = InstructorModelo::mdlEliminarAprendiz($this->id);
        echo json_encode($objRespuesta);
    }
}

if(isset($_POST["listarAprendices"]) && $_POST["listarAprendices"] == "ok"){
    $objInstructor = new InstructorControlador();
    $objInstructor->ctrListarAprendices();
}

if(isset($_POST["listarInstructores"]) && $_POST["listarInstructores"] == "ok"){
    $objInstructor = new InstructorControlador();
    $objInstructor->ctrListarInstructores();
}

if(isset($_POST["registrarAprendiz"]) && $_POST["registrarAprendiz"] == "ok"){
    $objInstructor = new InstructorControlador();
    $objInstructor->nombre = $_POST["nombre"];
    $objInstructor->documento = $_POST["documento"];
    $objInstructor->correo = $_POST["correo"];
    $objInstructor->telefono = $_POST["telefono"];
    $objInstructor->jornada = $_POST["jornada"];
    $objInstructor->numeroFicha = $_POST["numeroFicha"];
    $objInstructor->instructor_id = $_POST["instructor_id"];
    $objInstructor->usuario = $_POST["usuario"];
    $objInstructor->password = $_POST["password"];
    $objInstructor->rol_id = $_POST["rol_id"];
    $objInstructor->ctrRegistrarAprendiz();
}

if(isset($_POST["editarAprendiz"]) && $_POST["editarAprendiz"] == "ok"){
    $objInstructor = new InstructorControlador();
    $objInstructor->id = $_POST["id"];
    $objInstructor->nombre = $_POST["nombre"];
    $objInstructor->documento = $_POST["documento"];
    $objInstructor->correo = $_POST["correo"];
    $objInstructor->telefono = $_POST["telefono"];
    $objInstructor->jornada = $_POST["jornada"];
    $objInstructor->numeroFicha = $_POST["numeroFicha"];
    $objInstructor->instructor_id = $_POST["instructor_id"];
    $objInstructor->usuario = $_POST["usuario"];
    $objInstructor->password = $_POST["password"];
    $objInstructor->rol_id = $_POST["rol_id"];
    $objInstructor->ctrEditarAprendiz();
}

if(isset($_POST["eliminarAprendiz"]) && $_POST["eliminarAprendiz"] == "ok"){
    $objInstructor = new InstructorControlador();
    $objInstructor->id = $_POST["id"];
    $objInstructor->ctrEliminarAprendiz();
}

