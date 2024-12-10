class Equipo {
    constructor(objData) {
        this.objEquipo = objData;
    }

    listarEquipos() {
        let objData = new FormData();
        objData.append("listarEquipos", "ok");

        fetch("controlador/equipoControlador.php", {
            method: "POST",
            body: objData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(response => {
            console.log(response);

            if (response["codigo"] == "200") {
                let dataSet = [];

                response["listarEquipos"].forEach(item => {
                    let objBotones = '<div class="btn-group" role="group">';
                    objBotones += '<button id="btnEditarEquipo" type="button" class="btn btn-primary" idequipo="'+item.id+'" marca="'+item.marca+'" tipo="'+item.tipo+'" numero_serial="'+item.numero_serial+'" memoria="'+item.memoria+'" almacenamiento="'+item.almacenamiento+'" ><i class="bi bi-pencil-fill"></i></button>';
                    objBotones += '<button id="btnEliminar" type="button" class="btn btn-danger" idequipo="'+item.id+'"><i class="bi bi-trash-fill"></i></button>';
                    objBotones += '</div>';

                    dataSet.push([
                        item.marca,
                        item.tipo,
                        item.numero_serial,
                        item.memoria,
                        item.almacenamiento,
                        objBotones
                    ]);
                });

                $('#tablaEquipos').DataTable({
                    data: dataSet,
                    columns: [
                        { title: "Marca" },
                        { title: "Tipo" },
                        { title: "Número Serial" },
                        { title: "Memoria" },
                        { title: "Almacenamiento" },
                        { title: "Acciones" }
                    ],
                    responsive: true,
                    destroy: true,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            } else {
                console.error('Error en la respuesta:', response["mensaje"]);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    registrarEquipo() {
        let objData = new FormData();
        objData.append("registrarEquipo", this.objEquipo.registrarEquipo);
        objData.append("marca", this.objEquipo.marca);
        objData.append("tipo", this.objEquipo.tipo);
        objData.append("numero_serial", this.objEquipo.numero_serial);
        objData.append("memoria", this.objEquipo.memoria);
        objData.append("almacenamiento", this.objEquipo.almacenamiento);

        fetch("controlador/equipoControlador.php", {
            method: "POST",
            body: objData
        })
        .then(response => response.json())
        .catch(error => {
            console.log(error);
        })
        .then(response => {
            this.listarEquipos();
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Agregado Correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        });
    }

    editarEquipo() {
        let objData = new FormData();
        objData.append("editarEquipo", this.objEquipo.editarEquipo);
        objData.append("id", this.objEquipo.id);
        objData.append("marca", this.objEquipo.marca);
        objData.append("tipo", this.objEquipo.tipo);
        objData.append("numero_serial", this.objEquipo.numero_serial);
        objData.append("memoria", this.objEquipo.memoria);
        objData.append("almacenamiento", this.objEquipo.almacenamiento);

        fetch("controlador/equipoControlador.php", {
            method: "POST",
            body: objData
        })
        .then(response => response.json())
        .catch(error => {
            console.log(error);
        })
        .then(response => {
            $("#contenedorEditar").hide();
            $("#contenedorTablaRegistrar").show();
            this.listarEquipos();
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Editado Correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        });
    }

    eliminarEquipo() {
        let objData = new FormData();
        objData.append("eliminarEquipo", this.objEquipo.eliminarEquipo);
        objData.append("id", this.objEquipo.id);

        fetch('controlador/equipoControlador.php', {
            method: "POST",
            body: objData
        })
        .then(response => response.json())
        .catch(error => {
            console.log(error);
        })
        .then(response => {
            if (response["codigo"] == "200") {
                this.listarEquipos();
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response["mensaje"],
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    }
}

