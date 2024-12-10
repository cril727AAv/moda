class Reporte {
    constructor(objData){
        this.objData = objData;
    }

    listarDetallesReporte(){
        let objData = new FormData();
        objData.append("listarDetallesReporte", this.objData.listarDetallesReporte);
        objData.append("id", this.objData.id);

        fetch("controlador/reporteControlador.php",{
            method: "POST",
            body: objData
        })
        .then(response => response.json())  
        .then(response =>{
            if(response["codigo"] == "200"){
                const detalle = response["listaDetalles"][0]; // Assuming the first result is what you want
                $("#ficha").val(detalle["ficha"]);
                $("#jornada").val(detalle["jornada"]);
                $("#tipo").val(detalle["tipo"]);
                $("#nombreIns").val(detalle["instructor_nombre"]);
                $("#idins").val(detalle["idins"]); // Store the instructor ID
                $("#serial").val(detalle["serial"]);
                $("#idequipo").val(detalle["idequipo"]); // Store the equipment ID
            }
        })
    }
}
