class Instructor {
    constructor(objData) {
        this.objInstructor = objData;
    }

    listarAprendices() {
        let objData = new FormData();
        objData.append("listarAprendices", "ok");

        fetch("controlador/instructorControlador.php", {
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

                response["listarAprendices"].forEach(item => {
                    let objBotones = '<div class="btn-group" role="group">';
                    objBotones += '<button id="btnEditarAprendiz" type="button" class="btn btn-primary" idaprendiz="'+item.id+'" nombre="'+item.nombre+'" documento="'+item.documento+'" correo="'+item.correo+'" telefono="'+item.telefono+'" jornada="'+item.jornada+'" numeroficha="'+item.numero_ficha+'" instructor_id="'+item.instructor_id+'" usuario="'+item.nombre_usuario+'" rol_id="'+item.rol_id+'" ><i class="bi bi-pencil-fill"></i></button>';
                    objBotones += '<button id="btnEliminar" type="button" class="btn btn-danger" idaprendiz="'+item.id+'"><i class="bi bi-trash-fill"></i></button>';
                    objBotones += '</div>';

                    dataSet.push([
                        item.nombre,
                        item.documento,
                        item.correo,
                        item.telefono,
                        item.jornada,
                        item.numero_ficha,
                        objBotones
                    ]);
                });

                $('#tablaAprendices').DataTable({
                    data: dataSet,
                    columns: [
                        { title: "Nombre" },
                        { title: "Documento" },
                        { title: "Correo" },
                        { title: "Teléfono" },
                        { title: "Jornada" },
                        { title: "Número de Ficha" },
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

    listarInstructores() {
        let objData = new FormData();
        objData.append("listarInstructores", "ok");

        fetch("controlador/instructorControlador.php", {
            method: "POST",
            body: objData
        })
        .then(response => response.json())
        .then(response => {
            if (response["codigo"] == "200") {
                let selectInstructor = document.getElementById("txt_Instructor");
                let selectEditInstructor = document.getElementById("txt_edit_Instructor");
            
                // Limpiar opciones existentes
                selectInstructor.innerHTML = '<option value="">Seleccione un instructor</option>';
                selectEditInstructor.innerHTML = '<option value="">Seleccione un instructor</option>';
            
                response["listarInstructores"].forEach(item => {
                    let option = document.createElement("option");
                    option.value = item.id;
                    option.textContent = item.nombre;
                    selectInstructor.appendChild(option);
                    selectEditInstructor.appendChild(option.cloneNode(true));
                });
            
                console.log("Instructores cargados:", response["listarInstructores"]);
            } else {
                console.error("Error al cargar instructores:", response["mensaje"]);
            }
        })
        .catch(error => {
            console.error('Error al cargar instructores:', error);
        });
    }

    registrarAprendiz() {
        let objData = new FormData();
        objData.append("registrarAprendiz", this.objInstructor.registrarAprendiz);
        objData.append("nombre", this.objInstructor.nombre);
        objData.append("documento", this.objInstructor.documento);
        objData.append("correo", this.objInstructor.correo);
        objData.append("telefono", this.objInstructor.telefono);
        objData.append("jornada", this.objInstructor.jornada);
        objData.append("numeroFicha", this.objInstructor.numeroFicha);
        objData.append("instructor_id", this.objInstructor.instructor_id);
        objData.append("usuario", this.objInstructor.usuario);
        objData.append("password", this.objInstructor.password);
        objData.append("rol_id", this.objInstructor.rol_id);

        fetch("controlador/instructorControlador.php", {
            method: "POST",
            body: objData
        })
        .then(response => response.json())
        .then(response => {
            this.listarAprendices();
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Agregado Correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        })
        .catch(error => {
            console.log(error);
        });
    }

    editarAprendiz() {
        let objData = new FormData();
        objData.append("editarAprendiz", this.objInstructor.editarAprendiz);
        objData.append("id", this.objInstructor.id);
        objData.append("nombre", this.objInstructor.nombre);
        objData.append("documento", this.objInstructor.documento);
        objData.append("correo", this.objInstructor.correo);
        objData.append("telefono", this.objInstructor.telefono);
        objData.append("jornada", this.objInstructor.jornada);
        objData.append("numeroFicha", this.objInstructor.numeroFicha);
        objData.append("instructor_id", this.objInstructor.instructor_id);
        objData.append("usuario", this.objInstructor.usuario);
        objData.append("password", this.objInstructor.password);
        objData.append("rol_id", this.objInstructor.rol_id);

        fetch("controlador/instructorControlador.php", {
            method: "POST",
            body: objData
        })
        .then(response => response.json())
        .then(response => {
            $("#contenedorEditar").hide();
            $("#contenedorTablaRegistrar").show();
            this.listarAprendices();
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Editado Correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        })
        .catch(error => {
            console.log(error);
        });
    }

    eliminarAprendiz() {
        let objData = new FormData();
        objData.append("eliminarAprendiz", this.objInstructor.eliminarAprendiz);
        objData.append("id", this.objInstructor.id);

        fetch('controlador/instructorControlador.php', {
            method: "POST",
            body: objData
        })
        .then(response => response.json())
        .then(response => {
            if (response["codigo"] == "200") {
                this.listarAprendices();
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response["mensaje"],
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
        .catch(error => {
            console.log(error);
        });
    }
}

