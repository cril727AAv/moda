class Aprendices {
    constructor(objData){
        this.objData = objData;
    }

    cargarAprendicesDisponible(){
        let objData = new FormData();
        objData.append("listarAprendicesDisponibles", this.objData.listarAprendicesDisponibles);

        fetch('controlador/aprendicesControlador.php',{
            method: "POST",
            body: objData
        })
            .then(response => response.json())
            .then(response => {
                const selectElement = document.getElementById('aprendicesSelect');
                if (response["codigo"] == "200") {
                    selectElement.innerHTML = '<option value="">Seleccione un aprendiz</option>';
                    response["listaAprendices"].forEach(aprendiz => {
                        selectElement.innerHTML += `<option value="${aprendiz.id}">${aprendiz.nombre}</option>`;
                    });
                }
            })
            .catch(error => console.error('Error al cargar los aprendices:', error));
    }
}