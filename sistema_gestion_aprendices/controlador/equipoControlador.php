<?php

include_once "../modelo/EquipoModelo.php";

class EquipoControlador {
    public $id;
    public $marca;
    public $tipo;
    public $numero_serial;
    public $memoria;
    public $almacenamiento;

    public function ctrListarEquipos(){
        $objRespuesta = EquipoModelo::mdlListarEquipos();
        echo json_encode($objRespuesta);
    }

    public function ctrRegistrarEquipo(){
        $objRespuesta = EquipoModelo::mdlRegistrarEquipo($this->marca, $this->tipo, $this->numero_serial, $this->memoria, $this->almacenamiento);
        echo json_encode($objRespuesta);
    }

    public function ctrEditarEquipo(){
        $objRespuesta = EquipoModelo::mdlEditarEquipo($this->id, $this->marca, $this->tipo, $this->numero_serial, $this->memoria, $this->almacenamiento);
        echo json_encode($objRespuesta);
    }

    public function ctrEliminarEquipo(){
        $objRespuesta = EquipoModelo::mdlEliminarEquipo($this->id);
        echo json_encode($objRespuesta);
    }
}

if(isset($_POST["listarEquipos"]) == "ok"){
    $objEquipo = new EquipoControlador();
    $objEquipo->ctrListarEquipos();
}

if(isset($_POST["registrarEquipo"]) == "ok"){
    $objEquipo = new EquipoControlador();
    $objEquipo->marca = $_POST["marca"];
    $objEquipo->tipo = $_POST["tipo"];
    $objEquipo->numero_serial = $_POST["numero_serial"];
    $objEquipo->memoria = $_POST["memoria"];
    $objEquipo->almacenamiento = $_POST["almacenamiento"];
    $objEquipo->ctrRegistrarEquipo();
}

if(isset($_POST["editarEquipo"])  == "ok"){
    $objEquipo = new EquipoControlador();
    $objEquipo->id = $_POST["id"];
    $objEquipo->marca = $_POST["marca"];
    $objEquipo->tipo = $_POST["tipo"];
    $objEquipo->numero_serial = $_POST["numero_serial"];
    $objEquipo->memoria = $_POST["memoria"];
    $objEquipo->almacenamiento = $_POST["almacenamiento"];
    $objEquipo->ctrEditarEquipo();
}

if(isset($_POST["eliminarEquipo"])  == "ok"){
    $objEquipo = new EquipoControlador();
    $objEquipo->id = $_POST["id"];
    $objEquipo->ctrEliminarEquipo();
}

