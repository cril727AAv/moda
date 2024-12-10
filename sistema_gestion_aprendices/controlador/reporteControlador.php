<?php 

include_once "../modelo/reporteModelo.php";

class ReporteControlador {
    public $idaprendiz;
    public $idequipo;
    public $idins;
    public $observacion;
    public $fecha;

    public function ctrListarDetalles(){
        $objRespuesta = ReporteModelo::mdlListarDetalles($this->idaprendiz);
        echo json_encode($objRespuesta);
    }

    public function ctrAgregarReporte() {
        // Validate input
        if (empty($this->idaprendiz) || empty($this->idequipo) || empty($this->idins) || empty($this->observacion) || empty($this->fecha)) {
            echo json_encode(array("codigo" => "400", "mensaje" => "Todos los campos son requeridos."));
            return;
        }

        // Check if equipo exists
        $equipoExists = ReporteModelo::mdlCheckEquipoExists($this->idequipo);
        if (!$equipoExists) {
            echo json_encode(array("codigo" => "400", "mensaje" => "El equipo especificado no existe."));
            return;
        }

        // Check if instructor exists
        $instructorExists = ReporteModelo::mdlCheckInstructorExists($this->idins);
        if (!$instructorExists) {
            echo json_encode(array("codigo" => "400", "mensaje" => "El instructor especificado no existe."));
            return;
        }

        $objRespuesta = ReporteModelo::mdlAgregarReporte($this->idaprendiz, $this->idequipo, $this->idins, $this->observacion, $this->fecha);
        echo json_encode($objRespuesta);
    }   
}

if(isset($_POST["listarDetallesReporte"]) && $_POST["listarDetallesReporte"] == "ok"){
    $objReporte = new ReporteControlador();
    $objReporte->idaprendiz = $_POST["id"];
    $objReporte->ctrListarDetalles();
}

if (isset($_POST["agregarReporte"]) && $_POST["agregarReporte"] == "ok") {
    $objReporte = new ReporteControlador();
    $objReporte->idaprendiz = $_POST["idaprendiz"];
    $objReporte->idequipo = $_POST["idequipo"];
    $objReporte->idins = $_POST["idins"];
    $objReporte->observacion = $_POST["observacion"];
    $objReporte->fecha = $_POST["fecha"];
    $objReporte->ctrAgregarReporte();
}
